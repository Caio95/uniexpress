<?php 
require_once('../../config.php');
require_once('../../api/Database/Veiculo.php');
include(HEADER_TEMPLATE); 

if(isset($_POST['marca']) && isset($_POST['modelo']) && isset($_POST['cor']) 
&& isset($_POST['ano']) && isset($_POST['portas']) && isset($_POST['combustivel']) ){
    if(empty($_POST['marca'])){ $erro = "Campo marca obrigatório";
    } else if(empty($_POST['modelo'])){ $erro = "Campo modelo obrigatório";
    } else if(empty($_POST['cor'])){ $erro = "Campo modelo obrigatório";
    } else if(empty($_POST['ano'])){ $erro = "Campo ano obrigatório"; 
    } else if(empty($_POST['portas'])){ $erro = "Campo portas obrigatório"; 
    } else if(empty($_POST['combustivel'])){ $erro = "Campo combustivel obrigatório"; 
    } else {
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $cor = $_POST['cor'];
        $ano = $_POST['ano'];
        $portas = $_POST['portas'];
        $combustivel = $_POST['combustivel'];
        $veiculo = Veiculo::add($marca, $modelo, $cor, $ano, $portas, $combustivel); 
        
        if($veiculo) {
            $sucesso = "Dados cadastrados com sucesso!";
        } else {
            echo json_encode(false);
            $erro = "Erro ao cadastrar veículo";
        }
    }
}

?>
<h2>Cadastro de Veículos</h2>

<?php
    if(isset($erro))
        echo '<div class="alert alert-danger" role="alert">'.$erro.'</div>';
    else
    if(isset($sucesso))
    echo '<div class="alert alert-success" role="alert">'.$sucesso.'</div>';
?>

 <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="marca">Marca *</label>
                <input type="text" class="form-control" placeholder="Marca do veículo" name="marca" >
            </div>
            <div class="form-group col-md-6">
                <label for="marca">Modelo *</label>
                <input type="text" class="form-control" placeholder="Modelo do veículo" name="modelo">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="marca">Cor *</label>
                <input type="text" class="form-control" placeholder="Cor do veículo" name="cor">
            </div>
            <div class="form-group col-md-4">
                <label for="marca">Ano *</label>
                <input type="number" class="form-control" placeholder="ano do veículo" name="ano">
            </div>
            <div class="form-group col-md-4">
                <label for="marca">Portas *</label>
                <input type="number" class="form-control" placeholder="Quantidade de portas" name="portas">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group  col-md-4">
                <label for="marca">Combustível *</label>
                <input type="text" class="form-control" placeholder="Tipo de combustível" name="combustivel">
            </div>
        </div>
        <div class="form-row col-md-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cadastrar</button>&nbsp;
            <a href="index.php" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
        </div>
</form>

<?php include(FOOTER_TEMPLATE); ?>