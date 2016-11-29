<?php

/**
 * Created by PhpStorm.
 * User: Edmarcos
 * Date: 27/11/2016
 * Time: 19:50
 */
class Agendamento
{
    private $cliente;
    private $servico;
    private $data;
    private $hora;

    /**
     * agendamento constructor.
     * @param $cliente
     * @param $servico
     * @param $data
     * @param $hora
     */
    public function __construct($cliente, $servico, $data, $hora)
    {
        $this->cliente = $cliente;
        $this->servico = $servico;
        $this->data = $data;
        $this->hora = $hora;
    }

    /**
     * @return mixed
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * @param mixed $cliente
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;
    }

    /**
     * @return mixed
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * @param mixed $hora
     */
    public function setHora($hora)
    {
        $this->hora = $hora;
    }

}