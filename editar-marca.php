<?php 

require_once 'global.php';

try{
    $marca = new Marca();
    $marca->setIdMarca($_POST['id']);
    $marca->setNomeMarca($_POST['txtNome']);
    $marca->editar();
    header("Location: index.php");
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>