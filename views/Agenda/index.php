<?php 
require_once('../../config.php');  
require_once('../../api/Database/Agenda.php');
require_once('../../api/Database/Veiculo.php');

include(HEADER_TEMPLATE);

if(isset($_POST['dataI']) && isset($_POST['dataF'])){
    if(empty($_POST['dataI'])){ $erro = "Campo data obrigatório";
    } else if(empty($_POST['dataF'])){ $erro = "Campo cpf obrigatório";
    } else{
        $dataI = $_POST['dataI'];
        $dataF = $_POST['dataF'];
        $agendamentos = Agenda::period($dataI, $dataF);
    }
} else {
    $agendamentos = Agenda::all();
}


function nameCar($idVeiculo){
    $veiculos = Veiculo::all();
    foreach($veiculos as $veiculo){
        if($veiculo['id'] == $idVeiculo){
            return $veiculo['marca'].' '.$veiculo['modelo'];
        }
    }
}
?>
<?php
    if(isset($erro))
        echo '<div class="alert alert-danger" role="alert">'.$erro.'</div>';
    else
    if(isset($sucesso))
    echo '<div class="alert alert-success" role="alert">'.$sucesso.'</div>';
?>
<header>
    <div class="row">
        <div class="col-md-3">
            <h2>Agendamentos</h2>
        </div>
        <div class="col-md-6">
            <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST" class="form-inline">
                <input type="date" class="form-control mb-1 mr-sm-1" name="dataI"/>
                <input type="date" class="form-control mb-1 mr-sm-1" name="dataF"/>
                <button type="submit" class="btn btn-primary mb-2 mr-sm-2" title="Buscar"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="col-sm-3 text-right h2">
            <a href="cadastro.php" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
            <a class="btn btn-info" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>
<table class="table table-hover">
    <thead>
        <th>Data</th>
        <th>CPF</th>
        <th>Funcionario</th>
        <th>Carro</th>  
        <th>Observação</th>  
    </thead>
    <tbody>
        <?php if($agendamentos) : ?>
            <?php foreach($agendamentos as $evento) :?>
                <tr>
                    <td><?php echo date("d/m/Y", strtotime($evento['data'])) ?></td>
                    <td><?php echo $evento['cpf'] ?></td>
                    <td><?php echo $evento['nome'] ?></td>
                    <td><?php echo nameCar($evento['idVeiculo']) ?></td>
                    <td><?php echo $evento['observacao'] ?></td>
                </tr>
            <?php endforeach ?>
            <?php else : ?>
                <tr>
                    <td colspan="6">Nenhum registro encontrado.</td>
                </tr>
        <?php endif ?>
    </tbody>
</table>

<?php include(FOOTER_TEMPLATE)?>