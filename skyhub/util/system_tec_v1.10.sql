-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 30-Out-2016 às 12:23
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

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
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nickuser` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `ativo` enum('0','1') NOT NULL DEFAULT '0',
  `data_cadastro` date NOT NULL DEFAULT '0000-00-00',
  `data_ultimo_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `nickuser`, `senha`, `nivel`, `ativo`, `data_cadastro`, `data_ultimo_login`) VALUES
(1, 'Fabio Bonina', 'fabiobonina@gmail.com', 'fabio', '123abc', '3', '0', '2016-10-03', '2016-10-03 11:56:01');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ativo`
--

CREATE TABLE `tb_ativo` (
  `id` int(11) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `localidade` int(11) NOT NULL,
  `plaqueta` varchar(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_ativo`
--

INSERT INTO `tb_ativo` (`id`, `cliente`, `localidade`, `plaqueta`, `data`) VALUES
(1, '', 5, '232', '0000-00-00 00:00:00'),
(3, 'FABIO', 5, '101011', '2016-10-27 21:59:24');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_clientes`
--

INSERT INTO `tb_clientes` (`id`, `nome`, `nick`, `ativo`) VALUES
(1, 'AGESPISA', 'AGESPISA', '0'),
(2, 'APERAM', 'APERAM', '0'),
(3, 'BATERIAS MOURA', 'BATERIAS MOURA', '0'),
(4, 'BIOSEV - GIASA', 'BIOSEV - GIASA', '0'),
(5, 'CAB AGRESTE', 'CAB AGRESTE', '0'),
(6, 'CAB CUIABA', 'CAB CUIABA', '0'),
(7, 'CAEMA', 'CAEMA', '0'),
(8, 'CAER', 'CAER', '0'),
(9, 'CAERN', 'CAERN', '0'),
(10, 'CAGECE', 'CAGECE', '0'),
(11, 'CAGEPA', 'CAGEPA', '0'),
(12, 'CASAL', 'CASAL', '0'),
(13, 'CESAN - VITORIA', 'CESAN - VITORIA', '0'),
(14, 'COMPESA', 'COMPESA', '0'),
(15, 'COSANPA', 'COSANPA', '0'),
(16, 'DAE-VARZEA GRANDE', 'DAE-VARZEA GRANDE', '0'),
(17, 'DEPASA', 'DEPASA', '0'),
(18, 'DESO', 'DESO', '0'),
(19, 'SERRA NEGRA DO NORTE', 'SERRA NEGRA DO NORTE', '0'),
(20, 'SAAE - CAXIAS', 'SAAE - CAXIAS', '0'),
(21, 'SABARÁ', 'SABARÁ', '0'),
(22, 'UFRN', 'UFRN', '0'),
(23, 'NIAGRO NICHIREI-PE', 'NIAGRO', '0'),
(24, 'ALUBAR', 'ALUBAR', '0'),
(25, 'AMBEV', 'AMBEV', '0'),
(26, 'SAAE - BACABAL', 'SAAE - BACABAL', '0'),
(27, 'SOLAR PETROLINA', 'SOLAR PETROLINA', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_descricao`
--

CREATE TABLE `tb_descricao` (
  `id` int(11) NOT NULL,
  `oat` int(11) NOT NULL,
  `descricao` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_descricao`
--

INSERT INTO `tb_descricao` (`id`, `oat`, `descricao`) VALUES
(1, 1, 'altera'),
(2, 1, 'teste'),
(3, 1, 'teste clorador\r\nkm2105\r\nkm 2116'),
(4, 1, 'teste clorador\r\nkm2105\r\nkm 2116'),
(5, 1, 'teste clorador\r\nkm2105\r\nkm 2116'),
(6, 1, 'teste clorador\r\nkm2105\r\nkm 2116');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_localidades`
--

CREATE TABLE `tb_localidades` (
  `id` int(11) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `regional` varchar(100) DEFAULT NULL,
  `nome` varchar(50) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_localidades`
--

INSERT INTO `tb_localidades` (`id`, `cliente`, `regional`, `nome`, `municipio`, `uf`, `latitude`, `longitude`, `ativo`) VALUES
(0, 'AGESPISA', '', 'ETA TERESINA III E IV', 'TERESINA', 'PI', '-5.1458199', '-42.8043543', '0'),
(1, 'AGESPISA', '', 'ETA SANTA MARIA', 'TERESINA', 'PI', '', '', '0'),
(2, 'AGESPISA', 'FLORIANO', 'FLORIANO', 'FLORIANO', 'PI', '-6.7841145', '-43.0203226', '0'),
(3, 'AGESPISA', 'PARNAIBA', 'PARNAIBA', 'PARNAIBA', 'PI', '-2.9222576', '-41.7599001', '0'),
(4, 'APERAM', '', 'TIMOTEO', 'TIMOTEO', 'MG', '', '', '0'),
(5, 'BIOSEV - GIASA', '', 'PEDRAS DE FOGO', 'PEDRAS DE FOGO', 'PB', '', '', '0'),
(6, 'CAB AGRESTE', '', 'ETA-ARAPIRACA', 'ARAPIRACA', 'AL', '', '', '0'),
(7, 'CAB AGRESTE', '', 'PILAR', 'PILAR', 'AL', '', '', '0'),
(8, 'CAB AGRESTE', '', 'SAO BRAS (ETA-MORRO DO GAIA)', 'SAO BRAS', 'AL', '', '', '0'),
(9, 'CAB CUIABA', '', 'CUIABA ETA I', 'CUIABA', 'MT', '', '', '0'),
(10, 'CAB CUIABA', '', 'CUIABA ETA II', 'CUIABA', 'MT', '', '', '0'),
(11, 'CAEMA', 'IMPERATRIZ', 'ACAILANDIA ELEVATORIA', 'ACAILANDIA', 'MA', '-4.9517241', '-47.4936336', '0'),
(12, 'CAEMA', '', 'ALCANTARA', 'ALCANTARA', 'MA', '', '', '0'),
(13, 'CAEMA', '', 'ARAIOSES', 'ARAIOSES', 'MA', '', '', '0'),
(14, 'CAEMA', 'ITAPECURU MIRIM', 'AREIAS', 'SAO LUIS', 'MA', '', '', '0'),
(15, 'CAEMA', '', 'AXIXA', 'AXIXA', 'MA', '', '', '0'),
(16, 'CAEMA', 'SAO JOAO DOS PATOS', 'BARAO DE GRAJAU', 'BARAO DE GRAJAU', 'MA', '', '', '0'),
(17, 'CAEMA', 'PRESIDENTE DUTRA', 'BARRA DO CORDA', 'BARRA DO CORDA', 'MA', '', '', '0'),
(18, 'CAEMA', 'BARREIRINHAS', 'BARREIRINHAS', 'BARREIRINHAS', 'MA', '', '', '0'),
(19, 'CAEMA', '', 'BOM JESUS DAS SELVAS', 'BOM JESUS DAS SELVAS', 'MA', '', '', '0'),
(20, 'CAEMA', '', 'BREJO', 'BREJO', 'MA', '', '', '0'),
(21, 'CAEMA', '', 'BURITI DE INACIA VAZ', 'SAO LUIS', 'MA', '', '', '0'),
(22, 'CAEMA', '', 'CANTANHEDE', 'CANTANHEDE', 'MA', '', '', '0'),
(23, 'CAEMA', 'CHAPADINHA', 'CHAPADINHA', 'CHAPADINHA', 'MA', '', '', '0'),
(24, 'CAEMA', 'SAO JOAO DOS PATOS', 'COLINAS', 'COLINAS', 'MA', '', '', '0'),
(25, 'CAEMA', '', 'DUQUE BACELAR', 'DUQUE BACELAR', 'MA', '', '', '0'),
(26, 'CAEMA', 'IMPERATRIZ', 'IMPERATRIZ', 'IMPERATRIZ', 'MA', '-5.5484567', '-47.4763421', '0'),
(27, 'CAEMA', 'BACABEIRA', 'ITALUIS', 'ROSARIO', 'MA', '-3.0271855', '-44.3093058', '0'),
(28, 'CAEMA', 'ITAPECURU MIRIM', 'ITAPECURU MIRIM', 'ITAPECURU MIRIM', 'MA', '-3.3960432', '-44.3587333', '0'),
(29, 'CAEMA', 'SAO JOAO DOS PATOS', 'LORETO', 'LORETO', 'MA', '', '', '0'),
(30, 'CAEMA', '', 'MIRANDA DO NORTE', 'MIRANDA DO NORTE', 'MA', '', '', '0'),
(31, 'CAEMA', 'ITAPECURU MIRIM', 'MORROS', 'MORROS', 'MA', '', '', '0'),
(32, 'CAEMA', 'CHAPADINHA', 'NINA RODRIGUES', 'NINA RODRIGUES', 'MA', '', '', '0'),
(33, 'CAEMA', 'METROPOLITANA', 'PACIENCIA', 'SAO LUIS', 'MA', '', '', '0'),
(34, 'CAEMA', '', 'PEDREIRAS', 'PEDREIRAS', 'MA', '', '', '0'),
(35, 'CAEMA', '', 'PINHEIRO', 'PINHEIRO', 'MA', '', '', '0'),
(36, 'CAEMA', '', 'PIRAPEMAS', 'PIRAPEMAS', 'MA', '', '', '0'),
(37, 'CAEMA', 'IMPERATRIZ', 'RIACHAO', 'RIACHAO', 'MA', '', '', '0'),
(38, 'CAEMA', 'METROPOLITANA', 'SACAVEM', 'ACAILANDIA', 'MA', '', '', '0'),
(39, 'CAEMA', '', 'SANTA QUITERIA', 'SANTA QUITERIA DO MARANHAO', 'MA', '', '', '0'),
(40, 'CAEMA', '', 'SAO BENEDITO DO RIO PRETO', 'ACAILANDIA', 'MA', '', '', '0'),
(41, 'CAEMA', '', 'SAO BERNARDO', 'SAO BERNARDO', 'MA', '', '', '0'),
(42, 'CAEMA', 'SAO JOAO DOS PATOS', 'SAO RAIMUNDO DAS MANGABEIRAS', 'SAO RAIMUNDO DAS MANGABEIRAS', 'MA', '', '', '0'),
(43, 'CAEMA', 'COROATA', 'TIMBIRAS', 'TIMBIRAS', 'MA', '', '', '0'),
(44, 'CAEMA', 'DEDREIRAS', 'TRIZIDELA DO VALE', 'TRIZIDELA DO VALE', 'MA', '', '', '0'),
(45, 'CAEMA', '', 'TUTOIA', 'TUTOIA', 'MA', '', '', '0'),
(46, 'CAEMA', '', 'URBANO SANTOS', 'URBANO SANTOS', 'MA', '', '', '0'),
(47, 'CAEMA', 'CHAPADINHA', 'VARGEM GRANDE', 'VARGEM GRANDE', 'MA', '', '', '0'),
(48, 'CAEMA', 'SANTA INES', 'VITORIA DO MEARIM', 'VITORIA DO MEARIM', 'MA', '', '', '0'),
(49, 'CAER', '', 'ALTO ALEGRE', 'ALTO ALEGRE', 'RR', '', '', '0'),
(50, 'CAER', '', 'CARACARAI', 'CARACARAI', 'RR', '', '', '0'),
(51, 'CAER', '', 'CAROEBE', 'CAROEBE', 'RR', '0.876169', '-59.6637819', '0'),
(52, 'CAER', '', 'MUCAJAI', 'MUCAJAI', 'RR', '', '', '0'),
(53, 'CAER', '', 'NORMANDIA', 'NORMANDIA', 'RR', '3.8787129', '-59.6277189', '0'),
(54, 'CAER', '', 'PACARAIMA', 'PACARAIMA', 'RR', '', '', '0'),
(55, 'CAER', '', 'RORAINOPOLIS', 'RORAINOPOLIS', 'RR', '', '', '0'),
(56, 'CAER', '', 'S. JOAO DA BALIZA', 'SAO JOAO DA BALIZA', 'RR', '', '', '0'),
(57, 'CAER', '', 'SAO LUIZ DO ANAUA', 'SAO JOAO DA BALIZA', 'RR', '', '', '0'),
(58, 'CAER', '', 'SAO PEDRO', 'BOA VISTA', 'RR', '2.8260786', '-60.6586121', '0'),
(59, 'CAERN', '', 'ACARI', 'ACARI', 'RN', '', '', '0'),
(60, 'CAERN', '', 'ADUTORA DO BOQUEIRAO', 'RIACHO DA CRUZ', 'RN', '', '', '0'),
(61, 'CAERN', '', 'ALTO RODRIGUES', 'ALTO DO RODRIGUES', 'RN', '', '', '0'),
(62, 'CAERN', '', 'ANGICOS- ADUTORA CENTAL', 'ANGICOS', 'RN', '', '', '0'),
(63, 'CAERN', '', 'APODI', 'APODI', 'RN', '', '', '0'),
(64, 'CAERN', '', 'AREIA BRANCA', 'AREIA BRANCA', 'RN', '', '', '0'),
(65, 'CAERN', '', 'ASSU', 'ACU', 'RN', '-5.5784597', '-36.9269303', '0'),
(66, 'CAERN', '', 'BOA SAUDE', 'BOA SAUDE', 'RN', '', '', '0'),
(67, 'CAERN', '', 'BOM JESUS - EB - 8', 'BOM JESUS', 'RN', '', '', '0'),
(68, 'CAERN', '', 'BRASIL NOVO', 'NATAL', 'RN', '', '', '0'),
(69, 'CAERN', 'CAICO', 'CAICO', 'CAICO', 'RN', '', '', '0'),
(70, 'CAERN', '', 'CAICO ZONA NORTE', 'CAICO', 'RN', '', '', '0'),
(71, 'CAERN', '', 'CAMPO REDONDO', 'CAMPO REDONDO', 'RN', '', '', '0'),
(72, 'CAERN', '', 'CANDELARIA', 'NATAL', 'RN', '-5.8390889', '-35.2209192', '0'),
(73, 'CAERN', '', 'CANGUARETAMA', 'CANGUARETAMA', 'RN', '', '', '0'),
(74, 'CAERN', '', 'CARAUBAS', 'CARAUBAS', 'RN', '', '', '0'),
(75, 'CAERN', '', 'CARNAUBAIS', 'CARNAUBAIS', 'RN', '', '', '0'),
(76, 'CAERN', '', 'CARNAUBAS-PALMA', 'CARNAUBAIS', 'RN', '', '', '0'),
(77, 'CAERN', '', 'CERRO CORA', 'CERRO CORA', 'RN', '', '', '0'),
(78, 'CAERN', 'LITORAL SUL', 'CIDADE SATELITE', 'NATAL', 'RN', '', '', '0'),
(79, 'CAERN', '', 'CRUZETA', 'CRUZETA', 'RN', '-6.4127049', '-36.7881451', '0'),
(80, 'CAERN', '', 'CURRAIS NOVOS', 'CURRAIS NOVOS', 'RN', '-6.2550992', '-36.5234019', '0'),
(81, 'CAERN', '', 'DIX-SEPT ROSADO', 'GOVERNADOR DIX-SEPT ROSADO', 'RN', '', '', '0'),
(82, 'CAERN', '', 'Dr. SEVERIANO', 'DOUTOR SEVERIANO', 'RN', '', '', '0'),
(83, 'CAERN', '', 'DUNAS', 'NATAL', 'RN', '', '', '0'),
(84, 'CAERN', '', 'ELOI DE SOUSA - EB - 10', 'SENADOR ELOI DE SOUZA', 'RN', '', '', '0'),
(85, 'CAERN', '', 'ENTRONCAMENTO', 'NATAL', 'RN', '', '', '0'),
(86, 'CAERN', '', 'EQUADOR', 'EQUADOR', 'RN', '', '', '0'),
(87, 'CAERN', '', 'ESPIRITO SANTO I', 'ESPIRITO SANTO', 'RN', '', '', '0'),
(88, 'CAERN', '', 'ESPIRITO SANTO II VARZEA', 'ESPIRITO SANTO', 'RN', '-6.3340813', '-35.3715599', '0'),
(89, 'CAERN', '', 'ETE - DO BALDO', 'NATAL', 'RN', '-5.7902664', '-35.2116572', '0'),
(90, 'CAERN', '', 'ETE-PARNAMIRIM', 'PARNAMIRIM', 'RN', '-5.9356871', '-35.2384063', '0'),
(91, 'CAERN', '', 'EXTREMOZ', 'EXTREMOZ', 'RN', '-5.7262265', '-35.2827374', '0'),
(92, 'CAERN', '', 'FELIPE CAMARA', 'NATAL', 'RN', '', '', '0'),
(93, 'CAERN', 'CAICO', 'FLORANEA', 'FLORANIA', 'RN', '', '', '0'),
(94, 'CAERN', '', 'FRANCISCO CAMPOS - P9', 'NATAL', 'RN', '', '', '0'),
(95, 'CAERN', '', 'FRANCISCO DANTAS', 'FRANCISCO DANTAS', 'RN', '', '', '0'),
(96, 'CAERN', '', 'GARGALHEIRAS', 'ACARI', 'RN', '', '', '0'),
(97, 'CAERN', '', 'GRAMORE', 'NATAL', 'RN', '', '', '0'),
(98, 'CAERN', '', 'GUARAPES', 'NATAL', 'RN', '-5.8406585', '-35.2740774', '0'),
(99, 'CAERN', '', 'IPANGUAÇU', 'IPANGUACU', 'RN', '', '', '0'),
(100, 'CAERN', '', 'IPUEIRA', 'IPUEIRA', 'RN', '', '', '0'),
(101, 'CAERN', '', 'ITAJA - ADUTORA SERTAO CENTRAL', 'ITAJA', 'RN', '', '', '0'),
(102, 'CAERN', '', 'ITAU', 'ITAU', 'RN', '', '', '0'),
(103, 'CAERN', '', 'JANDAIRA', 'JANDAIRA', 'RN', '', '', '0'),
(104, 'CAERN', '', 'JARDIM DE ANGICOS', 'JARDIM DE ANGICOS', 'RN', '', '', '0'),
(105, 'CAERN', '', 'JARDIM DE PIRANHAS', 'JARDIM DE PIRANHAS', 'RN', '', '', '0'),
(106, 'CAERN', '', 'JARDIM DO SERIDO', 'JARDIM DO SERIDO', 'RN', '', '', '0'),
(107, 'CAERN', '', 'JARDIM PROGRESSO', 'NATAL', 'RN', '', '', '0'),
(108, 'CAERN', '', 'JERONIMO ROSADO - EB - 1', 'ACU', 'RN', '', '', '0'),
(109, 'CAERN', '', 'JERONIMO ROSADO - EB - 2', 'MOSSORO', 'RN', '', '', '0'),
(110, 'CAERN', '', 'JIQUI', 'NATAL', 'RN', '-5.917594', '-35.188409', '0'),
(111, 'CAERN', '', 'JIQUI - P1', 'NATAL', 'RN', '', '', '0'),
(112, 'CAERN', '', 'JOSE DA PENHA', 'JOSE DA PENHA', 'RN', '', '', '0'),
(113, 'CAERN', '', 'JUCURUTU', 'JUCURUTU', 'RN', '', '', '0'),
(114, 'CAERN', '', 'JUNDIA', 'NATAL', 'RN', '', '', '0'),
(115, 'CAERN', 'LITORAL SUL', 'LAGOA NOVA I', 'LAGOA NOVA', 'RN', '', '', '0'),
(116, 'CAERN', 'LITORAL SUL', 'LAGOA NOVA II', 'LAGOA NOVA', 'RN', '', '', '0'),
(117, 'CAERN', '', 'LAJES - ADUTORA SERTAO CENTRAL', 'LAJES', 'RN', '', '', '0'),
(118, 'CAERN', '', 'LAJES - CABUGI', 'LAJES', 'RN', '', '', '0'),
(119, 'CAERN', 'LITORAL NORTE', 'MACAIBA - GRANJA RECREIO', 'MACAIBA', 'RN', '-5.8756089', '-35.3083509', '0'),
(120, 'CAERN', '', 'MACAU', 'MACAU', 'RN', '', '', '0'),
(121, 'CAERN', '', 'MARCELINO VIEIRA', 'MARCELINO VIEIRA', 'RN', '', '', '0'),
(122, 'CAERN', '', 'MARTINS', 'MARTINS', 'RN', '', '', '0'),
(123, 'CAERN', '', 'MEDIO OESTE', 'ACU', 'RN', '', '', '0'),
(124, 'CAERN', '', 'MONTANHAS', 'MONTANHAS', 'RN', '', '', '0'),
(125, 'CAERN', '', 'MONTE ALEGRE', 'MONTE ALEGRE', 'RN', '', '', '0'),
(126, 'CAERN', '', 'MOSSORO', 'MOSSORO', 'RN', '', '', '0'),
(127, 'CAERN', '', 'NISIA FLORESTA - ETA BOMFIM - ADUT. MONSEN. EXP.', 'NISIA FLORESTA', 'RN', '', '', '0'),
(128, 'CAERN', '', 'NOVA CRUZ', 'NOVA CRUZ', 'RN', '', '', '0'),
(129, 'CAERN', '', 'NOVO CAMPO - P1', 'NATAL', 'RN', '', '', '0'),
(130, 'CAERN', '', 'OURO BRANCO', 'OURO BRANCO', 'RN', '', '', '0'),
(131, 'CAERN', '', 'P6 - MOSSORO', 'MOSSORO', 'RN', '', '', '0'),
(132, 'CAERN', '', 'PALMA', 'CAICO', 'RN', '', '', '0'),
(133, 'CAERN', '', 'PARELHAS', 'PARELHAS', 'RN', '', '', '0'),
(134, 'CAERN', '', 'PARNAMIRIM - LAGOA DO BONFIM', 'PARNAMIRIM', 'RN', '-6.0417999', '-35.2269105', '0'),
(135, 'CAERN', '', 'PARNAMIRIM I', 'PARNAMIRIM', 'RN', '', '', '0'),
(136, 'CAERN', '', 'PARNAMIRIM II - RIACHO VERMELHO', 'PARNAMIRIM', 'RN', '-7.2292688', '-34.9206232', '0'),
(137, 'CAERN', '', 'PARQUE DAS DUNAS', 'NATAL', 'RN', '', '', '0'),
(138, 'CAERN', '', 'PAU DOS FERROS', 'PAU DOS FERROS', 'RN', '', '', '0'),
(139, 'CAERN', '', 'PEDRO VELHO', 'PEDRO VELHO', 'RN', '', '', '0'),
(140, 'CAERN', 'ASSU', 'PENDENCIAS', 'PENDENCIAS', 'RN', '', '', '0'),
(141, 'CAERN', '', 'PILOES', 'PILOES', 'RN', '', '', '0'),
(142, 'CAERN', '', 'PIRANGI', 'NATAL', 'RN', '', '', '0'),
(143, 'CAERN', '', 'PLANALTO', 'PAU DOS FERROS', 'RN', '', '', '0'),
(144, 'CAERN', '', 'PLANALTO MARANATA - P7', 'NATAL', 'RN', '', '', '0'),
(145, 'CAERN', '', 'PLANALTO P7', 'NATAL', 'RN', '-5.8400069', '-35.2764295', '0'),
(146, 'CAERN', '', 'PLANALTO P9', 'NATAL', 'RN', '-5.8354729', '-35.2657719', '0'),
(147, 'CAERN', '', 'PONTA NEGRA', 'NATAL', 'RN', '-5.8805932', '-35.1825798', '0'),
(148, 'CAERN', '', 'PORTALEGRE', 'PORTALEGRE', 'RN', '', '', '0'),
(149, 'CAERN', '', 'POTENGI - ALTO DA TORRE', 'NATAL', 'RN', '', '', '0'),
(150, 'CAERN', '', 'POTENGI - POCO 35', 'NATAL', 'RN', '', '', '0'),
(151, 'CAERN', '', 'POTENGI - POCO 44', 'NATAL', 'RN', '', '', '0'),
(152, 'CAERN', '', 'REDINHA', 'NATAL', 'RN', '', '', '0'),
(153, 'CAERN', '', 'RIACHUELO', 'RIACHUELO', 'RN', '', '', '0'),
(154, 'CAERN', '', 'RIO BAHIA', 'NATAL', 'RN', '', '', '0'),
(155, 'CAERN', '', 'RODOLFO FERNANDES', 'RODOLFO FERNANDES', 'RN', '', '', '0'),
(156, 'CAERN', '', 'SAN VALE', 'NATAL', 'RN', '-5.8545031', '-35.2173506', '0'),
(157, 'CAERN', '', 'SANTA CRUZ - EB - 16', 'SANTA CRUZ', 'RN', '-6.2471399', '-35.9662557', '0'),
(158, 'CAERN', '', 'SANTA FE', 'NATAL', 'RN', '', '', '0'),
(159, 'CAERN', '', 'SANTANA DO MATOS', 'SANTANA DO MATOS', 'RN', '', '', '0'),
(160, 'CAERN', '', 'SANTANA DO SERIDO', 'SANTANA DO SERIDO', 'RN', '', '', '0'),
(161, 'CAERN', '', 'SAO FERNANDO', 'SAO FERNANDO', 'RN', '-6.3762033', '-37.185178', '0'),
(162, 'CAERN', '', 'SAO JOAO DO SABUGI', 'SAO JOAO DO SABUGI', 'RN', '', '', '0'),
(163, 'CAERN', '', 'SAO JOSE DO MIPIBU', 'SAO JOSE DE MIPIBU', 'RN', '', '', '0'),
(164, 'CAERN', '', 'SAO MIGUEL', 'SAO MIGUEL', 'RN', '', '', '0'),
(165, 'CAERN', '', 'SÃO RAFAEL', 'SAO RAFAEL', 'RN', '', '', '0'),
(166, 'CAERN', '', 'SÃO TOMÉ', 'SAO TOME', 'RN', '', '', '0'),
(167, 'CAERN', '', 'SATELITE', 'NATAL', 'RN', '', '', '0'),
(168, 'CAERN', '', 'SERRA DE SANTANA', 'FLORANIA', 'RN', '', '', '0'),
(169, 'CAERN', '', 'SERRINHA DOS PINTOS', 'SERRINHA DOS PINTOS', 'RN', '', '', '0'),
(170, 'CAERN', '', 'TORRES', 'NATAL', 'RN', '', '', '0'),
(171, 'CAERN', 'LITORAL SUL', 'TOUROS - BOQUEIRAO', 'NATAL', 'RN', '-5.251721', '-35.5326816', '0'),
(172, 'CAERN', '', 'UMARIZAL', 'UMARIZAL', 'RN', '', '', '0'),
(173, 'CAERN', '', 'ZONA NORTE - POCO 37', 'NATAL', 'RN', '', '', '0'),
(174, 'CAERN', 'NORTE', 'ZONA-16', 'NATAL', 'RN', '', '', '0'),
(175, 'CAGECE', '', 'ETA OESTE', 'CAUCAIA', 'CE', '-3.78708227', '-38.65626203', '0'),
(176, 'CAGEPA', '', 'ÁGUA BRANCA', 'AGUA BRANCA', 'PB', '', '', '0'),
(177, 'CAGEPA', '', 'ALAGOA GRANDE', 'ALAGOA GRANDE', 'PB', '', '', '0'),
(178, 'CAGEPA', '', 'ALAGOA NOVA', 'ALAGOA NOVA', 'PB', '', '', '0'),
(179, 'CAGEPA', '', 'ALGODAO DE JANDAIRA', 'ALGODAO DE JANDAIRA', 'PB', '', '', '0'),
(180, 'CAGEPA', '', 'ALHANDRA CLORAÇAO', 'ALHANDRA', 'PB', '', '', '0'),
(181, 'CAGEPA', '', 'ALHANDRA PRE-CLORAÇAO', 'ALHANDRA', 'PB', '', '', '0'),
(182, 'CAGEPA', '', 'APARECIDA', 'APARECIDA', 'PB', '', '', '0'),
(183, 'CAGEPA', '', 'ARARA', 'ARARA', 'PB', '', '', '0'),
(184, 'CAGEPA', 'BORBOREMA', 'AREIA', 'AREIA', 'PB', '-6.923389', '-35.6676826', '0'),
(185, 'CAGEPA', '', 'AREIAL', 'AREIAL', 'PB', '', '', '0'),
(186, 'CAGEPA', 'BORBOREMA', 'AROEIRAS', 'AROEIRAS', 'PB', '', '', '0'),
(187, 'CAGEPA', '', 'BANANEIRAS', 'BANANEIRAS', 'PB', '', '', '0'),
(188, 'CAGEPA', '', 'BARRA DE SANTA ROSA', 'BARRA DE SANTA ROSA', 'PB', '', '', '0'),
(189, 'CAGEPA', 'BORBOREMA', 'BARRA DE SÃO MIGUEL', 'BARRA DE SAO MIGUEL', 'PB', '', '', '0'),
(190, 'CAGEPA', 'BORBOREMA', 'BARRAGEM SÃO JOSÉ', 'MONTEIRO', 'PB', '', '', '0'),
(191, 'CAGEPA', '', 'BELEM', 'BELEM', 'PB', '', '', '0'),
(192, 'CAGEPA', 'BORBOREMA', 'BOA VISTA', 'BOA VISTA', 'PB', '', '', '0'),
(193, 'CAGEPA', '', 'BOM JESUS', 'BOM JESUS', 'PB', '', '', '0'),
(194, 'CAGEPA', '', 'BONITO DE SANTA FÉ', 'BONITO DE SANTA FE', 'PB', '', '', '0'),
(195, 'CAGEPA', 'BORBOREMA', 'BOQUEIRÃO', 'BOQUEIRAO', 'PB', '', '', '0'),
(196, 'CAGEPA', '', 'BREJO DO CRUZ', 'BREJO DO CRUZ', 'PB', '', '', '0'),
(197, 'CAGEPA', 'RIO DO PEIXE', 'BREJO DOS SANTOS', 'BREJO DOS SANTOS', 'PB', '', '', '0'),
(198, 'CAGEPA', '', 'CAAPORÃ', 'CAAPORA', 'PB', '', '', '0'),
(199, 'CAGEPA', 'BORBOREMA', 'CABAÇEIRAS', 'CABACEIRAS', 'PB', '', '', '0'),
(200, 'CAGEPA', '', 'CACHOEIRA DOS INDIOS', 'CACHOEIRA DOS INDIOS', 'PB', '', '', '0'),
(201, 'CAGEPA', '', 'CACIMBA DE DENTRO', 'CACIMBA DE DENTRO', 'PB', '', '', '0'),
(202, 'CAGEPA', '', 'CACIMBAS', 'CACIMBAS', 'PB', '', '', '0'),
(203, 'CAGEPA', '', 'CAJA', 'CAMPINA GRANDE', 'PB', '', '', '0'),
(204, 'CAGEPA', 'ALTO PIRANHAS', 'CAJAZEIRAS (ENG. AVIDOS)', 'CAJAZEIRAS', 'PB', '-6.9778836', '-38.4563083', '0'),
(205, 'CAGEPA', '', 'CAJAZEIRINHAS', 'CAJAZEIRINHAS', 'PB', '', '', '0'),
(206, 'CAGEPA', 'BORBOREMA', 'CAMALAU', 'CAMALAU', 'PB', '', '', '0'),
(207, 'CAGEPA', '', 'CAMPINA GRANDE', 'CAMPINA GRANDE', 'PB', '', '', '0'),
(208, 'CAGEPA', 'LITORAL', 'CAPIM', 'CAPIM', 'PB', '', '', '0'),
(209, 'CAGEPA', '', 'CARAUBAS', 'CARAUBAS', 'PB', '', '', '0'),
(210, 'CAGEPA', '', 'CARRAPATEIRA', 'CARRAPATEIRA', 'PB', '', '', '0'),
(211, 'CAGEPA', '', 'CASSERENGUE', 'CASSERENGUE', 'PB', '', '', '0'),
(212, 'CAGEPA', 'ESPINHARAS', 'CATINGUEIRA', 'CATINGUEIRA', 'PB', '', '', '0'),
(213, 'CAGEPA', '', 'CATOLÉ DO ROCHA', 'CATOLE DO ROCHA', 'PB', '-6.3449353', '-37.7487229', '0'),
(214, 'CAGEPA', '', 'CEPILHO', 'AREIA', 'PB', '', '', '0'),
(215, 'CAGEPA', '', 'CHA DOS PEREIROS', 'INGA', 'PB', '', '', '0'),
(216, 'CAGEPA', '', 'CONCEIÇAO', 'CONCEICAO', 'PB', '', '', '0'),
(217, 'CAGEPA', '', 'CONDE', 'CONDE', 'PB', '', '', '0'),
(218, 'CAGEPA', '', 'CONGO', 'CONGO', 'PB', '', '', '0'),
(219, 'CAGEPA', 'BORBOREMA', 'COXIXOLA', 'COXIXOLA', 'PB', '', '', '0'),
(220, 'CAGEPA', '', 'CRUZ DO ESPÍRITO SANTO', 'CRUZ DO ESPIRITO SANTO', 'PB', '', '', '0'),
(221, 'CAGEPA', 'BORBOREMA', 'CUBATI', 'CUBATI', 'PB', '', '', '0'),
(222, 'CAGEPA', '', 'CUITE', 'CUITE', 'PB', '', '', '0'),
(223, 'CAGEPA', 'BREJO', 'CUITEGI', 'CUITEGI', 'PB', '', '', '0'),
(224, 'CAGEPA', '', 'DESTERRO', 'DESTERRO', 'PB', '', '', '0'),
(225, 'CAGEPA', '', 'DIAMANTE', 'DIAMANTE', 'PB', '', '', '0'),
(226, 'CAGEPA', '', 'DUAS ESTRADAS', 'DUAS ESTRADAS', 'PB', '', '', '0'),
(227, 'CAGEPA', 'BORBOREMA', 'EB3 - MONTEIRO', 'MONTEIRO', 'PB', '', '', '0'),
(228, 'CAGEPA', '', 'EMAS', 'EMAS', 'PB', '', '', '0'),
(229, 'CAGEPA', 'BORBOREMA', 'ESPERANÇA', 'ESPERANCA', 'PB', '-7.0349009', '-35.8594426', '0'),
(230, 'CAGEPA', 'LITORAL', 'ETA 1 - ITABAIANA', 'ITABAIANA', 'PB', '', '', '0'),
(231, 'CAGEPA', '', 'ETA FORUM - ITABAIANA', 'ITABAIANA', 'PB', '', '', '0'),
(232, 'CAGEPA', '', 'ETA VELHA - ITABAIANA', 'ITABAIANA', 'PB', '', '', '0'),
(233, 'CAGEPA', 'BORBOREMA', 'FAGUNDES', 'FAGUNDES', 'PB', '-7.3500659', '-35.7831476', '0'),
(234, 'CAGEPA', 'BORBOREMA', 'FREI MARTINHO', 'FREI MARTINHO', 'PB', '', '', '0'),
(235, 'CAGEPA', '', 'GADO BRAVO', 'GADO BRAVO', 'PB', '', '', '0'),
(236, 'CAGEPA', '', 'GRAMAME', 'JOAO PESSOA', 'PB', '', '', '0'),
(237, 'CAGEPA', '', 'GRAVATA', 'SAO JOAO DO RIO DO PEIXE', 'PB', '', '', '0'),
(238, 'CAGEPA', '', 'GUARABIRA', 'GUARABIRA', 'PB', '', '', '0'),
(239, 'CAGEPA', '', 'GURINHEM', 'GURINHEM', 'PB', '', '', '0'),
(240, 'CAGEPA', '', 'GURJAO', 'GURJAO', 'PB', '', '', '0'),
(241, 'CAGEPA', '', 'IBIARA', 'IBIARA', 'PB', '', '', '0'),
(242, 'CAGEPA', '', 'IGARACY', 'IGARACY', 'PB', '-7.19119734', '-38.06715018', '0'),
(243, 'CAGEPA', '', 'IMACULADA', 'IMACULADA', 'PB', '', '', '0'),
(244, 'CAGEPA', '', 'INGA', 'INGA', 'PB', '', '', '0'),
(245, 'CAGEPA', '', 'IPUEIRA', 'PAULISTA', 'PB', '', '', '0'),
(246, 'CAGEPA', '', 'ITAPORANGA', 'ITAPORANGA', 'PB', '', '', '0'),
(247, 'CAGEPA', 'BORBOREMA', 'ITATUBA', 'ITATUBA', 'PB', '-7.41563111', '-35.63764784', '0'),
(248, 'CAGEPA', '', 'JACARAU', 'JACARAU', 'PB', '', '', '0'),
(249, 'CAGEPA', 'LITORAL', 'JACUMÃ', 'CONDE', 'PB', '', '', '0'),
(250, 'CAGEPA', '', 'JERICÓ', 'JERICO', 'PB', '', '', '0'),
(251, 'CAGEPA', 'BORBOREMA', 'JUAREZ TÁVORA', 'JUAREZ TAVORA', 'PB', '-7.1660167', '-35.5938342', '0'),
(252, 'CAGEPA', 'BORBOREMA', 'JUAZEIRINHO', 'JUAZEIRINHO', 'PB', '', '', '0'),
(253, 'CAGEPA', '', 'JURIPIRANGA', 'JURIPIRANGA', 'PB', '', '', '0'),
(254, 'CAGEPA', 'ESPINHARAS', 'JURU', 'JURU', 'PB', '', '', '0'),
(255, 'CAGEPA', '', 'LAGOA DO MATO', 'REMIGIO', 'PB', '', '', '0'),
(256, 'CAGEPA', '', 'LAGOA SECA', 'LAGOA SECA', 'PB', '', '', '0'),
(257, 'CAGEPA', '', 'LIVRAMENTO', 'LIVRAMENTO', 'PB', '', '', '0'),
(258, 'CAGEPA', '', 'LUCENA', 'LUCENA', 'PB', '', '', '0'),
(259, 'CAGEPA', '', 'MALTA', 'MALTA', 'PB', '', '', '0'),
(260, 'CAGEPA', '', 'MALTA-CONDADO', 'CONDADO', 'PB', '', '', '0'),
(261, 'CAGEPA', '', 'MAMANGUAPE', 'MAMANGUAPE', 'PB', '-6.8376369', '-35.1326896', '0'),
(262, 'CAGEPA', '', 'MANAIRA', 'MANAIRA', 'PB', '', '', '0'),
(263, 'CAGEPA', '', 'MARES - JOAO PESSOA', 'JOAO PESSOA', 'PB', '', '', '0'),
(264, 'CAGEPA', '', 'MARI', 'MARI', 'PB', '', '', '0'),
(265, 'CAGEPA', '', 'MARIZOPOLIS', 'MARIZOPOLIS', 'PB', '', '', '0'),
(266, 'CAGEPA', '', 'MASSARANDUBA', 'MASSARANDUBA', 'PB', '', '', '0'),
(267, 'CAGEPA', '', 'MATINHAS', 'MATINHAS', 'PB', '', '', '0'),
(268, 'CAGEPA', '', 'MATO GROSSO', 'MATO GROSSO', 'PB', '', '', '0'),
(269, 'CAGEPA', '', 'MATUREIA', 'MATUREIA', 'PB', '', '', '0'),
(270, 'CAGEPA', '', 'MOGEIRO', 'MOGEIRO', 'PB', '', '', '0'),
(271, 'CAGEPA', '', 'MONTADAS', 'MONTADAS', 'PB', '', '', '0'),
(272, 'CAGEPA', '', 'MONTE HOREBE', 'MONTE HOREBE', 'PB', '', '', '0'),
(273, 'CAGEPA', 'BORBOREMA', 'MONTEIRO', 'MONTEIRO', 'PB', '', '', '0'),
(274, 'CAGEPA', '', 'MULUNGU', 'MULUNGU', 'PB', '', '', '0'),
(275, 'CAGEPA', '', 'NATUBA', 'NATUBA', 'PB', '', '', '0'),
(276, 'CAGEPA', '', 'NAZAREZINHO', 'NAZAREZINHO', 'PB', '', '', '0'),
(277, 'CAGEPA', '', 'NOVA FLORESTA', 'NOVA FLORESTA', 'PB', '', '', '0'),
(278, 'CAGEPA', '', 'NOVA OLINDA', 'NOVA OLINDA', 'PB', '', '', '0'),
(279, 'CAGEPA', '', 'NOVA PALMEIRA', 'NOVA PALMEIRA', 'PB', '', '', '0'),
(280, 'CAGEPA', '', 'OLHO DÁGUA', 'OLHO DAGUA', 'PB', '', '', '0'),
(281, 'CAGEPA', '', 'OURO VELHO', 'OURO VELHO', 'PB', '', '', '0'),
(282, 'CAGEPA', '', 'PATOS', 'PATOS', 'PB', '', '', '0'),
(283, 'CAGEPA', '', 'PAULISTA', 'PAULISTA', 'PB', '', '', '0'),
(284, 'CAGEPA', '', 'PEDRAS DE FOGO', 'PEDRAS DE FOGO', 'PB', '', '', '0'),
(285, 'CAGEPA', '', 'PEDRO VELHO', 'AROEIRAS', 'PB', '', '', '0'),
(286, 'CAGEPA', '', 'PIANCÓ', 'PIANCO', 'PB', '', '', '0'),
(287, 'CAGEPA', 'BORBOREMA', 'PICUÍ', 'PICUI', 'PB', '', '', '0'),
(288, 'CAGEPA', '', 'PILAR', 'PILAR', 'PB', '', '', '0'),
(289, 'CAGEPA', '', 'PILÕES', 'PILOES', 'PB', '', '', '0'),
(290, 'CAGEPA', '', 'PIRPIRITUBA', 'PIRPIRITUBA', 'PB', '', '', '0'),
(291, 'CAGEPA', 'LITORAL', 'PITIMBU', 'PITIMBU', 'PB', '', '', '0'),
(292, 'CAGEPA', 'BORBOREMA', 'POCINHOS', 'POCINHOS', 'PB', '', '', '0'),
(293, 'CAGEPA', '', 'POMBAL', 'POMBAL', 'PB', '', '', '0'),
(294, 'CAGEPA', '', 'PRATA', 'PRATA', 'PB', '', '', '0'),
(295, 'CAGEPA', '', 'PRINCESA ISABEL', 'PRINCESA ISABEL', 'PB', '', '', '0'),
(296, 'CAGEPA', '', 'PUXINANÃ', 'PUXINANA', 'PB', '', '', '0'),
(297, 'CAGEPA', '', 'REMÍGIO (Cepilho)', 'REMIGIO', 'PB', '-6.9883029', '-35.775616', '0'),
(298, 'CAGEPA', '', 'RIACHO DOS CAVALOS', 'RIACHO DOS CAVALOS', 'PB', '', '', '0'),
(299, 'CAGEPA', '', 'RIACHO STO. ANTÔNIO', 'RIACHO DE SANTO ANTONIO', 'PB', '', '', '0'),
(300, 'CAGEPA', '', 'RIO TINTO', 'RIO TINTO', 'PB', '', '', '0'),
(301, 'CAGEPA', 'LITORAL', 'SALGADO DE SÃO FELIX', 'SALGADO DE SAO FELIX', 'PB', '', '', '0'),
(302, 'CAGEPA', '', 'SANTA CRUZ', 'SANTA CRUZ', 'PB', '', '', '0'),
(303, 'CAGEPA', '', 'SANTA GERTRUDES', 'PATOS', 'PB', '', '', '0'),
(304, 'CAGEPA', '', 'SANTA HELENA', 'SANTA HELENA', 'PB', '', '', '0'),
(305, 'CAGEPA', '', 'SANTA LUZIA', 'SANTA LUZIA', 'PB', '-6.8645092', '-36.9175579', '0'),
(306, 'CAGEPA', 'LITORAL', 'SANTA RITA', 'SANTA RITA', 'PB', '', '', '0'),
(307, 'CAGEPA', '', 'SANTA TEREZINHA', 'SANTA TERESINHA', 'PB', '', '', '0'),
(308, 'CAGEPA', '', 'SANTANA DE MANGUEIRA', 'SANTANA DE MANGUEIRA', 'PB', '', '', '0'),
(309, 'CAGEPA', '', 'SANTANA DOS GARROTES', 'SANTANA DOS GARROTES', 'PB', '', '', '0'),
(310, 'CAGEPA', '', 'SÃO BENTINHO', 'SAO BENTINHO', 'PB', '', '', '0'),
(311, 'CAGEPA', '', 'SÃO BENTO', 'SAO BENTO', 'PB', '', '', '0'),
(312, 'CAGEPA', '', 'SÃO DOMINGOS', 'SAO DOMINGOS DO CARIRI', 'PB', '', '', '0'),
(313, 'CAGEPA', '', 'SÃO GONÇALO', 'SOUSA', 'PB', '-7.2475219', '-35.9212396', '0'),
(314, 'CAGEPA', '', 'SÃO JOAO DO CARIRI', 'SAO JOAO DO CARIRI', 'PB', '', '', '0'),
(315, 'CAGEPA', '', 'SÃO JOÃO DO RIO DO PEIXE', 'SAO JOAO DO RIO DO PEIXE', 'PB', '', '', '0'),
(316, 'CAGEPA', '', 'SÃO JOSE DA LAGOA TAPADA', 'SAO JOSE DA LAGOA TAPADA', 'PB', '', '', '0'),
(317, 'CAGEPA', '', 'SÃO JOSE DE CAIANA', 'SAO JOSE DE CAIANA', 'PB', '', '', '0'),
(318, 'CAGEPA', '', 'SÃO JOSE DE ESPINHARAS', 'SAO JOSE DE ESPINHARAS', 'PB', '', '', '0'),
(319, 'CAGEPA', '', 'SÃO JOSÉ DO BOMFIM', 'SAO JOSE DO BONFIM', 'PB', '', '', '0'),
(320, 'CAGEPA', '', 'SÃO JOSÉ DO SABUGI', 'SAO JOSE DO SABUGI', 'PB', '', '', '0'),
(321, 'CAGEPA', '', 'SÃO JOSE DOS CORDEIROS', 'SAO JOSE DOS CORDEIROS', 'PB', '', '', '0'),
(322, 'CAGEPA', '', 'SÃO JOSE PIRANHAS', 'SAO JOSE DE ESPINHARAS', 'PB', '', '', '0'),
(323, 'CAGEPA', '', 'SÃO MAMEDE', 'SAO MAMEDE', 'PB', '', '', '0'),
(324, 'CAGEPA', '', 'SÃO MIGUEL', 'SAO MIGUEL DE TAIPU', 'PB', '', '', '0'),
(325, 'CAGEPA', 'BORBOREMA', 'SÃO SEBASTIÃO DE LAGOA DE ROÇA', 'SAO SEBASTIAO DE LAGOA DE ROCA', 'PB', '', '', '0'),
(326, 'CAGEPA', '', 'SAPE', 'SAPE', 'PB', '', '', '0'),
(327, 'CAGEPA', '', 'SERRA BRANCA', 'SERRA BRANCA', 'PB', '', '', '0'),
(328, 'CAGEPA', '', 'SERRA GRANDE', 'SERRA GRANDE', 'PB', '', '', '0'),
(329, 'CAGEPA', '', 'SERRA REDONDA', 'SERRA REDONDA', 'PB', '', '', '0'),
(330, 'CAGEPA', '', 'SERRARIA', 'SERRARIA', 'PB', '-6.8156965', '-35.6393336', '0'),
(331, 'CAGEPA', '', 'SOLÂNEA', 'SOLANEA', 'PB', '-6.7582846', '-35.6501485', '0'),
(332, 'CAGEPA', '', 'SOUSA', 'SOUSA', 'PB', '', '', '0'),
(333, 'CAGEPA', 'BORBOREMA', 'SUMÉ - ETA VELHA', 'SUME', 'PB', '', '', '0'),
(334, 'CAGEPA', 'BORBOREMA', 'SUMÉ-ADUTORA DO CONGO EB II', 'SUME', 'PB', '', '', '0'),
(335, 'CAGEPA', 'ESPINHARAS', 'TAPEROÁ', 'TAPEROA', 'PB', '', '', '0'),
(336, 'CAGEPA', '', 'TAVARES', 'TAVARES', 'PB', '', '', '0'),
(337, 'CAGEPA', '', 'TEIXEIRA', 'TEIXEIRA', 'PB', '', '', '0'),
(338, 'CAGEPA', '', 'TRIUNFO', 'TRIUNFO', 'PB', '', '', '0'),
(339, 'CAGEPA', '', 'UIRAUNA', 'UIRAUNA', 'PB', '', '', '0'),
(340, 'CAGEPA', '', 'UIRAUNA - CAPIVARA', 'UIRAUNA', 'PB', '', '', '0'),
(341, 'CAGEPA', 'BORBOREMA', 'UMBUZEIRO', 'UMBUZEIRO', 'PB', '', '', '0'),
(342, 'CAGEPA', '', 'VÁRZEA', 'VARZEA', 'PB', '', '', '0'),
(343, 'CAGEPA', '', 'VISTA SERRANA', 'VISTA SERRANA', 'PB', '', '', '0'),
(344, 'CASAL', 'SERTÃO', 'AGUA BRANCA - EE5', 'AGUA BRANCA', 'AL', '', '', '0'),
(345, 'CASAL', 'SERRANA', 'ANADIA', 'ANADIA', 'AL', '', '', '0'),
(346, 'CASAL', 'LESTE', 'BARRA DE SAO MIGUEL', 'BARRA DE SAO MIGUEL', 'AL', '', '', '0'),
(347, 'CASAL', 'BACIA', 'BATALHA', 'BATALHA', 'AL', '', '', '0'),
(348, 'CASAL', 'SERRANA', 'CAPELA', 'CAPELA', 'AL', '', '', '0'),
(349, 'CASAL', 'SERTÃO', 'DELMIRO GOUVEIA - BARRAGEM', 'DELMIRO GOUVEIA', 'AL', '', '', '0'),
(350, 'CASAL', 'SERTÃO', 'DELMIRO GOUVEIA - EE3', 'DELMIRO GOUVEIA', 'AL', '', '', '0'),
(351, 'CASAL', 'SERRANA', 'ESTRELA DE ALAGOAS', 'ESTRELA DE ALAGOAS', 'AL', '', '', '0'),
(352, 'CASAL', 'LESTE', 'FLEXEIRAS', 'FLEXEIRAS', 'AL', '-9.28035', '-35.72167', '0'),
(353, 'CASAL', 'LESTE', 'JOAQUIM GOMES', 'JOAQUIM GOMES', 'AL', '', '', '0'),
(354, 'CASAL', 'AGRESTE', 'JUNQUEIRO', 'CAJUEIRO', 'AL', '', '', '0'),
(355, 'CASAL', 'MACEIÓ', 'MACEIO - AVIAÇAO', 'MACEIO', 'AL', '', '', '0'),
(356, 'CASAL', 'MACEIÓ', 'MACEIO - CARDOSO', 'MACEIO', 'AL', '', '', '0'),
(357, 'CASAL', 'LESTE', 'MURICI - CACHOEIRA', 'MURICI', 'AL', '', '', '0'),
(358, 'CASAL', 'LESTE', 'MURICI - CANSANÇAO', 'MURICI', 'AL', '', '', '0'),
(359, 'CASAL', 'LESTE', 'NOVO LINO', 'NOVO LINO', 'AL', '', '', '0'),
(360, 'CASAL', 'SERTÃO', 'OLHO DAGUA DO CASADO', 'OLHO DAGUA DO CASADO', 'AL', '', '', '0'),
(361, 'CASAL', 'SERRANA', 'PALMEIRA DOS INDIOS', 'PALMEIRA DOS INDIOS', 'AL', '-9.4026743', '-36.6294103', '0'),
(362, 'CASAL', 'BACIA', 'PAO DE AÇUCAR', 'PAO DE ACUCAR', 'AL', '', '', '0'),
(363, 'CASAL', 'SERRANA', 'PAULO JACINTO', 'PAULO JACINTO', 'AL', '', '', '0'),
(364, 'CASAL', 'AGRESTE', 'PIAÇABUÇU', 'PIACABUCU', 'AL', '', '', '0'),
(365, 'CASAL', 'SERTÃO', 'PIRANHAS', 'PIRANHAS', 'AL', '', '', '0'),
(366, 'CASAL', 'MACEIÓ', 'PRATAGY', 'MACEIO', 'AL', '', '', '0'),
(367, 'CASAL', 'SERRANA', 'QUEBRANGULO', 'QUEBRANGULO', 'AL', '', '', '0'),
(368, 'CASAL', 'SERRANA', 'QUEBRANGULO - CAÇAMBAS', 'QUEBRANGULO', 'AL', '', '', '0'),
(369, 'CASAL', 'LESTE', 'RIO LARGO - MATA DO ROLO', 'RIO LARGO', 'AL', '-9.4816171', '-35.8405074', '0'),
(370, 'CASAL', 'LESTE', 'RIO LARGO - TABULEIRO DO PINTO', 'RIO LARGO', 'AL', '-9.5057836', '-35.8123273', '0'),
(371, 'CASAL', 'LESTE', 'SATUBA', 'SATUBA', 'AL', '', '', '0'),
(372, 'CASAL', 'AGRESTE', 'TRAIPU', 'TRAIPU', 'AL', '', '', '0'),
(373, 'COSANPA', '', '40 HORAS SABIA', 'ANANINDEUA', 'PA', '', '', '0'),
(374, 'COSANPA', '', '5º SETOR', 'BELEM', 'PA', '-1.427460', ' -48.456377', '0'),
(375, 'COSANPA', '', 'ABAETETUBA', 'ABAETETUBA', 'PA', '-1.7214709', '-48.8820381', '0'),
(376, 'COSANPA', '', 'ABAETETUBA ALGODOAL', 'ABAETETUBA', 'PA', '', '', '0'),
(377, 'COSANPA', '', 'AFUÁ', 'AFUA', 'PA', '', '', '0'),
(378, 'COSANPA', '', 'ALENQUER', 'ALENQUER', 'PA', '', '', '0'),
(379, 'COSANPA', '', 'ALTAMIRA', 'ALTAMIRA', 'PA', '', '', '0'),
(380, 'COSANPA', '', 'ANAJÁS', 'ANAJAS', 'PA', '', '', '0'),
(381, 'COSANPA', '', 'ANANINDEUA - CENTRO', 'ANANINDEUA', 'PA', '-1.3532343', '-48.3737187', '0'),
(382, 'COSANPA', '', 'ARIRI 1', 'BELEM', 'PA', '', '', '0'),
(383, 'COSANPA', '', 'ARIRI 2', 'BELEM', 'PA', '', '', '0'),
(384, 'COSANPA', '', 'AUGUSTO CORREIA', 'AUGUSTO CORREA', 'PA', '', '', '0'),
(385, 'COSANPA', 'METROPOLITANA', 'BELEM - BEJAMIM SODRE P5/ P8', 'BELEM', 'PA', '', '', '0'),
(386, 'COSANPA', '', 'BENGUI', 'BELEM', 'PA', '', '', '0'),
(387, 'COSANPA', '', 'BOLONHA', 'BELEM', 'PA', '-1.4188494', '-48.4392531', '0'),
(388, 'COSANPA', '', 'BRAGANÇA', 'BRAGANCA', 'PA', '', '', '0'),
(389, 'COSANPA', '', 'BREU BRANCO', 'BREU BRANCO', 'PA', '', '', '0'),
(390, 'COSANPA', '', 'BREVES', 'BREVES', 'PA', '-1.6863401', '-50.4834653', '0'),
(391, 'COSANPA', '', 'CACHOEIRA DOA ARARI', 'CACHOEIRA DO ARARI', 'PA', '', '', '0'),
(392, 'COSANPA', 'METROPOLITANA', 'CANARINHO', 'BELEM', 'PA', '-1.3369897', '-48.4568614', '0'),
(393, 'COSANPA', '', 'CAPANEMA', 'CAPANEMA', 'PA', '', '', '0'),
(394, 'COSANPA', '', 'CAPITÃO POCO', 'CAPITAO POCO', 'PA', '', '', '0'),
(395, 'COSANPA', '', 'CASTANHAL', 'CASTANHAL', 'PA', '', '', '0'),
(396, 'COSANPA', 'BAIXO AMAZONAS', 'CASTANHAL - CAIÇARA', 'CASTANHAL', 'PA', '', '', '0'),
(397, 'COSANPA', '', 'CATALINA', 'BELEM', 'PA', '', '', '0'),
(398, 'COSANPA', '', 'CDP', 'BELEM', 'PA', '-1.4028167', '-48.481049', '0'),
(399, 'COSANPA', '', 'CHEGUEVARA', 'MARITUBA', 'PA', '', '', '0'),
(400, 'COSANPA', '', 'CIDADE NOVA ( ANANINDEUA )', 'ANANINDEUA', 'PA', '-1.3364433', '-48.3835683', '0'),
(401, 'COSANPA', '', 'COHAB', 'BELEM', 'PA', '', '', '0'),
(402, 'COSANPA', '', 'COMANDANTE ASSIS', 'CASTANHAL', 'PA', '', '', '0'),
(403, 'COSANPA', '', 'CONCEIÇÃO DO ARAGUAIA', 'CONCEICAO DO ARAGUAIA', 'PA', '-8.2835127', '-49.2646675', '0'),
(404, 'COSANPA', '', 'CONJUNTO MAGUARI', 'BELEM', 'PA', '', '', '0'),
(405, 'COSANPA', '', 'COQUEIRO', 'BELEM', 'PA', '', '', '0'),
(406, 'COSANPA', '', 'CORDEIRO DE FARIAS I', 'BELEM', 'PA', '-1.3501428', '-48.4648128', '0'),
(407, 'COSANPA', '', 'CORDEIRO DE FARIAS II', 'BELEM', 'PA', '', '', '0'),
(408, 'COSANPA', '', 'DOM ELISEU', 'DOM ELISEU', 'PA', '', '', '0'),
(409, 'COSANPA', '', 'FARO', 'FARO', 'PA', '', '', '0'),
(410, 'COSANPA', '', 'GUANABARA I', 'BELEM', 'PA', '', '', '0'),
(411, 'COSANPA', '', 'GUANABARA II', 'BELEM', 'PA', '', '', '0'),
(412, 'COSANPA', '', 'IGARAPÉ - MIRI C. NOVA', 'IGARAPE-MIRI', 'PA', '', '', '0'),
(413, 'COSANPA', '', 'IGARAPÉ - MIRI ESCRITÓRIO', 'IGARAPE-MIRI', 'PA', '', '', '0'),
(414, 'COSANPA', '', 'IGARAPÉ - MIRI ESTAÇAO', 'IGARAPE-MIRI', 'PA', '', '', '0'),
(415, 'COSANPA', '', 'INHANGAPI', 'INHANGAPI', 'PA', '', '', '0'),
(416, 'COSANPA', '', 'ITAITUBA', 'ITAITUBA', 'PA', '-4.276419', '-55.986369', '0'),
(417, 'COSANPA', '', 'ITUPIRANGA', 'ITUPIRANGA', 'PA', '', '', '0'),
(418, 'COSANPA', '', 'JACUNDÁ', 'JACUNDA', 'PA', '', '', '0'),
(419, 'COSANPA', '', 'JADERLANDIA', 'BELEM', 'PA', '', '', '0'),
(420, 'COSANPA', '', 'JURUTI', 'JURUTI', 'PA', '', '', '0'),
(421, 'COSANPA', '', 'LIMOEIRO DO AJURU', 'LIMOEIRO DO AJURU', 'PA', '', '', '0'),
(422, 'COSANPA', '', 'MAGALHAES BARATA', 'MAGALHAES BARATA', 'PA', '', '', '0'),
(423, 'COSANPA', '', 'MAGUARI', 'BELEM', 'PA', '', '', '0'),
(424, 'COSANPA', '', 'MAIUATÁ', 'IGARAPE-MIRI', 'PA', '', '', '0'),
(425, 'COSANPA', '', 'MARABÁ CIDADE NOVA', 'MARABA', 'PA', '', '', '0'),
(426, 'COSANPA', '', 'MARABÁ NOVA', 'MARABA', 'PA', '-5.3260604', '-49.0770069', '0'),
(427, 'COSANPA', '', 'MARABÁ PIONEIRA', 'MARABA', 'PA', '-5.339151', '-49.1243262', '0'),
(428, 'COSANPA', '', 'MARAPANIN', 'MARAPANIM', 'PA', '', '', '0'),
(429, 'COSANPA', '', 'MARITUBA BEIJA FLOR', 'MARITUBA', 'PA', '', '', '0'),
(430, 'COSANPA', '', 'MARITUBA CENTRO', 'MARITUBA', 'PA', '', '', '0'),
(431, 'COSANPA', '', 'MARITUBA COHAB', 'MARITUBA', 'PA', '', '', '0'),
(432, 'COSANPA', '', 'MARUDA', 'BELEM', 'PA', '', '', '0'),
(433, 'COSANPA', '', 'MILAGRE', 'CASTANHAL', 'PA', '', '', '0'),
(434, 'COSANPA', '', 'MOCAJUBA', 'MOCAJUBA', 'PA', '', '', '0'),
(435, 'COSANPA', '', 'MOJU', 'MOJU', 'PA', '', '', '0'),
(436, 'COSANPA', '', 'MONTE ALEGRE', 'MONTE ALEGRE', 'PA', '-1.99417205', '-54.0553053', '0'),
(437, 'COSANPA', '', 'MOSQUEIRO', 'BELEM', 'PA', '', '', '0'),
(438, 'COSANPA', 'NORDESTE', 'NOVA TIMBOTEUA', 'NOVA TIMBOTEUA', 'PA', '', '', '0'),
(439, 'COSANPA', '', 'NOVO REPARTIMENTO', 'NOVO REPARTIMENTO', 'PA', '', '', '0'),
(440, 'COSANPA', '', 'ÓBIDOS', 'OBIDOS', 'PA', '', '', '0'),
(441, 'COSANPA', '', 'OEIRA DO PARA', 'OEIRAS DO PARA', 'PA', '', '', '0'),
(442, 'COSANPA', 'BAIXO AMAZONAS', 'ORIXIMINÁ', 'ORIXIMINA', 'PA', '-1.7635721', '-55.8660902', '0'),
(443, 'COSANPA', '', 'OUREM', 'OUREM', 'PA', '', '', '0'),
(444, 'COSANPA', '', 'PAAR', 'BELEM', 'PA', '', '', '0'),
(445, 'COSANPA', '', 'PANORAMA XXI', 'BELEM', 'PA', '', '', '0'),
(446, 'COSANPA', 'NORDESTE', 'PEIXE BOI', 'PEIXE-BOI', 'PA', '', '', '0'),
(447, 'COSANPA', '', 'PONTA DE PEDRAS', 'PONTA DE PEDRAS', 'PA', '', '', '0'),
(448, 'COSANPA', '', 'PORTEL', 'PORTEL', 'PA', '', '', '0'),
(449, 'COSANPA', '', 'PRAINHA', 'PRAINHA', 'PA', '', '', '0'),
(450, 'COSANPA', '', 'PRATINHA', 'BELEM', 'PA', '', '', '0'),
(451, 'COSANPA', '', 'R6', 'BELEM', 'PA', '', '', '0'),
(452, 'COSANPA', '', 'SALGADO GRANDE', 'BELEM', 'PA', '', '', '0'),
(453, 'COSANPA', '', 'SALINOPOLIS', 'SALINOPOLIS', 'PA', '', '', '0'),
(454, 'COSANPA', '', 'SALVA TERRA', 'SALVATERRA', 'PA', '', '', '0'),
(455, 'COSANPA', '', 'SANTA CRUZ DO ARARI', 'SANTA CRUZ DO ARARI', 'PA', '', '', '0'),
(456, 'COSANPA', '', 'SANTA LUZIA DO PARA', 'SANTA LUZIA DO PARA', 'PA', '', '', '0'),
(457, 'COSANPA', '', 'SANTA MARIA DAS BARREIRAS', 'SANTA MARIA DAS BARREIRAS', 'PA', '', '', '0'),
(458, 'COSANPA', '', 'SANTA MARIA DO PARA', 'SANTA MARIA DO PARA', 'PA', '', '', '0'),
(459, 'COSANPA', 'BAIXO AMAZONAS', 'SANTAREM', 'SANTAREM', 'PA', '-2.4434211', '-54.7312665', '0'),
(460, 'COSANPA', '', 'SAO BRAZ', 'BELEM', 'PA', '-1.4495656', '-48.4697113', '0'),
(461, 'COSANPA', '', 'SAO CAETANO DE ODOVELAS', 'BELEM', 'PA', '', '', '0'),
(462, 'COSANPA', '', 'SAO FELIX DO XINGU', 'BELEM', 'PA', '', '', '0'),
(463, 'COSANPA', '', 'SAO FRANCISCO DO PARA', 'BELEM', 'PA', '', '', '0'),
(464, 'COSANPA', '', 'SATELITE', 'BELEM', 'PA', '', '', '0'),
(465, 'COSANPA', '', 'SIDERAL', 'BELEM', 'PA', '', '', '0'),
(466, 'COSANPA', '', 'SOURE', 'SOURE', 'PA', '', '', '0'),
(467, 'COSANPA', '', 'TAILANDIA', 'TAILANDIA', 'PA', '-2.948317', '-48.9541687', '0'),
(468, 'COSANPA', '', 'TANGARAS', 'BELEM', 'PA', '-1.2762927', '-47.9547255', '0'),
(469, 'COSANPA', '', 'TENONE', 'BELEM', 'PA', '', '', '0'),
(470, 'COSANPA', '', 'TERRA SANTA', 'TERRA SANTA', 'PA', '', '', '0'),
(471, 'COSANPA', '', 'TRACUATEUA', 'TRACUATEUA', 'PA', '', '', '0'),
(472, 'COSANPA', '', 'UIRAPURU', 'ANANINDEUA', 'PA', '-1.3279864', '-48.4000009', '0'),
(473, 'COSANPA', '', 'USINA', 'CASTANHAL', 'PA', '', '', '0'),
(474, 'COSANPA', '', 'VERDEJANTE', 'BELEM', 'PA', '', '', '0'),
(475, 'COSANPA', '', 'VIGIA DE NAZARE', 'VIGIA', 'PA', '', '', '0'),
(476, 'COSANPA', '', 'VILA CAFEZAL', 'MAGALHAES BARATA', 'PA', '', '', '0'),
(477, 'COSANPA', '', 'VILA CUIARANA', 'SALINOPOLIS', 'PA', '', '', '0'),
(478, 'COSANPA', '', 'VILA DE BEJA', 'ABAETETUBA', 'PA', '', '', '0'),
(479, 'COSANPA', '', 'VILA DO APEU', 'CASTANHAL', 'PA', '', '', '0'),
(480, 'COSANPA', '', 'VILA FATIMA', 'TRACUATEUA', 'PA', '', '', '0'),
(481, 'COSANPA', '', 'VILA MAUIATA', 'IGARAPE-MIRI', 'PA', '', '', '0'),
(482, 'COSANPA', '', 'VILA TAUARI', 'CAPANEMA', 'PA', '', '', '0'),
(483, 'COSANPA', '', 'VISEU', 'VISEU', 'PA', '', '', '0'),
(484, 'DAE-VARZEA GRANDE', '', 'ETA I', 'VARZEA GRANDE', 'MT', '', '', '0'),
(485, 'DAE-VARZEA GRANDE', '', 'ETA II', 'VARZEA GRANDE', 'MT', '', '', '0'),
(486, 'DEPASA', '', 'RIO BRANCO', 'RIO BRANCO', 'AC', '', '', '0'),
(487, 'DESO', '', 'CAJAIBA', 'ITABAIANA', 'SE', '', '', '0'),
(488, 'DESO', '', 'ITABAIANA', 'ITABAIANA', 'SE', '', '', '0'),
(489, 'DESO', '', 'LAGARTO', 'LAGARTO', 'SE', '-10.9199167', '-37.6637167', '0'),
(490, 'DESO', '', 'TOBIAS BARRETO', 'TOBIAS BARRETO', 'SE', '-11.1830316', '-37.998807', '0'),
(491, 'SAAE - CAXIAS', 'CAXIAS', 'ETA POINT', 'CAXIAS', 'MA', '', '', '0'),
(492, 'SAAE - CAXIAS', 'CAXIAS', 'ETA VOLTA REDONDA', 'CAXIAS', 'MA', '-4.8835502', '-43.3548287', '0'),
(493, 'UFRN', '', 'CAMPUS - NATAL', 'NATAL', 'RN', '', '', '0'),
(494, 'COSANPA', '', 'TENONÉ', 'BELEM', 'PA', '', '', '0'),
(495, 'COSANPA', '', 'ARIRI-BOLONHA', 'BELEM', 'PA', '', '', '0'),
(496, 'CAERN', '', 'ETA CALDEIROES', 'SANTANA DO SERIDO', 'RN', '', '', '0'),
(497, 'CAERN', '', 'FELIPE CAMARÃO - P10', 'NATAL', 'RN', '', '', '0'),
(498, 'CAERN', '', 'CIDADE SATÉLITE - P9', 'NATAL', 'RN', '', '', '0'),
(499, 'CAERN', '', 'PUREZA', 'PUREZA', 'RN', '', '', '0'),
(500, 'CAERN', '', 'VERA CRUZ', 'VERA CRUZ', 'RN', '-6.041006', '-35.4475688', '0'),
(501, 'CAERN', '', 'ANGICOS - EB2', 'ANGICOS', 'RN', '', '', '0'),
(502, 'CAGEPA', '', 'REMÍGIO', 'REMIGIO', 'PB', '', '', '0'),
(503, 'CAGEPA', '', 'AREIA - SAULO MAIA', 'AREIA', 'PB', '', '', '0'),
(504, 'CAERN', '', 'ZONA NORTE - P23', 'NATAL', 'RN', '-5.7397868', '-35.2259372', '0'),
(505, 'CAERN', '', 'ZONA NORTE - P57', 'NATAL', 'RN', '-5.7468708', '-35.2333405', '0'),
(506, 'CAERN', '', 'P36 - ZONA NORTE', 'NATAL', 'RN', '-5.7525378', '-35.2564314', '0'),
(507, 'ALUBAR', '', 'BARCARENA', 'BARCARENA', 'PA', '-1.550120', ' -48.739784', '0'),
(508, 'CAGECE', '', 'PAVUNA', 'PACATUBA', 'CE', '-3.915401', ' -38.599784', '0'),
(509, 'AMBEV', '', 'JOAO PESSOAL', 'JOAO PESSOA', 'PB', '-7.1888379', '-34.9165993', '0'),
(510, 'SAAE - BACABAL', '', 'BACABAL', 'BACABAL', 'MA', '-4.2346173', '-44.7783702', '0'),
(511, 'CAERN', '', 'CONJUNTO JIQUI - P2', 'NATAL', 'RN', '', '', '0'),
(512, 'CAERN', '', 'SERRA NEGRA DO NORTE', 'SERRA NEGRA DO NORTE', 'RN', '', '', '0'),
(513, 'CAERN', '', 'CRUZETA-ESCRITÓRIO', 'CRUZETA', 'RN', '', '', '0'),
(514, 'CAERN', '', 'P20 - ZONA NORTE', 'NATAL', 'RN', '-5.71815883', '-35.2642355', '0'),
(515, 'CAERN', '', 'P56 - ZONA NORTE', 'NATAL', 'RN', '-5.7476151', '-35.2303437', '0'),
(516, 'CAERN', '', 'ANGICOS - CENTRO', 'ANGICOS', 'RN', '', '', '0'),
(517, 'CAERN', '', 'PLANALTO - P01', 'NATAL', 'RN', '', '', '0'),
(518, 'CAERN', '', 'PLANALTO - P02', 'NATAL', 'RN', '', '', '0'),
(519, 'CAERN', '', 'PLANALTO - P03', 'NATAL', 'RN', '', '', '0'),
(520, 'CAERN', '', 'PLANALTO - P05', 'NATAL', 'RN', '', '', '0'),
(521, 'CAERN', '', 'FELIPE CAMARAO - P01', 'NATAL', 'RN', '', '', '0'),
(522, 'CAERN', '', 'NOVA PARNAMIRIM - P11', 'PARNAMIRIM', 'RN', '', '', '0'),
(523, 'CAERN', '', 'CIDADE DOS BOSQUES - P17', 'PARNAMIRIM', 'RN', '', '', '0'),
(524, 'CAERN', '', 'NOVA PARNAMIRIM - P20', 'PARNAMIRIM', 'RN', '', '', '0'),
(525, 'CAERN', '', 'SANTA TEREZA - P28', 'PARNAMIRIM', 'RN', '', '', '0'),
(526, 'CAERN', '', 'NOVA PARNAMIRIM - P29', 'PARNAMIRIM', 'RN', '', '', '0'),
(527, 'CAERN', '', 'CIDADE CAMPESTRE - P78', 'PARNAMIRIM', 'RN', '', '', '0'),
(528, 'CAERN', '', 'EMAÚS - P90', 'PARNAMIRIM', 'RN', '', '', '0'),
(529, 'CAERN', '', 'JANDAÍRA - P02', 'JANDAIRA', 'RN', '', '', '0'),
(530, 'CAERN', '', 'JANDAÍRA - P03', 'JANDAIRA', 'RN', '', '', '0'),
(531, 'CAERN', '', 'JANDAÍRA - P05', 'JANDAIRA', 'RN', '', '', '0'),
(532, 'SOLAR PETROLINA', '', 'PETROLINA', 'PETROLINA', 'PE', '', '', '0'),
(533, 'NIAGRO NICHIREI-PE', '', 'PETROLINA', 'PETROLINA', 'PE', '-9.3955447', '-40.5296306', '0');


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `data_sol` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `filial` int(2) DEFAULT NULL,
  `os` int(11) DEFAULT NULL,
  `data_os` datetime DEFAULT '0000-00-00 00:00:00',
  `data_fech` datetime DEFAULT '0000-00-00 00:00:00',
  `data_term` datetime DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_oat`
--

INSERT INTO `tb_oat` (`id`, `nickuser`, `cliente`, `localidade`, `servico`, `sistema`, `data_sol`, `filial`, `os`, `data_os`, `data_fech`, `data_term`, `status`, `ativo`) VALUES
(1, 'FABIO BONINA', 'FABIO', 5, 'SER001', 'SBGCL-SCL', '2016-10-19 10:28:13', 1, 200, '2016-10-22 19:46:21', NULL, NULL, '1', '0'),
(2, 'FABIO BONINA', 'FABIO', 5, 'SER001', 'SBGCL-SCL', '2016-10-19 10:30:01', 1, 201, '2016-10-22 19:53:30', NULL, NULL, '1', '0'),
(3, 'FABIO BONINA', 'FABIO', 5, 'SER001', 'SBGCL-SCL', '2016-10-19 10:30:34', 1, 202, '2016-10-22 19:53:46', NULL, NULL, '1', '0'),
(4, 'Fabio Bonina', 'FABIO', 5, 'ACAO01', 'SBGCL-SCL', '2016-10-27 19:56:37', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(5, 'Fabio Bonina', 'FABIO', 5, 'ACAO01', 'SBGCL-SCL', '2016-10-27 19:56:50', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(6, 'Fabio Bonina', 'FABIO', 5, 'ACAO01', 'SBGCL-SCL', '2016-10-27 19:57:02', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(7, 'Fabio Bonina', 'FABIO', 5, 'ACAO01', 'SBGCL-SCL', '2016-10-27 19:57:09', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(8, 'Fabio Bonina', 'FABIO', 5, 'ACAO01', 'SBGCL-SCL', '2016-10-27 19:57:16', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(9, 'Fabio Bonina', 'FABIO', 5, 'ACAO01', 'SBGCL-SCL', '2016-10-19 11:50:09', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(10, 'Fabio Bonina', 'FABIO', 6, 'tes001', 'SBGCL-SCL', '2016-10-20 10:22:31', NULL, NULL, NULL, NULL, NULL, '0', '0'),
(11, 'Fabio Bonina', 'ALEXANDRE', 7, 'tes001', 'SBGCL-SCL', '2016-10-20 10:23:02', NULL, NULL, NULL, NULL, NULL, '0', '0');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servicos`
--

CREATE TABLE `tb_servicos` (
  `id` varchar(6) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_servicos`
--

INSERT INTO `tb_servicos` (`id`, `descricao`, `ativo`) VALUES
('CR0001', 'CORRETIVO', '0'),
('OP0001', 'REABASTECIMENTO DE PRODUTO', '0'),
('OP0002', 'ACOPLAMENTO DE CILINDRO', '0'),
('PV0001', 'PREVENTIVO', '0'),
('VT0001', 'VISITA TECNICA', '0');


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sistema`
--

CREATE TABLE `tb_sistema` (
  `id` varchar(12) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_sistema`
--

INSERT INTO `tb_sistema` (`id`, `descricao`, `ativo`) VALUES
('SBBDO-BMB', 'BOMBA DE DOSAGEM', '0'),
('SBSEG-KITCL', 'KIT DE EMERGENCIA CLORO', '0'),
('SBSEG-MCA', 'MASCARA AUTONOMA', '0'),
('SBGCL-SCL', 'SISTEMA DE CLORAÇÃO', '0'),
('SBDSD-SDS', 'SISTEMA DE DOSAGEM', '0'),
('SBPAC-SPC', 'SISTEMA DE PAC', '0'),
('SBDPT-SPT', 'SISTEMA DE PASTILHA', '0'),
('SBDXC-SDX', 'SISTEMA DIOXIDO DE CLORO', '0');


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tecnicos`
--

CREATE TABLE `tb_tecnicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nick_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_despesa`
--

CREATE TABLE `tipo_despesa` (
  `id` int(11) NOT NULL,
  `tipo_despesa` varchar(45) NOT NULL,
  `ativo` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `fk_tb_ativo_tb_oat1_idx` (`cliente`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_insumos`
--
ALTER TABLE `tb_insumos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_osdespesa_tb_oat1_idx` (`tb_oat_id`);

--
-- Indexes for table `tb_localidades`
--
ALTER TABLE `tb_localidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_localidades_tb_clientes1_idx` (`cliente`);

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
  ADD KEY `fk_tb_oat_tb_localidades1_idx` (`localidade`),
  ADD KEY `fk_tb_oat_tb_servicos1_idx` (`servico`),
  ADD KEY `fk_tb_oat_tb_sistema1_idx` (`sistema`),
  ADD KEY `nuckuser_idx` (`nickuser`);

--
-- Indexes for table `tb_osdespesa`
--
ALTER TABLE `tb_osdespesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_osdespesa_tb_oat1_idx` (`tb_oat_id`),
  ADD KEY `fk_tb_osdespesa_tipo_despesa1_idx` (`tipo_despesa_id`);

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
  ADD KEY `nickuser_idx` (`nick_user`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_ativo`
--
ALTER TABLE `tb_ativo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_descricao`
--
ALTER TABLE `tb_descricao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_insumos`
--
ALTER TABLE `tb_insumos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_localidades`
--
ALTER TABLE `tb_localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_mod`
--
ALTER TABLE `tb_mod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_oat`
--
ALTER TABLE `tb_oat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_osdespesa`
--
ALTER TABLE `tb_osdespesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tipo_despesa`
--
ALTER TABLE `tipo_despesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_insumos`
--
ALTER TABLE `tb_insumos`
  ADD CONSTRAINT `fk_tb_osdespesa_tb_oat10` FOREIGN KEY (`tb_oat_id`) REFERENCES `tb_oat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_mod`
--
ALTER TABLE `tb_mod`
  ADD CONSTRAINT `fk_tb_mod_tb_oat1` FOREIGN KEY (`tb_oat_id`) REFERENCES `tb_oat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_mod_tb_tecnicos1` FOREIGN KEY (`tb_tecnicos_id`) REFERENCES `tb_tecnicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_osdespesa`
--
ALTER TABLE `tb_osdespesa`
  ADD CONSTRAINT `fk_tb_osdespesa_tb_oat1` FOREIGN KEY (`tb_oat_id`) REFERENCES `tb_oat` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_osdespesa_tipo_despesa1` FOREIGN KEY (`tipo_despesa_id`) REFERENCES `tipo_despesa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_tecnicos`
--
ALTER TABLE `tb_tecnicos`
  ADD CONSTRAINT `nickuser` FOREIGN KEY (`nick_user`) REFERENCES `login` (`nickuser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
