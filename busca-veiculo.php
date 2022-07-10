<?php
require_once 'global.php';

try{
    $veiculo = new Veiculo();
    if(!empty($_GET['pesquisa'])){
        $campoPesquisa = $_GET['pesquisa']."%";
        $lista = $veiculo->listarPesquisa($campoPesquisa);
    } else {
        $lista = $veiculo->listar();
    }
    foreach ($lista as $linha){
        $marca = Marca::getMarca($linha["idMarca"])->getNomeMarca();
        ?>
        <tr>
            <td><?php echo $linha['idVeiculo'] ?></a></td>
            <td><?php echo $linha['anoVeiculo'] ?></a></td>
            <td><?php echo $marca; ?></a></td>
            <td><?php echo $linha['corVeiculo'] ?></a></td>
            <td><?php echo $linha['modeloVeiculo'] ?></a></td>
            <td><?php echo $linha['valorVeiculo'] ?></a></td>
            <td><img height="80" width="80" style="object-fit: contain;" src="uploads/<?php echo $linha['fotoVeiculo'] ?>"></a></td>
            <td><a href="editar-o-cadastro-veiculo.php?id=<?php echo $linha['idVeiculo'] ?>">Editar</a></td>
            <td><a href="excluir-veiculo.php?id=<?php echo $linha['idVeiculo'] ?>">Excluir</a></td>
        </tr>
<?php
    }
}
catch(Exception $e){
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
 ?>