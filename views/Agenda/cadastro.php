<?php
require_once('../../config.php');  
require_once('../../api/Database/Veiculo.php');
require_once('../../api/Database/Agenda.php');

include(HEADER_TEMPLATE);
$veiculos = Veiculo::all();

if(isset($_POST['data']) && isset($_POST['cpf']) && isset($_POST['nome']) 
&& isset($_POST['idVeiculo']) ){
    if(empty($_POST['data'])){ $erro = "Campo data obrigatório";
    } else if(empty($_POST['cpf'])){ $erro = "Campo cpf obrigatório";
    } else if(empty($_POST['nome'])){ $erro = "Campo nome obrigatório";
    } else if(empty($_POST['idVeiculo'])){ $erro = "Campo veiculo obrigatório"; 
    } else {
        if(checkCar($_POST['data'],$_POST['idVeiculo'])){
            if(!checkFds($_POST['data'])){
                $data = $_POST['data'];
                $cpf = $_POST['cpf'];
                $nome = $_POST['nome'];
                $idVeiculo = $_POST['idVeiculo'];
                $observacao = $_POST['observacao'];
                $agendamento = Agenda::add($data, $cpf, $nome, $idVeiculo, $observacao); 
                if($agendamento) {
                    $sucesso = "Dados cadastrados com sucesso!";
                } else {
                    echo json_encode(false);
                    $erro = "Erro ao cadastrar veículo";
                }
            } else {
                $erro = "Não é possível agendar no fim de semana";
            }
        } else {
            $erro = "O carro não está disponível nesta data";
        }
    }
}

function checkFds($day){
    $nameDay = date("D", strtotime($day));
    $fds = false;  
    if ($nameDay == "Sat" || $nameDay == "Sun"){
      $fds = true;
    } return $fds;
}

function checkCar($data, $veiculo){
    $veiculo = Agenda::available($data, $veiculo);
    if($veiculo == null){
        return true;
    } else{
        return false;
    }
}   

?>
<h2>Inserir Agendamento</h2>
<?php
    if(isset($erro))
        echo '<div class="alert alert-danger" role="alert">'.$erro.'</div>';
    else
    if(isset($sucesso))
    echo '<div class="alert alert-success" role="alert">'.$sucesso.'</div>';
?>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="marca">Data *</label>
            <input type="date" class="form-control" name="data" >
        </div>
        <div class="form-group col-md-3">
            <label for="marca">CPF *</label>
            <input type="number" class="form-control" placeholder="Informa o CPF" name="cpf">
        </div>
        <div class="form-group col-md-5">
            <label for="marca">Funcionario *</label>
            <input type="text" class="form-control" placeholder="Nome completo" name="nome">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="marca">Veículo *</label>
            <select  class="form-control" name="idVeiculo">
                <option value="">Selecione o veículo</option>
                <?php foreach($veiculos as $veiculo) : ?>
                    <option value="<?php echo $veiculo['id'] ?>"><?php echo $veiculo['modelo'] ?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group col-md-7">
            <label for="marca">Observação</label>
            <input type="text" class="form-control" placeholder="Observação" name="observacao">
        </div>
    </div>
    <div class="form-row d-flex justify-content-center">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cadastrar</button>&nbsp;
        <a href="index.php" class="btn btn-danger"><i class="fa fa-close"></i> Cancelar</a>
    </div>
</form>