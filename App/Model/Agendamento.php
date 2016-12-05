<?php

namespace App\Model;

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 19:50
 */
use \PDO;
use App\Model\Servico;
use App\Model\Cliente;

class Agendamento
{
    private $cod;
    private $cliente;
    private $servicos = [];
    private $data;

    public function __construct()
    {
        $conex = new Conexao();
        $this->conexao = $conex->getConnection();
    }

    public function salvar()
    {
        $stm = $this->conexao->prepare("INSERT INTO agendamento (cliente,data) values(?,?)");

        $stm->bindParam(1, $this->cliente, PDO::PARAM_INT);
        $stm->bindParam(2, $this->data, PDO::PARAM_STR);

        $res = $stm->execute();

        if ($res) {
            $agendamentoId = $this->conexao->lastInsertId();
            foreach($this->servicos as $servico){
                $stm = $this->conexao->prepare("INSERT INTO agendamento_servico (agendamento,servico) values(?,?)");
                $stm->bindParam(1, $agendamentoId, PDO::PARAM_INT);
                $stm->bindParam(2, $servico, PDO::PARAM_INT);
                $stm->execute();
            }

            return true;
        }

        return false;
    }

    public function deletar()
    {
        $stm = $this->conexao->prepare("DELETE FROM agendamento_servico where agendamento = ?");
        $stm->bindParam(1, $this->cod, PDO::PARAM_INT);
        $stm->execute();

        $stm2 = $this->conexao->prepare("DELETE FROM agendamento where cod = ?");
        $stm2->bindParam(1, $this->cod, PDO::PARAM_INT);

        return $stm2->execute();
    }

    public static function buscarPorCod($cod)
    {
        $conex = new Conexao();
        $conexao = $conex->getConnection();

        $stm = $conexao->prepare("SELECT * FROM agendamento where cod = ?");
        $stm->bindParam(1, $cod, PDO::PARAM_INT);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $agendamento = new Agendamento();

            $agendamento->setCod($result['cod']);
            $agendamento->setCliente($result['cliente']);
            $agendamento->setData($result['data']);

            return $agendamento;
        }

        return null;
    }

    public static function buscarPorData($data)
    {
        $conex = new Conexao();
        $conexao = $conex->getConnection();
        $agendamentos = [];

        $stm = $conexao->prepare("SELECT agendamento.* FROM agendamento where data between ? and ?");
        $dataFrom = $data . ' 00:00:00';
        $dataTo = $data . ' 23:59:59';

        $stm->bindParam(1, $dataFrom, PDO::PARAM_STR);
        $stm->bindParam(2, $dataTo, PDO::PARAM_STR);
        $stm->execute();

        $results = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $result) {
            $agendamento = new Agendamento();

            $agendamento->setCod($result['cod']);
            $agendamento->setCliente($result['cliente']);
            $agendamento->setData($result['data']);

            $agendamentos[] = $agendamento;
        }

        return $agendamentos;
    }

    public function getCod()
    {
        return $this->cod;
    }

    public function setCod($cod)
    {
        $this->cod = $cod;
    }
    /**
     * @return mixed
     */
    public function getCliente()
    {
        return Cliente::buscar($this->cliente)->getNome();
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @param mixed $hora
     */
    public function setData($data)
    {
        if(strpos($data, "T")) {
            $this->data = str_replace('T', ' ', $data) . ':00';
        } else {
            $this->data = $data;
        }
    }

    public function getDataFormated()
    {
        $arrDataTime = explode(' ', $this->data);

        $arrData = explode('-', $arrDataTime[0]);
        $dia = $arrData[2];
        $mes = $arrData[1];
        $ano = $arrData[0];

        return $dia .'/'. $mes . '/'. $ano;
    }

    public function getHoraFormated()
    {
        $arrDataTime = explode(' ', $this->data);

        $arrTime = explode(':', $arrDataTime[1]);
        $hora = $arrTime[0];
        $minuto = $arrTime[1];

        return $hora .':'. $minuto;
    }

    public function setServicos($servicos)
    {
        $this->servicos = $servicos;
    }

    public function getServicos()
    {
        $stm = $this->conexao->prepare("select servico.nome from agendamento inner join agendamento_servico on agendamento.cod = agendamento_servico.agendamento inner join servico on agendamento_servico.servico = servico.cod where agendamento.cod = ?");
        $stm->bindParam(1, $this->cod, PDO::PARAM_INT);

        $stm->execute();
        $results = $stm->fetchAll(PDO::FETCH_ASSOC);
        $results = array_map(function($r) {
            return $r['nome'];
        }, $results);

        return implode(", ", $results);
    }
}
