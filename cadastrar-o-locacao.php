<?php 

require_once 'global.php';

try{
    $locacao = new Locacao();
    $locacao->setIdCliente($_POST['idCliente']);
    $locacao->setIdVeiculo($_POST['idVeiculo']);
    $locacao->setDTInicial($_POST['txtDI']);
    $locacao->setDTFinal($_POST['txtDF']);
    $locacao->setValorTotal($_POST['txtValorTotal']);
    echo $locacao->cadastrar();
    header("Location: index.php");
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>