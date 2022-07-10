<?php 

require_once 'global.php';

try{
    $veiculo = new Veiculo();
    $veiculo->setIdVeiculo($_POST['idVeiculo']);
    $veiculo->setAnoVeiculo($_POST['txtAno']);
    $veiculo->setIdMarca($_POST['idMarca']);
    $veiculo->setCorVeiculo($_POST['txtCor']);
    $veiculo->setModeloVeiculo($_POST['txtModelo']);
    $veiculo->setValorVeiculo($_POST['txtValor']);
    $veiculo->editar();
    header("Location: index.php");
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>