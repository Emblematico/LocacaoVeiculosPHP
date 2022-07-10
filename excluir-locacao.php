<?php 

require_once 'global.php';

try{
    header("Location: index.php");
    $locacao = new Locacao();
    $locacao->setIdLocacao($_GET['id']);
    echo $locacao->excluir();
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>