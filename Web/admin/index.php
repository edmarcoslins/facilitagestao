<?php
    require __DIR__.'./../../vendor/autoload.php';

    use App\Controller\LoginCTRL;
    use App\Model\Login;
?>


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
    <div class="card card-block">
        <h4 class="card-title">Login</h4>
        <p class="card-text">Preencha o formulário para acessar o sistema.</p>
        <form action="" method="post">
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="emailLogin">E-mail</label>
                        <input type="text" name="login" class="form-control" id="emailLogin">
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="valorServico">Senha</label>
                        <input type="password" name="senha" class="form-control" id="senhaLogin">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <button type="submit" name="logar" class="btn btn-success">Acessar</button>
                    </div>
                </div>
            </div>
        </form>
        <?php
        @$logar = $_POST['logar'];
        if(isset($logar)) {
            $email = $_POST['login'];
            $senha = $_POST['senha'];
            if((!empty($email)) && (!empty($senha))) {
                $admin = new Login($email, $senha);
                $login = new LoginCTRL();
                $res = $login->autenticacao($admin);
                $linha = $res->fetch(PDO::FETCH_ASSOC);
                if($linha["cod"] != null){
                    session_start();
                    $_SESSION['cod'] = $linha['cod'];
                    $_SESSION['nome'] = $linha['nome'];
                    $_SESSION['email'] = $linha['email'];
                    $_SESSION['senha'] = $linha['senha'];
                    echo "<meta HTTP-EQUIV='Refresh' CONTENT='0;URL=/Web/admin/admin.php'>";
                }
            }
        }
        ?>
    </div>

</div>
</body>
</html>
