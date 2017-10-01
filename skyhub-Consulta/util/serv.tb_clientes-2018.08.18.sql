
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 18/08/2017 às 14:57:04
-- Versão do Servidor: 10.1.24-MariaDB
-- Versão do PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `u634432767_tec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE IF NOT EXISTS `tb_clientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nick` (`nick`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`id`, `nome`, `nick`, `ativo`) VALUES
(0, 'AGESPISA', 'AGESPISA', '0'),
(1, 'ALUBAR', 'ALUBAR', '0'),
(2, 'AMBEV', 'AMBEV', '0'),
(3, 'APERAM', 'APERAM', '0'),
(4, 'BATERIAS MOURA', 'BATERIAS MOURA', '0'),
(5, 'BIOSEV - GIASA', 'BIOSEV - GIASA', '0'),
(6, 'CAB AGRESTE', 'CAB AGRESTE', '0'),
(7, 'CAB CUIABA', 'CAB CUIABA', '0'),
(8, 'CAEMA', 'CAEMA', '0'),
(9, 'CAER', 'CAER', '0'),
(10, 'CAERN', 'CAERN', '0'),
(11, 'CAGECE', 'CAGECE', '0'),
(12, 'CAGEPA', 'CAGEPA', '0'),
(13, 'CASAL', 'CASAL', '0'),
(14, 'CESAN - VITORIA', 'CESAN - VITORIA', '0'),
(15, 'COMPESA', 'COMPESA', '0'),
(16, 'COSANPA', 'COSANPA', '0'),
(17, 'DAE-VARZEA GRANDE', 'DAE-VARZEA GRANDE', '0'),
(18, 'DEPASA', 'DEPASA', '0'),
(19, 'DESO', 'DESO', '0'),
(20, 'NIAGRO NICHIREI-PE', 'NIAGRO NICHIREI-PE', '0'),
(21, 'SAAE - BACABAL', 'SAAE - BACABAL', '0'),
(22, 'SAAE - CAXIAS', 'SAAE - CAXIAS', '0'),
(23, 'SABARA', 'SABARA', '0'),
(24, 'SERRA NEGRA DO NORTE', 'SERRA NEGRA DO NORTE', '0'),
(25, 'SOLAR', 'SOLAR', '0'),
(26, 'UFRN', 'UFRN', '0'),
(28, 'BRASIL KIRIN', 'BRASIL KIRIN', '0'),
(29, 'GERDAU', 'GERDAU', '0'),
(30, 'HEINEKEN', 'HEINEKEN', '0'),
(32, 'SANEAR RONDONOPOLIS', 'SANEAR RONDONOPOLIS', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
