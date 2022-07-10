<?php 

require_once 'global.php';

try{
    header("Location: index.php");
    $marca = new Marca();
    $marca->setIdMarca($_GET['id']);
    echo $marca->excluir();
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>