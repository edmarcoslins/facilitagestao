<?php

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 29/11/2016
 * Time: 00:55
 */
class Login
{
    private $cod;
    private $nome;
    private $email;
    private $senha;

    /**
     * Login constructor.
     * @param $cod
     * @param $nome
     * @param $email
     * @param $senha
     */
    public function __construct($cod, $nome, $email, $senha)
    {
        $this->cod = $cod;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    /**
     * @return mixed
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * @param mixed $cod
     */
    public function setCod($cod)
    {
        $this->cod = $cod;
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
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * @param mixed $senha
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

}