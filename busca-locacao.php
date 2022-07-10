<?php
require_once 'global.php';

try{
    $locacao = new Locacao();
    if(!empty($_GET['pesquisa'])){
        $campoPesquisa = $_GET['pesquisa']."%";
        $lista = $locacao->listarPesquisa($campoPesquisa);
    } else {
        $lista = $locacao->listar();
    }
    foreach ($lista as $linha){

        ?>
        <tr>
            <td><?php echo $linha['idLocacao'] ?></a></td>
            <td><?php echo $linha ['idCliente'] ?></a></td>
            <td><?php echo $linha['idVeiculo'] ?></a></td>
            <td><?php echo $linha['dtInicial'] ?></a></td>
            <td><?php echo $linha['dtFinal'] ?></a></td>
            <td><?php echo $linha['valorTotal'] ?></a></td>
            <td><a href="editar-o-cadastro-locacao.php?id=<?php echo $linha['idLocacao'] ?>">Editar</a></td>
            <td><a href="excluir-locacao.php?id=<?php echo $linha['idLocacao'] ?>">Excluir</a></td>
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