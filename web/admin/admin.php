<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Facilita Gestão Administração</title>
    <link rel="stylesheet" href="../bootstrap-4.0.0-alpha.5-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/dafult.css">
    <script src="../bootstrap-4.0.0-alpha.5-dist/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <br>

    <nav class="navbar navbar-dark bg-primary">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link text-white" href="admin.php?action=1">Clientes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin.php?action=2">Serviços</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin.php?action=3">Agendamentos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="admin.php?action=4">Loggout</a>
            </li>
        </ul>
    </nav>
    <br>

    <?php
    //Verificação do Menu selecionado
    @$action = $_GET['action'];

    if(($action == 1) || (!isset($action))) {?>
    <div class="card card-block">
        <h4 class="card-title">Cadastrar Cliente</h4>
        <p class="card-text">Preencha o formulário para cadastrar um cliente.</p>
        <form>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="nomeCliente">Nome</label>
                        <input type="text" class="form-control" id="nomeCliente">
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="telCliente">Telefone</label>
                        <input type="text" class="form-control" id="telCliente">
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="logCliente">Logradouro</label>
                        <input type="text" class="form-control" id="logCliente">
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="numeroCliente">Número</label>
                        <input type="text" class="form-control" id="numeroCliente">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="bairroCliente">Bairro</label>
                        <input type="text" class="form-control" id="bairroCliente">
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="cidadeCliente">Cidade</label>
                        <input type="text" class="form-control" id="cidadeCliente">
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="ufCliente">UF</label>
                        <input type="text" class="form-control" id="ufCliente">
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="pontoRefCliente">Ponto de Referência</label>
                        <input type="text" class="form-control" id="pontoRefCliente">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <button type="button" class="btn btn-success">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card card-block">
        <h4 class="card-title">Deletar Cliente</h4>
        <p class="card-text">Informe o código do cliente a ser deletado.</p>
        <form>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="codDeleteCliente">Código</label>
                        <input type="text" class="form-control" id="codDeleteCliente">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <button type="button" class="btn btn-danger">Deletar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card card-block">
        <h4 class="card-title">Editar Cliente</h4>
        <p class="card-text">Informe o código do cliente a ser editado.</p>
        <form>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="codEditarCliente">Código</label>
                        <input type="text" class="form-control" id="codEditarCliente">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <button type="button" class="btn btn-success">Buscar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card card-block">
        <h4 class="card-title">Lista de Clientes</h4>
        <p class="card-text">Lista de todos os clientes cadastrados.</p>
    </div>
    <?php }?>

</div>
</body>
</html>