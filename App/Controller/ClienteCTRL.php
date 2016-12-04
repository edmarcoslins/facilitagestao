<?php

//require_once '../App/Model/Cliente.php';
//require_once '../App/Model/Conexao.php';

namespace App\Controller;

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 19:54
 */
class ClienteCTRL
{

    /**
     * clienteCTRL constructor.
     */
    public function __construct()
    {
        $cliente = new Cliente();
    }

    public function cadastrar()
    {
        $conex = new Conexao();
        $connection = $conex->getConnection();
        $res = $connection->exec("INSERT INTO cliente (nome) VALUES ('TESTE')");
        if($res) {
            // SUCESSO
        } else {
            // Falhou
        }
        return 'ok';
    }

}