<?php
require_once('../../api/Database/Veiculo.php');
if (!isset($_GET['id'])) {
    echo '';
    exit();
} else {
    $id = $_GET['id'];
    $veiculo = Veiculo::delete($id);
    header('location: index.php');
}
?>