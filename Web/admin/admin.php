<?php
    session_start();
    require __DIR__.'./../../vendor/autoload.php';
    $dotenv = new Dotenv\Dotenv(__DIR__. '/../../');
    $dotenv->load();

    function enviarEmail($to, $assunto, $msg) {
        try {
            $transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
                  ->setUsername(getenv("GMAIL_EMAIL"))
                  ->setPassword(getenv("GMAIL_SENHA"));

            $mailer = Swift_Mailer::newInstance($transport);
            $message = Swift_Message::newInstance($assunto)
              ->setFrom(array(getenv("GMAIL_EMAIL") => 'Facilita Gestão'))
              ->setTo(array($to))
              ->setBody($msg, 'text/html');
            return $mailer->send($message);
        } catch(\Exception $e) {
            echo $e->getMessage();
            return false;
        }

    }

    if( !isset($_SESSION['cod']) or !isset($_SESSION['nome']) or !isset($_SESSION['email']) or !isset($_SESSION['senha']) ) {
        echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;/facilitagestao/Web/admin/index.php'>";
    } else {
        @$actionLogout = $_GET['logout'];
        if($actionLogout == true) {
            session_destroy();
            echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;/facilitagestao/Web/admin/index.php'>";
        }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Facilita Gestão Administração</title>
    <link rel="stylesheet" href="../bootstrap-4.0.0-alpha.5-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/dafult.css">
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
            <li class="nav-item"> <a class="nav-link text-white" href="admin.php?logout=true">Loggout</a>
            </li>
        </ul>
    </nav>
    <br>

    <?php
    //Verificação do Menu selecionado
    @$action = $_GET['action'];

    //Se for botão 'Clientes'
    if(($action == 1) || (!isset($action))) {
        include './assets/includes/cliente.inc.php';
    }

    if($action == 2) {
        include './assets/includes/servicos.inc.php';
    }

    if($action == 3) {
        include './assets/includes/agendamento.inc.php';
    }

    ?>

</div>
    <script src="../assets/tether-1.3.3/dist/js/tether.min.js"></script>
    <script src="../assets/jQuery/jquery-2.2.3.min.js"></script>
    <script src="../bootstrap-4.0.0-alpha.5-dist/js/bootstrap.js"></script>
</body>
</html>
<?php }?>
