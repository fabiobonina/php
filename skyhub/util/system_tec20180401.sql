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
