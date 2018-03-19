-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 27-Out-2016 às 22:19
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
(1, 'Fabio Bonina', 'FABIO', '0'),
(2, 'ALEXANDRE', 'ALEXANDRE', '0');

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
(5, 'FABIO', '', 'Eta 1', 'Itapissuma', 'PE', 0.000000, 0.000000, '0'),
(6, 'FABIO', '', 'Eta 2', 'Itapissuma', 'PE', 0.000000, 0.000000, '0'),
(7, 'ALEXANDRE', '', 'eta 3', 'Itapissuma', 'PE', 0.000000, 0.000000, '0');

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
  `sistema` varchar(10) NOT NULL,
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
('ACAO01', 'ACAO', '0'),
('SER001', 'SERVICO', '0'),
('tes001', 'TESTE', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sistema`
--

CREATE TABLE `tb_sistema` (
  `id` varchar(10) NOT NULL,
  `descricao` varchar(30) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_sistema`
--

INSERT INTO `tb_sistema` (`id`, `descricao`, `ativo`) VALUES
('SBGCL-SCL', 'SISTEMA CLORACAO', '0');

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
