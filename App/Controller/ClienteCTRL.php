<?php

//require_once '../App/Model/Cliente.php';
//require_once '../App/Model/Conexao.php';

namespace App\Controller;

use App\Model\Conexao;
use App\Model\Cliente;

class ClienteCTRL
{
    public function cadastrar($requisicao)
    {
        $cliente = new Cliente();
        $cliente->setNome($requisicao['nome']);
        $cliente->setEmail($requisicao['email']);
        $cliente->setTelefone($requisicao['telefone']);
        $cliente->setLogradouro($requisicao['logradouro']);
        $cliente->setNumero($requisicao['numero']);
        $cliente->setBairro($requisicao['bairro']);
        $cliente->setCidade($requisicao['cidade']);
        $cliente->setUf($requisicao['uf']);

        return $cliente->salvar();
    }

    public function editar($requisicao)
    {
        $cliente = new Cliente();

        $cliente->setCod($requisicao['cod']);
        $cliente->setNome($requisicao['nome']);
        $cliente->setEmail($requisicao['email']);
        $cliente->setTelefone($requisicao['telefone']);
        $cliente->setLogradouro($requisicao['logradouro']);
        $cliente->setNumero($requisicao['numero']);
        $cliente->setBairro($requisicao['bairro']);
        $cliente->setCidade($requisicao['cidade']);
        $cliente->setUf($requisicao['uf']);

        return $cliente->salvar();
    }

    public function deletar($requisicao)
    {
        $cod = $requisicao['cod'];

        if(count($cod) == 0) {
            return false;
        }

        $cliente = Cliente::buscar($cod);

        if ($cliente) {
            if ($cliente->deletar()) {
                return true;
            }
        }

        return false;
    }

    public function listar($requisicao = null)
    {
        $clientes = Cliente::todos();

        return $clientes;
    }

}
