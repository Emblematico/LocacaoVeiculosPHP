<?php
require_once 'global.php';

try{
    $cliente = new Cliente();
    if(!empty($_GET['pesquisa'])){
        $campoPesquisa = $_GET['pesquisa']."%";
        // echo($_POST['campoPesquisa']);
        $lista = $cliente->listarPesquisa($campoPesquisa);
    } else {
        $lista = $cliente->listar();
    }
    foreach ($lista as $linha){
    echo "<tr>
            <td> ". $linha['idcliente'] ."</td>
            <td> ". $linha['nomecliente'] ."</td>
            <td> ". $linha['cpfcliente'] ."</td>
            <td> ". $linha['cnhcliente'] ."</td>
            <td> ". $linha['endcliente'] ."</td>
            <td> ". $linha['numcliente'] ."</td>
            <td> ". $linha['compcliente'] ."</td>
            <td> ". $linha['bairrocliente'] ."</td>
            <td> ". $linha['cidadecliente'] ."</td>
            <td> ". $linha['cepcliente'] ."</td>
            <td> ". $linha['ufcliente'] ."</td>
            <td> <a href='editar-o-cadastro-cliente.php?id= ". $linha['idcliente'] ."'>Editar</a></td>
            <td> <a href='excluir-cliente.php?id= ". $linha['idcliente'] ."'>Excluir</a></td>
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