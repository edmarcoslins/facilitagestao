<?php
use App\Controller\AgendamentoCTRL;
use App\Model\Agendamento;
use App\Model\Cliente;
use App\Model\Servico;
$mostrarAlerta = false;
$alert = [];
$agendamentoController = new AgendamentoCTRL();
$tempAgendamentos = [];

if(isset($_POST['tipo-form'])) {
    $mostrarAlerta = true;

    switch($_POST['tipo-form']) {
    case 'cadastro':
        if ($agendamentoController->cadastrar($_POST)) {
            $alert = [
                'status' => 'success',
                'titulo' => 'Sucesso',
                'message' => 'Agendamento realizado com sucesso!'
            ];
        } else {
            $alert = [
                'status' => 'danger',
                'titulo' => 'Erro',
                'message' => 'Não foi possivel realizar o agendamento!'
            ];
        }
        break;
    case 'deletar':
        if ($agendamentoController->deletar($_POST)) {
            $alert = [
                'status' => 'success',
                'titulo' => 'Sucesso',
                'message' => 'Agendamento cancelado com sucesso!'
            ];
        } else {
            $alert = [
                'status' => 'danger',
                'titulo' => 'Erro',
                'message' => 'Não foi possivel cancelar o agendamento!'
            ];
        }
        break;
    case 'buscar':
        $tempAgendamentos = Agendamento::buscarPorData($_POST['data']);
        if (count($tempAgendamentos) > 0) {
            $alert = [
                'status' => 'info',
                'titulo' => 'Encontrado',
                'message' => 'Agendamentos encontrados.'
            ];
        } else {
            $alert = [
                'status' => 'info',
                'titulo' => 'Sem Resultados! ',
                'message' => 'Nenhum agendamento para esta data.'
            ];
        }
        break;
    }
}

?>

<?php if($mostrarAlerta): ?>
<div class="alert alert-<?php echo $alert['status']; ?>" role="alert">
  <h4 class="alert-heading"><?php echo $alert['titulo']; ?></h4>
  <p></strong> <?php echo $alert['message']; ?></p>
</div>
<?php $mostrarAlerta = false; endif; ?>
<div class="card card-block">
    <h4 class="card-title">Realizar Agendamento</h4>
    <p class="card-text">Preencha o formulário para realizar um novo agendamento.</p>
    <form method="POST" action="?action=3">
        <input type="hidden" name="tipo-form" value="cadastro">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="clienteAgendamento">Cliente</label>
                    <select name="cliente" class="form-control">
                    <?php foreach(Cliente::todos() as $cliente): ?>
                        <option value="<?php echo $cliente->getCod(); ?>"><?php echo $cliente->getNome(); ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="servicoAgendamento">Serviços</label>
                    <select multiple name="servicos[]" class="form-control" required>
                    <?php foreach(Servico::todos() as $servico): ?>
                        <option value="<?php echo $servico->getCod(); ?>"><?php echo $servico->getNome(); ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="dataAgendamento">Data</label>
                    <input name="data" type="datetime-local" class="form-control" id="dataAgendamento" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="card card-block">
    <h4 class="card-title">Cancelar Agendamento</h4>
    <p class="card-text">Informe o código do agendamento a ser cancelado.</p>
    <form method="POST" action="?action=3">
        <input type="hidden" name="tipo-form" value="deletar">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="codDeleteServico">Código</label>
                    <input name="cod" type="text" class="form-control" id="codDeleteServico" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="card card-block">
    <h4 class="card-title">Listar Agendamento por Data</h4>
    <p class="card-text">Informe a data dos agendamentos a ser listados.</p>
    <form method="POST" action="?action=3">
        <input type="hidden" name="tipo-form" value="buscar">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="dataListarAgendamento">Data</label>
                    <input name="data" type="date" class="form-control" id="dataListarAgendamento" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </div>
    </form>
    <?php if(count($tempAgendamentos) > 0): ?>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Cliente</th>
                    <th>Servicos</th>
                    <th>Data</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($tempAgendamentos as $agendamento): ?>
                    <tr>
                        <td><?php echo $agendamento->getCod(); ?></td>
                        <td><?php echo $agendamento->getCliente(); ?></td>
                        <td><?php echo $agendamento->getServicos(); ?></td>
                        <td><?php echo $agendamento->getDataFormated(); ?></td>
                        <td><?php echo $agendamento->getHoraFormated(); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
