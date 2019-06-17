-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22-Jan-2019 às 06:23
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_tec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_uf`
--

CREATE TABLE `tb_uf` (
  `id` varchar(2) NOT NULL,
  `name` varchar(30) NOT NULL,
  `pais` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_uf`
--

INSERT INTO `tb_uf` (`id`, `name`, `pais`) VALUES
('AC', 'ACRE', 'BR'),
('AL', 'ALAGOAS', 'BR'),
('AM', 'AMAZONAS', 'BR'),
('AP', 'AMAPA', 'BR'),
('BA', 'BAHIA', 'BR'),
('CE', 'CEARA', 'BR'),
('DF', 'DISTRITO FEDERAL', 'BR'),
('ES', 'ESPIRITO SANTO', 'BR'),
('GO', 'GOIAS', 'BR'),
('MA', 'MARANHAO', 'BR'),
('MG', 'MINAS GERAIS', 'BR'),
('MS', 'MATO GROSSO DO SUL', 'BR'),
('MT', 'MATO GROSSO', 'BR'),
('PA', 'PARA', 'BR'),
('PB', 'PARAIBA', 'BR'),
('PE', 'PERNAMBUCO', 'BR'),
('PI', 'PIAUI', 'BR'),
('PR', 'PARANA', 'BR'),
('RJ', 'RIO DE JANEIRO', 'BR'),
('RN', 'RIO GRANDE DO NORTE', 'BR'),
('RO', 'RONDONIA', 'BR'),
('RR', 'RORAIMA', 'BR'),
('RS', 'RIO GRANDE DO SUL', 'BR'),
('SC', 'SANTA CATARINA', 'BR'),
('SE', 'SEGIPE', 'BR'),
('SP', 'SAO PAULO', 'BR'),
('TO', 'TOCANTINS', 'BR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_uf`
--
ALTER TABLE `tb_uf`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
