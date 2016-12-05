<?php
use App\Controller\ClienteCTRL;
use App\Model\Cliente;
$mostrarAlerta = false;
$alert = [];
$clienteController = new ClienteCTRL();
$tempCliente = new Cliente();

if(isset($_POST['tipo-form'])) {
    $mostrarAlerta = true;

    switch($_POST['tipo-form']) {
    case 'cadastro':
        if ($clienteController->cadastrar($_POST)) {
            $alert = [
                'status' => 'success',
                'titulo' => 'Sucesso',
                'message' => 'Cliente cadastrado com sucesso!'
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
        if ($clienteController->deletar($_POST)) {
            $alert = [
                'status' => 'success',
                'titulo' => 'Sucesso',
                'message' => 'Cliente deletado com sucesso!'
            ];
        } else {
            $alert = [
                'status' => 'danger',
                'titulo' => 'Erro',
                'message' => 'Não foi possivel deletar o cliente!'
            ];
        }
        break;
    case 'buscar':
        $cliente = Cliente::buscar($_POST['cod']);
        if ($cliente) {
            $tempCliente = $cliente;
            $alert = [
                'status' => 'info',
                'titulo' => 'Encontrado',
                'message' => 'Cliente encontrado.'
            ];
        } else {
            $alert = [
                'status' => 'danger',
                'titulo' => 'Erro! ',
                'message' => 'Não foi possivel localizar o cliente.'
            ];
        }
        break;
    case 'editar':
        if ($clienteController->editar($_POST)) {
            $alert = [
                'status' => 'success',
                'titulo' => 'Sucesso',
                'message' => 'Cliente alterado com sucesso!'
            ];
        } else {
            $alert = [
                'status' => 'danger',
                'titulo' => 'Erro',
                'message' => 'Não foi possivel alterar o cliente!'
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
    <h4 class="card-title">Cadastrar Cliente</h4>
    <p class="card-text">Preencha o formulário para cadastrar um cliente.</p>
    <form method="POST" action="?action=1">
        <input type="hidden" name="tipo-form" value="cadastro">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="nomeCliente">Nome</label>
                    <input name="nome" type="text" class="form-control" id="nomeCliente" required>
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="emailCliente">E-mail</label>
                    <input name="email" type="email" class="form-control" id="emailCliente">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="telCliente">Telefone</label>
                    <input name="telefone" type="tel" class="form-control" id="telCliente" required>
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="logCliente">Logradouro</label>
                    <input name="logradouro" type="text" class="form-control" id="logCliente">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="numeroCliente">Número</label>
                    <input name="numero" type="text" class="form-control" id="numeroCliente">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="bairroCliente">Bairro</label>
                    <input name="bairro" type="text" class="form-control" id="bairroCliente">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="cidadeCliente">Cidade</label>
                    <input name="cidade" type="text" class="form-control" id="cidadeCliente">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="ufCliente">UF</label>
                    <input name="uf" type="text" class="form-control" id="ufCliente" maxlength="2">
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
    <h4 class="card-title">Deletar Cliente</h4>
    <p class="card-text">Informe o código do cliente a ser deletado.</p>
    <form method="POST" action="?action=1">
        <input type="hidden" name="tipo-form" value="deletar">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="codDeleteCliente">Código</label>
                    <input name="cod" type="text" class="form-control" id="codDeleteCliente" required>
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
    <h4 class="card-title">Editar Cliente</h4>
    <p class="card-text">Informe o código do cliente a ser editado.</p>
    <form method="POST" action="?action=1">
        <input type="hidden" name="tipo-form" value="buscar">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="codEditarCliente">Código</label>
                    <input name="cod" type="text" class="form-control" id="codEditarCliente" required>
                    <button type="submit" class="btn btn-success">Buscar</button>
                </div>
            </div>
        </div>
    </form>
    <form method="POST" action="?action=1">
        <input type="hidden" name="tipo-form" value="editar">
        <input type="hidden" name="cod" value="<?php echo $tempCliente->getCod(); ?>">
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="nomeEditarCliente">Nome</label>
                    <input name="nome" type="text" class="form-control" id="nomeEditarCliente" value="<?php echo $tempCliente->getNome(); ?>" required>
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="emailEditarCliente">E-mail</label>
                    <input name="email" type="email" class="form-control" id="emailEditarCliente" value="<?php echo $tempCliente->getEmail(); ?>">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="telEditarCliente">Telefone</label>
                    <input name="telefone" type="tel" class="form-control" id="telEditarCliente" value="<?php echo $tempCliente->getTelefone(); ?>" required>
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="logEditarCliente">Logradouro</label>
                    <input name="logradouro" type="text" class="form-control" id="logEditarCliente" value="<?php echo $tempCliente->getLogradouro(); ?>">
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="numeroEditarCliente">Número</label>
                    <input name="numero" type="text" class="form-control" id="numeroEditarCliente" value="<?php echo $tempCliente->getNumero(); ?>">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="bairroEditarCliente">Bairro</label>
                    <input name="bairro" type="text" class="form-control" id="bairroEditarCliente" value="<?php echo $tempCliente->getBairro(); ?>">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="cidadeEditarCliente">Cidade</label>
                    <input name="cidade" type="text" class="form-control" id="cidadeEditarCliente" value="<?php echo $tempCliente->getCidade(); ?>">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="ufEditarCliente">UF</label>
                    <input name="uf" type="text" class="form-control" id="ufEditarCliente" value="<?php echo $tempCliente->getUf(); ?>" maxlength="2">
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
    <h4 class="card-title">Lista de Clientes</h4>
    <p class="card-text">Lista de todos os clientes cadastrados.</p>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Bairro</th>
                <th>Cidade</th>
                <th>UF</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($clienteController->listar() as $cliente): ?>
                <tr>
                    <td><?php echo $cliente->getCod(); ?></td>
                    <td><?php echo $cliente->getNome(); ?></td>
                    <td><?php echo $cliente->getEmail(); ?></td>
                    <td><?php echo $cliente->getTelefone(); ?></td>
                    <td><?php echo $cliente->getLogradouro(); ?></td>
                    <td><?php echo $cliente->getNumero(); ?></td>
                    <td><?php echo $cliente->getBairro(); ?></td>
                    <td><?php echo $cliente->getCidade(); ?></td>
                    <td><?php echo $cliente->getUf(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
