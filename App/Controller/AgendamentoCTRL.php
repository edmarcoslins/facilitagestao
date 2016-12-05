<?php
namespace App\Controller;

use App\Model\Conexao;
use App\Model\Agendamento;

class AgendamentoCTRL
{
    public function cadastrar($requisicao)
    {
        $agendamento = new Agendamento();

        $agendamento->setCliente($requisicao['cliente']);
        $agendamento->setServicos($requisicao['servicos']);
        $agendamento->setData($requisicao['data']);

        return $agendamento->salvar();
    }

    public function editar($requisicao)
    {
        $agendamento = new Agendamento();

        $agendamento->setCod($requisicao['cod']);
        $agendamento->setNome($requisicao['nome']);
        $agendamento->setValor($requisicao['valor']);

        return $agendamento->salvar();
    }


    public function deletar($requisicao)
    {
        $cod = $requisicao['cod'];

        if(count($cod) == 0) {
            return false;
        }

        $agendamento = Agendamento::buscarPorCod($cod);

        if ($agendamento) {
            if ($agendamento->deletar()) {
                return true;
            }
        }

        return false;
    }

    public function listar($requisicao = null)
    {
        $clientes = Agendamento::todos();

        return $clientes;
    }

}
