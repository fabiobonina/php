-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14-Dez-2017 às 21:23
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estrutura da tabela `tb_bem`
--

CREATE TABLE `tb_bem` (
  `id` int(11) NOT NULL,
  `familia` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capacidade` varchar(20) NOT NULL,
  `unidade` varchar(4) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `frabicante` int(11) NOT NULL,
  `codProprietario` int(11) NOT NULL,
  `descProprietario` varchar(30) NOT NULL,
  `loja` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `plaqueta` varchar(11) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_bem`
--

INSERT INTO `tb_bem` (`id`, `familia`, `tag`, `name`, `capacidade`, `unidade`, `modelo`, `frabicante`, `codProprietario`, `descProprietario`, `loja`, `local`, `grupo`, `plaqueta`, `data`) VALUES
(1, 1, 'MSA', 'MASCARA AUTONOMA', '240', 'KG', '1', 1, 24, 'SABARA', 1, 2, 1, '101010', '2017-12-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bem`
--
ALTER TABLE `tb_bem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loja` (`loja`),
  ADD KEY `local` (`local`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bem`
--
ALTER TABLE `tb_bem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
