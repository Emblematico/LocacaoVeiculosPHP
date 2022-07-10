<?php 

require_once 'global.php';

try{
    $marca = new Marca();
    $marca->setNomeMarca($_POST['txtNome']);
    echo $marca->cadastrar();
    header("Location: index.php");
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>