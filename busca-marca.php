<?php
require_once 'global.php';

try{
    $marca = new Marca();
    if(!empty($_GET['pesquisa'])){
        $campoPesquisa = $_GET['pesquisa']."%";
        $lista = $marca->listarPesquisa($campoPesquisa);
    } else {
        $lista = $marca->listar();
    }
    foreach ($lista as $linha){
    echo "<tr>
            <td> ". $linha['idmarca'] ."</td>
            <td> ". $linha['nomemarca'] ."</td>
            <td> <a href='editar-o-cadastro-marca.php?id=". $linha['idmarca'] ."'>Editar</a></td>
            <td> <a href='excluir-marca.php?id=". $linha['idmarca'] ."'>Excluir</a></td>
        </tr>";
    }
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>