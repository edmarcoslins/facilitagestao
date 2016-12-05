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
    private $servico = [];
    private $data;

    public function __construct()
    {
        $conex = new Conexao();
        $this->conexao = $conex->getConnection();
    }

    public function salvar()
    {
        die(var_dump($this->servico));
        $stm = $this->conexao->prepare("INSERT INTO agendamento (cliente,servico,data) values(?,?,?)");

        $stm->bindParam(1, $this->cliente, PDO::PARAM_INT);
        $stm->bindParam(2, $this->servico, PDO::PARAM_INT);
        $stm->bindParam(3, $this->data, PDO::PARAM_STR);

        return $stm->execute();
    }

    public function deletar()
    {
        $stm = $this->conexao->prepare("DELETE FROM agendamento where cod = ?");
        $stm->bindParam(1, $this->cod, PDO::PARAM_STR);

        return $stm->execute();
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
            $agendamento->setServico($result['servico']);
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

        $stm = $conexao->prepare("SELECT * FROM agendamento where data between ? and ?");
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
            $agendamento->setServico($result['servico']);
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

    public function setServico($servico)
    {
        $this->servico = $servico;
    }

    public function getServico()
    {
        return Servico::buscar($this->servico)->getNome();
    }
}
