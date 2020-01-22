<?php 
require_once('../../config.php'); 
require_once('../../api/Database/Veiculo.php');
include(HEADER_TEMPLATE); 

$veiculos = Veiculo::all();
?>
<header>
    <div class="row">
        <div class="col-md-6">
            <h2>Veículos</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a href="cadastro.php" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
            <a class="btn btn-info" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>
<table class="table table-hover">
    <thead>
        <th>Id</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Cor</th>
        <th>Ano</th>  
        <th>Portas</th>  
        <th>Combustível</th>  
        <th>Opções</th>  
    </thead>
    <tbody>
        <?php if($veiculos) : ?>
        <?php foreach($veiculos as $veiculo) :?>
            <tr>
                <td><?php echo $veiculo['id'] ?></td>
                <td><?php echo $veiculo['marca'] ?></td>
                <td><?php echo $veiculo['modelo'] ?></td>
                <td><?php echo $veiculo['cor'] ?></td>
                <td><?php echo $veiculo['ano'] ?></td>
                <td><?php echo $veiculo['portas'] ?></td>
                <td><?php echo $veiculo['combustivel'] ?></td>
                <td>
                    <a href="excluir.php?id=<?php echo $veiculo['id']; ?>" class="btn btn-danger" title="Excluir"><i class="fa fa-trash"></i></a>
                    <a href="editar.php?id=<?php echo $veiculo['id'];?>" class="btn btn-info" title="Editar"><i class="fa fa-pencil"></i></a>
                </td>
            </tr>
        <?php endforeach ?>
        <?php else : ?>
            <tr>
                <td colspan="6">Nenhum registro encontrado.</td>
            </tr>
        <?php endif ?>
    </tbody>
</table>

<?php include(FOOTER_TEMPLATE); ?>