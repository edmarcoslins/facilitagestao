<?php

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 19:47
 */
class Servico
{
    private $nome;
    private $valor;
    private $descricao;

    /**
     * servico constructor.
     * @param $nome
     * @param $valor
     * @param $descricao
     */
    public function __construct($nome, $valor, $descricao)
    {
        $this->nome = $nome;
        $this->valor = $valor;
        $this->descricao = $descricao;
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
        return $this->valor;
    }

    /**
     * @param mixed $valor
     */
    public function setValor($valor)
    {
        $this->valor = $valor;
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



}