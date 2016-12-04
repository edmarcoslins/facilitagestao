<?php
use App\Controller\ServicoCTRL;
use App\Model\Servico;
$mostrarAlerta = false;
$alert = [];
$servicoController = new ServicoCTRL();
$tempServico = new Servico();

if(isset($_POST['tipo-form'])) {
    $mostrarAlerta = true;

    switch($_POST['tipo-form']) {
    case 'cadastro':
        if ($servicoController->cadastrar($_POST)) {
            $alert = [
                'status' => 'success',
                'titulo' => 'Sucesso',
                'message' => 'Servico cadastrado com sucesso!'
            ];
        } else {
            $alert = [
                'status' => 'danger',
                'titulo' => 'Erro',
                'message' => 'Não foi possivel cadastrar o usuário!'
            ];
        }
        break;
    case 'deletar':
        if ($servicoController->deletar($_POST)) {
            $alert = [
                'status' => 'success',
                'titulo' => 'Sucesso',
                'message' => 'Servico deletado com sucesso!'
            ];
        } else {
            $alert = [
                'status' => 'danger',
                'titulo' => 'Erro',
                'message' => 'Não foi possivel deletar o Servico!'
            ];
        }
        break;
    case 'buscar':
        $servico = Servico::buscar($_POST['cod']);
        if ($servico) {
            $tempServico = $servico;
            $alert = [
                'status' => 'info',
                'titulo' => 'Encontrado',
                'message' => 'Servico encontrado.'
            ];
        } else {
            $alert = [
                'status' => 'danger',
                'titulo' => 'Erro! ',
                'message' => 'Não foi possivel localizar o Servico.'
            ];
        }
        break;
    case 'editar':
        if ($servicoController->editar($_POST)) {
            $alert = [
                'status' => 'success',
                'titulo' => 'Sucesso',
                'message' => 'Servico alterado com sucesso!'
            ];
        } else {
            $alert = [
                'status' => 'danger',
                'titulo' => 'Erro',
                'message' => 'Não foi possivel alterar o Servico!'
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
    <h4 class="card-title">Cadastrar Serviço</h4>
    <p class="card-text">Preencha o formulário para cadastrar um novo serviço.</p>
    <form method="POST" action="?action=2">
        <input type="hidden" name="tipo-form" value="cadastro">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="nomeServico">Nome</label>
                    <input name="nome" type="text" class="form-control" id="nomeServico">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="valorServico">Valor</label>
                    <input name="valor" type="text" class="form-control" id="valorServico">
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
<?php

?>

<div class="card card-block">
    <h4 class="card-title">Deletar Serviço</h4>
    <p class="card-text">Informe o código do serviço a ser deletado.</p>
    <form method="POST" action="?action=2">
        <input type="hidden" name="tipo-form" value="deletar">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="codDeleteServico">Código</label>
                    <input name="cod" type="text" class="form-control" id="codDeleteServico">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="card card-block">
    <h4 class="card-title">Editar Serviço</h4>
    <p class="card-text">Informe o código do serviço a ser editado.</p>
    <form method="POST" action="?action=2">
        <input type="hidden" name="tipo-form" value="buscar">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="codEditarCliente">Código</label>
                    <input name="cod" type="text" class="form-control" id="codEditarCliente">
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </div>
    </form>
    <form method="POST" action="?action=2">
        <input type="hidden" name="tipo-form" value="editar">
        <input type="hidden" name="cod" value="<?php echo $tempServico->getCod(); ?>">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="nomeEditarServico">Nome</label>
                    <input name="nome" type="text" class="form-control" id="nomeEditarServico" value="<?php echo $tempServico->getNome(); ?>">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="valorEditarServico">Valor</label>
                    <input name="valor" type="text" class="form-control" id="valorEditarServico" value="<?php echo $tempServico->getValor(); ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Editar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="card card-block">
    <h4 class="card-title">Lista de Serviços</h4>
    <p class="card-text">Lista de todos os serviços cadastrados.</p>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($servicoController->listar() as $servico): ?>
                <tr>
                    <td><?php echo $servico->getCod(); ?></td>
                    <td><?php echo $servico->getNome(); ?></td>
                    <td><?php echo $servico->getValorFormated(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
