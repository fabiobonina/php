-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Dez-2017 às 15:52
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `systemteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eq_componentes`
--

CREATE TABLE `tb_eq_componentes` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capacidade` varchar(20) NOT NULL,
  `unidade` varchar(4) NOT NULL,
  `numeracao` varchar(20) NOT NULL,
  `frabicante` int(11) NOT NULL,
  `frabicanteNick` varchar(30) NOT NULL,
  `proprietario` int(11) NOT NULL,
  `proprietarioNick` varchar(30) NOT NULL,
  `local` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `dataFrabricacao` date NOT NULL DEFAULT '0000-00-00',
  `dataCompra` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_eq_componentes`
--

INSERT INTO `tb_eq_componentes` (`id`, `produto`, `tag`, `name`, `capacidade`, `unidade`, `numeracao`, `frabicante`, `frabicanteNick`, `proprietario`, `proprietarioNick`, `local`, `categoria`, `dataFrabricacao`, `dataCompra`) VALUES
(1, 3, 'CLORADOR', 'SISTEMA DE CLORACAO', '240', 'KG', '123123', 2, 'CLORANDO', 24, 'SABARA', 2, 1, '2017-12-17', '2017-12-17'),
(2, 4, 'MSA', 'CILINDRO AR', '3,6', 'KG', 'J31243', 1, 'MSA', 24, 'SABARA', 2, 1, '2017-12-10', '2017-12-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_eq_componentes`
--
ALTER TABLE `tb_eq_componentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_eq_componentes`
--
ALTER TABLE `tb_eq_componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
