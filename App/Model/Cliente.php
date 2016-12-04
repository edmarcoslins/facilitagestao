<?php

namespace App\Model;

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 19:38
 */

use \PDO;

class Cliente
{
    private $conexao;

    private $cod;
    private $nome;
    private $email;
    private $telefone;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cidade;
    private $uf;
    private $ptreferencia;

    public function __construct()
    {
        $conex = new Conexao();
        $this->conexao = $conex->getConnection();
    }

    public function salvar()
    {
        if($this->cod){
            $stm = $this->conexao->prepare("UPDATE cliente SET nome=?,email=?,telefone=?,logradouro=?,numero=?,bairro=?,cidade=?,uf=? where cod = ?");
        $stm->bindParam(9, $this->cod, PDO::PARAM_INT);
        } else {
            $stm = $this->conexao->prepare("INSERT INTO cliente (nome,email,telefone,logradouro,numero,bairro,cidade,uf) values(?,?,?,?,?,?,?,?)");
        }

        $stm->bindParam(1, $this->nome, PDO::PARAM_STR);
        $stm->bindParam(2, $this->email, PDO::PARAM_STR);
        $stm->bindParam(3, $this->telefone, PDO::PARAM_STR);
        $stm->bindParam(4, $this->logradouro, PDO::PARAM_STR);
        $stm->bindParam(5, $this->numero, PDO::PARAM_STR);
        $stm->bindParam(6, $this->bairro, PDO::PARAM_STR);
        $stm->bindParam(7, $this->cidade, PDO::PARAM_STR);
        $stm->bindParam(8, $this->uf, PDO::PARAM_STR, 2);

        return $stm->execute();
    }

    public function deletar()
    {
        $stm = $this->conexao->prepare("DELETE FROM cliente where cod = ?");
        $stm->bindParam(1, $this->cod, PDO::PARAM_STR);

        return $stm->execute();
    }

    public static function buscar($cod)
    {
        $conex = new Conexao();
        $conexao = $conex->getConnection();

        $stm = $conexao->prepare("SELECT * FROM cliente where cod = ?");
        $stm->bindParam(1, $cod, PDO::PARAM_INT);
        $stm->execute();

        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $cliente = new Cliente();

            $cliente->setCod($result['cod']);
            $cliente->setNome($result['nome']);
            $cliente->setEmail($result['email']);
            $cliente->setTelefone($result['telefone']);
            $cliente->setLogradouro($result['logradouro']);
            $cliente->setNumero($result['numero']);
            $cliente->setBairro($result['bairro']);
            $cliente->setCidade($result['cidade']);
            $cliente->setUf($result['uf']);


            return $cliente;
        }

        return null;
    }

    public static function todos()
    {
        $conex = new Conexao();
        $conexao = $conex->getConnection();
        $clientes = [];

        $stm = $conexao->prepare("SELECT * FROM cliente");
        $res = $stm->execute();

        if ($res) {
            $results = $stm->fetchAll(PDO::FETCH_ASSOC);

            foreach($results as $result) {
                $cliente = new Cliente();

                $cliente->setCod($result['cod']);
                $cliente->setNome($result['nome']);
                $cliente->setEmail($result['email']);
                $cliente->setTelefone($result['telefone']);
                $cliente->setLogradouro($result['logradouro']);
                $cliente->setNumero($result['numero']);
                $cliente->setBairro($result['bairro']);
                $cliente->setCidade($result['cidade']);
                $cliente->setUf($result['uf']);

                $clientes[] = $cliente;
            }
        }
        return $clientes;
    }

    public function getCod()
    {
        return $this->cod;
    }

    public function setCod($cod)
    {
        $this->cod = $cod;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getLogradouro()
    {
        return $this->logradouro;
    }

    /**
     * @param mixed $logradouro
     */
    public function setLogradouro($logradouro)
    {
        $this->logradouro = $logradouro;
    }

    /**
     * @return mixed
     */
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * @param mixed $numero
     */
    public function setNumero($numero)
    {
        $this->numero = $numero;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * @param mixed $uf
     */
    public function setUf($uf)
    {
        $this->uf = $uf;
    }

    /**
     * @return mixed
     */
    public function getPtreferencia()
    {
        return $this->ptreferencia;
    }

    /**
     * @param mixed $ptreferencia
     */
    public function setPtreferencia($ptreferencia)
    {
        $this->ptreferencia = $ptreferencia;
    }



}
