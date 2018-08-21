
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 31/05/2018 às 08:47:27
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
-- Estrutura da tabela `tb_bem`
--

CREATE TABLE IF NOT EXISTS `tb_bem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` int(11) NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numeracao` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fabricante` int(11) NOT NULL,
  `fabricanteNick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `proprietario` int(11) NOT NULL,
  `proprietarioNick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `proprietarioLocal` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `plaqueta` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dataFrabricacao` date DEFAULT NULL,
  `dataCompra` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_bem_tb_fabricante1_idx` (`fabricante`),
  KEY `fk_tb_bem_tb_loja1_idx` (`proprietario`),
  KEY `fk_tb_bem_tb_categoria1_idx` (`categoria`),
  KEY `fk_tb_bem_tb_produtos1_idx` (`produto`),
  KEY `fk_tb_bem_tb_locais1_idx` (`proprietarioLocal`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Extraindo dados da tabela `tb_bem`
--

INSERT INTO `tb_bem` (`id`, `produto`, `tag`, `name`, `modelo`, `numeracao`, `fabricante`, `fabricanteNick`, `proprietario`, `proprietarioNick`, `proprietarioLocal`, `categoria`, `plaqueta`, `dataFrabricacao`, `dataCompra`) VALUES
(1, 5, 'DOSATECH', 'DOSATECH', 'A100', '', 3, 'SABARA', 1, 'SABARA', 1, 4, '', '2018-04-02', '2018-04-02'),
(2, 2, 'SCL', 'SISTEMA CLORACAO', '50kg', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '', '2017-12-01', '2017-12-01'),
(3, 2, 'SCL', 'SISTEMA CLORACAO', '50kg', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '', '2017-12-01', '2017-12-01'),
(4, 2, 'SCL', 'SISTEMA CLORACAO', 'V2000', '', 3, 'SABARA', 1, 'SABARA', 1, 1, '', '2015-01-01', '2015-01-01'),
(5, 2, 'SCL', 'SISTEMA CLORACAO', '240KG', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '', '2017-12-01', '2017-12-01'),
(6, 2, 'SCL', 'SISTEMA CLORACAO', '50kg', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '', '2017-01-01', '2017-01-01'),
(7, 2, 'SCL', 'SISTEMA CLORACAO', '50kg e 100kg', '', 4, 'FLUID FEEDER', 1, 'SABARA', 1, 1, '', '2017-01-01', '2017-01-01'),
(8, 2, 'SCL', 'SISTEMA CLORACAO', '50kg e 100kg', '', 4, 'FLUID FEEDER', 1, 'SABARA', 1, 1, '', '2017-01-01', '2017-01-01'),
(9, 2, 'SCL', 'SISTEMA CLORACAO', '50KG', '', 4, 'FLUID FEEDER', 1, 'SABARA', 1, 1, '106602', '2015-01-01', '2015-01-01'),
(10, 2, 'SCL', 'SISTEMA CLORACAO', '240kg e 100kg', '', 3, 'SABARA', 1, 'SABARA', 1, 1, '', '2015-01-01', '2015-01-01'),
(11, 2, 'SCL', 'SISTEMA CLORACAO', '50kg', '', 4, 'FLUID FEEDER', 1, 'SABARA', 1, 1, '', '2015-01-01', '2015-01-01'),
(12, 2, 'SCL', 'SISTEMA CLORACAO', '50kg', '', 4, 'FLUID FEEDER', 1, 'SABARA', 1, 1, '', '2015-01-01', '2015-01-01'),
(13, 2, 'SCL', 'SISTEMA CLORACAO', '240kg', '', 5, 'EVOQUA', 1, 'SABARA', 1, 1, '', '2015-01-01', '2015-01-01'),
(14, 2, 'SCL', 'SISTEMA CLORACAO', '50KG', '', 4, 'FLUID FEEDER', 1, 'SABARA', 1, 1, '', '2015-01-01', '2015-01-01'),
(15, 2, 'SCL', 'SISTEMA CLORACAO', '240kg', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '', '2017-12-01', '2017-12-01'),
(16, 2, 'SCL', 'SISTEMA CLORACAO', '50kg', '', 3, 'SABARA', 1, 'SABARA', 1, 1, '', '2017-12-01', '2017-12-01'),
(17, 2, 'SCL', 'SISTEMA CLORACAO', '26kg', '', 3, 'SABARA', 1, 'SABARA', 1, 1, '', '2018-01-23', '2018-01-23'),
(18, 2, 'SCL', 'SISTEMA CLORACAO', '50kg', '', 3, 'SABARA', 1, 'SABARA', 1, 1, '', '2018-12-01', '2018-12-01'),
(19, 2, 'SCL', 'SISTEMA CLORACAO', '240kg', '', 3, 'SABARA', 1, 'SABARA', 1, 1, '', '2017-12-01', '2017-12-01'),
(20, 2, 'SCL', 'SISTEMA CLORACAO', '240kg', '', 3, 'SABARA', 1, 'SABARA', 1, 1, '', '2017-12-01', '2017-12-01'),
(21, 2, 'SCL', 'SISTEMA CLORACAO', '100kg', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '', '2018-12-01', '2018-12-01'),
(22, 2, 'SCL', 'SISTEMA CLORACAO', '50kg', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '', '2017-12-05', '2017-12-05'),
(23, 2, 'SCL', 'SISTEMA CLORACAO', '50kg', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '', '2017-12-01', '2017-12-01'),
(24, 2, 'SCL', 'SISTEMA CLORACAO', '100kg', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '', '2017-12-01', '2017-12-01'),
(25, 2, 'SCL', 'SISTEMA CLORACAO', '26kg', '', 4, 'FLUID FEEDER', 1, 'SABARA', 1, 1, '', '2015-01-01', '2015-01-01'),
(26, 2, 'SCL', 'SISTEMA CLORACAO', '240KG', '', 2, 'CLORANDO', 1, 'SABARA', 1, 1, '001812', '2018-01-01', '2018-01-01'),
(27, 9, 'MOTOR', 'MOTOR', 'MOTOR DO AGITADOR - ', 'AG-001', 3, 'SABARA', 1, 'SABARA', 1, 8, '', '2017-01-01', '2017-01-01'),
(28, 14, 'TALHA', 'TALHA', 'TALHA ELETRICA', 'TLH001', 6, 'OUTROS', 1, 'SABARA', 1, 8, '', '2017-01-01', '2017-01-01'),
(29, 16, 'TUBULACAO', 'TUBULACAO', 'TUBULAÇÕES', 'TBC001', 6, 'OUTROS', 1, 'SABARA', 1, 12, '', '2017-01-01', '2017-01-01'),
(30, 7, 'COMPRESSOR', 'COMPRESSOR', 'COMP PARAFUSO', 'COM001', 6, 'OUTROS', 1, 'SABARA', 1, 6, '', '2017-01-01', '2017-01-01'),
(31, 8, 'GERADOR DE ENERGIA', 'GERADOR DE ENERGIA', 'GERADOR DE ENERGIA', 'GER001', 6, 'OUTROS', 1, 'SABARA', 1, 6, '', '2018-01-01', '2018-01-01'),
(32, 11, 'PONTE ROLANTE', 'PONTE ROLANTE', 'PONTE ROLANTE', 'POR001', 6, 'OUTROS', 1, 'SABARA', 1, 6, '', '2017-01-01', '2017-01-01'),
(33, 6, 'CELULAS DE CARGA', 'CELULAS DE CARGA', 'CONJ DE CELULAS DE C', 'CEP001', 6, 'OUTROS', 1, 'SABARA', 1, 10, '', '2017-01-01', '2017-01-01'),
(34, 10, 'PLATAFARMA', 'PLATAFARMA', 'PLATAFORMA DOS ESTAC', 'PLT002', 6, 'OUTROS', 1, 'SABARA', 1, 9, '', '2017-01-01', '2017-01-01'),
(35, 16, 'TUBULACAO', 'TUBULACAO', 'LINHA DE AR COMPRIMI', 'LAR003', 6, 'OUTROS', 1, 'SABARA', 1, 10, '', '2017-01-01', '2017-01-01'),
(36, 15, 'TROCADOR DE CALOR', 'TROCADOR DE CALOR', 'TROCADOR DE CALOR', 'THP001', 6, 'OUTROS', 1, 'SABARA', 1, 11, '', '2017-01-01', '2017-01-01'),
(37, 12, 'RESERVATORIO', 'RESERVATORIO', 'RESERVATORIO DE ACID', 'RES002', 6, 'OUTROS', 1, 'SABARA', 1, 3, '', '2017-01-01', '2017-01-01'),
(38, 12, 'RESERVATORIO', 'RESERVATORIO', 'RESERVATORIO DE PREP', 'RES006', 6, 'OUTROS', 1, 'SABARA', 1, 3, '', '2017-01-01', '2017-01-01'),
(39, 13, 'SISTEMA BOMBA', 'SISTEMA BOMBA', 'SIST DE VALVU E BOMB', 'SBV006', 6, 'OUTROS', 1, 'SABARA', 1, 3, '', '2017-01-01', '2017-01-01'),
(40, 10, 'PLATAFARMA', 'PLATAFARMA', 'CARGA E DESCARGA', 'PLT003', 6, 'OUTROS', 1, 'SABARA', 1, 9, '', '2017-01-01', '2017-01-01'),
(41, 10, 'PLATAFORMA', 'PLATAFORMA', 'PLATAFORMA BOMBONAS', 'PLT004', 6, 'OUTROS', 1, 'SABARA', 1, 9, '', '2017-01-01', '2017-01-01'),
(42, 12, 'RESERVATORIO', 'RESERVATORIO', 'RESERVATORIO DE AR S', 'RAS002', 6, 'OUTROS', 1, 'SABARA', 1, 7, '', '2017-01-01', '2017-01-01'),
(43, 12, 'RESERVATORIO', 'RESERVATORIO', 'RESERVATORIO DE AR U', 'RAU002', 6, 'OUTROS', 1, 'SABARA', 1, 7, '', '2017-01-01', '2017-01-01'),
(44, 14, 'TALHA', 'TALHA', 'TALHA DO TESTE', 'TAL001', 9, 'BAMBOZZI', 1, 'SABARA', 1, 7, '', '2017-01-01', '2017-01-01'),
(45, 16, 'TUBULACAO', 'TUBULACAO', 'LINHA DE AR COMPEIMI', 'LAR002', 6, 'OUTROS', 1, 'SABARA', 1, 7, '', '2017-01-01', '2017-01-01'),
(46, 2, 'SCL', 'SISTEMA CLORACAO', '270kg/dia', '', 3, 'SABARA', 1, 'SABARA', 1, 1, '2159', '2018-01-01', '2018-01-02');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
