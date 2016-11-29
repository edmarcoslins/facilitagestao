<div class="card card-block">
    <h4 class="card-title">Realizar Agendamento</h4>
    <p class="card-text">Preencha o formulário para realizar um novo agendamento.</p>
    <form>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="clienteAgendamento">Cliente</label>
                    <select class="form-control">
                        <option>Edmarcos</option>
                        <option>Bruno</option>
                        <option>Kleber</option>
                        <option>Gabriel</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="servicoAgendamento">Cliente</label>
                    <select class="form-control">
                        <option>Corte de Cabelo</option>
                        <option>Selagem</option>
                        <option>Manicure</option>
                        <option>Pedicure</option>
                        <option>Design de Sobrancelha</option>
                        <option>Depilação Total</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="dataAgendamento">Data</label>
                    <input type="date" class="form-control" id="dataAgendamento">
                </div>
            </div>
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="horaAgendamento">Hora</label>
                    <input type="time" class="form-control" id="horaAgendamento">
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
    <h4 class="card-title">Cancelar Agendamento</h4>
    <p class="card-text">Informe o código do agendamento a ser cancelado.</p>
    <form>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="codDeleteServico">Código</label>
                    <input type="text" class="form-control" id="codDeleteServico">
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
    <h4 class="card-title">Listar Agendamento por Data</h4>
    <p class="card-text">Informe a data dos agendamentos a ser listados.</p>
    <form>
        <div class="row">
            <div class="col-xs-3 col-md-3">
                <div class="form-group">
                    <label for="dataListarAgendamento">Data</label>
                    <input type="date" class="form-control" id="dataListarAgendamento">
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