<?php
require_once('../../config.php');
require_once('../../api/Database/Veiculo.php');
include(HEADER_TEMPLATE); 

if (!isset($_GET['id'])) {
    echo '';
    exit();
} else{
    $id = $_GET['id'];
    $veiculo = Veiculo::find($id); 
    
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
            $veiculo = Veiculo::update($marca, $modelo, $cor, $ano, $portas, $combustivel, $id); 
            
            header('location: index.php');
        }
    }
}
?>
<h2>Editar de Veículos</h2>
 <form action="editar.php?id=<?php echo $veiculo['id'] ?>" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="marca">Marca *</label>
                <input type="text" class="form-control" placeholder="Marca do veículo" name="marca" value="<?php echo $veiculo['marca']; ?>" >
            </div>
            <div class="form-group col-md-6">
                <label for="marca">Modelo *</label>
                <input type="text" class="form-control" placeholder="Modelo do veículo" name="modelo" value="<?php echo $veiculo['modelo']; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="marca">Cor *</label>
                <input type="text" class="form-control" placeholder="Cor do veículo" name="cor" value="<?php echo $veiculo['cor']; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="marca">Ano *</label>
                <input type="number" class="form-control" placeholder="ano do veículo" name="ano" value="<?php echo $veiculo['ano']; ?>">
            </div>
            <div class="form-group col-md-4">
                <label for="marca">Portas *</label>
                <input type="number" class="form-control" placeholder="Quantidade de portas" name="portas" value="<?php echo $veiculo['portas']; ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group  col-md-4">
                <label for="marca">Combustível *</label>
                <input type="text" class="form-control" placeholder="Tipo de combustível" name="combustivel" value="<?php echo $veiculo['combustivel']; ?>">
            </div>
        </div>
        <div class="form-row">
            <button type="submit" class="btn btn-info">Editar</button>
            <a href="index.php" class="btn btn-default">Cancelar</a>
        </div>
</form>
<?php include(FOOTER_TEMPLATE); ?>