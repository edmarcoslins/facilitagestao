<?php

namespace App\Model;

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 20:29
 */
class Conexao
{
    private $connect;

    /**
     * conexao constructor.
     * @param $host
     * @param $dbname
     * @param $user
     * @param $pass
     */
    public function __construct()
    {
        try {
            $this->connect = new PDO('mysql:host=localhost;dbname=facgst', 'root', '');
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getConnection() {
        return $this->connect;
    }

}