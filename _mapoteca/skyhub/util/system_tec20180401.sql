-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 01-Abr-2018 às 12:36
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
-- Estrutura da tabela `tb_bem`
--

CREATE TABLE `tb_bem` (
  `id` int(11) NOT NULL,
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
  `dataCompra` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_bem`
--

INSERT INTO `tb_bem` (`id`, `produto`, `tag`, `name`, `modelo`, `numeracao`, `fabricante`, `fabricanteNick`, `proprietario`, `proprietarioNick`, `proprietarioLocal`, `categoria`, `plaqueta`, `dataFrabricacao`, `dataCompra`) VALUES
(3, 2, 'SCL', 'SISTEMA CLORACAO', '26kg', '123', 2, 'CLORANDO', 1, 'AGESPISA', 2, 1, '101010', '2018-03-01', '2018-03-07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bem_componentes`
--

CREATE TABLE `tb_bem_componentes` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `capacidade` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unidade` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `numeracao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fabricante` int(11) NOT NULL,
  `fabricanteNick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `proprietario` int(11) NOT NULL,
  `proprietarioNick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `local` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `dataFrabricacao` date NOT NULL DEFAULT '0000-00-00',
  `dataCompra` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bem_localizacao`
--

CREATE TABLE `tb_bem_localizacao` (
  `id` int(11) NOT NULL,
  `bem` int(11) NOT NULL,
  `loja` int(11) DEFAULT NULL,
  `local` int(11) DEFAULT NULL,
  `dataInicial` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `status` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_bem_localizacao`
--

INSERT INTO `tb_bem_localizacao` (`id`, `bem`, `loja`, `local`, `dataInicial`, `dataFinal`, `status`) VALUES
(1, 3, 1, 2, '2018-03-07', NULL, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bens_familia`
--

CREATE TABLE `tb_bens_familia` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_bens_familia`
--

INSERT INTO `tb_bens_familia` (`id`, `name`, `tag`) VALUES
(1, 'MASCARA AUTONOMA', 'MSA'),
(2, 'Sistema Cloração', 'SCL'),
(1, 'MASCARA AUTONOMA', 'MSA'),
(2, 'Sistema Cloração', 'SCL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bens_frabricante`
--

CREATE TABLE `tb_bens_frabricante` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_bens_frabricante`
--

INSERT INTO `tb_bens_frabricante` (`id`, `name`, `nick`) VALUES
(1, 'MSA', 'MSA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`id`, `name`, `tag`) VALUES
(1, 'GAS CLORO', 'GCL'),
(2, 'SEGURACA', 'SEG'),
(3, 'POLICLORETO ALUMINIO', 'PAC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_desloc_status`
--

CREATE TABLE `tb_desloc_status` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` enum('0','1','2','3','4','5','6','7','8','9','10') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `processo` enum('1','2','3','4','5','6','7','8','9','10','11') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `tipo` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_desloc_status`
--

INSERT INTO `tb_desloc_status` (`id`, `name`, `categoria`, `processo`, `tipo`) VALUES
(1, 'Inicio da Viagem', '2', '1', 'TRAJ'),
(2, 'Final da Viagem', '0', '2', 'TRAJ'),
(3, 'Inicio do Serviço', '2', '3', 'SERV'),
(4, 'Final do Servio', '0', '4', 'SERV'),
(5, 'Inicio do Retorno', '2', '5', 'TRAJ'),
(6, 'Final do Retorno', '0', '6', 'TRAJ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_desloc_trajeto`
--

CREATE TABLE `tb_desloc_trajeto` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `categoria` enum('0','1') NOT NULL DEFAULT '0',
  `valor` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_desloc_trajeto`
--

INSERT INTO `tb_desloc_trajeto` (`id`, `name`, `categoria`, `valor`) VALUES
(1, 'Carro', '0', 0.85),
(2, 'Passagem', '1', NULL),
(3, 'Carona', '0', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_equipamentos`
--

CREATE TABLE `tb_equipamentos` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `capacidade` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unidade` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `numeracao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fabricante` int(11) NOT NULL,
  `fabricanteNick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `proprietario` int(11) NOT NULL,
  `proprietarioNick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `local` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `plaqueta` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `dataFrabricacao` date NOT NULL,
  `dataCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eq_componentes`
--

CREATE TABLE `tb_eq_componentes` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `capacidade` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `unidade` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `numeracao` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `frabicante` int(11) NOT NULL,
  `frabicanteNick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `proprietario` int(11) NOT NULL,
  `proprietarioNick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `local` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `dataFrabricacao` date NOT NULL,
  `dataCompra` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eq_localizacao`
--

CREATE TABLE `tb_eq_localizacao` (
  `id` int(11) NOT NULL,
  `equipamento` int(11) NOT NULL,
  `loja` int(11) NOT NULL,
  `local` int(11) DEFAULT NULL,
  `dataIncial` date DEFAULT NULL,
  `dataFinal` date DEFAULT NULL,
  `status` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fabricante`
--

CREATE TABLE `tb_fabricante` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_fabricante`
--

INSERT INTO `tb_fabricante` (`id`, `name`, `nick`) VALUES
(1, 'MSA', 'MSA'),
(2, 'CLORANDO', 'CLORANDO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo`
--

CREATE TABLE `tb_grupo` (
  `id` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_grupo`
--

INSERT INTO `tb_grupo` (`id`, `name`) VALUES
('C', 'Cliente'),
('P', 'Proprietario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_insumos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_locais`
--

CREATE TABLE `tb_locais` (
  `id` int(11) NOT NULL,
  `loja` int(11) NOT NULL,
  `tipo` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `regional` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `uf` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_locais`
--
INSERT INTO `tb_locais` (	 `id`	,	 `loja`	,	 `tipo`	,	 `regional`	,	 `name`	,	 `municipio`	,	 `uf`	,	 `latitude`	,	 `longitude`	 `ativo`) VALUES	
(	1	,	1	,	 'ETA'	,	 ''	,	 'ITAPISSUMA'	,	 'ITAPISSUMA'	,	 'PE'	,	-7.799.309		-34.925.011	 '0')	,
(	2	,	1	,	 'ETA'	,	 ''	,	 'SANTA BARBARA DOESTE'	,	 'SANTA BARBARA DOESTE'	,	 'SP'	,	-22.764.881		-47.377.178	 '0')	,
(	3	,	1	,	 'ETA'	,	 ''	,	 'PACATUBA'	,	 'PACATUBA'	,	 'CE'	,	-3.902.439		-38.559.635	 '0')	,
(	4	,	1	,	 'ETA'	,		,	 'ANAPILIS'	,	 'ANAPILIS'	,	 'GO'	,	 0.000000		 0.000000	 '0')	,
(	5	,	2	,	 'ETA'	,	 ''	,	 'ETA TERESINA III E IV'	,	 'TERESINA'	,	 'PI'	,	-5.145.820		-42.804.356	 '0')	,
(	6	,	2	,	 'ETA'	,	 'FLORIANO'	,	 'FLORIANO'	,	 'FLORIANO'	,	 'PI'	,	-6.784.115		-43.020.325	 '0')	,
(	7	,	2	,	 'ETA'	,	 'PARNAIBA'	,	 'PARNAIBA'	,	 'PARNAIBA'	,	 'PI'	,	-2.922.258		-41.759.899	 '0')	,
(	8	,	3	,	 ''	,	 ''	,	 'BARCARENA'	,	 'BARCARENA'	,	 'PA'	,	-1.550.120		-48.739.784	 '0')	,
(	9	,	4	,	 ''	,	 ''	,	 'JOAO PESSOA'	,	 'JOAO PESSOA'	,	 'PB'	,	-7.188.838		-34.916.599	 '0')	,
(	10	,	4	,	 ''	,	 ''	,	 'ITAPISSUMA - XAROPARIA'	,	 'ITAPISSUMA'	,	 'PE'	,	-7.751.601		-34.924.614	 '0')	,
(	11	,	4	,	 ''	,	 ''	,	 'ITAPISSUMA - ETA/ETEI'	,	 'ITAPISSUMA'	,	 'PE'	,	-7.751.803		-34.924.591	 '0')	,
(	12	,	4	,	 ''	,	 ''	,	 'AMBEV - AQUIRAZ'	,	 'AQUIRAZ'	,	 'CE'	,	-4.031.255		-38.511.379	 '0')	,
(	13	,	5	,	 ''	,	 ''	,	 'TIMOTEO'	,	 'TIMOTEO'	,	 'MG'	,	-19.524.406		-42.653.957	 '0')	,
(	14	,	7	,	 ''	,	 ''	,	 'PEDRAS DE FOGO'	,	 'PEDRAS DE FOGO'	,	 'PB'	,	-7.353.080		-35.027.164	 '0')	,
(	15	,	24	,	 ''	,	 ''	,	 'BRASIL KIRIN IGARASSU'	,	 'IGARASSU'	,	 'PE'	,	-7.797.803		-34.928.207	 '0')	,
(	16	,	24	,	 ''	,	 ''	,	 'RECIFE - GUABIRABA'	,	 'RECIFE'	,	 'PE'	,	-7.962.050		-34.923.569	 '0')	,
(	17	,	8	,	 'ETA'	,	 ''	,	 'SAO BRAS (ETA-MORRO DO GAIA)'	,	 'SAO BRAS'	,	 'AL'	,	 0.000000		 0.000000	 '0')	,
(	18	,	8	,	 'ETA'	,	 ''	,	 'ETA-ARAPIRACA'	,	 'ARAPIRACA'	,	 'AL'	,	-9.702.188		-36.689.053	 '0')	,
(	19	,	8	,	 'ETA'	,	 ''	,	 'PILAR'	,	 'PILAR'	,	 'AL'	,	 0.000000		 0.000000	 '0')	,
(	20	,	9	,	 'ETA'	,	 ''	,	 'CUIABA ETA I - CENTRO'	,	 'CUIABA'	,	 'MT'	,	-15.590.573		-56.099.579	 '0')	,
(	21	,	9	,	 'ETA'	,	 ''	,	 'CUIABA ETA II - TIJUCA'	,	 'CUIABA'	,	 'MT'	,	-15.612.831		-56.009.621	 '0')	,
(	22	,	10	,	 'ETA'	,	 'IMPERATRIZ'	,	 'ACAILANDIA ELEVATORIA'	,	 'ACAILANDIA'	,	 'MA'	,	-4.951.724		-47.493.633	 '0')	,
(	23	,	10	,	 'ETA'	,	 ''	,	 'ALCANTARA'	,	 'ALCANTARA'	,	 'MA'	,	-2.358.216		-44.433.590	 '0')	,
(	24	,	10	,	 'ETA'	,	 ''	,	 'ARAIOSES'	,	 'ARAIOSES'	,	 'MA'	,	-2.927.606		-41.912.098	 '0')	,
(	25	,	10	,	 'ETA'	,	 'ITAPECURU MIRIM'	,	 'AREIAS'	,	 'SAO LUIS'	,	 'MA'	,	 0.000000		 0.000000	 '0')	,
(	26	,	10	,	 'ETA'	,	 ''	,	 'AXIXA'	,	 'AXIXA'	,	 'MA'	,	-2.838.270		-44.062.504	 '0')	,
(	27	,	10	,	 'ETA'	,	 'SAO JOAO DOS PATOS'	,	 'BARAO DE GRAJAU'	,	 'BARAO DE GRAJAU'	,	 'MA'	,	-6.758.377		-43.023.521	 '0')	,
(	28	,	10	,	 'ETA'	,	 'PRESIDENTE DUTRA'	,	 'BARRA DO CORDA'	,	 'BARRA DO CORDA'	,	 'MA'	,	 0.000000		 0.000000	 '0')	,
(	29	,	10	,	 'ETA'	,	 'BARREIRINHAS'	,	 'BARREIRINHAS'	,	 'BARREIRINHAS'	,	 'MA'	,	-2.751.021		-42.815.590	 '0')	,
(	30	,	10	,	 'ETA'	,	 ''	,	 'BOM JESUS DAS SELVAS'	,	 'BOM JESUS DAS SELVAS'	,	 'MA'	,	 0.000000		 0.000000	 '0')	,
(	31	,	10	,	 'ETA'	,	 ''	,	 'BREJO'	,	 'BREJO'	,	 'MA'	,	-3.680.676		-42.690.804	 '0')	,
(	32	,	10	,	 'ETA'	,	 ''	,	 'BURITI DE INACIA VAZ'	,	 'SAO LUIS'	,	 'MA'	,	-3.941.579		-42.922.546	 '0')	,
(	33	,	10	,	 'ETA'	,	 ''	,	 'CANTANHEDE'	,	 'CANTANHEDE'	,	 'MA'	,	 0.000000		 0.000000	 '0')	,
(	34	,	10	,	 'ETA'	,	 'CHAPADINHA'	,	 'CHAPADINHA'	,	 'CHAPADINHA'	,	 'MA'	,	-3.743.484		-43.355.366	 '0')	,
(	35	,	10	,	 'ETA'	,	 'SAO JOAO DOS PATOS'	,	 'COLINAS'	,	 'COLINAS'	,	 'MA'	,	-6.034.948		-44.257.141	 '0')	,
(	36	,	10	,	 'ETA'	,	 ''	,	 'DUQUE BACELAR'	,	 'DUQUE BACELAR'	,	 'MA'	,	-4.162.109		-42.942.677	 '0')	,
(	37	,	10	,	 'ETA'	,	 'IMPERATRIZ'	,	 'IMPERATRIZ'	,	 'IMPERATRIZ'	,	 'MA'	,	-5.548.457		-47.476.341	 '0')	,
(	38	,	10	,	 'ETA'	,	 'BACABEIRA'	,	 'ITALUIS'	,	 'ROSARIO'	,	 'MA'	,	-3.027.185		-44.309.307	 '0')	,
(	39	,	10	,	 'ETA'	,	 'ITAPECURU MIRIM'	,	 'ITAPECURU MIRIM'	,	 'ITAPECURU MIRIM'	,	 'MA'	,	-3.409.356		-44.348.652	 '0')	,
(	40	,	10	,	 'ETA'	,	 'SAO JOAO DOS PATOS'	,	 'LORETO'	,	 'LORETO'	,	 'MA'	,	-7.096.935		-45.129.566	 '0')	,
(	41	,	10	,	 'ETA'	,	 ''	,	 'MIRANDA DO NORTE'	,	 'MIRANDA DO NORTE'	,	 'MA'	,	-3.551.040		-44.570.152	 '0')	,
(	42	,	10	,	 'ETA'	,	 'ITAPECURU MIRIM'	,	 'MORROS'	,	 'MORROS'	,	 'MA'	,	-2.862.982		-44.024.715	 '0')	,
(	43	,	10	,	 'ETA'	,	 'CHAPADINHA'	,	 'NINA RODRIGUES'	,	 'NINA RODRIGUES'	,	 'MA'	,	-3.467.111		-43.902.672	 '0')	,
(	44	,	10	,	 'ETA'	,	 'METROPOLITANA'	,	 'PACIENCIA'	,	 'SAO LUIS'	,	 'MA'	,	-2.556.137		-44.210.342	 '0')	,
(	45	,	10	,	 'ETA'	,	 ''	,	 'PEDREIRAS'	,	 'PEDREIRAS'	,	 'MA'	,	-4.574.103		-44.602.966	 '0')	,
(	46	,	10	,	 'ETA'	,	 ''	,	 'PINHEIRO'	,	 'PINHEIRO'	,	 'MA'	,	-2.527.893		-45.083.931	 '0')	,
(	47	,	10	,	 'ETA'	,	 ''	,	 'PIRAPEMAS'	,	 'PIRAPEMAS'	,	 'MA'	,	-3.728.915		-44.229.015	 '0')	,
(	48	,	10	,	 'ETA'	,	 'IMPERATRIZ'	,	 'RIACHAO'	,	 'RIACHAO'	,	 'MA'	,	 0.000000		 0.000000	 '0')	,
(	49	,	10	,	 'ETA'	,	 'METROPOLITANA'	,	 'SACAVEM'	,	 'ACAILANDIA'	,	 'MA'	,	-2.566.225		-44.253.761	 '0')	,
(	50	,	10	,	 'ETA'	,	 ''	,	 'SANTA QUITERIA'	,	 'SANTA QUITERIA DO MARANHAO'	,	 'MA'	,	-3.501.494		-42.562.534	 '0')	,
(	51	,	10	,	 'ETA'	,	 ''	,	 'SAO BENEDITO DO RIO PRETO'	,	 'ACAILANDIA'	,	 'MA'	,	 0.000000		 0.000000	 '0')	,
(	52	,	10	,	 'ETA'	,	 ''	,	 'SAO BERNARDO'	,	 'SAO BERNARDO'	,	 'MA'	,	 0.000000		 0.000000	 '0')	,
(	53	,	10	,	 'ETA'	,	 'SAO JOAO DOS PATOS'	,	 'SAO RAIMUNDO DAS MANGABEIRAS'	,	 'SAO RAIMUNDO DAS MANGABEIRAS'	,	 'MA'	,	-7.024.601		-45.478.180	 '0')	,
(	54	,	10	,	 'ETA'	,	 'COROATA'	,	 'TIMBIRAS'	,	 'TIMBIRAS'	,	 'MA'	,	 0.000000		 0.000000	 '0')	,
(	55	,	10	,	 'ETA'	,	 'DEDREIRAS'	,	 'TRIZIDELA DO VALE'	,	 'TRIZIDELA DO VALE'	,	 'MA'	,	-4.573.576		-44.617.317	 '0')	,
(	56	,	10	,	 'ETA'	,	 ''	,	 'TUTOIA'	,	 'TUTOIA'	,	 'MA'	,	-2.831.900		-42.313.469	 '0')	,
(	57	,	10	,	 'ETA'	,	 ''	,	 'URBANO SANTOS'	,	 'URBANO SANTOS'	,	 'MA'	,	-3.203.851		-43.390.190	 '0')	,
(	58	,	10	,	 'ETA'	,	 'CHAPADINHA'	,	 'VARGEM GRANDE'	,	 'VARGEM GRANDE'	,	 'MA'	,	-3.536.480		-43.912.952	 '0')	,
(	59	,	10	,	 'ETA'	,	 'SANTA INES'	,	 'VITORIA DO MEARIM'	,	 'VITORIA DO MEARIM'	,	 'MA'	,	-3.477.215		-44.867.863	 '0')	,
(	60	,	11	,	 'ETA'	,	 ''	,	 'ALTO ALEGRE'	,	 'ALTO ALEGRE'	,	 'RR'	,	2.835.568		-60.728.600	 '0')	,
(	61	,	11	,	 'ETA'	,	 ''	,	 'CARACARAI'	,	 'CARACARAI'	,	 'RR'	,	1.829.512		-61.132.278	 '0')	,
(	62	,	11	,	 'ETA'	,	 ''	,	 'CAROEBE'	,	 'CAROEBE'	,	 'RR'	,	 0.876169		-59.663.780	 '0')	,
(	63	,	11	,	 'ETA'	,	 ''	,	 'MUCAJAI'	,	 'MUCAJAI'	,	 'RR'	,	2.448.537		-60.918.564	 '0')	,
(	64	,	11	,	 'ETA'	,	 ''	,	 'NORMANDIA'	,	 'NORMANDIA'	,	 'RR'	,	3.878.713		-59.627.720	 '0')	,
(	65	,	11	,	 'ETA'	,	 ''	,	 'PACARAIMA'	,	 'PACARAIMA'	,	 'RR'	,	4.477.306		-61.147.945	 '0')	,
(	66	,	11	,	 'ETA'	,	 ''	,	 'RORAINOPOLIS'	,	 'RORAINOPOLIS'	,	 'RR'	,	 0.941046		-60.423.153	 '0')	,
(	67	,	11	,	 'ETA'	,	 ''	,	 'SAO JOAO DA BALIZA'	,	 'SAO JOAO DA BALIZA'	,	 'RR'	,	 0.950526		-59.909.027	 '0')	,
(	68	,	11	,	 'ETA'	,	 ''	,	 'SAO LUIZ DO ANAUA'	,	 'SAO JOAO DA BALIZA'	,	 'RR'	,	1.010.417		-60.033.619	 '0')	,
(	69	,	11	,	 'ETA'	,	 ''	,	 'SAO PEDRO'	,	 'BOA VISTA'	,	 'RR'	,	2.826.079		-60.658.611	 '0')	,
(	70	,	11	,	 'ETA'	,	 ''	,	 'CANTA - FELIX PINTO'	,	 'CANTA'	,	 'RR'	,	2.113.689		-60.617.462	 '0')	,
(	71	,	12	,	 ''	,	 ''	,	 'ETE - DO BALDO'	,	 'NATAL'	,	 'RN'	,	-5.790.266		-35.211.658	 '0')	,
(	72	,	12	,	 ''	,	 ''	,	 'ETE-PARNAMIRIM'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.935.687		-35.238.407	 '0')	,
(	73	,	12	,	 ''	,	 ''	,	 'EXTREMOZ'	,	 'EXTREMOZ'	,	 'RN'	,	-5.726.227		-35.282.738	 '0')	,
(	74	,	12	,	 ''	,	 ''	,	 'FELIPE CAMARA'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	75	,	12	,	 ''	,	 ''	,	 'FELIPE CAMARAO - P01'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	76	,	12	,	 ''	,	 ''	,	 'FELIPE CAMARAO - P10'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	77	,	12	,	 ''	,	 'CAICO'	,	 'FLORANEA EB4'	,	 'FLORANIA'	,	 'RN'	,	-6.123.033		-36.807.629	 '0')	,
(	78	,	12	,	 ''	,	 ''	,	 'FRANCISCO CAMPOS - P9'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	79	,	12	,	 ''	,	 ''	,	 'FRANCISCO DANTAS'	,	 'FRANCISCO DANTAS'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	80	,	12	,	 ''	,	 ''	,	 'GARGALHEIRAS'	,	 'ACARI'	,	 'RN'	,	-6.427.643		-36.603.317	 '0')	,
(	81	,	12	,	 ''	,	 ''	,	 'GRAMORE'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	82	,	12	,	 ''	,	 ''	,	 'GUARAPES P4'	,	 'NATAL'	,	 'RN'	,	-5.840.658		-35.274.078	 '0')	,
(	83	,	12	,	 ''	,	 ''	,	 'IPANGUACU'	,	 'IPANGUACU'	,	 'RN'	,	-5.508.224		-36.860.958	 '0')	,
(	84	,	12	,	 ''	,	 ''	,	 'IPUEIRA'	,	 'IPUEIRA'	,	 'RN'	,	-6.814.958		-37.201.466	 '0')	,
(	85	,	12	,	 ''	,	 ''	,	 'ITAJA - ADUTORA SERTAO CENTRAL'	,	 'ITAJA'	,	 'RN'	,	-5.631.922		-36.861.080	 '0')	,
(	86	,	12	,	 ''	,	 ''	,	 'ITAU'	,	 'ITAU'	,	 'RN'	,	-5.837.474		-37.987.988	 '0')	,
(	87	,	12	,	 ''	,	 ''	,	 'JANDAIRA'	,	 'JANDAIRA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	88	,	12	,	 ''	,	 ''	,	 'JANDAIRA - P02'	,	 'JANDAIRA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	89	,	12	,	 ''	,	 ''	,	 'JANDAIRA - P03'	,	 'JANDAIRA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	90	,	12	,	 ''	,	 ''	,	 'JANDAIRA - P05'	,	 'JANDAIRA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	91	,	12	,	 ''	,	 ''	,	 'JARDIM DE ANGICOS'	,	 'JARDIM DE ANGICOS'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	92	,	12	,	 ''	,	 ''	,	 'JARDIM DE PIRANHAS - ETA ESCRITORIO LOCAL'	,	 'JARDIM DE PIRANHAS'	,	 'RN'	,	-6.379.478		-37.347.713	 '0')	,
(	93	,	12	,	 ''	,	 ''	,	 'JARDIM DO SERIDO - PASSAGEM DAS TRAIRAS '	,	 'JARDIM DO SERIDO'	,	 'RN'	,	-6.517.459		-36.937.286	 '0')	,
(	94	,	12	,	 ''	,	 ''	,	 'JARDIM PROGRESSO'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	95	,	12	,	 ''	,	 ''	,	 'JERONIMO ROSADO - EB - 1'	,	 'ACU'	,	 'RN'	,	-5.614.988		-36.896.221	 '0')	,
(	96	,	12	,	 ''	,	 ''	,	 'JERONIMO ROSADO - EB - 2'	,	 'MOSSORO'	,	 'RN'	,	-5.236.757		-37.317.406	 '0')	,
(	97	,	12	,	 ''	,	 ''	,	 'JIQUI'	,	 'NATAL'	,	 'RN'	,	-5.917.594		-35.188.408	 '0')	,
(	98	,	12	,	 ''	,	 ''	,	 'JIQUI - P1'	,	 'NATAL'	,	 'RN'	,	-5.862.859		-35.208.191	 '0')	,
(	99	,	12	,	 ''	,	 ''	,	 'JOSE DA PENHA'	,	 'JOSE DA PENHA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	100	,	12	,	 ''	,	 ''	,	 'JUCURUTU'	,	 'JUCURUTU'	,	 'RN'	,	-6.034.464		-37.017.921	 '0')	,
(	101	,	12	,	 ''	,	 ''	,	 'JUNDIA'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	102	,	12	,	 ''	,	 'LITORAL SUL'	,	 'LAGOA NOVA I'	,	 'LAGOA NOVA'	,	 'RN'	,	-5.829.177		-35.212.475	 '0')	,
(	103	,	12	,	 ''	,	 'LITORAL SUL'	,	 'LAGOA NOVA II'	,	 'LAGOA NOVA'	,	 'RN'	,	-5.834.804		-35.205.235	 '0')	,
(	104	,	12	,	 ''	,	 ''	,	 'LAJES - ADUTORA SERTAO CENTRAL'	,	 'LAJES'	,	 'RN'	,	-5.690.947		-36.322.330	 '0')	,
(	105	,	12	,	 ''	,	 ''	,	 'LAJES - CABUGI EB3'	,	 'LAJES'	,	 'RN'	,	-5.690.808		-36.322.197	 '0')	,
(	106	,	12	,	 ''	,	 'LITORAL NORTE'	,	 'MACAIBA - GRANJA RECREIO'	,	 'MACAIBA'	,	 'RN'	,	-5.875.609		-35.308.350	 '0')	,
(	107	,	12	,	 ''	,	 ''	,	 'MACAU - ETA TAMBAUBA'	,	 'MACAU'	,	 'RN'	,	-5.160.642		-36.597.168	 '0')	,
(	108	,	12	,	 ''	,	 ''	,	 'MARCELINO VIEIRA'	,	 'MARCELINO VIEIRA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	109	,	12	,	 ''	,	 ''	,	 'MARTINS'	,	 'MARTINS'	,	 'RN'	,	-6.094.341		-37.912.975	 '0')	,
(	110	,	12	,	 ''	,	 ''	,	 'MEDIO OESTE'	,	 'ACU'	,	 'RN'	,	-5.886.266		-36.995.560	 '0')	,
(	111	,	12	,	 ''	,	 ''	,	 'MONTANHAS'	,	 'MONTANHAS'	,	 'RN'	,	-6.479.974		-35.293.602	 '0')	,
(	112	,	12	,	 ''	,	 ''	,	 'MONTE ALEGRE'	,	 'MONTE ALEGRE'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	113	,	12	,	 ''	,	 ''	,	 'MOSSORO'	,	 'MOSSORO'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	114	,	12	,	 'ETA'	,	 ''	,	 'BOMFIM - ADUT. MONSEN. EXP.'	,	 'NISIA FLORESTA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	115	,	12	,	 ''	,	 ''	,	 'NOVA CRUZ'	,	 'NOVA CRUZ'	,	 'RN'	,	-6.486.340		-35.427.444	 '0')	,
(	116	,	12	,	 ''	,	 ''	,	 'NOVA PARNAMIRIM - P11'	,	 'PARNAMIRIM'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	117	,	12	,	 ''	,	 ''	,	 'NOVA PARNAMIRIM - P20'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.882.545		-35.203.529	 '0')	,
(	118	,	12	,	 ''	,	 ''	,	 'NOVA PARNAMIRIM - P29'	,	 'PARNAMIRIM'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	119	,	12	,	 ''	,	 ''	,	 'NOVO CAMPO - P1'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	120	,	12	,	 ''	,	 ''	,	 'OURO BRANCO ETA'	,	 'OURO BRANCO'	,	 'RN'	,	-6.709.446		-36.950.195	 '0')	,
(	121	,	12	,	 ''	,	 ''	,	 'P20 - ZONA NORTE'	,	 'NATAL'	,	 'RN'	,	-5.739.146		-35.281.494	 '0')	,
(	122	,	12	,	 ''	,	 ''	,	 'P36 - ZONA NORTE'	,	 'NATAL'	,	 'RN'	,	-5.752.538		-35.256.432	 '0')	,
(	123	,	12	,	 ''	,	 ''	,	 'P56 - ZONA NORTE'	,	 'NATAL'	,	 'RN'	,	-5.747.615		-35.230.343	 '0')	,
(	124	,	12	,	 ''	,	 ''	,	 'P6 - MOSSORO'	,	 'MOSSORO'	,	 'RN'	,	-5.176.987		-37.361.362	 '0')	,
(	125	,	12	,	 ''	,	 ''	,	 'PALMA'	,	 'CAICO'	,	 'RN'	,	-6.629.918		-37.150.017	 '0')	,
(	126	,	12	,	 ''	,	 ''	,	 'PARELHAS'	,	 'PARELHAS'	,	 'RN'	,	-6.694.707		-36.631.153	 '0')	,
(	127	,	12	,	 ''	,	 ''	,	 'PARNAMIRIM - LAGOA DO BONFIM'	,	 'PARNAMIRIM'	,	 'RN'	,	-6.041.800		-35.226.910	 '0')	,
(	128	,	12	,	 ''	,	 ''	,	 'PARNAMIRIM I'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.921.245		-35.263.969	 '0')	,
(	129	,	12	,	 ''	,	 ''	,	 'PARNAMIRIM II - RIACHO VERMELHO'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.933.109		-35.272.118	 '0')	,
(	130	,	12	,	 ''	,	 ''	,	 'PARQUE DAS DUNAS'	,	 'NATAL'	,	 'RN'	,	-5.811.206		-35.193.588	 '0')	,
(	131	,	12	,	 ''	,	 ''	,	 'PAU DOS FERROS'	,	 'PAU DOS FERROS'	,	 'RN'	,	-6.146.026		-38.193.680	 '0')	,
(	132	,	12	,	 ''	,	 ''	,	 'PEDRO VELHO'	,	 'PEDRO VELHO'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	133	,	12	,	 ''	,	 'ASSU'	,	 'PENDENCIAS'	,	 'PENDENCIAS'	,	 'RN'	,	-5.263.701		-36.715.836	 '0')	,
(	134	,	12	,	 ''	,	 ''	,	 'PILOES'	,	 'PILOES'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	135	,	12	,	 ''	,	 ''	,	 'PIRANGI'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	136	,	12	,	 ''	,	 ''	,	 'PLANALTO'	,	 'PAU DOS FERROS'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	137	,	12	,	 ''	,	 ''	,	 'PLANALTO - P01'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	138	,	12	,	 ''	,	 ''	,	 'PLANALTO - P02'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	139	,	12	,	 ''	,	 ''	,	 'PLANALTO - P03'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	140	,	12	,	 ''	,	 ''	,	 'PLANALTO - P05'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	141	,	12	,	 ''	,	 ''	,	 'PLANALTO P7'	,	 'NATAL'	,	 'RN'	,	-5.835.817		-35.262.245	 '0')	,
(	142	,	12	,	 ''	,	 ''	,	 'PLANALTO P9'	,	 'NATAL'	,	 'RN'	,	-5.835.473		-35.265.774	 '0')	,
(	143	,	12	,	 ''	,	 ''	,	 'PONTA NEGRA'	,	 'NATAL'	,	 'RN'	,	-5.880.593		-35.182.579	 '0')	,
(	144	,	12	,	 ''	,	 ''	,	 'PORTALEGRE'	,	 'PORTALEGRE'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	145	,	12	,	 ''	,	 ''	,	 'POTENGI - ALTO DA TORRE'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	146	,	12	,	 ''	,	 ''	,	 'POTENGI - POCO 35'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	147	,	12	,	 ''	,	 ''	,	 'POTENGI - POCO 44'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	148	,	12	,	 ''	,	 ''	,	 'PUREZA'	,	 'PUREZA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	149	,	12	,	 ''	,	 ''	,	 'REDINHA P57'	,	 'NATAL'	,	 'RN'	,	-5.746.898		-35.233.395	 '0')	,
(	150	,	12	,	 ''	,	 ''	,	 'RIACHUELO'	,	 'RIACHUELO'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	151	,	12	,	 ''	,	 ''	,	 'RIO BAHIA P2'	,	 'NATAL'	,	 'RN'	,	-5.840.006		-35.276.421	 '0')	,
(	152	,	12	,	 ''	,	 ''	,	 'RODOLFO FERNANDES'	,	 'RODOLFO FERNANDES'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	153	,	12	,	 ''	,	 ''	,	 'SAN VALE - P1'	,	 'NATAL'	,	 'RN'	,	-5.854.503		-35.217.350	 '0')	,
(	154	,	12	,	 ''	,	 ''	,	 'SANTA CRUZ - EB - 16'	,	 'SANTA CRUZ'	,	 'RN'	,	-6.247.140		-35.966.255	 '0')	,
(	155	,	12	,	 ''	,	 ''	,	 'SANTA FE'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	156	,	12	,	 ''	,	 ''	,	 'SANTA TEREZA - P28'	,	 'PARNAMIRIM'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	157	,	12	,	 ''	,	 ''	,	 'SANTANA DO MATOS'	,	 'SANTANA DO MATOS'	,	 'RN'	,	-5.966.830		-36.660.728	 '0')	,
(	158	,	12	,	 ''	,	 ''	,	 'SANTANA DO SERIDO'	,	 'SANTANA DO SERIDO'	,	 'RN'	,	-6.772.065		-36.735.142	 '0')	,
(	159	,	12	,	 ''	,	 ''	,	 'SAO FERNANDO'	,	 'SAO FERNANDO'	,	 'RN'	,	-6.376.203		-37.185.177	 '0')	,
(	160	,	12	,	 ''	,	 ''	,	 'SAO JOAO DO SABUGI'	,	 'SAO JOAO DO SABUGI'	,	 'RN'	,	-6.717.617		-37.204.346	 '0')	,
(	161	,	12	,	 ''	,	 ''	,	 'SAO JOSE DO MIPIBU'	,	 'SAO JOSE DE MIPIBU'	,	 'RN'	,	-6.075.261		-35.232.292	 '0')	,
(	162	,	12	,	 ''	,	 ''	,	 'SAO MIGUEL'	,	 'SAO MIGUEL'	,	 'RN'	,	-6.215.470		-38.429.302	 '0')	,
(	163	,	12	,	 ''	,	 ''	,	 'SAO RAFAEL'	,	 'SAO RAFAEL'	,	 'RN'	,	-5.802.804		-36.879.539	 '0')	,
(	164	,	12	,	 ''	,	 ''	,	 'ETE SAO TOME'	,	 'SAO TOME'	,	 'RN'	,	-5.973.583		-36.070.179	 '0')	,
(	165	,	12	,	 ''	,	 ''	,	 'SERRA DE SANTANA'	,	 'FLORANIA'	,	 'RN'	,	-5.964.889		-36.954.777	 '0')	,
(	166	,	12	,	 ''	,	 ''	,	 'SERRINHA DOS PINTOS'	,	 'SERRINHA DOS PINTOS'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	167	,	12	,	 ''	,	 ''	,	 'TORRES P5'	,	 'NATAL'	,	 'RN'	,	-5.844.617		-35.272.537	 '0')	,
(	168	,	12	,	 ''	,	 'LITORAL SUL'	,	 'TOUROS - BOQUEIRAO'	,	 'NATAL'	,	 'RN'	,	-5.251.721		-35.532.681	 '0')	,
(	169	,	12	,	 ''	,	 ''	,	 'UMARIZAL'	,	 'UMARIZAL'	,	 'RN'	,	-5.990.386		-37.818.409	 '0')	,
(	170	,	12	,	 ''	,	 ''	,	 'VERA CRUZ'	,	 'VERA CRUZ'	,	 'RN'	,	-6.041.006		-35.447.571	 '0')	,
(	171	,	12	,	 ''	,	 ''	,	 'ZONA NORTE - P23'	,	 'NATAL'	,	 'RN'	,	-5.739.787		-35.225.937	 '0')	,
(	172	,	12	,	 ''	,	 ''	,	 'ZONA NORTE - P57'	,	 'NATAL'	,	 'RN'	,	-5.746.871		-35.233.341	 '0')	,
(	173	,	12	,	 ''	,	 ''	,	 'ZONA NORTE - POCO 37'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	174	,	12	,	 ''	,	 'NORTE'	,	 'ZONA-16'	,	 'NATAL'	,	 'RN'	,	-5.726.904		-35.248.547	 '0')	,
(	175	,	12	,	 ''	,	 ''	,	 'CAJUPIRANGA  - P68'	,	 'PARNAMIRIM'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	176	,	12	,	 ''	,	 ''	,	 'SAO JOSE DO SERIDO'	,	 'SAO JOSE DO SERIDO'	,	 'RN'	,	-6.450.280		-36.876.423	 '0')	,
(	177	,	12	,	 ''	,	 ''	,	 'JARDIM DE PIRANHAS - MANOEL TORRES EB1'	,	 'JARDIM DE PIRANHAS'	,	 'RN'	,	-6.377.249		-37.353.966	 '0')	,
(	178	,	12	,	 ''	,	 ''	,	 'ACARI'	,	 'ACARI'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	179	,	12	,	 ''	,	 ''	,	 'ADUTORA DO BOQUEIRAO'	,	 'RIACHO DA CRUZ'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	180	,	12	,	 ''	,	 ''	,	 'ALTO RODRIGUES'	,	 'ALTO DO RODRIGUES'	,	 'RN'	,	-5.301.509		-36.764.786	 '0')	,
(	181	,	12	,	 ''	,	 ''	,	 'ANGICOS - CENTRO'	,	 'ANGICOS'	,	 'RN'	,	-5.673.222		-36.601.894	 '0')	,
(	182	,	12	,	 ''	,	 ''	,	 'ANGICOS - EB2'	,	 'ANGICOS'	,	 'RN'	,	-5.676.878		-36.620.342	 '0')	,
(	183	,	12	,	 ''	,	 ''	,	 'ANGICOS- ADUTORA CENTAL'	,	 'ANGICOS'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	184	,	12	,	 ''	,	 ''	,	 'APODI'	,	 'APODI'	,	 'RN'	,	-5.660.190		-37.798.222	 '0')	,
(	185	,	12	,	 ''	,	 ''	,	 'AREIA BRANCA'	,	 'AREIA BRANCA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	186	,	12	,	 ''	,	 ''	,	 'ASSU'	,	 'ACU'	,	 'RN'	,	-5.578.661		-36.926.968	 '0')	,
(	187	,	12	,	 ''	,	 ''	,	 'BOA SAUDE'	,	 'BOA SAUDE'	,	 'RN'	,	-6.138.397		-35.577.309	 '0')	,
(	188	,	12	,	 ''	,	 ''	,	 'BOM JESUS - EB - 8'	,	 'BOM JESUS'	,	 'RN'	,	-5.954.113		-35.603.737	 '0')	,
(	189	,	12	,	 ''	,	 ''	,	 'BRASIL NOVO'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	190	,	12	,	 ''	,	 'CAICO'	,	 'CAICO'	,	 'CAICO'	,	 'RN'	,	-6.467.562		-37.092.373	 '0')	,
(	191	,	12	,	 ''	,	 ''	,	 'PARQUE INDUSTRIAL P63'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.882.027		-35.233.418	 '0')	,
(	192	,	12	,	 ''	,	 ''	,	 'PARNAMIRIM P28'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.933.479		-35.287.472	 '0')	,
(	193	,	12	,	 ''	,	 ''	,	 'PARNAMIRIM P09'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.920.757		-35.269.436	 '0')	,
(	194	,	12	,	 ''	,	 ''	,	 'CAICO ZONA NORTE'	,	 'CAICO'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	195	,	12	,	 ''	,	 ''	,	 'OURO BRANCO - POCO'	,	 'OURO BRANCO'	,	 'RN'	,	-6.698.626		-36.942.093	 '0')	,
(	196	,	12	,	 ''	,	 ''	,	 'PARNAMIRIM VALE DO SOL P13'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.931.838		-35.274.136	 '0')	,
(	197	,	12	,	 ''	,	 ''	,	 'MOSSORO P1'	,	 'MOSSORO'	,	 'RN'	,	-5.191.712		-37.346.638	 '0')	,
(	198	,	12	,	 ''	,	 ''	,	 'CERRO CORA ETA CAPTACAO'	,	 'CERRO CORA'	,	 'RN'	,	-6.010.731		-36.318.989	 '0')	,
(	199	,	12	,	 ''	,	 ''	,	 'PARNAMIRIM - BOA ESPERANCA P04 '	,	 'PARNAMIRIM'	,	 'RN'	,	-5.923.095		-35.259.815	 '0')	,
(	200	,	12	,	 ''	,	 ''	,	 'CAMPO REDONDO'	,	 'CAMPO REDONDO'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	201	,	12	,	 ''	,	 ''	,	 'NOVA PARNAMIRIM P12'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.898.279		-35.194.454	 '0')	,
(	202	,	12	,	 ''	,	 ''	,	 'VILA DE PONTA NEGRA P15'	,	 'NATAL'	,	 'RN'	,	-5.888.117		-35.187.222	 '0')	,
(	203	,	12	,	 ''	,	 ''	,	 'PARNAMIRIM P06'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.899.502		-35.260.719	 '0')	,
(	204	,	12	,	 ''	,	 ''	,	 'PARNAMIRIM P61'	,	 'PARNAMIRIM'	,	 'RN'	,	-5.900.138		-35.260.204	 '0')	,
(	205	,	12	,	 ''	,	 ''	,	 'CANDELARIA'	,	 'NATAL'	,	 'RN'	,	-5.839.089		-35.220.921	 '0')	,
(	206	,	12	,	 ''	,	 ''	,	 'TIMBAUBA DOS BATISTAS'	,	 'TIMBAUBA DOS BATISTAS'	,	 'RN'	,	-6.462.102		-37.273.888	 '0')	,
(	207	,	12	,	 ''	,	 ''	,	 'MOEMA TINOCO P21'	,	 'NATAL'	,	 'RN'	,	-5.744.128		-35.224.598	 '0')	,
(	208	,	12	,	 ''	,	 ''	,	 'CANGUARETAMA'	,	 'CANGUARETAMA'	,	 'RN'	,	-6.378.178		-35.128.792	 '0')	,
(	209	,	12	,	 ''	,	 ''	,	 'JARDIM DO SERIDO RESERVATORIO'	,	 'JARDIM DO SERIDO'	,	 'RN'	,	-6.590.697		-36.766.834	 '0')	,
(	210	,	12	,	 ''	,	 ''	,	 'ZANGARELHAS - JARDIM DO SERIDO'	,	 'JARDIM DO SERIDO'	,	 'RN'	,	-6.595.504		-36.754.318	 '0')	,
(	211	,	12	,	 ''	,	 ''	,	 'CARAUBAS'	,	 'CARAUBAS'	,	 'RN'	,	-5.634.111		-37.536.995	 '0')	,
(	212	,	12	,	 ''	,	 ''	,	 'CARNAUBAIS'	,	 'CARNAUBAIS'	,	 'RN'	,	-5.339.771		-36.830.570	 '0')	,
(	213	,	12	,	 ''	,	 ''	,	 'CARNAUBAS-PALMA'	,	 'CARNAUBAIS'	,	 'RN'	,	-6.629.867		-37.150.093	 '0')	,
(	214	,	12	,	 ''	,	 ''	,	 'ETE MACAIBA'	,	 'MACAIBA'	,	 'RN'	,	-5.886.575		-35.285.889	 '0')	,
(	215	,	12	,	 ''	,	 ''	,	 'CERRO CORA ETA LOCAL'	,	 'CERRO CORA'	,	 'RN'	,	-6.036.826		-36.347.729	 '0')	,
(	216	,	12	,	 ''	,	 ''	,	 'CIDADE CAMPESTRE - P78'	,	 'PARNAMIRIM'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	217	,	12	,	 ''	,	 ''	,	 'CIDADE DOS BOSQUES - P17'	,	 'PARNAMIRIM'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	218	,	12	,	 ''	,	 ''	,	 'ENCANTO'	,	 'ENCANTO'	,	 'RN'	,	-6.116.956		-38.318.932	 '0')	,
(	219	,	12	,	 ''	,	 'LITORAL SUL'	,	 'CIDADE SATELITE'	,	 'NATAL'	,	 'RN'	,	-5.863.895		-35.231.113	 '0')	,
(	220	,	12	,	 ''	,	 ''	,	 'CIDADE SATELITE - P9'	,	 'NATAL'	,	 'RN'	,	-5.860.962		-35.243.488	 '0')	,
(	221	,	12	,	 ''	,	 ''	,	 'CONJUNTO JIQUI - P2'	,	 'NATAL'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	222	,	12	,	 ''	,	 ''	,	 'GOIANINHA - POCO CENTRO (P1, P2, P3, P4)'	,	 'GOIANINHA'	,	 'RN'	,	-6.266.547		-35.207.710	 '0')	,
(	223	,	12	,	 ''	,	 ''	,	 'ALTO GOIANINHA - POCO P16'	,	 'GOIANINHA'	,	 'RN'	,	-6.284.220		-35.194.126	 '0')	,
(	224	,	12	,	 ''	,	 ''	,	 'ASSU - ZE DA VOLTA '	,	 'ASSU'	,	 'RN'	,	-5.497.604		-37.149.181	 '0')	,
(	225	,	12	,	 ''	,	 ''	,	 'CRUZETA - CAPITACAO'	,	 'CRUZETA'	,	 'RN'	,	-6.411.442		-36.795.498	 '0')	,
(	226	,	12	,	 ''	,	 ''	,	 'ETE NOVA CRUZ'	,	 'NOVA CRUZ'	,	 'RN'	,	-6.471.118		-35.426.743	 '0')	,
(	227	,	12	,	 ''	,	 ''	,	 'AFONSO BEZERRA'	,	 'AFONSO BEZERRA'	,	 'RN'	,	-5.499.899		-36.504.940	 '0')	,
(	228	,	12	,	 ''	,	 ''	,	 'CRUZETA - ESCRITORIO'	,	 'CRUZETA'	,	 'RN'	,	-6.412.845		-36.788.143	 '0')	,
(	229	,	12	,	 ''	,	 ''	,	 'CURRAIS NOVOS'	,	 'CURRAIS NOVOS'	,	 'RN'	,	-6.255.099		-36.523.403	 '0')	,
(	230	,	12	,	 ''	,	 ''	,	 'DIX-SEPT ROSADO'	,	 'GOVERNADOR DIX-SEPT ROSADO'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	231	,	12	,	 ''	,	 ''	,	 'Dr. SEVERIANO'	,	 'DOUTOR SEVERIANO'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	232	,	12	,	 ''	,	 ''	,	 'ELOI DE SOUSA - EB - 10'	,	 'SENADOR ELOI DE SOUZA'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	233	,	12	,	 ''	,	 ''	,	 'EMAUS - P90'	,	 'PARNAMIRIM'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	234	,	12	,	 ''	,	 ''	,	 'ENTRONCAMENTO'	,	 'NATAL'	,	 'RN'	,	-5.582.748		-35.656.101	 '0')	,
(	235	,	12	,	 ''	,	 ''	,	 'EQUADOR'	,	 'EQUADOR'	,	 'RN'	,	 0.000000		 0.000000	 '0')	,
(	236	,	12	,	 ''	,	 ''	,	 'ESPIRITO SANTO I'	,	 'ESPIRITO SANTO'	,	 'RN'	,	-6.335.055		-35.299.271	 '0')	,
(	237	,	12	,	 ''	,	 ''	,	 'ESPIRITO SANTO II VARZEA'	,	 'ESPIRITO SANTO'	,	 'RN'	,	-6.334.081		-35.371.559	 '0')	,
(	238	,	12	,	 ''	,	 ''	,	 'CALDEIRAO - SANTANA DO SERIDO'	,	 'SANTANA DO SERIDO'	,	 'RN'	,	-6.705.054		-36.693.947	 '0')	,
(	239	,	13	,	 ''	,	 ''	,	 'MACAPA'	,	 'MACAPA'	,	 'AP'	,	 0.023398		-51.060.429	 '0')	,
(	240	,	13	,	 ''	,	 ''	,	 'ETA DE SATANA'	,	 'MACAPA'	,	 'AP'	,	 -0.041328		-51.167.416	 '0')	,
(	241	,	14	,	 ''	,	 ''	,	 'ETA OESTE'	,	 'CAUCAIA'	,	 'CE'	,	-3.787.082		-38.656.261	 '0')	,
(	242	,	14	,	 'ETA'	,	 ''	,	 'PAVUNA'	,	 'PACATUBA'	,	 'CE'	,	-3.915.401		-38.599.785	 '0')	,
(	243	,	14	,	 'ETA'	,	 ''	,	 'ETA GAVIAO'	,	 'PACATUBA'	,	 'CE'	,	-3.902.219		-38.558.228	 '0')	,
(	244	,	14	,	 'ETA'	,	 'BSA'	,	 'QUITAIUS - LAVRAS DA MANGABEIRA'	,	 'LAVRAS DA MANGABEIRA'	,	 'CE'	,	-6.887.202		-39.089.886	 '0')	,
(	245	,	14	,	 'ETA'	,	 'BSA'	,	 'VARZEA ALEGRE'	,	 'VARZEA ALEGRE'	,	 'CE'	,	-6.787.503		-39.376.095	 '0')	,
(	246	,	14	,	 'ETA'	,	 'BSA'	,	 'NOVA OLINDA'	,	 'NOVA OLINDA'	,	 'CE'	,	-7.096.500		-39.678.501	 '0')	,
(	247	,	14	,	 'ETE'	,	 ''	,	 'ETE PAJUCARA'	,	 'MARACANAU'	,	 'CE'	,	-3.867.355		-38.576.622	 '0')	,
(	248	,	14	,	 'ETA'	,	 ''	,	 'ITAITINGA'	,	 'ITAITINGA'	,	 'CE'	,	-3.977.888		-38.533.688	 '0')	,
(	249	,	14	,	 'ETA'	,	 ''	,	 'HORIZONTE'	,	 'HORIZONTE'	,	 'CE'	,	-4.075.646		-38.517.559	 '0')	,
(	250	,	14	,	 'ETA'	,	 ''	,	 'AQUIRAZ'	,	 'AQUIRAZ'	,	 'CE'	,	-3.909.402		-38.379.578	 '0')	,
(	251	,	14	,	 'ETA'	,	 ''	,	 'AQUIRAZ RIVIERA'	,	 'AQUIRAZ'	,	 'CE'	,	-3.934.316		-38.341.190	 '0')	,
(	252	,	14	,	 'ETA'	,	 ''	,	 'CASCAVEL'	,	 'CASCAVEL'	,	 'CE'	,	-4.139.992		-38.241.932	 '0')	,
(	253	,	14	,	 'ETA'	,	 ''	,	 'SAPUPARA'	,	 'MARANGUAPE'	,	 'CE'	,	-3.972.722		-38.742.310	 '0')	,
(	254	,	14	,	 'ETA'	,	 ''	,	 'BATURITE'	,	 'BATURITE'	,	 'CE'	,	-4.324.865		-38.886.284	 '0')	,
(	255	,	14	,	 'ETA'	,	 ''	,	 'JABURU'	,	 'TIANGUA'	,	 'CE'	,	-3.837.670		-41.094.627	 '0')	,
(	256	,	14	,	 'ETA'	,	 ''	,	 'ARACOIABA'	,	 'ARACOIABA'	,	 'CE'	,	-4.401.255		-38.717.354	 '0')	,
(	257	,	14	,	 'ETA'	,	 ''	,	 'ITAUNA - CHAVAL/BARROQUINHA'	,	 'CHAVAL'	,	 'CE'	,	-3.149.269		-41.163.757	 '0')	,
(	258	,	14	,	 'ETA'	,	 ''	,	 'PIRES FERREIRA -ETA MARRUAS DOS ROSAS'	,	 'PIRES FERREIRA'	,	 'CE'	,	-4.307.998		-40.547.813	 '0')	,
(	259	,	14	,	 'ETA'	,	 ''	,	 'JENIPAPEIRO'	,	 'JENIPAPEIRO'	,	 'CE'	,	-6.676.460		-38.753.616	 '0')	,
(	260	,	14	,	 'ETA'	,	 ''	,	 'PARAMOTI'	,	 'PARAMOTI'	,	 'CE'	,	-4.097.563		-39.238.438	 '0')	,
(	261	,	14	,	 'ETA'	,	 ''	,	 'JUAZEIRO DO NORTE - ESCRITORIO CENTRAL'	,	 'JUAZEIRO DO NORTE'	,	 'CE'	,	-7.230.097		-39.321.659	 '0')	,
(	262	,	14	,	 'ETA'	,	 ''	,	 'REDENCAO'	,	 'RENDENCAO'	,	 'CE'	,	-4.191.745		-38.794.640	 '0')	,
(	263	,	14	,	 'ETA'	,	 ''	,	 'CATUANA'	,	 'CATUANA'	,	 'CE'	,	-3.682.571		-38.920.040	 '0')	,
(	264	,	14	,	 'ETA'	,	 ''	,	 'PECEM'	,	 'PECEM'	,	 'CE'	,	-3.555.881		-38.824.612	 '0')	,
(	265	,	14	,	 'ETA'	,	 ''	,	 'PENTECOSTE'	,	 'PENTECOSTE'	,	 'CE'	,	-3.797.240		-39.267.445	 '0')	,
(	266	,	14	,	 'ETA'	,	 ''	,	 'SAO LUIS DO CURU'	,	 'SAO LUIS DO CURU'	,	 'CE'	,	-3.674.576		-39.238.110	 '0')	,
(	267	,	14	,	 'ETA'	,	 ''	,	 'UMIRIM'	,	 'UMIRIM'	,	 'CE'	,	-3.740.381		-39.358.032	 '0')	,
(	268	,	14	,	 'ETA'	,	 ''	,	 'URUBURETAMA'	,	 'URUBURETAMA'	,	 'CE'	,	-3.631.222		-39.517.429	 '0')	,
(	269	,	14	,	 'ETA'	,	 ''	,	 'VARJOTA'	,	 'VARJOTA'	,	 'CE'	,	-4.210.232		-40.462.196	 '0')	,
(	270	,	14	,	 'ETA'	,	 ''	,	 'IRAUCUBA'	,	 'IRAUCUBA'	,	 'CE'	,	-3.745.984		-39.774.532	 '0')	,
(	271	,	14	,	 'ETA'	,	 ''	,	 'MIRAIMA'	,	 'MIRAIMA'	,	 'CE'	,	-3.569.183		-39.971.424	 '0')	,
(	272	,	14	,	 'ETA'	,	 ''	,	 'FORQUILHA'	,	 'FORQUILHA'	,	 'CE'	,	-3.799.382		-40.256.470	 '0')	,
(	273	,	14	,	 'ETA'	,	 ''	,	 'ITAPIPOCA II'	,	 'ITAPIPOCA'	,	 'CE'	,	-3.503.129		-39.581.059	 '0')	,
(	274	,	14	,	 'ETA'	,	 ''	,	 'MARCO'	,	 'MARCO'	,	 'CE'	,	-3.125.099		-40.151.142	 '0')	,
(	275	,	14	,	 'ETA'	,	 ''	,	 'BELA CRUZ'	,	 'BELA CRUZ'	,	 'CE'	,	-3.056.019		-40.176.579	 '0')	,
(	276	,	14	,	 'ETA'	,	 ''	,	 'MORRINHOS'	,	 'MORRINHOS'	,	 'CE'	,	-3.230.377		-40.132.656	 '0')	,
(	277	,	14	,	 'ETA'	,	 ''	,	 'HIDROLANDIA'	,	 'HIDROLANDIA'	,	 'CE'	,	-4.360.410		-40.469.280	 '0')	,
(	278	,	14	,	 'ETA'	,	 ''	,	 'IPAGUACU'	,	 'IPAGUACU'	,	 'CE'	,	-3.509.380		-40.278.725	 '0')	,
(	279	,	14	,	 'ETA'	,	 ''	,	 'GROAIRAS'	,	 'GROAIRAS'	,	 'CE'	,	-3.904.063		-40.402.130	 '0')	,
(	280	,	14	,	 'ETA'	,	 ''	,	 'SANTANA DO ACARAU'	,	 'SANTANA DO ACARAU'	,	 'CE'	,	-3.457.453		-40.217.594	 '0')	,
(	281	,	14	,	 'ETA'	,	 ''	,	 'MORAUJO - VARZEA DA VOLTA'	,	 'MORAUJO'	,	 'CE'	,	-3.501.889		-40.615.623	 '0')	,
(	282	,	14	,	 'ETA'	,	 ''	,	 'UBAUNA'	,	 'UBAUNA'	,	 'CE'	,	-3.737.034		-40.686.741	 '0')	,
(	283	,	14	,	 'ETA'	,	 ''	,	 'SERRA DO FELIX'	,	 'BEBERIBE'	,	 'CE'	,	-4.461.232		-38.150.440	 '0')	,
(	284	,	14	,	 'ETA'	,	 ''	,	 'PALHANO'	,	 'PALHANO'	,	 'CE'	,	-4.736.352		-37.965.450	 '0')	,
(	285	,	14	,	 'ETA'	,	 ''	,	 'JAGUARUANA'	,	 'JAGUARUANA'	,	 'CE'	,	-4.849.774		-37.783.184	 '0')	,
(	286	,	14	,	 'ETA'	,	 ''	,	 'QUIXERE'	,	 'QUIXERE'	,	 'CE'	,	-5.074.149		-38.006.786	 '0')	,
(	287	,	14	,	 'ETA'	,	 ''	,	 'MARTINOPOLIS'	,	 'MARTINOPOLIS'	,	 'CE'	,	-3.225.841		-40.693.375	 '0')	,
(	288	,	14	,	 'ETA'	,	 ''	,	 'ITAICABA'	,	 'ITAICABA'	,	 'CE'	,	-4.683.009		-37.822.403	 '0')	,
(	289	,	14	,	 'ETA'	,	 ''	,	 'RUSSAS'	,	 'RUSSAS'	,	 'CE'	,	-4.931.193		-37.989.349	 '0')	,
(	290	,	14	,	 'ETA'	,	 ''	,	 'ARACATI - ETA PEDREGAL'	,	 'ARACATI'	,	 'CE'	,	-4.574.893		-37.788.322	 '0')	,
(	291	,	14	,	 'ETA'	,	 ''	,	 'TABULEIRO DO NORTE'	,	 'TABULEIRO DO NORTE'	,	 'CE'	,	-5.215.658		-38.136.024	 '0')	,
(	292	,	14	,	 'ETA'	,	 ''	,	 'ARACATI CUMBI'	,	 'ARACATI CUMBI'	,	 'CE'	,	 0.000000		 0.000000	 '0')	,
(	293	,	14	,	 'ETA'	,	 ''	,	 'ALTO SANTO'	,	 'ALTO SANTO'	,	 'CE'	,	-5.518.147		-38.271.553	 '0')	,
(	294	,	14	,	 'ETA'	,	 ''	,	 'POTIRETAMA'	,	 'POTIRETAMA'	,	 'CE'	,	-5.724.499		-38.164.639	 '0')	,
(	295	,	14	,	 'ETA'	,	 ''	,	 'CAPISTRANO'	,	 'CAPISTRANO'	,	 'CE'	,	-4.467.060		-38.905.315	 '0')	,
(	296	,	14	,	 'ETA'	,	 ''	,	 'PEREIRO'	,	 'PEREIRO'	,	 'CE'	,	-6.049.304		-38.460.529	 '0')	,
(	297	,	14	,	 'ETA'	,	 ''	,	 'ITAPIUNA'	,	 'ITAPIUNA'	,	 'CE'	,	-4.568.988		-38.920.986	 '0')	,
(	298	,	14	,	 'ETA'	,	 ''	,	 'IRACEMA'	,	 'IRACEMA'	,	 'CE'	,	-5.814.174		-38.304.470	 '0')	,
(	299	,	14	,	 'ETA'	,	 ''	,	 'SENADOR POMPEU'	,	 'SENADOR POMPEU'	,	 'CE'	,	-5.592.135		-39.380.157	 '0')	,
(	300	,	14	,	 'ETA'	,	 ''	,	 'JAGUARETAMA'	,	 'JAGUARETAMA'	,	 'CE'	,	-5.610.496		-38.764.698	 '0')	,
(	301	,	14	,	 'ETA'	,	 ''	,	 'QUIXADA'	,	 'QUIXADA'	,	 'CE'	,	-4.961.230		-39.025.826	 '0')	,
(	302	,	14	,	 'ETA'	,	 ''	,	 'MOMBACA'	,	 'MOMBACA'	,	 'CE'	,	-5.738.293		-39.634.735	 '0')	,
(	303	,	14	,	 'ETA'	,	 ''	,	 'TAMBORIL'	,	 'TAMBORIL'	,	 'CE'	,	-4.820.853		-40.362.267	 '0')	,
(	304	,	14	,	 'ETA'	,	 ''	,	 'INDENPENDENCIA'	,	 'INDENPENDENCIA'	,	 'CE'	,	-5.382.274		-40.300.858	 '0')	,
(	305	,	14	,	 'ETA'	,	 ''	,	 'MONSENHOR TABOSA'	,	 'MONSENHOR TABOSA'	,	 'CE'	,	-4.793.090		-40.063.301	 '0')	,
(	306	,	14	,	 'ETA'	,	 ''	,	 'CRATEUS'	,	 'CRATEUS'	,	 'CE'	,	-5.185.697		-40.675.968	 '0')	,
(	307	,	14	,	 'ETA'	,	 ''	,	 'QUITERIANOPOLIS'	,	 'QUITERIANOPOLIS'	,	 'CE'	,	-5.843.219		-40.706.646	 '0')	,
(	308	,	14	,	 'ETA'	,	 ''	,	 'CATUNDA'	,	 'CATUNDA'	,	 'CE'	,	-4.661.731		-40.199.062	 '0')	,
(	309	,	14	,	 'ETA'	,	 ''	,	 'NOVO ORIENTE'	,	 'NOVO ORIENTE'	,	 'CE'	,	-5.546.481		-40.773.415	 '0')	,
(	310	,	14	,	 'ETA'	,	 ''	,	 'TAUA'	,	 'TAUA'	,	 'CE'	,	-5.991.643		-40.291.363	 '0')	,
(	311	,	14	,	 'ETA'	,	 ''	,	 'CATARINA'	,	 'CATARINA'	,	 'CE'	,	-6.149.894		-39.887.375	 '0')	,
(	312	,	14	,	 'ETA'	,	 ''	,	 'SANTA QUITERIA'	,	 'SANTA QUITERIA'	,	 'CE'	,	-4.238.398		-40.067.844	 '0')	,
(	313	,	14	,	 'ETA'	,	 ''	,	 'ANTONINA DO NORTE'	,	 'ANTONINA DO NORTE'	,	 'CE'	,	-6.777.646		-39.997.921	 '0')	,
(	314	,	14	,	 'ETA'	,	 ''	,	 'POTENGI'	,	 'POTENGI'	,	 'CE'	,	-7.057.919		-39.911.041	 '0')	,
(	315	,	14	,	 'ETA'	,	 ''	,	 'ASSARE'	,	 'ASSARE'	,	 'CE'	,	-6.885.985		-39.868.252	 '0')	,
(	316	,	14	,	 'ETA'	,	 ''	,	 'OROS'	,	 'OROS'	,	 'CE'	,	-6.240.416		-38.916.729	 '0')	,
(	317	,	14	,	 'ETA'	,	 ''	,	 'PARAMBU'	,	 'PARAMBU'	,	 'CE'	,	-6.217.257		-40.703.514	 '0')	,
(	318	,	14	,	 'ETA'	,	 ''	,	 'PAJUCARA'	,	 'PAJUCARA'	,	 'CE'	,	-3.866.883		-38.576.225	 '0')	,
(	319	,	14	,	 'ETA'	,	 ''	,	 'ACOPIARA'	,	 'ACOPIARA'	,	 'CE'	,	-6.088.361		-39.455.124	 '0')	,
(	320	,	14	,	 'ETA'	,	 ''	,	 'FRECHEIRINHA - COREA'	,	 'COREAU'	,	 'CE'	,	-3.638.393		-40.817.184	 '0')	,
(	321	,	14	,	 'ETA'	,	 ''	,	 'ITAPIPOCA I'	,	 'ITAPIPOCA'	,	 'CE'	,	-3.489.477		-39.606.911	 '0')	,
(	322	,	14	,	 'ETA'	,	 ''	,	 'PARAIPABA'	,	 'PARAIPABA'	,	 'CE'	,	-3.428.357		-39.145.428	 '0')	,
(	323	,	15	,	 'ETA'	,	 ''	,	 'AGUA BRANCA'	,	 'AGUA BRANCA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	324	,	15	,	 'ETA'	,	 ''	,	 'ALAGOA GRANDE'	,	 'ALAGOA GRANDE'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	325	,	15	,	 'ETA'	,	 ''	,	 'ALAGOA NOVA'	,	 'ALAGOA NOVA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	326	,	15	,	 'ETA'	,	 ''	,	 'ALGODAO DE JANDAIRA'	,	 'ALGODAO DE JANDAIRA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	327	,	15	,	 'ETA'	,	 ''	,	 'ALHANDRA CLORACAO'	,	 'ALHANDRA'	,	 'PB'	,	-7.435.723		-34.903.732	 '0')	,
(	328	,	15	,	 'ETA'	,	 ''	,	 'ALHANDRA PRE-CLORACAO'	,	 'ALHANDRA'	,	 'PB'	,	 0.000000		 0.000000	 '1')	,
(	329	,	15	,	 'ETA'	,	 ''	,	 'APARECIDA'	,	 'APARECIDA'	,	 'PB'	,	-6.786.494		-38.078.266	 '0')	,
(	330	,	15	,	 'ETA'	,	 ''	,	 'ARARA'	,	 'ARARA'	,	 'PB'	,	-6.765.633		-35.662.067	 '0')	,
(	331	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'AREIA'	,	 'AREIA'	,	 'PB'	,	-6.923.389		-35.667.683	 '0')	,
(	332	,	15	,	 'ETA'	,	 ''	,	 'AREIA - SAULO MAIA'	,	 'AREIA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	333	,	15	,	 'ETA'	,	 ''	,	 'AREIAL'	,	 'AREIAL'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	334	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'AROEIRAS'	,	 'AROEIRAS'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	335	,	15	,	 'ETA'	,	 ''	,	 'BANANEIRAS'	,	 'BANANEIRAS'	,	 'PB'	,	-6.762.325		-35.635.765	 '0')	,
(	336	,	15	,	 'ETA'	,	 ''	,	 'BARRA DE SANTA ROSA'	,	 'BARRA DE SANTA ROSA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	337	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'BARRA DE SAO MIGUEL'	,	 'BARRA DE SAO MIGUEL'	,	 'PB'	,	-7.747.247		-36.314.354	 '0')	,
(	338	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'BARRAGEM SAO JOSE'	,	 'MONTEIRO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	339	,	15	,	 'ETA'	,	 ''	,	 'BELEM'	,	 'BELEM'	,	 'PB'	,	-6.726.479		-35.555.367	 '0')	,
(	340	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'BOA VISTA'	,	 'BOA VISTA'	,	 'PB'	,	-7.271.498		-36.244.152	 '0')	,
(	341	,	15	,	 'ETA'	,	 ''	,	 'BOM JESUS'	,	 'BOM JESUS'	,	 'PB'	,	-6.896.617		-38.524.914	 '0')	,
(	342	,	15	,	 'ETA'	,	 ''	,	 'BONITO DE SANTA FE'	,	 'BONITO DE SANTA FE'	,	 'PB'	,	-7.315.966		-38.517.784	 '0')	,
(	343	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'BOQUEIRAO'	,	 'BOQUEIRAO'	,	 'PB'	,	-7.484.426		-36.136.578	 '0')	,
(	344	,	15	,	 'ETA'	,	 ''	,	 'BREJO DO CRUZ'	,	 'BREJO DO CRUZ'	,	 'PB'	,	-6.321.565		-37.509.460	 '0')	,
(	345	,	15	,	 'ETA'	,	 'RIO DO PEIXE'	,	 'BREJO DOS SANTOS'	,	 'BREJO DOS SANTOS'	,	 'PB'	,	-6.373.634		-37.830.116	 '0')	,
(	346	,	15	,	 'ETA'	,	 ''	,	 'CAAPORA'	,	 'CAAPORA'	,	 'PB'	,	-7.510.489		-34.925.434	 '0')	,
(	347	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'CABACEIRAS'	,	 'CABACEIRAS'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	348	,	15	,	 'ETA'	,	 ''	,	 'CACHOEIRA DOS INDIOS'	,	 'CACHOEIRA DOS INDIOS'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	349	,	15	,	 'ETA'	,	 ''	,	 'CACIMBA DE DENTRO'	,	 'CACIMBA DE DENTRO'	,	 'PB'	,	-6.650.245		-35.789.089	 '0')	,
(	350	,	15	,	 'ETA'	,	 ''	,	 'CACIMBAS'	,	 'CACIMBAS'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	351	,	15	,	 'ETA'	,	 ''	,	 'CAJA'	,	 'CAMPINA GRANDE'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	352	,	15	,	 'ETA'	,	 'ALTO PIRANHAS'	,	 'CAJAZEIRAS (ENG. AVIDOS)'	,	 'CAJAZEIRAS'	,	 'PB'	,	-6.977.884		-38.456.306	 '0')	,
(	353	,	15	,	 'ETA'	,	 ''	,	 'CAJAZEIRINHAS'	,	 'CAJAZEIRINHAS'	,	 'PB'	,	-6.961.471		-37.799.385	 '0')	,
(	354	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'CAMALAU'	,	 'CAMALAU'	,	 'PB'	,	-7.888.394		-36.822.079	 '0')	,
(	355	,	15	,	 'ETA'	,	 ''	,	 'CAMPINA GRANDE'	,	 'CAMPINA GRANDE'	,	 'PB'	,	-7.385.615		-35.975.990	 '0')	,
(	356	,	15	,	 'ETA'	,	 'LITORAL'	,	 'CAPIM'	,	 'CAPIM'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	357	,	15	,	 'ETA'	,	 ''	,	 'CARAUBAS'	,	 'CARAUBAS'	,	 'PB'	,	-7.762.016		-36.548.676	 '0')	,
(	358	,	15	,	 'ETA'	,	 ''	,	 'CARRAPATEIRA'	,	 'CARRAPATEIRA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	359	,	15	,	 'ETA'	,	 ''	,	 'CASSERENGUE'	,	 'CASSERENGUE'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	360	,	15	,	 'ETA'	,	 'ESPINHARAS'	,	 'CATINGUEIRA'	,	 'CATINGUEIRA'	,	 'PB'	,	-7.092.876		-37.648.190	 '0')	,
(	361	,	15	,	 'ETA'	,	 ''	,	 'CATOLE DO ROCHA'	,	 'CATOLE DO ROCHA'	,	 'PB'	,	-6.344.935		-37.748.722	 '0')	,
(	362	,	15	,	 'ETA'	,	 ''	,	 'CEPILHO'	,	 'AREIA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	363	,	15	,	 'ETA'	,	 ''	,	 'CHA DOS PEREIROS'	,	 'INGA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	364	,	15	,	 'ETA'	,	 ''	,	 'CONCEICAO'	,	 'CONCEICAO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	365	,	15	,	 'ETA'	,	 ''	,	 'CONDE'	,	 'CONDE'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	366	,	15	,	 'ETA'	,	 ''	,	 'CONGO'	,	 'CONGO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	367	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'COXIXOLA'	,	 'COXIXOLA'	,	 'PB'	,	-7.625.899		-36.605.965	 '0')	,
(	368	,	15	,	 'ETA'	,	 ''	,	 'CRUZ DO ESPIRITO SANTO'	,	 'CRUZ DO ESPIRITO SANTO'	,	 'PB'	,	-7.127.620		-35.098.309	 '0')	,
(	369	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'CUBATI'	,	 'CUBATI'	,	 'PB'	,	-6.861.539		-36.355.373	 '0')	,
(	370	,	15	,	 'ETA'	,	 ''	,	 'CUITE'	,	 'CUITE'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	371	,	15	,	 'ETA'	,	 'BREJO'	,	 'CUITEGI'	,	 'CUITEGI'	,	 'PB'	,	-6.906.627		-35.535.408	 '0')	,
(	372	,	15	,	 'ETA'	,	 ''	,	 'DESTERRO'	,	 'DESTERRO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	373	,	15	,	 'ETA'	,	 ''	,	 'DIAMANTE'	,	 'DIAMANTE'	,	 'PB'	,	-7.419.480		-38.263.878	 '0')	,
(	374	,	15	,	 'ETA'	,	 ''	,	 'DUAS ESTRADAS'	,	 'DUAS ESTRADAS'	,	 'PB'	,	-6.703.800		-35.442.066	 '0')	,
(	375	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'MONTEIRO - EB3'	,	 'MONTEIRO'	,	 'PB'	,	-7.781.470		-37.007.717	 '0')	,
(	376	,	15	,	 'ETA'	,	 ''	,	 'EMAS'	,	 'EMAS'	,	 'PB'	,	-7.097.436		-37.715.714	 '0')	,
(	377	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'ESPERANCA'	,	 'ESPERANCA'	,	 'PB'	,	-7.034.901		-35.859.444	 '0')	,
(	378	,	15	,	 'ETA'	,	 'LITORAL'	,	 'ITABAIANA - NOVA ETA II'	,	 'ITABAIANA'	,	 'PB'	,	-7.343.830		-35.336.060	 '0')	,
(	379	,	15	,	 'ETA'	,	 ''	,	 'ITABAIANA - FORUM ETA III'	,	 'ITABAIANA'	,	 'PB'	,	-7.317.030		-35.342.407	 '0')	,
(	380	,	15	,	 'ETA'	,	 ''	,	 'ITABAIANA - VELHA ETA I'	,	 'ITABAIANA'	,	 'PB'	,	-7.342.337		-35.335.678	 '0')	,
(	381	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'FAGUNDES'	,	 'FAGUNDES'	,	 'PB'	,	-7.350.066		-35.783.150	 '0')	,
(	382	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'FREI MARTINHO'	,	 'FREI MARTINHO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	383	,	15	,	 'ETA'	,	 ''	,	 'GADO BRAVO'	,	 'GADO BRAVO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	384	,	15	,	 'ETA'	,	 ''	,	 'GRAMAME'	,	 'JOAO PESSOA'	,	 'PB'	,	-7.228.129		-34.920.109	 '0')	,
(	385	,	15	,	 'ETA'	,	 ''	,	 'GRAVATA'	,	 'SAO JOAO DO RIO DO PEIXE'	,	 'PB'	,	-7.385.151		-35.976.128	 '0')	,
(	386	,	15	,	 'ETA'	,	 ''	,	 'GUARABIRA'	,	 'GUARABIRA'	,	 'PB'	,	-6.845.538		-35.496.750	 '0')	,
(	387	,	15	,	 'ETA'	,	 ''	,	 'GURINHEM'	,	 'GURINHEM'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	388	,	15	,	 'ETA'	,	 ''	,	 'GURJAO'	,	 'GURJAO'	,	 'PB'	,	-7.248.013		-36.495.125	 '0')	,
(	389	,	15	,	 'ETA'	,	 ''	,	 'IBIARA'	,	 'IBIARA'	,	 'PB'	,	-7.495.219		-38.400.959	 '0')	,
(	390	,	15	,	 'ETA'	,	 ''	,	 'IGARACY'	,	 'IGARACY'	,	 'PB'	,	-7.176.885		-38.155.186	 '0')	,
(	391	,	15	,	 'ETA'	,	 ''	,	 'IMACULADA'	,	 'IMACULADA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	392	,	15	,	 'ETA'	,	 ''	,	 'INGA'	,	 'INGA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	393	,	15	,	 'ETA'	,	 ''	,	 'IPUEIRA'	,	 'PAULISTA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	394	,	15	,	 'ETA'	,	 ''	,	 'ITAPORANGA ETA VELHA'	,	 'ITAPORANGA'	,	 'PB'	,	-7.323.058		-38.228.260	 '0')	,
(	395	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'ITATUBA'	,	 'ITATUBA'	,	 'PB'	,	-7.415.631		-35.637.650	 '0')	,
(	396	,	15	,	 'ETA'	,	 ''	,	 'JACARAU'	,	 'JACARAU'	,	 'PB'	,	-6.619.065		-35.287.048	 '0')	,
(	397	,	15	,	 'ETA'	,	 'LITORAL'	,	 'JACUMA'	,	 'CONDE'	,	 'PB'	,	-7.286.018		-34.805.264	 '0')	,
(	398	,	15	,	 'ETA'	,	 ''	,	 'JERICO'	,	 'JERICO'	,	 'PB'	,	-6.550.878		-37.801.491	 '0')	,
(	399	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'JUAREZ TAVORA'	,	 'JUAREZ TAVORA'	,	 'PB'	,	-7.166.017		-35.593.834	 '0')	,
(	400	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'JUAZEIRINHO'	,	 'JUAZEIRINHO'	,	 'PB'	,	-7.040.224		-36.412.128	 '0')	,
(	401	,	15	,	 'ETA'	,	 ''	,	 'JURIPIRANGA'	,	 'JURIPIRANGA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	402	,	15	,	 'ETA'	,	 'ESPINHARAS'	,	 'JURU'	,	 'JURU'	,	 'PB'	,	-7.537.949		-37.815.617	 '0')	,
(	403	,	15	,	 'ETA'	,	 ''	,	 'LAGOA DO MATO'	,	 'REMIGIO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	404	,	15	,	 'ETA'	,	 ''	,	 'LAGOA SECA'	,	 'LAGOA SECA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	405	,	15	,	 'ETA'	,	 ''	,	 'LIVRAMENTO'	,	 'LIVRAMENTO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	406	,	15	,	 'ETA'	,	 ''	,	 'LUCENA'	,	 'LUCENA'	,	 'PB'	,	-6.898.435		-34.872.288	 '0')	,
(	407	,	15	,	 'ETA'	,	 ''	,	 'MALTA'	,	 'MALTA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	408	,	15	,	 'ETA'	,	 ''	,	 'MALTA-CONDADO'	,	 'CONDADO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	409	,	15	,	 'ETA'	,	 ''	,	 'MAMANGUAPE'	,	 'MAMANGUAPE'	,	 'PB'	,	-6.837.637		-35.132.690	 '0')	,
(	410	,	15	,	 'ETA'	,	 ''	,	 'MANAIRA'	,	 'MANAIRA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	411	,	15	,	 'ETA'	,	 ''	,	 'MARES - JOAO PESSOA'	,	 'JOAO PESSOA'	,	 'PB'	,	-7.153.925		-34.910.412	 '0')	,
(	412	,	15	,	 'ETA'	,	 ''	,	 'MARI'	,	 'MARI'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	413	,	15	,	 'ETA'	,	 ''	,	 'MARIZOPOLIS'	,	 'MARIZOPOLIS'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	414	,	15	,	 'ETA'	,	 ''	,	 'MASSARANDUBA'	,	 'MASSARANDUBA'	,	 'PB'	,	-7.185.317		-35.732.582	 '0')	,
(	415	,	15	,	 'ETA'	,	 ''	,	 'MATINHAS'	,	 'MATINHAS'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	416	,	15	,	 'ETA'	,	 ''	,	 'MATO GROSSO'	,	 'MATO GROSSO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	417	,	15	,	 'ETA'	,	 ''	,	 'MATUREIA'	,	 'MATUREIA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	418	,	15	,	 'ETA'	,	 ''	,	 'MOGEIRO'	,	 'MOGEIRO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	419	,	15	,	 'ETA'	,	 ''	,	 'MONTADAS'	,	 'MONTADAS'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	420	,	15	,	 'ETA'	,	 ''	,	 'MONTE HOREBE'	,	 'MONTE HOREBE'	,	 'PB'	,	-7.213.803		-38.587.200	 '0')	,
(	421	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'MONTEIRO'	,	 'MONTEIRO'	,	 'PB'	,	-7.913.339		-37.109.230	 '0')	,
(	422	,	15	,	 'ETA'	,	 ''	,	 'MULUNGU'	,	 'MULUNGU'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	423	,	15	,	 'ETA'	,	 ''	,	 'NATUBA ETA NOVA'	,	 'NATUBA'	,	 'PB'	,	-7.641.291		-35.549.137	 '0')	,
(	424	,	15	,	 'ETA'	,	 ''	,	 'NAZAREZINHO'	,	 'NAZAREZINHO'	,	 'PB'	,	-6.912.010		-38.321.785	 '0')	,
(	425	,	15	,	 'ETA'	,	 ''	,	 'NOVA FLORESTA'	,	 'NOVA FLORESTA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	426	,	15	,	 'ETA'	,	 ''	,	 'NOVA OLINDA'	,	 'NOVA OLINDA'	,	 'PB'	,	-7.482.616		-38.041.935	 '0')	,
(	427	,	15	,	 'ETA'	,	 ''	,	 'NOVA PALMEIRA'	,	 'NOVA PALMEIRA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	428	,	15	,	 'ETA'	,	 ''	,	 'OLHO DAGUA'	,	 'OLHO DAGUA'	,	 'PB'	,	-7.216.592		-37.753.868	 '0')	,
(	429	,	15	,	 'ETA'	,	 ''	,	 'OURO VELHO'	,	 'OURO VELHO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	430	,	15	,	 'ETA'	,	 ''	,	 'PATOS'	,	 'PATOS'	,	 'PB'	,	-7.059.469		-37.272.118	 '0')	,
(	431	,	15	,	 'ETA'	,	 ''	,	 'PAULISTA'	,	 'PAULISTA'	,	 'PB'	,	-6.600.107		-37.624.268	 '0')	,
(	432	,	15	,	 'ETA'	,	 ''	,	 'PEDRAS DE FOGO'	,	 'PEDRAS DE FOGO'	,	 'PB'	,	-7.392.417		-35.105.705	 '0')	,
(	433	,	15	,	 'ETA'	,	 ''	,	 'PEDRO VELHO'	,	 'AROEIRAS'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	434	,	15	,	 'ETA'	,	 ''	,	 'PIANCO'	,	 'PIANCO'	,	 'PB'	,	-7.188.014		-37.914.738	 '0')	,
(	435	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'PICUI'	,	 'PICUI'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	436	,	15	,	 'ETA'	,	 ''	,	 'PILAR'	,	 'PILAR'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	437	,	15	,	 'ETA'	,	 ''	,	 'PILOES'	,	 'PILOES'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	438	,	15	,	 'ETA'	,	 ''	,	 'PIRPIRITUBA'	,	 'PIRPIRITUBA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	439	,	15	,	 'ETA'	,	 'LITORAL'	,	 'PITIMBU'	,	 'PITIMBU'	,	 'PB'	,	-7.472.833		-34.811.462	 '0')	,
(	440	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'POCINHOS'	,	 'POCINHOS'	,	 'PB'	,	-7.136.542		-36.044.491	 '0')	,
(	441	,	15	,	 'ETA'	,	 ''	,	 'POMBAL'	,	 'POMBAL'	,	 'PB'	,	-6.773.132		-37.793.034	 '0')	,
(	442	,	15	,	 'ETA'	,	 ''	,	 'PRATA'	,	 'PRATA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	443	,	15	,	 'ETA'	,	 ''	,	 'PRINCESA ISABEL'	,	 'PRINCESA ISABEL'	,	 'PB'	,	-7.733.684		-37.992.153	 '0')	,
(	444	,	15	,	 'ETA'	,	 ''	,	 'PUXINANA'	,	 'PUXINANA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	445	,	15	,	 'ETA'	,	 ''	,	 'REMIGIO'	,	 'REMIGIO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	446	,	15	,	 'ETA'	,	 ''	,	 'REMIGIO (Cepilho)'	,	 'REMIGIO'	,	 'PB'	,	-6.988.303		-35.775.616	 '0')	,
(	447	,	15	,	 'ETA'	,	 ''	,	 'RIACHO DOS CAVALOS'	,	 'RIACHO DOS CAVALOS'	,	 'PB'	,	-6.432.097		-37.651.638	 '0')	,
(	448	,	15	,	 'ETA'	,	 ''	,	 'RIACHO STO. ANTONIO'	,	 'RIACHO DE SANTO ANTONIO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	449	,	15	,	 'ETA'	,	 ''	,	 'RIO TINTO'	,	 'RIO TINTO'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	450	,	15	,	 'ETA'	,	 'LITORAL'	,	 'SALGADO DE SAO FELIX'	,	 'SALGADO DE SAO FELIX'	,	 'PB'	,	-7.357.401		-35.443.127	 '0')	,
(	451	,	15	,	 'ETA'	,	 ''	,	 'SANTA CRUZ'	,	 'SANTA CRUZ'	,	 'PB'	,	-6.535.729		-38.052.868	 '0')	,
(	452	,	15	,	 'ETA'	,	 ''	,	 'SANTA GERTRUDES'	,	 'PATOS'	,	 'PB'	,	-6.948.374		-37.397.079	 '0')	,
(	453	,	15	,	 'ETA'	,	 ''	,	 'SANTA HELENA'	,	 'SANTA HELENA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	454	,	15	,	 'ETA'	,	 ''	,	 'SANTA LUZIA'	,	 'SANTA LUZIA'	,	 'PB'	,	-6.864.509		-36.917.557	 '0')	,
(	455	,	15	,	 'ETA'	,	 'LITORAL'	,	 'SANTA RITA'	,	 'SANTA RITA'	,	 'PB'	,	-7.140.585		-34.983.044	 '0')	,
(	456	,	15	,	 'ETA'	,	 ''	,	 'SANTA TEREZINHA'	,	 'SANTA TERESINHA'	,	 'PB'	,	-7.085.682		-37.446.266	 '0')	,
(	457	,	15	,	 'ETA'	,	 ''	,	 'SANTANA DE MANGUEIRA'	,	 'SANTANA DE MANGUEIRA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	458	,	15	,	 'ETA'	,	 ''	,	 'SANTANA DOS GARROTES'	,	 'SANTANA DOS GARROTES'	,	 'PB'	,	-7.390.976		-37.987.621	 '0')	,
(	459	,	15	,	 'ETA'	,	 ''	,	 'SAO BENTINHO'	,	 'SAO BENTINHO'	,	 'PB'	,	-6.892.777		-37.729.752	 '0')	,
(	460	,	15	,	 'ETA'	,	 ''	,	 'SAO BENTO'	,	 'SAO BENTO'	,	 'PB'	,	-6.494.889		-37.449.947	 '0')	,
(	461	,	15	,	 'ETA'	,	 ''	,	 'SAO DOMINGOS'	,	 'SAO DOMINGOS DO CARIRI'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	462	,	15	,	 'ETA'	,	 ''	,	 'SAO GONCALO'	,	 'SOUSA'	,	 'PB'	,	-6.846.391		-38.325.588	 '0')	,
(	463	,	15	,	 'ETA'	,	 ''	,	 'SAO JOAO DO CARIRI'	,	 'SAO JOAO DO CARIRI'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	464	,	15	,	 'ETA'	,	 ''	,	 'SAO JOAO DO RIO DO PEIXE'	,	 'SAO JOAO DO RIO DO PEIXE'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	465	,	15	,	 'ETA'	,	 ''	,	 'SAO JOSE DA LAGOA TAPADA'	,	 'SAO JOSE DA LAGOA TAPADA'	,	 'PB'	,	-6.944.175		-38.163.437	 '0')	,
(	466	,	15	,	 'ETA'	,	 ''	,	 'SAO JOSE DE CAIANA'	,	 'SAO JOSE DE CAIANA'	,	 'PB'	,	-7.252.259		-38.299.194	 '0')	,
(	467	,	15	,	 'ETA'	,	 ''	,	 'SAO JOSE DE ESPINHARAS'	,	 'SAO JOSE DE ESPINHARAS'	,	 'PB'	,	-6.842.880		-37.322.609	 '0')	,
(	468	,	15	,	 'ETA'	,	 ''	,	 'SAO JOSE DO BOMFIM'	,	 'SAO JOSE DO BONFIM'	,	 'PB'	,	-7.075.689		-37.287.113	 '0')	,
(	469	,	15	,	 'ETA'	,	 ''	,	 'SAO JOSE DO SABUGI'	,	 'SAO JOSE DO SABUGI'	,	 'PB'	,	-6.783.546		-36.791.286	 '0')	,
(	470	,	15	,	 'ETA'	,	 ''	,	 'SAO JOSE DOS CORDEIROS'	,	 'SAO JOSE DOS CORDEIROS'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	471	,	15	,	 'ETA'	,	 ''	,	 'SAO JOSE PIRANHAS'	,	 'SAO JOSE DE ESPINHARAS'	,	 'PB'	,	-7.124.179		-38.500.160	 '0')	,
(	472	,	15	,	 'ETA'	,	 ''	,	 'SAO MAMEDE'	,	 'SAO MAMEDE'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	473	,	15	,	 'ETA'	,	 ''	,	 'SAO MIGUEL'	,	 'SAO MIGUEL DE TAIPU'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	474	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'SAO SEBASTIAO DE LAGOA DE ROCA'	,	 'SAO SEBASTIAO DE LAGOA DE ROCA'	,	 'PB'	,	-7.106.173		-35.868.809	 '0')	,
(	475	,	15	,	 'ETA'	,	 ''	,	 'SAPE'	,	 'SAPE'	,	 'PB'	,	-7.091.735		-35.228.020	 '0')	,
(	476	,	15	,	 'ETA'	,	 ''	,	 'SERRA BRANCA'	,	 'SERRA BRANCA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	477	,	15	,	 'ETA'	,	 ''	,	 'SERRA GRANDE'	,	 'SERRA GRANDE'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	478	,	15	,	 'ETA'	,	 ''	,	 'SERRA REDONDA'	,	 'SERRA REDONDA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	479	,	15	,	 'ETA'	,	 ''	,	 'SERRARIA'	,	 'SERRARIA'	,	 'PB'	,	-6.815.696		-35.639.336	 '0')	,
(	480	,	15	,	 'ETA'	,	 ''	,	 'SOLANEA'	,	 'SOLANEA'	,	 'PB'	,	-6.758.285		-35.650.150	 '0')	,
(	481	,	15	,	 'ETA'	,	 ''	,	 'SOUSA'	,	 'SOUSA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	482	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'SUME - ETA VELHA'	,	 'SUME'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	483	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'SUME-ADUTORA DO CONGO EB II'	,	 'SUME'	,	 'PB'	,	-7.681.791		-36.876.709	 '0')	,
(	484	,	15	,	 'ETA'	,	 'ESPINHARAS'	,	 'TAPEROA'	,	 'TAPEROA'	,	 'PB'	,	-7.216.008		-36.826.679	 '0')	,
(	485	,	15	,	 'ETA'	,	 ''	,	 'TAVARES'	,	 'TAVARES'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	486	,	15	,	 'ETA'	,	 ''	,	 'TEIXEIRA'	,	 'TEIXEIRA'	,	 'PB'	,	 0.000000		 0.000000	 '0')	,
(	487	,	15	,	 'ETA'	,	 ''	,	 'TRIUNFO'	,	 'TRIUNFO'	,	 'PB'	,	-6.580.757		-38.601.868	 '0')	,
(	488	,	15	,	 'ETA'	,	 ''	,	 'UIRAUNA'	,	 'UIRAUNA'	,	 'PB'	,	-6.512.637		-38.414.623	 '0')	,
(	489	,	15	,	 'ETA'	,	 ''	,	 'UIRAUNA - CAPIVARA'	,	 'UIRAUNA'	,	 'PB'	,	-6.542.084		-38.465.763	 '0')	,
(	490	,	15	,	 'ETA'	,	 'BORBOREMA'	,	 'UMBUZEIRO ETA VELHA'	,	 'UMBUZEIRO'	,	 'PB'	,	-7.712.210		-35.650.932	 '0')	,
(	491	,	15	,	 'ETA'	,	 ''	,	 'VARZEA'	,	 'VARZEA'	,	 'PB'	,	-6.772.624		-36.990.372	 '0')	,
(	492	,	15	,	 'ETA'	,	 ''	,	 'VISTA SERRANA'	,	 'VISTA SERRANA'	,	 'PB'	,	-6.682.954		-37.585.712	 '0')	,
(	493	,	15	,	 'ETA'	,	 ''	,	 'ARACAGI'	,	 'ARACAGI'	,	 'PB'	,	-6.852.192		-35.294.487	 '0')	,
(	494	,	15	,	 'ETA'	,	 ''	,	 'ITAPORANGA ETA NOVA'	,	 'ITAPORANGA'	,	 'PB'	,	-7.304.123		-38.152.775	 '0')	,
(	495	,	15	,	 'ETA'	,	 ''	,	 'CAJAZEIRAS - ETA MUTIRAO (CENTRO)'	,	 'CAJAZEIRAS'	,	 'PB'	,	-6.875.999		-38.572.575	 '0')	,
(	496	,	15	,	 'ETA'	,	 ''	,	 'AGUIAR'	,	 'AGUIAR'	,	 'PB'	,	-7.099.097		-38.171.783	 '0')	,
(	497	,	15	,	 'ETA'	,	 ''	,	 'COREMAS'	,	 'COREMAS'	,	 'PB'	,	-7.023.827		-37.954.273	 '0')	,
(	498	,	15	,	 'ETA'	,	 ''	,	 'SANTA CRUZ - SAO PEDRO'	,	 'SANTA CRUZ'	,	 'PB'	,	-6.593.808		-38.121.941	 '0')	,
(	499	,	15	,	 'ETA'	,	 'CENTRO'	,	 'CACIMBA DA VARZEA'	,	 'VARZEA'	,	 'PB'	,	-6.687.452		-35.794.819	 '0');	,
(	500	,	16	,	 'ETA'	,	 'SERTAO'	,	 'AGUA BRANCA - EE5'	,	 'AGUA BRANCA'	,	 'AL'	,	-9.262.181		-37.935.917	 '0')	,
(	501	,	16	,	 'ETA'	,	 'SERRANA'	,	 'ANADIA'	,	 'ANADIA'	,	 'AL'	,	-9.678.204		-36.325.851	 '0')	,
(	502	,	16	,	 'ETA'	,	 'LESTE'	,	 'BARRA DE SAO MIGUEL'	,	 'BARRA DE SAO MIGUEL'	,	 'AL'	,	-9.829.777		-35.903.664	 '0')	,
(	503	,	16	,	 'ETA'	,	 'BACIA'	,	 'BATALHA'	,	 'BATALHA'	,	 'AL'	,	-9.673.862		-37.132.347	 '0')	,
(	504	,	16	,	 'ETA'	,	 'SERRANA'	,	 'CAPELA'	,	 'CAPELA'	,	 'AL'	,	-9.415.039		-36.080.791	 '0')	,
(	505	,	16	,	 'ETA'	,	 'SERTAO'	,	 'DELMIRO GOUVEIA - BARRAGEM LESTE'	,	 'DELMIRO GOUVEIA'	,	 'AL'	,	-9.368.197		-38.189.369	 '0')	,
(	506	,	16	,	 'ETA'	,	 'SERTAO'	,	 'DELMIRO GOUVEIA - EE3'	,	 'DELMIRO GOUVEIA'	,	 'AL'	,	-9.392.285		-38.011.543	 '0')	,
(	507	,	16	,	 'ETA'	,	 'SERRANA'	,	 'ESTRELA DE ALAGOAS'	,	 'ESTRELA DE ALAGOAS'	,	 'AL'	,	-9.389.405		-36.763.458	 '0')	,
(	508	,	16	,	 'ETA'	,	 'LESTE'	,	 'FLEXEIRAS'	,	 'FLEXEIRAS'	,	 'AL'	,	-9.280.350		-35.721.668	 '0')	,
(	509	,	16	,	 'ETA'	,	 'LESTE'	,	 'JOAQUIM GOMES'	,	 'JOAQUIM GOMES'	,	 'AL'	,	-9.132.297		-35.749.264	 '0')	,
(	510	,	16	,	 'ETA'	,	 'AGRESTE'	,	 'JUNQUEIRO'	,	 'CAJUEIRO'	,	 'AL'	,	-9.905.873		-36.469.185	 '0')	,
(	511	,	16	,	 'ETA'	,	 'MACEIO'	,	 'MACEIO - AVIACAO'	,	 'MACEIO'	,	 'AL'	,	-9.562.437		-35.797.009	 '0')	,
(	512	,	16	,	 'ETA'	,	 'MACEIO'	,	 'MACEIO - CARDOSO'	,	 'MACEIO'	,	 'AL'	,	-9.623.747		-35.746.700	 '0')	,
(	513	,	16	,	 'ETA'	,	 'LESTE'	,	 'MURICI - CACHOEIRA'	,	 'MURICI'	,	 'AL'	,	-9.284.546		-35.972.584	 '0')	,
(	514	,	16	,	 'ETA'	,	 'LESTE'	,	 'MURICI - CANSANCAO'	,	 'MURICI'	,	 'AL'	,	-9.319.700		-35.950.256	 '0')	,
(	515	,	16	,	 'ETA'	,	 'LESTE'	,	 'NOVO LINO'	,	 'NOVO LINO'	,	 'AL'	,	-8.944.942		-35.662.052	 '0')	,
(	516	,	16	,	 'ETA'	,	 'SERTAO'	,	 'OLHO DAGUA DO CASADO'	,	 'OLHO DAGUA DO CASADO'	,	 'AL'	,	-9.469.408		-37.844.196	 '0')	,
(	517	,	16	,	 'ETA'	,	 'SERRANA'	,	 'PALMEIRA DOS INDIOS'	,	 'PALMEIRA DOS INDIOS'	,	 'AL'	,	-9.402.674		-36.629.410	 '0')	,
(	518	,	16	,	 'ETA'	,	 'BACIA'	,	 'PAO DE ACUCAR'	,	 'PAO DE ACUCAR'	,	 'AL'	,	-9.705.937		-37.415.363	 '0')	,
(	519	,	16	,	 'ETA'	,	 'SERRANA'	,	 'PAULO JACINTO'	,	 'PAULO JACINTO'	,	 'AL'	,	-9.359.531		-36.365.665	 '0')	,
(	520	,	16	,	 'ETA'	,	 'AGRESTE'	,	 'PIACABUCU'	,	 'PIACABUCU'	,	 'AL'	,	-10.405.677		-36.429.794	 '0')	,
(	521	,	16	,	 'ETA'	,	 'SERTAO'	,	 'PIRANHAS'	,	 'PIRANHAS'	,	 'AL'	,	-9.597.710		-37.774.883	 '0')	,
(	522	,	16	,	 'ETA'	,	 'MACEIO'	,	 'PRATAGY'	,	 'MACEIO'	,	 'AL'	,	-9.558.667		-35.737.751	 '0')	,
(	523	,	16	,	 'ETA'	,	 'SERRANA'	,	 'QUEBRANGULO'	,	 'QUEBRANGULO'	,	 'AL'	,	-9.315.370		-36.474.041	 '0')	,
(	524	,	16	,	 'ETA'	,	 'SERRANA'	,	 'QUEBRANGULO - CACAMBAS'	,	 'QUEBRANGULO'	,	 'AL'	,	-9.303.898		-36.478.935	 '0')	,
(	525	,	16	,	 'ETA'	,	 'LESTE'	,	 'RIO LARGO - MATA DO ROLO'	,	 'RIO LARGO'	,	 'AL'	,	-9.481.617		-35.840.508	 '0')	,
(	526	,	16	,	 'ETA'	,	 'LESTE'	,	 'RIO LARGO - TABULEIRO DO PINTO'	,	 'RIO LARGO'	,	 'AL'	,	-9.505.784		-35.812.328	 '0')	,
(	527	,	16	,	 'ETA'	,	 'LESTE'	,	 'SATUBA'	,	 'SATUBA'	,	 'AL'	,	-9.559.802		-35.819.576	 '0')	,
(	528	,	16	,	 'ETA'	,	 'AGRESTE'	,	 'TRAIPU'	,	 'TRAIPU'	,	 'AL'	,	-9.962.450		-36.997.227	 '0')	,
(	529	,	16	,	 'ETA'	,	 ''	,	 'ALTO SERTAO - AGUA BRANCA'	,	 'AGUA BRANCA'	,	 'AL'	,	-9.314.660		-37.981.758	 '0')	,
(	530	,	16	,	 'ETA'	,	 ''	,	 'ALTO SERTAO(ETA NOVA)'	,	 'DELMIRO GOUVEIA'	,	 'AL'	,	-9.314.146		-37.981.365	 '0')	,
(	531	,	16	,	 'ETA'	,	 ''	,	 'RIO LARGO - ETA JARBAS OITICICA'	,	 'RIO LARGO'	,	 'AL'	,	-9.474.094		-35.803.024	 '0')	,
(	532	,	18	,	 'ETA'	,	 'CPR Norte'	,	 'BOTAFOGO'	,	 'IGARASSU'	,	 'PE'	,	-7.852.777		-34.938.107	 '0')	,
(	533	,	18	,	 'ETA'	,	 'CPR Norte'	,	 'ARACOIABA'	,	 'ARACOIABA'	,	 'PE'	,	-7.788.469		-35.092.251	 '0')	,
(	534	,	18	,	 'ETA'	,	 'CPR Norte'	,	 'GOIANA'	,	 'GOIANA'	,	 'PE'	,	-7.531.476		-34.996.239	 '0')	,
(	535	,	18	,	 'ETA'	,	 'CPR Leste'	,	 'ALTO DO CEU'	,	 'RECIFE'	,	 'PE'	,	-8.014.139		-34.891.075	 '0')	,
(	536	,	18	,	 'ETA'	,	 'CPR Leste'	,	 'CAIXA DAGUA'	,	 'RECIFE'	,	 'PE'	,	-7.995.206		-34.905.682	 '0')	,
(	537	,	18	,	 'ETA'	,	 'CPR Leste'	,	 'VERA CRUZ'	,	 'CAMARAGIBE'	,	 'PE'	,	-7.954.779		-35.008.972	 '0')	,
(	538	,	18	,	 'ETA'	,	 'CPR Leste'	,	 'GUABIRABA - POCOS'	,	 'RECIFE'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	539	,	18	,	 'ETA'	,	 'CPR Leste'	,	 'DOIS IRMAOS EE'	,	 'RECIFE'	,	 'PE'	,	-8.015.049		-34.944.626	 '0')	,
(	540	,	18	,	 'ETA'	,	 'CPR Leste'	,	 'MACACOS EE'	,	 'RECIFE'	,	 'PE'	,	-8.015.031		-34.947.468	 '0')	,
(	541	,	18	,	 'ETA'	,	 'CPR Oeste'	,	 'TAPACURA'	,	 'RECIFE'	,	 'PE'	,	-8.078.891		-34.989.311	 '0')	,
(	542	,	18	,	 'ETA'	,	 'CPR Oeste'	,	 'VARZEA DO UNA'	,	 'CAMARAGIBE'	,	 'PE'	,	-7.997.674		-35.045.895	 '0')	,
(	543	,	18	,	 'ETA'	,	 'CPR Oeste'	,	 'MANOEL DE SENA'	,	 'JABOATAO DOS GUARARAPES'	,	 'PE'	,	-8.106.301		-35.015.438	 '0')	,
(	544	,	18	,	 'ETA'	,	 'CPR Oeste'	,	 'MORENO'	,	 'MORENO'	,	 'PE'	,	-8.115.483		-35.116.524	 '0')	,
(	545	,	18	,	 'ETA'	,	 'CPR Oeste'	,	 'Parque CAPIBARIBE'	,	 'SAO LOURENCO DA MATA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	546	,	18	,	 'ETA'	,	 'CPR Oeste'	,	 'BONANCA'	,	 'MORENO'	,	 'PE'	,	-8.112.715		-35.188.934	 '0')	,
(	547	,	18	,	 'ETA'	,	 'CPR Oeste'	,	 'MATRIZ DA LUZ'	,	 'SAO LOURENCO DA MATA'	,	 'PE'	,	-8.037.914		-35.100.609	 '0')	,
(	548	,	18	,	 'ETA'	,	 'CPR Sul'	,	 'SUAPE'	,	 'IPOJUCA'	,	 'PE'	,	-8.367.434		-35.018.631	 '0')	,
(	549	,	18	,	 'ETA'	,	 'CPR Sul'	,	 'PORTO DE GALINHAS'	,	 'IPOJUCA'	,	 'PE'	,	-8.505.353		-35.024.536	 '0')	,
(	550	,	18	,	 'ETA'	,	 'CPR Sul'	,	 'IPOJUCA'	,	 'IPOJUCA'	,	 'PE'	,	-8.396.323		-35.062.794	 '0')	,
(	551	,	18	,	 'ETA'	,	 'CPR Sul'	,	 'CAMELA'	,	 'IPOJUCA'	,	 'PE'	,	-8.509.832		-35.122.410	 '0')	,
(	552	,	18	,	 'ETA'	,	 'CPP'	,	 'MARCOS FREIRE - CAPTACAO'	,	 'JABOATAO DOS GUARARAPES'	,	 'PE'	,	-8.159.285		-34.979.023	 '0')	,
(	553	,	18	,	 'ETA'	,	 'CPP'	,	 'MARCOS FREIRE - CONV. E COMP.'	,	 'JABOATAO DOS GUARARAPES'	,	 'PE'	,	-8.132.455		-34.974.274	 '0')	,
(	554	,	18	,	 'ETA'	,	 'CPP'	,	 'CHARNECA'	,	 'CABO DE SANTO AGOSTINHO'	,	 'PE'	,	-8.296.784		-35.062.443	 '0')	,
(	555	,	18	,	 'ETA'	,	 'CPP'	,	 'MURIBEQUINHA - CAPTACAO'	,	 'JABOATAO DOS GUARARAPES'	,	 'PE'	,	-8.166.564		-35.007.175	 '0')	,
(	556	,	18	,	 'ETA'	,	 'CPP'	,	 'MURIBEQUINHA - ETA'	,	 'JABOATAO DOS GUARARAPES'	,	 'PE'	,	-8.172.080		-34.999.821	 '0')	,
(	557	,	18	,	 'ETA'	,	 'CPP'	,	 'PIRAPAMA - CABO'	,	 'CABO DE SANTO AGOSTINHO'	,	 'PE'	,	-8.267.437		-35.050.442	 '0')	,
(	558	,	18	,	 'ETA'	,	 'CPP'	,	 'GURJAU / MATAPAGIPE'	,	 'CABO DE SANTO AGOSTINHO'	,	 'PE'	,	-8.267.437		-35.048.252	 '0')	,
(	559	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'TAMANDARE - VELHA'	,	 'TAMANDARE'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	560	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'TAMANDARE - NOVA - RIO FORMOSO'	,	 'TAMANDARE'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	561	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'RIO FORMOSO'	,	 'RIO FORMOSO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	562	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'SIRINHAEM - Captacao'	,	 'SIRINHAEM'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	563	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'SIRINHAEM - ETA'	,	 'SIRINHAEM'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	564	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'VITORIA DE SANTO ANTAO'	,	 'VITORIA DE SANTO ANTAO'	,	 'PE'	,	-8.116.478		-35.301.838	 '0')	,
(	565	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'BARREIROS'	,	 'BARREIROS'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	566	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'SAO JOSE DA COROA GRANDE'	,	 'SAO JOSE DA COROA GRANDE'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	567	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'CUCAU'	,	 'RIO FORMOSO'	,	 'PE'	,	-8.631.140		-35.266.476	 '0')	,
(	568	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'GLORIA DO GOITA'	,	 'GLORIA DO GOITA'	,	 'PE'	,	-8.005.189		-35.291.073	 '0')	,
(	569	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'JOAQUIM NABUCO'	,	 'JOAQUIM NABUCO'	,	 'PE'	,	-8.630.824		-35.532.963	 '0')	,
(	570	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'PRIMAVERA'	,	 'PRIMAVERA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	571	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'SANTO AMARO'	,	 'RECIFE'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	572	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'RIBEIRAO'	,	 'RIBEIRAO'	,	 'PE'	,	-8.507.751		-35.385.178	 '0')	,
(	573	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'ESCADA'	,	 'ESCADA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	574	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'FREXEIRAS'	,	 'ESCADA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	575	,	18	,	 'ETA'	,	 'MATA SUL'	,	 'SAUE'	,	 'TAMANDARE'	,	 'PE'	,	-8.768.748		-35.318.199	 '0')	,
(	576	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'PAUDALHO'	,	 'PAUDALHO'	,	 'PE'	,	-7.882.613		-35.179.611	 '0')	,
(	577	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'BIZARRA'	,	 'BOM JARDIM'	,	 'PE'	,	-7.756.048		-35.484.409	 '0')	,
(	578	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'BUENOS AIRES'	,	 'BUENOS AIRES'	,	 'PE'	,	 0.000000		 0.000000	 '0');	,
(	579	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'CHA DE ALEGRIA'	,	 'CHA DE ALEGRIA'	,	 'PE'	,	-7.997.365		-35.215.801	 '0')	,
(	580	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'CONDADO'	,	 'CONDADO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	581	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'CONDADO - ZENITE'	,	 'CONDADO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	582	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'FERREIROS'	,	 'FERREIROS'	,	 'PE'	,	-7.460.232		-35.260.921	 '0')	,
(	583	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'ITAQUITINGA'	,	 'ITAQUITINGA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	584	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'LAGOA DO CARRO'	,	 'LAGOA DO CARRO'	,	 'PE'	,	-7.844.088		-35.300.613	 '0')	,
(	585	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'LAGOA DE ITAENGA'	,	 'LAGOA DE ITAENGA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	586	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'MACAPARANA'	,	 'MACAPARANA'	,	 'PE'	,	-7.558.700		-35.452.766	 '0')	,
(	587	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'MACHADOS'	,	 'MACHADOS'	,	 'PE'	,	-7.688.887		-35.508.873	 '0')	,
(	588	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'OROBO'	,	 'OROBO'	,	 'PE'	,	-7.737.973		-35.599.197	 '0')	,
(	589	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'SAO VICENTE FERRER'	,	 'SAO VICENTE FERRER'	,	 'PE'	,	-7.590.128		-35.490.238	 '0')	,
(	590	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'VICENCIA'	,	 'VICENCIA'	,	 'PE'	,	-7.645.561		-35.325.378	 '0')	,
(	591	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'VICENCIA - VERTENTINHA'	,	 'VICENCIA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	592	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'MURUPE'	,	 'VICENCIA'	,	 'PE'	,	-7.669.108		-35.412.861	 '0')	,
(	593	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'ALIANCA'	,	 'ALIANCA'	,	 'PE'	,	-7.599.990		-35.231.667	 '0')	,
(	594	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'CARPINA - ETA Pindoba'	,	 'CARPINA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	595	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'JOAO ALFREDO'	,	 'JOAO ALFREDO'	,	 'PE'	,	-7.835.042		-35.601.753	 '0')	,
(	596	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'TIMBAUBA'	,	 'TIMBAUBA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	597	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'LIMOEIRO'	,	 'LIMOEIRO'	,	 'PE'	,	-7.878.669		-35.451.466	 '0')	,
(	598	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'NAZARE DA MATA'	,	 'NAZARE DA MATA'	,	 'PE'	,	-7.730.506		-35.232.281	 '0')	,
(	599	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'FEIRA NOVA'	,	 'FEIRA NOVA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	600	,	18	,	 'ETA'	,	 'MATA NORTE'	,	 'BOM JARDIM - Buraco do Tatu'	,	 'BOM JARDIM'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	601	,	18	,	 'ETA'	,	 'UNA'	,	 'AGRESTINA ETA VELHA'	,	 'AGRESTINA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	602	,	18	,	 'ETA'	,	 'UNA'	,	 'ALTINHO'	,	 'ALTINHO'	,	 'PE'	,	-8.488.804		-36.057.255	 '0')	,
(	603	,	18	,	 'ETA'	,	 'UNA'	,	 'BELEM DE MARIA'	,	 'BELEM DE MARIA'	,	 'PE'	,	-8.620.589		-35.841.503	 '0')	,
(	604	,	18	,	 'ETA'	,	 'UNA'	,	 'CUPIRA'	,	 'CUPIRA'	,	 'PE'	,	-8.619.689		-35.951.981	 '0')	,
(	605	,	18	,	 'ETA'	,	 'UNA'	,	 'JUREMA'	,	 'JUREMA'	,	 'PE'	,	-8.713.836		-36.140.232	 '0')	,
(	606	,	18	,	 'ETA'	,	 'UNA'	,	 'QUIPAPA'	,	 'QUIPAPA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	607	,	18	,	 'ETA'	,	 'UNA'	,	 'CANHOTINHO'	,	 'CANHOTINHO'	,	 'PE'	,	-8.881.199		-36.195.686	 '0')	,
(	608	,	18	,	 'ETA'	,	 'UNA'	,	 'PALMEIRINA'	,	 'PALMEIRINA'	,	 'PE'	,	-9.000.997		-36.334.217	 '0')	,
(	609	,	18	,	 'ETA'	,	 'UNA'	,	 'PANELAS'	,	 'PANELAS'	,	 'PE'	,	-8.662.571		-36.005.707	 '0')	,
(	610	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'GRAVATA'	,	 'GRAVATA'	,	 'PE'	,	-8.213.655		-35.571.587	 '0')	,
(	611	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'BEZERROS'	,	 'BEZERROS'	,	 'PE'	,	-8.251.257		-35.747.105	 '0')	,
(	612	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'ALTO BONITO'	,	 'BONITO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	613	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'BARRA DE GUABIRABA'	,	 'BARRA DE GUABIRABA'	,	 'PE'	,	-8.423.873		-35.655.598	 '0')	,
(	614	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'BONITO'	,	 'BONITO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	615	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'CAMOCIM DE SAO FELIX'	,	 'CAMOCIM DE SAO FELIX'	,	 'PE'	,	-8.360.889		-35.767.227	 '0')	,
(	616	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'CHA GRANDE'	,	 'CHA GRANDE'	,	 'PE'	,	-8.245.496		-35.459.389	 '0')	,
(	617	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'POCO DE AREIA'	,	 'SAO JOAQUIM DO MONTE'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	618	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'SAIRE'	,	 'SAIRE'	,	 'PE'	,	-8.329.039		-35.710.911	 '0')	,
(	619	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'SAO JOAQUIM DO MONTE'	,	 'SAO JOAQUIM DO MONTE'	,	 'PE'	,	-8.432.687		-35.804.890	 '0')	,
(	620	,	18	,	 'ETA'	,	 'RUSSAS'	,	 'POMBOS'	,	 'POMBOS'	,	 'PE'	,	-8.180.596		-35.396.740	 '0')	,
(	621	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'BELO JARDIM BITURY'	,	 'BELO JARDIM'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	622	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'BELO JARDIM MANOEL LONGO'	,	 'BELO JARDIM'	,	 'PE'	,	-8.313.228		-36.428.699	 '0')	,
(	623	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'CIMBRES - IPANEMINHA'	,	 'BELO JARDIM'	,	 'PE'	,	-8.368.229		-36.857.700	 '0')	,
(	624	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'SANHARO'	,	 'SANHARO'	,	 'PE'	,	-8.356.172		-36.558.643	 '0')	,
(	625	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'TACAIMBO'	,	 'TACAIMBO'	,	 'PE'	,	-8.316.726		-36.292.164	 '0')	,
(	626	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'LAJEDO - ETA Sao Jacques'	,	 'LAJEDO'	,	 'PE'	,	-8.791.988		-36.204.063	 '0')	,
(	627	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'PESQUEIRA EE - Eta Rosas'	,	 'PESQUEIRA'	,	 'PE'	,	-8.365.853		-36.697.491	 '0')	,
(	628	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'PESQUEIRA - ETA AFETOS 1 E 2'	,	 'PESQUEIRA'	,	 'PE'	,	-8.351.082		-36.692.291	 '0')	,
(	629	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'POCAO'	,	 'POCAO'	,	 'PE'	,	-8.185.566		-36.708.233	 '0')	,
(	630	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'SAO CAETANO'	,	 'SAO CAITANO'	,	 'PE'	,	-8.336.145		-36.125.565	 '0')	,
(	631	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'CALCADO'	,	 'CALCADO'	,	 'PE'	,	-8.737.468		-36.337.975	 '0')	,
(	632	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'JUPI'	,	 'JUPI'	,	 'PE'	,	-8.715.649		-36.414.719	 '0')	,
(	633	,	18	,	 'ETA'	,	 'IPOJUCA'	,	 'SERRA DOS VENTOS'	,	 'SERRA DO VENTO - BELO JARDIM'	,	 'PE'	,	-8.227.087		-36.359.962	 '0')	,
(	634	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'AGUAS BELAS'	,	 'AGUAS BELAS'	,	 'PE'	,	-9.103.195		-37.106.861	 '0')	,
(	635	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'BOM CONSELHO'	,	 'BOM CONSELHO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	636	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'BREJAO'	,	 'BREJAO'	,	 'PE'	,	-9.024.392		-36.566.696	 '0')	,
(	637	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'CAPOEIRAS'	,	 'CAPOEIRAS'	,	 'PE'	,	-8.738.995		-36.628.647	 '0')	,
(	638	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'CORRENTES'	,	 'CORRENTES'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	639	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'LAGOA DO OURO'	,	 'LAGOA DO OURO'	,	 'PE'	,	-9.122.758		-36.460.892	 '0')	,
(	640	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'SAO PEDRO'	,	 'GARANHUNS'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	641	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'TEREZINHA'	,	 'TEREZINHA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	642	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'POCO COMPRIDO'	,	 'CORRENTES'	,	 'PE'	,	-9.039.769		-36.397.255	 '0')	,
(	643	,	18	,	 'ETA'	,	 'MERIDIONAL'	,	 'GARANHUNS'	,	 'GARANHUNS'	,	 'PE'	,	-8.888.430		-36.471.268	 '0')	,
(	644	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'BARRA DE FARIAS'	,	 'BREJO DA MADRE DE DEUS'	,	 'PE'	,	-8.139.542		-36.311.897	 '0')	,
(	645	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'BREJO DA MADRE DE DEUS - SAO JOSE'	,	 'BREJO DA MADRE DE DEUS'	,	 'PE'	,	-8.152.475		-36.370.255	 '0')	,
(	646	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'CUMARU'	,	 'CUMARU'	,	 'PE'	,	-8.005.989		-35.708.931	 '0')	,
(	647	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'SURUBIM - EE - 8'	,	 'SURUBIM'	,	 'PE'	,	-7.853.574		-35.762.505	 '0')	,
(	648	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'JUCAZINHO EE - 9'	,	 'VERTENTES'	,	 'PE'	,	-7.862.765		-35.861.824	 '0')	,
(	649	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'FAZENDA NOVA'	,	 'BREJO DA MADRE DE DEUS'	,	 'PE'	,	-8.169.597		-36.200.459	 '0')	,
(	650	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'JUCAZINHO BARRAGEM'	,	 'CUMARU'	,	 'PE'	,	-7.965.070		-35.738.327	 '0')	,
(	651	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'SANTA CRUZ DO CAPIBARIBE - MACHADOS'	,	 'SANTA CRUZ DO CAPIBARIBE'	,	 'PE'	,	-7.965.500		-36.198.696	 '0')	,
(	652	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'PAO DE ACUCAR'	,	 'BREJO DA MADRE DE DEUS'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	653	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'MATEUS VIEIRA - TAQUARITIGA'	,	 'TAQUARITIGA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	654	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'SANTA CRUZ DO CAPIBARIBE - POCO FUNDO 1'	,	 'SANTA CRUZ DO CAPIBARIBE'	,	 'PE'	,	-7.957.483		-36.217.918	 '0')	,
(	655	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'JATAUBA - POCO FUNDO 2'	,	 'JATAUBA'	,	 'PE'	,	-7.958.535		-36.348.530	 '0')	,
(	656	,	18	,	 'ETA'	,	 'ALTO CAPIBARIBE'	,	 'TORITAMA'	,	 'TORITAMA'	,	 'PE'	,	-8.008.936		-36.063.011	 '0')	,
(	657	,	18	,	 'ETA'	,	 'A. CENTRAL'	,	 'AGRESTINA ETA NOVA'	,	 'AGRESTINA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	658	,	18	,	 'ETA'	,	 'A. CENTRAL'	,	 'TAQUARA EE'	,	 'SAO JOAQUIM DO MONTE'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	659	,	18	,	 'ETA'	,	 'A. CENTRAL'	,	 'RIACHO DAS ALMAS'	,	 'RIACHO DAS ALMAS'	,	 'PE'	,	-8.138.643		-35.859.577	 '0')	,
(	660	,	18	,	 'ETA'	,	 'A. CENTRAL'	,	 'SALGADO'	,	 'CARUARU'	,	 'PE'	,	-8.274.841		-35.953.995	 '0')	,
(	661	,	18	,	 'ETA'	,	 'A. CENTRAL'	,	 'CARUARU - PETROPOLIS'	,	 'CARUARU'	,	 'PE'	,	-8.300.736		-35.979.527	 '0')	,
(	662	,	18	,	 'ETA'	,	 'A. CENTRAL'	,	 'AMEIXAS'	,	 'CUMARU'	,	 'PE'	,	-8.103.991		-35.770.191	 '0')	,
(	663	,	18	,	 'ETA'	,	 'A. CENTRAL'	,	 'BARRA DO RIACHAO'	,	 'SAO JOAQUIM DO MONTE'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	664	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'ARCOVERDE'	,	 'ARCOVERDE'	,	 'PE'	,	-8.424.479		-37.046.631	 '0')	,
(	665	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'BUIQUE'	,	 'BUIQUE'	,	 'PE'	,	-8.615.462		-37.155.212	 '0')	,
(	666	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'CUSTODIA'	,	 'CUSTODIA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	667	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'CRUZEIRO DO NORDESTE'	,	 'SERTANIA'	,	 'PE'	,	-8.364.086		-37.275.459	 '0')	,
(	668	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'IBIMIRIM - POCOS'	,	 'IBIMIRIM'	,	 'PE'	,	-8.540.442		-37.701.382	 '0')	,
(	669	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'SERTANIA - EE MOXOTO-POCOS'	,	 'SERTANIA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	670	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'VENTUROSA'	,	 'VENTUROSA'	,	 'PE'	,	-8.577.239		-36.869.709	 '0')	,
(	671	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'BUIQUE - BREJO DE SAO JOSE'	,	 'BUIQUE'	,	 'PE'	,	-8.545.031		-37.214.615	 '0')	,
(	672	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'PEDRA'	,	 'PEDRA'	,	 'PE'	,	-8.499.884		-36.941.071	 '0')	,
(	673	,	18	,	 'ETA'	,	 'MOXOTO'	,	 'SERTANIA - ETA'	,	 'SERTANIA'	,	 'PE'	,	-8.080.267		-37.265.846	 '0')	,
(	674	,	18	,	 'ETA'	,	 'PAJEU'	,	 'SERRA TALHADA'	,	 'SERRA TALHADA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	675	,	18	,	 'ETA'	,	 'PAJEU'	,	 'FLORESTA'	,	 'FLORESTA'	,	 'PE'	,	-8.608.774		-38.570.427	 '0')	,
(	676	,	18	,	 'ETA'	,	 'PAJEU'	,	 'ITAPARICA'	,	 'JATOBA'	,	 'PE'	,	-9.170.604		-38.269.543	 '0')	,
(	677	,	18	,	 'ETA'	,	 'PAJEU'	,	 'ITACURUBA'	,	 'ITACURUBA'	,	 'PE'	,	-8.726.460		-38.689.785	 '0')	,
(	678	,	18	,	 'ETA'	,	 'PAJEU'	,	 'PETROLANDIA'	,	 'PETROLANDIA'	,	 'PE'	,	-8.984.767		-38.230.881	 '0')	,
(	679	,	18	,	 'ETA'	,	 'PAJEU'	,	 'TRIUNFO'	,	 'TRIUNFO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	680	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'AFOGADOS DA INGAZEIRA'	,	 'AFOGADOS DA INGAZEIRA'	,	 'PE'	,	-7.742.849		-37.624.866	 '0')	,
(	681	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'BREJINHO'	,	 'BREJINHO'	,	 'PE'	,	-7.345.710		-37.289.700	 '0')	,
(	682	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'CARNAIBA'	,	 'CARNAIBA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	683	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'JABITACA - EE'	,	 'PASSAGEM DOS CAVALOS - IGUARACI'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	684	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'GIQUIRI - EE TABIRA'	,	 'TABIRA'	,	 'PE'	,	-7.662.356		-37.571.320	 '0')	,
(	685	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'CARNAIBA - POCOS CAROA E MANICOBA - EE'	,	 'CARNAIBA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	686	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'ITAPETIM - ETA'	,	 'ITAPETIM'	,	 'PE'	,	-7.375.270		-37.189.850	 '0')	,
(	687	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'ITAPETIM - EE'	,	 'ITAPETIM'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	688	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'IGUARACI'	,	 'IGUARACI'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	689	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'JABITACA'	,	 'IGUARACI'	,	 'PE'	,	-7.832.915		-37.372.841	 '0')	,
(	690	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'QUIXABA'	,	 'QUIXABA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	691	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'SANTA TEREZINHA'	,	 'SANTA TEREZINHA'	,	 'PE'	,	-7.374.820		-37.477.161	 '0')	,
(	692	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'SOLIDAO'	,	 'SOLIDAO'	,	 'PE'	,	-7.599.019		-37.652.985	 '0')	,
(	693	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'TUPARETAMA'	,	 'TUPARETAMA'	,	 'PE'	,	-7.602.373		-37.309.395	 '0')	,
(	694	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'SAO JOSE DO EGITO'	,	 'SAO JOSE DO EGITO'	,	 'PE'	,	-7.485.956		-37.283.710	 '0')	,
(	695	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'VILA DE FATIMA EE'	,	 'FATIMA - FLORES'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	696	,	18	,	 'ETA'	,	 'ALTO PAJEU'	,	 'SITIO DOS NUNES EE'	,	 'SITIO DOS NUNES - FLORES'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	697	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'CABROBO'	,	 'CABROBO'	,	 'PE'	,	-8.509.192		-39.312.366	 '0')	,
(	698	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'OROCO'	,	 'OROCO'	,	 'PE'	,	-8.617.322		-39.603.657	 '0')	,
(	699	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'SANTA MARIA DA BOA VISTA'	,	 'SANTA MARIA DA BOA VISTA'	,	 'PE'	,	-8.809.090		-39.825.153	 '0')	,
(	700	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'SALGUEIRO'	,	 'SALGUEIRO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	701	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'CEDRO'	,	 'CEDRO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	702	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'PARNAMIRIM'	,	 'PARNAMIRIM'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	703	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'SERRITA'	,	 'SERRITA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	704	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'TERRA NOVA'	,	 'TERRA NOVA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	705	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'UMAS'	,	 'SALGUEIRO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	706	,	18	,	 'ETA'	,	 'SERTAO CENTRAL'	,	 'BELEM DE SAO FRANCISCO'	,	 'BELEM DO SAO FRANCISCO'	,	 'PE'	,	-8.755.383		-38.967.621	 '0')	,
(	707	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'OURICURI  - VOLUNTARIOS DA PATRIA'	,	 'OURICURI'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	708	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'BODOCO - COMPACTA'	,	 'BODOCO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	709	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'GERGELIM'	,	 'ARARIPINA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	710	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'IPUBI'	,	 'IPUBI'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	711	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'SANTA CRUZ DE MALTA'	,	 'SANTA CRUZ'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	712	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'LAGOA DO BARRO'	,	 'ARARIPINA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	713	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'TRINDADE'	,	 'TRINDADE'	,	 'PE'	,	-7.763.106		-40.266.312	 '0')	,
(	714	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'BODOCO - ETA Luiz Gonzaga'	,	 'BODOCO'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	715	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'ARARIPINA'	,	 'ARARIPINA'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	716	,	18	,	 'ETA'	,	 'ARARIPE'	,	 'SERROLANDIA'	,	 'IPUBI'	,	 'PE'	,	 0.000000		 0.000000	 '0')	,
(	717	,	18	,	 'ETA'	,	 'SAO FCO.'	,	 'PETROLINA ETA I CENTRO'	,	 'PETROLINA'	,	 'PE'	,	-9.389.639		-40.501.854	 '0')	,
(	718	,	18	,	 'ETA'	,	 'SAO FCO.'	,	 'PETROLINA ETA II INDUSTRIAL'	,	 'PETROLINA'	,	 'PE'	,	-9.401.643		-40.524.124	 '0')	,
(	719	,	18	,	 'ETA'	,	 'SAO FCO.'	,	 'LAGOA GRANDE'	,	 'LAGOA GRANDE'	,	 'PE'	,	-9.007.523		-40.273.643	 '0')	,
(	720	,	18	,	 'ETA'	,	 'SAO FCO.'	,	 'PETROLINA - VITORIA'	,	 'PETROLINA'	,	 'PE'	,	-9.411.581		-40.537.720	 '0')	,
(	721	,	19	,	 'ETA'	,	 ''	,	 '40 HORAS SABIA'	,	 'ANANINDEUA'	,	 'PA'	,	-1.345.336		-48.415.913	 '0')	,
(	722	,	19	,	 'ETA'	,	 ''	,	 '5 SETOR'	,	 'BELEM'	,	 'PA'	,	-1.427.460		-48.456.375	 '0')	,
(	723	,	19	,	 'ETA'	,	 ''	,	 'ABAETETUBA'	,	 'ABAETETUBA'	,	 'PA'	,	-1.721.471		-48.882.038	 '0')	,
(	724	,	19	,	 'ETA'	,	 ''	,	 'ABAETETUBA ALGODOAL'	,	 'ABAETETUBA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	725	,	19	,	 'ETA'	,	 ''	,	 'AFUA'	,	 'AFUA'	,	 'PA'	,	 -0.153839		-50.387.634	 '0')	,
(	726	,	19	,	 'ETA'	,	 ''	,	 'ALENQUER'	,	 'ALENQUER'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	727	,	19	,	 'ETA'	,	 ''	,	 'ALTAMIRA'	,	 'ALTAMIRA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	728	,	19	,	 'ETA'	,	 ''	,	 'ANAJAS'	,	 'ANAJAS'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	729	,	19	,	 'ETA'	,	 ''	,	 'ANANINDEUA - CENTRO'	,	 'ANANINDEUA'	,	 'PA'	,	-1.353.234		-48.373.718	 '0')	,
(	730	,	19	,	 'ETA'	,	 ''	,	 'ARIRI 1'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	731	,	19	,	 'ETA'	,	 ''	,	 'ARIRI 2'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	732	,	19	,	 'ETA'	,	 ''	,	 'ARIRI-BOLONHA'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	733	,	19	,	 'ETA'	,	 ''	,	 'AUGUSTO CORREIA'	,	 'AUGUSTO CORREA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	734	,	19	,	 'ETA'	,	 'METROPOLITANA'	,	 'BELEM - BEJAMIM SODRE P5/ P8'	,	 'BELEM'	,	 'PA'	,	-1.358.783		-48.447.216	 '0')	,
(	735	,	19	,	 'ETA'	,	 ''	,	 'BENGUI'	,	 'BELEM'	,	 'PA'	,	-1.375.771		-48.442.387	 '0')	,
(	736	,	19	,	 'ETA'	,	 ''	,	 'BOLONHA'	,	 'BELEM'	,	 'PA'	,	-1.418.849		-48.439.255	 '0')	,
(	737	,	19	,	 'ETA'	,	 ''	,	 'BRAGANCA - CHUMUCUI'	,	 'BRAGANCA'	,	 'PA'	,	-1.095.969		-46.792.015	 '0')	,
(	738	,	19	,	 'ETA'	,	 ''	,	 'BREU BRANCO'	,	 'BREU BRANCO'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	739	,	19	,	 'ETA'	,	 ''	,	 'BREVES'	,	 'BREVES'	,	 'PA'	,	-1.686.340		-50.483.463	 '0')	,
(	740	,	19	,	 'ETA'	,	 'METROPOLITANA'	,	 'CANARINHO'	,	 'BELEM'	,	 'PA'	,	-1.336.990		-48.456.860	 '0')	,
(	741	,	19	,	 'ETA'	,	 ''	,	 'CAPANEMA - VILA TAUARI'	,	 'CAPANEMA'	,	 'PA'	,	-1.123.523		-47.059.689	 '0')	,
(	742	,	19	,	 'ETA'	,	 ''	,	 'CAPITAO POCO'	,	 'CAPITAO POCO'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	743	,	19	,	 'ETA'	,	 ''	,	 'CASTANHAL'	,	 'CASTANHAL'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	744	,	19	,	 'ETA'	,	 'BAIXO AMAZONAS'	,	 'CASTANHAL - CAICARA'	,	 'CASTANHAL'	,	 'PA'	,	-1.316.026		-47.896.694	 '0')	,
(	745	,	19	,	 'ETA'	,	 ''	,	 'CATALINA'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	746	,	19	,	 'ETA'	,	 ''	,	 'CDP'	,	 'BELEM'	,	 'PA'	,	-1.402.817		-48.481.049	 '0')	,
(	747	,	19	,	 'ETA'	,	 ''	,	 'CHEGUEVARA'	,	 'MARITUBA'	,	 'PA'	,	-1.368.779		-48.309.189	 '0')	,
(	748	,	19	,	 'ETA'	,	 ''	,	 'CIDADE NOVA ( ANANINDEUA )'	,	 'ANANINDEUA'	,	 'PA'	,	-1.369.837		-48.409.344	 '0')	,
(	749	,	19	,	 'ETA'	,	 ''	,	 'COHAB'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	750	,	19	,	 'ETA'	,	 ''	,	 'CASTANHAL - COMANDANTE ASSIS'	,	 'CASTANHAL'	,	 'PA'	,	-1.290.090		-47.932.018	 '0')	,
(	751	,	19	,	 'ETA'	,	 ''	,	 'CONCEICAO DO ARAGUAIA'	,	 'CONCEICAO DO ARAGUAIA'	,	 'PA'	,	-8.283.513		-49.264.668	 '0')	,
(	752	,	19	,	 'ETA'	,	 ''	,	 'CONJUNTO MAGUARI'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	753	,	19	,	 'ETA'	,	 ''	,	 'COQUEIRO'	,	 'BELEM'	,	 'PA'	,	-1.370.034		-48.429.482	 '0')	,
(	754	,	19	,	 'ETA'	,	 ''	,	 'CORDEIRO DE FARIAS I'	,	 'BELEM'	,	 'PA'	,	-1.350.143		-48.464.813	 '0')	,
(	755	,	19	,	 'ETA'	,	 ''	,	 'CORDEIRO DE FARIAS II'	,	 'BELEM'	,	 'PA'	,	-1.350.183		-48.464.642	 '0')	,
(	756	,	19	,	 'ETA'	,	 ''	,	 'DOM ELISEU'	,	 'DOM ELISEU'	,	 'PA'	,	-4.247.476		-47.561.039	 '0')	,
(	757	,	19	,	 'ETA'	,	 ''	,	 'FARO'	,	 'FARO'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	758	,	19	,	 'ETA'	,	 ''	,	 'GUANABARA I'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	759	,	19	,	 'ETA'	,	 ''	,	 'GUANABARA II'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	760	,	19	,	 'ETA'	,	 ''	,	 'IGARAPE - MIRI C. NOVA'	,	 'IGARAPE-MIRI'	,	 'PA'	,	 0.000000		 0.000000	 '1')	,
(	761	,	19	,	 'ETA'	,	 ''	,	 'IGARAPE - MIRI ESCRITORIO'	,	 'IGARAPE-MIRI'	,	 'PA'	,	 0.000000		 0.000000	 '1')	,
(	762	,	19	,	 'ETA'	,	 ''	,	 'IGARAPE - MIRI ESTACAO'	,	 'IGARAPE-MIRI'	,	 'PA'	,	-1.980.562		-48.964.458	 '0')	,
(	763	,	19	,	 'ETA'	,	 ''	,	 'INHANGAPI'	,	 'INHANGAPI'	,	 'PA'	,	-1.428.812		-47.913.094	 '0')	,
(	764	,	19	,	 'ETA'	,	 ''	,	 'ITAITUBA'	,	 'ITAITUBA'	,	 'PA'	,	-4.276.419		-55.986.370	 '0')	,
(	765	,	19	,	 'ETA'	,	 ''	,	 'ITUPIRANGA'	,	 'ITUPIRANGA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	766	,	19	,	 'ETA'	,	 ''	,	 'JACUNDA'	,	 'JACUNDA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	767	,	19	,	 'ETA'	,	 ''	,	 'JADERLANDIA'	,	 'BELEM'	,	 'PA'	,	-1.303.696		-47.895.348	 '0')	,
(	768	,	19	,	 'ETA'	,	 ''	,	 'JURUTI'	,	 'JURUTI'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	769	,	19	,	 'ETA'	,	 ''	,	 'LIMOEIRO DO AJURU'	,	 'LIMOEIRO DO AJURU'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	770	,	19	,	 'ETA'	,	 ''	,	 'MAGALHAES BARATA'	,	 'MAGALHAES BARATA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	771	,	19	,	 'ETA'	,	 ''	,	 'MAGUARI'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	772	,	19	,	 'ETA'	,	 ''	,	 'MAIUATA'	,	 'IGARAPE-MIRI'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	773	,	19	,	 'ETA'	,	 ''	,	 'MARABA CIDADE NOVA'	,	 'MARABA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	774	,	19	,	 'ETA'	,	 ''	,	 'MARABA NOVA'	,	 'MARABA'	,	 'PA'	,	-5.326.060		-49.077.007	 '0')	,
(	775	,	19	,	 'ETA'	,	 ''	,	 'MARABA PIONEIRA'	,	 'MARABA'	,	 'PA'	,	-5.339.151		-49.124.325	 '0')	,
(	776	,	19	,	 'ETA'	,	 ''	,	 'MARAPANIN'	,	 'MARAPANIM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	777	,	19	,	 'ETA'	,	 ''	,	 'MARITUBA BEIJA FLOR'	,	 'MARITUBA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	778	,	19	,	 'ETA'	,	 ''	,	 'MARITUBA CENTRO'	,	 'MARITUBA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	779	,	19	,	 'ETA'	,	 ''	,	 'MARITUBA COHAB'	,	 'MARITUBA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	780	,	19	,	 'ETA'	,	 ''	,	 'MARUDA'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	781	,	19	,	 'ETA'	,	 ''	,	 'CASTANHAL - MILAGRE'	,	 'CASTANHAL'	,	 'PA'	,	-1.304.667		-47.908.070	 '0')	,
(	782	,	19	,	 'ETA'	,	 ''	,	 'MOCAJUBA'	,	 'MOCAJUBA'	,	 'PA'	,	-2.585.868		-49.510.075	 '0')	,
(	783	,	19	,	 'ETA'	,	 ''	,	 'MOJU'	,	 'MOJU'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	784	,	19	,	 'ETA'	,	 ''	,	 'MONTE ALEGRE'	,	 'MONTE ALEGRE'	,	 'PA'	,	-1.994.172		-54.055.305	 '0')	,
(	785	,	19	,	 'ETA'	,	 ''	,	 'MOSQUEIRO - BAIA DO SOL'	,	 'BELEM'	,	 'PA'	,	-1.065.420		-48.335.876	 '0')	,
(	786	,	19	,	 'ETA'	,	 'NORDESTE'	,	 'NOVA TIMBOTEUA - ESCRITORIO'	,	 'NOVA TIMBOTEUA'	,	 'PA'	,	-1.206.102		-47.386.929	 '0')	,
(	787	,	19	,	 'ETA'	,	 ''	,	 'NOVO REPARTIMENTO'	,	 'NOVO REPARTIMENTO'	,	 'PA'	,	-4.248.727		-49.956.219	 '0')	,
(	788	,	19	,	 'ETA'	,	 ''	,	 'OBIDOS'	,	 'OBIDOS'	,	 'PA'	,	-1.900.192		-55.508.858	 '0')	,
(	789	,	19	,	 'ETA'	,	 ''	,	 'OEIRA DO PARA'	,	 'OEIRAS DO PARA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	790	,	19	,	 'ETA'	,	 'BAIXO AMAZONAS'	,	 'ORIXIMINA'	,	 'ORIXIMINA'	,	 'PA'	,	-1.763.572		-55.866.089	 '0')	,
(	791	,	19	,	 'ETA'	,	 ''	,	 'OUREM'	,	 'OUREM'	,	 'PA'	,	-1.547.717		-47.111.763	 '0')	,
(	792	,	19	,	 'ETA'	,	 ''	,	 'PAAR'	,	 'BELEM'	,	 'PA'	,	-1.336.669		-48.383.354	 '0')	,
(	793	,	19	,	 'ETA'	,	 ''	,	 'PANORAMA XXI'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	794	,	19	,	 'ETA'	,	 'NORDESTE'	,	 'PEIXE BOI'	,	 'PEIXE-BOI'	,	 'PA'	,	-1.189.073		-47.317.852	 '0')	,
(	795	,	19	,	 'ETA'	,	 ''	,	 'PONTA DE PEDRAS'	,	 'PONTA DE PEDRAS'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	796	,	19	,	 'ETA'	,	 ''	,	 'PORTEL'	,	 'PORTEL'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	797	,	19	,	 'ETA'	,	 ''	,	 'PRAINHA'	,	 'PRAINHA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	798	,	19	,	 'ETA'	,	 ''	,	 'PRATINHA'	,	 'BELEM'	,	 'PA'	,	-1.376.450		-48.480.061	 '0')	,
(	799	,	19	,	 'ETA'	,	 ''	,	 'R6'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	800	,	19	,	 'ETA'	,	 ''	,	 'SALGADO GRANDE'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	801	,	19	,	 'ETA'	,	 ''	,	 'SALINOPOLIS - ESCRITORIO '	,	 'SALINOPOLIS'	,	 'PA'	,	 -0.621626		-47.354.694	 '0')	,
(	802	,	19	,	 'ETA'	,	 ''	,	 'SALVA TERRA'	,	 'SALVATERRA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	803	,	19	,	 'ETA'	,	 ''	,	 'SANTA CRUZ DO ARARI'	,	 'SANTA CRUZ DO ARARI'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	804	,	19	,	 'ETA'	,	 ''	,	 'SANTA LUZIA DO PARA'	,	 'SANTA LUZIA DO PARA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	805	,	19	,	 'ETA'	,	 ''	,	 'SANTA MARIA DAS BARREIRAS'	,	 'SANTA MARIA DAS BARREIRAS'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	806	,	19	,	 'ETA'	,	 ''	,	 'SANTA MARIA DO PARA - POCO SANTA ROSA'	,	 'SANTA MARIA DO PARA'	,	 'PA'	,	-1.357.914		-47.568.630	 '0')	,
(	807	,	19	,	 'ETA'	,	 'BAIXO AMAZONAS'	,	 'SANTAREM'	,	 'SANTAREM'	,	 'PA'	,	-2.443.421		-54.731.266	 '0')	,
(	808	,	19	,	 'ETA'	,	 ''	,	 'SAO BRAS'	,	 'BELEM'	,	 'PA'	,	-1.449.566		-48.469.711	 '0')	,
(	809	,	19	,	 'ETA'	,	 ''	,	 'SAO CAETANO DE ODOVELAS'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	810	,	19	,	 'ETA'	,	 ''	,	 'SAO FELIX DO XINGU'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	811	,	19	,	 'ETA'	,	 ''	,	 'SAO FRANCISCO DO PARA'	,	 'BELEM'	,	 'PA'	,	-1.175.049		-47.803.097	 '0')	,
(	812	,	19	,	 'ETA'	,	 ''	,	 'SATELITE'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	813	,	19	,	 'ETA'	,	 ''	,	 'SIDERAL'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	814	,	19	,	 'ETA'	,	 ''	,	 'SOURE - ETA  CAPITACAO  01'	,	 'SOURE'	,	 'PA'	,	 -0.729109		-48.509.682	 '0')	,
(	815	,	19	,	 'ETA'	,	 ''	,	 'TAILANDIA'	,	 'TAILANDIA'	,	 'PA'	,	-2.948.317		-48.954.170	 '0')	,
(	816	,	19	,	 'ETA'	,	 ''	,	 'TANGARAS'	,	 'BELEM'	,	 'PA'	,	-1.276.293		-47.954.727	 '0')	,
(	817	,	19	,	 'ETA'	,	 ''	,	 'TENONE'	,	 'BELEM'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	818	,	19	,	 'ETA'	,	 ''	,	 'TERRA SANTA'	,	 'TERRA SANTA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	819	,	19	,	 'ETA'	,	 ''	,	 'TRACUATEUA'	,	 'TRACUATEUA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	820	,	19	,	 'ETA'	,	 ''	,	 'UIRAPURU'	,	 'ANANINDEUA'	,	 'PA'	,	-1.327.977		-48.399.700	 '0')	,
(	821	,	19	,	 'ETA'	,	 ''	,	 'CASTANHAL - USINA'	,	 'CASTANHAL'	,	 'PA'	,	-1.295.059		-47.930.981	 '0')	,
(	822	,	19	,	 'ETA'	,	 ''	,	 'VERDEJANTE'	,	 'BELEM'	,	 'PA'	,	-1.410.794		-48.394.173	 '0')	,
(	823	,	19	,	 'ETA'	,	 ''	,	 'VIGIA DE NAZARE'	,	 'VIGIA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	824	,	19	,	 'ETA'	,	 ''	,	 'VILA CAFEZAL'	,	 'MAGALHAES BARATA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	825	,	19	,	 'ETA'	,	 ''	,	 'VILA CUIARANA - SALINOPOLIS'	,	 'SALINOPOLIS'	,	 'PA'	,	 -0.650630		-47.265.739	 '0')	,
(	826	,	19	,	 'ETA'	,	 ''	,	 'VILA DE BEJA'	,	 'ABAETETUBA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	827	,	19	,	 'ETA'	,	 ''	,	 'CASTANHAL - VILA DO APEU'	,	 'CASTANHAL'	,	 'PA'	,	-1.299.429		-47.989.017	 '0')	,
(	828	,	19	,	 'ETA'	,	 ''	,	 'VILA FATIMA'	,	 'TRACUATEUA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	829	,	19	,	 'ETA'	,	 ''	,	 'VILA MAUIATA'	,	 'IGARAPE-MIRI'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	830	,	19	,	 'ETA'	,	 ''	,	 'VILA TAUARI'	,	 'CAPANEMA'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	831	,	19	,	 'ETA'	,	 ''	,	 'VISEU'	,	 'VISEU'	,	 'PA'	,	 0.000000		 0.000000	 '0')	,
(	832	,	19	,	 'ETA'	,	 ''	,	 'NOVA TIMBOTEUA - BOMBEAMENTO'	,	 'NOVA TIMBOTEUA'	,	 'PA'	,	-1.201.429		-47.386.414	 '0')	,
(	833	,	19	,	 'ETA'	,	 ''	,	 'MOSQUEIRO - CARANANDUBA'	,	 'BELEM'	,	 'PA'	,	-1.098.898		-48.404.671	 '0')	,
(	834	,	19	,	 'ETA'	,	 ''	,	 'MOSQUEIRO - VILA 5 RUA'	,	 'BELEM'	,	 'PA'	,	-1.157.928		-48.467.670	 '0')	,
(	835	,	19	,	 'ETA'	,	 ''	,	 'MOSQUEIRO - PRAIA DO BISPO'	,	 'BELEM'	,	 'PA'	,	-1.158.657		-48.470.985	 '0')	,
(	836	,	19	,	 'ETA'	,	 ''	,	 'SANTA MARIA DO PARA - ESCRITORIO'	,	 'SANTA MARIA DO PARA'	,	 'PA'	,	-1.346.685		-47.576.855	 '0')	,
(	837	,	19	,	 'ETA'	,	 ''	,	 'POCO AVENIDA SANTA MARIA'	,	 'SANTA MARIA DO PARA'	,	 'PA'	,	-1.351.954		-47.580.505	 '0')	,
(	838	,	19	,	 'ETA'	,	 ''	,	 'MOSQUEIRO - MURUBIRA'	,	 'BELEM'	,	 'PA'	,	-1.124.940		-48.443.092	 '0')	,
(	839	,	19	,	 'ETA'	,	 ''	,	 'NOVA ITAITUBA'	,	 'ITAITUBA'	,	 'PA'	,	-4.276.763		-55.985.931	 '0')	,
(	840	,	19	,	 'ETA'	,	 ''	,	 'GUAXINI - SALINOPOLIS'	,	 'SALINOPOLIS'	,	 'PA'	,	 -0.635871		-47.338.905	 '0')	,
(	841	,	19	,	 'ETA'	,	 ''	,	 'DOM BOSCO - SALINOPOLIS'	,	 'SALINOPOLIS'	,	 'PA'	,	 -0.626358		-47.348.053	 '0')	,
(	842	,	19	,	 'ETA'	,	 ''	,	 'SALINOPOLIS - POCO FAROL'	,	 'SALINOPOLIS'	,	 'PA'	,	 -0.615963		-47.356.705	 '0')	,
(	843	,	19	,	 'ETA'	,	 ''	,	 'SANTAREM - ETE  MAPIRI'	,	 'SANTAREM'	,	 'PA'	,	-2.433.491		-54.741.261	 '0')	,
(	844	,	19	,	 'ETA'	,	 ''	,	 'SATAREM - ETE  URUARA'	,	 'SANTAREM'	,	 'PA'	,	-2.438.790		-54.688.564	 '0')	,
(	845	,	19	,	 'ETA'	,	 'CENTRO'	,	 'CACHOEIRA DO ARIRI'	,	 'CACHOEIRA DO ARIRI'	,	 'PA'	,	-1.008.872		-48.960.564	 '0')	,
(	846	,	19	,	 'ETA'	,	 ''	,	 'SOURE - ETA  CAPITACAO 03'	,	 'SOURE'	,	 'PA'	,	 -0.731857		-48.516.785	 '0')	,
(	847	,	19	,	 'ETA'	,	 ''	,	 'CAPANEMA - ETA CAETE'	,	 'CAPANEMA'	,	 'PA'	,	-1.298.373		-47.105.793	 '0')	,
(	848	,	20	,	 'ETA'	,	 ''	,	 'ETA II - NOVA'	,	 'VARZEA GRANDE'	,	 'MT'	,	-15.640.475		-56.169.144	 '0')	,
(	849	,	20	,	 'ETA'	,	 ''	,	 'ETA I VELHA'	,	 'VARZEA GRANDE'	,	 'MT'	,	-15.642.120		-56.129.044	 '0')	,
(	850	,	21	,	 'ETA'	,	 ''	,	 'RIO BRANCO - SOBRAL'	,	 'RIO BRANCO'	,	 'AC'	,	-10.004.355		-67.842.430	 '0')	,
(	851	,	22	,	 'ETA'	,	 ''	,	 'ETA CAJAIBA - ITABAIANA'	,	 'ITABAIANA'	,	 'SE'	,	-10.800.071		-37.431.705	 '0')	,
(	852	,	22	,	 'ETA'	,	 ''	,	 'AREIA BRANCA'	,	 'AREIA BRANCA'	,	 'SE'	,	-10.759.086		-37.318.226	 '0')	,
(	853	,	22	,	 'ETA'	,	 ''	,	 'LAGARTO'	,	 'LAGARTO'	,	 'SE'	,	-10.919.917		-37.663.715	 '0')	,
(	854	,	22	,	 'ETA'	,	 ''	,	 'TOBIAS BARRETO'	,	 'TOBIAS BARRETO'	,	 'SE'	,	-11.183.032		-37.998.806	 '0')	,
(	855	,	23	,	 'ETA'	,	 ''	,	 'GERDAU - DIVINOPOLIS'	,	 'DIVINOPOLIS'	,	 'MG'	,	-20.154.253		-44.876.175	 '0')	,
(	856	,	24	,	 'ETA'	,	 ''	,	 'HEINEKEN PACATUBA'	,	 'PACATUBA'	,	 'CE'	,	-3.910.485		-38.605.469	 '0')	,
(	857	,	24	,	 'ETA'	,	 ''	,	 'HEINEKEN - GUABIRABA BOLA NA REDE '	,	 'RECIFE'	,	 'PE'	,	-7.961.615		-34.923.550	 '0')	,
(	858	,	24	,	 'ETA'	,	 ''	,	 'HEINEKEN BENEVIDES'	,	 'BENEVIDES'	,	 'PA'	,	-1.345.641		-48.253.624	 '0')	,
(	859	,	25	,	 'ETA'	,	 ''	,	 'PETROLINA'	,	 'PETROLINA'	,	 'PE'	,	-9.395.545		-40.529.633	 '0')	,
(	860	,	26	,	 'ETA'	,	 ''	,	 'BACABAL'	,	 'BACABAL'	,	 'MA'	,	-4.234.617		-44.778.370	 '0')	,
(	861	,	27	,	 'ETA'	,	 'CAXIAS'	,	 'CAXIAS - ETA POINT'	,	 'CAXIAS'	,	 'MA'	,	-4.885.044		-43.381.466	 '0')	,
(	862	,	27	,	 'ETA'	,	 'CAXIAS'	,	 'CAXIAS - ETA VOLTA REDONDA'	,	 'CAXIAS'	,	 'MA'	,	-4.883.550		-43.354.828	 '0')	,
(	863	,	28	,	 'ETA'	,	 ''	,	 'QUIXERAMOBIM'	,	 'QUIXERAMOBIM'	,	 'CE'	,	-5.194.560		-39.311.630	 '0')	,
(	864	,	29	,	 'ETA'	,	 ''	,	 'SOBRAL'	,	 'SOBRAL'	,	 'CE'	,	-3.704.259		-40.369.671	 '0')	,
(	865	,	30	,	 'ETA'	,	 ''	,	 'SANEAR RONDONOPOLIS'	,	 'RONDONOPOLIS'	,	 'MT'	,	-16.478.191		-54.615.631	 '0')	,
(	866	,	31	,	 'ETA'	,	 ''	,	 'SAAE - SERRA NEGRA DO NORTE'	,	 'SERRA NEGRA DO NORTE'	,	 'RN'	,	-6.670.883		-37.391.548	 '0')	,
(	867	,	32	,	 'ETA'	,	 ''	,	 'MACEIO'	,	 'MACEIO'	,	 'AL'	,	-9.554.441		-35.742.565	 '0')	,
(	868	,	32	,	 'ETA'	,	 ''	,	 'PETROLINA'	,	 'PETROLINA'	,	 'PE'	,	-9.395.559		-40.530.453	 '0')	,
(	869	,	32	,	 'ETA'	,	 ''	,	 'ARAPIRACA'	,	 'ARAPIRACA'	,	 'AL'	,	-9.785.653		-36.655.251	 '0')	,
(	870	,	32	,	 'ETA'	,	 ''	,	 'SOLAR - MARACANAU'	,	 'MARACANAU'	,	 'CE'	,	-3.854.120		-38.597.046	 '0')	,
(	871	,	32	,	 'ETA'	,	 ''	,	 'SOLAR SAO LUIZ'	,	 'SAO LUIZ'	,	 'MA'	,	-2.734.929		-44.334.446	 '0')	,
(	872	,	32	,	 'ETA'	,	 ''	,	 'CABO DE SANTO AGOSTINHO'	,	 'CABO DE SANTO AGOSTINHO'	,	 'PE'	,	-8.338.514		-35.021.915	 '0')	,
(	873	,	33	,	 'ETA'	,	 ''	,	 'CAMPUS - NATAL UFRN'	,	 'NATAL'	,	 'RN'	,	-5.837.338		-35.202.271	 '0')	,
(	874	,	34	,	 'ETA'	,	 ''	,	 'USINA OLHO DAGUA'	,	 'CAMUTANGA'	,	 'PE'	,	-7.418.442		-35.256.939	 '0')	;


--
-- Estrutura da tabela `tb_local_categoria`
--

CREATE TABLE `tb_local_categoria` (
  `id` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_local_categoria`
--

INSERT INTO `tb_local_categoria` (`id`, `local`, `categoria`, `ativo`) VALUES
(1, 2, 1, '0'),
(2, 2, 3, '0'),
(3, 3, 1, '0'),
(4, 595, 1, '0'),
(5, 595, 2, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_loja`
--

CREATE TABLE `tb_loja` (
  `id` int(11) NOT NULL,
  `nick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `proprietario` int(11) NOT NULL,
  `grupo` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `seguimento` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_loja`
--
INSERT INTO `tb_loja` (	`id`	,	 `nick`	,	 `name`	,	 `proprietario`	,	 `grupo`	,	 `seguimento`	,	 `data`	,	 `ativo`	) VALUES
(	1	,	 'SABARA'	,'	SABARA	',	1	,	 'P'	,	 'IND'	,	 '2018-04-01'	,	 '0'	),
(	2	,	 'AGESPISA'	,'	AGESPISA	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	3	,	 'ALUBAR'	,'	ALUBAR	',	1	,	 'C'	,	 'IND'	,	 '2018-04-01'	,	 '0'	),
(	4	,	 'AMBEV'	,'	AMBEV	',	1	,	 'C'	,	 'BEB'	,	 '2018-04-01'	,	 '0'	),
(	5	,	 'APERAM'	,'	APERAM	',	1	,	 'C'	,	 'IND'	,	 '2018-04-01'	,	 '0'	),
(	6	,	 'BATERIAS MOURA'	,'	BATERIAS MOURA	',	1	,	 'C'	,	 'IND'	,	 '2018-04-01'	,	 '0'	),
(	7	,	 'BIOSEV - GIASA'	,'	BIOSEV - GIASA	',	1	,	 'C'	,	 'USI'	,	 '2018-04-01'	,	 '0'	),
(	8	,	 'CAB AGRESTE'	,'	CAB AGRESTE	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	9	,	 'CAB CUIABA'	,'	CAB CUIABA	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	10	,	 'CAEMA'	,'	CAEMA	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	11	,	 'CAER'	,'	CAER	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	12	,	 'CAERN'	,'	CAERN	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	13	,	 'CAESA'	,'	CAESA	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	14	,	 'CAGECE'	,'	CAGECE	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	15	,	 'CAGEPA'	,'	CAGEPA	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	16	,	 'CASAL'	,'	CASAL	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	17	,	 'CESAN'	,'	CESAN - VITORIA	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	18	,	 'COMPESA'	,'	COMPESA	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	19	,	 'COSANPA'	,'	COSANPA	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	20	,	 'DAE-VARZEA GRANDE'	,'	DAE-VARZEA GRANDE	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	21	,	 'DEPASA'	,'	DEPASA	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	22	,	 'DESO'	,'	DESO	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	23	,	 'GERDAU'	,'	GERDAU	',	1	,	 'C'	,	 'IND'	,	 '2018-04-01'	,	 '0'	),
(	24	,	 'HEINEKEN'	,'	HEINEKEN	',	1	,	 'C'	,	 'BEB'	,	 '2018-04-01'	,	 '0'	),
(	25	,	 'NIAGRO NICHIREI-PE'	,'	NIAGRO NICHIREI-PE	',	1	,	 'C'	,	 'IND'	,	 '2018-04-01'	,	 '0'	),
(	26	,	 'SAAE - BACABAL'	,'	SAAE - BACABAL	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	27	,	 'SAAE - CAXIAS'	,'	SAAE - CAXIAS	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	28	,	 'SAAE - QUIXERAMOBIM'	,'	SAAE - QUIXERAMOBIM	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	29	,	 'SAAE - SOBRAL'	,'	SAAE - SOBRAL	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	30	,	 'SANEAR RONDONOPOLIS'	,'	SANEAR RONDONOPOLIS	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	31	,	 'SERRA NEGRA DO NORTE'	,'	SERRA NEGRA DO NORTE	',	1	,	 'C'	,	 'SAN'	,	 '2018-04-01'	,	 '0'	),
(	32	,	 'SOLAR'	,'	SOLAR	',	1	,	 'C'	,	 'BEB'	,	 '2018-04-01'	,	 '0'	),
(	33	,	 'UFRN'	,'	UFRN	',	1	,	 'C'	,	 'OUT'	,	 '2018-04-01'	,	 '0'	),
(	34	,	 'USINA OLHO DAGUA'	,'	USINA CENTRAL OLHO DAGUA S/A	',	1	,	 'C'	,	 'USI'	,	 '2018-04-01'	,	 '0'	);



-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_loja_categoria`
--

CREATE TABLE `tb_loja_categoria` (
  `id` int(11) NOT NULL,
  `loja` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_loja_categoria`
--

INSERT INTO `tb_loja_categoria` (`id`, `loja`, `categoria`, `ativo`) VALUES
(1, 1, 1, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mod`
--

CREATE TABLE `tb_mod` (
  `id` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `tecnico` int(11) NOT NULL,
  `dtInicio` datetime NOT NULL,
  `dtFinal` datetime DEFAULT NULL,
  `tempo` float(10,2) DEFAULT NULL,
  `kmInicio` int(11) DEFAULT NULL,
  `kmFinal` int(11) DEFAULT NULL,
  `valor` float(10,2) DEFAULT NULL,
  `trajeto` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `ativo` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `hhValor` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nota`
--

CREATE TABLE `tb_nota` (
  `id` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `descricao` varchar(800) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_nota`
--

INSERT INTO `tb_nota` (`id`, `os`, `descricao`) VALUES
(0, 1, 'OCORRENCIA: teste\nCAUSA: teste\nSOLUCAO: PECAS: ALIMENTACAO: HOSPEDAGEM: ETC:\nteafdsfafdas\ntadfasdfafasd\nfdasfads');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_oat`
--


--
-- Estrutura da tabela `tb_os`
--

CREATE TABLE `tb_os` (
  `id` int(11) NOT NULL,
  `loja` int(11) NOT NULL,
  `lojaNick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `local` int(11) NOT NULL,
  `servico` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `categoria` int(11) NOT NULL,
  `tipoServ` int(1) NOT NULL,
  `bem` int(11) DEFAULT NULL,
  `data` date NOT NULL,
  `dtUltimoMan` date DEFAULT NULL,
  `dtCadastro` datetime NOT NULL,
  `filial` int(2) DEFAULT NULL,
  `os` int(11) DEFAULT NULL,
  `dtOs` datetime DEFAULT NULL,
  `dtFech` datetime DEFAULT NULL,
  `dtConcluido` datetime DEFAULT NULL,
  `estado` enum('0','1','2','3','4') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `processo` enum('0','1','2','3','4','5','6','7','8','9','10','11') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` enum('0','1','2','3','4') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ativo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_os`
--

INSERT INTO `tb_os` (`id`, `loja`, `lojaNick`, `local`, `servico`, `categoria`, `tipoServ`, `bem`, `data`, `dtUltimoMan`, `dtCadastro`, `filial`, `os`, `dtOs`, `dtFech`, `dtConcluido`, `estado`, `processo`, `status`, `ativo`) VALUES
(1, 1, 'AGESPISA', 2, 'COR001', 1, 3, NULL, '2018-03-08', NULL, '2018-03-08 17:56:04', 1, 123, '2018-03-21 13:30:38', '2018-03-28 16:59:19', '2018-03-28 16:47:40', '0', '7', '4', '0'),
(2, 11, 'CAERN', 61, 'COR001', 1, 3, NULL, '2018-03-08', NULL, '2018-03-08 18:44:16', NULL, NULL, NULL, NULL, NULL, '0', '0', '0', '0'),
(3, 1, 'AGESPISA', 2, 'COR001', 1, 3, 3, '2018-03-09', NULL, '2018-03-09 16:01:45', NULL, NULL, NULL, NULL, NULL, '0', '3', '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_os_tecnico`
--

CREATE TABLE `tb_os_tecnico` (
  `id` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `loja` int(11) NOT NULL,
  `tecnico` int(11) DEFAULT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hh` double(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_os_tecnico`
--

INSERT INTO `tb_os_tecnico` (`id`, `os`, `loja`, `tecnico`, `user`, `hh`) VALUES
(1, 1, 1, 1, 'Fábio Boninã', 10.00),
(2, 2, 11, 1, 'Fábio Boninã', 10.00),
(3, 3, 1, 1, 'Fábio Boninã', 10.00),
(4, 1, 1, 2, 'Teste', 10.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_produtos`
--

INSERT INTO `tb_produtos` (`id`, `name`, `tag`, `tipo`) VALUES
(1, 'MASCARA AUTONOMA', 'MSA', 'PROD'),
(2, 'SISTEMA CLORACAO', 'SCL', 'PROD'),
(3, 'CLORADOR', 'CLORADOR', 'PROD'),
(4, 'CILINDRO AR RESPIRAVEL', 'CILINDRO AR', 'PROD');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_categoria`
--

CREATE TABLE `tb_produto_categoria` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto_tipo`
--

CREATE TABLE `tb_produto_tipo` (
  `id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_produto_tipo`
--

INSERT INTO `tb_produto_tipo` (`id`, `name`) VALUES
('PROD', 'PRODUTO'),
('SERV', 'SERVICO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_proprietario`
--

CREATE TABLE `tb_proprietario` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `cadastro` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_proprietario`
--

INSERT INTO `tb_proprietario` (`id`, `name`, `nick`, `ativo`, `cadastro`) VALUES
(1, 'Sabara Quimicos Ingredientes S/A', 'Sabará', '0', '2017-08-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_seguimento`
--

CREATE TABLE `tb_seguimento` (
  `id` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_seguimento`
--

INSERT INTO `tb_seguimento` (`id`, `name`) VALUES
('BEB', 'BEBIDA'),
('IND', 'INDUSTRIA'),
('OUT', 'OUTRO'),
('SAN', 'SANEAMENTO'),
('USI', 'USINA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servicos`
--

CREATE TABLE `tb_servicos` (
  `id` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `tipo` enum('0','1','2','3','4') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_servicos`
--

INSERT INTO `tb_servicos` (`id`, `name`, `tipo`, `ativo`) VALUES
('COR001', 'CORRETIVO', '3', '0'),
('DES000', 'DESINTALACAO', '4', '0'),
('INS001', 'NOVA INSTALACAO', '1', '0'),
('OPE001', 'REABASTER PRODUTO', '2', '0'),
('OPE002', 'ACOPLAR CILINDRO', '2', '0'),
('PRV001', 'PREVENTIVO', '3', '0'),
('VIT001', 'VISITA TECNICA', '0', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sistema`
--

CREATE TABLE `tb_sistema` (
  `id` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(30) CHARACTER SET utf8 NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_sistema`
--

INSERT INTO `tb_sistema` (`id`, `descricao`, `ativo`) VALUES
('SBDPT-SPT', 'PASTILHA', '0'),
('SBDSD-SDS', 'DICLORO', '0'),
('SBDXC-SDX', 'DIOXIDO CLORO', '0'),
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
  `user` int(11) NOT NULL,
  `userNick` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hh` double(5,2) NOT NULL,
  `ativo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_tecnicos`
--

INSERT INTO `tb_tecnicos` (`id`, `user`, `userNick`, `hh`, `ativo`) VALUES
(1, 1, 'Fábio Boninã', 10.00, '0'),
(2, 2, 'Teste', 10.00, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tipo`
--

CREATE TABLE `tb_tipo` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_tipo`
--

INSERT INTO `tb_tipo` (`id`, `name`) VALUES
('EEA', 'EEA'),
('ETA', 'ETA'),
('ETE', 'ETE'),
('IND', 'INDUSTRIA'),
('OUT', 'OUTROS'),
('POC', 'POCO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_despesa`
--

CREATE TABLE `tipo_despesa` (
  `id` int(11) NOT NULL,
  `tipo_despesa` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ativo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proprietario` int(11) DEFAULT NULL,
  `grupo` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `loja` int(11) DEFAULT NULL,
  `nivel` enum('0','1','2','3','4') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ativo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `data_cadastro` date NOT NULL,
  `data_ultimo_login` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user`, `password`, `avatar`, `proprietario`, `grupo`, `loja`, `nivel`, `ativo`, `data_cadastro`, `data_ultimo_login`) VALUES
(1, 'FABIO VITORINO BONINA MORAIS', 'fabiobonina@gmail.com', 'Fábio Boninã', 'a906449d5769fa7361d7ecc6aa3f6d28', 'http://www.gravatar.com/avatar/5f3781a40c3fde1b4ac568a97692aa70?d=identicon', 1, 'P', 2, '4', '0', '2017-11-08', '2018-04-01 06:38:49'),
(2, 'TESTE', 'teste@teste.com', 'Teste', 'a906449d5769fa7361d7ecc6aa3f6d28', 'http://www.gravatar.com/avatar/ce11fce876c93ed5d2a72da660496473?d=identicon', NULL, NULL, NULL, '0', '0', '2018-03-16', '2018-03-16 08:51:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--

--
-- Indexes for table `tb_ativo`
--


--
-- Indexes for table `tb_bem`
--
ALTER TABLE `tb_bem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_bem_tb_fabricante1_idx` (`fabricante`),
  ADD KEY `fk_tb_bem_tb_loja1_idx` (`proprietario`),
  ADD KEY `fk_tb_bem_tb_categoria1_idx` (`categoria`),
  ADD KEY `fk_tb_bem_tb_produtos1_idx` (`produto`),
  ADD KEY `fk_tb_bem_tb_locais1_idx` (`proprietarioLocal`);

--
-- Indexes for table `tb_bem_localizacao`
--
ALTER TABLE `tb_bem_localizacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_bem_localizacao_tb_bem1_idx` (`bem`),
  ADD KEY `fk_tb_bem_localizacao_tb_loja1_idx` (`loja`),
  ADD KEY `fk_tb_bem_localizacao_tb_locais1_idx` (`local`);

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_clientes`
--

--
-- Indexes for table `tb_descricao`
--

--
-- Indexes for table `tb_desloc_status`
--
ALTER TABLE `tb_desloc_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_desloc_trajeto`
--
ALTER TABLE `tb_desloc_trajeto`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_equipamentos`
--
ALTER TABLE `tb_equipamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_equipamentos_tb_produtos1_idx` (`produto`),
  ADD KEY `fk_tb_equipamentos_tb_fabricante1_idx` (`fabricante`),
  ADD KEY `fk_tb_equipamentos_tb_proprietario1_idx` (`proprietario`),
  ADD KEY `fk_tb_equipamentos_tb_locais1_idx` (`local`),
  ADD KEY `fk_tb_equipamentos_tb_categoria1_idx` (`categoria`);

--
-- Indexes for table `tb_eq_componentes`
--
ALTER TABLE `tb_eq_componentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_eq_componentes_tb_produtos1_idx` (`produto`),
  ADD KEY `fk_tb_eq_componentes_tb_fabricante1_idx` (`frabicante`),
  ADD KEY `fk_tb_eq_componentes_tb_loja1_idx` (`proprietario`),
  ADD KEY `fk_tb_eq_componentes_tb_locais1_idx` (`local`),
  ADD KEY `fk_tb_eq_componentes_tb_categoria1_idx` (`categoria`);

--
-- Indexes for table `tb_eq_localizacao`
--
ALTER TABLE `tb_eq_localizacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_eq_localizacao_tb_equipamentos1_idx` (`equipamento`),
  ADD KEY `fk_tb_eq_localizacao_tb_loja1_idx` (`loja`),
  ADD KEY `fk_tb_eq_localizacao_tb_locais1_idx` (`local`);

--
-- Indexes for table `tb_fabricante`
--
ALTER TABLE `tb_fabricante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_grupo`
--
ALTER TABLE `tb_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_insumos`
--


--
-- Indexes for table `tb_locais`
--
ALTER TABLE `tb_locais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_locais_tb_loja1_idx` (`loja`),
  ADD KEY `fk_tb_locais_tb_tipo1_idx` (`tipo`);

--
-- Indexes for table `tb_localidades`


--
-- Indexes for table `tb_local_categoria`
--
ALTER TABLE `tb_local_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_local_categoria_tb_locais1_idx` (`local`),
  ADD KEY `fk_tb_local_categoria_tb_categoria1_idx` (`categoria`);

--
-- Indexes for table `tb_loja`
--
ALTER TABLE `tb_loja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick_UNIQUE` (`nick`),
  ADD KEY `fk_tb_loja_tb_proprietario1_idx` (`proprietario`),
  ADD KEY `fk_tb_loja_tb_grupo1_idx` (`grupo`),
  ADD KEY `fk_tb_loja_tb_seguimento1_idx` (`seguimento`);

--
-- Indexes for table `tb_loja_categoria`
--
ALTER TABLE `tb_loja_categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_mod`
--
ALTER TABLE `tb_mod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_mod_tb_os1_idx` (`os`),
  ADD KEY `fk_tb_mod_tb_tecnicos1_idx` (`tecnico`);

--
-- Indexes for table `tb_oat`
--

--
-- Indexes for table `tb_os`
--
ALTER TABLE `tb_os`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_os_tb_loja1_idx` (`loja`),
  ADD KEY `fk_tb_os_tb_locais1_idx` (`local`),
  ADD KEY `fk_tb_os_tb_servicos1_idx` (`servico`),
  ADD KEY `fk_tb_os_tb_categoria1_idx` (`categoria`),
  ADD KEY `fk_tb_os_tb_bem1_idx` (`bem`);

--
-- Indexes for table `tb_os_tecnico`
--
ALTER TABLE `tb_os_tecnico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_os_tecnico_tb_os1_idx` (`os`),
  ADD KEY `fk_tb_os_tecnico_tb_loja1_idx` (`loja`),
  ADD KEY `fk_tb_os_tecnico_tb_tecnicos1_idx` (`tecnico`);

--
-- Indexes for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_produtos_tb_produto_tipo1_idx` (`tipo`);

--
-- Indexes for table `tb_produto_categoria`
--
ALTER TABLE `tb_produto_categoria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_produto_categoria_tb_categoria1_idx` (`categoria`),
  ADD KEY `fk_tb_produto_categoria_tb_produtos1_idx` (`produto`);

--
-- Indexes for table `tb_produto_tipo`
--
ALTER TABLE `tb_produto_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_proprietario`
--
ALTER TABLE `tb_proprietario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick_UNIQUE` (`nick`);

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
  ADD KEY `fk_tb_tecnicos_users1_idx` (`user`);

--
-- Indexes for table `tb_teste`
--


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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `user` (`user`),
  ADD KEY `fk_users_tb_proprietario_idx` (`proprietario`),
  ADD KEY `fk_users_tb_grupo1_idx` (`grupo`),
  ADD KEY `fk_users_tb_loja1_idx` (`loja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`

--
-- AUTO_INCREMENT for table `tb_ativo`
--

--
-- AUTO_INCREMENT for table `tb_bem`
--
ALTER TABLE `tb_bem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_bem_localizacao`
--
ALTER TABLE `tb_bem_localizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_clientes`

--
-- AUTO_INCREMENT for table `tb_descricao`
--

--
-- AUTO_INCREMENT for table `tb_desloc_status`
--
ALTER TABLE `tb_desloc_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_desloc_trajeto`
--
ALTER TABLE `tb_desloc_trajeto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_equipamentos`
--
ALTER TABLE `tb_equipamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_eq_componentes`
--
ALTER TABLE `tb_eq_componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_eq_localizacao`
--
ALTER TABLE `tb_eq_localizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_fabricante`
--
ALTER TABLE `tb_fabricante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_locais`
--
ALTER TABLE `tb_locais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=596;
--
-- AUTO_INCREMENT for table `tb_localidades`
--

--
-- AUTO_INCREMENT for table `tb_local_categoria`
--
ALTER TABLE `tb_local_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_loja`
--
ALTER TABLE `tb_loja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tb_loja_categoria`
--
ALTER TABLE `tb_loja_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_mod`
--
ALTER TABLE `tb_mod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `tb_oat`
--

--
-- AUTO_INCREMENT for table `tb_os`
--
ALTER TABLE `tb_os`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_os_tecnico`
--
ALTER TABLE `tb_os_tecnico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_produto_categoria`
--
ALTER TABLE `tb_produto_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_proprietario`
--
ALTER TABLE `tb_proprietario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_tecnicos`
--
ALTER TABLE `tb_tecnicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_teste`
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_bem`
--
ALTER TABLE `tb_bem`
  ADD CONSTRAINT `fk_tb_bem_tb_categoria1` FOREIGN KEY (`categoria`) REFERENCES `tb_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_bem_tb_fabricante1` FOREIGN KEY (`fabricante`) REFERENCES `tb_fabricante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_bem_tb_locais1` FOREIGN KEY (`proprietarioLocal`) REFERENCES `tb_locais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_bem_tb_loja1` FOREIGN KEY (`proprietario`) REFERENCES `tb_loja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_bem_tb_produtos1` FOREIGN KEY (`produto`) REFERENCES `tb_produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_bem_localizacao`
--
ALTER TABLE `tb_bem_localizacao`
  ADD CONSTRAINT `fk_tb_bem_localizacao_tb_bem1` FOREIGN KEY (`bem`) REFERENCES `tb_bem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_bem_localizacao_tb_locais1` FOREIGN KEY (`local`) REFERENCES `tb_locais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_bem_localizacao_tb_loja1` FOREIGN KEY (`loja`) REFERENCES `tb_loja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_equipamentos`
--
ALTER TABLE `tb_equipamentos`
  ADD CONSTRAINT `fk_tb_equipamentos_tb_categoria1` FOREIGN KEY (`categoria`) REFERENCES `tb_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_equipamentos_tb_fabricante1` FOREIGN KEY (`fabricante`) REFERENCES `tb_fabricante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_equipamentos_tb_locais1` FOREIGN KEY (`local`) REFERENCES `tb_locais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_equipamentos_tb_produtos1` FOREIGN KEY (`produto`) REFERENCES `tb_produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_equipamentos_tb_proprietario1` FOREIGN KEY (`proprietario`) REFERENCES `tb_proprietario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_eq_componentes`
--
ALTER TABLE `tb_eq_componentes`
  ADD CONSTRAINT `fk_tb_eq_componentes_tb_categoria1` FOREIGN KEY (`categoria`) REFERENCES `tb_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_eq_componentes_tb_fabricante1` FOREIGN KEY (`frabicante`) REFERENCES `tb_fabricante` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_eq_componentes_tb_locais1` FOREIGN KEY (`local`) REFERENCES `tb_locais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_eq_componentes_tb_loja1` FOREIGN KEY (`proprietario`) REFERENCES `tb_loja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_eq_componentes_tb_produtos1` FOREIGN KEY (`produto`) REFERENCES `tb_produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_eq_localizacao`
--
ALTER TABLE `tb_eq_localizacao`
  ADD CONSTRAINT `fk_tb_eq_localizacao_tb_equipamentos1` FOREIGN KEY (`equipamento`) REFERENCES `tb_equipamentos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_eq_localizacao_tb_locais1` FOREIGN KEY (`local`) REFERENCES `tb_locais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_eq_localizacao_tb_loja1` FOREIGN KEY (`loja`) REFERENCES `tb_loja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_locais`
--
ALTER TABLE `tb_locais`
  ADD CONSTRAINT `fk_tb_locais_tb_loja1` FOREIGN KEY (`loja`) REFERENCES `tb_loja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_locais_tb_tipo1` FOREIGN KEY (`tipo`) REFERENCES `tb_tipo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_local_categoria`
--
ALTER TABLE `tb_local_categoria`
  ADD CONSTRAINT `fk_tb_local_categoria_tb_categoria1` FOREIGN KEY (`categoria`) REFERENCES `tb_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_local_categoria_tb_locais1` FOREIGN KEY (`local`) REFERENCES `tb_locais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_mod`
--
ALTER TABLE `tb_mod`
  ADD CONSTRAINT `fk_tb_mod_tb_os1` FOREIGN KEY (`os`) REFERENCES `tb_os` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_mod_tb_tecnicos1` FOREIGN KEY (`tecnico`) REFERENCES `tb_tecnicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_os`
--
ALTER TABLE `tb_os`
  ADD CONSTRAINT `fk_tb_os_tb_bem1` FOREIGN KEY (`bem`) REFERENCES `tb_bem` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_os_tb_categoria1` FOREIGN KEY (`categoria`) REFERENCES `tb_categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_os_tb_locais1` FOREIGN KEY (`local`) REFERENCES `tb_locais` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_os_tb_loja1` FOREIGN KEY (`loja`) REFERENCES `tb_loja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_os_tb_servicos1` FOREIGN KEY (`servico`) REFERENCES `tb_servicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
