<html>
    <head>
    <meta charset=utf-8/>
         <link href="css/bootstrap.min.css"
               rel="stylesheet"
               type="text/css"/>
        <title>Cliente</title>
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
                $cliente->setIdCliente($_GET['id']);
                $cliente = $cliente->listarCliente($cliente);
            } catch(Exception $e) {
                echo '<pre>';
                    print_r($e);
                echo '</pre>';
                echo $e->getMessage();
            }

        ?>
        <div class="card">
  <div class="card-header">
  <h1>Edição de Clientes</h1>
  </div>
  <div class="card-body">
  <form name='cadastrocli' method="post" action="editar-cliente.php?id=<?php echo $cliente->getIdCliente(); ?>">
        <div class="form-row">
        
            <div class="form-group col-md-6">
            <label for="inputEmail4">Nome</label>
            <input type="text" class="form-control" name="txtNome" placeholder="Nome" value="<?php echo $cliente->getNomeCliente(); ?>">
            </div>
            <div class="form-group col-md-2">
            <label for="inputPassword4">CPF</label>
            <input type="text" class="form-control" name="txtCpf" placeholder="###.###.###-##" value="<?php echo $cliente->getCpfCliente(); ?>">
            </div>
            <div class="form-group col-md-2">
            <label for="inputPassword4">CNH</label>
            <input type="text" class="form-control" name="txtCnh" placeholder="###.###.###-##" value="<?php echo $cliente->getCnhCliente(); ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputEmail4">Endereço</label>
            <input type="text" class="form-control" name="txtEndereco" placeholder="Rua dos Bobos, nº 0" value="<?php echo $cliente->getEnderecoCliente(); ?>">
            </div>
            <div class="form-group col-md-2">
            <label for="inputPassword4">Número</label>
            <input type="text" class="form-control" name="txtNumero" placeholder="(11)2563-6469" value="<?php echo $cliente->getNumeroCliente(); ?>">
            </div>
            <div class="form-group col-md-2">
            <label for="inputPassword4">Complemento</label>
            <input type="text" class="form-control" name="txtComplemento" placeholder="" value="<?php echo $cliente->getComplementoCliente(); ?>">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
            <label for="inputCity">Bairro</label>
            <input type="text" class="form-control" name="txtBairro" value="<?php echo $cliente->getBairroCliente(); ?>">
            </div>
            <div class="form-group col-md-2">
            <label for="inputPassword4">Cidade</label>
            <input type="text" class="form-control" name="txtCidade" placeholder="Cidade" value="<?php echo $cliente->getCidadeCliente(); ?>">
            </div>
            <div class="form-group col-md-2">
            <label for="inputPassword4">CEP</label>
            <input type="text" class="form-control" name="txtCep" placeholder="#####-###" value="<?php echo $cliente->getCepCliente(); ?>">
            </div>
            <div class="form-group col-md-2">
            <label for="inputPassword4">UF</label>
            <input type="text" class="form-control" name="txtUf" placeholder="" value="<?php echo $cliente->getUfCliente(); ?>">
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