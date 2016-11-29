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

    //Se for botão 'Clientes'
    if(($action == 1) || (!isset($action))) {
        include './assets/includes/cliente.inc';
    }

    if($action == 2) {
        include './assets/includes/servicos.inc';
    }

    if($action == 3) {
        include './assets/includes/agendamento.inc';
    }

    ?>

</div>
</body>
</html>