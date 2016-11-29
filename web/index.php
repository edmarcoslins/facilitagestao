<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Facilita Gestão</title>
    <link rel="stylesheet" href="./bootstrap-4.0.0-alpha.5-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/dafult.css">
    <script src="./bootstrap-4.0.0-alpha.5-dist/js/bootstrap.js"></script>
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-xs-12 col-md-12">
            <p class="h1 text-warning">Agende seu serviço em nosso salão.</p>
        </div>
    </div>
    <br>

    <nav class="navbar navbar-light ">
    <div class="row">
        <form>

            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="codCliente" class="text-white"><strong>Código</strong></label>
                        <input type="text" maxlength="3" class="form-control" id="codCliente" aria-describedby="emailHelp" placeholder="915">
                        <small id="emailHelp" class="form-text text-white">Digite de cadastro. Caso não tenha, entre em contato conosco através do telefone (83) 3081-2781.</small>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div class="col-xs-3 col-md-3">
                        <label class="text-white"><strong>Selecione os serviços desejados.</strong></label><br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-2 col-md-2">
                    <div class="form-group">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" aria-label="..."><span class="text-white">Corte de Cabelo</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="2" aria-label="..."><span class="text-white">Selagem</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2 col-md-2">
                    <div class="form-group">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="3" aria-label="..."><span class="text-white">Manicure</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="4" aria-label="..."><span class="text-white">Pedicure</span>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="3" aria-label="..."><span class="text-white">Depilação Total</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="4" aria-label="..."><span class="text-white">Design de Sobrancelha</span>
                        </div>
                    </div>
                </div>
            </div>




            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="dataAgendamento" class="text-white"><strong>Data</strong></label>
                        <input type="date" class="form-control" id="dataAgendamento">
                    </div>
                </div>
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="horaAgendamento" class="text-white"><strong>Hora</strong></label>
                        <input type="time" class="form-control" id="horaAgendamento">
                    </div>
                </div>
            </div><br>
            <button type="button" class="btn btn-warning"><strong>Agendar</strong></button>
        </form>
    </div>
    </nav>

</div>
</body>
</html>