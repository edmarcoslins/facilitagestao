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
        <div class="col-xs-6 col-md-6">
            <p class="h3 text-warning">Agende seu serviço em nosso salão.</p>
        </div>
    </div>
    <br>

    <div class="row">
        <form>

            <div class="row">
                <div class="col-xs-3 col-md-3">
                    <div class="form-group">
                        <label for="codCliente" class="text-white">Código</label>
                        <input type="text" maxlength="3" class="form-control" id="codCliente" aria-describedby="emailHelp" placeholder="915">
                        <small id="emailHelp" class="form-text text-white">Digite de cadastro. Caso não tenha, entre em contato conosco através dos telefones.</small>
                    </div>
                </div>
            </div><br>

            <div class="row">
                <div class="col-xs-12 col-md-6">
                        <label class="text-white">Selecione os serviços desejados.</label><br>
                        <div class="form-group">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" aria-label="..."><span class="text-white">Corte de Cabelo</span>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="2" aria-label="..."><span class="text-white">Selagem</span>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="3" aria-label="..."><span class="text-white">Manicure</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="4" aria-label="..."><span class="text-white">Pedicure</span>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="5" aria-label="..."><span class="text-white">Design de Sobrancelha</span>
                            </div>
                            <div class="form-check-inline">
                                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="6" aria-label="..."><span class="text-white">Depilação Total</span>
                            </div>
                            <small id="emailHelp" class="form-text text-white">Caso deseje um serviço que não esteja disponível, favor nos consultar para maiores informações.</small>
                        </div>
                </div>
            </div><br>

            <div class="row">
                <div class="col-xs-2 col-md-2">
                    <div class="form-group">
                        <label class="text-white">Dia e Hora</label>
                        <input type="date" class="form-control" id="codCliente" aria-describedby="emailHelp">
                        <input type="time" class="form-control" id="codCliente" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-white">Selecione uma data e hora</small>
                    </div>
                </div>
            </div><br>
            <button type="button" class="btn btn-warning">Agendar</button>
        </form>
    </div>
</div>
</body>
</html>