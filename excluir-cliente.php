<?php 

require_once 'global.php';

try{
    header("Location: index.php");
    $cliente = new Cliente();
    $cliente->setIdCliente($_GET['id']);
    echo $cliente->excluir();
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>