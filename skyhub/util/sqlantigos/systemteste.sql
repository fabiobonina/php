-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 29-Set-2016 às 10:57
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `systemteste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nivel` enum('0','1') NOT NULL DEFAULT '0',
  `ativo` enum('0','1') NOT NULL DEFAULT '0',
  `data_cadastro` date NOT NULL DEFAULT '0000-00-00',
  `data_ultimo_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `usuario`, `senha`, `nivel`, `ativo`, `data_cadastro`, `data_ultimo_login`) VALUES
(1, 'Fabio Bonina', 'fabiobonina@gmail.com', 'fabio', '123abc', '1', '', '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ativo`
--

CREATE TABLE `tb_ativo` (
  `id` int(11) NOT NULL,
  `filial` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `plaqueta` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nick` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_localidades`
--

CREATE TABLE `tb_localidades` (
  `id` int(11) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `regional` varchar(100) DEFAULT NULL,
  `nome` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_mod`
--

CREATE TABLE `tb_mod` (
  `id` int(11) NOT NULL,
  `filial` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `nick_user` int(11) NOT NULL,
  `data_inicial` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_final` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ordensservicos`
--

CREATE TABLE `tb_ordensservicos` (
  `id` int(11) NOT NULL,
  `nick_user` int(11) NOT NULL,
  `filial` int(2) DEFAULT NULL,
  `os` int(11) DEFAULT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_local` int(11) NOT NULL,
  `cod_sistema` int(11) NOT NULL,
  `cod_servico` int(11) NOT NULL,
  `data_sol` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_os` datetime DEFAULT '0000-00-00 00:00:00',
  `data_fech` datetime DEFAULT '0000-00-00 00:00:00',
  `data_term` datetime DEFAULT '0000-00-00 00:00:00',
  `status` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_osdespesa`
--

CREATE TABLE `tb_osdespesa` (
  `id` int(11) NOT NULL,
  `filial` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `tipo_despesa` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor` decimal(10,0) NOT NULL,
  `obs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_osinsumos`
--

CREATE TABLE `tb_osinsumos` (
  `id` int(11) NOT NULL,
  `filial` int(11) NOT NULL,
  `os` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `unidade` varchar(10) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valor_uni` decimal(10,0) NOT NULL,
  `valor_total` decimal(10,0) NOT NULL
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

--
-- Extraindo dados da tabela `tb_postagens`
--

INSERT INTO `tb_postagens` (`id`, `titulo`, `data`, `imagem`, `exibir`, `descricao`) VALUES
(14, 'Upload pelo admin', '10/10/1010', '421.jpg', 'Sim', '<span style="line-height: 22.1000003814697px;"><b>Lorem </b>Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has <i>been </i>the industry''s standard dummy text <i>ever </i>since the 1500s, <i>when </i>an <b>unknown </b>printer took a <u>galley </u>of type.</span><br><div><span style="line-height: 22.1000003814697px;"><br></span></div><div><b style="line-height: 22.1px;">Lorem&nbsp;</b><span style="line-height: 22.1px;">Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has&nbsp;</span><i style="line-height: 22.1px;">been&nbsp;</i><span style="line-height: 22.1px;">the industry''s standard dummy text&nbsp;</span><i style="line-height: 22.1px;">ever&nbsp;</i><span style="line-height: 22.1px;">since the 1500s,&nbsp;</span><i style="line-height: 22.1px;">when&nbsp;</i><span style="line-height: 22.1px;">an&nbsp;</span><b style="line-height: 22.1px;">unknown&nbsp;</b><span style="line-height: 22.1px;">printer took a&nbsp;</span><u style="line-height: 22.1px;">galley&nbsp;</u><span style="line-height: 22.1px;">of type.</span><span style="line-height: 22.1000003814697px;"><br></span></div><div><span style="line-height: 22.1px;"><br></span></div><div><b style="line-height: 22.1px;">Lorem&nbsp;</b><span style="line-height: 22.1px;">Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has&nbsp;</span><i style="line-height: 22.1px;">been&nbsp;</i><span style="line-height: 22.1px;">the industry''s standard dummy text&nbsp;</span><i style="line-height: 22.1px;">ever&nbsp;</i><span style="line-height: 22.1px;">since the 1500s,&nbsp;</span><i style="line-height: 22.1px;">when&nbsp;</i><span style="line-height: 22.1px;">an&nbsp;</span><b style="line-height: 22.1px;">unknown&nbsp;</b><span style="line-height: 22.1px;">printer took a&nbsp;</span><u style="line-height: 22.1px;">galley&nbsp;</u><span style="line-height: 22.1px;">of type.</span><span style="line-height: 22.1px;"><br></span></div>'),
(16, 'Teste', '12/09/2015', '22673.jpg', 'Sim', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue velit lacus, sit amet hendrerit augue placerat ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean ac dui ut eros euismod convallis at vel libero. Quisque eu leo volutpat, feugiat ante id, ultricies diam. Fusce facilisis id ex semper condimentum. Maecenas dapibus sed urna et consequat. Sed velit lorem, efficitur ac ex volutpat, sagittis facilisis ex. Aliquam eleifend pellentesque nulla at viverra.</div><div><br></div><div>Suspendisse vel dolor ut erat ultrices posuere vel eget odio. Quisque venenatis porttitor venenatis. Maecenas sed arcu sit amet arcu mattis sodales quis vel risus. Nullam sed malesuada felis, ut varius purus. Sed et lorem convallis, ullamcorper purus eget, dictum justo. Nunc tempus ligula nibh, et eleifend erat eleifend nec. Praesent tellus lorem, condimentum fringilla cursus sed, hendrerit sit amet elit. Praesent nisi arcu, pretium non mattis vitae, imperdiet at nisl. Nam vulputate massa ut ante malesuada pretium. Praesent tincidunt mattis lorem vitae lobortis. Nunc at quam eu nunc viverra auctor iaculis sed est.</div><div><br></div><div>Proin dictum ligula ut sapien interdum fringilla. Quisque dignissim dui nec elementum rhoncus. Ut id enim ac justo ullamcorper tincidunt vel ac elit. Suspendisse consectetur nisi gravida odio commodo, et ultricies lorem pretium. Duis ac neque non dolor molestie luctus. Donec ultricies urna augue, sit amet bibendum odio auctor quis. Nam velit magna, pharetra eget nibh id, consectetur congue metus. Vivamus faucibus pharetra dolor, a accumsan tortor maximus dignissim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque viverra vehicula turpis, ac laoreet magna ullamcorper varius. Fusce pharetra, augue vel maximus lacinia, magna arcu gravida sem, eget efficitur tellus quam eu lacus. Quisque facilisis orci in velit placerat, quis porta lacus porttitor.</div><div><br></div><div>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec faucibus consequat nulla, eget tempor nunc egestas vitae. Pellentesque elementum eget enim scelerisque consectetur. Nulla aliquet placerat odio, vitae blandit tortor dictum id. Proin aliquam erat ipsum, non accumsan sapien porttitor a. Praesent maximus nec magna vitae dignissim. Phasellus vehicula diam in sollicitudin elementum. Duis sed massa id erat imperdiet facilisis nec nec erat. Etiam lacus erat, interdum et elementum in, lobortis a turpis. Donec efficitur non nibh ut tristique. Sed nec pellentesque risus, ac ultricies elit. Etiam elementum pulvinar ligula, a vulputate elit hendrerit in.</div>'),
(17, 'Mais uma aaaa', '00/00/0000', '13863.jpg', 'Sim', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue velit lacus, sit amet hendrerit augue placerat ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean ac dui ut eros euismod convallis at vel libero. Quisque eu leo volutpat, feugiat ante id, ultricies diam. Fusce facilisis id ex semper condimentum. Maecenas dapibus sed urna et consequat. Sed velit lorem, efficitur ac ex volutpat, sagittis facilisis ex. Aliquam eleifend pellentesque nulla at viverra.</div><div><br></div><div>Suspendisse vel dolor ut erat ultrices posuere vel eget odio. Quisque venenatis porttitor venenatis. Maecenas sed arcu sit amet arcu mattis sodales quis vel risus. Nullam sed malesuada felis, ut varius purus. Sed et lorem convallis, ullamcorper purus eget, dictum justo. Nunc tempus ligula nibh, et eleifend erat eleifend nec. Praesent tellus lorem, condimentum fringilla cursus sed, hendrerit sit amet elit. Praesent nisi arcu, pretium non mattis vitae, imperdiet at nisl. Nam vulputate massa ut ante malesuada pretium. Praesent tincidunt mattis lorem vitae lobortis. Nunc at quam eu nunc viverra auctor iaculis sed est.</div>'),
(18, 'Testando envio', '12/12/1212', '9207.jpg', 'Sim', '<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi congue velit lacus, sit amet hendrerit augue placerat ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean ac dui ut eros euismod convallis at vel libero. Quisque eu leo volutpat, feugiat ante id, ultricies diam. Fusce facilisis id ex semper condimentum.&nbsp;</div><div><br></div><div>Maecenas dapibus sed urna et consequat. Sed velit lorem, efficitur ac ex volutpat, sagittis facilisis ex. Aliquam eleifend pellentesque nulla at viverra.</div><div><br></div><div>Suspendisse vel dolor ut erat ultrices posuere vel eget odio. Quisque venenatis porttitor venenatis. Maecenas sed arcu sit amet arcu mattis sodales quis vel risus. Nullam sed malesuada felis, ut varius purus. Sed et lorem convallis, ullamcorper purus eget, dictum justo.&nbsp;</div><div><br></div><div>Nunc tempus ligula nibh, et eleifend erat eleifend nec. Praesent tellus lorem, condimentum fringilla cursus sed, hendrerit sit amet elit. Praesent nisi arcu, pretium non mattis vitae, imperdiet at nisl. Nam vulputate massa ut ante malesuada pretium. Praesent tincidunt mattis lorem vitae lobortis. Nunc at quam eu nunc viverra auctor iaculis sed est.</div><div><br></div><div>Proin dictum ligula ut sapien interdum fringilla. Quisque dignissim dui nec elementum rhoncus. Ut id enim ac justo ullamcorper tincidunt vel ac elit. Suspendisse consectetur nisi gravida odio commodo, et ultricies lorem pretium. Duis ac neque non dolor molestie luctus. Donec ultricies urna augue, sit amet bibendum odio auctor quis. Nam velit magna, pharetra eget nibh id, consectetur congue metus.&nbsp;</div><div><br></div><div>Vivamus faucibus pharetra dolor, a accumsan tortor maximus dignissim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque viverra vehicula turpis, ac laoreet magna ullamcorper varius. Fusce pharetra, augue vel maximus lacinia, magna arcu gravida sem, eget efficitur tellus quam eu lacus. Quisque facilisis orci in velit placerat, quis porta lacus porttitor.</div><div><br></div>'),
(19, 'Titulo do post', '15/21/2121', '16996.jpg', 'Sim', '<div><b>Lorem <span style="background-color: rgb(204, 0, 153);">ipsum</span></b><span style="background-color: rgb(204, 0, 153);"> </span>dolor sit amet, consectetur adipiscing elit. Morbi congue velit lacus, sit amet hendrerit augue placerat ut. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aenean ac dui ut eros euismod convallis at vel libero. Quisque eu leo volutpat, feugiat ante id, ultricies diam. Fusce facilisis id ex semper condimentum. Maecenas dapibus sed urna et consequat. Sed velit lorem, efficitur ac ex volutpat, sagittis facilisis ex. Aliquam eleifend pellentesque nulla at viverra.</div><div><b><br></b></div><div><b>Suspendisse vel dolor ut erat ultrices posuere vel eget odio. Quisque venenatis porttitor venenatis. Maecenas sed arcu sit amet arcu mattis sodales quis vel risus. Nullam sed malesuada felis, ut varius purus. Sed et lorem convallis, ullamcorper purus eget, dictum justo. Nunc tempus ligula nibh, et eleifend erat eleifend nec. Praesent tellus lorem, condimentum fringilla cursus sed, hendrerit sit amet elit. Praesent nisi arcu, pretium non mattis vitae, imperdiet at nisl. Nam vulputate massa ut ante malesuada pretium. Praesent tincidunt mattis lorem vitae lobortis. Nunc at quam eu nunc viverra auctor iaculis sed est.</b></div><div><br></div><div>Proin dictum ligula ut sapien interdum fringilla. Quisque dignissim dui nec elementum rhoncus. Ut id enim ac justo ullamcorper tincidunt vel ac elit. Suspendisse consectetur nisi gravida odio commodo, et ultricies lorem pretium. Duis ac neque non dolor molestie luctus. Donec ultricies urna augue, sit amet bibendum odio auctor quis.</div><div><br></div><div><br></div><div><font color="#cc9900">&nbsp;<i>Nam velit magna, pharetra eget nibh id, consectetur congue metus. Vivamus faucibus pharetra dolor, a accumsan tortor maximus dignissim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque viverra vehicula turpis, ac laoreet magna ullamcorper varius. Fusce pharetra, augue vel maximus lacinia, magna arcu gravida sem, eget efficitur tellus quam eu lacus. Quisque facilisis orci in velit placerat, quis porta lacus porttitor.</i></font></div><div><br></div><div><br></div>'),
(20, 'Mais uma aula', '21/21/2121', '3798.jpg', 'Sim', '<div><span style="line-height: 1.7em;">Proin dictum ligula ut sapien interdum fringilla. Quisque dignissim dui nec elementum rhoncus. Ut id enim ac justo ullamcorper tincidunt vel ac elit. Suspendisse consectetur nisi gravida odio commodo, et ultricies lorem pretium. Duis ac neque non dolor molestie luctus. Donec ultricies urna augue, sit amet bibendum odio auctor quis.&nbsp;</span><br></div><div><br></div><div><b><u><i>Nam velit magna, pharetra eget nibh id, consectetur congue metus.</i></u></b></div><div><br></div><div>&nbsp;Vivamus faucibus pharetra dolor, a accumsan tortor maximus dignissim. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Quisque viverra vehicula turpis, ac laoreet magna ullamcorper varius. Fusce pharetra, augue vel maximus lacinia, magna arcu gravida sem, eget efficitur tellus quam eu lacus. Quisque facilisis orci in velit placerat, quis porta lacus porttitor.</div><div><br></div><div>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec faucibus consequat nulla, eget tempor nunc egestas vitae. Pellentesque elementum eget enim scelerisque consectetur. Nulla aliquet placerat odio, vitae blandit tortor dictum id. Proin aliquam erat ipsum, non accumsan sapien porttitor a.&nbsp;</div><div><br></div><div>Praesent maximus nec magna vitae dignissim. Phasellus vehicula diam in sollicitudin elementum. Duis sed massa id erat imperdiet facilisis nec nec erat. Etiam lacus erat, interdum et elementum in, lobortis a turpis. Donec efficitur non nibh ut tristique. Sed nec pellentesque risus, ac ultricies elit. Etiam elementum pulvinar ligula, a vulputate elit hendrerit in.</div><div><br></div><div>web vÃ­deo aulas</div>');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_tecnicos`
--

CREATE TABLE `tb_tecnicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nick_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ativo`
--
ALTER TABLE `tb_ativo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_localidades`
--
ALTER TABLE `tb_localidades`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_localidades`
--
ALTER TABLE `tb_localidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
