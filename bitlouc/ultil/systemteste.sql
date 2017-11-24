-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Nov-2017 às 11:08
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
-- Estrutura da tabela `tb_grupoloja`
--

CREATE TABLE `tb_grupoloja` (
  `id` varchar(2) NOT NULL,
  `decricao` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_grupoloja`
--

INSERT INTO `tb_grupoloja` (`id`, `decricao`) VALUES
('P', 'Proprietario'),
('C', 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_loja`
--

CREATE TABLE `tb_loja` (
  `id` int(11) NOT NULL,
  `displayName` varchar(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `proprietario` int(11) NOT NULL,
  `grupoLoja` varchar(2) NOT NULL,
  `seguimento` varchar(4) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  `ativo` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_loja`
--

INSERT INTO `tb_loja` (`id`, `displayName`, `name`, `proprietario`, `grupoLoja`, `seguimento`, `data`, `ativo`) VALUES
(1, 'AGESPISA', 'AGESPISA', 1, 'C', 'SAN', '2017-08-18', '0'),
(2, 'ALUBAR', 'ALUBAR', 1, 'C', 'IND', '2017-08-18', '0'),
(3, 'AMBEV', 'AMBEV', 1, 'C', 'BEB', '2017-08-18', '0'),
(4, 'APERAM', 'APERAM', 1, 'C', 'IND', '2017-08-18', '0'),
(5, 'BATERIAS MOURA', 'BATERIAS MOURA', 1, 'C', 'IND', '2017-08-18', '0'),
(6, 'BIOSEV - GIASA', 'BIOSEV - GIASA', 1, 'C', 'USI', '2017-08-18', '0'),
(7, 'CAB AGRESTE', 'CAB AGRESTE', 1, 'C', 'SAN', '2017-08-18', '0'),
(8, 'CAB CUIABA', 'CAB CUIABA', 1, 'C', 'SAN', '2017-08-18', '0'),
(9, 'CAEMA', 'CAEMA', 1, 'C', 'SAN', '2017-08-18', '0'),
(10, 'CAER', 'CAER', 1, 'C', 'SAN', '2017-08-18', '0'),
(11, 'CAERN', 'CAERN', 1, 'C', 'SAN', '2017-08-18', '0'),
(12, 'CAGECE', 'CAGECE', 1, 'C', 'SAN', '2017-08-18', '0'),
(13, 'CAGEPA', 'CAGEPA', 1, 'C', 'SAN', '2017-08-18', '0'),
(14, 'CASAL', 'CASAL', 1, 'C', 'SAN', '2017-08-18', '0'),
(15, 'CESAN', 'CESAN', 1, 'C', 'SAN', '2017-08-18', '0'),
(16, 'COMPESA', 'COMPESA', 1, 'C', 'SAN', '2017-08-18', '0'),
(17, 'COSANPA', 'COSANPA', 1, 'C', 'SAN', '2017-08-18', '0'),
(18, 'DAE-VARZEA GRANDE', 'DAE-VARZEA GRANDE', 1, 'C', 'SAN', '2017-08-18', '0'),
(19, 'DEPASA', 'DEPASA', 1, 'C', 'SAN', '2017-08-18', '0'),
(20, 'DESO', 'DESO', 1, 'C', 'SAN', '2017-08-18', '0'),
(21, 'NIAGRO NICHIREI-PE', 'NIAGRO NICHIREI-PE', 1, 'C', 'IND', '2017-08-18', '0'),
(22, 'SAAE - BACABAL', 'SAAE - BACABAL', 1, 'C', 'SAN', '2017-08-18', '0'),
(23, 'SAAE - CAXIAS', 'SAAE - CAXIAS', 1, 'C', 'SAN', '2017-08-18', '0'),
(24, 'SABARA', 'SABARA', 1, 'P', 'IND', '2017-08-18', '0'),
(25, 'SERRA NEGRA DO NORTE', 'SERRA NEGRA DO NORTE', 1, 'C', 'SAN', '2017-08-18', '0'),
(26, 'SOLAR', 'SOLAR', 1, 'C', 'BEB', '2017-08-18', '0'),
(27, 'UFRN', 'UFRN', 1, 'C', 'OUT', '2017-08-18', '0'),
(28, 'BRASIL KIRIN', 'BRASIL KIRIN', 1, 'C', 'BEB', '2017-08-18', '0'),
(29, 'GERDAU', 'GERDAU', 1, 'C', 'IND', '2017-08-18', '0'),
(30, 'HEINEKEN', 'HEINEKEN', 1, 'C', 'BEB', '2017-08-18', '0'),
(31, 'SANEAR RONDONOPOLIS', 'SANEAR RONDONOPOLIS', 1, 'C', 'SAN', '2017-08-18', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_proprietario`
--

CREATE TABLE `tb_proprietario` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `cadastro` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_proprietario`
--

INSERT INTO `tb_proprietario` (`id`, `name`, `nick`, `ativo`, `cadastro`) VALUES
(1, 'Sabará Químicos Ingredientes S/A', 'Sabará', 0, '2017-08-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_seguimento`
--

CREATE TABLE `tb_seguimento` (
  `id` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_seguimento`
--

INSERT INTO `tb_seguimento` (`id`, `name`) VALUES
('SAN', 'SANEAMENTO'),
('IND', 'INDUSTRIA'),
('BEB', 'BEBIDA'),
('USI', 'USINA'),
('OUT', 'OUTRO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sistema`
--

CREATE TABLE `tb_sistema` (
  `id` varchar(12) NOT NULL,
  `descricao` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_sistema`
--

INSERT INTO `tb_sistema` (`id`, `descricao`, `ativo`) VALUES
('SBDPT-SPT', 'PASTILHA', '0'),
('SBDSD-SDS', 'DICLORO', '0'),
('SBDXC-SDX', 'DIOXIDO DE CLORO', '0'),
('SBGCL-SCL', 'CLORO', '0'),
('SBPAC-SPC', 'PAC', '0'),
('SBSEG-KITCL', 'KIT DE EMERGENCIA CLORO', '0'),
('SBSEG-MCA', 'MASCARA AUTONOMA', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo`
--

CREATE TABLE `tb_tipo` (
  `id` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo`
--

INSERT INTO `tb_tipo` (`id`, `name`) VALUES
('ETA', 'ETA'),
('ETE', 'ETE'),
('EEA', 'EEA'),
('IND', 'INDUSTRIA'),
('POC', 'POÇO'),
('OUT', 'OUTROS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `avatar` varchar(350) DEFAULT NULL,
  `proprietario` int(11) DEFAULT NULL,
  `grupoLoja` int(2) DEFAULT NULL,
  `loja` int(11) DEFAULT NULL,
  `nivel` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `ativo` enum('0','1') NOT NULL DEFAULT '0',
  `data_cadastro` date NOT NULL DEFAULT '0000-00-00',
  `data_ultimo_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user`, `password`, `avatar`, `proprietario`, `grupoLoja`, `loja`, `nivel`, `ativo`, `data_cadastro`, `data_ultimo_login`) VALUES
(0, 'FABIO VITORINO BONINA MORAIS', 'fabiobonina@gmail.com', 'Fabio Bonina', 'a906449d5769fa7361d7ecc6aa3f6d28', 'http://www.gravatar.com/avatar/5f3781a40c3fde1b4ac568a97692aa70?d=identicon', NULL, NULL, NULL, '0', '0', '2017-11-08', '2017-11-08 20:18:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_grupoloja`
--
ALTER TABLE `tb_grupoloja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_proprietario`
--
ALTER TABLE `tb_proprietario`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_seguimento`
--
ALTER TABLE `tb_seguimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sistema`
--
ALTER TABLE `tb_sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tipo`
--
ALTER TABLE `tb_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
