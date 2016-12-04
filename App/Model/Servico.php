<?php

namespace App\Model;

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 19:47
 */
use \PDO;

class Servico
{
    private $cod;
    private $nome;
    private $valor;
    private $descricao;

    public function __construct()
    {
        $conex = new Conexao();
        $this->conexao = $conex->getConnection();
    }

    public function salvar()
    {
        if($this->cod){
            $stm = $this->conexao->prepare("UPDATE servico SET nome=?,valor=? where cod = ?");
        $stm->bindParam(3, $this->cod, PDO::PARAM_INT);
        } else {
            $stm = $this->conexao->prepare("INSERT INTO servico (nome,valor) values(?,?)");
        }

        $stm->bindParam(1, $this->nome, PDO::PARAM_STR);
        $stm->bindParam(2, $this->valor, PDO::PARAM_STR);

        return $stm->execute();
    }

    public function deletar()
    {
        $stm = $this->conexao->prepare("DELETE FROM servico where cod = ?");
        $stm->bindParam(1, $this->cod, PDO::PARAM_STR);

        return $stm->execute();
    }

    public static function buscar($cod)
    {
        $conex = new Conexao();
        $conexao = $conex->getConnection();

        $stm = $conexao->prepare("SELECT * FROM servico where cod = ?");
        $stm->bindParam(1, $cod, PDO::PARAM_INT);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $servico = new Servico();

            $servico->setCod($result['cod']);
            $servico->setNome($result['nome']);
            $servico->setValor($result['valor']);

            return $servico;
        }

        return null;
    }

    public static function todos()
    {
        $conex = new Conexao();
        $conexao = $conex->getConnection();
        $servicos = [];

        $stm = $conexao->prepare("SELECT * FROM servico");
        $res = $stm->execute();

        if ($res) {
            $results = $stm->fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $result) {
                $servico = new Servico();

                $servico->setCod($result['cod']);
                $servico->setNome($result['nome']);
                $servico->setValor($result['valor']);

                $servicos[] = $servico;
            }
        }
        return $servicos;
    }
    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getValor()
    {
        return str_replace('.', ',', $this->valor);
    }

    public function getValorFormated()
    {
        return 'R$ '. number_format($this->valor, 2, ',', '.');
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = number_format(str_replace(',', '.', $valor), 2, '.', ',');
    }

    /**
     * @return mixed
     */
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * @param mixed $descricao
     */
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }


    public function getCod()
    {
        return $this->cod;
    }

    public function setCod($cod)
    {
        $this->cod = $cod;
    }

}
