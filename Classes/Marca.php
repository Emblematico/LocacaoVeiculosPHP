<?php

class Marca{
    private $idMarca;
    private $nomeMarca;

    //GET
    public function getIdMarca(){
        return $this->idMarca;
    }
    public function getNomeMarca(){
        return $this->nomeMarca;
    }
    //SET
    public function setIdMarca($id){
        $this->idMarca = $id;
    }
    public function setNomeMarca($nome){
        $this->nomeMarca = $nome;
    }
    public function cadastrar(){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "insert into tbmarca (nomemarca)
                        values (".$conexao->quote($this->getNomeMarca()).");";

        $conexao->exec($queryInsert);
        return 'Cadastro realizado com sucesso';
    }

    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idmarca, 
        nomemarca from tbmarca";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public function listarPesquisa($campoPesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idmarca, nomemarca from tbmarca
                        where nomemarca like '$campoPesquisa'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarMarca($marca){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idmarca, nomemarca from tbmarca
                        where idcliente = ".$marca->getIdMarca();
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha){
            $marca->setNomeMarca($linha['nomemarca']);

        }
        return $marca;   
    }
    public static function getMarca($id) {
        $id = (int)$id;
        $conexao = Conexao::pegarConexao();
		$query = $conexao->query("SELECT `idMarca`, `nomeMarca` FROM `tbmarca` WHERE `idMarca` = ".$id." LIMIT 1;");
		$query->setFetchMode(PDO::FETCH_CLASS, "Marca");
		return $query->fetch();
    }

    public function editar(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update tbmarca
                        set nomemarca = '".$this->getNomeMarca()."'
                         where idmarca = ".$this->getIdMarca();
        $conexao->exec($queryUpdate);
        return 'Atualização realizada com sucesso';
    }
    public function excluir(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "delete from tbmarca
                        where idMarca = ".$this->getIdMarca();
        $conexao->exec($queryUpdate);
        return 'Exclusão realizada com sucesso';
    }
}