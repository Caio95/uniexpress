<?php require_once('config.php');  
include(HEADER_TEMPLATE) ?>

<h1>Dashboard</h1>

<div class="row">
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="views/Agenda/index.php" class="btn btn-success">
            <div class="row">
                <div class="col-lg-12 text-center">
                <i class="fa fa-calendar fa-2x" aria-hidden="true"></i><p> Agendamento</p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-xs-6 col-sm-3 col-md-2">
        <a href="views/Veiculo/index.php" class="btn btn-info">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <i class="fa fa-car fa-2x" aria-hidden="true"></i>
                    <p>Lista de Veículos</p>
                </div>
            </div>
        </a>
    </div>
</div>

<?php include(FOOTER_TEMPLATE)?>
