<html lang=pt-br>
    <head>
    <meta charset=utf-8/>
         <link href="css/bootstrap.min.css"
               rel="stylesheet"
               type="text/css"/>
            <title>Veículo</title>
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
        $veiculo = Veiculo::get($_GET['id']);
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
  <form name='cadastroVeículo' action='editar-veiculo.php' method='post'>
      <input type="hidden" name="idVeiculo" value="<?php echo $veiculo["idVeiculo"]; ?>">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Ano do Veículo</label>
      <input type="text" class="form-control" name="txtAno" placeholder="####" value="<?php echo $veiculo["anoVeiculo"]; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Marca</label>
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
      <input type="text" class="form-control" name="txtCor" placeholder="#########" value="<?php echo $veiculo["corVeiculo"]; ?>">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Modelo do Veículo</label>
      <input type="text" class="form-control" name="txtModelo" placeholder="" value="<?php echo $veiculo["modeloVeiculo"]; ?>">
    </div>
    <div class="form-group col-md-2">
      <label for="inputPassword4">Valor do Veículo</label>
      <input type="text" class="form-control" name="txtValor" placeholder="R$" value="<?php echo $veiculo["valorVeiculo"]; ?>">
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