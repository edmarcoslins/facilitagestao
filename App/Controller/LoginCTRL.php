<?php

namespace App\Controller;
use App\Model\Login;
use App\Model\Conexao;

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 19:54
 */
class LoginCTRL
{
    private $connection;
    /**
     * clienteCTRL constructor.
     */
    public function __construct()
    {

    }

    public function autenticacao(Login $login)
    {
        $conex  = new Conexao();
        $this->connection = $conex->getConnection();

        $email = $login->getEmail();
        $senha = $login->getSenha();
        $consulta = $this->connection->query("SELECT * FROM admin WHERE email = '$email' AND senha = $senha");
        return $consulta;
    }

}