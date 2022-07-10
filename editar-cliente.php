<?php 

require_once 'global.php';

try{
    $cliente = new Cliente();
    $cliente->setIdCliente($_GET['id']);
    $cliente->setNomeCliente($_POST['txtNome']);
    $cliente->setCpfCliente($_POST['txtCpf']);
    $cliente->setCnhCliente($_POST['txtCnh']);
    $cliente->setEnderecoCliente($_POST['txtEndereco']);
    $cliente->setNumeroCliente($_POST['txtNumero']);
    $cliente->setComplementoCliente($_POST['txtComplemento']);
    $cliente->setBairroCliente($_POST['txtBairro']);
    $cliente->setCidadeCliente($_POST['txtCidade']);
    $cliente->setCepCliente($_POST['txtCep']);
    $cliente->setUfCliente($_POST['txtUf']);
    echo $cliente->editar($cliente);
    header("Location: index.php");
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>