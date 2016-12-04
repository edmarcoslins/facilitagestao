<?php

//require_once '../App/Model/Login.php';
namespace App\Controller;
use App\Model\Login;

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 19:54
 */
class LoginCTRL
{

    /**
     * clienteCTRL constructor.
     */
    public function __construct()
    {
        $login = new Login();
    }

    public function cadastrar()
    {
        $conex = new Conexao();
        $connection = $conex->getConnection();
        $res = $connection->exec("INSERT INTO cliente (nome) VALUES ('TESTE')");
    }

}