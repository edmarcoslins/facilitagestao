<?php
namespace App\Controller;

use App\Model\Conexao;
use App\Model\Servico;

class ServicoCTRL
{
    public function cadastrar($requisicao)
    {
        $servico = new Servico();
        $servico->setNome($requisicao['nome']);
        $servico->setValor($requisicao['valor']);

        return $servico->salvar();
    }

    public function editar($requisicao)
    {
        $servico = new Servico();

        $servico->setCod($requisicao['cod']);
        $servico->setNome($requisicao['nome']);
        $servico->setValor($requisicao['valor']);

        return $servico->salvar();
    }

    public function deletar($requisicao)
    {
        $cod = $requisicao['cod'];

        if(count($cod) == 0) {
            return false;
        }

        $servico = Servico::buscar($cod);

        if ($servico) {
            if ($servico->deletar()) {
                return true;
            }
        }

        return false;
    }

    public function listar($requisicao = null)
    {
        $clientes = Servico::todos();

        return $clientes;
    }

}
