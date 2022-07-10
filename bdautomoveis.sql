-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Jul-2022 às 18:20
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bdautomoveis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbcliente`
--

CREATE TABLE `tbcliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(40) NOT NULL,
  `cpfCliente` varchar(15) NOT NULL,
  `cnhCliente` varchar(15) NOT NULL,
  `endCliente` varchar(40) NOT NULL,
  `numCliente` varchar(15) NOT NULL,
  `compCliente` varchar(2) NOT NULL,
  `bairroCliente` varchar(40) NOT NULL,
  `cidadeCliente` varchar(40) NOT NULL,
  `cepCliente` varchar(12) NOT NULL,
  `ufCliente` varchar(2) NOT NULL,
  `emailCliente` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblocacao`
--

CREATE TABLE `tblocacao` (
  `idLocacao` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVeiculo` int(11) NOT NULL,
  `dtInicial` date NOT NULL,
  `dtFinal` date NOT NULL,
  `valorTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmarca`
--

CREATE TABLE `tbmarca` (
  `idMarca` int(11) NOT NULL,
  `nomeMarca` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario`
--

CREATE TABLE `tbusuario` (
  `idUsuario` int(11) NOT NULL,
  `nomeUsuario` varchar(40) NOT NULL,
  `loginUsuario` varchar(20) NOT NULL,
  `senhaUsuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbveiculo`
--

CREATE TABLE `tbveiculo` (
  `idVeiculo` int(11) NOT NULL,
  `anoVeiculo` varchar(4) DEFAULT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `corVeiculo` varchar(20) DEFAULT NULL,
  `modeloVeiculo` varchar(10) DEFAULT NULL,
  `valorVeiculo` double DEFAULT NULL,
  `fotoVeiculo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Índices para tabela `tblocacao`
--
ALTER TABLE `tblocacao`
  ADD PRIMARY KEY (`idLocacao`);

--
-- Índices para tabela `tbmarca`
--
ALTER TABLE `tbmarca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Índices para tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Índices para tabela `tbveiculo`
--
ALTER TABLE `tbveiculo`
  ADD PRIMARY KEY (`idVeiculo`),
  ADD KEY `idMarca` (`idMarca`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbcliente`
--
ALTER TABLE `tbcliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tblocacao`
--
ALTER TABLE `tblocacao`
  MODIFY `idLocacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbmarca`
--
ALTER TABLE `tbmarca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tbusuario`
--
ALTER TABLE `tbusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tbveiculo`
--
ALTER TABLE `tbveiculo`
  MODIFY `idVeiculo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbveiculo`
--
ALTER TABLE `tbveiculo`
  ADD CONSTRAINT `tbveiculo_ibfk_1` FOREIGN KEY (`idMarca`) REFERENCES `tbmarca` (`idMarca`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
