<html>
    <head>
    <meta charset=utf-8/>
         <link href="css/bootstrap.min.css"
               rel="stylesheet"
               type="text/css"/>
        <title>Marca</title>
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
                /*$marca = new Marca();
                $marca->setIdMarca($_GET['id']);
                $marca = $marca->listarMarca($marca);*/
                $marca = Marca::getMarca($_GET['id']);
            } catch(Exception $e) {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }

        ?>
        <div class="card">
  <div class="card-header">
  <h1>Edição de Marca</h1>
  </div>
  <div class="card-body">
  <form name='cadastromarca' method="post" action="editar-marca.php">
        <div class="form-row">
            <input type="hidden" name="id" value="<?php echo $marca->getIdMarca(); ?>">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Nome</label>
            <input type="text" class="form-control" name="txtNome" placeholder="Nome" value="<?php echo $marca->getNomeMarca(); ?>">
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