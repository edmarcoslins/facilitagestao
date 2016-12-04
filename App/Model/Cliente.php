<?php

namespace App\Model;

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 19:38
 */
class Cliente
{
    private $nome;
    private $telefone;
    private $logradouro;
    private $numero;
    private $bairro;
    private $cidade;
    private $uf;
    private $ptreferencia;

    /**
     * cliente constructor.
     * @param $nome
     * @param $telefone
     * @param $logradouro
     * @param $numero
     * @param $bairro
     * @param $cidade
     * @param $uf
     * @param $ptreferencia
     */
    public function __construc($nome, $telefone, $logradouro, $numero, $bairro, $cidade, $uf, $ptreferencia)
    {
        $this->nome = $nome;
        $this->telefone = $telefone;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->ptreferencia = $ptreferencia;
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