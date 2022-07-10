<?php

class locacao{
    private $idLocacao;
    private $idCliente;
    private $idVeiculo;
    private $idDTInicial;
    private $idDTFinal;
    private $idValorTotal;

    //GET
    public function getIdLocacao(){
        return $this->idLocacao;
    }
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function getIdVeiculo(){
        return $this->idVeiculo;
    }
    public function getDTInicial(){
        return $this->DTInicial;
    }
    public function getDTFinal(){
        return $this->DTFinal;
    }
    public function getValorTotal(){
        return $this->ValorTotal;
    }
    //SET
    public function setIdLocacao($id){
        $this->idLocacao = $id;
    }
    public function setIdCliente($id){
        $this->idCliente = $id;
    }
    public function setidVeiculo($id){
        $this->idVeiculo = $id;
    }
    public function setDTInicial($DTInicial){
        $this->DTInicial = $DTInicial;
    }
    public function setDTFinal($DTFinal){
        $this->DTFinal = $DTFinal;
    }
    public function setValorTotal($ValorTotal){
        $this->ValorTotal= $ValorTotal;
    }
    public function cadastrar(){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "insert into tbLocacao (idCliente, idVeiculo, dtInicial, dtFinal, valorTotal)
                        values (".$conexao->quote($this->getIdCliente()).",
                        ".$conexao->quote($this->getIdVeiculo()).",
                        ".$conexao->quote($this->getDTInicial()).",
                        ".$conexao->quote($this->getDTFinal()).",
                        ".$conexao->quote($this->getValorTotal()).")";
        $conexao->exec($queryInsert);
        return 'Cadastro realizado com sucesso';
    }
    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idLocacao, 
        idCliente, idVeiculo, dtInicial, dtFinal, valorTotal from tblocacao";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public static function get($id){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idLocacao, 
        idCliente, idVeiculo, dtInicial, dtFinal, valorTotal from tblocacao WHERE idLocacao = ".((int)$id);
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetch();
        return $lista;   
    }
    public function listarPesquisa($campoPesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idLocacao,idCliente, idVeiculo, dtInicial, dtFinal, valorTotal from tblocacao
                        where idLocacao like '$campoPesquisa'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarLocacao($locacao){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idLocacao,idCliente, idVeiculo, dtInicial, dtFinal, valorTotal from tblocacao
                        where idLocacao = ".$locacao->getIdVeiculo();
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha){
            $locacao->setIdLocacao($linha['idLocacao']);
            $locacao->setIdCliente($linha['idCliente']);
            $locacao->setidVeiculo($linha['idVeiculo']);
            $locacao->setDTInicial($linha['dtInicial']);
            $locacao->setDTFinal($linha['dtFinal']);
            $locacao->setValorTotal($linha['valorTotal']);
        }
        return $locacao;   
    }
    public function editar(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update tblocacao
                        set idCliente = '".$this->getIdCliente()."'
                        ,idVeiculo = '".$this->getIdVeiculo()."'
                        ,dtInicial = '".$this->getDTInicial()."'
                        ,dtFinal = '".$this->getDTFinal()."'
                        ,valorTotal = '".$this->getValorTotal()."'
                         where idLocacao = ".$this->getIdLocacao();
        $conexao->exec($queryUpdate);
        return false;
    }
    public function excluir(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "delete from tblocacao
                        where idLocacao = ".$this->getIdLocacao();
        $conexao->exec($queryUpdate);
        return false;
    }

}
?>