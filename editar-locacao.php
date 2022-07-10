<?php 

require_once 'global.php';

try{
    $locacao = new Locacao();
    $locacao->setIdLocacao($_POST['id']);
    $locacao->setIdCliente($_POST['idCliente']);
    $locacao->setIdVeiculo($_POST['idVeiculo']);
    $locacao->setDTInicial($_POST['txtDI']);
    $locacao->setDTFinal($_POST['txtDF']);
    $locacao->setValorTotal($_POST['txtValorTotal']);
    echo $locacao->editar();
    header("Location: index.php");
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>