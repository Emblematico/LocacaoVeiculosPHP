<html lang=pt-br>
    <head>
    <meta charset=utf-8/>
         <link href="css/bootstrap.min.css"
               rel="stylesheet"
               type="text/css"/>
            <title>Locação</title>
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
        $locacao = Locacao::get($_GET['id']);
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
  <form name='locacao' action='editar-locacao.php' method='post'>
  <input type="hidden" name="id" value="<?php echo $locacao["idLocacao"]; ?>">
          <label for="inputPassword4">Nome do Cliente</label>
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

  <button type="submit" class="btn btn-primary">Salvar</button>
</form>
  </div>
</div>
</div>
    </div>
</div> 
    </body>
</html>