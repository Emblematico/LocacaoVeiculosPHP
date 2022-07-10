<html lang="pt-br">
    <head>
    <meta charset="utf-8/">
    <link rel="stylesheet" href="css/bootstrap.css">
            <title>Locadora de Automóvel</title>
    </head>
    <body>
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="usuario.php">
            <img src="img/carro-png.png" width="45" height="30" alt="">
            Vehicle rent
        </a>
        </nav>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
    <?php require_once 'global.php' ?>
    <?php
    try {
        $cliente = new Cliente();
        $lista = $cliente->listar();
    } catch(Exception $e) {
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>

<div class="card">
  <div class="card-header">
    <h1>Cadastro do Cliente</h1>
  </div>
  <div class="card-body">
  <form name='cadastrocli' action='cadastrar-o-cliente.php' method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" name="txtNome" placeholder="Nome">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">CPF</label>
      <input type="text" class="form-control" name="txtCpf" placeholder="###.###.###-##">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">CNH</label>
      <input type="text" class="form-control" name="txtCnh" placeholder="###.###.###-##">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Endereço</label>
      <input type="text" class="form-control" name="txtEndereco" placeholder="Rua dos Bobos, nº 0">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Número</label>
      <input type="text" class="form-control" name="txtNumero" placeholder="(11)2563-6469">
    </div>
    <div class="form-group col-2">
      <label for="inputPassword4">Complemento</label>
      <input type="text" class="form-control" name="txtComplemento" placeholder="">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputCity">Bairro</label>
      <input type="text" class="form-control" name="txtBairro">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Cidade</label>
      <input type="text" class="form-control" name="txtCidade" placeholder="Cidade">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">CEP</label>
      <input type="text" class="form-control" name="txtCep" placeholder="#####-###">
    </div>
    <div class="form-group col-1">
      <label for="inputPassword4">UF</label>
      <input type="text" class="form-control" name="txtUf" placeholder="">
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Cadastra</button>
</form>
  </div>
</div>
<div class="card">
  <div class="card-header">
  <h1>Lista de Clientes Cadastrados</h1>
  </div>
  <div class="card-body">
  <form action="buscar-cliente.php">
  <h3>Pesquisa...</h3>
            <input class="form-control mr-sm-2" type="search" name="campoPesquisaCliente" id="campoPesquisaCliente" placeholder="Pesquisar" aria-label="Pesquisar">
        </form>
  </div>
</div>
<div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Cpf</th>
                    <th>Cnh</th>
                    <th>Endereço</th>
                    <th>Número</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Cep</th>
                    <th>Uf</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
            </thead>
            <tbody id='resultadoCliente'>
                
            </tbody>
        </table>
  </div>
    <?php require_once 'global.php' ?>

    <?php
    try {
        $marca = new Marca();
        $lista = $marca->listar();
    } catch(Exception $e) {
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>
<div class="card">
  <div class="card-header">
  <h1>Marca</h1>
  </div>
  <div class="card-body">
  <form name='cadastro' action='cadastro-marca.php' method='post'>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Nome</label>
      <input type="text" class="form-control" name="txtNome" placeholder="Nome">
      </div>
    </div>
  <button type="submit" class="btn btn-primary">Cadastra</button>
</form>
  </div>
</div>

<div class="card">
  <div class="card-header">
  <h1>Lista de Marca Cadastrados</h1>
  </div>
  <div class="card-body">
  <form action="busca-marca.php">
  <h3>Pesquisa...</h3>
            <input class="form-control mr-sm-2" type="search" name="campoPesquisaMarca" id="campoPesquisaMarca" placeholder="Pesquisar" aria-label="Pesquisar">
        </form>
  </div>
</div>
<div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
            </thead>
            <tbody id='resultadoMarca'>
            <?php foreach ($lista as $linha){ ?>
                    <tr>
                        <td><?php echo $linha['idmarca'] ?></a></td>
                        <td><?php echo $linha['nomemarca'] ?></a></td>
                        <td><a href="editar-o-cadastro-marca.php?id=<?php echo $linha['idmarca'] ?>">Editar</a></td>
                        <td><a href="excluir-marca.php?id=<?php echo $linha['idmarca'] ?>">Excluir</a></td>
                    </tr>
                <?php } ?>
                
            </tbody>
        </table>
        </div>
<?php
try {
    $veiculo = new Veiculo();
    $lista = $veiculo->listar();
} catch(Exception $e) {
    echo '<pre>';
        print_r($e);
    echo '</pre>';
    echo $e->getMessage();
}
?>
<div class="card">
  <div class="card-header">
  <h1>Veículo</h1>
  </div>
  <div class="card-body">
  <form name='cadastroVeículo' action='cadastra-veiculo.php' method="post" enctype="multipart/form-data">
<div class="form-row">
<div class="form-group col-md-6">
  <label for="inputEmail4">Ano do Veículo</label>
  <input type="text" class="form-control" name="txtAno" placeholder="####">
</div>
<div class="form-group col-md-2">
  <label for="inputPassword4">Marca</label>
  <!--input type="text" class="form-control" name="idMarca" placeholder="##########"-->
  <select name="idMarca" class="form-control form-control">
<?php
$listaMarca = (new Marca())->listar();
foreach($listaMarca as $marca) {
?>
    <option value="<?php echo $marca["idmarca"]; ?>"><?php echo $marca["nomemarca"]; ?></option>
<?php
}
?>
  </select>
</div>
<div class="form-group col-md-2">
  <label for="inputPassword4">Cor do Veículo</label>
  <input type="text" class="form-control" name="txtCor" placeholder="#########">
</div>
</div>
<div class="form-row">
<div class="form-group col-md-6">
  <label for="inputEmail4">Modelo do Veículo</label>
  <input type="text" class="form-control" name="txtModelo" placeholder="">
</div>
<div class="form-group col-md-4">
  <label for="inputPassword4">Valor do Veículo</label>
  <input type="text" class="form-control" name="txtValor" placeholder="R$">
</div>
<div class="form-group col-md-6">
  <label for="inputPassword4">Foto do Veículo</label>
  <input type="file" class="form-control-file" name="foto">
</div>
</div>
<button type="submit" class="btn btn-primary">Cadastra</button>
</form>
  </div>
</div>

<div class="card">
  <div class="card-header">
  <h1>Lista de Veiculo Cadastrados</h1>
  </div>
  <div class="card-body">
  <form action="busca-marca.php">
  <h3>Pesquisa...</h3>
        <input class="form-control mr-sm-2" type="search" name="campoPesquisaVeiculo" id="campoPesquisaVeiculo" placeholder="Pesquisar" aria-label="Pesquisar">
    </form>
  </div>
</div>
<div class="table-responsive">
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Id</th>
                <th>Ano do Veículo</th>
                <th>Marca</th>
                <th>Cor do Veículo</th>
                <th>Modelo do Veículo</th>
                <th>Valor do Veículo</th>
                <th>Foto do Veículo</th>
                <th class="acao">Editar</th>
                <th class="acao">Excluir</th>
            </tr>
        </thead>
        <tbody id='resultadoVeiculo'>
        </tbody>
    </table>
</div>
    <?php require_once 'global.php' ?>

<?php
    try {
        $locacao = new Locacao();
        $lista = $locacao->listar();
    } catch(Exception $e) {
        echo '<pre>';
            print_r($e);
        echo '</pre>';
        echo $e->getMessage();
    }
?>
<div class="card">
  <div class="card-header">
  <h1>Locação</h1>
  </div>
  <div class="card-body">
  <form name='locacao' action='cadastrar-o-locacao.php' method='post'>
  <label for="inputPassword4">Cliente</label>
    <select name="idCliente" class="form-control form-control">
<?php
$listaCliente = (new Cliente())->listar();
foreach($listaCliente as $cliente) {
?>
    <option value="<?php echo $cliente["idcliente"]; ?>"><?php echo $cliente["nomecliente"]; ?></option>
<?php
}
?>
  </select>
  <label for="inputPassword4">Veiculo</label>
  <select name="idVeiculo" class="form-control form-control">
<?php
$listaVeiculo = (new Veiculo())->listar();
foreach($listaVeiculo as $veiculo) {
?>
    <option value="<?php echo $veiculo["idVeiculo"]; ?>"><?php echo $veiculo["modeloVeiculo"]; ?></option>
<?php
}
?>
  </select>

  <div class="form-row">
  <div class="form-group col-md-4">
      <label for="inputPassword4">Data Inicial</label>
      <input type="text" class="form-control" name="txtDI" placeholder="##/##/##">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Data Final</label>
      <input type="text" class="form-control" name="txtDF" placeholder="##/##/##">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Valor Total</label>
      <input type="text" class="form-control" name="txtValorTotal" placeholder="R$">
    </div>
    </div>

  <button type="submit" class="btn btn-primary">Cadastra</button>
</form>
  </div>
</div>
<div class="card">
  <div class="card-header">
  <h1>Lista de Locação</h1>
  </div>
  <div class="card-body">
  <form action="buscar-locacao.php">
            <h3>Pesquisa...</h3>
            <input class="form-control mr-sm-2" type="search" name="campoPesquisaLocacao" id="campoPesquisaLocacao" placeholder="Pesquisar" aria-label="Pesquisar">
        </form>
  </div>
</div>
<div class="table-responsive">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>IdCliente</th>
                    <th>IdVeiculo</th>
                    <th>Data Inicial</th>
                    <th>Data Final</th>
                    <th>Valor Total</th>
                    <th class="acao">Editar</th>
                    <th class="acao">Excluir</th>
                </tr>
            </thead>
            <tbody id='resultadoLocacao'>
                
            </tbody>
        </table>
        </div>
</div>
</div>
</div>
<footer class="bg-light text-center text-lg-start">
  <!-- Copyright -->
  <div class="navbar-light bg-light p-3">
  &copy; 2022 Todos os direitos reservados.
  </div>
  <!-- Copyright -->
</footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="js/pesquisaCliente.js" ></script>
        <script src="js/pesquisaMarca.js" ></script>  
        <script src="js/pesquisaVeiculo.js" ></script>   
        <script src="js/pesquisaLocacao.js" ></script> 
    </body>
</html>