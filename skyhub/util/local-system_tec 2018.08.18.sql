-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Ago-2017 às 22:17
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-03:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_tec`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nickuser` varchar(30) NOT NULL,
  `user` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `avatar` varchar(350) DEFAULT NULL,
  `proprietario` int(11) DEFAULT NULL,
  `grupoLoja` int(11) DEFAULT NULL,
  `loja` int(11) DEFAULT NULL,
  `nivel` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `ativo` enum('0','1') NOT NULL DEFAULT '0',
  `data_cadastro` date NOT NULL DEFAULT '0000-00-00',
  `data_ultimo_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `nickuser`, `user`, `senha`, `avatar`, `proprietario`, `grupoLoja`, `loja`, `nivel`, `ativo`, `data_cadastro`, `data_ultimo_login`) VALUES
(1, 'Fabio Bonina', 'fabiobonina@gmail.com', 'fabio.bonina', 'Fabio Bonina', '123abc', '', 1, 1, 24, '4', '0', '2016-10-03', '2017-08-18 17:08:41'),
(2, 'Alexandre Melo', 'alexandre.melo@gruposabara.com', 'alexandre.melo', 'Alexandre Melo', '123abc', '', 1, 1, 24, '3', '0', '2016-11-01', '2016-11-01 10:45:16'),
(3, 'Rafael Carlos', 'rafael.carlos@gruposabara.com', 'rafael.carlos', 'Rafael Carlos', 'rafael', '', 1, 1, 24, '3', '0', '2016-11-01', '2016-11-01 11:03:17'),
(4, 'Thonpson Carvalho', 'thonpson.carvalho@gruposabara.com', 'thonpson', 'Thonpson Carvalho', '210500', '', 1, 1, 24, '3', '0', '2016-11-01', '2016-11-01 11:37:59'),
(5, 'Francinei Pantoja', 'francinei@gruposabara.com', 'francinei', 'Francinei Pantoja', '123abc', '', 1, 1, 24, '2', '0', '2016-11-01', '2016-11-01 13:00:53'),
(6, 'Gladson de Oliveira Marinho', 'gladson.marinho@gruposabara.com', 'gladson.marinho', 'Gladson Marinho', 'gl080208', '', 1, 1, 24, '2', '0', '2016-11-01', '2016-11-01 16:13:08'),
(7, 'Nahim Cardoso Pantoja', 'nahim.pantoja@gruposabara.com', 'nahim.pantoja', 'Nahim Pantoja', '123abc', '', 1, 1, 24, '2', '0', '2016-11-02', '2016-11-02 09:36:31'),
(8, 'RICARDO LOPES', 'ricardo@gruposabara', 'ricardo.lopes', 'RICARDO LOPES', 'lu102432', '', 1, 1, 24, '2', '0', '2016-11-03', '2016-11-03 14:23:57'),
(9, 'AILTON SILVA', 'ailtondasneves@globo.com', 'ailton.silva', 'AILTON SILVA', 'sabrina1931', '', 1, 1, 24, '3', '0', '2016-11-03', '2016-11-03 14:26:33'),
(10, 'FRANCISCO BARBOSA JR', 'francisco.barbosa@gruposabara.com', 'francisco.barbosa', 'FRANCISCO BARBOSA JR', '123abc', '', 1, 1, 24, '2', '0', '2016-11-03', '2016-11-03 19:15:57'),
(11, 'JOSE RIBAMAR FERREIRA', 'jose.ferreira@gruposabara.com', 'jose.ferreira', 'JOSE RIBAMAR', 'abc123', '', 1, 1, 24, '0', '1', '2016-11-03', '2016-11-03 19:17:22'),
(12, 'Sergio Medeiros', 'sergio@sabara.com', 'sergio', 'Sergio Medeiros', '123abc', '', 1, 1, 24, '3', '0', '2016-11-03', '2016-11-03 23:14:17'),
(13, 'REGINALDO BARBOSA JR', 'reginaldo.barbosa@gruposabara.com', 'reginaldo.barbosa', 'REGINALDO BARBOSA JR', 'abc123', '', 1, 1, 24, '2', '0', '2016-11-04', '2016-11-04 00:00:00'),
(14, 'BRUNO ALVES', 'bruno.alves@gruposabara.com', 'bruno.alves', 'BRUNO ALVES', 'abc123', '', 1, 1, 24, '2', '0', '2016-11-04', '2016-11-04 00:00:00'),
(15, 'HEITOR BRITO', 'heitor.brito@gruposabara.com', 'heitor.brito', 'HEITOR BRITO', 'abc123', '', 1, 1, 24, '0', '1', '2016-11-04', '2016-11-04 00:00:00'),
(16, 'DAGMO ESBELL', 'dagmo.esbell@gruposabara.com', 'dagmo.esbell', 'DAGMO ESBELL', 'daniloesbell', '', 1, 1, 24, '2', '0', '2016-11-16', '2016-11-16 11:59:35'),
(17, 'JOSE RIBAMAR', 'jose.ferreira@gmail.com', 'José Ribamar', 'JOSE RIBAMAR', 'jorife1980', '', 1, 1, 24, '0', '1', '2016-11-25', '2016-11-25 16:44:52'),
(18, 'João Batista', 'joao.batista@gruposabara.com', 'joao.batista', 'João Batista', '123abc', '', 1, 1, 24, '3', '0', '2017-02-16', '0000-00-00 00:00:00'),
(19, 'Ivanilson Ferreira', 'ivanilson@gruposabara.com', 'ivanilson', 'Ivanilson Ferreira', 'abc123', '', 1, 1, 24, '2', '0', '2017-02-16', '0000-00-00 00:00:00'),
(20, 'Antonio Ricardo', 'antonio.ferreira@gruposabara.com', 'antonio.ferreira', 'Antonio Ricardo', 'abc123', '', 1, 1, 24, '2', '0', '2017-02-16', '0000-00-00 00:00:00'),
(21, 'Jose Wilson', 'jose.wilson@gruposabara.com', 'jose.wilson', 'Jose Wilson', '1234ab', '', 1, 1, 24, '2', '0', '2017-06-28', '0000-00-00 00:00:00'),
(22, 'Cleber Souza', 'cleber.souza@gruposabara.com', 'cleber.souza', 'Cleber Souza', 'abc123', '', 1, 1, 24, '2', '0', '2017-06-13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ativo`
--

CREATE TABLE `tb_ativo` (
  `id` int(11) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `localidade` int(11) NOT NULL,
  `plaqueta` varchar(11) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_ativo`
--

INSERT INTO `tb_ativo` (`id`, `cliente`, `localidade`, `plaqueta`, `data`) VALUES
(0, 'CAERN', 71, '436', '2016-11-03'),
(1, 'CAERN', 71, '104558', '2016-11-03'),
(2, 'CAERN', 71, '106183', '2016-11-03'),
(3, 'CAERN', 76, '105514', '2016-11-03'),
(4, 'CAERN', 76, '106316', '2016-11-03'),
(5, 'CAERN', 77, '106185', '2016-11-03'),
(6, 'CAERN', 80, '259', '2016-11-03'),
(7, 'CAERN', 86, '260', '2016-11-03'),
(8, 'CAERN', 87, '272', '2016-11-03'),
(9, 'CAERN', 88, '106576', '2016-11-03'),
(10, 'CAERN', 92, '106315', '2016-11-03'),
(11, 'CAERN', 92, '106522', '2016-11-03'),
(12, 'CAERN', 98, '103029', '2016-11-03'),
(13, 'CAERN', 98, '105528', '2016-11-03'),
(14, 'CAERN', 102, '10080', '2016-11-03'),
(15, 'CAERN', 102, '106399', '2016-11-03'),
(16, 'CAERN', 109, '106014', '2016-11-03'),
(17, 'CAERN', 109, '106323', '2016-11-03'),
(262, 'CAERN', 154, ' 000308', '2016-11-10'),
(261, 'CAERN', 111, '000282', '2016-11-10'),
(20, 'CAERN', 114, '106545', '2016-11-03'),
(21, 'CAERN', 114, '106601', '2016-11-03'),
(22, 'CAERN', 121, '104098', '2016-11-03'),
(260, 'CAERN', 101, '106022', '2016-11-10'),
(259, 'CAERN', 126, 'N?O EXISTE', '2016-11-10'),
(27, 'CAERN', 131, '106318', '2016-11-03'),
(28, 'CAERN', 131, '106526', '2016-11-03'),
(29, 'CAERN', 132, '105993', '2016-11-03'),
(30, 'CAERN', 132, '106312', '2016-11-03'),
(31, 'CAERN', 133, '106039', '2016-11-03'),
(32, 'CAERN', 133, '106069', '2016-11-03'),
(33, 'CAERN', 135, '105518', '2016-11-03'),
(34, 'CAERN', 135, '106319', '2016-11-03'),
(35, 'CAERN', 137, '106509', '2016-11-03'),
(36, 'CAERN', 144, '106186', '2016-11-03'),
(37, 'CAERN', 148, '256', '2016-11-03'),
(38, 'CAERN', 150, '283', '2016-11-03'),
(39, 'CAERN', 151, '284', '2016-11-03'),
(40, 'CAERN', 152, '10690', '2016-11-03'),
(41, 'CAERN', 152, '106590', '2016-11-03'),
(42, 'CAERN', 156, '106010', '2016-11-03'),
(43, 'CAERN', 156, '106320', '2016-11-03'),
(44, 'CAERN', 171, '249', '2016-11-03'),
(45, 'CAERN', 172, '269', '2016-11-03'),
(46, 'CAERN', 173, '106314', '2016-11-03'),
(47, 'CAERN', 183, '106475', '2016-11-03'),
(48, 'CAERN', 183, '106501', '2016-11-03'),
(264, 'CAERN', 184, '105452', '2016-11-10'),
(51, 'CAERN', 185, '106490', '2016-11-03'),
(52, 'CAERN', 187, '106493', '2016-11-03'),
(53, 'CAERN', 187, '106553', '2016-11-03'),
(54, 'CAERN', 189, '106198', '2016-11-03'),
(55, 'CAERN', 191, '105458', '2016-11-03'),
(56, 'CAERN', 191, '106180', '2016-11-03'),
(57, 'CAERN', 193, '234', '2016-11-03'),
(58, 'CAERN', 194, '268', '2016-11-03'),
(59, 'CAERN', 195, '106317', '2016-11-03'),
(60, 'CAERN', 195, '106525', '2016-11-03'),
(61, 'CAERN', 199, '106575', '2016-11-03'),
(62, 'CAERN', 199, '106589', '2016-11-03'),
(63, 'CAERN', 200, '105527', '2016-11-03'),
(64, 'CAERN', 200, '106295', '2016-11-03'),
(65, 'CAERN', 205, '106586', '2016-11-03'),
(66, 'CAERN', 206, '106364', '2016-11-03'),
(67, 'CAERN', 206, '106365', '2016-11-03'),
(68, 'CAGEPA', 217, '106219', '2016-11-03'),
(69, 'CAGEPA', 218, '106213', '2016-11-03'),
(70, 'CAGEPA', 225, '106166', '2016-11-03'),
(71, 'CAGEPA', 238, '105909', '2016-11-03'),
(72, 'CAGEPA', 246, '104576', '2016-11-03'),
(73, 'CAGEPA', 246, '106188', '2016-11-03'),
(74, 'CAGEPA', 248, '104145', '2016-11-03'),
(75, 'CAGEPA', 250, '106406', '2016-11-03'),
(76, 'CAGEPA', 250, '106595', '2016-11-03'),
(77, 'CAGEPA', 263, '105937', '2016-11-03'),
(78, 'CAGEPA', 294, '106363', '2016-11-03'),
(79, 'CAGEPA', 295, '105946', '2016-11-03'),
(80, 'CAGEPA', 316, '105931', '2016-11-03'),
(81, 'CAGEPA', 316, '106289', '2016-11-03'),
(82, 'CAGEPA', 352, '106254', '2016-11-03'),
(83, 'CAGEPA', 365, '106162', '2016-11-03'),
(84, 'CAGEPA', 366, '104656', '2016-11-03'),
(85, 'CAGEPA', 366, '106268', '2016-11-03'),
(86, 'CAGEPA', 371, '105924', '2016-11-03'),
(87, 'CAGEPA', 371, '106310', '2016-11-03'),
(88, 'CAGEPA', 371, '106396', '2016-11-03'),
(89, 'CASAL', 383, '102980', '2016-11-03'),
(90, 'CASAL', 383, '102981', '2016-11-03'),
(91, 'CASAL', 383, '102988', '2016-11-03'),
(92, 'CASAL', 383, '104091', '2016-11-03'),
(93, 'CASAL', 387, '248', '2016-11-03'),
(94, 'CASAL', 387, '105035', '2016-11-03'),
(95, 'CASAL', 387, '105036', '2016-11-03'),
(96, 'CASAL', 387, '105579', '2016-11-03'),
(97, 'CASAL', 394, '218', '2016-11-03'),
(98, 'CASAL', 394, '219', '2016-11-03'),
(99, 'CASAL', 396, '104033', '2016-11-03'),
(100, 'CASAL', 396, '104058', '2016-11-03'),
(101, 'CASAL', 396, '104061', '2016-11-03'),
(102, 'CASAL', 398, '104067', '2016-11-03'),
(103, 'CASAL', 398, '104077', '2016-11-03'),
(104, 'CASAL', 398, '104082', '2016-11-03'),
(105, 'CASAL', 398, '104083', '2016-11-03'),
(106, 'CASAL', 401, '104570', '2016-11-03'),
(107, 'CASAL', 401, '104571', '2016-11-03'),
(108, 'CASAL', 401, '104613', '2016-11-03'),
(109, 'CASAL', 401, '105056', '2016-11-03'),
(110, 'CASAL', 404, '104059', '2016-11-03'),
(111, 'CASAL', 404, '104063', '2016-11-03'),
(112, 'CASAL', 404, '104064', '2016-11-03'),
(113, 'CASAL', 405, '104056', '2016-11-03'),
(114, 'CASAL', 405, '104068', '2016-11-03'),
(115, 'CASAL', 405, '104084', '2016-11-03'),
(116, 'CASAL', 405, '104086', '2016-11-03'),
(117, 'COSANPA', 409, '10210', '2016-11-03'),
(118, 'COSANPA', 428, '105309', '2016-11-03'),
(119, 'COSANPA', 436, '204224', '2016-11-03'),
(120, 'COSANPA', 450, '105330', '2016-11-03'),
(121, 'DESO', 523, '104469', '2016-11-03'),
(122, 'DESO', 525, '104468', '2016-11-03'),
(123, 'DESO', 526, '104527', '2016-11-03'),
(124, 'UFRN', 532, '106243', '2016-11-03'),
(250, 'CAGEPA', 267, '105944', '2016-11-07'),
(251, 'CAGEPA', 282, '106168', '2016-11-07'),
(252, 'CAGEPA', 276, '0104577', '2016-11-07'),
(253, 'CAGEPA', 247, '106395', '2016-11-07'),
(254, 'CASAL', 406, '0104079', '2016-11-08'),
(255, 'CASAL', 406, '0104074', '2016-11-08'),
(256, 'CASAL', 406, '0104062', '2016-11-08'),
(257, 'CAERN', 100, 'N?O EXISTE ', '2016-11-09'),
(258, 'CAERN', 127, '105578', '2016-11-10'),
(263, 'CAERN', 149, '000307', '2016-11-10'),
(265, 'CAERN', 184, '106176', '2016-11-10'),
(266, 'CAGEPA', 361, '106170', '2016-11-11'),
(267, 'CAGEPA', 336, 'N?O POSSUI', '2016-11-11'),
(268, 'CAGEPA', 355, '000299', '2016-11-15'),
(269, 'CAERN', 122, '105078', '2016-11-15'),
(270, 'CAERN', 157, '000298', '2016-11-15'),
(271, 'CASAL', 384, '0104607', '2016-11-18'),
(272, 'CASAL', 384, '0104604', '2016-11-18'),
(273, 'CASAL', 384, '0104612', '2016-11-18'),
(274, 'CASAL', 384, '0104642', '2016-11-18'),
(275, 'CAERN', 181, '106574', '2016-11-19');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(28, 'BRASIL KIRIN', 'BRASIL KIRIN', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_descricao`
--

CREATE TABLE `tb_descricao` (
  `id` int(11) NOT NULL,
  `oat` int(11) NOT NULL,
  `descricao` varchar(800) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_descricao`
--

INSERT INTO `tb_descricao` (`id`, `oat`, `descricao`) VALUES
(1, 48, 'OCORRÊNCIA: BOMBA JACUZZI #2 PARADA\r\nCAUSA: ROTOR TRAVADO\r\nSOLUÇÃO: TROCA DE ROTOR/BRAKET\r\nDATA E HORA INICIAL: 26/10/16 08:30 \r\nDATA E HORA FINAL: 26/10/16 10:55\r\nKM INICIAL: 110813\r\nKM FINAL: 110817\r\nGASTOS GERAIS (PEÇAS, ALIMENTAÇÃO, HOSPEDAGEM, ETC)\r\n                          '),
(2, 2, 'OCORRÊNCIA: vazamento da bomba dosadora\r\nCAUSA: anel de encosto  folgado/ corroido\r\nSOLUÇÃO: substituido o anel de encosto\r\nDATA E HORA INICIAL: 03/11/2016 07:45\r\nDATA E HORA FINAL: 03/11/2016 12:00\r\nKM INICIAL: 78359\r\nKM FINAL:78397\r\nGASTOS GERAIS (PEÇAS, ALIMENTAÇÃO, HOSPEDAGEM, ETC)  \r\npeça= 01 anel de encosto, 01eixo de ligação, 01 rotor de 50 l/h\r\n                          '),
(3, 4, 'OCORRÊNCIA: vazamento na bomba dosadora de pac\r\nCAUSA: anel de encosto folgado / corroido\r\nSOLUÇÃO: substituição dos reparos\r\nDATA E HORA INICIAL: 01/11/20165 14:07\r\nDATA E HORA FINAL:01/11/2016 16:30\r\nKM INICIAL: 78241\r\nKM FINAL:78275\r\nGASTOS GERAIS (PEÇAS, ALIMENTAÇÃO, HOSPEDAGEM, ETC)\r\npeças= 01 anel de encosto / 01 eixo de ligação /01 rotor de 50 l/h\r\n                          '),
(4, 16, 'OCORRÊNCIA: troca e acoplamento de cilindros.\r\nCAUSA: cilindros vazios.\r\nSOLUÇÃO: foi substituido, acoplado e testado com solução de amonia, 04 cilindros cheios.\r\nDATA E HORA INICIAL: 01/11/2016 07:45\r\nDATA E HORA FINAL: 01/11/2016 12:49\r\nKM INICIAL: 78211\r\nKM FINAL: 78241\r\nGASTOS GERAIS (PEÇAS, ALIMENTAÇÃO, HOSPEDAGEM, ETC)\r\nSem gastos.\r\n                          '),
(5, 51, 'OCORRÊNCIA:  Acoplamento de cilindros\r\nCAUSA: Troca de cilindros vazios  por cilindros cheios. \r\nSOLUÇÃO: Foi acoplado e testado com solução de amonia, 02 cilindros cheios.\r\nDATA E HORA INICIAL: 04/11/2016 11:58\r\nDATA E HORA FINAL:04/11/2016 16:00\r\nKM INICIAL: 78470\r\nKM FINAL:78476\r\nGASTOS GERAIS (PEÇAS, ALIMENTAÇÃO, HOSPEDAGEM, ETC)\r\n                          '),
(6, 52, 'OCORRÊNCIA: Acoplamento de cilindros\r\nCAUSA: Troca de cilindros vazios por cilindros cheios\r\nSOLUÇÃO Foi acoplado e testado com solu~]ao de amonia 02 cilindros cheios.:\r\nDATA E HORA INICIAL: 04/11/2016 10:15\r\nDATA E HORA FINAL:04/11/2016 11:58\r\nKM INICIAL: 78434\r\nKM FINAL:78450\r\nGASTOS GERAIS (PEÇAS, ALIMENTAÇÃO, HOSPEDAGEM, ETC)\r\nSem gastos.\r\n                          '),
(7, 21, 'OCORRENCIA:preventiva\r\nCAUSA:período de manutenção\r\nSOLUCAO:realizado à manutenção preventiva\r\nDATA E HORA INICIAL:06/10/16 14:00\r\nDATA E HORA FINAL:06/10/16 17:00\r\nKM INICIAL:32915\r\nKM FINAL:32946\r\n-----GASTOS GERAIS----\r\nPECAS:não possui\r\nALIMENTACAO:não possui\r\nHOSPEDAGEM:não possui\r\nETC:\r\n                          '),
(8, 31, 'OCORRENCIA:água nos equipamentos\r\nCAUSA:erro operacional\r\nSOLUCAO:manutenção corretiva\r\nDATA E HORA INICIAL:05/10/16 07:30\r\nDATA E HORA FINAL:05/10/16 17:00\r\nKM INICIAL:32456\r\nKM FINAL:32720\r\n-----GASTOS GERAIS----\r\nPECAS:não possui\r\nALIMENTACAO:25.00R$\r\nHOSPEDAGEM:não possui\r\nETC:combustivel: 100,00R$\r\n                          '),
(9, 32, 'OCORRENCIA:preventiva\r\nCAUSA:período de manutenção\r\nSOLUCAO:realizado manutencao\r\nDATA E HORA INICIAL:07/10/16 13:00\r\nDATA E HORA FINAL:07/10/16 17:50\r\nKM INICIAL:33020\r\nKM FINAL:33256\r\n-----GASTOS GERAIS----\r\nPECAS:não possui\r\nALIMENTACAO:não possui\r\nHOSPEDAGEM:não possui\r\nETC:\r\n                          '),
(10, 34, 'OCORRENCIA:vazamento\r\nCAUSA:desgaste de peças\r\nSOLUCAO:troca de componente\r\nDATA E HORA INICIAL:08/10/16 06:00\r\nDATA E HORA FINAL:08/10/16 17:30\r\nKM INICIAL:33256\r\nKM FINAL:33839\r\n-----GASTOS GERAIS----\r\nPECAS:flexível de cobre de 1,2 mm\r\nALIMENTACAO:30,00R$\r\nHOSPEDAGEM:não possui\r\nETC:combustível: 200,00R$\r\n                          '),
(11, 40, 'OCORRENCIA:vazamento\r\nCAUSA:desgastes da peça\r\nSOLUCAO:troca de componente\r\nDATA E HORA INICIAL:11/10/16 06:00\r\nDATA E HORA FINAL:11/10/16 16:00\r\nKM INICIAL:33839\r\nKM FINAL:34754\r\n-----GASTOS GERAIS----\r\nPECAS:rotametro do modulo dosador siemens de 200 libras\r\nALIMENTACAO:26,00\r\nHOSPEDAGEM:não possui\r\nETC:combustivel: 100,00\r\n                          '),
(12, 45, 'OCORRENCIA:dosagem baixa\r\nCAUSA:perdar no sistema de vácuo\r\nSOLUCAO:troca de componente\r\nDATA E HORA INICIAL:14/10/16 12:0\r\nDATA E HORA FINAL:14/10/16 17:00\r\nKM INICIAL:34588\r\nKM FINAL:34728\r\n-----GASTOS GERAIS----\r\nPECAS:kit de reparo do injetor de 1" fluid freeder\r\nALIMENTACAO:26,00\r\nHOSPEDAGEM:não possui\r\nETC:\r\n                          '),
(13, 45, 'OCORRENCIA:dosagem baixa\r\nCAUSA:perdar no sistema de vácuo\r\nSOLUCAO:troca de componente\r\nDATA E HORA INICIAL:14/10/16 12:0\r\nDATA E HORA FINAL:14/10/16 17:00\r\nKM INICIAL:34588\r\nKM FINAL:34728\r\n-----GASTOS GERAIS----\r\nPECAS:kit de reparo do injetor de 1" fluid freeder\r\nALIMENTACAO:26,00\r\nHOSPEDAGEM:não possui\r\nETC:\r\n                          '),
(14, 33, 'OCORRENCIA:\r\nCAUSA: preventiva\r\nSOLUCAO: limpeza das válvulas redutora de pressão da pós cloração e inter, limpeza das válvulas moduladora de vácuo dos cloradores 240 kg/dia da pós cloração e inter, Limpeza dos rotâmetros e gabinetes da pós cloração e inter, trocado mangueiras dos cloradores, e feito limpeza do manifold\r\nDATA E HORA INICIAL:\r\n06/10  07:10 hs\r\n07/10  07:33 hs\r\nDATA E HORA FINAL: \r\n'),
(15, 35, 'OCORRENCIA:\r\nCAUSA: Preventivo\r\nSOLUCAO: instalação de um outro injetor, não tivemos êxito, pois a vazão de água baixa quando fica funcionando um só bomba, quando as duas bombas estão em operação  a vazão fica normal.\r\nDATA E HORA INICIAL:\r\n07/10 12:30 hs\r\n08/10  07:15 hs\r\nDATA E HORA FINAL:\r\n07/10 17:10 hs\r\n08/10 08:40 hs\r\nKM INICIAL:\r\n07/10 44600\r\n08/10 44670\r\nKM FINAL:\r\n07/10 44670\r\n08//10 4468'),
(16, 37, 'OCORRENCIA:\r\nCAUSA: preventiva\r\nSOLUCAO: pintura dos suporte dos manifold bateria 01 e 02, limpeza das válvulas dos manifold 01 e 02, Limpeza interna e pintura dos conjuntos de válvulas check-uinit bateria 01 e 02, Limpeza dos injetor pré cloração e pós cloração, retirado o manifold da bateria 02 lavado,secado, trocado 03 válvulas R0 S/F e colocado no suporte e feito os teste de estanquidade, não '),
(17, 46, 'OCORRENCIA:\r\nCAUSA: Preventiva\r\nSOLUCAO: Limpeza das válvulas redutora de pressão fluid feeder, Limpeza das válvulas moduladora de vácuo clorador 240 kg/dia, limpeza dos injetores, pintura das tubulações de água, limpeza da área do sistema de cloração.\r\nDATA E HORA INICIAL: \r\n17/10  07:33\r\nDATA E HORA FINAL:\r\n 17/10  15:10\r\nKM INICIAL:\r\n 17/10 46257\r\nKM FINAL:\r\n17/10 46270\r\n-----GASTOS GERAIS----\r'),
(18, 17, 'OCORRENCIA:\r\nCAUSA: Preventivo\r\nSOLUCAO: Limpeza do conjunto de válvulas check-unit, trocado o diafragma da válvula redutora de pressão, fixado suporte do manifold, Limpeza do conjunto de válvulas check-unit reserva, Serviços pendentes: pintura das tubulações, manifold, troca de válvulas em pvc, e manutenção na cremalheira do clorador 2000 ppd.\r\nDATA E HORA INICIAL:\r\n05/10 10:40\r\nDATA E HORA FINAL'),
(19, 54, 'OCORRENCIA: INSTALAÇÃO NOVA\r\nCAUSA: INSTALAÇÃO NOVA\r\nSOLUCAO: INSTALAÇÃO NOVA\r\nDATA E HORA:\r\n03/11 DAS 07:36 ATÉ AS 19:44\r\n04/11 DAS 07:06 ATE AS 19:29\r\n07/11 DAS 08:06 ATE AS 19:45\r\nKM INICIAL: 72276\r\nKM FINAL: 72448\r\n-----GASTOS GERAIS----\r\nPECAS: TUBOS, CONEXÕES E TINTAS R$ 252, 56\r\nALIMENTACAO: N/A\r\nHOSPEDAGEM: N/A\r\nETC:\r\n\r\nFOI FEITA INSTALAÇÃO DOS DOSADORES DA E.T.A E E.T.E.'),
(20, 1, 'OCORRENCIA: VAZAMENTO PELA VÁLVULA REGULADORA DE VÁCUO\r\nCAUSA: SUJEIRA\r\nSOLUCAO: LIMPEZA\r\nDATA E HORA INICIAL: 31/10 AS 15:18\r\nDATA E HORA FINAL: 31/10 AS 18:45\r\nKM INICIAL: 72055\r\nKM FINAL: 72211\r\n-----GASTOS GERAIS----\r\nPECAS: N/A\r\nALIMENTACAO: N/A\r\nHOSPEDAGEM:  N/A\r\nETC:\r\n\r\nAO CHEGAR NO LOCAL, FOI FEITO TESTES E NÃO HAVIA VAZAMENTO.\r\n\r\nPROBLEMAS NA BOMBA E/OU NAS TUBULAÇÕES, FEZ COM QUE O SISTE'),
(21, 70, 'OCORRENCIA: VAZANDO PELA REGULADORA DE VACUO\r\nCAUSA: SUJEIRA\r\nSOLUCAO: LIMPEZA\r\nDATA E HORA INICIAL: 08/11 AS 07:12\r\nDATA E HORA FINAL: 08/11/16 AS 13:10\r\nKM INICIAL:  72448\r\nKM FINAL: 72583\r\n-----GASTOS GERAIS----\r\nPECAS: 01 KIT REPARO DE VALVULA REGULADORA DE VACUO, 01 VALVULA R0\r\nALIMENTACAO: N/A\r\nHOSPEDAGEM: N/A\r\nETC:\r\n\r\nFEITO LIMPEZAS, E SUBSTITUIÇÕES NECESSÁRIAS.'),
(22, 38, 'OCORRENCIA: Reabastecimento de produto\r\nCAUSA:\r\nSOLUCAO: Foi reabastecido\r\nDATA E HORA INICIAL:08:38\r\nDATA E HORA FINAL:12:41\r\nKM INICIAL:620034\r\nKM FINAL:62095\r\n-----GASTOS GERAIS---- Não houve\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(23, 39, 'OCORRENCIA: Oxigenio da mascara acabou.\r\nCAUSA:\r\nSOLUCAO: Substituição da máscara autonoma.\r\nDATA E HORA INICIAL:08:38\r\nDATA E HORA FINAL:12:41\r\nKM INICIAL:620034\r\nKM FINAL:62095\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(24, 42, 'OCORRENCIA: Preventiva\r\nCAUSA:\r\nSOLUCAO: Feita a substituição de todos os orings, como também disco e diafragma da reguladora de vácuo, feita a limpeza do rotâmetro.\r\nDATA E HORA INICIAL: 09:00\r\nDATA E HORA FINAL:11:09\r\nKM INICIAL:62258\r\nKM FINAL:62292\r\n-----GASTOS GERAIS----\r\nPECAS: Disco do diafragma e jogo de orings da reguladora fluidfeeder.\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(25, 43, 'OCORRENCIA: Corretiva.\r\nCAUSA: Entrada de agua no sistema.\r\nSOLUCAO: Feita a limpeza da Reguladora de vacuo,\r\nFeita a substituição do diafragma do injetor siemens, pois o mesmo estava danificado.\r\nIdentificado problema com manovacuometro precisando de troca.\r\nDATA E HORA INICIAL:11:09\r\nDATA E HORA FINAL:15:59\r\nKM INICIAL:62293\r\nKM FINAL:62366\r\n-----GASTOS GERAIS----\r\nPECAS: Diafragma e jogo de orings do injetor siemens.\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(26, 44, 'OCORRENCIA: Reabastecimento de produto.\r\nCAUSA:\r\nSOLUCAO: Dosador Reabastecido\r\nDATA E HORA INICIAL: 14/10/16 12:25\r\nDATA E HORA FINAL: 14/10/16 16:42\r\nKM INICIAL: 62467\r\nKM FINAL: 62581\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(27, 47, 'OCORRENCIA: Reinstalação de bomba\r\nCAUSA:\r\nSOLUCAO: Instalada a bomba dosadora\r\nDATA E HORA INICIAL: 17/10/16 07:58\r\nDATA E HORA FINAL: 17/10/16 13:42\r\nKM INICIAL: 62619\r\nKM FINAL: 62708\r\n-----GASTOS GERAIS----\r\nPECAS:  bomba dosadora modelo megaflux.\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(28, 55, 'OCORRENCIA: Instalação de dosadora\r\nCAUSA:\r\nSOLUCAO: Foi instalada uma bomba dosadora modelo emec 10 l/h\r\nDATA E HORA INICIAL: 03/11/16 06:10\r\nDATA E HORA FINAL:  03/11/16 11:16\r\nKM INICIAL: 64590\r\nKM FINAL: 64889\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(29, 56, 'OCORRENCIA: Instalação de bomba dosadora\r\nCAUSA:\r\nSOLUCAO: Foi instalada uma bomba dosadora modelo emec 10 l/h\r\nDATA E HORA INICIAL: 03/11/16 11:16 \r\nDATA E HORA FINAL: 03/11/16 18:01\r\nKM INICIAL: 64899\r\nKM FINAL: 65260\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(30, 81, 'OCORRENCIA: Corretiva\r\nCAUSA: entrada de agua no sistema\r\nSOLUCAO: Foi realizada a limpeza da valvula reguladora de vacuo, pois havia entrado agua. Realizada a substituição do diafragma e dos orings do injetor siemens.\r\nDATA E HORA INICIAL:  08/11/16 10:23\r\nDATA E HORA FINAL: 08/11/16 12:34\r\nKM INICIAL: 65778\r\nKM FINAL:65814\r\n-----GASTOS GERAIS----\r\nPECAS: diafragma do injetor siemens.\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(31, 86, 'OCORRENCIA: corretiva\r\nCAUSA: entrada de cloro liquido.\r\nSOLUCAO: Foi realizada a limpeza da valvula reguladora de vacuo. feita a adição da segunda valvula no sistema reserva.\r\nDATA E HORA INICIAL: 09/11/16 07:29\r\nDATA E HORA FINAL: 09/11/16 16:00\r\nKM INICIAL: 65854\r\nKM FINAL:66136\r\n-----GASTOS GERAIS----\r\nPECAS: Valvula reguladora de vacuo completa.\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(32, 67, 'OCORRENCIA:problemas no manovacometro\r\nCAUSA:desgaste de peças\r\nSOLUCAO:troca de componente\r\nDATA E HORA INICIAL:07/11/16 12:00\r\nDATA E HORA FINAL:07/11/16 18:00\r\nKM INICIAL:28449\r\nKM FINAL:28643\r\n-----GASTOS GERAIS----\r\nPECAS:manovacometro\r\nALIMENTACAO:26.00\r\nHOSPEDAGEM:não possui\r\nETC:combustível 100.00\r\n                          '),
(33, 71, 'OCORRENCIA:vazamento\r\nCAUSA:não existia vazamento\r\nSOLUCAO:inspeção no sistema de coloração\r\nDATA E HORA INICIAL:08/11/16 16:00\r\nDATA E HORA FINAL:08/11/16 17:50\r\nKM INICIAL:28854\r\nKM FINAL:28984\r\n-----GASTOS GERAIS----\r\nPECAS:não possui\r\nALIMENTACAO: 25.00\r\nHOSPEDAGEM:não possui\r\nETC:combustível: 100,00\r\n                          '),
(34, 97, 'OCORRENCIA: manutenção corretiva\r\nCAUSA: selo da bomba booster vazando\r\nSOLUCAO: foi realizada a substituição da bomba booster, pois a mesma estava com selo danificado; realizada a limpeza da reguladora de vácuo e repintura do dipleg; feita a substituição da base do injetor de 2'' fluidfeeder.\r\nDATA E HORA INICIAL: 10/11/16 07:00\r\nDATA E HORA FINAL: 10/11/16 09:25\r\nKM INICIAL: 66136\r\nKM FINAL: 66297\r\n-----GASTOS GERAIS----\r\nPECAS: bomba booster, base de 2'' fluidfeeder.\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(35, 104, 'OCORRENCIA: manutenção corretiva\r\nCAUSA:\r\nSOLUCAO: foi feita a realocação do manifold na parede, pois o mesmohavia soltado.\r\nDATA E HORA INICIAL: 28/10/16 11:09 \r\nDATA E HORA FINAL: 28/10/16 16:07\r\nKM INICIAL: 64135\r\nKM FINAL: 64272\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(36, 57, 'OCORRENCIA: operação\r\nCAUSA: reabastecimento\r\nSOLUCAO: reabastecimento de dicloro no dosador volumetrico\r\nDATA E HORA INICIAL: 04/11/16 10:31\r\nDATA E HORA FINAL: 04/11/16 13:11\r\nKM INICIAL: 65375\r\nKM FINAL:65486\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(37, 3, 'OCORRENCIA: instalação\r\nCAUSA:\r\nSOLUCAO: foi realizada a instalação de uma bomba dosadora de dicloro.\r\nDATA E HORA INICIAL: 01/11/16 08:04\r\nDATA E HORA FINAL: 01/11/16 10:35\r\nKM INICIAL: 64506\r\nKM FINAL:64537\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(38, 76, 'OCORRENCIA: operação\r\nCAUSA:\r\nSOLUCAO: realizado a abastecimento do dosador volumetrico com dicloro.\r\nDATA E HORA INICIAL: 08/11/16 07:49\r\nDATA E HORA FINAL: 08/11/16 10:21 \r\nKM INICIAL: 65743\r\nKM FINAL: 65778\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(39, 76, 'OCORRENCIA: operação\r\nCAUSA:\r\nSOLUCAO: realizado a abastecimento do dosador volumetrico com dicloro.\r\nDATA E HORA INICIAL: 08/11/16 07:49\r\nDATA E HORA FINAL: 08/11/16 10:21 \r\nKM INICIAL: 65743\r\nKM FINAL: 65778\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(40, 58, 'OCORRENCIA: operação\r\nCAUSA:\r\nSOLUCAO: foi realizado o abastecimento do poço com dicloro.\r\nDATA E HORA INICIAL: 04/11/16 13:31\r\nDATA E HORA FINAL: 04/11/16 14:05\r\nKM INICIAL: 65486\r\nKM FINAL: 65497\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(41, 60, 'OCORRENCIA: operação\r\nCAUSA:\r\nSOLUCAO: foi realizado o abastecimento do poço com dicloro.\r\nDATA E HORA INICIAL: 04/11/16 14:13\r\nDATA E HORA FINAL: 04/11/16 14:21\r\nKM INICIAL: 65498\r\nKM FINAL: 65499\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(42, 77, 'OCORRENCIA: operação\r\nCAUSA:\r\nSOLUCAO: foi realizado o abastecimento do poço com dicloro.\r\nDATA E HORA INICIAL: 08/11/16 12:34\r\nDATA E HORA FINAL: 08/11/16 12:53\r\nKM INICIAL: 65814\r\nKM FINAL: 65826\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(43, 80, 'OCORRENCIA: operação\r\nCAUSA:\r\nSOLUCAO: foi realizado o abastecimento do poço com dicloro.\r\nDATA E HORA INICIAL: 08/11/16 13:00\r\nDATA E HORA FINAL: 08/11/16 14:05\r\nKM INICIAL: 65827\r\nKM FINAL:65854\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(44, 91, 'OCORRENCIA: Entrada de cloro liquido no sistema.\r\nCAUSA: Cilindro exposto ao sol devido a reforma da ETA.\r\nSOLUCAO: Limpeza no sistema\r\nDATA E HORA INICIAL: 08/11/16 as 10:00 hrs\r\nDATA E HORA FINAL: 08/11/16 as 14:04 hrs\r\nKM INICIAL: 65060\r\nKM FINAL: 65290\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO: R$29,13\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(45, 96, 'OCORRENCIA: Diafragma da bomba dosadora rompido.\r\nCAUSA: Fadiga do Material\r\nSOLUCAO: Colagem do diafragma\r\nDATA E HORA INICIAL:  08/11/16 as 14:04 hrs\r\nDATA E HORA FINAL: 08/11/16 as 14:49\r\nKM INICIAL:65290\r\nKM FINAL:65307\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(46, 87, 'OCORRENCIA: Vazamento pelo flexível.\r\nCAUSA: Fadiga do material.\r\nSOLUCAO: Substituição do flexível.\r\nDATA E HORA INICIAL: 08/11/16 as 14:49\r\nDATA E HORA FINAL:08/11/16 as 16:03\r\nKM INICIAL: 65307\r\nKM FINAL:65452\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(47, 90, 'OCORRENCIA: Sistema sem vácuo.\r\nCAUSA: Rececamento das mangueiras.\r\nSOLUCAO: Substituição das mangueiras.\r\nDATA E HORA INICIAL: 08/11/16 as 16:03\r\nDATA E HORA FINAL: 08/11/16 as 18:12\r\nKM INICIAL:65452\r\nKM FINAL: 65589\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(48, 88, 'OCORRENCIA: Vazamento de gás.\r\nCAUSA: Corrosão da válvula raio zero.\r\nSOLUCAO: Substituição da válvula raio zero.\r\nDATA E HORA INICIAL: 08/11/16 as 18:12 hrs\r\nDATA E HORA FINAL: 08/11/16 as 19:47 hrs\r\nKM INICIAL:65589\r\nKM FINAL: 65711\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(49, 89, 'OCORRENCIA: Sistema reserva inoperante\r\nCAUSA: Obstrução e ressecamento das mangueiras\r\nSOLUCAO: Limpeza em todo o sistema e substituição das mangueiras de pvc\r\nDATA E HORA INICIAL: 08/11/16 as 19:47 \r\nDATA E HORA FINAL: 08/11/16 as 21:13\r\nKM INICIAL:65711\r\nKM FINAL:65820\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(50, 92, 'OCORRENCIA:Instalação\r\nCAUSA:\r\nSOLUCAO:\r\nDATA E HORA INICIAL:09/11/16 as 09:00 hrs\r\nDATA E HORA FINAL:09/11/16 as 11:12\r\nKM INICIAL:66206\r\nKM FINAL:66409\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(51, 93, 'OCORRENCIA:Instalação\r\nCAUSA:\r\nSOLUCAO:\r\nDATA E HORA INICIAL:09/11/16 as 11:12 hrs\r\nDATA E HORA FINAL:09/11/16 as 16:02 hrs\r\nKM INICIAL:66409\r\nKM FINAL:66601\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(52, 100, 'OCORRENCIA: Vazamento de gás.\r\nCAUSA: Entrada de cloro líquido.\r\nSOLUCAO: Limpeza do sistema e substituição do reparo da válvula reguladora de vácuo.\r\nDATA E HORA INICIAL: 11/11/16 as 11:11\r\nDATA E HORA FINAL: 11/11/16 as 15:13\r\nKM INICIAL:66601\r\nKM FINAL:66921\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(53, 50, 'OCORRENCIA: VAZAMENTO NA DOSADORA\r\nCAUSA: TRINCA NO TANQUE INFERIOR\r\nSOLUCAO: SUBSTITUÇÃO DE DOSADORA\r\nDATA E HORA INICIAL: 19/10/16 10hs\r\nDATA E HORA FINAL: 19/10/16 16hs\r\nKM INICIAL: 19189\r\nKM FINAL: 19353\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO: 17,50\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(54, 63, 'OCORRENCIA:     Máquina dioxido parada.\r\nCAUSA:    resistência entupida.\r\nSOLUCAO:    Limpeza na resistência e troca do mangote da bomba de ácido.     \r\nDATA E HORA INICIAL:   02/11/16  as 14:05\r\nDATA E HORA FINAL:    02/11/16  as  18:00\r\nKM INICIAL:    20946\r\nKM FINAL:   21006\r\n-----GASTOS GERAIS----       \r\nPECAS:\r\nALIMENTACAO:    42,00\r\nHOSPEDAGEM:  50,00\r\nETC:   \r\n                          '),
(55, 101, 'OCORRENCIA: GERADOR DE DIÓXIDO SEM GERAR PRODUTO\r\nCAUSA: PARAMETRIZAÇÃO DE INVERSORES\r\nSOLUCAO: PERAMETRIZAÇÃO REFEITA\r\nDATA E HORA INICIAL: 12/11/16 ÁS 17HS\r\nDATA E HORA FINAL: 13/11/16 ÀS 10H30\r\nKM INICIAL: 21780\r\nKM FINAL: 22391\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO: 54,00\r\nHOSPEDAGEM: 45,00\r\nETC:\r\n                          '),
(56, 103, 'OCORRENCIA:\r\nCAUSA:\r\nSOLUCAO:\r\nDATA E HORA INICIAL: 13/11/16 ÀS 10h30\r\nDATA E HORA FINAL: 13/11/16 ÀS 18h30\r\nKM INICIAL: 22391\r\nKM FINAL: 23361\r\n-----GASTOS GERAIS----\r\nPECAS: \r\nALIMENTACAO: 54,00\r\nHOSPEDAGEM: 45,00\r\nETC:\r\n                          '),
(57, 61, 'OCORRENCIA:   Máquina dioxido parada.\r\nCAUSA:  Distribuidor entupido.\r\nSOLUCAO:    limpeza no distribuidor e troca do mangote da máquina de ácido.\r\nDATA E HORA INICIAL:  02/11/16  as  08:37\r\nDATA E HORA FINAL:  04/11/16  as  10:45\r\nKM INICIAL:   21006\r\nKM FINAL:  21674\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:  61,00\r\nHOSPEDAGEM:  60,00\r\nETC: Remendo de pneu 15,00\r\n                          '),
(58, 108, 'OCORRENCIA:    Bomba com vazamento pelo selo mecânico e barulho no rolamento. \r\nCAUSA:  Devido ao uso.\r\nSOLUCAO:  Feita troca do selo e rolamento e levantamento do que vai ser feito, troca de uma boia superior.\r\nDATA E HORA INICIAL:   08/11/16  as  13:00\r\nDATA E HORA FINAL:  11/08/16  as  17:30\r\nKM INICIAL:  110998\r\nKM FINAL:111954\r\n-----GASTOS GERAIS----\r\nPECAS:  Troca de 1 registro, 1 união e 1 adaptador de 32mm\r\nALIMENTACAO:  NT\r\nHOSPEDAGEM: NT\r\nETC:\r\n                          '),
(59, 111, 'OCORRENCIA:   Máquina parada.\r\nCAUSA:  Mangote da bomba de clorato gasta.\r\nSOLUCAO:  Troca do mangote, limpeza no distribuidor, lubrificação dos roletes.\r\nDATA E HORA INICIAL:  02/11/16 as 07:00\r\nDATA E HORA FINAL:  02/11/16 as  12:38\r\nKM INICIAL:  20273\r\nKM FINAL:  20946\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:   70,50\r\nHOSPEDAGEM:  45,00\r\nETC:\r\n                          '),
(60, 112, 'OCORRENCIA:   Sistema parado.\r\nCAUSA:  Bomba roncando, e vazando pelo selo mecânico.\r\nSOLUCAO:  feita troca de rolamentos e selo\r\nDATA E HORA INICIAL:  11/11/16  as  14:20\r\nDATA E HORA FINAL:  11/11/16  as  17:30\r\nKM INICIAL:  111932\r\nKM FINAL:  111954\r\n-----GASTOS GERAIS----\r\nPECAS:  Troca de 1 registro, 1 união e 1 adaptador 32mm\r\nALIMENTACAO: NT\r\nHOSPEDAGEM: NT\r\nETC:\r\n                          '),
(61, 113, 'OCORRENCIA:  Bomba vazando.\r\nCAUSA:  Vazamento pelo selo mecânico.\r\nSOLUCAO:  Feita troca dos rolamentos e selo mecânico.\r\nDATA E HORA INICIAL:   11/11/16 as 08:00\r\nDATA E HORA FINAL:  11/11/16 as 11:30\r\nKM INICIAL:  111932\r\nKM FINAL:  111954\r\n-----GASTOS GERAIS----\r\nPECAS:  NT\r\nALIMENTACAO  NT\r\nHOSPEDAGEM:  NT\r\nETC:\r\n                          '),
(62, 22, 'OCORRENCIA: visita técnica \r\nCAUSA:Saber se tem condições de instalar Dosadora Dicloro \r\nSOLUCAO:Foi realizada visita \r\nDATA E HORA INICIAL:\r\nDATA E HORA FINAL:07/10/16\r\nKM INICIAL:104148\r\nKM FINAL:104179\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(63, 15, 'OCORRENCIA: visita técnica \r\nCAUSA: saber condições para instalar Dosadora Dicloro \r\nSOLUCAO: Realizada visita falta ponto de 220v\r\nDATA E HORA INICIAL:07:54\r\nDATA E HORA FINAL:09:14\r\nKM INICIAL:104148\r\nKM FINAL:104179\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(64, 23, 'OCORRENCIA: visita técnica \r\nCAUSA: Saber se tem condições para instalar uma dosadora para o sistema de Dicloro\r\nSOLUCAO: Realizei vista e constatei que falta ponto de 220V para alimentar a dosadora\r\nDATA E HORA INICIAL: \r\nDATA E HORA FINAL:\r\nKM INICIAL: 104182\r\nKM FINAL: 104185\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(65, 25, 'OCORRENCIA: Visita técnica \r\nCAUSA: Saber as condições´para instalação do sistema de Dicloro\r\nSOLUCAO: Realizei visita e constatei que falta ponto 220V para instalar a dosadora\r\nDATA E HORA INICIAL: 09:08\r\nDATA E HORA FINAL: 09:27\r\nKM INICIAL: 104179\r\nKM FINAL: 104182\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(66, 26, 'OCORRENCIA: visita técnica\r\nCAUSA: saber tem condições de instalar sistema de Dicloro\r\nSOLUCAO: Visitei e constatei que falta ponto de 220V para instalar a dosadora\r\nDATA E HORA INICIAL: 07/10/16\r\nDATA E HORA FINAL: 07/10/16\r\nKM INICIAL: 104180\r\nKM FINAL: 104185\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(67, 27, 'OCORRENCIA:  Visita técnica\r\nCAUSA: Saber se tem condições de instalar sistema de Dicloro\r\nSOLUCAO: Realizei visita e constatei que falta ponto de 220V para instalar a dosadora\r\nDATA E HORA INICIAL: 09:41\r\nDATA E HORA FINAL: 10:26\r\nKM INICIAL: 104185\r\nKM FINAL: 104200\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(68, 107, 'OCORRENCIA: Manutenção Corretiva\r\nCAUSA: obstrução nos injetores e o disco da reguladora de vácuo estava danificado devido a entrada de cloro liquido e um registro de água 3/4 de PVC estava quebrado e vazando muito\r\nSOLUCAO: Realizei limpeza nos injetores e em todo o sistema de cloração e também substitui o resgistro de PVC e o disco da reguladora de vácuo ao termino da correção o sistema voltou a funcionar normalmente \r\nDATA E HORA INICIAL: 14/11/16\r\nDATA E HORA FINAL: 14/11/16\r\nKM INICIAL: 105193\r\nKM FINAL: 105607\r\n-----GASTOS GERAIS----\r\nPECAS: um disco da reguladora de vácuo e um registro de água 3/4 de PVC\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(69, 82, 'OCORRENCIA:cilindro vazio\r\nCAUSA:terminio do produto( cloro gas)\r\nSOLUCAO:acopplar cilindro cheio de 900 kg\r\nDATA E HORA INICIAL:06-11-16 as 07:45 hras\r\nDATA E HORA FINAL:08-11-16 as 04:25 hras\r\nKM INICIAL:*****\r\nKM FINAL:**** \r\nALIMENTACAO:R$ 57,74\r\nHOSPEDAGEM:R$ 80,00 \r\nPassagem:R$ 222,00          Taxi:R$ 35,00               '),
(70, 8, 'OCORRENCIA: Abastecer o poço\r\nCAUSA: Abastecimento\r\nSOLUCAO: Abasteci o P4 Guarapes\r\nDATA E HORA INICIAL: 08/09/16  11:04\r\nDATA E HORA FINAL: 08/09/16 11:45\r\nKM INICIAL: 101370\r\nKM FINAL:101386\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(71, 9, 'OCORRENCIA: Sistema de Dicloro\r\nCAUSA: Abastecimento\r\nSOLUCAO: abasteci o P1 San Vale com 14kg\r\nDATA E HORA INICIAL: 08/09/16 11:51\r\nDATA E HORA FINAL: 08/09/16 12:48\r\nKM INICIAL: 101386\r\nKM FINAL: 101400\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(72, 118, 'OS EM DUPLICATA'),
(73, 114, 'OCORRENCIA: Dicloro\r\nCAUSA:Abastecimento\r\nSOLUCAO: abasteci 150kg Dicloro a maquina volumétrica de Jiqui/RN\r\nDATA E HORA INICIAL: 07:17\r\nDATA E HORA FINAL: 11:41\r\nKM INICIAL:105607\r\nKM FINAL: 105649\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(74, 14, 'OS CANCELADA NO PROTHEUS'),
(75, 20, 'OS CANCELADA NO PROTHEUS'),
(76, 72, 'OCORRENCIA: VISITA TECNICA\r\nCAUSA:\r\nSOLUCAO:\r\nDATA E HORA INICIAL: 31/10 11:28\r\nDATA E HORA FINAL: 31/10 15:18\r\nKM INICIAL: 72036\r\nKM FINAL: 72055\r\n-----GASTOS GERAIS----\r\nPECAS: N/A\r\nALIMENTACAO: N/A\r\nHOSPEDAGEM: N/A\r\nETC: N/A\r\n                          LEVANTAMENTO DE INFORMAÇÕES PARA NOVA INSTALAÇÃO'),
(77, 120, 'OCORRENCIA: SEM VACUO\r\nCAUSA: ENTRADA DE AR NA TUBULAÇÃO\r\nSOLUCAO: EXTRAIR O AR DE DENTRO DA TUBULAÇÃO.\r\nDATA E HORA INICIAL: 17/11 AS 09:18\r\nDATA E HORA FINAL: 17/11 AS 17:11\r\nKM INICIAL: 72758\r\nKM FINAL: 73080\r\n-----GASTOS GERAIS----\r\nPECAS: N/A\r\nALIMENTACAO: R$ 45,84\r\nHOSPEDAGEM: R$ 70,00\r\nETC:\r\n\r\nFEITO LIMPEZA NAS VALVULAS REGULADORA E R0. \r\nPROBLEMAS NA SUCCAO DA BOMBA, ADAPTADOR TRINCADO. \r\nAGUARDANDO CASAL RESOLVER.'),
(78, 132, 'OCORRENCIA: SUBSTITUIÇÃO DE REDE \r\nCAUSA: MELHORIA\r\nSOLUCAO: SUBSTITUIÇÃO DE 32mm PARA 60mm\r\nDATA E HORA INICIAL: 18/11 AS 06:58\r\nDATA E HORA FINAL: 18/11 AS13:51\r\nKM INICIAL: 73080\r\nKM FINAL: 73326\r\n-----GASTOS GERAIS----\r\nPECAS: 01 INJETOR DE 2''''\r\nALIMENTACAO: R$ 23,35\r\nHOSPEDAGEM:\r\nETC: COMBUSTIVEL R$ 141,00\r\n\r\nACOMPANHAMENTO DA SUBSTITUIÇÃO DA REDE.\r\nINSTALADO 01 INJETOR DE 2''''\r\n                          '),
(79, 130, 'OCORRENCIA: VISITA TECNICA\r\nCAUSA: INSTALAÇÃO NOVA\r\nSOLUCAO:\r\nDATA E HORA INICIAL: 31/10 AS 11:28\r\nDATA E HORA FINAL: 31/10 AS 15:18\r\nKM INICIAL: 72036\r\nKM FINAL: 72055\r\n-----GASTOS GERAIS----\r\nPECAS: N/A\r\nALIMENTACAO: N/A\r\nHOSPEDAGEM: N/A\r\nETC: N/A\r\n                          VISITA PARA LEVANTAMENTO DE INFORMAÇÕES PARA INSTALAÇÃO NOVA DE SISTEMA DE PASTILHA.'),
(80, 59, 'OCORRENCIA: operação\r\nCAUSA: reabastecimento de produto\r\nSOLUCAO: Foi reabastecido o poço com dicloro.\r\nDATA E HORA INICIAL: 04/11/16 14:05\r\nDATA E HORA FINAL: 04/11/16 14:13\r\nKM INICIAL: 65497\r\nKM FINAL: 65498\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(81, 79, 'OCORRENCIA: operação\r\nCAUSA: reabastecimento de produto\r\nSOLUCAO: Foi reabastecido o poço com dicloro.\r\nDATA E HORA INICIAL: 08/11/16 12:53\r\nDATA E HORA FINAL: 08/11/16 13:00\r\nKM INICIAL: 65826\r\nKM FINAL: 65827\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(82, 105, 'OCORRENCIA: Instalação\r\nCAUSA: reinstalação de bomba dosadora no poço\r\nSOLUCAO:  Foi realizada a reinstalação de uma bomba dosadora modelo EMEC 10 l/h no poço.\r\nDATA E HORA INICIAL: 10/11/16 10:53 \r\nDATA E HORA FINAL: 10/11/16 17:21\r\nKM INICIAL: 66342\r\nKM FINAL: 66631\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(83, 106, 'OCORRENCIA: operação\r\nCAUSA: reabastecimento de produto\r\nSOLUCAO: foi realizado o abastecimento do dosador volumétrico.\r\nDATA E HORA INICIAL: 11/11/16 08:04\r\nDATA E HORA FINAL: 11/11/16 11:25 \r\nKM INICIAL: 66631\r\nKM FINAL: 66681\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(84, 98, 'OCORRENCIA: AILTON POR FAVOR CANCELA ESTA OS, POIS EU ABRI DE MANEIRA EQUIVOCADA.\r\nCAUSA:\r\nSOLUCAO:\r\nDATA E HORA INICIAL:\r\nDATA E HORA FINAL:\r\nKM INICIAL:\r\nKM FINAL:\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(85, 84, 'OCORRENCIA:cilindros vazios\r\nCAUSA:terminio do produto(cloro gas)\r\nSOLUCAO:acoplar (02) dois cilindros cheios de 900 kg\r\nDATA E HORA INICIAL:03-11-16 as 18:00 hras\r\nDATA E HORA FINAL:04-11-16 as 09;30 hras\r\nKM INICIAL:*****\r\nKM FINAL:*****\r\n-----GASTOS GERAIS----\r\nPassagem:R$ 144,96\r\nALIMENTACAO:R$21,75\r\nHOSPEDAGEM:R$ 83,00\r\nTAXI:R$55,00\r\n                          '),
(86, 85, 'OCORRENCIA:cilindro vazio\r\nCAUSA:terminio do produto(cloro gas)\r\nSOLUCAO:acoplar (01)um cilindro cheio de 900 kg\r\nDATA E HORA INICIAL:04-11-16 as 09:30 hras\r\nDATA E HORA FINAL:05-11-16 as  07:45 hras \r\nKM INICIAL:*****\r\nKM FINAL:*****\r\n-----GASTOS GERAIS----\r\nPASSAGEM:R$ 144,96\r\nALIMENTACAO:R$ 21,75\r\nHOSPEDAGEM:R$ 83,00\r\nTAXI:R$ 55,00\r\n                          '),
(87, 102, 'OCORRENCIA: Falha no funcionamento da bomba booster.\r\nCAUSA: Parada no bombeamento da adultora.\r\nSOLUCAO: Substituição da ponta de eixo e selo mecênico.\r\nDATA E HORA INICIAL: 16/11/16 as 8:30\r\nDATA E HORA FINAL: 16/11/16 as 11:11\r\nKM INICIAL: 66994\r\nKM FINAL: 67118\r\n-----GASTOS GERAIS----\r\nPECAS: R$14:13\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(88, 115, 'OCORRENCIA: Redução na dosagem de cloro\r\nCAUSA: Desgaste no diafragma do injetor.\r\nSOLUCAO: Substituição do reparo.\r\nDATA E HORA INICIAL:16/11/16 as 11:25\r\nDATA E HORA FINAL: 16/11/16 as 13:18\r\nKM INICIAL:67118\r\nKM FINAL:67284\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO:\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(89, 116, 'OCORRENCIA: Sistema inoperante.\r\nCAUSA: Falha no funcionamento da bomba dosadora.\r\nSOLUCAO: Substituição da bomba dosadora.\r\nDATA E HORA INICIAL: 16/11/16 as 13:18\r\nDATA E HORA FINAL:16/11/16 as 16:23\r\nKM INICIAL: 67284\r\nKM FINAL:67393\r\n-----GASTOS GERAIS----\r\nPECAS:\r\nALIMENTACAO: R$ 28,50\r\nHOSPEDAGEM:\r\nETC:\r\n                          '),
(90, 119, 'OCORRENCIA:corretiva\r\nCAUSA:vazamento irregular do produto (PAC)\r\nSOLUCAO:substituicao das seguintes pecas,eixo de acoplamento,burracha plana de vedacao,pino\r\nDATA E HORA INICIAL:17-11-16 as 07;45 hras\r\nDATA E HORA FINAL:17-11-16 as 17:00 hras\r\nKM INICIAL:*****\r\nKM FINAL:*****\r\n-----GASTOS GERAIS----\r\nPASSAGEM:R$ 35,21\r\nALIMENTACAO:*****\r\nHOSPEDAGEM:*****\r\nETC:\r\n                          ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupoloja`
--

CREATE TABLE `tb_grupoloja` (
  `id` int(11) NOT NULL,
  `decricao` varchar(150) NOT NULL,
  `codigo` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_grupoloja`
--

INSERT INTO `tb_grupoloja` (`id`, `decricao`, `codigo`) VALUES
(1, 'Proprietario', 'P'),
(2, 'Cliente', 'C');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_insumos`
--

CREATE TABLE `tb_insumos` (
  `id` int(11) NOT NULL,
  `tb_oat_id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `quantidade` double NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `obs` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_localidades`
--

CREATE TABLE `tb_localidades` (
  `id` int(11) NOT NULL,
  `loja` int(11) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `regional` varchar(100) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_localidades`
--

INSERT INTO `tb_localidades` (`id`, `loja`, `tipo`, `regional`, `nome`, `municipio`, `uf`, `latitude`, `longitude`, `ativo`) VALUES
(1, 1, 0, '', 'ETA TERESINA III E IV', 'TERESINA', 'PI', -5.145000, -42.804001, '0'),
(2, 1, 0, 'FLORIANO', 'FLORIANO', 'FLORIANO', 'PI', -6.784000, -43.020000, '0'),
(3, 1, 0, 'PARNAIBA', 'PARNAIBA', 'PARNAIBA', 'PI', -2.922000, -41.758999, '0'),
(4, 2, 0, '', 'BARCARENA', 'BARCARENA', 'PA', -1.550000, -48.738998, '0'),
(5, 3, 0, '', 'JOAO PESSOA', 'JOAO PESSOA', 'PB', -7.188000, -34.916000, '0'),
(6, 4, 0, '', 'TIMOTEO', 'TIMOTEO', 'MG', -19.524000, -42.653000, '0'),
(7, 6, 0, '', 'PEDRAS DE FOGO', 'PEDRAS DE FOGO', 'PB', -7.353000, -35.027000, '0'),
(8, 7, 0, '', 'ETA-ARAPIRACA', 'ARAPIRACA', 'AL', -9.702000, -36.688999, '0'),
(9, 7, 0, '', 'PILAR', 'PILAR', 'AL', 0.000000, 0.000000, '0'),
(10, 7, 0, '', 'SAO BRAS (ETA-MORRO DO GAIA)', 'SAO BRAS', 'AL', 0.000000, 0.000000, '0'),
(11, 8, 0, '', 'CUIABA ETA I', 'CUIABA', 'MT', -15.590000, -56.098999, '0'),
(12, 8, 0, '', 'CUIABA ETA II', 'CUIABA', 'MT', 0.000000, 0.000000, '0'),
(13, 9, 0, 'IMPERATRIZ', 'ACAILANDIA ELEVATORIA', 'ACAILANDIA', 'MA', -4.951000, -47.493000, '0'),
(14, 9, 0, '', 'ALCANTARA', 'ALCANTARA', 'MA', -2.358000, -44.432999, '0'),
(15, 9, 0, '', 'ARAIOSES', 'ARAIOSES', 'MA', 0.000000, 0.000000, '0'),
(16, 9, 0, 'ITAPECURU MIRIM', 'AREIAS', 'SAO LUIS', 'MA', 0.000000, 0.000000, '0'),
(17, 9, 0, '', 'AXIXA', 'AXIXA', 'MA', -2.838000, -44.062000, '0'),
(18, 9, 0, 'SAO JOAO DOS PATOS', 'BARAO DE GRAJAU', 'BARAO DE GRAJAU', 'MA', -6.758000, -43.022999, '0'),
(19, 9, 0, 'PRESIDENTE DUTRA', 'BARRA DO CORDA', 'BARRA DO CORDA', 'MA', 0.000000, 0.000000, '0'),
(20, 9, 0, 'BARREIRINHAS', 'BARREIRINHAS', 'BARREIRINHAS', 'MA', 0.000000, 0.000000, '0'),
(21, 9, 0, '', 'BOM JESUS DAS SELVAS', 'BOM JESUS DAS SELVAS', 'MA', 0.000000, 0.000000, '0'),
(22, 9, 0, '', 'BREJO', 'BREJO', 'MA', -3.680000, -42.689999, '0'),
(23, 9, 0, '', 'BURITI DE INACIA VAZ', 'SAO LUIS', 'MA', -3.941000, -42.922001, '0'),
(24, 9, 0, '', 'CANTANHEDE', 'CANTANHEDE', 'MA', 0.000000, 0.000000, '0'),
(25, 9, 0, 'CHAPADINHA', 'CHAPADINHA', 'CHAPADINHA', 'MA', -3.743000, -43.355000, '0'),
(26, 9, 0, 'SAO JOAO DOS PATOS', 'COLINAS', 'COLINAS', 'MA', -6.034000, -44.257000, '0'),
(27, 9, 0, '', 'DUQUE BACELAR', 'DUQUE BACELAR', 'MA', -4.162000, -42.942001, '0'),
(28, 9, 0, 'IMPERATRIZ', 'IMPERATRIZ', 'IMPERATRIZ', 'MA', -5.548000, -47.476002, '0'),
(29, 9, 0, 'BACABEIRA', 'ITALUIS', 'ROSARIO', 'MA', -3.027000, -44.308998, '0'),
(30, 9, 0, 'ITAPECURU MIRIM', 'ITAPECURU MIRIM', 'ITAPECURU MIRIM', 'MA', -3.409000, -44.348000, '0'),
(31, 9, 0, 'SAO JOAO DOS PATOS', 'LORETO', 'LORETO', 'MA', -7.096000, -45.129002, '0'),
(32, 9, 0, '', 'MIRANDA DO NORTE', 'MIRANDA DO NORTE', 'MA', 0.000000, 0.000000, '0'),
(33, 9, 0, 'ITAPECURU MIRIM', 'MORROS', 'MORROS', 'MA', -2.862000, -44.023998, '0'),
(34, 9, 0, 'CHAPADINHA', 'NINA RODRIGUES', 'NINA RODRIGUES', 'MA', -3.467000, -43.902000, '0'),
(35, 9, 0, 'METROPOLITANA', 'PACIENCIA', 'SAO LUIS', 'MA', -2.556000, -44.209999, '0'),
(36, 9, 0, '', 'PEDREIRAS', 'PEDREIRAS', 'MA', -4.574000, -44.602001, '0'),
(37, 9, 0, '', 'PINHEIRO', 'PINHEIRO', 'MA', -2.527000, -45.083000, '0'),
(38, 9, 0, '', 'PIRAPEMAS', 'PIRAPEMAS', 'MA', -3.728000, -44.229000, '0'),
(39, 9, 0, 'IMPERATRIZ', 'RIACHAO', 'RIACHAO', 'MA', 0.000000, 0.000000, '0'),
(40, 9, 0, 'METROPOLITANA', 'SACAVEM', 'ACAILANDIA', 'MA', -2.566000, -44.252998, '0'),
(41, 9, 0, '', 'SANTA QUITERIA', 'SANTA QUITERIA DO MARANHAO', 'MA', -3.501000, -42.562000, '0'),
(42, 9, 0, '', 'SAO BENEDITO DO RIO PRETO', 'ACAILANDIA', 'MA', 0.000000, 0.000000, '0'),
(43, 9, 0, '', 'SAO BERNARDO', 'SAO BERNARDO', 'MA', 0.000000, 0.000000, '0'),
(44, 9, 0, 'SAO JOAO DOS PATOS', 'SAO RAIMUNDO DAS MANGABEIRAS', 'SAO RAIMUNDO DAS MANGABEIRAS', 'MA', -7.024000, -45.478001, '0'),
(45, 9, 0, 'COROATA', 'TIMBIRAS', 'TIMBIRAS', 'MA', 0.000000, 0.000000, '0'),
(46, 9, 0, 'DEDREIRAS', 'TRIZIDELA DO VALE', 'TRIZIDELA DO VALE', 'MA', -4.573000, -44.617001, '0'),
(47, 9, 0, '', 'TUTOIA', 'TUTOIA', 'MA', -2.761000, -42.275002, '0'),
(48, 9, 0, '', 'URBANO SANTOS', 'URBANO SANTOS', 'MA', -3.203000, -43.389999, '0'),
(49, 9, 0, 'CHAPADINHA', 'VARGEM GRANDE', 'VARGEM GRANDE', 'MA', 0.000000, 0.000000, '0'),
(50, 9, 0, 'SANTA INES', 'VITORIA DO MEARIM', 'VITORIA DO MEARIM', 'MA', -3.477000, -44.867001, '0'),
(51, 10, 0, '', 'ALTO ALEGRE', 'ALTO ALEGRE', 'RR', 2.835000, -60.728001, '0'),
(52, 10, 0, '', 'CARACARAI', 'CARACARAI', 'RR', 1.829000, -61.132000, '0'),
(53, 10, 0, '', 'CAROEBE', 'CAROEBE', 'RR', 0.876169, -59.662998, '0'),
(54, 10, 0, '', 'MUCAJAI', 'MUCAJAI', 'RR', 2.448000, -60.917999, '0'),
(55, 10, 0, '', 'NORMANDIA', 'NORMANDIA', 'RR', 3.878000, -59.626999, '0'),
(56, 10, 0, '', 'PACARAIMA', 'PACARAIMA', 'RR', 4.477000, -61.146999, '0'),
(57, 10, 0, '', 'RORAINOPOLIS', 'RORAINOPOLIS', 'RR', 0.941046, -60.423000, '0'),
(58, 10, 0, '', 'SAO JOAO DA BALIZA', 'SAO JOAO DA BALIZA', 'RR', 0.950526, -59.909000, '0'),
(59, 10, 0, '', 'SAO LUIZ DO ANAUA', 'SAO JOAO DA BALIZA', 'RR', 1.010000, -60.033001, '0'),
(60, 10, 0, '', 'SAO PEDRO', 'BOA VISTA', 'RR', 2.826000, -60.658001, '0'),
(61, 11, 0, '', 'ACARI', 'ACARI', 'RN', 0.000000, 0.000000, '0'),
(62, 11, 0, '', 'ADUTORA DO BOQUEIRAO', 'RIACHO DA CRUZ', 'RN', 0.000000, 0.000000, '0'),
(63, 11, 0, '', 'ALTO RODRIGUES', 'ALTO DO RODRIGUES', 'RN', -5.301000, -36.764000, '0'),
(64, 11, 0, '', 'ANGICOS - CENTRO', 'ANGICOS', 'RN', 0.000000, 0.000000, '0'),
(65, 11, 0, '', 'ANGICOS - EB2', 'ANGICOS', 'RN', 0.000000, 0.000000, '0'),
(66, 11, 0, '', 'ANGICOS- ADUTORA CENTAL', 'ANGICOS', 'RN', 0.000000, 0.000000, '0'),
(67, 11, 0, '', 'APODI', 'APODI', 'RN', -5.660000, -37.798000, '0'),
(68, 11, 0, '', 'AREIA BRANCA', 'AREIA BRANCA', 'RN', 0.000000, 0.000000, '0'),
(69, 11, 0, '', 'ASSU', 'ACU', 'RN', -5.578000, -36.925999, '0'),
(70, 11, 0, '', 'BOA SAUDE', 'BOA SAUDE', 'RN', -6.138000, -35.577000, '0'),
(71, 11, 0, '', 'BOM JESUS - EB - 8', 'BOM JESUS', 'RN', 0.000000, 0.000000, '0'),
(72, 11, 0, '', 'BRASIL NOVO', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(73, 11, 0, 'CAICO', 'CAICO', 'CAICO', 'RN', -6.467000, -37.091999, '0'),
(74, 11, 0, '', 'CAICO ZONA NORTE', 'CAICO', 'RN', 0.000000, 0.000000, '0'),
(75, 11, 0, '', 'CAMPO REDONDO', 'CAMPO REDONDO', 'RN', 0.000000, 0.000000, '0'),
(76, 11, 0, '', 'CANDELARIA', 'NATAL', 'RN', -5.839000, -35.220001, '0'),
(77, 11, 0, '', 'CANGUARETAMA', 'CANGUARETAMA', 'RN', -6.378000, -35.127998, '0'),
(78, 11, 0, '', 'CARAUBAS', 'CARAUBAS', 'RN', -5.634000, -37.535999, '0'),
(79, 11, 0, '', 'CARNAUBAIS', 'CARNAUBAIS', 'RN', -5.339000, -36.830002, '0'),
(80, 11, 0, '', 'CARNAUBAS-PALMA', 'CARNAUBAIS', 'RN', 0.000000, 0.000000, '0'),
(81, 11, 0, '', 'CERRO CORA ETA LOCAL', 'CERRO CORA', 'RN', -6.036000, -36.347000, '0'),
(82, 11, 0, '', 'CIDADE CAMPESTRE - P78', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(83, 11, 0, '', 'CIDADE DOS BOSQUES - P17', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(84, 11, 0, 'LITORAL SUL', 'CIDADE SATELITE', 'NATAL', 'RN', -5.863000, -35.230000, '0'),
(85, 11, 0, '', 'CIDADE SATELITE - P9', 'NATAL', 'RN', -5.860000, -35.243000, '0'),
(86, 11, 0, '', 'CONJUNTO JIQUI - P2', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(87, 11, 0, '', 'CRUZETA - CAPITACAO', 'CRUZETA', 'RN', -6.411000, -36.794998, '0'),
(88, 11, 0, '', 'CRUZETA - ESCRITORIO', 'CRUZETA', 'RN', -6.412000, -36.787998, '0'),
(89, 11, 0, '', 'CURRAIS NOVOS', 'CURRAIS NOVOS', 'RN', -6.255000, -36.522999, '0'),
(90, 11, 0, '', 'DIX-SEPT ROSADO', 'GOVERNADOR DIX-SEPT ROSADO', 'RN', 0.000000, 0.000000, '0'),
(91, 11, 0, '', 'Dr. SEVERIANO', 'DOUTOR SEVERIANO', 'RN', 0.000000, 0.000000, '0'),
(93, 11, 0, '', 'ELOI DE SOUSA - EB - 10', 'SENADOR ELOI DE SOUZA', 'RN', 0.000000, 0.000000, '0'),
(94, 11, 0, '', 'EMAUS - P90', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(95, 11, 0, '', 'ENTRONCAMENTO', 'NATAL', 'RN', -5.582000, -35.655998, '0'),
(96, 11, 0, '', 'EQUADOR', 'EQUADOR', 'RN', 0.000000, 0.000000, '0'),
(97, 11, 0, '', 'ESPIRITO SANTO I', 'ESPIRITO SANTO', 'RN', -6.335000, -35.299000, '0'),
(98, 11, 0, '', 'ESPIRITO SANTO II VARZEA', 'ESPIRITO SANTO', 'RN', -6.334000, -35.370998, '0'),
(99, 11, 0, '', 'CALDEIRAO - SANTANA DO SERIDO', 'SANTANA DO SERIDO', 'RN', -6.705000, -36.693001, '0'),
(100, 11, 0, '', 'ETE - DO BALDO', 'NATAL', 'RN', -5.790000, -35.210999, '0'),
(101, 11, 0, '', 'ETE-PARNAMIRIM', 'PARNAMIRIM', 'RN', -5.935000, -35.237999, '0'),
(102, 11, 0, '', 'EXTREMOZ', 'EXTREMOZ', 'RN', -5.726000, -35.282001, '0'),
(103, 11, 0, '', 'FELIPE CAMARA', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(104, 11, 0, '', 'FELIPE CAMARAO - P01', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(105, 11, 0, '', 'FELIPE CAMARAO - P10', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(106, 11, 0, 'CAICO', 'FLORANEA EB4', 'FLORANIA', 'RN', -6.123000, -36.806999, '0'),
(107, 11, 0, '', 'FRANCISCO CAMPOS - P9', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(108, 11, 0, '', 'FRANCISCO DANTAS', 'FRANCISCO DANTAS', 'RN', 0.000000, 0.000000, '0'),
(109, 11, 0, '', 'GARGALHEIRAS', 'ACARI', 'RN', -6.427000, -36.603001, '0'),
(110, 11, 0, '', 'GRAMORE', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(111, 11, 0, '', 'GUARAPES P4', 'NATAL', 'RN', -5.840000, -35.273998, '0'),
(112, 11, 0, '', 'IPANGUACU', 'IPANGUACU', 'RN', -5.508000, -36.860001, '0'),
(113, 11, 0, '', 'IPUEIRA', 'IPUEIRA', 'RN', -6.814000, -37.201000, '0'),
(114, 11, 0, '', 'ITAJA - ADUTORA SERTAO CENTRAL', 'ITAJA', 'RN', -5.631000, -36.861000, '0'),
(115, 11, 0, '', 'ITAU', 'ITAU', 'RN', -5.837000, -37.987000, '0'),
(116, 11, 0, '', 'JANDAIRA', 'JANDAIRA', 'RN', 0.000000, 0.000000, '0'),
(117, 11, 0, '', 'JANDAIRA - P02', 'JANDAIRA', 'RN', 0.000000, 0.000000, '0'),
(118, 11, 0, '', 'JANDAIRA - P03', 'JANDAIRA', 'RN', 0.000000, 0.000000, '0'),
(119, 11, 0, '', 'JANDAIRA - P05', 'JANDAIRA', 'RN', 0.000000, 0.000000, '0'),
(120, 11, 0, '', 'JARDIM DE ANGICOS', 'JARDIM DE ANGICOS', 'RN', 0.000000, 0.000000, '0'),
(121, 11, 0, '', 'JARDIM DE PIRANHAS - ETA ESCRITORIO LOCAL', 'JARDIM DE PIRANHAS', 'RN', -6.379000, -37.347000, '0'),
(122, 11, 0, '', 'JARDIM DO SERIDO - PASSAGEM DAS TRAIRAS ', 'JARDIM DO SERIDO', 'RN', -6.517000, -36.937000, '0'),
(123, 11, 0, '', 'JARDIM PROGRESSO', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(124, 11, 0, '', 'JERONIMO ROSADO - EB - 1', 'ACU', 'RN', -5.614000, -36.896000, '0'),
(125, 11, 0, '', 'JERONIMO ROSADO - EB - 2', 'MOSSORO', 'RN', -5.236000, -37.317001, '0'),
(126, 11, 0, '', 'JIQUI', 'NATAL', 'RN', -5.917000, -35.188000, '0'),
(127, 11, 0, '', 'JIQUI - P1', 'NATAL', 'RN', -5.862000, -35.208000, '0'),
(128, 11, 0, '', 'JOSE DA PENHA', 'JOSE DA PENHA', 'RN', 0.000000, 0.000000, '0'),
(129, 11, 0, '', 'JUCURUTU', 'JUCURUTU', 'RN', -6.034000, -37.016998, '0'),
(130, 11, 0, '', 'JUNDIA', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(131, 11, 0, 'LITORAL SUL', 'LAGOA NOVA I', 'LAGOA NOVA', 'RN', 0.000000, 0.000000, '0'),
(132, 11, 0, 'LITORAL SUL', 'LAGOA NOVA II', 'LAGOA NOVA', 'RN', 0.000000, 0.000000, '0'),
(133, 11, 0, '', 'LAJES - ADUTORA SERTAO CENTRAL', 'LAJES', 'RN', -5.690000, -36.321999, '0'),
(134, 11, 0, '', 'LAJES - CABUGI', 'LAJES', 'RN', 0.000000, 0.000000, '0'),
(135, 11, 0, 'LITORAL NORTE', 'MACAIBA - GRANJA RECREIO', 'MACAIBA', 'RN', -5.875000, -35.307999, '0'),
(136, 11, 0, '', 'MACAU - ETA TAMBAUBA', 'MACAU', 'RN', -5.160000, -36.597000, '0'),
(137, 11, 0, '', 'MARCELINO VIEIRA', 'MARCELINO VIEIRA', 'RN', 0.000000, 0.000000, '0'),
(138, 11, 0, '', 'MARTINS', 'MARTINS', 'RN', -6.094000, -37.911999, '0'),
(139, 11, 0, '', 'MEDIO OESTE', 'ACU', 'RN', -5.886000, -36.994999, '0'),
(140, 11, 0, '', 'MONTANHAS', 'MONTANHAS', 'RN', -6.479000, -35.292999, '0'),
(141, 11, 0, '', 'MONTE ALEGRE', 'MONTE ALEGRE', 'RN', 0.000000, 0.000000, '0'),
(142, 11, 0, '', 'MOSSORO', 'MOSSORO', 'RN', 0.000000, 0.000000, '0'),
(143, 11, 0, '', 'NISIA FLORESTA - ETA BOMFIM - ADUT. MONSEN. EXP.', 'NISIA FLORESTA', 'RN', 0.000000, 0.000000, '0'),
(144, 11, 0, '', 'NOVA CRUZ', 'NOVA CRUZ', 'RN', -6.486000, -35.426998, '0'),
(145, 11, 0, '', 'NOVA PARNAMIRIM - P11', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(146, 11, 0, '', 'NOVA PARNAMIRIM - P20', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(147, 11, 0, '', 'NOVA PARNAMIRIM - P29', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(148, 11, 0, '', 'NOVO CAMPO - P1', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(149, 11, 0, '', 'OURO BRANCO ETA', 'OURO BRANCO', 'RN', -6.709000, -36.950001, '0'),
(150, 11, 0, '', 'P20 - ZONA NORTE', 'NATAL', 'RN', -5.739000, -35.280998, '0'),
(151, 11, 0, '', 'P36 - ZONA NORTE', 'NATAL', 'RN', -5.752000, -35.256001, '0'),
(152, 11, 0, '', 'P56 - ZONA NORTE', 'NATAL', 'RN', -5.747000, -35.230000, '0'),
(153, 11, 0, '', 'P6 - MOSSORO', 'MOSSORO', 'RN', -5.176000, -37.361000, '0'),
(154, 11, 0, '', 'PALMA', 'CAICO', 'RN', -6.629000, -37.150002, '0'),
(155, 11, 0, '', 'PARELHAS', 'PARELHAS', 'RN', -6.694000, -36.631001, '0'),
(156, 11, 0, '', 'PARNAMIRIM - LAGOA DO BONFIM', 'PARNAMIRIM', 'RN', -6.041000, -35.226002, '0'),
(157, 11, 0, '', 'PARNAMIRIM I', 'PARNAMIRIM', 'RN', -5.921000, -35.263000, '0'),
(158, 11, 0, '', 'PARNAMIRIM II - RIACHO VERMELHO', 'PARNAMIRIM', 'RN', -5.933000, -35.271999, '0'),
(159, 11, 0, '', 'PARQUE DAS DUNAS', 'NATAL', 'RN', -5.811000, -35.193001, '0'),
(160, 11, 0, '', 'PAU DOS FERROS', 'PAU DOS FERROS', 'RN', -6.146000, -38.193001, '0'),
(161, 11, 0, '', 'PEDRO VELHO', 'PEDRO VELHO', 'RN', 0.000000, 0.000000, '0'),
(162, 11, 0, 'ASSU', 'PENDENCIAS', 'PENDENCIAS', 'RN', -5.263000, -36.715000, '0'),
(163, 11, 0, '', 'PILOES', 'PILOES', 'RN', 0.000000, 0.000000, '0'),
(164, 11, 0, '', 'PIRANGI', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(165, 11, 0, '', 'PLANALTO', 'PAU DOS FERROS', 'RN', 0.000000, 0.000000, '0'),
(166, 11, 0, '', 'PLANALTO - P01', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(167, 11, 0, '', 'PLANALTO - P02', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(168, 11, 0, '', 'PLANALTO - P03', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(169, 11, 0, '', 'PLANALTO - P05', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(171, 11, 0, '', 'PLANALTO P7', 'NATAL', 'RN', -5.835000, -35.262001, '0'),
(172, 11, 0, '', 'PLANALTO P9', 'NATAL', 'RN', -5.835000, -35.264999, '0'),
(173, 11, 0, '', 'PONTA NEGRA', 'NATAL', 'RN', -5.880000, -35.181999, '0'),
(174, 11, 0, '', 'PORTALEGRE', 'PORTALEGRE', 'RN', 0.000000, 0.000000, '0'),
(175, 11, 0, '', 'POTENGI - ALTO DA TORRE', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(176, 11, 0, '', 'POTENGI - POCO 35', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(177, 11, 0, '', 'POTENGI - POCO 44', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(178, 11, 0, '', 'PUREZA', 'PUREZA', 'RN', 0.000000, 0.000000, '0'),
(179, 11, 0, '', 'REDINHA P57', 'NATAL', 'RN', -5.746000, -35.233002, '0'),
(180, 11, 0, '', 'RIACHUELO', 'RIACHUELO', 'RN', 0.000000, 0.000000, '0'),
(181, 11, 0, '', 'RIO BAHIA P2', 'NATAL', 'RN', -5.840000, -35.276001, '0'),
(182, 11, 0, '', 'RODOLFO FERNANDES', 'RODOLFO FERNANDES', 'RN', 0.000000, 0.000000, '0'),
(183, 11, 0, '', 'SAN VALE - P1', 'NATAL', 'RN', -5.854000, -35.216999, '0'),
(184, 11, 0, '', 'SANTA CRUZ - EB - 16', 'SANTA CRUZ', 'RN', -6.247000, -35.966000, '0'),
(185, 11, 0, '', 'SANTA FE', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(186, 11, 0, '', 'SANTA TEREZA - P28', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(187, 11, 0, '', 'SANTANA DO MATOS', 'SANTANA DO MATOS', 'RN', -5.966000, -36.660000, '0'),
(188, 11, 0, '', 'SANTANA DO SERIDO', 'SANTANA DO SERIDO', 'RN', -6.772000, -36.735001, '0'),
(189, 11, 0, '', 'SAO FERNANDO', 'SAO FERNANDO', 'RN', -6.376000, -37.185001, '0'),
(190, 11, 0, '', 'SAO JOAO DO SABUGI', 'SAO JOAO DO SABUGI', 'RN', -6.717000, -37.203999, '0'),
(191, 11, 0, '', 'SAO JOSE DO MIPIBU', 'SAO JOSE DE MIPIBU', 'RN', -6.075000, -35.231998, '0'),
(192, 11, 0, '', 'SAO MIGUEL', 'SAO MIGUEL', 'RN', -6.215000, -38.429001, '0'),
(193, 11, 0, '', 'SAO RAFAEL', 'SAO RAFAEL', 'RN', -5.802000, -36.879002, '0'),
(194, 11, 0, '', 'ETE SAO TOME', 'SAO TOME', 'RN', -5.973000, -36.070000, '0'),
(546, 13, 0, '', 'ARACAGI', 'ARACAGI', 'PB', -6.852000, -35.293999, '0'),
(196, 11, 0, '', 'SERRA DE SANTANA', 'FLORANIA', 'RN', -6.128000, -36.820999, '0'),
(197, 25, 0, '', 'SAAE - SERRA NEGRA DO NORTE', 'SERRA NEGRA DO NORTE', 'RN', -6.670000, -37.390999, '0'),
(198, 11, 0, '', 'SERRINHA DOS PINTOS', 'SERRINHA DOS PINTOS', 'RN', 0.000000, 0.000000, '0'),
(199, 11, 0, '', 'TORRES P5', 'NATAL', 'RN', -5.844000, -35.271999, '0'),
(200, 11, 0, 'LITORAL SUL', 'TOUROS - BOQUEIRAO', 'NATAL', 'RN', -5.251000, -35.532001, '0'),
(201, 11, 0, '', 'UMARIZAL', 'UMARIZAL', 'RN', -5.990000, -37.818001, '0'),
(202, 11, 0, '', 'VERA CRUZ', 'VERA CRUZ', 'RN', -6.041000, -35.446999, '0'),
(203, 11, 0, '', 'ZONA NORTE - P23', 'NATAL', 'RN', -5.739000, -35.224998, '0'),
(204, 11, 0, '', 'ZONA NORTE - P57', 'NATAL', 'RN', -5.746000, -35.233002, '0'),
(205, 11, 0, '', 'ZONA NORTE - POCO 37', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(206, 11, 0, 'NORTE', 'ZONA-16', 'NATAL', 'RN', -5.726000, -35.248001, '0'),
(207, 12, 0, '', 'ETA OESTE', 'CAUCAIA', 'CE', -3.787000, -38.655998, '0'),
(208, 12, 0, '', 'PAVUNA', 'PACATUBA', 'CE', -3.915000, -38.598999, '0'),
(209, 13, 0, '', 'AGUA BRANCA', 'AGUA BRANCA', 'PB', 0.000000, 0.000000, '0'),
(210, 13, 0, '', 'ALAGOA GRANDE', 'ALAGOA GRANDE', 'PB', 0.000000, 0.000000, '0'),
(211, 13, 0, '', 'ALAGOA NOVA', 'ALAGOA NOVA', 'PB', 0.000000, 0.000000, '0'),
(212, 13, 0, '', 'ALGODAO DE JANDAIRA', 'ALGODAO DE JANDAIRA', 'PB', 0.000000, 0.000000, '0'),
(213, 13, 0, '', 'ALHANDRA CLORACAO', 'ALHANDRA', 'PB', -7.435000, -34.903000, '0'),
(214, 13, 0, '', 'ALHANDRA PRE-CLORACAO', 'ALHANDRA', 'PB', 0.000000, 0.000000, '1'),
(215, 13, 0, '', 'APARECIDA', 'APARECIDA', 'PB', -6.786000, -38.077999, '0'),
(216, 13, 0, '', 'ARARA', 'ARARA', 'PB', 0.000000, 0.000000, '0'),
(217, 13, 0, 'BORBOREMA', 'AREIA', 'AREIA', 'PB', -6.923000, -35.667000, '0'),
(218, 13, 0, '', 'AREIA - SAULO MAIA', 'AREIA', 'PB', 0.000000, 0.000000, '0'),
(219, 13, 0, '', 'AREIAL', 'AREIAL', 'PB', 0.000000, 0.000000, '0'),
(220, 13, 0, 'BORBOREMA', 'AROEIRAS', 'AROEIRAS', 'PB', 0.000000, 0.000000, '0'),
(221, 13, 0, '', 'BANANEIRAS', 'BANANEIRAS', 'PB', -6.762000, -35.634998, '0'),
(222, 13, 0, '', 'BARRA DE SANTA ROSA', 'BARRA DE SANTA ROSA', 'PB', 0.000000, 0.000000, '0'),
(223, 13, 0, 'BORBOREMA', 'BARRA DE SAO MIGUEL', 'BARRA DE SAO MIGUEL', 'PB', -7.747000, -36.313999, '0'),
(224, 13, 0, 'BORBOREMA', 'BARRAGEM SAO JOSE', 'MONTEIRO', 'PB', 0.000000, 0.000000, '0'),
(225, 13, 0, '', 'BELEM', 'BELEM', 'PB', -6.726000, -35.555000, '0'),
(226, 13, 0, 'BORBOREMA', 'BOA VISTA', 'BOA VISTA', 'PB', 0.000000, 0.000000, '0'),
(227, 13, 0, '', 'BOM JESUS', 'BOM JESUS', 'PB', -6.896000, -38.523998, '0'),
(228, 13, 0, '', 'BONITO DE SANTA FE', 'BONITO DE SANTA FE', 'PB', -7.315000, -38.516998, '0'),
(229, 13, 0, 'BORBOREMA', 'BOQUEIRAO', 'BOQUEIRAO', 'PB', -7.484000, -36.136002, '0'),
(230, 13, 0, '', 'BREJO DO CRUZ', 'BREJO DO CRUZ', 'PB', -6.344000, -37.500000, '0'),
(231, 13, 0, 'RIO DO PEIXE', 'BREJO DOS SANTOS', 'BREJO DOS SANTOS', 'PB', -6.373000, -37.830002, '0'),
(232, 13, 0, '', 'CAAPORA', 'CAAPORA', 'PB', -7.510000, -34.924999, '0'),
(233, 13, 0, 'BORBOREMA', 'CABACEIRAS', 'CABACEIRAS', 'PB', 0.000000, 0.000000, '0'),
(234, 13, 0, '', 'CACHOEIRA DOS INDIOS', 'CACHOEIRA DOS INDIOS', 'PB', 0.000000, 0.000000, '0'),
(235, 13, 0, '', 'CACIMBA DE DENTRO', 'CACIMBA DE DENTRO', 'PB', -6.650000, -35.789001, '0'),
(236, 13, 0, '', 'CACIMBAS', 'CACIMBAS', 'PB', 0.000000, 0.000000, '0'),
(237, 13, 0, '', 'CAJA', 'CAMPINA GRANDE', 'PB', 0.000000, 0.000000, '0'),
(238, 13, 0, 'ALTO PIRANHAS', 'CAJAZEIRAS (ENG. AVIDOS)', 'CAJAZEIRAS', 'PB', -6.977000, -38.456001, '0'),
(239, 13, 0, '', 'CAJAZEIRINHAS', 'CAJAZEIRINHAS', 'PB', 0.000000, 0.000000, '0'),
(240, 13, 0, 'BORBOREMA', 'CAMALAU', 'CAMALAU', 'PB', -7.888000, -36.821999, '0'),
(241, 13, 0, '', 'CAMPINA GRANDE', 'CAMPINA GRANDE', 'PB', -7.385000, -35.974998, '0'),
(242, 13, 0, 'LITORAL', 'CAPIM', 'CAPIM', 'PB', 0.000000, 0.000000, '0'),
(243, 13, 0, '', 'CARAUBAS', 'CARAUBAS', 'PB', -7.762000, -36.548000, '0'),
(244, 13, 0, '', 'CARRAPATEIRA', 'CARRAPATEIRA', 'PB', 0.000000, 0.000000, '0'),
(245, 13, 0, '', 'CASSERENGUE', 'CASSERENGUE', 'PB', 0.000000, 0.000000, '0'),
(246, 13, 0, 'ESPINHARAS', 'CATINGUEIRA', 'CATINGUEIRA', 'PB', -7.092000, -37.647999, '0'),
(247, 13, 0, '', 'CATOLE DO ROCHA', 'CATOLE DO ROCHA', 'PB', -6.344000, -37.748001, '0'),
(248, 13, 0, '', 'CEPILHO', 'AREIA', 'PB', 0.000000, 0.000000, '0'),
(249, 13, 0, '', 'CHA DOS PEREIROS', 'INGA', 'PB', 0.000000, 0.000000, '0'),
(250, 13, 0, '', 'CONCEICAO', 'CONCEICAO', 'PB', 0.000000, 0.000000, '0'),
(251, 13, 0, '', 'CONDE', 'CONDE', 'PB', 0.000000, 0.000000, '0'),
(252, 13, 0, '', 'CONGO', 'CONGO', 'PB', 0.000000, 0.000000, '0'),
(253, 13, 0, 'BORBOREMA', 'COXIXOLA', 'COXIXOLA', 'PB', 0.000000, 0.000000, '0'),
(254, 13, 0, '', 'CRUZ DO ESPIRITO SANTO', 'CRUZ DO ESPIRITO SANTO', 'PB', -7.127000, -35.098000, '0'),
(255, 13, 0, 'BORBOREMA', 'CUBATI', 'CUBATI', 'PB', 0.000000, 0.000000, '0'),
(256, 13, 0, '', 'CUITE', 'CUITE', 'PB', 0.000000, 0.000000, '0'),
(257, 13, 0, 'BREJO', 'CUITEGI', 'CUITEGI', 'PB', -6.906000, -35.535000, '0'),
(258, 13, 0, '', 'DESTERRO', 'DESTERRO', 'PB', 0.000000, 0.000000, '0'),
(259, 13, 0, '', 'DIAMANTE', 'DIAMANTE', 'PB', 0.000000, 0.000000, '0'),
(260, 13, 0, '', 'DUAS ESTRADAS', 'DUAS ESTRADAS', 'PB', -6.703000, -35.442001, '0'),
(261, 13, 0, 'BORBOREMA', 'EB3 - MONTEIRO', 'MONTEIRO', 'PB', 0.000000, 0.000000, '0'),
(262, 13, 0, '', 'EMAS', 'EMAS', 'PB', -7.097000, -37.715000, '0'),
(263, 13, 0, 'BORBOREMA', 'ESPERANCA', 'ESPERANCA', 'PB', -7.034000, -35.859001, '0'),
(264, 13, 0, 'LITORAL', 'ITABAIANA - NOVA ETA II', 'ITABAIANA', 'PB', -7.343000, -35.335999, '0'),
(265, 13, 0, '', 'ITABAIANA - FORUM ETA III', 'ITABAIANA', 'PB', -7.317000, -35.341999, '0'),
(266, 13, 0, '', 'ITABAIANA - VELHA ETA I', 'ITABAIANA', 'PB', -7.342000, -35.334999, '0'),
(267, 13, 0, 'BORBOREMA', 'FAGUNDES', 'FAGUNDES', 'PB', -7.350000, -35.783001, '0'),
(268, 13, 0, 'BORBOREMA', 'FREI MARTINHO', 'FREI MARTINHO', 'PB', 0.000000, 0.000000, '0'),
(269, 13, 0, '', 'GADO BRAVO', 'GADO BRAVO', 'PB', 0.000000, 0.000000, '0'),
(270, 13, 0, '', 'GRAMAME', 'JOAO PESSOA', 'PB', -7.228000, -34.919998, '0'),
(271, 13, 0, '', 'GRAVATA', 'SAO JOAO DO RIO DO PEIXE', 'PB', -7.385000, -35.976002, '0'),
(272, 13, 0, '', 'GUARABIRA', 'GUARABIRA', 'PB', 0.000000, 0.000000, '0'),
(273, 13, 0, '', 'GURINHEM', 'GURINHEM', 'PB', 0.000000, 0.000000, '0'),
(274, 13, 0, '', 'GURJAO', 'GURJAO', 'PB', -7.248000, -36.494999, '0'),
(275, 13, 0, '', 'IBIARA', 'IBIARA', 'PB', 0.000000, 0.000000, '0'),
(276, 13, 0, '', 'IGARACY', 'IGARACY', 'PB', -7.176000, -38.154999, '0'),
(277, 13, 0, '', 'IMACULADA', 'IMACULADA', 'PB', 0.000000, 0.000000, '0'),
(278, 13, 0, '', 'INGA', 'INGA', 'PB', 0.000000, 0.000000, '0'),
(279, 13, 0, '', 'IPUEIRA', 'PAULISTA', 'PB', 0.000000, 0.000000, '0'),
(280, 13, 0, '', 'ITAPORANGA ETA VELHA', 'ITAPORANGA', 'PB', -7.323000, -38.228001, '0'),
(281, 13, 0, 'BORBOREMA', 'ITATUBA', 'ITATUBA', 'PB', -7.415000, -35.637001, '0'),
(282, 13, 0, '', 'JACARAU', 'JACARAU', 'PB', -6.619000, -35.286999, '0'),
(283, 13, 0, 'LITORAL', 'JACUMA', 'CONDE', 'PB', -7.286000, -34.805000, '0'),
(284, 13, 0, '', 'JERICO', 'JERICO', 'PB', -6.550000, -37.800999, '0'),
(285, 13, 0, 'BORBOREMA', 'JUAREZ TAVORA', 'JUAREZ TAVORA', 'PB', -7.166000, -35.592999, '0'),
(286, 13, 0, 'BORBOREMA', 'JUAZEIRINHO', 'JUAZEIRINHO', 'PB', 0.000000, 0.000000, '0'),
(287, 13, 0, '', 'JURIPIRANGA', 'JURIPIRANGA', 'PB', 0.000000, 0.000000, '0'),
(288, 13, 0, 'ESPINHARAS', 'JURU', 'JURU', 'PB', 0.000000, 0.000000, '0'),
(289, 13, 0, '', 'LAGOA DO MATO', 'REMIGIO', 'PB', 0.000000, 0.000000, '0'),
(290, 13, 0, '', 'LAGOA SECA', 'LAGOA SECA', 'PB', 0.000000, 0.000000, '0'),
(291, 13, 0, '', 'LIVRAMENTO', 'LIVRAMENTO', 'PB', 0.000000, 0.000000, '0'),
(292, 13, 0, '', 'LUCENA', 'LUCENA', 'PB', -6.898000, -34.872002, '0'),
(293, 13, 0, '', 'MALTA', 'MALTA', 'PB', 0.000000, 0.000000, '0'),
(294, 13, 0, '', 'MALTA-CONDADO', 'CONDADO', 'PB', 0.000000, 0.000000, '0'),
(295, 13, 0, '', 'MAMANGUAPE', 'MAMANGUAPE', 'PB', -6.837000, -35.132000, '0'),
(296, 13, 0, '', 'MANAIRA', 'MANAIRA', 'PB', 0.000000, 0.000000, '0'),
(297, 13, 0, '', 'MARES - JOAO PESSOA', 'JOAO PESSOA', 'PB', -7.153000, -34.910000, '0'),
(298, 13, 0, '', 'MARI', 'MARI', 'PB', 0.000000, 0.000000, '0'),
(299, 13, 0, '', 'MARIZOPOLIS', 'MARIZOPOLIS', 'PB', 0.000000, 0.000000, '0'),
(300, 13, 0, '', 'MASSARANDUBA', 'MASSARANDUBA', 'PB', 0.000000, 0.000000, '0'),
(301, 13, 0, '', 'MATINHAS', 'MATINHAS', 'PB', 0.000000, 0.000000, '0'),
(302, 13, 0, '', 'MATO GROSSO', 'MATO GROSSO', 'PB', 0.000000, 0.000000, '0'),
(303, 13, 0, '', 'MATUREIA', 'MATUREIA', 'PB', 0.000000, 0.000000, '0'),
(304, 13, 0, '', 'MOGEIRO', 'MOGEIRO', 'PB', 0.000000, 0.000000, '0'),
(305, 13, 0, '', 'MONTADAS', 'MONTADAS', 'PB', 0.000000, 0.000000, '0'),
(306, 13, 0, '', 'MONTE HOREBE', 'MONTE HOREBE', 'PB', -7.213000, -38.587002, '0'),
(307, 13, 0, 'BORBOREMA', 'MONTEIRO', 'MONTEIRO', 'PB', -7.913000, -37.109001, '0'),
(308, 13, 0, '', 'MULUNGU', 'MULUNGU', 'PB', 0.000000, 0.000000, '0'),
(309, 13, 0, '', 'NATUBA ETA NOVA', 'NATUBA', 'PB', -7.641000, -35.549000, '0'),
(310, 13, 0, '', 'NAZAREZINHO', 'NAZAREZINHO', 'PB', 0.000000, 0.000000, '0'),
(311, 13, 0, '', 'NOVA FLORESTA', 'NOVA FLORESTA', 'PB', 0.000000, 0.000000, '0'),
(312, 13, 0, '', 'NOVA OLINDA', 'NOVA OLINDA', 'PB', -7.482000, -38.041000, '0'),
(313, 13, 0, '', 'NOVA PALMEIRA', 'NOVA PALMEIRA', 'PB', 0.000000, 0.000000, '0'),
(314, 13, 0, '', 'OLHO DAGUA', 'OLHO DAGUA', 'PB', -7.216000, -37.752998, '0'),
(315, 13, 0, '', 'OURO VELHO', 'OURO VELHO', 'PB', 0.000000, 0.000000, '0'),
(316, 13, 0, '', 'PATOS', 'PATOS', 'PB', -7.059000, -37.271999, '0'),
(317, 13, 0, '', 'PAULISTA', 'PAULISTA', 'PB', -6.600000, -37.624001, '0'),
(318, 13, 0, '', 'PEDRAS DE FOGO', 'PEDRAS DE FOGO', 'PB', -7.392000, -35.105000, '0'),
(319, 13, 0, '', 'PEDRO VELHO', 'AROEIRAS', 'PB', 0.000000, 0.000000, '0'),
(320, 13, 0, '', 'PIANCO', 'PIANCO', 'PB', -7.188000, -37.914001, '0'),
(321, 13, 0, 'BORBOREMA', 'PICUI', 'PICUI', 'PB', 0.000000, 0.000000, '0'),
(322, 13, 0, '', 'PILAR', 'PILAR', 'PB', 0.000000, 0.000000, '0'),
(323, 13, 0, '', 'PILOES', 'PILOES', 'PB', 0.000000, 0.000000, '0'),
(324, 13, 0, '', 'PIRPIRITUBA', 'PIRPIRITUBA', 'PB', 0.000000, 0.000000, '0'),
(325, 13, 0, 'LITORAL', 'PITIMBU', 'PITIMBU', 'PB', -7.472000, -34.811001, '0'),
(326, 13, 0, 'BORBOREMA', 'POCINHOS', 'POCINHOS', 'PB', 0.000000, 0.000000, '0'),
(327, 13, 0, '', 'POMBAL', 'POMBAL', 'PB', -6.773000, -37.792999, '0'),
(328, 13, 0, '', 'PRATA', 'PRATA', 'PB', 0.000000, 0.000000, '0'),
(329, 13, 0, '', 'PRINCESA ISABEL', 'PRINCESA ISABEL', 'PB', -7.733000, -37.992001, '0'),
(330, 13, 0, '', 'PUXINANA', 'PUXINANA', 'PB', 0.000000, 0.000000, '0'),
(331, 13, 0, '', 'REMIGIO', 'REMIGIO', 'PB', 0.000000, 0.000000, '0'),
(332, 13, 0, '', 'REMIGIO (Cepilho)', 'REMIGIO', 'PB', -6.988000, -35.775002, '0'),
(333, 13, 0, '', 'RIACHO DOS CAVALOS', 'RIACHO DOS CAVALOS', 'PB', -6.432000, -37.651001, '0'),
(334, 13, 0, '', 'RIACHO STO. ANTONIO', 'RIACHO DE SANTO ANTONIO', 'PB', 0.000000, 0.000000, '0'),
(335, 13, 0, '', 'RIO TINTO', 'RIO TINTO', 'PB', 0.000000, 0.000000, '0'),
(336, 13, 0, 'LITORAL', 'SALGADO DE SAO FELIX', 'SALGADO DE SAO FELIX', 'PB', -7.357000, -35.443001, '0'),
(337, 13, 0, '', 'SANTA CRUZ', 'SANTA CRUZ', 'PB', -6.535000, -38.051998, '0'),
(338, 13, 0, '', 'SANTA GERTRUDES', 'PATOS', 'PB', -6.948000, -37.396999, '0'),
(339, 13, 0, '', 'SANTA HELENA', 'SANTA HELENA', 'PB', 0.000000, 0.000000, '0'),
(340, 13, 0, '', 'SANTA LUZIA', 'SANTA LUZIA', 'PB', -6.864000, -36.917000, '0'),
(341, 13, 0, 'LITORAL', 'SANTA RITA', 'SANTA RITA', 'PB', -7.140000, -34.983002, '0'),
(342, 13, 0, '', 'SANTA TEREZINHA', 'SANTA TERESINHA', 'PB', -7.085000, -37.445999, '0'),
(343, 13, 0, '', 'SANTANA DE MANGUEIRA', 'SANTANA DE MANGUEIRA', 'PB', 0.000000, 0.000000, '0'),
(344, 13, 0, '', 'SANTANA DOS GARROTES', 'SANTANA DOS GARROTES', 'PB', -7.390000, -37.987000, '0'),
(345, 13, 0, '', 'SAO BENTINHO', 'SAO BENTINHO', 'PB', -6.892000, -37.729000, '0'),
(346, 13, 0, '', 'SAO BENTO', 'SAO BENTO', 'PB', -6.494000, -37.449001, '0'),
(347, 13, 0, '', 'SAO DOMINGOS', 'SAO DOMINGOS DO CARIRI', 'PB', 0.000000, 0.000000, '0'),
(348, 13, 0, '', 'SAO GONCALO', 'SOUSA', 'PB', -6.846000, -38.325001, '0'),
(349, 13, 0, '', 'SAO JOAO DO CARIRI', 'SAO JOAO DO CARIRI', 'PB', 0.000000, 0.000000, '0'),
(350, 13, 0, '', 'SAO JOAO DO RIO DO PEIXE', 'SAO JOAO DO RIO DO PEIXE', 'PB', 0.000000, 0.000000, '0'),
(351, 13, 0, '', 'SAO JOSE DA LAGOA TAPADA', 'SAO JOSE DA LAGOA TAPADA', 'PB', -6.944000, -38.162998, '0'),
(352, 13, 0, '', 'SAO JOSE DE CAIANA', 'SAO JOSE DE CAIANA', 'PB', -7.252000, -38.299000, '0'),
(353, 13, 0, '', 'SAO JOSE DE ESPINHARAS', 'SAO JOSE DE ESPINHARAS', 'PB', -6.842000, -37.321999, '0'),
(354, 13, 0, '', 'SAO JOSE DO BOMFIM', 'SAO JOSE DO BONFIM', 'PB', -7.075000, -37.286999, '0'),
(355, 13, 0, '', 'SAO JOSE DO SABUGI', 'SAO JOSE DO SABUGI', 'PB', -6.783000, -36.791000, '0'),
(356, 13, 0, '', 'SAO JOSE DOS CORDEIROS', 'SAO JOSE DOS CORDEIROS', 'PB', 0.000000, 0.000000, '0'),
(357, 13, 0, '', 'SAO JOSE PIRANHAS', 'SAO JOSE DE ESPINHARAS', 'PB', -7.124000, -38.500000, '0'),
(358, 13, 0, '', 'SAO MAMEDE', 'SAO MAMEDE', 'PB', 0.000000, 0.000000, '0'),
(359, 13, 0, '', 'SAO MIGUEL', 'SAO MIGUEL DE TAIPU', 'PB', 0.000000, 0.000000, '0'),
(360, 13, 0, 'BORBOREMA', 'SAO SEBASTIAO DE LAGOA DE ROCA', 'SAO SEBASTIAO DE LAGOA DE ROCA', 'PB', -7.106000, -35.868000, '0'),
(361, 13, 0, '', 'SAPE', 'SAPE', 'PB', -7.091000, -35.228001, '0'),
(362, 13, 0, '', 'SERRA BRANCA', 'SERRA BRANCA', 'PB', 0.000000, 0.000000, '0'),
(363, 13, 0, '', 'SERRA GRANDE', 'SERRA GRANDE', 'PB', 0.000000, 0.000000, '0'),
(364, 13, 0, '', 'SERRA REDONDA', 'SERRA REDONDA', 'PB', 0.000000, 0.000000, '0'),
(365, 13, 0, '', 'SERRARIA', 'SERRARIA', 'PB', -6.815000, -35.639000, '0'),
(366, 13, 0, '', 'SOLANEA', 'SOLANEA', 'PB', -6.758000, -35.650002, '0'),
(367, 13, 0, '', 'SOUSA', 'SOUSA', 'PB', 0.000000, 0.000000, '0'),
(368, 13, 0, 'BORBOREMA', 'SUME - ETA VELHA', 'SUME', 'PB', 0.000000, 0.000000, '0'),
(369, 13, 0, 'BORBOREMA', 'SUME-ADUTORA DO CONGO EB II', 'SUME', 'PB', -7.681000, -36.875999, '0'),
(370, 13, 0, 'ESPINHARAS', 'TAPEROA', 'TAPEROA', 'PB', -7.216000, -36.826000, '0'),
(371, 13, 0, '', 'TAVARES', 'TAVARES', 'PB', 0.000000, 0.000000, '0'),
(372, 13, 0, '', 'TEIXEIRA', 'TEIXEIRA', 'PB', 0.000000, 0.000000, '0'),
(373, 13, 0, '', 'TRIUNFO', 'TRIUNFO', 'PB', -6.580000, -38.601002, '0'),
(374, 13, 0, '', 'UIRAUNA', 'UIRAUNA', 'PB', -6.512000, -38.414001, '0'),
(375, 13, 0, '', 'UIRAUNA - CAPIVARA', 'UIRAUNA', 'PB', -6.542000, -38.465000, '0'),
(376, 13, 0, 'BORBOREMA', 'UMBUZEIRO ETA VELHA', 'UMBUZEIRO', 'PB', -7.712000, -35.650002, '0'),
(377, 13, 0, '', 'VARZEA', 'VARZEA', 'PB', -6.772000, -36.990002, '0'),
(378, 13, 0, '', 'VISTA SERRANA', 'VISTA SERRANA', 'PB', -6.682000, -37.584999, '0'),
(379, 14, 0, 'SERTAO', 'AGUA BRANCA - EE5', 'AGUA BRANCA', 'AL', -9.262000, -37.935001, '0'),
(380, 14, 0, 'SERRANA', 'ANADIA', 'ANADIA', 'AL', -9.678000, -36.325001, '0'),
(381, 14, 0, 'LESTE', 'BARRA DE SAO MIGUEL', 'BARRA DE SAO MIGUEL', 'AL', -9.829000, -35.903000, '0'),
(382, 14, 0, 'BACIA', 'BATALHA', 'BATALHA', 'AL', -9.673000, -37.132000, '0'),
(383, 14, 0, 'SERRANA', 'CAPELA', 'CAPELA', 'AL', -9.415000, -36.080002, '0'),
(384, 14, 0, 'SERTAO', 'DELMIRO GOUVEIA - BARRAGEM LESTE', 'DELMIRO GOUVEIA', 'AL', -9.368000, -38.188999, '0'),
(385, 14, 0, 'SERTAO', 'DELMIRO GOUVEIA - EE3', 'DELMIRO GOUVEIA', 'AL', -9.392000, -38.011002, '0'),
(386, 14, 0, 'SERRANA', 'ESTRELA DE ALAGOAS', 'ESTRELA DE ALAGOAS', 'AL', -9.389000, -36.763000, '0'),
(387, 14, 0, 'LESTE', 'FLEXEIRAS', 'FLEXEIRAS', 'AL', -9.280000, -35.721001, '0'),
(388, 14, 0, 'LESTE', 'JOAQUIM GOMES', 'JOAQUIM GOMES', 'AL', -9.132000, -35.749001, '0'),
(389, 14, 0, 'AGRESTE', 'JUNQUEIRO', 'CAJUEIRO', 'AL', -9.905000, -36.469002, '0'),
(390, 14, 0, 'MACEIO', 'MACEIO - AVIACAO', 'MACEIO', 'AL', 0.000000, 0.000000, '0'),
(391, 14, 0, 'MACEIO', 'MACEIO - CARDOSO', 'MACEIO', 'AL', -9.623000, -35.745998, '0'),
(392, 14, 0, 'LESTE', 'MURICI - CACHOEIRA', 'MURICI', 'AL', 0.000000, 0.000000, '0'),
(393, 14, 0, 'LESTE', 'MURICI - CANSANCAO', 'MURICI', 'AL', -9.319000, -35.950001, '0'),
(394, 14, 0, 'LESTE', 'NOVO LINO', 'NOVO LINO', 'AL', -8.944000, -35.661999, '0'),
(395, 14, 0, 'SERTAO', 'OLHO DAGUA DO CASADO', 'OLHO DAGUA DO CASADO', 'AL', -9.469000, -37.844002, '0'),
(396, 14, 0, 'SERRANA', 'PALMEIRA DOS INDIOS', 'PALMEIRA DOS INDIOS', 'AL', -9.402000, -36.629002, '0'),
(397, 14, 0, 'BACIA', 'PAO DE ACUCAR', 'PAO DE ACUCAR', 'AL', -9.705000, -37.415001, '0'),
(398, 14, 0, 'SERRANA', 'PAULO JACINTO', 'PAULO JACINTO', 'AL', -9.359000, -36.365002, '0'),
(399, 14, 0, 'AGRESTE', 'PIACABUCU', 'PIACABUCU', 'AL', -10.405000, -36.429001, '0'),
(400, 14, 0, 'SERTAO', 'PIRANHAS', 'PIRANHAS', 'AL', -9.597000, -37.773998, '0'),
(401, 14, 0, 'MACEIO', 'PRATAGY', 'MACEIO', 'AL', -9.558000, -35.737000, '0'),
(402, 14, 0, 'SERRANA', 'QUEBRANGULO', 'QUEBRANGULO', 'AL', -9.315000, -36.473999, '0'),
(403, 14, 0, 'SERRANA', 'QUEBRANGULO - CACAMBAS', 'QUEBRANGULO', 'AL', -9.303000, -36.478001, '0'),
(404, 14, 0, 'LESTE', 'RIO LARGO - MATA DO ROLO', 'RIO LARGO', 'AL', -9.481000, -35.840000, '0'),
(405, 14, 0, 'LESTE', 'RIO LARGO - TABULEIRO DO PINTO', 'RIO LARGO', 'AL', -9.505000, -35.812000, '0'),
(406, 14, 0, 'LESTE', 'SATUBA', 'SATUBA', 'AL', -9.559000, -35.819000, '0'),
(407, 14, 0, 'AGRESTE', 'TRAIPU', 'TRAIPU', 'AL', -9.962000, -36.997002, '0'),
(408, 17, 0, '', '40 HORAS SABIA', 'ANANINDEUA', 'PA', 0.000000, 0.000000, '0'),
(409, 17, 0, '', '5 SETOR', 'BELEM', 'PA', -1.427000, -48.456001, '0'),
(410, 17, 0, '', 'ABAETETUBA', 'ABAETETUBA', 'PA', -1.721000, -48.882000, '0'),
(411, 17, 0, '', 'ABAETETUBA ALGODOAL', 'ABAETETUBA', 'PA', 0.000000, 0.000000, '0'),
(412, 17, 0, '', 'AFUA', 'AFUA', 'PA', 0.000000, 0.000000, '0'),
(413, 17, 0, '', 'ALENQUER', 'ALENQUER', 'PA', 0.000000, 0.000000, '0'),
(414, 17, 0, '', 'ALTAMIRA', 'ALTAMIRA', 'PA', 0.000000, 0.000000, '0'),
(415, 17, 0, '', 'ANAJAS', 'ANAJAS', 'PA', 0.000000, 0.000000, '0'),
(416, 17, 0, '', 'ANANINDEUA - CENTRO', 'ANANINDEUA', 'PA', -1.353000, -48.373001, '0'),
(417, 17, 0, '', 'ARIRI 1', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(418, 17, 0, '', 'ARIRI 2', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(419, 17, 0, '', 'ARIRI-BOLONHA', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(420, 17, 0, '', 'AUGUSTO CORREIA', 'AUGUSTO CORREA', 'PA', 0.000000, 0.000000, '0'),
(421, 17, 0, 'METROPOLITANA', 'BELEM - BEJAMIM SODRE P5/ P8', 'BELEM', 'PA', -1.358000, -48.446999, '0'),
(422, 17, 0, '', 'BENGUI', 'BELEM', 'PA', -1.375000, -48.442001, '0'),
(423, 17, 0, '', 'BOLONHA', 'BELEM', 'PA', -1.418000, -48.438999, '0'),
(424, 17, 0, '', 'BRAGANCA - CHUMUCUI', 'BRAGANCA', 'PA', -1.095000, -46.792000, '0'),
(425, 17, 0, '', 'BREU BRANCO', 'BREU BRANCO', 'PA', 0.000000, 0.000000, '0'),
(426, 17, 0, '', 'BREVES', 'BREVES', 'PA', -1.686000, -50.483002, '0'),
(427, 17, 0, '', 'CACHOEIRA DOA ARARI', 'CACHOEIRA DO ARARI', 'PA', 0.000000, 0.000000, '0'),
(428, 17, 0, 'METROPOLITANA', 'CANARINHO', 'BELEM', 'PA', -1.336000, -48.456001, '0'),
(429, 17, 0, '', 'CAPANEMA - VILA TAUARI', 'CAPANEMA', 'PA', -1.123000, -47.058998, '0'),
(430, 17, 0, '', 'CAPITAO POCO', 'CAPITAO POCO', 'PA', 0.000000, 0.000000, '0'),
(431, 17, 0, '', 'CASTANHAL', 'CASTANHAL', 'PA', 0.000000, 0.000000, '0'),
(432, 17, 0, 'BAIXO AMAZONAS', 'CASTANHAL - CAICARA', 'CASTANHAL', 'PA', -1.316000, -47.896000, '0'),
(433, 17, 0, '', 'CATALINA', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(434, 17, 0, '', 'CDP', 'BELEM', 'PA', -1.402000, -48.480999, '0'),
(435, 17, 0, '', 'CHEGUEVARA', 'MARITUBA', 'PA', -1.368000, -48.308998, '0'),
(436, 17, 0, '', 'CIDADE NOVA ( ANANINDEUA )', 'ANANINDEUA', 'PA', -1.336000, -48.382999, '0'),
(437, 17, 0, '', 'COHAB', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(438, 17, 0, '', 'CASTANHAL - COMANDANTE ASSIS', 'CASTANHAL', 'PA', -1.290000, -47.931999, '0'),
(439, 17, 0, '', 'CONCEICAO DO ARAGUAIA', 'CONCEICAO DO ARAGUAIA', 'PA', -8.283000, -49.264000, '0'),
(440, 17, 0, '', 'CONJUNTO MAGUARI', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(441, 17, 0, '', 'COQUEIRO', 'BELEM', 'PA', -1.370000, -48.429001, '0'),
(442, 17, 0, '', 'CORDEIRO DE FARIAS I', 'BELEM', 'PA', -1.350000, -48.464001, '0'),
(443, 17, 0, '', 'CORDEIRO DE FARIAS II', 'BELEM', 'PA', -1.350000, -48.464001, '0'),
(444, 17, 0, '', 'DOM ELISEU', 'DOM ELISEU', 'PA', -4.247000, -47.561001, '0'),
(445, 17, 0, '', 'FARO', 'FARO', 'PA', 0.000000, 0.000000, '0'),
(446, 17, 0, '', 'GUANABARA I', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(447, 17, 0, '', 'GUANABARA II', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(448, 17, 0, '', 'IGARAPE - MIRI C. NOVA', 'IGARAPE-MIRI', 'PA', 0.000000, 0.000000, '1'),
(449, 17, 0, '', 'IGARAPE - MIRI ESCRITORIO', 'IGARAPE-MIRI', 'PA', 0.000000, 0.000000, '1'),
(450, 17, 0, '', 'IGARAPE - MIRI ESTACAO', 'IGARAPE-MIRI', 'PA', -1.980000, -48.964001, '0'),
(451, 17, 0, '', 'INHANGAPI', 'INHANGAPI', 'PA', 0.000000, 0.000000, '0'),
(452, 17, 0, '', 'ITAITUBA', 'ITAITUBA', 'PA', -4.276000, -55.986000, '0'),
(453, 17, 0, '', 'ITUPIRANGA', 'ITUPIRANGA', 'PA', 0.000000, 0.000000, '0'),
(454, 17, 0, '', 'JACUNDA', 'JACUNDA', 'PA', 0.000000, 0.000000, '0'),
(455, 17, 0, '', 'JADERLANDIA', 'BELEM', 'PA', -1.303000, -47.895000, '0'),
(456, 17, 0, '', 'JURUTI', 'JURUTI', 'PA', 0.000000, 0.000000, '0'),
(457, 17, 0, '', 'LIMOEIRO DO AJURU', 'LIMOEIRO DO AJURU', 'PA', 0.000000, 0.000000, '0'),
(458, 17, 0, '', 'MAGALHAES BARATA', 'MAGALHAES BARATA', 'PA', 0.000000, 0.000000, '0'),
(459, 17, 0, '', 'MAGUARI', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(460, 17, 0, '', 'MAIUATA', 'IGARAPE-MIRI', 'PA', 0.000000, 0.000000, '0'),
(461, 17, 0, '', 'MARABA CIDADE NOVA', 'MARABA', 'PA', 0.000000, 0.000000, '0'),
(462, 17, 0, '', 'MARABA NOVA', 'MARABA', 'PA', -5.326000, -49.077000, '0'),
(463, 17, 0, '', 'MARABA PIONEIRA', 'MARABA', 'PA', -5.339000, -49.124001, '0'),
(464, 17, 0, '', 'MARAPANIN', 'MARAPANIM', 'PA', 0.000000, 0.000000, '0'),
(465, 17, 0, '', 'MARITUBA BEIJA FLOR', 'MARITUBA', 'PA', 0.000000, 0.000000, '0'),
(466, 17, 0, '', 'MARITUBA CENTRO', 'MARITUBA', 'PA', 0.000000, 0.000000, '0'),
(467, 17, 0, '', 'MARITUBA COHAB', 'MARITUBA', 'PA', 0.000000, 0.000000, '0'),
(468, 17, 0, '', 'MARUDA', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(469, 17, 0, '', 'CASTANHAL - MILAGRE', 'CASTANHAL', 'PA', -1.304000, -47.908001, '0'),
(470, 17, 0, '', 'MOCAJUBA', 'MOCAJUBA', 'PA', -2.585000, -49.509998, '0'),
(471, 17, 0, '', 'MOJU', 'MOJU', 'PA', 0.000000, 0.000000, '0'),
(472, 17, 0, '', 'MONTE ALEGRE', 'MONTE ALEGRE', 'PA', -1.994000, -54.055000, '0'),
(473, 17, 0, '', 'MOSQUEIRO - BAIA DO SOL', 'BELEM', 'PA', -1.065000, -48.334999, '0'),
(474, 17, 0, 'NORDESTE', 'NOVA TIMBOTEUA - ESCRITORIO', 'NOVA TIMBOTEUA', 'PA', -1.206000, -47.386002, '0'),
(475, 17, 0, '', 'NOVO REPARTIMENTO', 'NOVO REPARTIMENTO', 'PA', -4.248000, -49.956001, '0'),
(476, 17, 0, '', 'OBIDOS', 'OBIDOS', 'PA', -1.900000, -55.507999, '0'),
(477, 17, 0, '', 'OEIRA DO PARA', 'OEIRAS DO PARA', 'PA', 0.000000, 0.000000, '0'),
(478, 17, 0, 'BAIXO AMAZONAS', 'ORIXIMINA', 'ORIXIMINA', 'PA', -1.763000, -55.866001, '0'),
(479, 17, 0, '', 'OUREM', 'OUREM', 'PA', 0.000000, 0.000000, '0'),
(480, 17, 0, '', 'PAAR', 'BELEM', 'PA', -1.336000, -48.382999, '0'),
(481, 17, 0, '', 'PANORAMA XXI', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(482, 17, 0, 'NORDESTE', 'PEIXE BOI', 'PEIXE-BOI', 'PA', -1.188000, -47.316002, '0'),
(483, 17, 0, '', 'PONTA DE PEDRAS', 'PONTA DE PEDRAS', 'PA', 0.000000, 0.000000, '0'),
(484, 17, 0, '', 'PORTEL', 'PORTEL', 'PA', 0.000000, 0.000000, '0'),
(485, 17, 0, '', 'PRAINHA', 'PRAINHA', 'PA', 0.000000, 0.000000, '0'),
(486, 17, 0, '', 'PRATINHA', 'BELEM', 'PA', -1.376000, -48.480000, '0'),
(487, 17, 0, '', 'R6', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(488, 17, 0, '', 'SALGADO GRANDE', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(489, 17, 0, '', 'SALINOPOLIS - ESCRITORIO ', 'SALINOPOLIS', 'PA', -0.621626, -47.354000, '0'),
(490, 17, 0, '', 'SALVA TERRA', 'SALVATERRA', 'PA', 0.000000, 0.000000, '0'),
(491, 17, 0, '', 'SANTA CRUZ DO ARARI', 'SANTA CRUZ DO ARARI', 'PA', 0.000000, 0.000000, '0'),
(492, 17, 0, '', 'SANTA LUZIA DO PARA', 'SANTA LUZIA DO PARA', 'PA', 0.000000, 0.000000, '0'),
(493, 17, 0, '', 'SANTA MARIA DAS BARREIRAS', 'SANTA MARIA DAS BARREIRAS', 'PA', 0.000000, 0.000000, '0'),
(494, 17, 0, '', 'SANTA MARIA DO PARA - POCO SANTA ROSA', 'SANTA MARIA DO PARA', 'PA', -1.357000, -47.568001, '0'),
(495, 17, 0, 'BAIXO AMAZONAS', 'SANTAREM', 'SANTAREM', 'PA', -2.443000, -54.730999, '0'),
(496, 17, 0, '', 'SAO BRAS', 'BELEM', 'PA', -1.449000, -48.469002, '0'),
(497, 17, 0, '', 'SAO CAETANO DE ODOVELAS', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(498, 17, 0, '', 'SAO FELIX DO XINGU', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(499, 17, 0, '', 'SAO FRANCISCO DO PARA', 'BELEM', 'PA', -1.175000, -47.803001, '0'),
(500, 17, 0, '', 'SATELITE', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(501, 17, 0, '', 'SIDERAL', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(502, 17, 0, '', 'SOURE', 'SOURE', 'PA', 0.000000, 0.000000, '0'),
(503, 17, 0, '', 'TAILANDIA', 'TAILANDIA', 'PA', -2.948000, -48.953999, '0'),
(504, 17, 0, '', 'TANGARAS', 'BELEM', 'PA', -1.276000, -47.953999, '0'),
(505, 17, 0, '', 'TENONE', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(506, 17, 0, '', 'TERRA SANTA', 'TERRA SANTA', 'PA', 0.000000, 0.000000, '0'),
(507, 17, 0, '', 'TRACUATEUA', 'TRACUATEUA', 'PA', 0.000000, 0.000000, '0'),
(508, 17, 0, '', 'UIRAPURU', 'ANANINDEUA', 'PA', -1.327000, -48.398998, '0'),
(509, 17, 0, '', 'CASTANHAL - USINA', 'CASTANHAL', 'PA', -1.295000, -47.930000, '0'),
(510, 17, 0, '', 'VERDEJANTE', 'BELEM', 'PA', -1.410000, -48.394001, '0'),
(511, 17, 0, '', 'VIGIA DE NAZARE', 'VIGIA', 'PA', 0.000000, 0.000000, '0'),
(512, 17, 0, '', 'VILA CAFEZAL', 'MAGALHAES BARATA', 'PA', 0.000000, 0.000000, '0'),
(513, 17, 0, '', 'VILA CUIARANA - SALINOPOLIS', 'SALINOPOLIS', 'PA', -0.650630, -47.264999, '0'),
(514, 17, 0, '', 'VILA DE BEJA', 'ABAETETUBA', 'PA', 0.000000, 0.000000, '0'),
(515, 17, 0, '', 'CASTANHAL - VILA DO APEU', 'CASTANHAL', 'PA', -1.299000, -47.988998, '0'),
(516, 17, 0, '', 'VILA FATIMA', 'TRACUATEUA', 'PA', 0.000000, 0.000000, '0'),
(517, 17, 0, '', 'VILA MAUIATA', 'IGARAPE-MIRI', 'PA', 0.000000, 0.000000, '0'),
(518, 17, 0, '', 'VILA TAUARI', 'CAPANEMA', 'PA', 0.000000, 0.000000, '0'),
(519, 17, 0, '', 'VISEU', 'VISEU', 'PA', 0.000000, 0.000000, '0'),
(520, 18, 0, '', 'ETA II - NOVA', 'VARZEA GRANDE', 'MT', -15.640000, -56.168999, '0'),
(521, 18, 0, '', 'ETA I VELHA', 'VARZEA GRANDE', 'MT', -15.642000, -56.129002, '0'),
(522, 19, 0, '', 'RIO BRANCO - SOBRAL', 'RIO BRANCO', 'AC', -10.004000, -67.842003, '0'),
(523, 20, 0, '', 'ETA CAJAIBA - ITABAIANA', 'ITABAIANA', 'SE', -10.800000, -37.431000, '0'),
(524, 20, 0, '', 'AREIA BRANCA', 'AREIA BRANCA', 'SE', -10.759000, -37.318001, '0'),
(525, 20, 0, '', 'LAGARTO', 'LAGARTO', 'SE', -10.919000, -37.662998, '0'),
(526, 20, 0, '', 'TOBIAS BARRETO', 'TOBIAS BARRETO', 'SE', -11.183000, -37.998001, '0'),
(527, 21, 0, '', 'PETROLINA', 'PETROLINA', 'PE', -9.395000, -40.528999, '0'),
(528, 22, 0, '', 'BACABAL', 'BACABAL', 'MA', -4.234000, -44.778000, '0'),
(529, 23, 0, 'CAXIAS', 'CAXIAS - ETA POINT', 'CAXIAS', 'MA', -4.885000, -43.381001, '0'),
(530, 23, 0, 'CAXIAS', 'CAXIAS - ETA VOLTA REDONDA', 'CAXIAS', 'MA', -4.883000, -43.354000, '0'),
(531, 26, 0, '', 'PETROLINA', 'PETROLINA', 'PE', -9.395000, -40.529999, '0'),
(532, 27, 0, '', 'CAMPUS - NATAL UFRN', 'NATAL', 'RN', -5.837000, -35.202000, '0'),
(533, 11, 0, '', 'CAJUPIRANGA  - P68', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(536, 28, 0, '', 'BRASIL KIRIN IGARASSU', 'IGARASSU', 'PE', -7.797000, -34.928001, '0'),
(535, 24, 0, '', 'ITAPISSUMA', 'ITAPISSUMA', 'PE', -7.799000, -34.924999, '0'),
(537, 26, 0, '', 'ARAPIRACA', 'ARAPIRACA', 'AL', -9.785000, -36.654999, '0'),
(538, 11, 0, '', 'SAO JOSE DO SERIDO', 'SAO JOSE DO SERIDO', 'RN', -6.450000, -36.875999, '0'),
(539, 14, 0, '', 'ALTO SERTAO - AGUA BRANCA', 'AGUA BRANCA', 'AL', -9.314000, -37.980999, '0'),
(540, 3, 0, '', 'ITAPISSUMA - XAROPARIA', 'ITAPISSUMA', 'PE', -7.751000, -34.924000, '0'),
(542, 3, 0, '', 'ITAPISSUMA - ETA/ETEI', 'ITAPISSUMA', 'PE', -7.751000, -34.924000, '0'),
(543, 14, 0, '', 'ALTO SERTAO(ETA NOVA)', 'DELMIRO GOUVEIA', 'AL', -9.314000, -37.980999, '0'),
(544, 11, 0, '', 'JARDIM DE PIRANHAS - MANOEL TORRES EB1', 'JARDIM DE PIRANHAS', 'RN', -6.377000, -37.353001, '0'),
(545, 16, 0, 'CPR Norte', 'BOTAFOGO', 'IGARASSU', 'PE', -7.852000, -34.938000, '0'),
(547, 16, 0, 'CPR Norte', 'BOTAFOGO', 'IGARASSU', 'PE', -7.852000, -34.938000, '0'),
(548, 16, 0, 'CPR Norte', 'ARACOIABA', 'ARACOIABA', 'PE', -7.788000, -35.091999, '0'),
(549, 16, 0, 'CPR Norte', 'GOIANA', 'GOIANA', 'PE', -7.531000, -34.995998, '0'),
(550, 16, 0, 'CPR Leste', 'ALTO DO CEU', 'RECIFE', 'PE', -8.014000, -34.890999, '0'),
(551, 16, 0, 'CPR Leste', 'CAIXA DAGUA', 'RECIFE', 'PE', -7.995000, -34.904999, '0'),
(552, 16, 0, 'CPR Leste', 'VERA CRUZ', 'CAMARAGIBE', 'PE', -7.954000, -35.007999, '0'),
(553, 16, 0, 'CPR Leste', 'GUABIRABA - POCOS', 'RECIFE', 'PE', 0.000000, 0.000000, '0'),
(554, 16, 0, 'CPR Leste', 'DOIS IRMAOS EE', 'RECIFE', 'PE', -8.015000, -34.944000, '0'),
(555, 16, 0, 'CPR Leste', 'MACACOS EE', 'RECIFE', 'PE', -8.015000, -34.946999, '0'),
(556, 16, 0, 'CPR Oeste', 'TAPACURA', 'RECIFE', 'PE', -8.078000, -34.988998, '0'),
(557, 16, 0, 'CPR Oeste', 'VARZEA DO UNA', 'CAMARAGIBE', 'PE', -7.997000, -35.044998, '0'),
(558, 16, 0, 'CPR Oeste', 'MANOEL DE SENA', 'JABOATAO DOS GUARARAPES', 'PE', -8.106000, -35.014999, '0'),
(559, 16, 0, 'CPR Oeste', 'MORENO', 'MORENO', 'PE', -8.115000, -35.116001, '0'),
(560, 16, 0, 'CPR Oeste', 'Parque CAPIBARIBE', 'SAO LOURENCO DA MATA', 'PE', 0.000000, 0.000000, '0'),
(561, 16, 0, 'CPR Oeste', 'BONANCA', 'MORENO', 'PE', -8.112000, -35.188000, '0'),
(562, 16, 0, 'CPR Oeste', 'MATRIZ DA LUZ', 'SAO LOURENCO DA MATA', 'PE', -8.037000, -35.099998, '0'),
(563, 16, 0, 'CPR Sul', 'SUAPE', 'IPOJUCA', 'PE', -8.367000, -35.018002, '0'),
(564, 16, 0, 'CPR Sul', 'PORTO DE GALINHAS', 'IPOJUCA', 'PE', -8.505000, -35.023998, '0'),
(565, 16, 0, 'CPR Sul', 'IPOJUCA', 'IPOJUCA', 'PE', -8.396000, -35.062000, '0'),
(566, 16, 0, 'CPR Sul', 'CAMELA', 'IPOJUCA', 'PE', -8.509000, -35.122002, '0'),
(567, 16, 0, 'CPP', 'MARCOS FREIRE - CAPTACAO', 'JABOATAO DOS GUARARAPES', 'PE', -8.159000, -34.979000, '0'),
(568, 16, 0, 'CPP', 'MARCOS FREIRE - CONV. E COMP.', 'JABOATAO DOS GUARARAPES', 'PE', -8.132000, -34.973999, '0'),
(569, 16, 0, 'CPP', 'CHARNECA', 'CABO DE SANTO AGOSTINHO', 'PE', -8.296000, -35.062000, '0'),
(570, 16, 0, 'CPP', 'MURIBEQUINHA - CAPTACAO', 'JABOATAO DOS GUARARAPES', 'PE', -8.166000, -35.007000, '0'),
(571, 16, 0, 'CPP', 'MURIBEQUINHA - ETA', 'JABOATAO DOS GUARARAPES', 'PE', -8.172000, -34.999001, '0'),
(572, 16, 0, 'CPP', 'PIRAPAMA - CABO', 'CABO DE SANTO AGOSTINHO', 'PE', -8.267000, -35.049999, '0'),
(573, 16, 0, 'CPP', 'GURJAU / MATAPAGIPE', 'CABO DE SANTO AGOSTINHO', 'PE', -8.267000, -35.048000, '0'),
(574, 16, 0, 'MATA SUL', 'TAMANDARE - VELHA', 'TAMANDARE', 'PE', 0.000000, 0.000000, '0'),
(575, 16, 0, 'MATA SUL', 'TAMANDARE - NOVA - RIO FORMOSO', 'TAMANDARE', 'PE', 0.000000, 0.000000, '0'),
(576, 16, 0, 'MATA SUL', 'RIO FORMOSO', 'RIO FORMOSO', 'PE', 0.000000, 0.000000, '0'),
(577, 16, 0, 'MATA SUL', 'SIRINHAEM - Captacao', 'SIRINHAEM', 'PE', 0.000000, 0.000000, '0'),
(578, 16, 0, 'MATA SUL', 'SIRINHAEM - ETA', 'SIRINHAEM', 'PE', 0.000000, 0.000000, '0'),
(579, 16, 0, 'MATA SUL', 'VITORIA DE SANTO ANTAO', 'VITORIA DE SANTO ANTAO', 'PE', -8.116000, -35.300999, '0'),
(580, 16, 0, 'MATA SUL', 'BARREIROS', 'BARREIROS', 'PE', 0.000000, 0.000000, '0'),
(581, 16, 0, 'MATA SUL', 'SAO JOSE DA COROA GRANDE', 'SAO JOSE DA COROA GRANDE', 'PE', 0.000000, 0.000000, '0'),
(582, 16, 0, 'MATA SUL', 'CUCAU', 'RIO FORMOSO', 'PE', -8.631000, -35.265999, '0'),
(583, 16, 0, 'MATA SUL', 'GLORIA DO GOITA', 'GLORIA DO GOITA', 'PE', -8.005000, -35.291000, '0'),
(584, 16, 0, 'MATA SUL', 'JOAQUIM NABUCO', 'JOAQUIM NABUCO', 'PE', -8.630000, -35.532001, '0'),
(585, 16, 0, 'MATA SUL', 'PRIMAVERA', 'PRIMAVERA', 'PE', 0.000000, 0.000000, '0'),
(586, 16, 0, 'MATA SUL', 'SANTO AMARO', 'RECIFE', 'PE', 0.000000, 0.000000, '0'),
(587, 16, 0, 'MATA SUL', 'RIBEIRAO', 'RIBEIRAO', 'PE', -8.507000, -35.384998, '0'),
(588, 16, 0, 'MATA SUL', 'ESCADA', 'ESCADA', 'PE', 0.000000, 0.000000, '0'),
(589, 16, 0, 'MATA SUL', 'FREXEIRAS', 'ESCADA', 'PE', 0.000000, 0.000000, '0'),
(590, 16, 0, 'MATA SUL', 'SAUE', 'TAMANDARE', 'PE', -8.768000, -35.318001, '0'),
(591, 16, 0, 'MATA NORTE', 'PAUDALHO', 'PAUDALHO', 'PE', -7.882000, -35.179001, '0'),
(592, 16, 0, 'MATA NORTE', 'BIZARRA', 'BOM JARDIM', 'PE', -7.756000, -35.484001, '0'),
(593, 16, 0, 'MATA NORTE', 'BUENOS AIRES', 'BUENOS AIRES', 'PE', 0.000000, 0.000000, '0'),
(594, 16, 0, 'MATA NORTE', 'CHA DE ALEGRIA', 'CHA DE ALEGRIA', 'PE', -7.997000, -35.215000, '0'),
(595, 16, 0, 'MATA NORTE', 'CONDADO', 'CONDADO', 'PE', 0.000000, 0.000000, '0'),
(596, 16, 0, 'MATA NORTE', 'CONDADO - ZENITE', 'CONDADO', 'PE', 0.000000, 0.000000, '0'),
(597, 16, 0, 'MATA NORTE', 'FERREIROS', 'FERREIROS', 'PE', -7.460000, -35.259998, '0'),
(598, 16, 0, 'MATA NORTE', 'ITAQUITINGA', 'ITAQUITINGA', 'PE', 0.000000, 0.000000, '0'),
(599, 16, 0, 'MATA NORTE', 'LAGOA DO CARRO', 'LAGOA DO CARRO', 'PE', -7.844000, -35.299999, '0'),
(600, 16, 0, 'MATA NORTE', 'LAGOA DE ITAENGA', 'LAGOA DE ITAENGA', 'PE', 0.000000, 0.000000, '0'),
(601, 16, 0, 'MATA NORTE', 'MACAPARANA', 'MACAPARANA', 'PE', -7.558000, -35.452000, '0'),
(602, 16, 0, 'MATA NORTE', 'MACHADOS', 'MACHADOS', 'PE', -7.688000, -35.507999, '0'),
(603, 16, 0, 'MATA NORTE', 'OROBO', 'OROBO', 'PE', -7.737000, -35.598999, '0'),
(604, 16, 0, 'MATA NORTE', 'SAO VICENTE FERRER', 'SAO VICENTE FERRER', 'PE', -7.590000, -35.490002, '0'),
(605, 16, 0, 'MATA NORTE', 'VICENCIA', 'VICENCIA', 'PE', -7.645000, -35.325001, '0'),
(606, 16, 0, 'MATA NORTE', 'VICENCIA - VERTENTINHA', 'VICENCIA', 'PE', 0.000000, 0.000000, '0'),
(607, 16, 0, 'MATA NORTE', 'MURUPE', 'VICENCIA', 'PE', -7.669000, -35.411999, '0'),
(608, 16, 0, 'MATA NORTE', 'ALIANCA', 'ALIANCA', 'PE', 0.000000, 0.000000, '0'),
(609, 16, 0, 'MATA NORTE', 'CARPINA - ETA Pindoba', 'CARPINA', 'PE', 0.000000, 0.000000, '0'),
(610, 16, 0, 'MATA NORTE', 'JOAO ALFREDO', 'JOAO ALFREDO', 'PE', -7.835000, -35.601002, '0'),
(611, 16, 0, 'MATA NORTE', 'TIMBAUBA', 'TIMBAUBA', 'PE', 0.000000, 0.000000, '0'),
(612, 16, 0, 'MATA NORTE', 'LIMOEIRO', 'LIMOEIRO', 'PE', -7.878000, -35.451000, '0'),
(613, 16, 0, 'MATA NORTE', 'NAZARE DA MATA', 'NAZARE DA MATA', 'PE', 0.000000, 0.000000, '0'),
(614, 16, 0, 'MATA NORTE', 'FEIRA NOVA', 'FEIRA NOVA', 'PE', 0.000000, 0.000000, '0'),
(615, 16, 0, 'MATA NORTE', 'BOM JARDIM - Buraco do Tatu', 'BOM JARDIM', 'PE', 0.000000, 0.000000, '0');
INSERT INTO `tb_localidades` (`id`, `loja`, `tipo`, `regional`, `nome`, `municipio`, `uf`, `latitude`, `longitude`, `ativo`) VALUES
(616, 16, 0, 'UNA', 'AGRESTINA ETA VELHA', 'AGRESTINA', 'PE', 0.000000, 0.000000, '0'),
(617, 16, 0, 'UNA', 'ALTINHO', 'ALTINHO', 'PE', -8.488000, -36.056999, '0'),
(618, 16, 0, 'UNA', 'BELEM DE MARIA', 'BELEM DE MARIA', 'PE', -8.620000, -35.841000, '0'),
(619, 16, 0, 'UNA', 'CUPIRA', 'CUPIRA', 'PE', -8.619000, -35.951000, '0'),
(620, 16, 0, 'UNA', 'JUREMA', 'JUREMA', 'PE', -8.713000, -36.139999, '0'),
(621, 16, 0, 'UNA', 'QUIPAPA', 'QUIPAPA', 'PE', 0.000000, 0.000000, '0'),
(622, 16, 0, 'UNA', 'CANHOTINHO', 'CANHOTINHO', 'PE', -8.881000, -36.195000, '0'),
(623, 16, 0, 'UNA', 'PALMEIRINA', 'PALMEIRINA', 'PE', -9.000000, -36.334000, '0'),
(624, 16, 0, 'UNA', 'PANELAS', 'PANELAS', 'PE', -8.662000, -36.005001, '0'),
(625, 16, 0, 'RUSSAS', 'GRAVATA', 'GRAVATA', 'PE', -8.213000, -35.570999, '0'),
(626, 16, 0, 'RUSSAS', 'BEZERROS', 'BEZERROS', 'PE', -8.251000, -35.747002, '0'),
(627, 16, 0, 'RUSSAS', 'ALTO BONITO', 'BONITO', 'PE', 0.000000, 0.000000, '0'),
(628, 16, 0, 'RUSSAS', 'BARRA DE GUABIRABA', 'BARRA DE GUABIRABA', 'PE', -8.423000, -35.654999, '0'),
(629, 16, 0, 'RUSSAS', 'BONITO', 'BONITO', 'PE', 0.000000, 0.000000, '0'),
(630, 16, 0, 'RUSSAS', 'CAMOCIM DE SAO FELIX', 'CAMOCIM DE SAO FELIX', 'PE', -8.360000, -35.766998, '0'),
(631, 16, 0, 'RUSSAS', 'CHA GRANDE', 'CHA GRANDE', 'PE', -8.245000, -35.459000, '0'),
(632, 16, 0, 'RUSSAS', 'POCO DE AREIA', 'SAO JOAQUIM DO MONTE', 'PE', 0.000000, 0.000000, '0'),
(633, 16, 0, 'RUSSAS', 'SAIRE', 'SAIRE', 'PE', -8.329000, -35.709999, '0'),
(634, 16, 0, 'RUSSAS', 'SAO JOAQUIM DO MONTE', 'SAO JOAQUIM DO MONTE', 'PE', -8.432000, -35.804001, '0'),
(635, 16, 0, 'RUSSAS', 'POMBOS', 'POMBOS', 'PE', -8.180000, -35.396000, '0'),
(636, 16, 0, 'IPOJUCA', 'BELO JARDIM BITURY', 'BELO JARDIM', 'PE', 0.000000, 0.000000, '0'),
(637, 16, 0, 'IPOJUCA', 'BELO JARDIM MANOEL LONGO', 'BELO JARDIM', 'PE', -8.313000, -36.428001, '0'),
(638, 16, 0, 'IPOJUCA', 'CIMBRES - IPANEMINHA', 'BELO JARDIM', 'PE', -8.368000, -36.856998, '0'),
(639, 16, 0, 'IPOJUCA', 'SANHARO', 'SANHARO', 'PE', -8.356000, -36.557999, '0'),
(640, 16, 0, 'IPOJUCA', 'TACAIMBO', 'TACAIMBO', 'PE', -8.316000, -36.292000, '0'),
(641, 16, 0, 'IPOJUCA', 'LAJEDO - ETA Sao Jacques', 'LAJEDO', 'PE', -8.791000, -36.203999, '0'),
(642, 16, 0, 'IPOJUCA', 'PESQUEIRA EE - Eta Rosas', 'PESQUEIRA', 'PE', -8.365000, -36.696999, '0'),
(643, 16, 0, 'IPOJUCA', 'PESQUEIRA - ETA AFETOS 1 E 2', 'PESQUEIRA', 'PE', -8.351000, -36.692001, '0'),
(644, 16, 0, 'IPOJUCA', 'POCAO', 'POCAO', 'PE', -8.185000, -36.708000, '0'),
(645, 16, 0, 'IPOJUCA', 'SAO CAETANO', 'SAO CAITANO', 'PE', -8.336000, -36.125000, '0'),
(646, 16, 0, 'IPOJUCA', 'CALCADO', 'CALCADO', 'PE', -8.737000, -36.337002, '0'),
(647, 16, 0, 'IPOJUCA', 'JUPI', 'JUPI', 'PE', -8.715000, -36.414001, '0'),
(648, 16, 0, 'IPOJUCA', 'SERRA DOS VENTOS', 'BELO JARDIM', 'PE', -8.227000, -36.359001, '0'),
(649, 16, 0, 'MERIDIONAL', 'AGUAS BELAS', 'AGUAS BELAS', 'PE', -9.103000, -37.105999, '0'),
(650, 16, 0, 'MERIDIONAL', 'BOM CONSELHO', 'BOM CONSELHO', 'PE', 0.000000, 0.000000, '0'),
(651, 16, 0, 'MERIDIONAL', 'BREJAO', 'BREJAO', 'PE', -9.024000, -36.566002, '0'),
(652, 16, 0, 'MERIDIONAL', 'CAPOEIRAS', 'CAPOEIRAS', 'PE', -8.738000, -36.627998, '0'),
(653, 16, 0, 'MERIDIONAL', 'CORRENTES', 'CORRENTES', 'PE', 0.000000, 0.000000, '0'),
(654, 16, 0, 'MERIDIONAL', 'LAGOA DO OURO', 'LAGOA DO OURO', 'PE', -9.122000, -36.459999, '0'),
(655, 16, 0, 'MERIDIONAL', 'SAO PEDRO', 'GARANHUNS', 'PE', 0.000000, 0.000000, '0'),
(656, 16, 0, 'MERIDIONAL', 'TEREZINHA', 'TEREZINHA', 'PE', 0.000000, 0.000000, '0'),
(657, 16, 0, 'MERIDIONAL', 'POCO COMPRIDO', 'CORRENTES', 'PE', -9.039000, -36.396999, '0'),
(658, 16, 0, 'MERIDIONAL', 'GARANHUNS', 'GARANHUNS', 'PE', -8.888000, -36.471001, '0'),
(659, 16, 0, 'ALTO CAPIBARIBE', 'BARRA DE FARIAS', 'BREJO DA MADRE DE DEUS', 'PE', -8.139000, -36.311001, '0'),
(660, 16, 0, 'ALTO CAPIBARIBE', 'BREJO DA MADRE DE DEUS - SAO JOSE', 'BREJO DA MADRE DE DEUS', 'PE', -8.152000, -36.369999, '0'),
(661, 16, 0, 'ALTO CAPIBARIBE', 'CUMARU', 'CUMARU', 'PE', -8.005000, -35.708000, '0'),
(662, 16, 0, 'ALTO CAPIBARIBE', 'SURUBIM - EE - 8', 'SURUBIM', 'PE', -7.853000, -35.762001, '0'),
(663, 16, 0, 'ALTO CAPIBARIBE', 'JUCAZINHO EE - 9', 'VERTENTES', 'PE', -7.862000, -35.861000, '0'),
(664, 16, 0, 'ALTO CAPIBARIBE', 'FAZENDA NOVA', 'BREJO DA MADRE DE DEUS', 'PE', -8.169000, -36.200001, '0'),
(665, 16, 0, 'ALTO CAPIBARIBE', 'JUCAZINHO BARRAGEM', 'CUMARU', 'PE', -7.965000, -35.737999, '0'),
(666, 16, 0, 'ALTO CAPIBARIBE', 'SANTA CRUZ DO CAPIBARIBE - MACHADOS', 'SANTA CRUZ DO CAPIBARIBE', 'PE', -7.965000, -36.198002, '0'),
(667, 16, 0, 'ALTO CAPIBARIBE', 'PAO DE ACUCAR', 'BREJO DA MADRE DE DEUS', 'PE', 0.000000, 0.000000, '0'),
(668, 16, 0, 'ALTO CAPIBARIBE', 'MATEUS VIEIRA - TAQUARITIGA', 'TAQUARITIGA', 'PE', 0.000000, 0.000000, '0'),
(669, 16, 0, 'ALTO CAPIBARIBE', 'SANTA CRUZ DO CAPIBARIBE - POCO FUNDO 1', 'SANTA CRUZ DO CAPIBARIBE', 'PE', -7.957000, -36.216999, '0'),
(670, 16, 0, 'ALTO CAPIBARIBE', 'JATAUBA - POCO FUNDO 2', 'JATAUBA', 'PE', -7.958000, -36.348000, '0'),
(671, 16, 0, 'ALTO CAPIBARIBE', 'TORITAMA', 'TORITAMA', 'PE', -8.008000, -36.063000, '0'),
(672, 16, 0, 'A. CENTRAL', 'AGRESTINA ETA NOVA', 'AGRESTINA', 'PE', 0.000000, 0.000000, '0'),
(673, 16, 0, 'A. CENTRAL', 'TAQUARA EE', 'SAO JOAQUIM DO MONTE', 'PE', 0.000000, 0.000000, '0'),
(674, 16, 0, 'A. CENTRAL', 'RIACHO DAS ALMAS', 'RIACHO DAS ALMAS', 'PE', -8.138000, -35.859001, '0'),
(675, 16, 0, 'A. CENTRAL', 'SALGADO', 'CARUARU', 'PE', -8.274000, -35.952999, '0'),
(676, 16, 0, 'A. CENTRAL', 'CARUARU - PETROPOLIS', 'CARUARU', 'PE', -8.300000, -35.979000, '0'),
(677, 16, 0, 'A. CENTRAL', 'AMEIXAS', 'CUMARU', 'PE', -8.103000, -35.770000, '0'),
(678, 16, 0, 'A. CENTRAL', 'BARRA DO RIACHAO', 'SAO JOAQUIM DO MONTE', 'PE', 0.000000, 0.000000, '0'),
(679, 16, 0, 'MOXOTO', 'ARCOVERDE', 'ARCOVERDE', 'PE', -8.424000, -37.046001, '0'),
(680, 16, 0, 'MOXOTO', 'BUIQUE', 'BUIQUE', 'PE', -8.615000, -37.154999, '0'),
(681, 16, 0, 'MOXOTO', 'CUSTODIA', 'CUSTODIA', 'PE', 0.000000, 0.000000, '0'),
(682, 16, 0, 'MOXOTO', 'CRUZEIRO DO NORDESTE', 'SERTANIA', 'PE', -8.364000, -37.275002, '0'),
(683, 16, 0, 'MOXOTO', 'IBIMIRIM - POCOS', 'IBIMIRIM', 'PE', -8.540000, -37.701000, '0'),
(684, 16, 0, 'MOXOTO', 'SERTANIA - EE MOXOTO-POCOS', 'SERTANIA', 'PE', 0.000000, 0.000000, '0'),
(685, 16, 0, 'MOXOTO', 'VENTUROSA', 'VENTUROSA', 'PE', -8.577000, -36.868999, '0'),
(686, 16, 0, 'MOXOTO', 'BUIQUE - BREJO DE SAO JOSE', 'BUIQUE', 'PE', -8.545000, -37.214001, '0'),
(687, 16, 0, 'MOXOTO', 'PEDRA', 'PEDRA', 'PE', -8.499000, -36.941002, '0'),
(688, 16, 0, 'MOXOTO', 'SERTANIA - ETA', 'SERTANIA', 'PE', -8.080000, -37.264999, '0'),
(689, 16, 0, 'PAJEU', 'SERRA TALHADA', 'SERRA TALHADA', 'PE', 0.000000, 0.000000, '0'),
(690, 16, 0, 'PAJEU', 'FLORESTA', 'FLORESTA', 'PE', -8.608000, -38.570000, '0'),
(691, 16, 0, 'PAJEU', 'ITAPARICA', 'JATOBA', 'PE', -9.170000, -38.269001, '0'),
(692, 16, 0, 'PAJEU', 'ITACURUBA', 'ITACURUBA', 'PE', -8.726000, -38.688999, '0'),
(693, 16, 0, 'PAJEU', 'PETROLANDIA', 'PETROLANDIA', 'PE', -8.984000, -38.230000, '0'),
(694, 16, 0, 'PAJEU', 'TRIUNFO', 'TRIUNFO', 'PE', 0.000000, 0.000000, '0'),
(695, 16, 0, 'ALTO PAJEU', 'AFOGADOS DA INGAZEIRA', 'AFOGADOS DA INGAZEIRA', 'PE', -7.742000, -37.624001, '0'),
(696, 16, 0, 'ALTO PAJEU', 'BREJINHO', 'BREJINHO', 'PE', -7.345000, -37.289001, '0'),
(697, 16, 0, 'ALTO PAJEU', 'CARNAIBA', 'CARNAIBA', 'PE', 0.000000, 0.000000, '0'),
(698, 16, 0, 'ALTO PAJEU', 'JABITACA - EE', 'IGUARACI', 'PE', 0.000000, 0.000000, '0'),
(699, 16, 0, 'ALTO PAJEU', 'GIQUIRI - EE TABIRA', 'TABIRA', 'PE', -7.662000, -37.570999, '0'),
(700, 16, 0, 'ALTO PAJEU', 'CARNAIBA - POCOS CAROA E MANICOBA - EE', 'CARNAIBA', 'PE', 0.000000, 0.000000, '0'),
(701, 16, 0, 'ALTO PAJEU', 'ITAPETIM - ETA', 'ITAPETIM', 'PE', -7.375000, -37.188999, '0'),
(702, 16, 0, 'ALTO PAJEU', 'ITAPETIM - EE', 'ITAPETIM', 'PE', 0.000000, 0.000000, '0'),
(703, 16, 0, 'ALTO PAJEU', 'IGUARACI', 'IGUARACI', 'PE', 0.000000, 0.000000, '0'),
(704, 16, 0, 'ALTO PAJEU', 'JABITACA', 'IGUARACI', 'PE', -7.832000, -37.372002, '0'),
(705, 16, 0, 'ALTO PAJEU', 'QUIXABA', 'QUIXABA', 'PE', 0.000000, 0.000000, '0'),
(706, 16, 0, 'ALTO PAJEU', 'SANTA TEREZINHA', 'SANTA TEREZINHA', 'PE', -7.374000, -37.477001, '0'),
(707, 16, 0, 'ALTO PAJEU', 'SOLIDAO', 'SOLIDAO', 'PE', -7.599000, -37.652000, '0'),
(708, 16, 0, 'ALTO PAJEU', 'TUPARETAMA', 'TUPARETAMA', 'PE', -7.602000, -37.308998, '0'),
(709, 16, 0, 'ALTO PAJEU', 'SAO JOSE DO EGITO', 'SAO JOSE DO EGITO', 'PE', -7.485000, -37.283001, '0'),
(710, 16, 0, 'ALTO PAJEU', 'VILA DE FATIMA EE', 'FLORES', 'PE', 0.000000, 0.000000, '0'),
(711, 16, 0, 'ALTO PAJEU', 'SITIO DOS NUNES EE', 'FLORES', 'PE', 0.000000, 0.000000, '0'),
(712, 16, 0, 'SERTAO CENTRAL', 'CABROBO', 'CABROBO', 'PE', -8.509000, -39.312000, '0'),
(713, 16, 0, 'SERTAO CENTRAL', 'OROCO', 'OROCO', 'PE', -8.617000, -39.603001, '0'),
(714, 16, 0, 'SERTAO CENTRAL', 'SANTA MARIA DA BOA VISTA', 'SANTA MARIA DA BOA VISTA', 'PE', -8.809000, -39.825001, '0'),
(715, 16, 0, 'SERTAO CENTRAL', 'SALGUEIRO', 'SALGUEIRO', 'PE', 0.000000, 0.000000, '0'),
(716, 16, 0, 'SERTAO CENTRAL', 'CEDRO', 'CEDRO', 'PE', 0.000000, 0.000000, '0'),
(717, 16, 0, 'SERTAO CENTRAL', 'PARNAMIRIM', 'PARNAMIRIM', 'PE', 0.000000, 0.000000, '0'),
(718, 16, 0, 'SERTAO CENTRAL', 'SERRITA', 'SERRITA', 'PE', 0.000000, 0.000000, '0'),
(719, 16, 0, 'SERTAO CENTRAL', 'TERRA NOVA', 'TERRA NOVA', 'PE', 0.000000, 0.000000, '0'),
(720, 16, 0, 'SERTAO CENTRAL', 'UMAS', 'SALGUEIRO', 'PE', 0.000000, 0.000000, '0'),
(721, 16, 0, 'SERTAO CENTRAL', 'BELEM DE SAO FRANCISCO', 'BELEM DO SAO FRANCISCO', 'PE', -8.755000, -38.966999, '0'),
(722, 16, 0, 'ARARIPE', 'OURICURI  - VOLUNTARIOS DA PATRIA', 'OURICURI', 'PE', 0.000000, 0.000000, '0'),
(723, 16, 0, 'ARARIPE', 'BODOCO - COMPACTA', 'BODOCO', 'PE', 0.000000, 0.000000, '0'),
(724, 16, 0, 'ARARIPE', 'GERGELIM', 'ARARIPINA', 'PE', 0.000000, 0.000000, '0'),
(725, 16, 0, 'ARARIPE', 'IPUBI', 'IPUBI', 'PE', 0.000000, 0.000000, '0'),
(726, 16, 0, 'ARARIPE', 'SANTA CRUZ DE MALTA', 'SANTA CRUZ', 'PE', 0.000000, 0.000000, '0'),
(727, 16, 0, 'ARARIPE', 'LAGOA DO BARRO', 'ARARIPINA', 'PE', 0.000000, 0.000000, '0'),
(728, 16, 0, 'ARARIPE', 'TRINDADE', 'TRINDADE', 'PE', 0.000000, 0.000000, '0'),
(729, 16, 0, 'ARARIPE', 'BODOCO - ETA Luiz Gonzaga', 'BODOCO', 'PE', 0.000000, 0.000000, '0'),
(730, 16, 0, 'ARARIPE', 'ARARIPINA', 'ARARIPINA', 'PE', 0.000000, 0.000000, '0'),
(731, 16, 0, 'ARARIPE', 'SERROLANDIA', 'IPUBI', 'PE', 0.000000, 0.000000, '0'),
(732, 16, 0, 'SAO FCO.', 'PETROLINA ETA I CENTRO', 'PETROLINA', 'PE', -9.389000, -40.500999, '0'),
(733, 16, 0, 'SAO FCO.', 'PETROLINA ETA II INDUSTRIAL', 'PETROLINA', 'PE', -9.401000, -40.523998, '0'),
(734, 16, 0, 'SAO FCO.', 'LAGOA GRANDE', 'LAGOA GRANDE', 'PE', -9.007000, -40.272999, '0'),
(735, 16, 0, 'SAO FCO.', 'PETROLINA - VITORIA', 'PETROLINA', 'PE', -9.411000, -40.536999, '0'),
(736, 13, 0, '', 'ITAPORANGA ETA NOVA', 'ITAPORANGA', 'PB', -7.304000, -38.152000, '0'),
(737, 11, 0, '', 'PARQUE INDUSTRIAL P63', 'PARNAMIRIM', 'RN', -5.882000, -35.233002, '0'),
(738, 11, 0, '', 'PARNAMIRIM P28', 'PARNAMIRIM', 'RN', -5.933000, -35.286999, '0'),
(739, 11, 0, '', 'PARNAMIRIM P09', 'PARNAMIRIM', 'RN', -5.920000, -35.269001, '0'),
(740, 29, 0, '', 'GERDAU - DIVINOPOLIS', 'DIVINOPOLIS', 'MG', -20.153999, -44.875999, '0'),
(741, 13, 0, '', 'CAJAZEIRAS - ETA MUTIRAO (CENTRO)', 'CAJAZEIRAS', 'PB', -6.875000, -38.571999, '0'),
(742, 11, 0, '', 'OURO BRANCO - POCO', 'OURO BRANCO', 'RN', -6.698000, -36.942001, '0'),
(743, 11, 0, '', 'PARNAMIRIM VALE DO SOL P13', 'PARNAMIRIM', 'RN', -5.931000, -35.273998, '0'),
(744, 11, 0, '', 'MOSSORO P1', 'MOSSORO', 'RN', -5.191000, -37.346001, '0'),
(745, 17, 0, '', 'NOVA TIMBOTEUA - BOMBEAMENTO', 'NOVA TIMBOTEUA', 'PA', -1.201000, -47.386002, '0'),
(746, 28, 0, '', 'RECIFE - GUABIRABA', 'RECIFE', 'PE', -7.962000, -34.923000, '0'),
(747, 24, 0, '', 'SANTA BARBARA DOESTE', 'SANTA BARBARA DOESTE', 'SP', -22.764000, -47.376999, '0'),
(748, 11, 0, '', 'CERRO CORA ETA CAPTACAO', 'CERRO CORA', 'RN', -6.010000, -36.318001, '0'),
(749, 11, 0, '', 'PARNAMIRIM - BOA ESPERANCA P04 ', 'PARNAMIRIM', 'RN', -5.923000, -35.258999, '0'),
(750, 11, 0, '', 'NOVA PARNAMIRIM P12', 'PARNAMIRIM', 'RN', -5.898000, -35.194000, '0'),
(751, 11, 0, '', 'VILA DE PONTA NEGRA P15', 'NATAL', 'RN', -5.888000, -35.187000, '0'),
(752, 14, 0, '', 'RIO LARGO - ETA JARBAS OITICICA', 'RIO LARGO', 'AL', -9.474000, -35.803001, '0'),
(753, 30, 0, '', 'HEINEKEN PACATUBA', 'PACATUBA', 'CE', -3.910000, -38.605000, '0'),
(754, 3, 0, '', 'AMBEV - AQUIRAZ', 'AQUIRAZ', 'CE', -4.031000, -38.511002, '0'),
(755, 26, 0, '', 'SOLAR - MARACANAU', 'MARACANAU', 'CE', -3.854000, -38.597000, '0'),
(756, 24, 0, '', 'PACATUBA', 'PACATUBA', 'CE', -3.902000, -38.558998, '0'),
(757, 12, 0, '', 'ETA GAVIAO', 'PACATUBA', 'CE', -3.902000, -38.557999, '0'),
(758, 11, 0, '', 'PARNAMIRIM P06', 'PARNAMIRIM', 'RN', -5.899000, -35.259998, '0'),
(759, 11, 0, '', 'PARNAMIRIM P61', 'PARNAMIRIM', 'RN', -5.900000, -35.259998, '0'),
(760, 31, 0, '', 'SANEAR RONDONOPOLIS', 'RONDONOPOLIS', 'MT', -16.478001, -54.615002, '0'),
(761, 10, 0, '', 'CANTA - FELIX PINTO', 'CANTA', 'RR', 2.113000, -60.617001, '0'),
(762, 11, 0, '', 'TIMBAUBA DOS BATISTAS', 'TIMBAUBA DOS BATISTAS', 'RN', -6.462000, -37.272999, '0'),
(763, 17, 0, '', 'MOSQUEIRO - CARANANDUBA', 'BELEM', 'PA', -1.098000, -48.403999, '0'),
(764, 17, 0, '', 'MOSQUEIRO - VILA 5 RUA', 'BELEM', 'PA', -1.157000, -48.466999, '0'),
(765, 17, 0, '', 'MOSQUEIRO - PRAIA DO BISPO', 'BELEM', 'PA', -1.158000, -48.470001, '0'),
(766, 17, 0, '', 'SANTA MARIA DO PARA - ESCRITORIO', 'SANTA MARIA DO PARA', 'PA', -1.346000, -47.576000, '0'),
(767, 17, 0, '', 'SANTA MARIA DO PARA - POCO AVENIDA SANTA MARIA', 'SANTA MARIA DO PARA', 'PA', -1.351000, -47.580002, '0'),
(768, 17, 0, '', 'MOSQUEIRO - MURUBIRA', 'BELEM', 'PA', -1.124000, -48.443001, '0'),
(769, 11, 0, '', 'MOEMA TINOCO P21', 'NATAL', 'RN', -5.744000, -35.223999, '0'),
(770, 11, 0, '', 'JARDIM DO SERIDO RESERVATORIO', 'JARDIM DO SERIDO', 'RN', -6.590000, -36.765999, '0'),
(771, 17, 0, '', 'NOVA ITAITUBA', 'ITAITUBA', 'PA', -4.276000, -55.985001, '0'),
(772, 17, 0, '', 'GUAXINI - SALINOPOLIS', 'SALINOPOLIS', 'PA', -0.635871, -47.338001, '0'),
(773, 17, 0, '', 'DOM BOSCO - SALINOPOLIS', 'SALINOPOLIS', 'PA', -0.626358, -47.348000, '0'),
(774, 17, 0, '', 'SALINOPOLIS - POCO FAROL', 'SALINOPOLIS', 'PA', -0.615963, -47.355999, '0'),
(775, 11, 0, '', 'ZANGARELHAS - JARDIM DO SERIDO', 'JARDIM DO SERIDO', 'RN', -6.595000, -36.754002, '0'),
(776, 13, 0, '', 'AGUIAR', 'AGUIAR', 'PB', -7.099000, -38.171001, '0'),
(777, 26, 0, '', 'MACEIO', 'MACEIO', 'AL', -9.554000, -35.742001, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_loja`
--

CREATE TABLE `tb_loja` (
  `id` int(11) NOT NULL,
  `displayName` varchar(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `proprietario` int(11) NOT NULL,
  `grupoLoja` int(11) NOT NULL,
  `seguimento` int(11) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  `ativo` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_loja`
--

INSERT INTO `tb_loja` (`id`, `displayName`, `name`, `proprietario`, `grupoLoja`, `seguimento`, `data`, `ativo`) VALUES
(1, 'AGESPISA', 'AGESPISA', 1, 2, 1, '2017-08-18', '0'),
(2, 'ALUBAR', 'ALUBAR', 1, 2, 2, '2017-08-18', '0'),
(3, 'AMBEV', 'AMBEV', 1, 2, 3, '2017-08-18', '0'),
(4, 'APERAM', 'APERAM', 1, 2, 2, '2017-08-18', '0'),
(5, 'BATERIAS MOURA', 'BATERIAS MOURA', 1, 2, 3, '2017-08-18', '0'),
(6, 'BIOSEV - GIASA', 'BIOSEV - GIASA', 1, 2, 4, '2017-08-18', '0'),
(7, 'CAB AGRESTE', 'CAB AGRESTE', 1, 2, 1, '2017-08-18', '0'),
(8, 'CAB CUIABA', 'CAB CUIABA', 1, 2, 1, '2017-08-18', '0'),
(9, 'CAEMA', 'CAEMA', 1, 2, 1, '2017-08-18', '0'),
(10, 'CAER', 'CAER', 1, 2, 1, '2017-08-18', '0'),
(11, 'CAERN', 'CAERN', 1, 2, 1, '2017-08-18', '0'),
(12, 'CAGECE', 'CAGECE', 1, 2, 1, '2017-08-18', '0'),
(13, 'CAGEPA', 'CAGEPA', 1, 2, 1, '2017-08-18', '0'),
(14, 'CASAL', 'CASAL', 1, 2, 1, '2017-08-18', '0'),
(15, 'CESAN', 'CESAN', 1, 2, 1, '2017-08-18', '0'),
(16, 'COMPESA', 'COMPESA', 1, 2, 1, '2017-08-18', '0'),
(17, 'COSANPA', 'COSANPA', 1, 2, 1, '2017-08-18', '0'),
(18, 'DAE-VARZEA GRANDE', 'DAE-VARZEA GRANDE', 1, 2, 1, '2017-08-18', '0'),
(19, 'DEPASA', 'DEPASA', 1, 2, 1, '2017-08-18', '0'),
(20, 'DESO', 'DESO', 1, 2, 1, '2017-08-18', '0'),
(21, 'NIAGRO NICHIREI-PE', 'NIAGRO NICHIREI-PE', 1, 2, 2, '2017-08-18', '0'),
(22, 'SAAE - BACABAL', 'SAAE - BACABAL', 1, 2, 1, '2017-08-18', '0'),
(23, 'SAAE - CAXIAS', 'SAAE - CAXIAS', 1, 2, 1, '2017-08-18', '0'),
(24, 'SABARA', 'SABARA', 1, 1, 2, '2017-08-18', '0'),
(25, 'SERRA NEGRA DO NORTE', 'SERRA NEGRA DO NORTE', 1, 2, 1, '2017-08-18', '0'),
(26, 'SOLAR', 'SOLAR', 1, 2, 3, '2017-08-18', '0'),
(27, 'UFRN', 'UFRN', 1, 2, 5, '2017-08-18', '0'),
(28, 'BRASIL KIRIN', 'BRASIL KIRIN', 1, 2, 2, '2017-08-18', '0'),
(29, 'GERDAU', 'GERDAU', 1, 2, 2, '2017-08-18', '0'),
(30, 'HEINEKEN', 'HEINEKEN', 1, 2, 3, '2017-08-18', '0'),
(31, 'SANEAR RONDONOPOLIS', 'SANEAR RONDONOPOLIS', 1, 2, 1, '2017-08-18', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mod`
--

CREATE TABLE `tb_mod` (
  `id` int(11) NOT NULL,
  `data_inicial` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_final` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `tb_tecnicos_id` int(11) NOT NULL,
  `tb_oat_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_oat`
--

CREATE TABLE `tb_oat` (
  `id` int(11) NOT NULL,
  `nickuser` varchar(30) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `localidade` int(11) NOT NULL,
  `servico` varchar(6) NOT NULL,
  `sistema` varchar(12) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  `dtUltimoAt` date NOT NULL DEFAULT '0000-00-00',
  `data_sol` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `filial` int(2) DEFAULT NULL,
  `os` int(11) DEFAULT NULL,
  `data_os` datetime DEFAULT '0000-00-00 00:00:00',
  `data_fech` datetime DEFAULT '0000-00-00 00:00:00',
  `data_term` datetime DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_oat`
--

INSERT INTO `tb_oat` (`id`, `nickuser`, `cliente`, `localidade`, `servico`, `sistema`, `data`, `dtUltimoAt`, `data_sol`, `filial`, `os`, `data_os`, `data_fech`, `data_term`, `status`, `ativo`) VALUES
(1, 'RAFAELCARLOS', 'CASAL', 406, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-04 12:35:11', 1, 863, '2016-11-04 00:00:00', '2016-11-08 17:59:48', '2016-11-10 00:27:27', '3', '0'),
(2, 'Francinei', 'COSANPA', 423, 'CR0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 13:03:36', 4, 247, '2016-11-04 00:00:00', '2016-11-04 19:28:15', '2016-11-07 18:27:02', '3', '0'),
(3, 'gladson.marinho', 'CAERN', 157, 'VT0001', 'SBBDO-BMB', '0000-00-00', '0000-00-00', '2016-11-04 11:49:33', 1, 864, '2016-11-04 00:00:00', '2016-11-15 21:11:53', '2016-11-16 19:35:16', '3', '0'),
(4, 'Francinei', 'COSANPA', 496, 'CR0001', 'SBPAC-SPC', '0000-00-00', '0000-00-00', '2016-11-01 17:06:49', 1, 865, '2016-11-04 00:00:00', '2016-11-04 19:32:25', '2016-11-10 00:41:12', '3', '0'),
(8, 'reginaldo.barbosa', 'CAERN', 111, 'OP0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 18:59:18', 1, 665, '2016-11-01 00:00:00', '2016-11-17 00:50:06', '2016-11-17 11:34:49', '3', '0'),
(6, 'reginaldo.barbosa', 'CAERN', 127, 'NV0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 18:54:19', 1, 650, '2016-11-01 00:00:00', '2016-11-17 11:49:59', '2016-11-17 11:59:19', '3', '0'),
(7, 'francisco.barbosa', 'CAGEPA', 265, 'VT0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 18:55:48', 1, 646, '2016-11-01 00:00:00', '2016-11-16 14:06:41', '2016-11-17 12:05:56', '3', '0'),
(9, 'reginaldo.barbosa', 'CAERN', 183, 'OP0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:00:16', 1, 702, '2016-11-01 00:00:00', '2016-11-17 01:00:40', '2016-11-17 11:51:59', '3', '0'),
(10, 'reginaldo.barbosa', 'CAERN', 181, 'OP0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:00:53', 1, 703, '2016-11-01 00:00:00', '2016-11-17 11:49:17', '2016-11-17 12:32:41', '3', '0'),
(11, 'reginaldo.barbosa', 'CAERN', 111, 'OP0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:01:22', 1, 704, '2016-11-01 00:00:00', '2016-11-17 11:50:51', '2016-11-17 12:34:04', '3', '0'),
(12, 'reginaldo.barbosa', 'CAERN', 127, 'OP0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:01:47', 1, 705, '2016-11-01 00:00:00', '2016-11-17 11:51:02', '2016-11-17 12:36:57', '3', '0'),
(13, 'francisco.barbosa', 'CAGEPA', 325, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:02:34', 1, 714, '2016-11-01 00:00:00', '2016-11-17 13:36:05', '2016-11-17 13:36:45', '3', '0'),
(14, 'gladson.marinho', 'CAERN', 102, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:03:00', 1, 720, '2016-11-01 00:00:00', '2016-11-18 13:36:00', '2016-11-18 13:36:56', '3', '0'),
(15, 'reginaldo.barbosa', 'CAERN', 183, 'VT0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:03:28', 1, 741, '2016-11-01 00:00:00', '2016-11-16 22:25:17', '2016-11-17 12:37:46', '3', '0'),
(16, 'Francinei', 'COSANPA', 423, 'OP0002', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:14:27', 4, 208, '2016-11-01 00:00:00', '2016-11-04 19:41:27', '2016-11-10 01:55:31', '3', '0'),
(17, 'ricardo.lopes', 'CAEMA', 29, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:14:58', 4, 213, '2016-11-01 00:00:00', '2016-11-07 18:33:41', '2016-11-15 10:14:21', '3', '0'),
(18, 'Francinei', 'COSANPA', 462, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:15:36', 4, 214, '2016-11-01 00:00:00', '2016-11-04 19:18:52', '2016-11-10 01:57:36', '3', '0'),
(19, 'gladson.marinho', 'CAERN', 202, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:15:56', 1, 781, '2016-11-01 00:00:00', '2016-11-09 21:32:22', '2016-11-15 15:39:29', '3', '0'),
(20, 'bruno.alves', 'CAGEPA', 295, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:16:21', 1, 783, '2016-11-01 00:00:00', '2016-11-18 13:36:35', '2016-11-18 13:37:03', '3', '0'),
(21, 'bruno.alves', 'CAGEPA', 267, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:16:50', 1, 784, '2016-11-01 00:00:00', '2016-11-07 11:06:23', '2016-11-10 00:50:18', '3', '0'),
(22, 'reginaldo.barbosa', 'CAERN', 166, 'VT0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:17:21', 1, 790, '2016-11-01 00:00:00', '2016-11-16 22:29:18', '2016-11-17 12:43:20', '3', '0'),
(23, 'reginaldo.barbosa', 'CAERN', 167, 'VT0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:17:42', 1, 791, '2016-11-01 00:00:00', '2016-11-16 22:41:43', '2016-11-17 12:48:10', '3', '0'),
(24, 'gladson.marinho', 'CAERN', 98, 'VT0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:18:56', 1, 771, '2016-11-01 00:00:00', '2016-11-09 21:32:52', '2016-11-15 15:36:10', '3', '0'),
(25, 'reginaldo.barbosa', 'CAERN', 168, 'VT0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:24:10', 1, 792, '2016-11-01 00:00:00', '2016-11-16 22:58:47', '2016-11-17 12:54:12', '3', '0'),
(26, 'reginaldo.barbosa', 'CAERN', 169, 'VT0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:24:33', 1, 793, '2016-11-01 00:00:00', '2016-11-16 23:45:21', '2016-11-17 12:57:30', '3', '0'),
(27, 'reginaldo.barbosa', 'CAERN', 104, 'VT0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:31:44', 1, 794, '2016-11-01 00:00:00', '2016-11-17 00:01:26', '2016-11-17 13:02:21', '3', '0'),
(30, 'gladson.marinho', 'CAERN', 101, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:33:31', 1, 795, '2016-11-01 00:00:00', '2016-11-09 21:33:27', '2016-11-15 15:21:35', '3', '0'),
(29, 'gladson.marinho', 'CAERN', 100, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:32:43', 1, 796, '2016-11-01 00:00:00', '2016-11-09 21:34:16', '2016-11-15 15:20:47', '3', '0'),
(31, 'bruno.alves', 'CAGEPA', 366, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:33:58', 1, 797, '2016-11-01 00:00:00', '2016-11-07 11:25:59', '2016-11-10 00:58:16', '3', '0'),
(32, 'bruno.alves', 'CAGEPA', 282, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:34:26', 1, 798, '2016-11-01 00:00:00', '2016-11-07 11:30:18', '2016-11-10 01:02:08', '3', '0'),
(33, 'ricardo.lopes', 'CAEMA', 28, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:34:47', 4, 217, '2016-11-01 00:00:00', '2016-11-07 15:49:36', '2016-11-15 10:24:59', '3', '0'),
(34, 'bruno.alves', 'CAGEPA', 276, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:35:11', 1, 801, '2016-11-01 00:00:00', '2016-11-07 11:34:50', '2016-11-10 01:09:11', '3', '0'),
(35, 'ricardo.lopes', 'CAEMA', 13, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:35:30', 4, 218, '2016-11-01 00:00:00', '2016-11-07 16:21:09', '2016-11-15 10:48:22', '3', '0'),
(36, 'francisco.barbosa', 'CAERN', 173, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:36:05', 1, 805, '2016-11-01 00:00:00', '2016-11-16 14:06:07', '2016-11-17 12:14:59', '3', '0'),
(37, 'ricardo.lopes', 'AGESPISA', 1, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:36:20', 4, 221, '2016-11-01 00:00:00', '2016-11-07 17:49:37', '2016-11-15 11:31:22', '3', '0'),
(38, 'gladson.marinho', 'CAERN', 127, 'OP0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:48:12', 1, 806, '2016-11-01 00:00:00', '2016-11-10 22:30:34', '2016-11-15 15:19:55', '3', '0'),
(39, 'gladson.marinho', 'CAERN', 126, 'VT0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:48:37', 1, 807, '2016-11-01 00:00:00', '2016-11-10 22:34:15', '2016-11-15 15:18:40', '3', '0'),
(40, 'bruno.alves', 'CAGEPA', 247, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:48:58', 1, 808, '2016-11-01 00:00:00', '2016-11-07 11:39:20', '2016-11-10 01:17:05', '3', '0'),
(41, 'reginaldo.barbosa', 'CAERN', 200, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:49:26', 1, 810, '2016-11-01 00:00:00', '2016-11-16 22:09:10', '2016-11-17 12:16:43', '3', '0'),
(42, 'gladson.marinho', 'CAERN', 101, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:49:54', 1, 813, '2016-11-01 00:00:00', '2016-11-10 22:38:23', '2016-11-15 15:17:45', '3', '0'),
(43, 'gladson.marinho', 'CAERN', 156, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:50:17', 1, 814, '2016-11-01 00:00:00', '2016-11-10 22:43:27', '2016-11-15 15:09:37', '3', '0'),
(44, 'gladson.marinho', 'CAERN', 127, 'OP0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:50:42', 1, 817, '2016-11-01 00:00:00', '2016-11-10 22:46:19', '2016-11-15 15:06:47', '3', '0'),
(45, 'bruno.alves', 'CAGEPA', 281, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:51:06', 1, 818, '2016-11-01 00:00:00', '2016-11-07 11:47:24', '2016-11-10 01:27:14', '3', '0'),
(46, 'ricardo.lopes', 'AGESPISA', 3, 'PV0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-01 19:51:26', 4, 227, '2016-11-01 00:00:00', '2016-11-07 18:11:52', '2016-11-15 11:43:29', '3', '0'),
(47, 'gladson.marinho', 'CAERN', 111, 'PV0001', 'SBDSD-SDS', '0000-00-00', '0000-00-00', '2016-11-01 19:51:53', 1, 819, '2016-11-01 00:00:00', '2016-11-10 22:52:13', '2016-11-15 14:50:41', '3', '0'),
(48, 'Thonpson', 'BRASIL KIRIN', 536, 'CR0001', 'SBDPT-SPT', '0000-00-00', '0000-00-00', '2016-11-04 14:23:43', 1, 866, '2016-11-04 00:00:00', '2016-11-04 14:33:16', '2016-11-10 01:49:43', '3', '0'),
(49, 'Francinei', 'COSANPA', 409, 'OP0002', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-04 14:41:23', 4, 248, '2016-11-04 00:00:00', NULL, NULL, '1', '0'),
(50, 'Thonpson', 'AMBEV', 5, 'CR0001', 'SBDPT-SPT', '0000-00-00', '0000-00-00', '2016-11-04 14:42:23', 1, 867, '2016-11-04 00:00:00', '2016-11-16 14:31:06', '2016-11-16 16:28:13', '3', '0'),
(51, 'Francinei', 'COSANPA', 496, 'OP0002', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-04 14:56:20', 4, 249, '2016-11-04 00:00:00', '2016-11-04 19:51:02', '2016-11-10 02:02:01', '3', '0'),
(52, 'Francinei', 'COSANPA', 409, 'OP0002', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-04 15:38:55', 4, 250, '2016-11-04 00:00:00', '2016-11-04 19:54:08', '2016-11-10 02:06:09', '3', '0'),
(61, 'francisco.barbosa', 'DESO', 523, 'VT0001', 'SBDXC-SDX', '2016-11-04', '0000-00-00', '2016-11-07 11:11:11', 1, 879, '2016-11-07 11:20:37', '2016-11-16 14:46:45', '2016-11-17 12:17:50', '3', '0'),
(54, 'RAFAELCARLOS', 'SOLAR', 0, 'NV0001', 'SBDPT-SPT', '2016-11-03', '0000-00-00', '2016-11-07 09:41:43', 1, 880, '2016-11-07 14:56:35', '2016-11-08 18:08:44', '2016-11-10 01:47:49', '3', '0'),
(55, 'gladson.marinho', 'CAERN', 154, 'NV0001', 'SBBDO-BMB', '2016-11-03', '0000-00-00', '2016-11-06 11:39:25', 1, 881, '2016-11-07 17:42:38', '2016-11-10 23:20:40', '2016-11-15 14:45:00', '3', '0'),
(56, 'gladson.marinho', 'CAERN', 149, 'NV0001', 'SBDSD-SDS', '2016-11-03', '0000-00-00', '2016-11-09 11:42:31', 1, 894, '2016-11-10 03:36:58', '2016-11-10 23:23:27', '2016-11-15 14:41:34', '3', '0'),
(57, 'gladson.marinho', 'CAERN', 126, 'OP0001', 'SBDSD-SDS', '2016-11-04', '0000-00-00', '2016-11-06 11:39:51', 1, 882, '2016-11-07 17:51:33', '2016-11-15 21:03:55', '2016-11-17 13:06:25', '3', '0'),
(58, 'gladson.marinho', 'CAERN', 199, 'OP0001', 'SBDSD-SDS', '2016-11-04', '0000-00-00', '2016-11-06 11:40:05', 1, 883, '2016-11-07 17:52:55', '2016-11-15 21:49:35', '2016-11-17 13:18:30', '3', '0'),
(59, 'gladson.marinho', 'CAERN', 181, 'OP0001', 'SBBDO-BMB', '2016-11-04', '0000-00-00', '2016-11-06 11:49:30', 1, 884, '2016-11-07 17:54:14', '2016-11-19 14:38:30', NULL, '2', '0'),
(60, 'gladson.marinho', 'CAERN', 111, 'OP0001', 'SBDSD-SDS', '2016-11-04', '0000-00-00', '2016-11-06 11:49:41', 1, 885, '2016-11-07 17:55:23', '2016-11-15 21:53:34', '2016-11-17 11:39:42', '3', '0'),
(65, 'ricardo.lopes', 'CAEMA', 29, 'PV0001', 'SBGCL-SCL', '2016-10-05', '0000-00-00', '2016-11-07 14:52:03', 4, 256, '2016-11-10 16:36:32', '2016-11-17 11:40:47', NULL, '1', '0'),
(63, 'francisco.barbosa', 'DESO', 525, 'PV0001', 'SBDXC-SDX', '2015-11-02', '0000-00-00', '2016-11-07 13:14:15', 1, 877, '2016-11-09 11:53:04', '2016-11-16 14:39:50', '2016-11-17 12:18:54', '3', '0'),
(64, 'Francinei', 'COSANPA', 428, 'OP0002', 'SBGCL-SCL', '2016-11-07', '0000-00-00', '2016-11-07 13:23:14', 4, 259, '2016-11-10 16:45:38', NULL, NULL, '1', '0'),
(66, 'ricardo.lopes', 'CAEMA', 28, 'PV0001', 'SBGCL-SCL', '2016-10-07', '0000-00-00', '2016-11-07 14:54:58', 4, 257, '2016-11-10 16:43:04', '2016-11-17 11:40:56', NULL, '1', '0'),
(67, 'bruno.alves', 'CAGEPA', 361, 'CR0001', 'SBGCL-SCL', '2016-11-07', '0000-00-00', '2016-11-07 17:21:23', 1, 886, '2016-11-09 11:59:54', '2016-11-11 14:58:27', '2016-11-15 18:08:08', '3', '0'),
(68, 'ricardo.lopes', 'SAAE - CAXIAS', 530, 'PV0001', 'SBGCL-SCL', '2016-10-20', '0000-00-00', '2016-11-07 18:54:38', 4, 258, '2016-11-10 16:44:24', NULL, NULL, '1', '0'),
(69, 'Francinei', 'COSANPA', 423, 'OP0002', 'SBGCL-SCL', '2016-11-07', '0000-00-00', '2016-11-07 19:21:09', 4, 260, '2016-11-10 16:48:58', NULL, NULL, '1', '0'),
(70, 'RAFAELCARLOS', 'CASAL', 387, 'PV0001', 'SBGCL-SCL', '2016-11-08', '0000-00-00', '2016-11-08 09:45:52', 1, 887, '2016-11-09 12:06:05', '2016-11-09 13:15:32', '2016-11-10 01:36:20', '3', '0'),
(71, 'bruno.alves', 'CAGEPA', 336, 'CR0001', 'SBGCL-SCL', '2016-11-08', '0000-00-00', '2016-11-08 14:53:05', 1, 889, '2016-11-09 12:23:05', '2016-11-11 15:02:40', '2016-11-15 17:56:44', '3', '0'),
(72, 'RAFAELCARLOS', 'SOLAR', 537, 'VT0001', 'SBDPT-SPT', '2016-10-31', '0000-00-00', '2016-11-08 18:10:30', 1, 903, '2016-11-10 16:28:24', '2016-11-18 22:37:41', NULL, '2', '0'),
(76, 'gladson.marinho', 'CAERN', 126, 'OP0001', 'SBDSD-SDS', '2016-11-08', '0000-00-00', '2016-11-08 22:18:14', 1, 890, '2016-11-09 12:59:28', '2016-11-15 21:19:13', '2016-11-17 13:09:29', '3', '0'),
(77, 'gladson.marinho', 'CAERN', 181, 'OP0001', 'SBDSD-SDS', '2016-11-08', '0000-00-00', '2016-11-08 22:18:51', 1, 891, '2016-11-09 13:00:45', '2016-11-15 22:00:11', '2016-11-17 13:32:44', '3', '0'),
(79, 'gladson.marinho', 'CAERN', 111, 'OP0001', 'SBDSD-SDS', '2016-11-08', '0000-00-00', '2016-11-08 22:22:48', 1, 892, '2016-11-09 13:02:43', '2016-11-19 14:40:32', NULL, '2', '0'),
(80, 'gladson.marinho', 'CAERN', 199, 'OP0001', 'SBDSD-SDS', '2016-11-08', '0000-00-00', '2016-11-08 22:23:23', 1, 893, '2016-11-09 13:08:56', '2016-11-15 22:10:00', '2016-11-17 13:23:08', '3', '0'),
(81, 'gladson.marinho', 'CAERN', 135, 'CR0001', 'SBGCL-SCL', '2016-11-08', '0000-00-00', '2016-11-08 22:24:41', 1, 888, '2016-11-09 12:34:53', '2016-11-10 23:27:18', '2016-11-15 14:36:35', '3', '0'),
(82, 'nahim.pantoja', 'COSANPA', 439, 'OP0002', 'SBGCL-SCL', '2016-11-06', '0000-00-00', '2016-11-09 14:32:53', 4, 261, '2016-11-10 16:50:13', '2016-11-19 15:10:58', NULL, '2', '0'),
(83, 'nahim.pantoja', 'COSANPA', 439, 'OP0002', 'SBGCL-SCL', '2016-11-06', '0000-00-00', '2016-11-09 14:33:30', 4, 262, '2016-11-10 16:51:10', '2016-11-18 20:14:16', NULL, '2', '0'),
(84, 'nahim.pantoja', 'COSANPA', 462, 'OP0002', 'SBGCL-SCL', '2016-11-05', '0000-00-00', '2016-11-09 14:38:37', 4, 263, '2016-11-10 16:53:02', '2016-11-19 15:42:42', NULL, '2', '0'),
(85, 'nahim.pantoja', 'COSANPA', 463, 'OP0002', 'SBGCL-SCL', '2016-11-05', '0000-00-00', '2016-11-09 14:48:38', 4, 264, '2016-11-10 16:53:56', '2016-11-19 15:50:36', NULL, '2', '0'),
(86, 'gladson.marinho', 'CAERN', 184, 'CR0001', 'SBGCL-SCL', '2016-11-09', '0000-00-00', '2016-11-09 21:31:54', 1, 898, '2016-11-10 03:44:35', '2016-11-10 23:31:54', '2016-11-15 14:30:25', '3', '0'),
(87, 'heitor.brito', 'CAGEPA', 258, 'CR0001', 'SBGCL-SCL', '2016-11-08', '0000-00-00', '2016-11-10 03:15:14', 1, 899, '2016-11-10 11:36:36', '2016-11-16 05:52:46', '2016-11-17 13:33:47', '3', '0'),
(88, 'heitor.brito', 'CAGEPA', 371, 'CR0001', 'SBGCL-SCL', '2016-11-08', '0000-00-00', '2016-11-10 03:16:09', 1, 900, '2016-11-10 11:37:38', '2016-11-16 06:13:13', '2016-11-17 13:29:33', '3', '0'),
(89, 'heitor.brito', 'CAGEPA', 344, 'CR0001', 'SBGCL-SCL', '2016-11-08', '0000-00-00', '2016-11-10 03:16:54', 1, 901, '2016-11-10 11:39:32', '2016-11-16 06:19:29', '2016-11-17 13:25:46', '3', '0'),
(90, 'heitor.brito', 'CAGEPA', 354, 'CR0001', 'SBGCL-SCL', '2016-11-08', '0000-00-00', '2016-11-10 03:18:01', 1, 902, '2016-11-10 11:41:44', '2016-11-16 06:05:16', '2016-11-17 13:20:06', '3', '0'),
(91, 'heitor.brito', 'CAERN', 73, 'CR0001', 'SBGCL-SCL', '2016-11-08', '0000-00-00', '2016-11-10 03:18:47', 1, 897, '2016-11-10 03:42:12', '2016-11-16 05:30:47', '2016-11-17 13:12:16', '3', '0'),
(92, 'heitor.brito', 'CAERN', 117, 'NV0001', 'SBGCL-SCL', '2016-11-09', '0000-00-00', '2016-11-10 03:20:38', 1, 895, '2016-11-10 03:39:15', '2016-11-16 06:31:57', '2016-11-17 13:07:53', '3', '0'),
(93, 'heitor.brito', 'CAERN', 119, 'NV0001', 'SBGCL-SCL', '2016-11-09', '0000-00-00', '2016-11-10 03:21:12', 1, 896, '2016-11-10 03:40:43', '2016-11-16 06:36:21', '2016-11-17 13:04:47', '3', '0'),
(94, 'Francinei', 'COSANPA', 437, 'CR0001', 'SBDPT-SPT', '2016-11-10', '0000-00-00', '2016-11-10 14:57:08', 4, 265, '2016-11-10 16:55:20', NULL, NULL, '1', '0'),
(96, 'heitor.brito', 'CAERN', 538, 'CR0001', 'SBDSD-SDS', '2016-11-08', '0000-00-00', '2016-11-10 17:11:07', 1, 904, '2016-11-10 17:41:49', '2016-11-16 05:46:13', '2016-11-17 13:01:49', '3', '0'),
(97, 'gladson.marinho', 'CAERN', 122, 'CR0001', 'SBGCL-SCL', '2016-11-10', '0000-00-00', '2016-11-10 23:33:04', 1, 905, '2016-11-11 13:36:38', '2016-11-15 20:54:25', '2016-11-17 12:55:35', '3', '0'),
(98, 'gladson.marinho', 'CAGEPA', 355, 'NV0001', 'SBDSD-SDS', '2016-11-10', '0000-00-00', '2016-11-10 23:33:49', 1, 907, '2016-11-15 12:40:26', '2016-11-19 14:53:33', NULL, '2', '0'),
(99, 'Francinei', 'COSANPA', 504, 'OP0002', 'SBGCL-SCL', '2016-11-10', '0000-00-00', '2016-11-11 02:49:04', 4, 267, '2016-11-15 12:49:57', NULL, NULL, '1', '0'),
(100, 'heitor.brito', 'CAERN', 133, 'CR0001', 'SBGCL-SCL', '2016-11-11', '0000-00-00', '2016-11-11 13:26:51', 19, 906, '2016-11-11 13:38:02', '2016-11-16 06:45:57', '2016-11-17 12:51:07', '3', '0'),
(101, 'Thonpson', 'DESO', 525, 'CR0001', 'SBDXC-SDX', '0000-00-00', '0000-00-00', '2016-11-13 01:21:31', 1, 908, '2016-11-15 12:42:21', '2016-11-16 14:41:00', '2016-11-16 16:41:47', '3', '0'),
(102, 'heitor.brito', 'CAERN', 115, 'CR0001', 'SBGCL-SCL', '2016-11-14', '0000-00-00', '2016-11-14 15:54:50', 1, 910, '2016-11-15 12:46:36', '2016-11-19 15:56:10', NULL, '2', '0'),
(103, 'Thonpson', 'DESO', 526, 'PV0001', 'SBDXC-SDX', '2016-11-13', '0000-00-00', '2016-11-15 02:39:24', 1, 909, '2016-11-15 12:43:29', '2016-11-16 14:44:06', '2016-11-16 16:51:49', '3', '0'),
(104, 'gladson.marinho', 'CAERN', 156, 'CR0001', 'SBGCL-SCL', '0000-00-00', '0000-00-00', '2016-11-15 15:14:49', 1, 869, '2016-11-15 15:15:38', '2016-11-15 21:00:09', '2016-11-17 12:46:59', '3', '0'),
(105, 'gladson.marinho', 'CAERN', 183, 'NV0001', 'SBDSD-SDS', '2016-11-10', '0000-00-00', '2016-11-15 22:13:09', 1, 914, '2016-11-16 19:05:42', '2016-11-19 14:49:02', NULL, '2', '0'),
(106, 'gladson.marinho', 'CAERN', 126, 'OP0001', 'SBDSD-SDS', '2016-11-11', '0000-00-00', '2016-11-15 22:14:06', 1, 915, '2016-11-16 19:10:20', '2016-11-19 14:52:22', NULL, '2', '0'),
(107, 'reginaldo.barbosa', 'CAERN', 134, 'CR0001', 'SBGCL-SCL', '2016-11-14', '0000-00-00', '2016-11-16 08:57:54', 1, 916, '2016-11-16 19:12:18', '2016-11-17 00:21:11', '2016-11-17 13:44:04', '3', '0'),
(108, 'francisco.barbosa', 'AMBEV', 540, 'VT0001', 'SBDPT-SPT', '0000-00-00', '0000-00-00', '2016-11-16 12:36:08', 1, 911, '2016-11-16 12:59:10', '2016-11-16 16:45:11', '2016-11-17 12:22:19', '3', '0'),
(110, 'dagmo.esbell', 'CAER', 60, 'CR0001', 'SBGCL-SCL', '2016-11-16', '0000-00-00', '2016-11-16 12:38:31', 4, 268, '2016-11-16 19:16:35', '2016-11-18 12:35:03', NULL, '1', '0'),
(111, 'francisco.barbosa', 'DESO', 526, 'PV0001', 'SBDXC-SDX', '2016-11-02', '0000-00-00', '2016-11-16 16:12:29', 1, 876, '2016-11-16 16:12:58', '2016-11-16 17:02:06', '2016-11-17 12:21:34', '3', '0'),
(112, 'francisco.barbosa', 'AMBEV', 540, 'VT0001', 'SBDPT-SPT', '2016-11-08', '0000-00-00', '2016-11-16 17:09:08', 1, 912, '2016-11-16 18:50:30', '2016-11-16 19:06:58', '2016-11-17 12:30:42', '3', '0'),
(113, 'francisco.barbosa', 'AMBEV', 542, 'VT0001', 'SBDPT-SPT', '2016-11-08', '0000-00-00', '2016-11-16 18:54:58', 1, 913, '2016-11-16 18:56:24', '2016-11-16 19:22:10', '2016-11-17 12:27:46', '3', '0'),
(114, 'reginaldo.barbosa', 'CAERN', 126, 'OP0001', 'SBDSD-SDS', '2016-11-16', '0000-00-00', '2016-11-17 01:06:02', 1, 917, '2016-11-17 11:44:20', '2016-11-18 10:57:59', '2016-11-18 13:24:00', '3', '0'),
(115, 'heitor.brito', 'CAERN', 106, 'CR0001', 'SBGCL-SCL', '2016-11-16', '0000-00-00', '2016-11-17 10:35:19', 1, 918, '2016-11-17 11:45:23', '2016-11-19 16:01:06', NULL, '2', '0'),
(116, 'heitor.brito', 'CAERN', 112, 'CR0001', 'SBDSD-SDS', '2016-11-16', '0000-00-00', '2016-11-17 10:36:11', 1, 919, '2016-11-17 11:46:40', '2016-11-19 16:10:29', NULL, '2', '0'),
(117, 'heitor.brito', 'CAERN', 193, 'CR0001', 'SBGCL-SCL', '2016-11-17', '0000-00-00', '2016-11-17 10:36:58', 1, 920, '2016-11-17 11:47:55', NULL, NULL, '1', '0'),
(130, 'RAFAELCARLOS', 'SOLAR', 537, 'VT0001', 'SBDPT-SPT', '2016-11-09', '0000-00-00', '2016-11-18 18:26:08', 1, 903, '2016-11-18 18:26:55', '2016-11-18 23:23:17', NULL, '2', '0'),
(119, 'nahim.pantoja', 'COSANPA', 424, 'CR0001', 'SBPAC-SPC', '2016-11-17', '0000-00-00', '2016-11-17 20:32:04', 1, 922, '2016-11-18 13:36:43', '2016-11-19 17:16:39', NULL, '2', '0'),
(120, 'RAFAELCARLOS', 'CASAL', 384, 'PV0001', 'SBGCL-SCL', '2016-11-17', '0000-00-00', '2016-11-17 20:58:23', 1, 921, '2016-11-17 21:08:32', '2016-11-18 23:08:06', NULL, '2', '0'),
(122, 'bruno.alves', 'CAGEPA', 227, 'VT0001', 'SBGCL-SCL', '2016-11-18', '0000-00-00', '2016-11-18 10:49:42', 1, 923, '2016-11-18 13:38:09', NULL, NULL, '1', '0'),
(131, 'RAFAELCARLOS', 'CASAL', 543, 'PV0001', 'SBGCL-SCL', '2016-11-18', '0000-00-00', '2016-11-18 22:40:50', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(124, 'bruno.alves', 'CAGEPA', 348, 'CR0001', 'SBGCL-SCL', '2016-10-24', '0000-00-00', '2016-11-18 12:55:59', 1, 842, '2016-11-18 12:57:50', NULL, NULL, '1', '0'),
(125, 'bruno.alves', 'CAGEPA', 350, 'CR0001', 'SBGCL-SCL', '2016-10-24', '0000-00-00', '2016-11-18 12:57:10', 1, 844, '2016-11-18 12:58:31', NULL, NULL, '1', '0'),
(126, 'ricardo.lopes', 'CAGEPA', 270, 'PV0001', 'SBGCL-SCL', '2016-10-25', '0000-00-00', '2016-11-18 12:59:43', 1, 845, '2016-11-18 13:00:12', NULL, NULL, '1', '0'),
(127, 'bruno.alves', 'CAGEPA', 262, 'CR0001', 'SBGCL-SCL', '2016-10-25', '0000-00-00', '2016-11-18 13:01:48', 1, 846, '2016-11-18 13:02:16', NULL, NULL, '1', '0'),
(128, 'bruno.alves', 'CAGEPA', 252, 'CR0001', 'SBGCL-SCL', '2016-10-28', '0000-00-00', '2016-11-18 13:03:18', 1, 859, '2016-11-18 13:04:24', NULL, NULL, '1', '0'),
(132, 'RAFAELCARLOS', 'CASAL', 397, 'PV0001', 'SBGCL-SCL', '2016-11-18', '0000-00-00', '2016-11-18 22:40:29', 1, 924, '2016-11-18 22:49:25', '2016-11-18 23:17:42', NULL, '2', '0'),
(133, 'nahim.pantoja', 'COSANPA', 450, 'OP0002', 'SBGCL-SCL', '2016-11-11', '0000-00-00', '2016-11-19 17:39:23', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(134, 'fabio.bonina', 'SABARA', 535, 'NV0001', 'SBGCL-SCL', '2016-12-19', '0000-00-00', '2016-12-19 18:54:47', NULL, NULL, NULL, NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_osdespesa`
--

CREATE TABLE `tb_osdespesa` (
  `id` int(11) NOT NULL,
  `tb_oat_id` int(11) NOT NULL,
  `tipo_despesa_id` int(11) NOT NULL,
  `quantidade` double NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `obs` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postagens`
--

CREATE TABLE `tb_postagens` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `data` varchar(12) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `exibir` varchar(5) NOT NULL,
  `descricao` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_proprietario`
--

CREATE TABLE `tb_proprietario` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `displayName` varchar(50) NOT NULL,
  `ativo` tinyint(1) NOT NULL,
  `cadastro` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_proprietario`
--

INSERT INTO `tb_proprietario` (`id`, `name`, `displayName`, `ativo`, `cadastro`) VALUES
(1, 'Sabará Químicos Ingredientes S/A', 'Sabará', 0, '2017-08-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_seguimento`
--

CREATE TABLE `tb_seguimento` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_seguimento`
--

INSERT INTO `tb_seguimento` (`id`, `name`) VALUES
(1, 'SANEAMENTO'),
(2, 'INDUSTRIA'),
(3, 'BEBIDA'),
(4, 'USINA'),
(5, 'OUTRO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servicos`
--

CREATE TABLE `tb_servicos` (
  `id` varchar(6) NOT NULL,
  `descricao` varchar(30) CHARACTER SET utf8 NOT NULL,
  `tipo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_servicos`
--

INSERT INTO `tb_servicos` (`id`, `descricao`, `tipo`, `ativo`) VALUES
('NV0001', 'NOVA INSTALACAO', '0', '0'),
('PV0001', 'PREVENTIVO', '1', '0'),
('OP0002', 'ACOPLAR CILINDRO', '0', '0'),
('OP0001', 'REABASTER PRODUTO', '0', '0'),
('CR0001', 'CORRETIVO', '1', '0'),
('VT0001', 'VISITA TECNICA', '0', '0');

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
-- Estrutura da tabela `tb_tecnicos`
--

CREATE TABLE `tb_tecnicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nick_user` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo`
--

CREATE TABLE `tb_tipo` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo`
--

INSERT INTO `tb_tipo` (`id`, `name`) VALUES
(1, 'ETA'),
(2, 'ETE'),
(3, 'EEA'),
(4, 'IND'),
(5, 'OUTROS'),
(6, 'POÇO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_despesa`
--

CREATE TABLE `tipo_despesa` (
  `id` int(11) NOT NULL,
  `tipo_despesa` varchar(45) NOT NULL,
  `ativo` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `niciuser_UNIQUE` (`nickuser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `tb_ativo`
--
ALTER TABLE `tb_ativo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `localidade` (`localidade`);

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- Indexes for table `tb_descricao`
--
ALTER TABLE `tb_descricao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_oat` (`oat`);

--
-- Indexes for table `tb_grupoloja`
--
ALTER TABLE `tb_grupoloja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_insumos`
--
ALTER TABLE `tb_insumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_osdespesa_tb_oat10` (`tb_oat_id`);

--
-- Indexes for table `tb_localidades`
--
ALTER TABLE `tb_localidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_clientes` (`loja`),
  ADD KEY `fk_tipo` (`tipo`);

--
-- Indexes for table `tb_loja`
--
ALTER TABLE `tb_loja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tb_proprietario` (`proprietario`),
  ADD KEY `ta_seguimento` (`seguimento`),
  ADD KEY `ta_grupoLoja` (`grupoLoja`);

--
-- Indexes for table `tb_mod`
--
ALTER TABLE `tb_mod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_mod_tb_tecnicos1_idx` (`tb_tecnicos_id`),
  ADD KEY `fk_tb_mod_tb_oat1_idx` (`tb_oat_id`);

--
-- Indexes for table `tb_oat`
--
ALTER TABLE `tb_oat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nickuser` (`nickuser`,`cliente`,`localidade`,`servico`,`sistema`),
  ADD KEY `fk_cleinte` (`cliente`),
  ADD KEY `fk_localidades` (`localidade`),
  ADD KEY `servico` (`servico`),
  ADD KEY `sistema` (`sistema`);

--
-- Indexes for table `tb_osdespesa`
--
ALTER TABLE `tb_osdespesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_osdespesa_tb_oat1_idx` (`tb_oat_id`),
  ADD KEY `fk_tb_osdespesa_tipo_despesa1_idx` (`tipo_despesa_id`);

--
-- Indexes for table `tb_proprietario`
--
ALTER TABLE `tb_proprietario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `displayName_UNIQUE` (`displayName`);

--
-- Indexes for table `tb_seguimento`
--
ALTER TABLE `tb_seguimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_servicos`
--
ALTER TABLE `tb_servicos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sistema`
--
ALTER TABLE `tb_sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tecnicos`
--
ALTER TABLE `tb_tecnicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nickuser` (`nick_user`);

--
-- Indexes for table `tb_tipo`
--
ALTER TABLE `tb_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_despesa`
--
ALTER TABLE `tipo_despesa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tb_ativo`
--
ALTER TABLE `tb_ativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;
--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tb_descricao`
--
ALTER TABLE `tb_descricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `tb_grupoloja`
--
ALTER TABLE `tb_grupoloja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_localidades`
--
ALTER TABLE `tb_localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=778;
--
-- AUTO_INCREMENT for table `tb_loja`
--
ALTER TABLE `tb_loja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tb_oat`
--
ALTER TABLE `tb_oat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `tb_proprietario`
--
ALTER TABLE `tb_proprietario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_seguimento`
--
ALTER TABLE `tb_seguimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_tipo`
--
ALTER TABLE `tb_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
