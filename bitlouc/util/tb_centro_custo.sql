-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03-Out-2018 às 06:24
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
-- Estrutura da tabela `tb_centro_custo`
--

CREATE TABLE `tb_centro_custo` (
  `id` int(11) NOT NULL,
  `proprietario_id` int(11) NOT NULL,
  `loja_id` int(11) NOT NULL,
  `divisao_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_centro_custo`
--

INSERT INTO `tb_centro_custo` (`id`, `proprietario_id`, `loja_id`, `divisao_id`, `name`, `ativo`, `tag`) VALUES
(1, 1, 1, 1, 'GLOBAL SERVICE ', '0', 65001),
(2, 1, 1, 2, 'WT', '0', 90001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_centro_custo`
--
ALTER TABLE `tb_centro_custo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_centro_custo`
--
ALTER TABLE `tb_centro_custo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
