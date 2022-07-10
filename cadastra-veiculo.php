<?php 

require_once 'global.php';

$uploadError = false;
function uploadImage($image, $optional = false){
    global $uploadError;
    if($image!==null) {
        $target_dir = __DIR__."/uploads/";
        $check = @getimagesize($image["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $target_file = uniqid().image_type_to_extension($check[2]);
            if (move_uploaded_file($image["tmp_name"], $target_dir.$target_file)) {
                return $target_file;
            } else {
                $uploadError = "Ocorreu um erro ao enviar a foto do veículo (CHMOD).";
            }
        } else {
            if(!$optional) {
                $uploadError = "A foto do veículo selecionada não é uma imagem.";
            }
        }
    } else {
        if(!$optional) {
            $uploadError = "A foto do veículo não foi encontrada.";
        }
    }
    if($optional) {
        return true;
    }
    return false;
}
try{
    $upload = uploadImage($_FILES['foto']);
    if($upload===false) {
        echo "Ocorreu um erro\n";
        echo $uploadError;
        die;
    } else {
        $veiculo = new Veiculo();
        $veiculo->setAnoVeiculo($_POST['txtAno']);
        $veiculo->setIdMarca($_POST['idMarca']);
        $veiculo->setCorVeiculo($_POST['txtCor']);
        $veiculo->setModeloVeiculo($_POST['txtModelo']);
        $veiculo->setValorVeiculo($_POST['txtValor']);
        $veiculo->setFotoVeiculo($upload);
        $veiculo->cadastrar();
    }
    header("Location: index.php");
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>