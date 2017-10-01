
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 03/11/2016 às 08:27:09
-- Versão do Servidor: 10.0.20-MariaDB
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
-- Estrutura da tabela `tb_oat`
--

CREATE TABLE IF NOT EXISTS `tb_oat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nickuser` varchar(30) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `localidade` int(11) NOT NULL,
  `servico` varchar(6) NOT NULL,
  `sistema` varchar(12) NOT NULL,
  `data_sol` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `filial` int(2) DEFAULT NULL,
  `os` int(11) DEFAULT NULL,
  `data_os` datetime DEFAULT '0000-00-00 00:00:00',
  `data_fech` datetime DEFAULT '0000-00-00 00:00:00',
  `data_term` datetime DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `ativo` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `nickuser` (`nickuser`,`cliente`,`localidade`,`servico`,`sistema`),
  KEY `fk_cleinte` (`cliente`),
  KEY `fk_localidades` (`localidade`),
  KEY `servico` (`servico`),
  KEY `sistema` (`sistema`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Extraindo dados da tabela `tb_oat`
--

INSERT INTO `tb_oat` (`id`, `nickuser`, `cliente`, `localidade`, `servico`, `sistema`, `data_sol`, `filial`, `os`, `data_os`, `data_fech`, `data_term`, `status`, `ativo`) VALUES
(1, 'Rafael Santos Carlos', 'CASAL', 406, 'PV0001', 'SBGCL-SCL', '2016-11-01 11:04:45', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(2, 'Francinei Pantoja de Oliveira ', 'COSANPA', 423, 'CR0001', 'SBGCL-SCL', '2016-11-01 13:03:36', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(3, 'Gladson de Oliveira Marinho', 'CAERN', 157, 'VT0001', 'SBBDO-BMB', '2016-11-01 16:16:02', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(4, 'Francinei Pantoja de Oliveira ', 'COSANPA', 496, 'CR0001', 'SBPAC-SPC', '2016-11-01 17:06:49', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(8, 'Thonpson Carvalho', 'CAERN', 111, 'OP0001', 'SBDSD-SDS', '2016-11-01 18:59:18', 1, 665, '2016-11-01 19:06:10', NULL, NULL, '1', '0'),
(6, 'Thonpson Carvalho', 'CAERN', 127, 'NV0001', 'SBDSD-SDS', '2016-11-01 18:54:19', 1, 650, '2016-11-01 19:06:37', NULL, NULL, '1', '0'),
(7, 'Thonpson Carvalho', 'CAGEPA', 265, 'VT0001', 'SBGCL-SCL', '2016-11-01 18:55:48', 1, 646, '2016-11-01 19:05:03', NULL, NULL, '1', '0'),
(9, 'Thonpson Carvalho', 'CAERN', 183, 'OP0001', 'SBDSD-SDS', '2016-11-01 19:00:16', 1, 702, '2016-11-01 19:07:11', NULL, NULL, '1', '0'),
(10, 'Thonpson Carvalho', 'CAERN', 181, 'OP0001', 'SBDSD-SDS', '2016-11-01 19:00:53', 1, 703, '2016-11-01 19:07:36', NULL, NULL, '1', '0'),
(11, 'Thonpson Carvalho', 'CAERN', 111, 'OP0001', 'SBDSD-SDS', '2016-11-01 19:01:22', 1, 704, '2016-11-01 19:07:55', NULL, NULL, '1', '0'),
(12, 'Thonpson Carvalho', 'CAERN', 127, 'OP0001', 'SBDSD-SDS', '2016-11-01 19:01:47', 1, 705, '2016-11-01 19:08:15', NULL, NULL, '1', '0'),
(13, 'Thonpson Carvalho', 'CAGEPA', 325, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:02:34', 1, 714, '2016-11-01 19:08:43', NULL, NULL, '1', '0'),
(14, 'Thonpson Carvalho', 'CAERN', 102, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:03:00', 1, 720, '2016-11-01 19:09:02', NULL, NULL, '1', '0'),
(15, 'Thonpson Carvalho', 'CAERN', 183, 'VT0001', 'SBDSD-SDS', '2016-11-01 19:03:28', 1, 741, '2016-11-01 19:09:27', NULL, NULL, '1', '0'),
(16, 'Thonpson Carvalho', 'COSANPA', 423, 'OP0002', 'SBGCL-SCL', '2016-11-01 19:14:27', 4, 208, '2016-11-01 19:20:11', NULL, NULL, '1', '0'),
(17, 'Thonpson Carvalho', 'CAEMA', 29, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:14:58', 4, 213, '2016-11-01 19:20:31', NULL, NULL, '1', '0'),
(18, 'Thonpson Carvalho', 'COSANPA', 462, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:15:36', 4, 214, '2016-11-01 19:20:52', NULL, NULL, '1', '0'),
(19, 'Thonpson Carvalho', 'CAERN', 202, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:15:56', 1, 781, '2016-11-01 19:21:25', NULL, NULL, '1', '0'),
(20, 'Thonpson Carvalho', 'CAGEPA', 295, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:16:21', 1, 783, '2016-11-01 19:21:46', NULL, NULL, '1', '0'),
(21, 'Thonpson Carvalho', 'CAGEPA', 267, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:16:50', 1, 784, '2016-11-01 19:22:38', NULL, NULL, '1', '0'),
(22, 'Thonpson Carvalho', 'CAERN', 166, 'VT0001', 'SBDSD-SDS', '2016-11-01 19:17:21', 1, 790, '2016-11-01 19:22:54', NULL, NULL, '1', '0'),
(23, 'Thonpson Carvalho', 'CAERN', 167, 'VT0001', 'SBDSD-SDS', '2016-11-01 19:17:42', 1, 791, '2016-11-01 19:23:13', NULL, NULL, '1', '0'),
(24, 'Thonpson Carvalho', 'CAERN', 98, 'VT0001', 'SBGCL-SCL', '2016-11-01 19:18:56', 1, 771, '2016-11-01 19:19:38', NULL, NULL, '1', '0'),
(25, 'Thonpson Carvalho', 'CAERN', 168, 'VT0001', 'SBDSD-SDS', '2016-11-01 19:24:10', 1, 792, '2016-11-01 19:25:25', NULL, NULL, '1', '0'),
(26, 'Thonpson Carvalho', 'CAERN', 169, 'VT0001', 'SBDSD-SDS', '2016-11-01 19:24:33', 1, 793, '2016-11-01 19:25:44', NULL, NULL, '1', '0'),
(27, 'Thonpson Carvalho', 'CAERN', 104, 'VT0001', 'SBDSD-SDS', '2016-11-01 19:31:44', 1, 794, '2016-11-01 19:38:44', NULL, NULL, '1', '0'),
(30, 'Thonpson Carvalho', 'CAERN', 101, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:33:31', 1, 795, '2016-11-01 19:39:06', NULL, NULL, '1', '0'),
(29, 'Thonpson Carvalho', 'CAERN', 100, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:32:43', 1, 796, '2016-11-01 19:39:28', NULL, NULL, '1', '0'),
(31, 'Thonpson Carvalho', 'CAGEPA', 366, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:33:58', 1, 797, '2016-11-01 19:39:47', NULL, NULL, '1', '0'),
(32, 'Thonpson Carvalho', 'CAGEPA', 282, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:34:26', 1, 798, '2016-11-01 19:40:06', NULL, NULL, '1', '0'),
(33, 'Thonpson Carvalho', 'CAEMA', 28, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:34:47', 4, 217, '2016-11-01 19:40:27', NULL, NULL, '1', '0'),
(34, 'Thonpson Carvalho', 'CAGEPA', 276, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:35:11', 1, 801, '2016-11-01 19:40:48', NULL, NULL, '1', '0'),
(35, 'Thonpson Carvalho', 'CAEMA', 13, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:35:30', 4, 218, '2016-11-01 19:41:14', NULL, NULL, '1', '0'),
(36, 'Thonpson Carvalho', 'CAERN', 173, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:36:05', 1, 805, '2016-11-01 19:41:36', NULL, NULL, '1', '0'),
(37, 'Thonpson Carvalho', 'AGESPISA', 1, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:36:20', 4, 221, '2016-11-01 19:41:53', NULL, NULL, '1', '0'),
(38, 'Thonpson Carvalho', 'CAERN', 127, 'OP0001', 'SBDSD-SDS', '2016-11-01 19:48:12', 1, 806, '2016-11-01 19:53:19', NULL, NULL, '1', '0'),
(39, 'Thonpson Carvalho', 'CAERN', 126, 'VT0001', 'SBGCL-SCL', '2016-11-01 19:48:37', 1, 807, '2016-11-01 19:53:35', NULL, NULL, '1', '0'),
(40, 'Thonpson Carvalho', 'CAGEPA', 247, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:48:58', 1, 808, '2016-11-01 19:53:50', NULL, NULL, '1', '0'),
(41, 'Thonpson Carvalho', 'CAERN', 200, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:49:26', 1, 810, '2016-11-01 19:54:12', NULL, NULL, '1', '0'),
(42, 'Thonpson Carvalho', 'CAERN', 101, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:49:54', 1, 813, '2016-11-01 19:54:31', NULL, NULL, '1', '0'),
(43, 'Thonpson Carvalho', 'CAERN', 156, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:50:17', 1, 814, '2016-11-01 19:54:45', NULL, NULL, '1', '0'),
(44, 'Thonpson Carvalho', 'CAERN', 127, 'OP0001', 'SBDSD-SDS', '2016-11-01 19:50:42', 1, 817, '2016-11-01 19:55:04', NULL, NULL, '1', '0'),
(45, 'Thonpson Carvalho', 'CAGEPA', 281, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:51:06', 1, 818, '2016-11-01 19:55:19', NULL, NULL, '1', '0'),
(46, 'Thonpson Carvalho', 'AGESPISA', 3, 'PV0001', 'SBGCL-SCL', '2016-11-01 19:51:26', 4, 227, '2016-11-01 19:55:34', NULL, NULL, '1', '0'),
(47, 'Thonpson Carvalho', 'CAERN', 111, 'PV0001', 'SBDSD-SDS', '2016-11-01 19:51:53', 1, 819, '2016-11-01 19:55:51', NULL, NULL, '1', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
