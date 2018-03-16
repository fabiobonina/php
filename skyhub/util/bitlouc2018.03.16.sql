-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Mar-2018 às 22:18
-- Versão do servidor: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estrutura da tabela `tb_mod`
--

CREATE TABLE `tb_mod` (
  `id` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `tecnico` int(11) NOT NULL,
  `dtInicio` datetime NOT NULL,
  `dtFinal` datetime DEFAULT NULL,
  `tempo` double DEFAULT NULL,
  `kmInicio` int(11) DEFAULT NULL,
  `kmFinal` int(11) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `tipoTrajeto` int(11) DEFAULT NULL,
  `status` enum('0','1','2','3','4','5') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ativo` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_mod`
--

INSERT INTO `tb_mod` (`id`, `os`, `tecnico`, `dtInicio`, `dtFinal`, `tempo`, `kmInicio`, `kmFinal`, `valor`, `tipoTrajeto`, `status`, `ativo`) VALUES
(16, 1, 1, '2018-03-16 22:16:11', '2018-03-16 22:17:29', 0, 30, 30, 0, 1, '', '1'),
(17, 1, 2, '2018-03-16 22:16:11', '2018-03-16 22:17:29', 0, 0, 0, 0, 3, '', '1'),
(18, 1, 1, '2018-03-16 22:17:29', NULL, NULL, 30, NULL, 0, 1, '', '0'),
(19, 1, 2, '2018-03-16 22:17:29', NULL, NULL, 0, NULL, 0, 3, '', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_mod`
--
ALTER TABLE `tb_mod`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tb_mod_tb_os1_idx` (`os`),
  ADD KEY `fk_tb_mod_tb_tecnicos1_idx` (`tecnico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_mod`
--
ALTER TABLE `tb_mod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_mod`
--
ALTER TABLE `tb_mod`
  ADD CONSTRAINT `fk_tb_mod_tb_os1` FOREIGN KEY (`os`) REFERENCES `tb_os` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_mod_tb_tecnicos1` FOREIGN KEY (`tecnico`) REFERENCES `tb_tecnicos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
