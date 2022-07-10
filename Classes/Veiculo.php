<?php

class Veiculo{
    private $idVeiculo;
    private $anoVeiculo;
    private $idMarca;
    private $corVeiculo;
    private $modeloVeiculo;
    private $valorVeiculo;
    private $fotoVeiculo;

    //GET
    public function getIdVeiculo(){
        return $this->idVeiculo;
    }
    public function getAnoVeiculo(){
        return $this->anoVeiculo;
    }
    public function getIdMarca(){
        return $this->idMarca;
    }
    public function getCorVeiculo(){
        return $this->corVeiculo;
    }
    public function getModeloVeiculo(){
        return $this->modeloVeiculo;
    }
    public function getValorVeiculo(){
        return $this->valorVeiculo;
    }
    public function getFotoVeiculo(){
        return $this->fotoVeiculo;
    }
    //SET
    public function setIdVeiculo($id){
        $this->idVeiculo = $id;
    }
    public function setAnoVeiculo($ano){
        $this->anoVeiculo = $ano;
    }
    public function setIdMarca($id){
        $this->idMarca = $id;
    }
    public function setCorVeiculo($cor){
        $this->corVeiculo = $cor;
    }
    public function setModeloVeiculo($modelo){
        $this->modeloVeiculo = $modelo;
    }
    public function setValorVeiculo($valor){
        $this->valorVeiculo = $valor;
    }
    public function setFotoVeiculo($foto){
        $this->fotoVeiculo = $foto;
    }


    public function cadastrar(){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "insert into tbveiculo (anoVeiculo, idMarca, corVeiculo, modeloVeiculo, valorVeiculo, fotoVeiculo)
                        values (".$conexao->quote($this->getAnoVeiculo()).",
                        ".$conexao->quote($this->getIdMarca()).",
                        ".$conexao->quote($this->getCorVeiculo()).",
                        ".$conexao->quote($this->getModeloVeiculo()).",
                        ".$conexao->quote($this->getValorVeiculo()).",
                        ".$conexao->quote($this->getFotoVeiculo())."
                    );";
                        
        $conexao->exec($queryInsert);
        return 'Cadastro realizado com sucesso';
    }

    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idVeiculo, 
        anoVeiculo, idMarca, corVeiculo, modeloVeiculo, valorVeiculo, fotoVeiculo from tbveiculo";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public static function get($id){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idVeiculo, 
        anoVeiculo, idMarca, corVeiculo, modeloVeiculo, valorVeiculo, fotoVeiculo from tbveiculo WHERE idVeiculo = ".((int)$id);
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetch();
        return $lista;   
    }

    public function listarPesquisa($campoPesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idVeiculo, anoVeiculo, idMarca, corVeiculo, modeloVeiculo, valorVeiculo, fotoVeiculo from tbveiculo
                        where anoVeiculo like '$campoPesquisa'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarVeiculo($veiculo){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idVeiculo, anoVeiculo, idMarca, corVeiculo, modeloVeiculo, valorVeiculo, fotoVeiculo from tbveiculo
                        where idVeiculo = ".$veiculo->getIdVeiculo();
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha){
            $veiculo->setIdVeiculo($linha['idVeiculo']);
            $veiculo->setAnoVeiculo($linha['anoVeiculo']);
            $veiculo->setIdMarca($linha['idMarca']);
            $veiculo->setCorVeiculo($linha['corVeiculo']);
            $veiculo->setModeloVeiculo($linha['modeloVeiculo']);
            $veiculo->setValorVeiculo($linha['valorVeiculo']);
            $veiculo->setFotoVeiculo($linha['fotoVeiculo']);

        }
        return $veiculo;   
    }
    /*
    public static function getVeiculo($id) {
        $id = (int)$id;
        $conexao = Conexao::pegarConexao();
		$query = $conexao->query("SELECT `idMarca`, `nomeMarca` FROM `tbVeiculo` WHERE `idVeiculo` = ".$id." LIMIT 1;");
		$query->setFetchMode(PDO::FETCH_CLASS, "Marca");
		return $query->fetch();
    }
*/
    public function editar(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update tbveiculo
                        set anoVeiculo = '".$this->getAnoVeiculo()."'
                        ,idMarca = '".$this->getIdMarca()."'
                        ,corVeiculo = '".$this->getCorVeiculo()."'
                        ,modeloVeiculo = '".$this->getModeloVeiculo()."'
                        ,valorVeiculo = '".$this->getValorVeiculo()."'
                         where idVeiculo = ".$this->getIdVeiculo();
        $conexao->exec($queryUpdate);
        return false;
    }
    public function excluir(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "delete from tbveiculo
                        where idVeiculo = ".$this->getIdVeiculo();
        $conexao->exec($queryUpdate);
        return false;
    }
}