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

        $res = $agendamento->salvar();

        if ($res) {
            enviarEmail($agendamento->getClienteEmail(), "Agendamento Realizado - Facilita Gestão", "<h3>Agendamento realizado com sucesso!</h3><br><br>Código de agendamento: {$agendamento->getCod()}<br>Servicos: {$agendamento->getServicos()}<br>Total dos servicos: {$agendamento->getServicosTotal()}<br>Data: {$agendamento->getDataFormated()}<br>Hora: {$agendamento->getHoraFormated()}");
        }

        return $res;
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
                enviarEmail($agendamento->getClienteEmail(), "Agendamento Cancelado - Facilita Gestão", "<h3>Seu agendamento foi cancelado.</h3><br>Data: {$agendamento->getDataFormated()}<br>Hora: {$agendamento->getHoraFormated()}");
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
