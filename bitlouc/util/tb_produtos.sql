-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 11-Out-2018 às 16:10
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
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `name`, `tag`, `tipo`) VALUES
(1, 'MASCARA AUTONOMA', 'MSA', 'PROD'),
(2, 'SISTEMA CLORACAO', 'SCL', 'PROD'),
(3, 'CLORADOR', 'CLORADOR', 'PROD'),
(4, 'CILINDRO AR RESPIRAVEL', 'CILINDRO AR', 'PROD'),
(5, 'DOSATECH', 'DOSATECH', 'PROD'),
(6, 'BALANÇA', 'BALANÇA', 'PROD'),
(7, 'COMPRESSOR', 'COMPRESSOR', 'PROD'),
(8, 'GERADOR DE ENERGIA', 'GERADOR DE ENERGIA', 'PROD'),
(9, 'MOTOR', 'MOTOR', 'PROD'),
(10, 'PLATAFORMA', 'PLATAFORMA', 'PROD'),
(11, 'PONTE ROLANTE', 'PONTE ROLANTE', 'PROD'),
(12, 'CONTENTOR', 'CONTENTOR', 'PROD'),
(13, 'SISTEMA BOMBEAMENTO', 'SISTEMA BOMBEAMENTO', 'PROD'),
(14, 'TALHA', 'TALHA', 'PROD'),
(15, 'SISTEMA RESFRIAMENTO', 'SISTEMA RESFRIAMENTO', 'PROD'),
(16, 'TUBULACAO', 'TUBULACAO', 'PROD'),
(17, 'BOMBA', 'BOMBA', 'PROD'),
(18, 'FILTRO', 'FILTRO', 'PROD'),
(19, 'EXAUSTOR', 'EXAUSTOR', 'PROD'),
(20, 'SISTEMA DE VACUO', 'SISTEMA DE VACUO', 'PROD'),
(21, 'INJETOR', 'INJETOR', 'PROD'),
(22, 'POÇO', 'POÇO', 'PROD'),
(23, 'LAVADORA', 'LAVADORA', 'PROD'),
(24, 'SISTEMA DE AR', 'SISTEMA DE AR', 'PROD');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_produtos_tb_produto_tipo1_idx` (`tipo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
