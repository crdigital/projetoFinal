-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 26-Dez-2017 às 15:53
-- Versão do servidor: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_mysql`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(155) NOT NULL,
  `endereco` varchar(155) NOT NULL,
  `cep` char(10) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` char(2) NOT NULL,
  `ddd` char(2) NOT NULL,
  `fone` char(10) NOT NULL,
  `rg` varchar(25) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `email` varchar(155) NOT NULL,
  `ocupacao` varchar(155) NOT NULL,
  `sexo` char(1) NOT NULL,
  `idade` char(20) NOT NULL,
  `data_cad` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`idCliente`, `nome`, `endereco`, `cep`, `cidade`, `uf`, `ddd`, `fone`, `rg`, `cpf`, `email`, `ocupacao`, `sexo`, `idade`, `data_cad`) VALUES
(1, 'Fulano de Tal', 'Rua dos Fulanos, 1001', '00.000-000', 'Fulanolandia', 'FL', '00', '0000-0000', '00000000', '000.111.222-00', 'fulano@fulanol.com.br', 'a toa', 'm', '20', '2015-09-28 02:22:25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(155) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `status` int(1) NOT NULL,
  `data_cad` datetime NOT NULL,
  `nivel_de_acesso_id` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nome`, `login`, `senha`, `status`, `data_cad`, `nivel_de_acesso_id`) VALUES
(1, 'Administrador', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '2015-09-28 02:04:26', 1),
(2, 'Usuario Comum', 'usuario', 'f8032d5cae3de20fcec887f395ec9a6a', 1, '2015-09-28 02:25:36', 2),
(3, 'Fulano de Tal', 'fulano', '3342949e2e99fc2f304de6fdd626a188', 1, '2017-12-26 12:21:10', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
