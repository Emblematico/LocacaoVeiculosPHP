<?php

class Cliente{
    private $idCliente;
    private $nomeCliente;
    private $cpfCliente;
    private $cnhCliente;
    private $enderecoCliente;
    private $numeroCliente;
    private $completentoCliente;
    private $bairroCliente;
    private $cidadeCliente;
    private $cepCliente;
    private $ufCliente;

    //GET
    public function getIdCliente(){
        return $this->idCliente;
    }
    public function getNomeCliente(){
        return $this->nomeCliente;
    }
    public function getCpfCliente(){
        return $this->cpfCliente;
    }
    public function getCnhCliente(){
        return $this->cnhCliente;
    }
    public function getEnderecoCliente(){
        return $this->enderecoCliente;
    }
    public function getNumeroCliente(){
        return $this->numeroCliente;
    }
    public function getComplementoCliente(){
        return $this->complementoCliente;
    }
    public function getBairroCliente(){
        return $this->bairroCliente;
    }
    public function getCidadeCliente(){
        return $this->cidadeCliente;
    }
    public function getCepCliente(){
        return $this->cepCliente;
    }
    public function getUfCliente(){
        return $this->ufCliente;
    }
    //SET
    public function setIdCliente($id){
        $this->idCliente = $id;
    }
    public function setNomeCliente($nome){
        $this->nomeCliente = $nome;
    }
    public function setCpfCliente($cpf){
        $this->cpfCliente = $cpf;
    }
    public function setCnhCliente($cnh){
        $this->cnhCliente = $cnh;
    }
    public function setEnderecoCliente($endereco){
        $this->enderecoCliente = $endereco;
    }
    public function setNumeroCliente($numero){
        $this->numeroCliente = $numero;
    }
    public function setComplementoCliente($complemento){
        $this->complementoCliente = $complemento;
    }
    public function setBairroCliente($bairro){
        $this->bairroCliente = $bairro;
    }
    public function setCidadeCliente($cidade){
        $this->cidadeCliente = $cidade;
    }
    public function setCepCliente($cep){
        $this->cepCliente = $cep;
    }
    public function setUfCliente($uf){
        $this->ufCliente = $uf;
    }

    public function cadastrar(){
        $conexao = Conexao::pegarConexao();
        $queryInsert = "insert into tbCliente (nomecliente, cpfcliente, cnhcliente, endcliente, numcliente,
         compcliente,  bairrocliente, cidadecliente, cepcliente, ufcliente)
                        values (".$conexao->quote($this->getNomeCliente()).",
                        ".$conexao->quote($this->getCpfCliente()).",
                        ".$conexao->quote($this->getCnhCliente()).",
                        ".$conexao->quote($this->getEnderecoCliente()).",
                        ".$conexao->quote($this->getNumeroCliente()).",
                        ".$conexao->quote($this->getComplementoCliente()).",
                        ".$conexao->quote($this->getBairroCliente()).",
                        ".$conexao->quote($this->getCidadeCliente()).",
                        ".$conexao->quote($this->getCepCliente()).",
                        ".$conexao->quote($this->getUfCliente()).")";
        $conexao->exec($queryInsert);
        return 'Cadastro realizado com sucesso';
    }

    public function listar(){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idcliente, 
        nomecliente, cpfcliente, cnhcliente, endcliente, numcliente,  compcliente, bairrocliente, cidadecliente,
         cepcliente, ufcliente from tbcliente";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }

    public function listarPesquisa($campoPesquisa){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idcliente, nomecliente, cpfcliente, cnhcliente, endcliente, numcliente,  compcliente,
         bairrocliente, cidadecliente, cepcliente, ufcliente from tbcliente
                        where nomecliente like '$campoPesquisa'";
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        return $lista;   
    }
    public function listarCliente($cliente){
        $conexao = Conexao::pegarConexao();
        $querySelect = "select idcliente, nomecliente, cpfcliente, cnhcliente, endcliente, numcliente,  compcliente,
         bairrocliente, cidadecliente, cepcliente, ufcliente from tbcliente
                        where idcliente = ".$cliente->getIdCliente();
        $resultado = $conexao->query($querySelect);
        $lista = $resultado->fetchAll();
        foreach ($lista as $linha){
            $cliente->setNomeCliente($linha['nomecliente']);
            $cliente->setCpfCliente($linha['cpfcliente']);
            $cliente->setCnhCliente($linha['cnhcliente']);
            $cliente->setEnderecoCliente($linha['endcliente']);
            $cliente->setNumeroCliente($linha['numcliente']);
            $cliente->setComplementoCliente($linha['compcliente']);
            $cliente->setBairroCliente($linha['bairrocliente']);
            $cliente->setCidadeCliente($linha['cidadecliente']);
            $cliente->setCepCliente($linha['cepcliente']);
            $cliente->setUfCliente($linha['ufcliente']);
        }
        return $cliente;   
    }

    public function editar(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "update tbCliente
                        set nomecliente = '".$this->getNomeCliente()."'
                        , cpfcliente = '".$this->getCpfCliente()."'
                        , cnhcliente = '".$this->getCnhCliente()."'
                        , endcliente = '".$this->getEnderecoCliente()."'
                        , numcliente = '".$this->getNumeroCliente()."'
                        , compcliente = '".$this->getComplementoCliente()."'
                        , bairrocliente = '".$this->getBairroCliente()."'
                        , cidadecliente = '".$this->getCidadeCliente()."'
                        , cepcliente = '".$this->getCepCliente()."'
                        , ufcliente = '".$this->getUfCliente()."'
                         where idcliente = ".$this->getIdCliente();
        $conexao->exec($queryUpdate);
        return 'Atualização realizada com sucesso';
    }
    public function excluir(){
        $conexao = Conexao::pegarConexao();
        $queryUpdate = "delete from tbCliente
                        where idcliente = ".$this->getIdCliente();
        $conexao->exec($queryUpdate);
        return 'Exclusão realizada com sucesso';
    }
}