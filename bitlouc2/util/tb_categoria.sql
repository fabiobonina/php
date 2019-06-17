-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 11-Out-2018 às 16:14
-- Versão do servidor: 10.2.17-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u634432767_tec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`id`, `name`, `tag`) VALUES
(1, 'GAS CLORO', 'GCL'),
(2, 'SEGURACA', 'SEG'),
(3, 'POLICLORETO ALUMINIO', 'PAC'),
(4, 'PASTILHA', 'PAST'),
(5, 'DIOXIDO DE CLORO', 'DIOX'),
(6, 'ENVASE', 'ENVASE'),
(7, 'TESTE', 'TESTE'),
(8, 'CLARIANT', 'CLARIANT'),
(9, 'PLATAFORMA CENTRAL', 'PLAT-CENTRAL'),
(10, 'ESTACIONARIOS', 'ESTACIONARIOS'),
(11, 'HIPOCLORITO', 'HIPO'),
(12, 'CENTRAL DE INCÊNDIO', 'CENT-INCEN'),
(13, 'EFLUENTES', 'EFLUENTES'),
(14, 'PRODUCAO GERAL', 'PROD'),
(15, 'OFICINA', 'OFIC'),
(16, 'SODA', 'SODA'),
(17, 'CLORATO', 'CLORATO'),
(18, 'SISTEMA RESFRIAMENTO', 'SIST-RESFR');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
