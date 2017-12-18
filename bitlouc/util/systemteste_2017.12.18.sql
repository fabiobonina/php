-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Dez-2017 às 11:12
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aula`
--
CREATE DATABASE IF NOT EXISTS `aula` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `aula`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Airton', 'airton@email.com', '112358'),
(2, 'Sergio', 'sergio@email.com', '112358'),
(22, ' Aline ', ' al@email.com ', ' e44f8cf63970db5c2df0a18153bcdf49 '),
(21, ' Anderson ', ' ander@email.com ', ' e44f8cf63970db5c2df0a18153bcdf49 '),
(19, ' Teste ', ' teste@email.com ', ' e44f8cf63970db5c2df0a18153bcdf49 '),
(20, ' Algusto ', ' al@emaiol.com ', ' e44f8cf63970db5c2df0a18153bcdf49 '),
(23, ' Junior ', ' ju@email.com ', ' e44f8cf63970db5c2df0a18153bcdf49 '),
(28, ' teste ', ' teste@email.com ', ' e44f8cf63970db5c2df0a18153bcdf49 '),
(30, ' Sergio ', ' s@email.com ', ' e10adc3949ba59abbe56e057f20f883e '),
(32, ' Sergio ', ' ser@email.com ', ' e10adc3949ba59abbe56e057f20f883e '),
(34, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(35, '', '', 'd41d8cd98f00b204e9800998ecf8427e'),
(36, '', '', 'd41d8cd98f00b204e9800998ecf8427e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;--
-- Database: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mydb`;
--
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Extraindo dados da tabela `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{"angular_direct":"direct","relation_lines":"true","snap_to_grid":"off"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Extraindo dados da tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{"db":"systemteste","table":"tb_eq_localizacao"},{"db":"systemteste","table":"tb_eq_componentes"},{"db":"systemteste","table":"tb_equipamentos"},{"db":"systemteste","table":"tb_loja"},{"db":"systemteste","table":"tb_frabricante"},{"db":"systemteste","table":"tb_produtos"},{"db":"systemteste","table":"tb_produto_categoria"},{"db":"systemteste","table":"tb_produto_tipo"},{"db":"systemteste","table":"tb_categoria"},{"db":"systemteste","table":"tb_proprietario"}]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

--
-- Extraindo dados da tabela `pma__relation`
--

INSERT INTO `pma__relation` (`master_db`, `master_table`, `master_field`, `foreign_db`, `foreign_table`, `foreign_field`) VALUES
('system_tec', 'tb_bens_ordem', 'segmento', 'system_tec', 'tb_bens_segmento', 'id'),
('systemteste', 'tb_eq_localizacao', 'equipamento', 'systemteste', 'tb_equipamentos', 'id'),
('systemteste', 'tb_eq_localizacao', 'local', 'systemteste', 'tb_locais', 'id'),
('systemteste', 'tb_eq_localizacao', 'loja', 'systemteste', 'tb_loja', 'id'),
('systemteste', 'tb_equipamentos', 'categoria', 'systemteste', 'tb_categoria', 'id'),
('systemteste', 'tb_equipamentos', 'frabicante', 'systemteste', 'tb_frabricante', 'id'),
('systemteste', 'tb_equipamentos', 'frabicanteNick', 'systemteste', 'tb_frabricante', 'nick'),
('systemteste', 'tb_equipamentos', 'local', 'systemteste', 'tb_locais', 'id'),
('systemteste', 'tb_equipamentos', 'produto', 'systemteste', 'tb_produtos', 'id'),
('systemteste', 'tb_equipamentos', 'proprietario', 'systemteste', 'tb_loja', 'id'),
('systemteste', 'tb_equipamentos', 'proprietarioNick', 'systemteste', 'tb_loja', 'nick'),
('systemteste', 'tb_equipamentos', 'tag', 'systemteste', 'tb_produtos', 'tag'),
('systemteste', 'tb_produtos', 'tipo', 'systemteste', 'tb_produto_tipo', 'id');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Extraindo dados da tabela `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'system_tec', 'tb_oat', '{"sorted_col":"`tb_oat`.`cliente` ASC"}', '2017-10-26 08:44:49');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2016-09-03 08:56:36', '{"lang":"pt","collation_connection":"utf8mb4_unicode_ci"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;--
-- Database: `riskzone`
--
CREATE DATABASE IF NOT EXISTS `riskzone` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `riskzone`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `nickuser` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `data_check_in` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `markers`
--

INSERT INTO `markers` (`id`, `nickuser`, `address`, `lat`, `lng`, `type`, `descricao`, `data_check_in`) VALUES
(1, 'fabio', 'teste', -7.773448, -34.893795, 'teste', 'outros', '2016-11-09 06:00:00'),
(2, 'fabio', 'teste', -7.773448, -34.893795, 'teste', 'outros', '2016-11-09 06:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(6) NOT NULL,
  `nome` varchar(100) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '',
  `nickuser` varchar(30) NOT NULL DEFAULT '',
  `senha` varchar(32) NOT NULL DEFAULT '',
  `sexo` varchar(32) NOT NULL DEFAULT '',
  `raca` varchar(32) NOT NULL DEFAULT '',
  `data_nascimento` date NOT NULL DEFAULT '0000-00-00',
  `data_cadastro` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `data_ultimo_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nivel_usuario` enum('0','1','2') NOT NULL DEFAULT '0',
  `ativado` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `nickuser`, `senha`, `sexo`, `raca`, `data_nascimento`, `data_cadastro`, `data_ultimo_login`, `nivel_usuario`, `ativado`) VALUES
(0, 'Fabio Bonina', 'fabiobonina@gmail.com', 'fabio', '123', '1', '4', '1982-07-23', '2016-09-17 02:21:08', '2016-09-17 02:21:08', '0', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nickuser` (`nickuser`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`nickuser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `markers`
--
ALTER TABLE `markers`
  ADD CONSTRAINT `nickuser` FOREIGN KEY (`nickuser`) REFERENCES `usuarios` (`nickuser`);
--
-- Database: `system_tec`
--
CREATE DATABASE IF NOT EXISTS `system_tec` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `system_tec`;

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
(1, 'Fabio Bonina', 'fabiobonina@gmail.com', 'fabio.bonina', 'Fabio Bonina', '123abc', '', 1, 2, 14, '1', '0', '2016-10-03', '2017-08-18 17:08:41'),
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
-- Estrutura da tabela `tb_bens_frabricante`
--

CREATE TABLE `tb_bens_frabricante` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `segmento` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_bens_frabricante`
--

INSERT INTO `tb_bens_frabricante` (`id`, `name`, `nick`, `segmento`) VALUES
(1, 'MSA', 'MSA', '1;2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bens_ordem`
--

CREATE TABLE `tb_bens_ordem` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tag` int(11) NOT NULL,
  `segmento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_bens_ordem`
--

INSERT INTO `tb_bens_ordem` (`id`, `name`, `tag`, `segmento`) VALUES
(1, 'PRIMERIO', 1, 1),
(2, 'SECUNDARIO', 2, 1),
(3, 'TERCERARIO', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bens_segmento`
--

CREATE TABLE `tb_bens_segmento` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tag` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_bens_segmento`
--

INSERT INTO `tb_bens_segmento` (`id`, `name`, `tag`) VALUES
(1, 'SEGURAÇA', 'SEG');

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
-- Estrutura da tabela `tb_teste`
--

CREATE TABLE `tb_teste` (
  `id` int(11) NOT NULL,
  `bem` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_teste`
--

INSERT INTO `tb_teste` (`id`, `bem`) VALUES
(371, '22/05/2017 15:54:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.265625'),
(374, '22/05/2017 15:57:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.209375'),
(372, '22/05/2017 15:55:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.265625'),
(373, '22/05/2017 15:56:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.209375'),
(375, '22/05/2017 15:58:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.209375'),
(376, '22/05/2017 15:59:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.18125'),
(377, '22/05/2017 16:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.18125'),
(378, '22/05/2017 16:01:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.1625'),
(379, '22/05/2017 16:02:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.134375'),
(380, '22/05/2017 16:03:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.10625'),
(381, '22/05/2017 16:04:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.10625'),
(382, '22/05/2017 16:05:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.0875'),
(383, '22/05/2017 16:06:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.059375'),
(384, '22/05/2017 16:07:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.059375'),
(385, '22/05/2017 16:08:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.06875'),
(386, '22/05/2017 16:09:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.06875'),
(387, '22/05/2017 16:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.021875'),
(388, '22/05/2017 16:11:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.021875'),
(389, '22/05/2017 16:12:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.021875'),
(390, '22/05/2017 16:13:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.03125'),
(391, '22/05/2017 16:14:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.03125'),
(392, '22/05/2017 16:15:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.021875'),
(393, '22/05/2017 16:16:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.0125'),
(394, '22/05/2017 16:17:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.021875'),
(395, '22/05/2017 16:18:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.003125'),
(396, '22/05/2017 16:19:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.021875'),
(397, '22/05/2017 16:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.03125'),
(398, '22/05/2017 16:21:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.003125'),
(399, '22/05/2017 16:22:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.021875'),
(400, '22/05/2017 16:23:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.021875'),
(401, '22/05/2017 16:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;0.984375'),
(402, '22/05/2017 16:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.003125'),
(403, '22/05/2017 16:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.93125'),
(404, '22/05/2017 17:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.715625'),
(405, '22/05/2017 17:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.650'),
(406, '22/05/2017 17:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.659375'),
(407, '22/05/2017 17:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.575'),
(408, '22/05/2017 17:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.59375'),
(409, '22/05/2017 17:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.575'),
(410, '22/05/2017 18:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.584375'),
(411, '22/05/2017 18:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.5375'),
(412, '22/05/2017 18:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.509375'),
(413, '22/05/2017 18:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.500'),
(414, '22/05/2017 18:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.284375'),
(415, '22/05/2017 18:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.350'),
(416, '22/05/2017 19:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.89375'),
(417, '22/05/2017 19:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.865625'),
(418, '22/05/2017 19:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.809375'),
(419, '22/05/2017 19:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.790625'),
(420, '22/05/2017 19:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.790625'),
(421, '22/05/2017 19:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.7625'),
(422, '22/05/2017 20:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(423, '22/05/2017 20:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(424, '22/05/2017 20:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.7625'),
(425, '22/05/2017 20:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.734375'),
(426, '22/05/2017 20:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.725'),
(427, '22/05/2017 20:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.753125'),
(428, '22/05/2017 21:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.696875'),
(429, '22/05/2017 21:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.725'),
(430, '22/05/2017 21:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.715625'),
(431, '22/05/2017 21:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.715625'),
(432, '22/05/2017 21:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.659375'),
(433, '22/05/2017 21:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.678125'),
(434, '22/05/2017 22:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.650'),
(435, '22/05/2017 22:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.63125'),
(436, '22/05/2017 22:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.640625'),
(437, '22/05/2017 22:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.63125'),
(438, '22/05/2017 22:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.621875'),
(439, '22/05/2017 22:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.575'),
(440, '22/05/2017 23:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.584375'),
(441, '22/05/2017 23:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.640625'),
(442, '22/05/2017 23:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.74375'),
(443, '22/05/2017 23:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.415625'),
(444, '22/05/2017 23:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(445, '22/05/2017 23:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.85625'),
(446, '23/05/2017 00:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.800'),
(447, '23/05/2017 00:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(448, '23/05/2017 00:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.78125'),
(449, '23/05/2017 00:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(450, '23/05/2017 00:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(451, '23/05/2017 00:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.7625'),
(452, '23/05/2017 01:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(453, '23/05/2017 01:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.7625'),
(454, '23/05/2017 01:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(455, '23/05/2017 01:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(456, '23/05/2017 01:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(457, '23/05/2017 01:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;-3.75'),
(458, '23/05/2017 02:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.753125'),
(459, '23/05/2017 02:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.790625'),
(460, '23/05/2017 02:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.790625'),
(461, '23/05/2017 02:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(462, '23/05/2017 02:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.78125'),
(463, '23/05/2017 03:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(464, '23/05/2017 03:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.78125'),
(465, '23/05/2017 03:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(466, '23/05/2017 03:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.78125'),
(467, '23/05/2017 03:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.7625'),
(468, '23/05/2017 03:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(469, '23/05/2017 04:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.771875'),
(470, '23/05/2017 04:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.74375'),
(471, '23/05/2017 04:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.903125'),
(472, '23/05/2017 04:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.575'),
(473, '23/05/2017 04:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.809375'),
(474, '23/05/2017 04:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.950'),
(475, '23/05/2017 05:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.884375'),
(476, '23/05/2017 05:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.85625'),
(477, '23/05/2017 05:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.846875'),
(478, '23/05/2017 05:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.846875'),
(479, '23/05/2017 05:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.875'),
(480, '23/05/2017 05:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.828125'),
(481, '23/05/2017 06:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.85625'),
(482, '23/05/2017 06:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.846875'),
(483, '23/05/2017 06:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.846875'),
(484, '23/05/2017 06:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.809375'),
(485, '23/05/2017 06:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.8375'),
(486, '23/05/2017 06:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.846875'),
(487, '23/05/2017 07:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.846875'),
(488, '23/05/2017 07:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.828125'),
(489, '23/05/2017 07:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.846875'),
(490, '23/05/2017 07:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.846875'),
(491, '23/05/2017 07:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.865625'),
(492, '23/05/2017 07:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;2.04375'),
(493, '23/05/2017 08:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.978125'),
(494, '23/05/2017 08:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.490625'),
(495, '23/05/2017 08:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;0.95625'),
(496, '23/05/2017 08:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;0.984375'),
(497, '23/05/2017 08:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;2.015625'),
(498, '23/05/2017 08:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.93125'),
(499, '23/05/2017 09:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.415625'),
(500, '23/05/2017 09:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.10625'),
(501, '23/05/2017 09:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.06875'),
(502, '23/05/2017 09:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.0125'),
(503, '23/05/2017 09:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.734375'),
(504, '23/05/2017 09:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.725'),
(505, '23/05/2017 10:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.6875'),
(506, '23/05/2017 10:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.63125'),
(507, '23/05/2017 10:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.63125'),
(508, '23/05/2017 10:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.603125'),
(509, '23/05/2017 10:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.63125'),
(510, '23/05/2017 10:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.359375'),
(511, '23/05/2017 11:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.06875'),
(512, '23/05/2017 11:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.5375'),
(513, '23/05/2017 11:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.490625'),
(514, '23/05/2017 11:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.546875'),
(515, '23/05/2017 11:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.584375'),
(516, '23/05/2017 11:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.546875'),
(517, '23/05/2017 12:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.040625'),
(518, '23/05/2017 12:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;0.975'),
(519, '23/05/2017 12:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.528125'),
(520, '23/05/2017 12:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.565625'),
(521, '23/05/2017 12:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.509375'),
(522, '23/05/2017 12:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.509375'),
(523, '23/05/2017 13:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.490625'),
(524, '23/05/2017 13:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.51875'),
(525, '23/05/2017 13:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.48125'),
(526, '23/05/2017 13:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.490625'),
(527, '23/05/2017 13:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.500'),
(528, '23/05/2017 13:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.509375'),
(529, '23/05/2017 14:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.471875'),
(530, '23/05/2017 14:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.471875'),
(531, '23/05/2017 14:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.44375'),
(532, '23/05/2017 14:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.10625'),
(533, '23/05/2017 14:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.490625'),
(534, '23/05/2017 14:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.44375'),
(535, '23/05/2017 15:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.415625'),
(536, '23/05/2017 15:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.425'),
(537, '23/05/2017 15:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.396875'),
(538, '23/05/2017 15:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.396875'),
(539, '23/05/2017 15:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;2.053125'),
(540, '23/05/2017 16:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;2.090625'),
(541, '23/05/2017 16:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;2.0625'),
(542, '23/05/2017 16:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;2.034375'),
(543, '23/05/2017 16:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(544, '23/05/2017 16:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(545, '23/05/2017 16:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(546, '23/05/2017 17:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(547, '23/05/2017 17:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(548, '23/05/2017 17:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(549, '23/05/2017 17:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(550, '23/05/2017 17:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(551, '23/05/2017 17:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(552, '23/05/2017 18:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(553, '23/05/2017 18:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(554, '23/05/2017 18:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(555, '23/05/2017 18:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(556, '23/05/2017 18:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(557, '23/05/2017 18:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(558, '23/05/2017 19:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(559, '23/05/2017 19:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(560, '23/05/2017 19:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(561, '23/05/2017 19:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(562, '23/05/2017 19:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(563, '23/05/2017 19:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(564, '23/05/2017 20:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(565, '23/05/2017 20:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(566, '23/05/2017 20:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(567, '23/05/2017 20:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(568, '23/05/2017 20:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(569, '23/05/2017 20:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(570, '23/05/2017 21:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(571, '23/05/2017 21:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(572, '23/05/2017 21:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(573, '23/05/2017 21:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(574, '23/05/2017 21:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(575, '23/05/2017 21:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(576, '23/05/2017 22:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(577, '23/05/2017 22:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(578, '23/05/2017 22:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(579, '23/05/2017 22:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(580, '23/05/2017 22:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(581, '23/05/2017 22:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(582, '23/05/2017 23:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(583, '23/05/2017 23:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(584, '23/05/2017 23:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(585, '23/05/2017 23:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(586, '23/05/2017 23:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(587, '23/05/2017 23:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(588, '24/05/2017 00:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(589, '24/05/2017 00:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(590, '24/05/2017 00:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(591, '24/05/2017 00:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(592, '24/05/2017 00:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(593, '24/05/2017 00:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(594, '24/05/2017 01:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(595, '24/05/2017 01:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(596, '24/05/2017 01:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(597, '24/05/2017 01:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(598, '24/05/2017 01:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(599, '24/05/2017 01:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(600, '24/05/2017 02:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(601, '24/05/2017 02:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(602, '24/05/2017 02:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(603, '24/05/2017 02:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(604, '24/05/2017 02:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(605, '24/05/2017 02:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(606, '24/05/2017 03:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(607, '24/05/2017 03:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(608, '24/05/2017 03:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(609, '24/05/2017 03:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(610, '24/05/2017 03:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(611, '24/05/2017 03:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(612, '24/05/2017 04:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(613, '24/05/2017 04:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(614, '24/05/2017 04:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(615, '24/05/2017 04:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(616, '24/05/2017 04:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(617, '24/05/2017 04:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(618, '24/05/2017 05:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(619, '24/05/2017 05:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(620, '24/05/2017 05:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(621, '24/05/2017 05:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(622, '24/05/2017 05:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(623, '24/05/2017 05:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(624, '24/05/2017 06:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(625, '24/05/2017 06:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(626, '24/05/2017 06:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(627, '24/05/2017 06:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(628, '24/05/2017 06:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(629, '24/05/2017 06:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(630, '24/05/2017 07:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(631, '24/05/2017 07:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(632, '24/05/2017 07:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(633, '24/05/2017 07:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(634, '24/05/2017 07:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(635, '24/05/2017 07:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(636, '24/05/2017 08:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(637, '24/05/2017 08:10:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(638, '24/05/2017 08:20:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(639, '24/05/2017 08:30:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(640, '24/05/2017 08:40:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(641, '24/05/2017 08:50:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(642, '24/05/2017 09:00:00;1;ABS CEL/ETH IO (8ED/4EA/4SD);EA_1;PPM;1.996875'),
(643, '25/05/2017 14:50:00;1;ETASABARA;EA_1;PPM;1.425'),
(644, '25/05/2017 15:00:00;1;ETASABARA;EA_1;PPM;1.575'),
(645, '25/05/2017 15:10:00;1;ETASABARA;EA_1;PPM;1.63125'),
(646, '25/05/2017 15:20:00;1;ETASABARA;EA_1;PPM;1.640625'),
(647, '25/05/2017 15:30:00;1;ETASABARA;EA_1;PPM;1.678125'),
(648, '25/05/2017 15:40:00;1;ETASABARA;EA_1;PPM;1.678125'),
(649, '25/05/2017 15:50:00;1;ETASABARA;EA_1;PPM;1.74375'),
(650, '25/05/2017 16:00:00;1;ETASABARA;EA_1;PPM;1.725'),
(651, '25/05/2017 16:10:00;1;ETASABARA;EA_1;PPM;1.725'),
(652, '25/05/2017 16:20:00;1;ETASABARA;EA_1;PPM;1.734375'),
(653, '25/05/2017 16:30:00;1;ETASABARA;EA_1;PPM;1.74375'),
(654, '25/05/2017 16:40:00;1;ETASABARA;EA_1;PPM;1.7625'),
(655, '25/05/2017 16:50:00;1;ETASABARA;EA_1;PPM;1.7625'),
(656, '25/05/2017 17:00:00;1;ETASABARA;EA_1;PPM;2.165625'),
(657, '25/05/2017 17:10:00;1;ETASABARA;EA_1;PPM;1.959375'),
(658, '25/05/2017 17:20:00;1;ETASABARA;EA_1;PPM;1.828125'),
(659, '25/05/2017 17:30:00;1;ETASABARA;EA_1;PPM;1.846875'),
(660, '25/05/2017 17:40:00;1;ETASABARA;EA_1;PPM;1.85625'),
(661, '25/05/2017 17:50:00;1;ETASABARA;EA_1;PPM;1.846875'),
(662, '25/05/2017 18:00:00;1;ETASABARA;EA_1;PPM;1.85625'),
(663, '25/05/2017 18:10:00;1;ETASABARA;EA_1;PPM;1.85625'),
(664, '25/05/2017 18:20:00;1;ETASABARA;EA_1;PPM;1.846875'),
(665, '25/05/2017 18:30:00;1;ETASABARA;EA_1;PPM;1.828125'),
(666, '25/05/2017 18:40:00;1;ETASABARA;EA_1;PPM;1.846875'),
(667, '25/05/2017 18:50:00;1;ETASABARA;EA_1;PPM;1.85625'),
(668, '25/05/2017 19:00:00;1;ETASABARA;EA_1;PPM;1.846875'),
(669, '25/05/2017 19:10:00;1;ETASABARA;EA_1;PPM;1.865625'),
(670, '25/05/2017 19:20:00;1;ETASABARA;EA_1;PPM;1.471875'),
(671, '25/05/2017 19:30:00;1;ETASABARA;EA_1;PPM;1.36875'),
(672, '25/05/2017 19:40:00;1;ETASABARA;EA_1;PPM;1.63125'),
(673, '25/05/2017 19:50:00;1;ETASABARA;EA_1;PPM;1.678125'),
(674, '25/05/2017 20:00:00;1;ETASABARA;EA_1;PPM;1.6875'),
(675, '25/05/2017 20:10:00;1;ETASABARA;EA_1;PPM;1.696875'),
(676, '25/05/2017 20:20:00;1;ETASABARA;EA_1;PPM;1.715625'),
(677, '25/05/2017 20:30:00;1;ETASABARA;EA_1;PPM;1.659375'),
(678, '25/05/2017 20:40:00;1;ETASABARA;EA_1;PPM;1.6875'),
(679, '25/05/2017 20:50:00;1;ETASABARA;EA_1;PPM;1.734375'),
(680, '25/05/2017 21:00:00;1;ETASABARA;EA_1;PPM;1.725'),
(681, '25/05/2017 21:10:00;1;ETASABARA;EA_1;PPM;1.678125'),
(682, '25/05/2017 21:20:00;1;ETASABARA;EA_1;PPM;1.715625'),
(683, '25/05/2017 21:30:00;1;ETASABARA;EA_1;PPM;1.696875'),
(684, '25/05/2017 21:40:00;1;ETASABARA;EA_1;PPM;1.696875'),
(685, '25/05/2017 21:50:00;1;ETASABARA;EA_1;PPM;1.696875'),
(686, '25/05/2017 22:00:00;1;ETASABARA;EA_1;PPM;1.696875'),
(687, '25/05/2017 22:10:00;1;ETASABARA;EA_1;PPM;1.715625'),
(688, '25/05/2017 22:20:00;1;ETASABARA;EA_1;PPM;1.6875'),
(689, '25/05/2017 22:30:00;1;ETASABARA;EA_1;PPM;1.696875'),
(690, '25/05/2017 22:40:00;1;ETASABARA;EA_1;PPM;1.696875'),
(691, '25/05/2017 22:50:00;1;ETASABARA;EA_1;PPM;1.66875'),
(692, '25/05/2017 23:00:00;1;ETASABARA;EA_1;PPM;1.6875'),
(693, '25/05/2017 23:10:00;1;ETASABARA;EA_1;PPM;1.3875'),
(694, '25/05/2017 23:20:00;1;ETASABARA;EA_1;PPM;1.134375'),
(695, '25/05/2017 23:30:00;1;ETASABARA;EA_1;PPM;1.453125'),
(696, '25/05/2017 23:40:00;1;ETASABARA;EA_1;PPM;1.528125'),
(697, '25/05/2017 23:50:00;1;ETASABARA;EA_1;PPM;1.565625'),
(698, '26/05/2017 00:00:00;1;ETASABARA;EA_1;PPM;1.5375'),
(699, '26/05/2017 00:10:00;1;ETASABARA;EA_1;PPM;1.584375'),
(700, '26/05/2017 00:20:00;1;ETASABARA;EA_1;PPM;1.575'),
(701, '26/05/2017 00:30:00;1;ETASABARA;EA_1;PPM;1.575'),
(702, '26/05/2017 00:40:00;1;ETASABARA;EA_1;PPM;1.603125'),
(703, '26/05/2017 00:50:00;1;ETASABARA;EA_1;PPM;1.575'),
(704, '26/05/2017 01:00:00;1;ETASABARA;EA_1;PPM;1.584375'),
(705, '26/05/2017 01:10:00;1;ETASABARA;EA_1;PPM;1.621875'),
(706, '26/05/2017 01:20:00;1;ETASABARA;EA_1;PPM;1.584375'),
(707, '26/05/2017 01:30:00;1;ETASABARA;EA_1;PPM;1.603125'),
(708, '26/05/2017 01:40:00;1;ETASABARA;EA_1;PPM;1.603125'),
(709, '26/05/2017 01:50:00;1;ETASABARA;EA_1;PPM;1.575'),
(710, '26/05/2017 02:00:00;1;ETASABARA;EA_1;PPM;1.603125'),
(711, '26/05/2017 02:10:00;1;ETASABARA;EA_1;PPM;1.575'),
(712, '26/05/2017 02:20:00;1;ETASABARA;EA_1;PPM;1.603125'),
(713, '26/05/2017 02:30:00;1;ETASABARA;EA_1;PPM;1.603125'),
(714, '26/05/2017 02:40:00;1;ETASABARA;EA_1;PPM;1.59375'),
(715, '26/05/2017 02:50:00;1;ETASABARA;EA_1;PPM;1.584375'),
(716, '26/05/2017 03:00:00;1;ETASABARA;EA_1;PPM;1.584375'),
(717, '26/05/2017 03:10:00;1;ETASABARA;EA_1;PPM;1.303125'),
(718, '26/05/2017 03:20:00;1;ETASABARA;EA_1;PPM;1.115625'),
(719, '26/05/2017 03:30:00;1;ETASABARA;EA_1;PPM;1.321875'),
(720, '26/05/2017 03:40:00;1;ETASABARA;EA_1;PPM;1.40625'),
(721, '26/05/2017 03:50:00;1;ETASABARA;EA_1;PPM;1.425'),
(722, '26/05/2017 04:00:00;1;ETASABARA;EA_1;PPM;1.44375'),
(723, '26/05/2017 04:10:00;1;ETASABARA;EA_1;PPM;1.453125'),
(724, '26/05/2017 04:20:00;1;ETASABARA;EA_1;PPM;1.453125'),
(725, '26/05/2017 04:30:00;1;ETASABARA;EA_1;PPM;1.500'),
(726, '26/05/2017 04:40:00;1;ETASABARA;EA_1;PPM;1.48125'),
(727, '26/05/2017 04:50:00;1;ETASABARA;EA_1;PPM;1.471875'),
(728, '26/05/2017 05:00:00;1;ETASABARA;EA_1;PPM;1.490625'),
(729, '26/05/2017 05:10:00;1;ETASABARA;EA_1;PPM;1.48125'),
(730, '26/05/2017 05:20:00;1;ETASABARA;EA_1;PPM;1.500'),
(731, '26/05/2017 05:30:00;1;ETASABARA;EA_1;PPM;1.453125'),
(732, '26/05/2017 05:40:00;1;ETASABARA;EA_1;PPM;1.490625'),
(733, '26/05/2017 05:50:00;1;ETASABARA;EA_1;PPM;1.48125'),
(734, '26/05/2017 06:00:00;1;ETASABARA;EA_1;PPM;1.48125'),
(735, '26/05/2017 06:10:00;1;ETASABARA;EA_1;PPM;1.51875'),
(736, '26/05/2017 06:20:00;1;ETASABARA;EA_1;PPM;1.453125'),
(737, '26/05/2017 06:30:00;1;ETASABARA;EA_1;PPM;1.471875'),
(738, '26/05/2017 06:40:00;1;ETASABARA;EA_1;PPM;1.453125'),
(739, '26/05/2017 06:50:00;1;ETASABARA;EA_1;PPM;1.48125'),
(740, '26/05/2017 07:00:00;1;ETASABARA;EA_1;PPM;1.453125'),
(741, '26/05/2017 07:10:00;1;ETASABARA;EA_1;PPM;1.14375'),
(742, '26/05/2017 07:20:00;1;ETASABARA;EA_1;PPM;1.246875'),
(743, '26/05/2017 07:30:00;1;ETASABARA;EA_1;PPM;1.3875'),
(744, '26/05/2017 07:40:00;1;ETASABARA;EA_1;PPM;1.378125'),
(745, '26/05/2017 07:50:00;1;ETASABARA;EA_1;PPM;1.40625'),
(746, '26/05/2017 08:00:00;1;ETASABARA;EA_1;PPM;1.40625'),
(747, '26/05/2017 08:10:00;1;ETASABARA;EA_1;PPM;1.415625'),
(748, '26/05/2017 08:20:00;1;ETASABARA;EA_1;PPM;1.3875'),
(749, '26/05/2017 08:30:00;1;ETASABARA;EA_1;PPM;1.40625'),
(750, '26/05/2017 08:40:00;1;ETASABARA;EA_1;PPM;1.096875'),
(751, '26/05/2017 08:50:00;1;ETASABARA;EA_1;PPM;1.350'),
(752, '26/05/2017 09:00:00;1;ETASABARA;EA_1;PPM;1.3875'),
(753, '26/05/2017 09:10:00;1;ETASABARA;EA_1;PPM;1.340625'),
(754, '26/05/2017 09:20:00;1;ETASABARA;EA_1;PPM;1.303125'),
(755, '26/05/2017 09:30:00;1;ETASABARA;EA_1;PPM;1.303125'),
(756, '26/05/2017 09:40:00;1;ETASABARA;EA_1;PPM;1.3125'),
(757, '26/05/2017 09:50:00;1;ETASABARA;EA_1;PPM;1.265625'),
(758, '26/05/2017 10:00:00;1;ETASABARA;EA_1;PPM;1.03125'),
(759, '26/05/2017 10:10:00;1;ETASABARA;EA_1;PPM;1.378125'),
(760, '26/05/2017 10:20:00;1;ETASABARA;EA_1;PPM;1.425'),
(761, '26/05/2017 10:30:00;1;ETASABARA;EA_1;PPM;1.33125'),
(762, '26/05/2017 10:50:00;1;ETASABARA;EA_1;PPM;1.275'),
(763, '26/05/2017 11:00:00;1;ETASABARA;EA_1;PPM;1.340625'),
(764, '26/05/2017 11:10:00;1;ETASABARA;EA_1;PPM;1.359375'),
(765, '26/05/2017 11:20:00;1;ETASABARA;EA_1;PPM;1.050'),
(766, '26/05/2017 11:30:00;1;ETASABARA;EA_1;PPM;1.621875'),
(767, '26/05/2017 11:40:00;1;ETASABARA;EA_1;PPM;1.425'),
(768, '26/05/2017 11:50:00;1;ETASABARA;EA_1;PPM;1.340625'),
(769, '26/05/2017 12:00:00;1;ETASABARA;EA_1;PPM;1.284375'),
(770, '26/05/2017 12:10:00;1;ETASABARA;EA_1;PPM;1.340625'),
(771, '26/05/2017 12:20:00;1;ETASABARA;EA_1;PPM;1.321875'),
(772, '26/05/2017 12:30:00;1;ETASABARA;EA_1;PPM;1.33125'),
(773, '26/05/2017 12:40:00;1;ETASABARA;EA_1;PPM;1.33125'),
(774, '26/05/2017 12:50:00;1;ETASABARA;EA_1;PPM;1.321875'),
(775, '26/05/2017 13:00:00;1;ETASABARA;EA_1;PPM;1.33125'),
(776, '26/05/2017 13:10:00;1;ETASABARA;EA_1;PPM;1.303125'),
(777, '26/05/2017 13:20:00;1;ETASABARA;EA_1;PPM;1.078125'),
(778, '26/05/2017 13:30:00;1;ETASABARA;EA_1;PPM;1.434375'),
(779, '26/05/2017 18:00:00;1;ETASABARA;EA_1;PPM;0.9375'),
(780, '26/05/2017 18:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;2000.000;EA_4;500.000'),
(781, '26/05/2017 18:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;2000.000;EA_4;500.000'),
(782, '29/05/2017 12:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;417.000;EA_4;496.000'),
(783, '29/05/2017 12:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;418.000;EA_4;495.000'),
(784, '29/05/2017 12:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;432.000;EA_4;496.000'),
(785, '29/05/2017 12:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;420.000;EA_4;495.000'),
(786, '29/05/2017 12:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;422.000;EA_4;495.000'),
(787, '29/05/2017 13:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;420.000;EA_4;495.000'),
(788, '29/05/2017 13:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;420.000;EA_4;497.000'),
(789, '29/05/2017 13:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;431.000;EA_4;495.000'),
(790, '29/05/2017 13:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;423.000;EA_4;497.000'),
(791, '29/05/2017 13:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;415.000;EA_4;498.000'),
(792, '29/05/2017 13:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;424.000;EA_4;497.000'),
(793, '29/05/2017 14:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;424.000;EA_4;495.000'),
(794, '29/05/2017 14:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;423.000;EA_4;497.000'),
(795, '29/05/2017 14:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;424.000;EA_4;497.000'),
(796, '29/05/2017 14:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;514.000;EA_4;497.000'),
(797, '29/05/2017 14:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;427.000;EA_4;496.000'),
(798, '29/05/2017 14:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;434.000;EA_4;495.000'),
(799, '29/05/2017 15:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;425.000;EA_4;498.000'),
(800, '29/05/2017 15:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;428.000;EA_4;495.000'),
(801, '29/05/2017 15:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;433.000;EA_4;494.000'),
(802, '29/05/2017 15:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;422.000;EA_4;497.000'),
(803, '29/05/2017 15:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;438.000;EA_4;495.000'),
(804, '29/05/2017 15:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;423.000;EA_4;496.000'),
(805, '29/05/2017 16:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;424.000;EA_4;495.000'),
(806, '29/05/2017 16:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;427.000;EA_4;496.000'),
(807, '29/05/2017 16:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.000;EA_2;0.000;EA_3;432.000;EA_4;495.000'),
(808, '29/05/2017 16:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;-3.750;EA_2;0.000;EA_3;429.000;EA_4;495.000'),
(809, '29/05/2017 16:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;-3.750;EA_2;0.000;EA_3;427.000;EA_4;496.000'),
(810, '29/05/2017 17:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;0.000;EA_3;428.000;EA_4;0.000'),
(811, '29/05/2017 17:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.91875;EA_2;429.000;EA_3;0.000;EA_4;0.000'),
(812, '29/05/2017 17:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;427.000;EA_3;0.000;EA_4;2000.000'),
(813, '29/05/2017 17:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.91875;EA_2;426.000;EA_3;0.000;EA_4;2000.000'),
(814, '29/05/2017 17:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;430.000;EA_3;0.000;EA_4;2000.000'),
(815, '29/05/2017 17:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(816, '29/05/2017 18:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;426.000;EA_3;0.000;EA_4;2000.000'),
(817, '29/05/2017 18:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;428.000;EA_3;0.000;EA_4;2000.000'),
(818, '29/05/2017 18:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(819, '29/05/2017 18:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;421.000;EA_3;0.000;EA_4;2000.000'),
(820, '29/05/2017 18:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(821, '29/05/2017 18:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(822, '29/05/2017 19:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;465.000;EA_3;0.000;EA_4;2000.000'),
(823, '29/05/2017 19:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;428.000;EA_3;0.000;EA_4;2000.000'),
(824, '29/05/2017 19:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;424.000;EA_3;0.000;EA_4;2000.000'),
(825, '29/05/2017 19:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;427.000;EA_3;0.000;EA_4;2000.000'),
(826, '29/05/2017 19:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;430.000;EA_3;0.000;EA_4;2000.000'),
(827, '29/05/2017 19:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;428.000;EA_3;0.000;EA_4;2000.000'),
(828, '29/05/2017 20:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(829, '29/05/2017 20:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;427.000;EA_3;0.000;EA_4;2000.000'),
(830, '29/05/2017 20:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(831, '29/05/2017 20:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(832, '29/05/2017 20:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;425.000;EA_3;0.000;EA_4;2000.000'),
(833, '29/05/2017 20:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(834, '29/05/2017 21:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(835, '29/05/2017 21:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(836, '29/05/2017 21:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;426.000;EA_3;0.000;EA_4;2000.000'),
(837, '29/05/2017 21:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;426.000;EA_3;0.000;EA_4;2000.000'),
(838, '29/05/2017 21:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(839, '29/05/2017 21:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;428.000;EA_3;0.000;EA_4;2000.000'),
(840, '29/05/2017 22:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;432.000;EA_3;0.000;EA_4;2000.000'),
(841, '29/05/2017 22:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;430.000;EA_3;0.000;EA_4;2000.000'),
(842, '29/05/2017 22:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(843, '29/05/2017 22:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;751.000;EA_3;0.000;EA_4;2000.000'),
(844, '29/05/2017 22:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(845, '29/05/2017 23:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;425.000;EA_3;0.000;EA_4;2000.000'),
(846, '29/05/2017 23:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;427.000;EA_3;0.000;EA_4;2000.000'),
(847, '29/05/2017 23:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(848, '29/05/2017 23:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;430.000;EA_3;0.000;EA_4;2000.000'),
(849, '29/05/2017 23:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(850, '29/05/2017 23:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;430.000;EA_3;0.000;EA_4;2000.000'),
(851, '30/05/2017 00:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;432.000;EA_3;0.000;EA_4;2000.000'),
(852, '30/05/2017 00:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;430.000;EA_3;0.000;EA_4;2000.000'),
(853, '30/05/2017 00:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;432.000;EA_3;0.000;EA_4;2000.000'),
(854, '30/05/2017 00:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;427.000;EA_3;0.000;EA_4;2000.000'),
(855, '30/05/2017 00:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;430.000;EA_3;0.000;EA_4;2000.000'),
(856, '30/05/2017 00:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(857, '30/05/2017 01:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;433.000;EA_3;0.000;EA_4;2000.000'),
(858, '30/05/2017 01:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;441.000;EA_3;0.000;EA_4;2000.000'),
(859, '30/05/2017 01:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.871875;EA_2;429.000;EA_3;0.000;EA_4;2000.000'),
(860, '30/05/2017 01:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.871875;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(861, '30/05/2017 01:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;432.000;EA_3;0.000;EA_4;2000.000'),
(862, '30/05/2017 01:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;434.000;EA_3;0.000;EA_4;2000.000'),
(863, '30/05/2017 02:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;427.000;EA_3;0.000;EA_4;2000.000'),
(864, '30/05/2017 02:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;430.000;EA_3;0.000;EA_4;2000.000'),
(865, '30/05/2017 02:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(866, '30/05/2017 02:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;433.000;EA_3;0.000;EA_4;2000.000'),
(867, '30/05/2017 02:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;436.000;EA_3;0.000;EA_4;2000.000'),
(868, '30/05/2017 02:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;421.000;EA_3;0.000;EA_4;2000.000'),
(869, '30/05/2017 03:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(870, '30/05/2017 03:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;424.000;EA_3;0.000;EA_4;2000.000'),
(871, '30/05/2017 03:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;440.000;EA_3;0.000;EA_4;2000.000'),
(872, '30/05/2017 03:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;425.000;EA_3;0.000;EA_4;2000.000'),
(873, '30/05/2017 03:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.871875;EA_2;427.000;EA_3;0.000;EA_4;2000.000'),
(874, '30/05/2017 03:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;439.000;EA_3;0.000;EA_4;2000.000'),
(875, '30/05/2017 04:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;449.000;EA_3;0.000;EA_4;2000.000'),
(876, '30/05/2017 04:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;434.000;EA_3;0.000;EA_4;2000.000'),
(877, '30/05/2017 04:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;432.000;EA_3;0.000;EA_4;2000.000'),
(878, '30/05/2017 04:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;433.000;EA_3;0.000;EA_4;2000.000'),
(879, '30/05/2017 04:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;509.000;EA_3;0.000;EA_4;2000.000'),
(880, '30/05/2017 04:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;433.000;EA_3;0.000;EA_4;2000.000'),
(881, '30/05/2017 05:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;436.000;EA_3;0.000;EA_4;2000.000'),
(882, '30/05/2017 05:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;444.000;EA_3;0.000;EA_4;2000.000'),
(883, '30/05/2017 05:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;431.000;EA_3;0.000;EA_4;2000.000'),
(884, '30/05/2017 05:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;440.000;EA_3;0.000;EA_4;2000.000'),
(885, '30/05/2017 05:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;443.000;EA_3;0.000;EA_4;2000.000'),
(886, '30/05/2017 05:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;440.000;EA_3;0.000;EA_4;2000.000'),
(887, '30/05/2017 06:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;446.000;EA_3;0.000;EA_4;2000.000'),
(888, '30/05/2017 06:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;574.000;EA_3;0.000;EA_4;2000.000'),
(889, '30/05/2017 06:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;436.000;EA_3;0.000;EA_4;2000.000'),
(890, '30/05/2017 06:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;440.000;EA_3;0.000;EA_4;2000.000'),
(891, '30/05/2017 07:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;443.000;EA_3;0.000;EA_4;2000.000'),
(892, '30/05/2017 07:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;445.000;EA_3;0.000;EA_4;2000.000'),
(893, '30/05/2017 07:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;443.000;EA_3;0.000;EA_4;2000.000'),
(894, '30/05/2017 07:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;436.000;EA_3;0.000;EA_4;2000.000'),
(895, '30/05/2017 07:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;437.000;EA_3;0.000;EA_4;2000.000'),
(896, '30/05/2017 07:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;438.000;EA_3;0.000;EA_4;2000.000'),
(897, '30/05/2017 08:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;439.000;EA_3;2000.000;EA_4;2000.000'),
(898, '30/05/2017 08:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;438.000;EA_3;407.000;EA_4;979.000'),
(899, '30/05/2017 08:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;442.000;EA_3;416.000;EA_4;977.000'),
(900, '30/05/2017 08:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;446.000;EA_3;414.000;EA_4;984.000'),
(901, '30/05/2017 08:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;450.000;EA_3;413.000;EA_4;984.000'),
(902, '30/05/2017 09:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;446.000;EA_3;413.000;EA_4;977.000'),
(903, '30/05/2017 09:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;447.000;EA_3;415.000;EA_4;979.000'),
(904, '30/05/2017 09:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;445.000;EA_3;417.000;EA_4;976.000'),
(905, '30/05/2017 09:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;448.000;EA_3;415.000;EA_4;977.000'),
(906, '30/05/2017 09:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;451.000;EA_3;415.000;EA_4;980.000'),
(907, '30/05/2017 09:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;446.000;EA_3;411.000;EA_4;981.000'),
(908, '30/05/2017 10:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;453.000;EA_3;411.000;EA_4;980.000'),
(909, '30/05/2017 10:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;448.000;EA_3;411.000;EA_4;980.000'),
(910, '30/05/2017 10:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;447.000;EA_3;413.000;EA_4;980.000'),
(911, '30/05/2017 10:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;445.000;EA_3;411.000;EA_4;983.000'),
(912, '30/05/2017 10:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;455.000;EA_3;410.000;EA_4;982.000'),
(913, '30/05/2017 10:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;453.000;EA_3;409.000;EA_4;977.000'),
(914, '30/05/2017 11:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;451.000;EA_3;408.000;EA_4;980.000'),
(915, '30/05/2017 11:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;452.000;EA_3;407.000;EA_4;980.000'),
(916, '30/05/2017 11:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;452.000;EA_3;407.000;EA_4;985.000'),
(917, '30/05/2017 11:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;456.000;EA_3;408.000;EA_4;981.000'),
(918, '30/05/2017 11:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;448.000;EA_3;408.000;EA_4;979.000'),
(919, '30/05/2017 11:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;448.000;EA_3;406.000;EA_4;980.000'),
(920, '30/05/2017 12:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;446.000;EA_3;408.000;EA_4;979.000'),
(921, '30/05/2017 12:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;447.000;EA_3;409.000;EA_4;978.000'),
(922, '30/05/2017 12:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;447.000;EA_3;408.000;EA_4;975.000'),
(923, '30/05/2017 12:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;550.000;EA_3;409.000;EA_4;971.000'),
(924, '30/05/2017 12:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;553.000;EA_3;408.000;EA_4;974.000'),
(925, '30/05/2017 12:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;540.000;EA_3;409.000;EA_4;968.000'),
(926, '30/05/2017 13:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.871875;EA_2;545.000;EA_3;408.000;EA_4;975.000'),
(927, '30/05/2017 13:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;541.000;EA_3;408.000;EA_4;971.000'),
(928, '30/05/2017 13:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;539.000;EA_3;407.000;EA_4;970.000'),
(929, '30/05/2017 13:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.871875;EA_2;562.000;EA_3;410.000;EA_4;971.000'),
(930, '30/05/2017 13:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;550.000;EA_3;409.000;EA_4;970.000'),
(931, '30/05/2017 13:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;557.000;EA_3;412.000;EA_4;963.000'),
(932, '30/05/2017 14:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;563.000;EA_3;411.000;EA_4;966.000'),
(933, '30/05/2017 14:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;591.000;EA_3;410.000;EA_4;977.000'),
(934, '30/05/2017 14:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;595.000;EA_3;412.000;EA_4;966.000'),
(935, '30/05/2017 14:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;587.000;EA_3;415.000;EA_4;965.000'),
(936, '30/05/2017 14:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;590.000;EA_3;416.000;EA_4;965.000'),
(937, '30/05/2017 15:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;591.000;EA_3;416.000;EA_4;965.000'),
(938, '30/05/2017 15:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;592.000;EA_3;419.000;EA_4;965.000'),
(939, '30/05/2017 15:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.91875;EA_2;563.000;EA_3;419.000;EA_4;962.000'),
(940, '30/05/2017 15:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;588.000;EA_3;421.000;EA_4;964.000'),
(941, '30/05/2017 15:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;579.000;EA_3;420.000;EA_4;969.000'),
(942, '30/05/2017 15:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;586.000;EA_3;417.000;EA_4;969.000'),
(943, '30/05/2017 16:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;582.000;EA_3;419.000;EA_4;969.000'),
(944, '30/05/2017 16:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;579.000;EA_3;417.000;EA_4;963.000'),
(945, '30/05/2017 16:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;579.000;EA_3;420.000;EA_4;982.000'),
(946, '30/05/2017 16:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;699.000;EA_3;419.000;EA_4;971.000'),
(947, '30/05/2017 16:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;578.000;EA_3;417.000;EA_4;970.000'),
(948, '30/05/2017 16:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;633.000;EA_3;420.000;EA_4;973.000'),
(949, '30/05/2017 17:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;572.000;EA_3;417.000;EA_4;983.000'),
(950, '30/05/2017 17:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;613.000;EA_3;421.000;EA_4;973.000'),
(951, '30/05/2017 17:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;566.000;EA_3;417.000;EA_4;970.000'),
(952, '30/05/2017 17:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;565.000;EA_3;418.000;EA_4;971.000'),
(953, '30/05/2017 17:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;566.000;EA_3;418.000;EA_4;968.000'),
(954, '30/05/2017 17:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;574.000;EA_3;416.000;EA_4;969.000'),
(955, '30/05/2017 18:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;581.000;EA_3;416.000;EA_4;971.000'),
(956, '30/05/2017 18:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;588.000;EA_3;418.000;EA_4;970.000'),
(957, '30/05/2017 18:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;573.000;EA_3;418.000;EA_4;970.000'),
(958, '30/05/2017 18:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;622.000;EA_3;417.000;EA_4;965.000'),
(959, '30/05/2017 18:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;607.000;EA_3;418.000;EA_4;964.000'),
(960, '30/05/2017 18:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;581.000;EA_3;414.000;EA_4;969.000'),
(961, '30/05/2017 19:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;578.000;EA_3;417.000;EA_4;969.000'),
(962, '30/05/2017 19:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;637.000;EA_3;417.000;EA_4;970.000'),
(963, '30/05/2017 19:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;816.000;EA_3;416.000;EA_4;969.000'),
(964, '30/05/2017 19:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;770.000;EA_3;417.000;EA_4;971.000'),
(965, '30/05/2017 19:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;792.000;EA_3;415.000;EA_4;974.000'),
(966, '30/05/2017 19:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;787.000;EA_3;415.000;EA_4;974.000'),
(967, '30/05/2017 20:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;770.000;EA_3;416.000;EA_4;975.000'),
(968, '30/05/2017 20:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;758.000;EA_3;415.000;EA_4;969.000'),
(969, '30/05/2017 20:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;785.000;EA_3;414.000;EA_4;975.000');
INSERT INTO `tb_teste` (`id`, `bem`) VALUES
(970, '30/05/2017 20:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;491.000;EA_3;415.000;EA_4;970.000'),
(971, '30/05/2017 20:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;528.000;EA_3;416.000;EA_4;971.000'),
(972, '30/05/2017 20:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;526.000;EA_3;414.000;EA_4;969.000'),
(973, '30/05/2017 21:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;525.000;EA_3;414.000;EA_4;969.000'),
(974, '30/05/2017 21:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;534.000;EA_3;415.000;EA_4;973.000'),
(975, '30/05/2017 21:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;543.000;EA_3;414.000;EA_4;971.000'),
(976, '30/05/2017 21:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;757.000;EA_3;415.000;EA_4;970.000'),
(977, '30/05/2017 21:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;539.000;EA_3;413.000;EA_4;970.000'),
(978, '30/05/2017 21:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;578.000;EA_3;414.000;EA_4;971.000'),
(979, '30/05/2017 22:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;560.000;EA_3;414.000;EA_4;975.000'),
(980, '30/05/2017 22:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;562.000;EA_3;415.000;EA_4;965.000'),
(981, '30/05/2017 22:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;529.000;EA_3;414.000;EA_4;974.000'),
(982, '30/05/2017 22:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.88125;EA_2;559.000;EA_3;411.000;EA_4;971.000'),
(983, '30/05/2017 22:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.909375;EA_2;581.000;EA_3;413.000;EA_4;978.000'),
(984, '30/05/2017 23:10:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;-3.75;EA_2;0;EA_3;0;EA_4;0'),
(985, '30/05/2017 23:20:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;508.000;EA_3;412.000;EA_4;969.000'),
(986, '30/05/2017 23:30:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;546.000;EA_3;413.000;EA_4;973.000'),
(987, '30/05/2017 23:40:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.900;EA_2;588.000;EA_3;413.000;EA_4;978.000'),
(988, '30/05/2017 23:50:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;554.000;EA_3;412.000;EA_4;969.000'),
(989, '31/05/2017 00:00:00;1;ETASABARA;EA_1;Entrada AnalÃ³gica 1;0.890625;EA_2;561.000;EA_3;413.000;EA_4;968.000');

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

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `surname`) VALUES
(1, 'Gökhan', 'Kaya'),
(2, 'feste', 'teste');

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
-- Indexes for table `tb_bens_frabricante`
--
ALTER TABLE `tb_bens_frabricante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bens_ordem`
--
ALTER TABLE `tb_bens_ordem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `segmento` (`segmento`);

--
-- Indexes for table `tb_bens_segmento`
--
ALTER TABLE `tb_bens_segmento`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tb_teste`
--
ALTER TABLE `tb_teste`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `tb_bens_frabricante`
--
ALTER TABLE `tb_bens_frabricante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_bens_ordem`
--
ALTER TABLE `tb_bens_ordem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_bens_segmento`
--
ALTER TABLE `tb_bens_segmento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- AUTO_INCREMENT for table `tb_teste`
--
ALTER TABLE `tb_teste`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=990;
--
-- AUTO_INCREMENT for table `tb_tipo`
--
ALTER TABLE `tb_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;--
-- Database: `systemteste`
--
CREATE DATABASE IF NOT EXISTS `systemteste` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `systemteste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bem`
--

CREATE TABLE `tb_bem` (
  `id` int(11) NOT NULL,
  `familia` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capacidade` varchar(20) NOT NULL,
  `unidade` varchar(4) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `frabicante` int(11) NOT NULL,
  `codProprietario` int(11) NOT NULL,
  `descProprietario` varchar(30) NOT NULL,
  `loja` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `plaqueta` varchar(11) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_bem`
--

INSERT INTO `tb_bem` (`id`, `familia`, `tag`, `name`, `capacidade`, `unidade`, `modelo`, `frabicante`, `codProprietario`, `descProprietario`, `loja`, `local`, `grupo`, `plaqueta`, `data`) VALUES
(1, 1, 'MSA', 'MASCARA AUTONOMA', '240', 'KG', '1', 1, 24, 'SABARA', 1, 2, 1, '101010', '2017-12-04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bens_familia`
--

CREATE TABLE `tb_bens_familia` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_bens_familia`
--

INSERT INTO `tb_bens_familia` (`id`, `name`, `tag`) VALUES
(1, 'MASCARA AUTONOMA', 'MSA'),
(2, 'Sistema Cloração', 'SCL');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bens_frabricante`
--

CREATE TABLE `tb_bens_frabricante` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_bens_frabricante`
--

INSERT INTO `tb_bens_frabricante` (`id`, `name`, `nick`) VALUES
(1, 'MSA', 'MSA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bens_grupo`
--

CREATE TABLE `tb_bens_grupo` (
  `id` int(11) NOT NULL,
  `bem` int(11) NOT NULL,
  `grupo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_bens_nivel`
--

CREATE TABLE `tb_bens_nivel` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tag` int(11) NOT NULL,
  `segmento` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_bens_nivel`
--

INSERT INTO `tb_bens_nivel` (`id`, `name`, `tag`, `segmento`) VALUES
(1, 'PRIMERIO', 1, 1),
(2, 'SECUNDARIO', 2, 1),
(3, 'TERCERARIO', 3, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_categoria`
--

CREATE TABLE `tb_categoria` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tag` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_categoria`
--

INSERT INTO `tb_categoria` (`id`, `name`, `tag`) VALUES
(1, 'GAS CLORO', 'GCL'),
(2, 'SEGURACA', 'SEG'),
(3, 'POLICLORETO ALUMINIO', 'PAC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eq_componentes`
--

CREATE TABLE `tb_eq_componentes` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capacidade` varchar(20) NOT NULL,
  `unidade` varchar(4) NOT NULL,
  `numeracao` varchar(20) NOT NULL,
  `frabicante` int(11) NOT NULL,
  `frabicanteNick` varchar(30) NOT NULL,
  `proprietario` int(11) NOT NULL,
  `proprietarioNick` varchar(30) NOT NULL,
  `local` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `dataFrabricacao` date NOT NULL DEFAULT '0000-00-00',
  `dataCompra` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_eq_componentes`
--

INSERT INTO `tb_eq_componentes` (`id`, `produto`, `tag`, `name`, `capacidade`, `unidade`, `numeracao`, `frabicante`, `frabicanteNick`, `proprietario`, `proprietarioNick`, `local`, `categoria`, `dataFrabricacao`, `dataCompra`) VALUES
(1, 3, 'CLORADOR', 'SISTEMA DE CLORACAO', '240', 'KG', '123123', 2, 'CLORANDO', 24, 'SABARA', 2, 1, '2017-12-17', '2017-12-17'),
(2, 4, 'MSA', 'CILINDRO AR', '3.6', 'KG', 'J31243', 1, 'MSA', 24, 'SABARA', 2, 1, '2017-12-10', '2017-12-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_eq_localizacao`
--

CREATE TABLE `tb_eq_localizacao` (
  `id` int(11) NOT NULL,
  `equipamento` int(11) NOT NULL,
  `loja` int(11) NOT NULL,
  `local` int(11) DEFAULT NULL,
  `dataIncial` date DEFAULT '0000-00-00',
  `dataFinal` date DEFAULT '0000-00-00',
  `status` enum('0','1','2','3') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_eq_localizacao`
--

INSERT INTO `tb_eq_localizacao` (`id`, `equipamento`, `loja`, `local`, `dataIncial`, `dataFinal`, `status`) VALUES
(1, 1, 24, 535, '2017-12-01', '2017-12-17', '3'),
(2, 1, 1, 2, '2017-12-18', '0000-00-00', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_equipamentos`
--

CREATE TABLE `tb_equipamentos` (
  `id` int(11) NOT NULL,
  `produto` int(11) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `capacidade` varchar(20) NOT NULL,
  `unidade` varchar(4) NOT NULL,
  `numeracao` varchar(20) NOT NULL,
  `frabicante` int(11) NOT NULL,
  `frabicanteNick` varchar(30) NOT NULL,
  `proprietario` int(11) NOT NULL,
  `proprietarioNick` varchar(30) NOT NULL,
  `local` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `plaqueta` varchar(11) NOT NULL,
  `dataFrabricacao` date NOT NULL DEFAULT '0000-00-00',
  `dataCompra` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_equipamentos`
--

INSERT INTO `tb_equipamentos` (`id`, `produto`, `tag`, `name`, `capacidade`, `unidade`, `numeracao`, `frabicante`, `frabicanteNick`, `proprietario`, `proprietarioNick`, `local`, `categoria`, `plaqueta`, `dataFrabricacao`, `dataCompra`) VALUES
(1, 2, 'SCL', 'SISTEMA DE CLORACAO', '240', 'KG', '123123', 2, 'CLORANDO', 24, 'SABARA', 2, 1, '101010', '2017-12-17', '2017-12-17'),
(2, 1, 'MSA', 'MASCARA AUTONOMA', '3', 'KG', '123123', 1, 'MSA', 24, 'SABARA', 2, 1, '', '2017-12-10', '2017-12-10');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_frabricante`
--

CREATE TABLE `tb_frabricante` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nick` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_frabricante`
--

INSERT INTO `tb_frabricante` (`id`, `name`, `nick`) VALUES
(1, 'MSA', 'MSA'),
(2, 'CLORANDO', 'CLORANDO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo`
--

CREATE TABLE `tb_grupo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tag` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_grupo`
--

INSERT INTO `tb_grupo` (`id`, `name`, `tag`) VALUES
(1, 'GAS CLORO', 'GCL'),
(2, 'SEGURACA', 'SEG'),
(3, 'POLICLORETO ALUMINIO', 'PAC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupoloja`
--

CREATE TABLE `tb_grupoloja` (
  `id` varchar(2) NOT NULL,
  `decricao` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_grupoloja`
--

INSERT INTO `tb_grupoloja` (`id`, `decricao`) VALUES
('P', 'Proprietario'),
('C', 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_locais`
--

CREATE TABLE `tb_locais` (
  `id` int(11) NOT NULL,
  `loja` int(11) NOT NULL,
  `tipo` varchar(11) DEFAULT NULL,
  `regional` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `uf` varchar(2) NOT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_locais`
--

INSERT INTO `tb_locais` (`id`, `loja`, `tipo`, `regional`, `name`, `municipio`, `uf`, `latitude`, `longitude`, `ativo`) VALUES
(2, 1, 'ETA', 'FLORIANO', 'FLORIANO', 'FLORIANO', 'PI', -6.784000, -43.020000, '0'),
(3, 1, 'ETA', 'PARNAIBA', 'PARNAIBA', 'PARNAIBA', 'PI', -2.922000, -41.758999, '0'),
(4, 2, 'ETA', '', 'BARCARENA', 'BARCARENA', 'PA', -1.550000, -48.738998, '0'),
(5, 3, 'ETA', '', 'JOAO PESSOA', 'JOAO PESSOA', 'PB', -7.188000, -34.916000, '0'),
(6, 4, 'ETA', '', 'TIMOTEO', 'TIMOTEO', 'MG', -19.524000, -42.653000, '0'),
(7, 6, 'ETA', '', 'PEDRAS DE FOGO', 'PEDRAS DE FOGO', 'PB', -7.353000, -35.027000, '0'),
(8, 7, 'ETA', '', 'ETA-ARAPIRACA', 'ARAPIRACA', 'AL', -9.702000, -36.688999, '0'),
(9, 7, 'ETA', '', 'PILAR', 'PILAR', 'AL', 0.000000, 0.000000, '0'),
(10, 7, 'ETA', '', 'SAO BRAS (ETA-MORRO DO GAIA)', 'SAO BRAS', 'AL', 0.000000, 0.000000, '0'),
(11, 8, 'ETA', '', 'CUIABA ETA I', 'CUIABA', 'MT', -15.590000, -56.098999, '0'),
(12, 8, 'ETA', '', 'CUIABA ETA II', 'CUIABA', 'MT', 0.000000, 0.000000, '0'),
(13, 9, 'ETA', 'IMPERATRIZ', 'ACAILANDIA ELEVATORIA', 'ACAILANDIA', 'MA', -4.951000, -47.493000, '0'),
(14, 9, 'ETA', '', 'ALCANTARA', 'ALCANTARA', 'MA', -2.358000, -44.432999, '0'),
(15, 9, 'ETA', '', 'ARAIOSES', 'ARAIOSES', 'MA', 0.000000, 0.000000, '0'),
(16, 9, 'ETA', 'ITAPECURU MIRIM', 'AREIAS', 'SAO LUIS', 'MA', 0.000000, 0.000000, '0'),
(17, 9, 'ETA', '', 'AXIXA', 'AXIXA', 'MA', -2.838000, -44.062000, '0'),
(18, 9, 'ETA', 'SAO JOAO DOS PATOS', 'BARAO DE GRAJAU', 'BARAO DE GRAJAU', 'MA', -6.758000, -43.022999, '0'),
(19, 9, 'ETA', 'PRESIDENTE DUTRA', 'BARRA DO CORDA', 'BARRA DO CORDA', 'MA', 0.000000, 0.000000, '0'),
(20, 9, 'ETA', 'BARREIRINHAS', 'BARREIRINHAS', 'BARREIRINHAS', 'MA', 0.000000, 0.000000, '0'),
(21, 9, 'ETA', '', 'BOM JESUS DAS SELVAS', 'BOM JESUS DAS SELVAS', 'MA', 0.000000, 0.000000, '0'),
(22, 9, 'ETA', '', 'BREJO', 'BREJO', 'MA', -3.680000, -42.689999, '0'),
(23, 9, 'ETA', '', 'BURITI DE INACIA VAZ', 'SAO LUIS', 'MA', -3.941000, -42.922001, '0'),
(24, 9, 'ETA', '', 'CANTANHEDE', 'CANTANHEDE', 'MA', 0.000000, 0.000000, '0'),
(25, 9, 'ETA', 'CHAPADINHA', 'CHAPADINHA', 'CHAPADINHA', 'MA', -3.743000, -43.355000, '0'),
(26, 9, 'ETA', 'SAO JOAO DOS PATOS', 'COLINAS', 'COLINAS', 'MA', -6.034000, -44.257000, '0'),
(27, 9, 'ETA', '', 'DUQUE BACELAR', 'DUQUE BACELAR', 'MA', -4.162000, -42.942001, '0'),
(28, 9, 'ETA', 'IMPERATRIZ', 'IMPERATRIZ', 'IMPERATRIZ', 'MA', -5.548000, -47.476002, '0'),
(29, 9, 'ETA', 'BACABEIRA', 'ITALUIS', 'ROSARIO', 'MA', -3.027000, -44.308998, '0'),
(30, 9, 'ETA', 'ITAPECURU MIRIM', 'ITAPECURU MIRIM', 'ITAPECURU MIRIM', 'MA', -3.409000, -44.348000, '0'),
(31, 9, 'ETA', 'SAO JOAO DOS PATOS', 'LORETO', 'LORETO', 'MA', -7.096000, -45.129002, '0'),
(32, 9, 'ETA', '', 'MIRANDA DO NORTE', 'MIRANDA DO NORTE', 'MA', 0.000000, 0.000000, '0'),
(33, 9, 'ETA', 'ITAPECURU MIRIM', 'MORROS', 'MORROS', 'MA', -2.862000, -44.023998, '0'),
(34, 9, 'ETA', 'CHAPADINHA', 'NINA RODRIGUES', 'NINA RODRIGUES', 'MA', -3.467000, -43.902000, '0'),
(35, 9, 'ETA', 'METROPOLITANA', 'PACIENCIA', 'SAO LUIS', 'MA', -2.556000, -44.209999, '0'),
(36, 9, 'ETA', '', 'PEDREIRAS', 'PEDREIRAS', 'MA', -4.574000, -44.602001, '0'),
(37, 9, 'ETA', '', 'PINHEIRO', 'PINHEIRO', 'MA', -2.527000, -45.083000, '0'),
(38, 9, 'ETA', '', 'PIRAPEMAS', 'PIRAPEMAS', 'MA', -3.728000, -44.229000, '0'),
(39, 9, 'ETA', 'IMPERATRIZ', 'RIACHAO', 'RIACHAO', 'MA', 0.000000, 0.000000, '0'),
(40, 9, 'ETA', 'METROPOLITANA', 'SACAVEM', 'ACAILANDIA', 'MA', -2.566000, -44.252998, '0'),
(41, 9, 'ETA', '', 'SANTA QUITERIA', 'SANTA QUITERIA DO MARANHAO', 'MA', -3.501000, -42.562000, '0'),
(42, 9, 'ETA', '', 'SAO BENEDITO DO RIO PRETO', 'ACAILANDIA', 'MA', 0.000000, 0.000000, '0'),
(43, 9, 'ETA', '', 'SAO BERNARDO', 'SAO BERNARDO', 'MA', 0.000000, 0.000000, '0'),
(44, 9, 'ETA', 'SAO JOAO DOS PATOS', 'SAO RAIMUNDO DAS MANGABEIRAS', 'SAO RAIMUNDO DAS MANGABEIRAS', 'MA', -7.024000, -45.478001, '0'),
(45, 9, 'ETA', 'COROATA', 'TIMBIRAS', 'TIMBIRAS', 'MA', 0.000000, 0.000000, '0'),
(46, 9, 'ETA', 'DEDREIRAS', 'TRIZIDELA DO VALE', 'TRIZIDELA DO VALE', 'MA', -4.573000, -44.617001, '0'),
(47, 9, 'ETA', '', 'TUTOIA', 'TUTOIA', 'MA', -2.761000, -42.275002, '0'),
(48, 9, 'ETA', '', 'URBANO SANTOS', 'URBANO SANTOS', 'MA', -3.203000, -43.389999, '0'),
(49, 9, 'ETA', 'CHAPADINHA', 'VARGEM GRANDE', 'VARGEM GRANDE', 'MA', 0.000000, 0.000000, '0'),
(50, 9, 'ETA', 'SANTA INES', 'VITORIA DO MEARIM', 'VITORIA DO MEARIM', 'MA', -3.477000, -44.867001, '0'),
(51, 10, 'ETA', '', 'ALTO ALEGRE', 'ALTO ALEGRE', 'RR', 2.835000, -60.728001, '0'),
(52, 10, 'ETA', '', 'CARACARAI', 'CARACARAI', 'RR', 1.829000, -61.132000, '0'),
(53, 10, 'ETA', '', 'CAROEBE', 'CAROEBE', 'RR', 0.876169, -59.662998, '0'),
(54, 10, 'ETA', '', 'MUCAJAI', 'MUCAJAI', 'RR', 2.448000, -60.917999, '0'),
(55, 10, 'ETA', '', 'NORMANDIA', 'NORMANDIA', 'RR', 3.878000, -59.626999, '0'),
(56, 10, 'ETA', '', 'PACARAIMA', 'PACARAIMA', 'RR', 4.477000, -61.146999, '0'),
(57, 10, 'ETA', '', 'RORAINOPOLIS', 'RORAINOPOLIS', 'RR', 0.941046, -60.423000, '0'),
(58, 10, 'ETA', '', 'SAO JOAO DA BALIZA', 'SAO JOAO DA BALIZA', 'RR', 0.950526, -59.909000, '0'),
(59, 10, 'ETA', '', 'SAO LUIZ DO ANAUA', 'SAO JOAO DA BALIZA', 'RR', 1.010000, -60.033001, '0'),
(60, 10, 'ETA', '', 'SAO PEDRO', 'BOA VISTA', 'RR', 2.826000, -60.658001, '0'),
(61, 11, 'ETA', '', 'ACARI', 'ACARI', 'RN', 0.000000, 0.000000, '0'),
(62, 11, 'ETA', '', 'ADUTORA DO BOQUEIRAO', 'RIACHO DA CRUZ', 'RN', 0.000000, 0.000000, '0'),
(63, 11, 'ETA', '', 'ALTO RODRIGUES', 'ALTO DO RODRIGUES', 'RN', -5.301000, -36.764000, '0'),
(64, 11, 'ETA', '', 'ANGICOS - CENTRO', 'ANGICOS', 'RN', 0.000000, 0.000000, '0'),
(65, 11, 'ETA', '', 'ANGICOS - EB2', 'ANGICOS', 'RN', 0.000000, 0.000000, '0'),
(66, 11, 'ETA', '', 'ANGICOS- ADUTORA CENTAL', 'ANGICOS', 'RN', 0.000000, 0.000000, '0'),
(67, 11, 'ETA', '', 'APODI', 'APODI', 'RN', -5.660000, -37.798000, '0'),
(68, 11, 'ETA', '', 'AREIA BRANCA', 'AREIA BRANCA', 'RN', 0.000000, 0.000000, '0'),
(69, 11, 'ETA', '', 'ASSU', 'ACU', 'RN', -5.578000, -36.925999, '0'),
(70, 11, 'ETA', '', 'BOA SAUDE', 'BOA SAUDE', 'RN', -6.138000, -35.577000, '0'),
(71, 11, 'ETA', '', 'BOM JESUS - EB - 8', 'BOM JESUS', 'RN', 0.000000, 0.000000, '0'),
(72, 11, 'ETA', '', 'BRASIL NOVO', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(73, 11, 'ETA', 'CAICO', 'CAICO', 'CAICO', 'RN', -6.467000, -37.091999, '0'),
(74, 11, 'ETA', '', 'CAICO ZONA NORTE', 'CAICO', 'RN', 0.000000, 0.000000, '0'),
(75, 11, 'ETA', '', 'CAMPO REDONDO', 'CAMPO REDONDO', 'RN', 0.000000, 0.000000, '0'),
(76, 11, 'ETA', '', 'CANDELARIA', 'NATAL', 'RN', -5.839000, -35.220001, '0'),
(77, 11, 'ETA', '', 'CANGUARETAMA', 'CANGUARETAMA', 'RN', -6.378000, -35.127998, '0'),
(78, 11, 'ETA', '', 'CARAUBAS', 'CARAUBAS', 'RN', -5.634000, -37.535999, '0'),
(79, 11, 'ETA', '', 'CARNAUBAIS', 'CARNAUBAIS', 'RN', -5.339000, -36.830002, '0'),
(80, 11, 'ETA', '', 'CARNAUBAS-PALMA', 'CARNAUBAIS', 'RN', 0.000000, 0.000000, '0'),
(81, 11, 'ETA', '', 'CERRO CORA ETA LOCAL', 'CERRO CORA', 'RN', -6.036000, -36.347000, '0'),
(82, 11, 'ETA', '', 'CIDADE CAMPESTRE - P78', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(83, 11, 'ETA', '', 'CIDADE DOS BOSQUES - P17', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(84, 11, 'ETA', 'LITORAL SUL', 'CIDADE SATELITE', 'NATAL', 'RN', -5.863000, -35.230000, '0'),
(85, 11, 'ETA', '', 'CIDADE SATELITE - P9', 'NATAL', 'RN', -5.860000, -35.243000, '0'),
(86, 11, 'ETA', '', 'CONJUNTO JIQUI - P2', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(87, 11, 'ETA', '', 'CRUZETA - CAPITACAO', 'CRUZETA', 'RN', -6.411000, -36.794998, '0'),
(88, 11, 'ETA', '', 'CRUZETA - ESCRITORIO', 'CRUZETA', 'RN', -6.412000, -36.787998, '0'),
(89, 11, 'ETA', '', 'CURRAIS NOVOS', 'CURRAIS NOVOS', 'RN', -6.255000, -36.522999, '0'),
(90, 11, 'ETA', '', 'DIX-SEPT ROSADO', 'GOVERNADOR DIX-SEPT ROSADO', 'RN', 0.000000, 0.000000, '0'),
(91, 11, 'ETA', '', 'Dr. SEVERIANO', 'DOUTOR SEVERIANO', 'RN', 0.000000, 0.000000, '0'),
(93, 11, 'ETA', '', 'ELOI DE SOUSA - EB - 10', 'SENADOR ELOI DE SOUZA', 'RN', 0.000000, 0.000000, '0'),
(94, 11, 'ETA', '', 'EMAUS - P90', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(95, 11, 'ETA', '', 'ENTRONCAMENTO', 'NATAL', 'RN', -5.582000, -35.655998, '0'),
(96, 11, 'ETA', '', 'EQUADOR', 'EQUADOR', 'RN', 0.000000, 0.000000, '0'),
(97, 11, 'ETA', '', 'ESPIRITO SANTO I', 'ESPIRITO SANTO', 'RN', -6.335000, -35.299000, '0'),
(98, 11, 'ETA', '', 'ESPIRITO SANTO II VARZEA', 'ESPIRITO SANTO', 'RN', -6.334000, -35.370998, '0'),
(99, 11, 'ETA', '', 'CALDEIRAO - SANTANA DO SERIDO', 'SANTANA DO SERIDO', 'RN', -6.705000, -36.693001, '0'),
(100, 11, 'ETE', '', 'ETE - DO BALDO', 'NATAL', 'RN', -5.790000, -35.210999, '0'),
(101, 11, 'ETE', '', 'ETE-PARNAMIRIM', 'PARNAMIRIM', 'RN', -5.935000, -35.237999, '0'),
(102, 11, 'ETA', '', 'EXTREMOZ', 'EXTREMOZ', 'RN', -5.726000, -35.282001, '0'),
(103, 11, 'ETA', '', 'FELIPE CAMARA', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(104, 11, 'ETA', '', 'FELIPE CAMARAO - P01', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(105, 11, 'ETA', '', 'FELIPE CAMARAO - P10', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(106, 11, 'ETA', 'CAICO', 'FLORANEA EB4', 'FLORANIA', 'RN', -6.123000, -36.806999, '0'),
(107, 11, 'ETA', '', 'FRANCISCO CAMPOS - P9', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(108, 11, 'ETA', '', 'FRANCISCO DANTAS', 'FRANCISCO DANTAS', 'RN', 0.000000, 0.000000, '0'),
(109, 11, 'ETA', '', 'GARGALHEIRAS', 'ACARI', 'RN', -6.427000, -36.603001, '0'),
(110, 11, 'ETA', '', 'GRAMORE', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(111, 11, 'ETA', '', 'GUARAPES P4', 'NATAL', 'RN', -5.840000, -35.273998, '0'),
(112, 11, 'ETA', '', 'IPANGUACU', 'IPANGUACU', 'RN', -5.508000, -36.860001, '0'),
(113, 11, 'ETA', '', 'IPUEIRA', 'IPUEIRA', 'RN', -6.814000, -37.201000, '0'),
(114, 11, 'ETA', '', 'ITAJA - ADUTORA SERTAO CENTRAL', 'ITAJA', 'RN', -5.631000, -36.861000, '0'),
(115, 11, 'ETA', '', 'ITAU', 'ITAU', 'RN', -5.837000, -37.987000, '0'),
(116, 11, 'ETA', '', 'JANDAIRA', 'JANDAIRA', 'RN', 0.000000, 0.000000, '0'),
(117, 11, 'ETA', '', 'JANDAIRA - P02', 'JANDAIRA', 'RN', 0.000000, 0.000000, '0'),
(118, 11, 'ETA', '', 'JANDAIRA - P03', 'JANDAIRA', 'RN', 0.000000, 0.000000, '0'),
(119, 11, 'ETA', '', 'JANDAIRA - P05', 'JANDAIRA', 'RN', 0.000000, 0.000000, '0'),
(120, 11, 'ETA', '', 'JARDIM DE ANGICOS', 'JARDIM DE ANGICOS', 'RN', 0.000000, 0.000000, '0'),
(121, 11, 'ETA', '', 'JARDIM DE PIRANHAS - ETA ESCRITORIO LOCAL', 'JARDIM DE PIRANHAS', 'RN', -6.379000, -37.347000, '0'),
(122, 11, 'ETA', '', 'JARDIM DO SERIDO - PASSAGEM DAS TRAIRAS ', 'JARDIM DO SERIDO', 'RN', -6.517000, -36.937000, '0'),
(123, 11, 'ETA', '', 'JARDIM PROGRESSO', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(124, 11, 'ETA', '', 'JERONIMO ROSADO - EB - 1', 'ACU', 'RN', -5.614000, -36.896000, '0'),
(125, 11, 'ETA', '', 'JERONIMO ROSADO - EB - 2', 'MOSSORO', 'RN', -5.236000, -37.317001, '0'),
(126, 11, 'ETA', '', 'JIQUI', 'NATAL', 'RN', -5.917000, -35.188000, '0'),
(127, 11, 'ETA', '', 'JIQUI - P1', 'NATAL', 'RN', -5.862000, -35.208000, '0'),
(128, 11, 'ETA', '', 'JOSE DA PENHA', 'JOSE DA PENHA', 'RN', 0.000000, 0.000000, '0'),
(129, 11, 'ETA', '', 'JUCURUTU', 'JUCURUTU', 'RN', -6.034000, -37.016998, '0'),
(130, 11, 'ETA', '', 'JUNDIA', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(131, 11, 'ETA', 'LITORAL SUL', 'LAGOA NOVA I', 'LAGOA NOVA', 'RN', 0.000000, 0.000000, '0'),
(132, 11, 'ETA', 'LITORAL SUL', 'LAGOA NOVA II', 'LAGOA NOVA', 'RN', 0.000000, 0.000000, '0'),
(133, 11, 'ETA', '', 'LAJES - ADUTORA SERTAO CENTRAL', 'LAJES', 'RN', -5.690000, -36.321999, '0'),
(134, 11, 'ETA', '', 'LAJES - CABUGI', 'LAJES', 'RN', 0.000000, 0.000000, '0'),
(135, 11, 'ETA', 'LITORAL NORTE', 'MACAIBA - GRANJA RECREIO', 'MACAIBA', 'RN', -5.875000, -35.307999, '0'),
(136, 11, 'ETA', '', 'MACAU - ETA TAMBAUBA', 'MACAU', 'RN', -5.160000, -36.597000, '0'),
(137, 11, 'ETA', '', 'MARCELINO VIEIRA', 'MARCELINO VIEIRA', 'RN', 0.000000, 0.000000, '0'),
(138, 11, 'ETA', '', 'MARTINS', 'MARTINS', 'RN', -6.094000, -37.911999, '0'),
(139, 11, 'ETA', '', 'MEDIO OESTE', 'ACU', 'RN', -5.886000, -36.994999, '0'),
(140, 11, 'ETA', '', 'MONTANHAS', 'MONTANHAS', 'RN', -6.479000, -35.292999, '0'),
(141, 11, 'ETA', '', 'MONTE ALEGRE', 'MONTE ALEGRE', 'RN', 0.000000, 0.000000, '0'),
(142, 11, 'ETA', '', 'MOSSORO', 'MOSSORO', 'RN', 0.000000, 0.000000, '0'),
(143, 11, 'ETA', '', 'NISIA FLORESTA - ETA BOMFIM - ADUT. MONSEN. EXP.', 'NISIA FLORESTA', 'RN', 0.000000, 0.000000, '0'),
(144, 11, 'ETA', '', 'NOVA CRUZ', 'NOVA CRUZ', 'RN', -6.486000, -35.426998, '0'),
(145, 11, 'ETA', '', 'NOVA PARNAMIRIM - P11', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(146, 11, 'ETA', '', 'NOVA PARNAMIRIM - P20', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(147, 11, 'ETA', '', 'NOVA PARNAMIRIM - P29', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(148, 11, 'ETA', '', 'NOVO CAMPO - P1', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(149, 11, 'ETA', '', 'OURO BRANCO ETA', 'OURO BRANCO', 'RN', -6.709000, -36.950001, '0'),
(150, 11, 'ETA', '', 'P20 - ZONA NORTE', 'NATAL', 'RN', -5.739000, -35.280998, '0'),
(151, 11, 'ETA', '', 'P36 - ZONA NORTE', 'NATAL', 'RN', -5.752000, -35.256001, '0'),
(152, 11, 'ETA', '', 'P56 - ZONA NORTE', 'NATAL', 'RN', -5.747000, -35.230000, '0'),
(153, 11, 'ETA', '', 'P6 - MOSSORO', 'MOSSORO', 'RN', -5.176000, -37.361000, '0'),
(154, 11, 'ETA', '', 'PALMA', 'CAICO', 'RN', -6.629000, -37.150002, '0'),
(155, 11, 'ETA', '', 'PARELHAS', 'PARELHAS', 'RN', -6.694000, -36.631001, '0'),
(156, 11, 'ETA', '', 'PARNAMIRIM - LAGOA DO BONFIM', 'PARNAMIRIM', 'RN', -6.041000, -35.226002, '0'),
(157, 11, 'ETA', '', 'PARNAMIRIM I', 'PARNAMIRIM', 'RN', -5.921000, -35.263000, '0'),
(158, 11, 'ETA', '', 'PARNAMIRIM II - RIACHO VERMELHO', 'PARNAMIRIM', 'RN', -5.933000, -35.271999, '0'),
(159, 11, 'ETA', '', 'PARQUE DAS DUNAS', 'NATAL', 'RN', -5.811000, -35.193001, '0'),
(160, 11, 'ETA', '', 'PAU DOS FERROS', 'PAU DOS FERROS', 'RN', -6.146000, -38.193001, '0'),
(161, 11, 'ETA', '', 'PEDRO VELHO', 'PEDRO VELHO', 'RN', 0.000000, 0.000000, '0'),
(162, 11, 'ETA', 'ASSU', 'PENDENCIAS', 'PENDENCIAS', 'RN', -5.263000, -36.715000, '0'),
(163, 11, 'ETA', '', 'PILOES', 'PILOES', 'RN', 0.000000, 0.000000, '0'),
(164, 11, 'ETA', '', 'PIRANGI', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(165, 11, 'ETA', '', 'PLANALTO', 'PAU DOS FERROS', 'RN', 0.000000, 0.000000, '0'),
(166, 11, 'ETA', '', 'PLANALTO - P01', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(167, 11, 'ETA', '', 'PLANALTO - P02', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(168, 11, 'ETA', '', 'PLANALTO - P03', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(169, 11, 'ETA', '', 'PLANALTO - P05', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(171, 11, 'ETA', '', 'PLANALTO P7', 'NATAL', 'RN', -5.835000, -35.262001, '0'),
(172, 11, 'ETA', '', 'PLANALTO P9', 'NATAL', 'RN', -5.835000, -35.264999, '0'),
(173, 11, 'ETA', '', 'PONTA NEGRA', 'NATAL', 'RN', -5.880000, -35.181999, '0'),
(174, 11, 'ETA', '', 'PORTALEGRE', 'PORTALEGRE', 'RN', 0.000000, 0.000000, '0'),
(175, 11, 'ETA', '', 'POTENGI - ALTO DA TORRE', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(176, 11, 'ETA', '', 'POTENGI - POCO 35', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(177, 11, 'ETA', '', 'POTENGI - POCO 44', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(178, 11, 'ETA', '', 'PUREZA', 'PUREZA', 'RN', 0.000000, 0.000000, '0'),
(179, 11, 'ETA', '', 'REDINHA P57', 'NATAL', 'RN', -5.746000, -35.233002, '0'),
(180, 11, 'ETA', '', 'RIACHUELO', 'RIACHUELO', 'RN', 0.000000, 0.000000, '0'),
(181, 11, 'ETA', '', 'RIO BAHIA P2', 'NATAL', 'RN', -5.840000, -35.276001, '0'),
(182, 11, 'ETA', '', 'RODOLFO FERNANDES', 'RODOLFO FERNANDES', 'RN', 0.000000, 0.000000, '0'),
(183, 11, 'ETA', '', 'SAN VALE - P1', 'NATAL', 'RN', -5.854000, -35.216999, '0'),
(184, 11, 'ETA', '', 'SANTA CRUZ - EB - 16', 'SANTA CRUZ', 'RN', -6.247000, -35.966000, '0'),
(185, 11, 'ETA', '', 'SANTA FE', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(186, 11, 'ETA', '', 'SANTA TEREZA - P28', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(187, 11, 'ETA', '', 'SANTANA DO MATOS', 'SANTANA DO MATOS', 'RN', -5.966000, -36.660000, '0'),
(188, 11, 'ETA', '', 'SANTANA DO SERIDO', 'SANTANA DO SERIDO', 'RN', -6.772000, -36.735001, '0'),
(189, 11, 'ETA', '', 'SAO FERNANDO', 'SAO FERNANDO', 'RN', -6.376000, -37.185001, '0'),
(190, 11, 'ETA', '', 'SAO JOAO DO SABUGI', 'SAO JOAO DO SABUGI', 'RN', -6.717000, -37.203999, '0'),
(191, 11, 'ETA', '', 'SAO JOSE DO MIPIBU', 'SAO JOSE DE MIPIBU', 'RN', -6.075000, -35.231998, '0'),
(192, 11, 'ETA', '', 'SAO MIGUEL', 'SAO MIGUEL', 'RN', -6.215000, -38.429001, '0'),
(193, 11, 'ETA', '', 'SAO RAFAEL', 'SAO RAFAEL', 'RN', -5.802000, -36.879002, '0'),
(194, 11, 'ETE', '', 'ETE SAO TOME', 'SAO TOME', 'RN', -5.973000, -36.070000, '0'),
(546, 13, 'ETA', '', 'ARACAGI', 'ARACAGI', 'PB', -6.852000, -35.293999, '0'),
(196, 11, 'ETA', '', 'SERRA DE SANTANA', 'FLORANIA', 'RN', -6.128000, -36.820999, '0'),
(197, 25, 'ETA', '', 'SAAE - SERRA NEGRA DO NORTE', 'SERRA NEGRA DO NORTE', 'RN', -6.670000, -37.390999, '0'),
(198, 11, 'ETA', '', 'SERRINHA DOS PINTOS', 'SERRINHA DOS PINTOS', 'RN', 0.000000, 0.000000, '0'),
(199, 11, 'ETA', '', 'TORRES P5', 'NATAL', 'RN', -5.844000, -35.271999, '0'),
(200, 11, 'ETA', 'LITORAL SUL', 'TOUROS - BOQUEIRAO', 'NATAL', 'RN', -5.251000, -35.532001, '0'),
(201, 11, 'ETA', '', 'UMARIZAL', 'UMARIZAL', 'RN', -5.990000, -37.818001, '0'),
(202, 11, 'ETA', '', 'VERA CRUZ', 'VERA CRUZ', 'RN', -6.041000, -35.446999, '0'),
(203, 11, 'ETA', '', 'ZONA NORTE - P23', 'NATAL', 'RN', -5.739000, -35.224998, '0'),
(204, 11, 'ETA', '', 'ZONA NORTE - P57', 'NATAL', 'RN', -5.746000, -35.233002, '0'),
(205, 11, 'ETA', '', 'ZONA NORTE - POCO 37', 'NATAL', 'RN', 0.000000, 0.000000, '0'),
(206, 11, 'ETA', 'NORTE', 'ZONA-16', 'NATAL', 'RN', -5.726000, -35.248001, '0'),
(207, 12, 'ETA', '', 'ETA OESTE', 'CAUCAIA', 'CE', -3.787000, -38.655998, '0'),
(208, 12, 'ETA', '', 'PAVUNA', 'PACATUBA', 'CE', -3.915000, -38.598999, '0'),
(209, 13, 'ETA', '', 'AGUA BRANCA', 'AGUA BRANCA', 'PB', 0.000000, 0.000000, '0'),
(210, 13, 'ETA', '', 'ALAGOA GRANDE', 'ALAGOA GRANDE', 'PB', 0.000000, 0.000000, '0'),
(211, 13, 'ETA', '', 'ALAGOA NOVA', 'ALAGOA NOVA', 'PB', 0.000000, 0.000000, '0'),
(212, 13, 'ETA', '', 'ALGODAO DE JANDAIRA', 'ALGODAO DE JANDAIRA', 'PB', 0.000000, 0.000000, '0'),
(213, 13, 'ETA', '', 'ALHANDRA CLORACAO', 'ALHANDRA', 'PB', -7.435000, -34.903000, '0'),
(214, 13, 'ETA', '', 'ALHANDRA PRE-CLORACAO', 'ALHANDRA', 'PB', 0.000000, 0.000000, '1'),
(215, 13, 'ETA', '', 'APARECIDA', 'APARECIDA', 'PB', -6.786000, -38.077999, '0'),
(216, 13, 'ETA', '', 'ARARA', 'ARARA', 'PB', 0.000000, 0.000000, '0'),
(217, 13, 'ETA', 'BORBOREMA', 'AREIA', 'AREIA', 'PB', -6.923000, -35.667000, '0'),
(218, 13, 'ETA', '', 'AREIA - SAULO MAIA', 'AREIA', 'PB', 0.000000, 0.000000, '0'),
(219, 13, 'ETA', '', 'AREIAL', 'AREIAL', 'PB', 0.000000, 0.000000, '0'),
(220, 13, 'ETA', 'BORBOREMA', 'AROEIRAS', 'AROEIRAS', 'PB', 0.000000, 0.000000, '0'),
(221, 13, 'ETA', '', 'BANANEIRAS', 'BANANEIRAS', 'PB', -6.762000, -35.634998, '0'),
(222, 13, 'ETA', '', 'BARRA DE SANTA ROSA', 'BARRA DE SANTA ROSA', 'PB', 0.000000, 0.000000, '0'),
(223, 13, 'ETA', 'BORBOREMA', 'BARRA DE SAO MIGUEL', 'BARRA DE SAO MIGUEL', 'PB', -7.747000, -36.313999, '0'),
(224, 13, 'ETA', 'BORBOREMA', 'BARRAGEM SAO JOSE', 'MONTEIRO', 'PB', 0.000000, 0.000000, '0'),
(225, 13, 'ETA', '', 'BELEM', 'BELEM', 'PB', -6.726000, -35.555000, '0'),
(226, 13, 'ETA', 'BORBOREMA', 'BOA VISTA', 'BOA VISTA', 'PB', 0.000000, 0.000000, '0'),
(227, 13, 'ETA', '', 'BOM JESUS', 'BOM JESUS', 'PB', -6.896000, -38.523998, '0'),
(228, 13, 'ETA', '', 'BONITO DE SANTA FE', 'BONITO DE SANTA FE', 'PB', -7.315000, -38.516998, '0'),
(229, 13, 'ETA', 'BORBOREMA', 'BOQUEIRAO', 'BOQUEIRAO', 'PB', -7.484000, -36.136002, '0'),
(230, 13, 'ETA', '', 'BREJO DO CRUZ', 'BREJO DO CRUZ', 'PB', -6.344000, -37.500000, '0'),
(231, 13, 'ETA', 'RIO DO PEIXE', 'BREJO DOS SANTOS', 'BREJO DOS SANTOS', 'PB', -6.373000, -37.830002, '0'),
(232, 13, 'ETA', '', 'CAAPORA', 'CAAPORA', 'PB', -7.510000, -34.924999, '0'),
(233, 13, 'ETA', 'BORBOREMA', 'CABACEIRAS', 'CABACEIRAS', 'PB', 0.000000, 0.000000, '0'),
(234, 13, 'ETA', '', 'CACHOEIRA DOS INDIOS', 'CACHOEIRA DOS INDIOS', 'PB', 0.000000, 0.000000, '0'),
(235, 13, 'ETA', '', 'CACIMBA DE DENTRO', 'CACIMBA DE DENTRO', 'PB', -6.650000, -35.789001, '0'),
(236, 13, 'ETA', '', 'CACIMBAS', 'CACIMBAS', 'PB', 0.000000, 0.000000, '0'),
(237, 13, 'ETA', '', 'CAJA', 'CAMPINA GRANDE', 'PB', 0.000000, 0.000000, '0'),
(238, 13, 'ETA', 'ALTO PIRANHAS', 'CAJAZEIRAS (ENG. AVIDOS)', 'CAJAZEIRAS', 'PB', -6.977000, -38.456001, '0'),
(239, 13, 'ETA', '', 'CAJAZEIRINHAS', 'CAJAZEIRINHAS', 'PB', 0.000000, 0.000000, '0'),
(240, 13, 'ETA', 'BORBOREMA', 'CAMALAU', 'CAMALAU', 'PB', -7.888000, -36.821999, '0'),
(241, 13, 'ETA', '', 'CAMPINA GRANDE', 'CAMPINA GRANDE', 'PB', -7.385000, -35.974998, '0'),
(242, 13, 'ETA', 'LITORAL', 'CAPIM', 'CAPIM', 'PB', 0.000000, 0.000000, '0'),
(243, 13, 'ETA', '', 'CARAUBAS', 'CARAUBAS', 'PB', -7.762000, -36.548000, '0'),
(244, 13, 'ETA', '', 'CARRAPATEIRA', 'CARRAPATEIRA', 'PB', 0.000000, 0.000000, '0'),
(245, 13, 'ETA', '', 'CASSERENGUE', 'CASSERENGUE', 'PB', 0.000000, 0.000000, '0'),
(246, 13, 'ETA', 'ESPINHARAS', 'CATINGUEIRA', 'CATINGUEIRA', 'PB', -7.092000, -37.647999, '0'),
(247, 13, 'ETA', '', 'CATOLE DO ROCHA', 'CATOLE DO ROCHA', 'PB', -6.344000, -37.748001, '0'),
(248, 13, 'ETA', '', 'CEPILHO', 'AREIA', 'PB', 0.000000, 0.000000, '0'),
(249, 13, 'ETA', '', 'CHA DOS PEREIROS', 'INGA', 'PB', 0.000000, 0.000000, '0'),
(250, 13, 'ETA', '', 'CONCEICAO', 'CONCEICAO', 'PB', 0.000000, 0.000000, '0'),
(251, 13, 'ETA', '', 'CONDE', 'CONDE', 'PB', 0.000000, 0.000000, '0'),
(252, 13, 'ETA', '', 'CONGO', 'CONGO', 'PB', 0.000000, 0.000000, '0'),
(253, 13, 'ETA', 'BORBOREMA', 'COXIXOLA', 'COXIXOLA', 'PB', 0.000000, 0.000000, '0'),
(254, 13, 'ETA', '', 'CRUZ DO ESPIRITO SANTO', 'CRUZ DO ESPIRITO SANTO', 'PB', -7.127000, -35.098000, '0'),
(255, 13, 'ETA', 'BORBOREMA', 'CUBATI', 'CUBATI', 'PB', 0.000000, 0.000000, '0'),
(256, 13, 'ETA', '', 'CUITE', 'CUITE', 'PB', 0.000000, 0.000000, '0'),
(257, 13, 'ETA', 'BREJO', 'CUITEGI', 'CUITEGI', 'PB', -6.906000, -35.535000, '0'),
(258, 13, 'ETA', '', 'DESTERRO', 'DESTERRO', 'PB', 0.000000, 0.000000, '0'),
(259, 13, 'ETA', '', 'DIAMANTE', 'DIAMANTE', 'PB', 0.000000, 0.000000, '0'),
(260, 13, 'ETA', '', 'DUAS ESTRADAS', 'DUAS ESTRADAS', 'PB', -6.703000, -35.442001, '0'),
(261, 13, 'ETA', 'BORBOREMA', 'EB3 - MONTEIRO', 'MONTEIRO', 'PB', 0.000000, 0.000000, '0'),
(262, 13, 'ETA', '', 'EMAS', 'EMAS', 'PB', -7.097000, -37.715000, '0'),
(263, 13, 'ETA', 'BORBOREMA', 'ESPERANCA', 'ESPERANCA', 'PB', -7.034000, -35.859001, '0'),
(264, 13, 'ETA', 'LITORAL', 'ITABAIANA - NOVA ETA II', 'ITABAIANA', 'PB', -7.343000, -35.335999, '0'),
(265, 13, 'ETA', '', 'ITABAIANA - FORUM ETA III', 'ITABAIANA', 'PB', -7.317000, -35.341999, '0'),
(266, 13, 'ETA', '', 'ITABAIANA - VELHA ETA I', 'ITABAIANA', 'PB', -7.342000, -35.334999, '0'),
(267, 13, 'ETA', 'BORBOREMA', 'FAGUNDES', 'FAGUNDES', 'PB', -7.350000, -35.783001, '0'),
(268, 13, 'ETA', 'BORBOREMA', 'FREI MARTINHO', 'FREI MARTINHO', 'PB', 0.000000, 0.000000, '0'),
(269, 13, 'ETA', '', 'GADO BRAVO', 'GADO BRAVO', 'PB', 0.000000, 0.000000, '0'),
(270, 13, 'ETA', '', 'GRAMAME', 'JOAO PESSOA', 'PB', -7.228000, -34.919998, '0'),
(271, 13, 'ETA', '', 'GRAVATA', 'SAO JOAO DO RIO DO PEIXE', 'PB', -7.385000, -35.976002, '0'),
(272, 13, 'ETA', '', 'GUARABIRA', 'GUARABIRA', 'PB', 0.000000, 0.000000, '0'),
(273, 13, 'ETA', '', 'GURINHEM', 'GURINHEM', 'PB', 0.000000, 0.000000, '0'),
(274, 13, 'ETA', '', 'GURJAO', 'GURJAO', 'PB', -7.248000, -36.494999, '0'),
(275, 13, 'ETA', '', 'IBIARA', 'IBIARA', 'PB', 0.000000, 0.000000, '0'),
(276, 13, 'ETA', '', 'IGARACY', 'IGARACY', 'PB', -7.176000, -38.154999, '0'),
(277, 13, 'ETA', '', 'IMACULADA', 'IMACULADA', 'PB', 0.000000, 0.000000, '0'),
(278, 13, 'ETA', '', 'INGA', 'INGA', 'PB', 0.000000, 0.000000, '0'),
(279, 13, 'ETA', '', 'IPUEIRA', 'PAULISTA', 'PB', 0.000000, 0.000000, '0'),
(280, 13, 'ETA', '', 'ITAPORANGA ETA VELHA', 'ITAPORANGA', 'PB', -7.323000, -38.228001, '0'),
(281, 13, 'ETA', 'BORBOREMA', 'ITATUBA', 'ITATUBA', 'PB', -7.415000, -35.637001, '0'),
(282, 13, 'ETA', '', 'JACARAU', 'JACARAU', 'PB', -6.619000, -35.286999, '0'),
(283, 13, 'ETA', 'LITORAL', 'JACUMA', 'CONDE', 'PB', -7.286000, -34.805000, '0'),
(284, 13, 'ETA', '', 'JERICO', 'JERICO', 'PB', -6.550000, -37.800999, '0'),
(285, 13, 'ETA', 'BORBOREMA', 'JUAREZ TAVORA', 'JUAREZ TAVORA', 'PB', -7.166000, -35.592999, '0'),
(286, 13, 'ETA', 'BORBOREMA', 'JUAZEIRINHO', 'JUAZEIRINHO', 'PB', 0.000000, 0.000000, '0'),
(287, 13, 'ETA', '', 'JURIPIRANGA', 'JURIPIRANGA', 'PB', 0.000000, 0.000000, '0'),
(288, 13, 'ETA', 'ESPINHARAS', 'JURU', 'JURU', 'PB', 0.000000, 0.000000, '0'),
(289, 13, 'ETA', '', 'LAGOA DO MATO', 'REMIGIO', 'PB', 0.000000, 0.000000, '0'),
(290, 13, 'ETA', '', 'LAGOA SECA', 'LAGOA SECA', 'PB', 0.000000, 0.000000, '0'),
(291, 13, 'ETA', '', 'LIVRAMENTO', 'LIVRAMENTO', 'PB', 0.000000, 0.000000, '0'),
(292, 13, 'ETA', '', 'LUCENA', 'LUCENA', 'PB', -6.898000, -34.872002, '0'),
(293, 13, 'ETA', '', 'MALTA', 'MALTA', 'PB', 0.000000, 0.000000, '0'),
(294, 13, 'ETA', '', 'MALTA-CONDADO', 'CONDADO', 'PB', 0.000000, 0.000000, '0'),
(295, 13, 'ETA', '', 'MAMANGUAPE', 'MAMANGUAPE', 'PB', -6.837000, -35.132000, '0'),
(296, 13, 'ETA', '', 'MANAIRA', 'MANAIRA', 'PB', 0.000000, 0.000000, '0'),
(297, 13, 'ETA', '', 'MARES - JOAO PESSOA', 'JOAO PESSOA', 'PB', -7.153000, -34.910000, '0'),
(298, 13, 'ETA', '', 'MARI', 'MARI', 'PB', 0.000000, 0.000000, '0'),
(299, 13, 'ETA', '', 'MARIZOPOLIS', 'MARIZOPOLIS', 'PB', 0.000000, 0.000000, '0'),
(300, 13, 'ETA', '', 'MASSARANDUBA', 'MASSARANDUBA', 'PB', 0.000000, 0.000000, '0'),
(301, 13, 'ETA', '', 'MATINHAS', 'MATINHAS', 'PB', 0.000000, 0.000000, '0'),
(302, 13, 'ETA', '', 'MATO GROSSO', 'MATO GROSSO', 'PB', 0.000000, 0.000000, '0'),
(303, 13, 'ETA', '', 'MATUREIA', 'MATUREIA', 'PB', 0.000000, 0.000000, '0'),
(304, 13, 'ETA', '', 'MOGEIRO', 'MOGEIRO', 'PB', 0.000000, 0.000000, '0'),
(305, 13, 'ETA', '', 'MONTADAS', 'MONTADAS', 'PB', 0.000000, 0.000000, '0'),
(306, 13, 'ETA', '', 'MONTE HOREBE', 'MONTE HOREBE', 'PB', -7.213000, -38.587002, '0'),
(307, 13, 'ETA', 'BORBOREMA', 'MONTEIRO', 'MONTEIRO', 'PB', -7.913000, -37.109001, '0'),
(308, 13, 'ETA', '', 'MULUNGU', 'MULUNGU', 'PB', 0.000000, 0.000000, '0'),
(309, 13, 'ETA', '', 'NATUBA ETA NOVA', 'NATUBA', 'PB', -7.641000, -35.549000, '0'),
(310, 13, 'ETA', '', 'NAZAREZINHO', 'NAZAREZINHO', 'PB', 0.000000, 0.000000, '0'),
(311, 13, 'ETA', '', 'NOVA FLORESTA', 'NOVA FLORESTA', 'PB', 0.000000, 0.000000, '0'),
(312, 13, 'ETA', '', 'NOVA OLINDA', 'NOVA OLINDA', 'PB', -7.482000, -38.041000, '0'),
(313, 13, 'ETA', '', 'NOVA PALMEIRA', 'NOVA PALMEIRA', 'PB', 0.000000, 0.000000, '0'),
(314, 13, 'ETA', '', 'OLHO DAGUA', 'OLHO DAGUA', 'PB', -7.216000, -37.752998, '0'),
(315, 13, 'ETA', '', 'OURO VELHO', 'OURO VELHO', 'PB', 0.000000, 0.000000, '0'),
(316, 13, 'ETA', '', 'PATOS', 'PATOS', 'PB', -7.059000, -37.271999, '0'),
(317, 13, 'ETA', '', 'PAULISTA', 'PAULISTA', 'PB', -6.600000, -37.624001, '0'),
(318, 13, 'ETA', '', 'PEDRAS DE FOGO', 'PEDRAS DE FOGO', 'PB', -7.392000, -35.105000, '0'),
(319, 13, 'ETA', '', 'PEDRO VELHO', 'AROEIRAS', 'PB', 0.000000, 0.000000, '0'),
(320, 13, 'ETA', '', 'PIANCO', 'PIANCO', 'PB', -7.188000, -37.914001, '0'),
(321, 13, 'ETA', 'BORBOREMA', 'PICUI', 'PICUI', 'PB', 0.000000, 0.000000, '0'),
(322, 13, 'ETA', '', 'PILAR', 'PILAR', 'PB', 0.000000, 0.000000, '0'),
(323, 13, 'ETA', '', 'PILOES', 'PILOES', 'PB', 0.000000, 0.000000, '0'),
(324, 13, 'ETA', '', 'PIRPIRITUBA', 'PIRPIRITUBA', 'PB', 0.000000, 0.000000, '0'),
(325, 13, 'ETA', 'LITORAL', 'PITIMBU', 'PITIMBU', 'PB', -7.472000, -34.811001, '0'),
(326, 13, 'ETA', 'BORBOREMA', 'POCINHOS', 'POCINHOS', 'PB', 0.000000, 0.000000, '0'),
(327, 13, 'ETA', '', 'POMBAL', 'POMBAL', 'PB', -6.773000, -37.792999, '0'),
(328, 13, 'ETA', '', 'PRATA', 'PRATA', 'PB', 0.000000, 0.000000, '0'),
(329, 13, 'ETA', '', 'PRINCESA ISABEL', 'PRINCESA ISABEL', 'PB', -7.733000, -37.992001, '0'),
(330, 13, 'ETA', '', 'PUXINANA', 'PUXINANA', 'PB', 0.000000, 0.000000, '0'),
(331, 13, 'ETA', '', 'REMIGIO', 'REMIGIO', 'PB', 0.000000, 0.000000, '0'),
(332, 13, 'ETA', '', 'REMIGIO (Cepilho)', 'REMIGIO', 'PB', -6.988000, -35.775002, '0'),
(333, 13, 'ETA', '', 'RIACHO DOS CAVALOS', 'RIACHO DOS CAVALOS', 'PB', -6.432000, -37.651001, '0'),
(334, 13, 'ETA', '', 'RIACHO STO. ANTONIO', 'RIACHO DE SANTO ANTONIO', 'PB', 0.000000, 0.000000, '0'),
(335, 13, 'ETA', '', 'RIO TINTO', 'RIO TINTO', 'PB', 0.000000, 0.000000, '0'),
(336, 13, 'ETA', 'LITORAL', 'SALGADO DE SAO FELIX', 'SALGADO DE SAO FELIX', 'PB', -7.357000, -35.443001, '0'),
(337, 13, 'ETA', '', 'SANTA CRUZ', 'SANTA CRUZ', 'PB', -6.535000, -38.051998, '0'),
(338, 13, 'ETA', '', 'SANTA GERTRUDES', 'PATOS', 'PB', -6.948000, -37.396999, '0'),
(339, 13, 'ETA', '', 'SANTA HELENA', 'SANTA HELENA', 'PB', 0.000000, 0.000000, '0'),
(340, 13, 'ETA', '', 'SANTA LUZIA', 'SANTA LUZIA', 'PB', -6.864000, -36.917000, '0'),
(341, 13, 'ETA', 'LITORAL', 'SANTA RITA', 'SANTA RITA', 'PB', -7.140000, -34.983002, '0'),
(342, 13, 'ETA', '', 'SANTA TEREZINHA', 'SANTA TERESINHA', 'PB', -7.085000, -37.445999, '0'),
(343, 13, 'ETA', '', 'SANTANA DE MANGUEIRA', 'SANTANA DE MANGUEIRA', 'PB', 0.000000, 0.000000, '0'),
(344, 13, 'ETA', '', 'SANTANA DOS GARROTES', 'SANTANA DOS GARROTES', 'PB', -7.390000, -37.987000, '0'),
(345, 13, 'ETA', '', 'SAO BENTINHO', 'SAO BENTINHO', 'PB', -6.892000, -37.729000, '0'),
(346, 13, 'ETA', '', 'SAO BENTO', 'SAO BENTO', 'PB', -6.494000, -37.449001, '0'),
(347, 13, 'ETA', '', 'SAO DOMINGOS', 'SAO DOMINGOS DO CARIRI', 'PB', 0.000000, 0.000000, '0'),
(348, 13, 'ETA', '', 'SAO GONCALO', 'SOUSA', 'PB', -6.846000, -38.325001, '0'),
(349, 13, 'ETA', '', 'SAO JOAO DO CARIRI', 'SAO JOAO DO CARIRI', 'PB', 0.000000, 0.000000, '0'),
(350, 13, 'ETA', '', 'SAO JOAO DO RIO DO PEIXE', 'SAO JOAO DO RIO DO PEIXE', 'PB', 0.000000, 0.000000, '0'),
(351, 13, 'ETA', '', 'SAO JOSE DA LAGOA TAPADA', 'SAO JOSE DA LAGOA TAPADA', 'PB', -6.944000, -38.162998, '0'),
(352, 13, 'ETA', '', 'SAO JOSE DE CAIANA', 'SAO JOSE DE CAIANA', 'PB', -7.252000, -38.299000, '0'),
(353, 13, 'ETA', '', 'SAO JOSE DE ESPINHARAS', 'SAO JOSE DE ESPINHARAS', 'PB', -6.842000, -37.321999, '0'),
(354, 13, 'ETA', '', 'SAO JOSE DO BOMFIM', 'SAO JOSE DO BONFIM', 'PB', -7.075000, -37.286999, '0'),
(355, 13, 'ETA', '', 'SAO JOSE DO SABUGI', 'SAO JOSE DO SABUGI', 'PB', -6.783000, -36.791000, '0'),
(356, 13, 'ETA', '', 'SAO JOSE DOS CORDEIROS', 'SAO JOSE DOS CORDEIROS', 'PB', 0.000000, 0.000000, '0'),
(357, 13, 'ETA', '', 'SAO JOSE PIRANHAS', 'SAO JOSE DE ESPINHARAS', 'PB', -7.124000, -38.500000, '0'),
(358, 13, 'ETA', '', 'SAO MAMEDE', 'SAO MAMEDE', 'PB', 0.000000, 0.000000, '0'),
(359, 13, 'ETA', '', 'SAO MIGUEL', 'SAO MIGUEL DE TAIPU', 'PB', 0.000000, 0.000000, '0'),
(360, 13, 'ETA', 'BORBOREMA', 'SAO SEBASTIAO DE LAGOA DE ROCA', 'SAO SEBASTIAO DE LAGOA DE ROCA', 'PB', -7.106000, -35.868000, '0'),
(361, 13, 'ETA', '', 'SAPE', 'SAPE', 'PB', -7.091000, -35.228001, '0'),
(362, 13, 'ETA', '', 'SERRA BRANCA', 'SERRA BRANCA', 'PB', 0.000000, 0.000000, '0'),
(363, 13, 'ETA', '', 'SERRA GRANDE', 'SERRA GRANDE', 'PB', 0.000000, 0.000000, '0'),
(364, 13, 'ETA', '', 'SERRA REDONDA', 'SERRA REDONDA', 'PB', 0.000000, 0.000000, '0'),
(365, 13, 'ETA', '', 'SERRARIA', 'SERRARIA', 'PB', -6.815000, -35.639000, '0'),
(366, 13, 'ETA', '', 'SOLANEA', 'SOLANEA', 'PB', -6.758000, -35.650002, '0'),
(367, 13, 'ETA', '', 'SOUSA', 'SOUSA', 'PB', 0.000000, 0.000000, '0'),
(368, 13, 'ETA', 'BORBOREMA', 'SUME - ETA VELHA', 'SUME', 'PB', 0.000000, 0.000000, '0'),
(369, 13, 'ETA', 'BORBOREMA', 'SUME-ADUTORA DO CONGO EB II', 'SUME', 'PB', -7.681000, -36.875999, '0'),
(370, 13, 'ETA', 'ESPINHARAS', 'TAPEROA', 'TAPEROA', 'PB', -7.216000, -36.826000, '0'),
(371, 13, 'ETA', '', 'TAVARES', 'TAVARES', 'PB', 0.000000, 0.000000, '0'),
(372, 13, 'ETA', '', 'TEIXEIRA', 'TEIXEIRA', 'PB', 0.000000, 0.000000, '0'),
(373, 13, 'ETA', '', 'TRIUNFO', 'TRIUNFO', 'PB', -6.580000, -38.601002, '0'),
(374, 13, 'ETA', '', 'UIRAUNA', 'UIRAUNA', 'PB', -6.512000, -38.414001, '0'),
(375, 13, 'ETA', '', 'UIRAUNA - CAPIVARA', 'UIRAUNA', 'PB', -6.542000, -38.465000, '0'),
(376, 13, 'ETA', 'BORBOREMA', 'UMBUZEIRO ETA VELHA', 'UMBUZEIRO', 'PB', -7.712000, -35.650002, '0'),
(377, 13, 'ETA', '', 'VARZEA', 'VARZEA', 'PB', -6.772000, -36.990002, '0'),
(378, 13, 'ETA', '', 'VISTA SERRANA', 'VISTA SERRANA', 'PB', -6.682000, -37.584999, '0'),
(379, 14, 'ETA', 'SERTAO', 'AGUA BRANCA - EE5', 'AGUA BRANCA', 'AL', -9.262000, -37.935001, '0'),
(380, 14, 'ETA', 'SERRANA', 'ANADIA', 'ANADIA', 'AL', -9.678000, -36.325001, '0'),
(381, 14, 'ETA', 'LESTE', 'BARRA DE SAO MIGUEL', 'BARRA DE SAO MIGUEL', 'AL', -9.829000, -35.903000, '0'),
(382, 14, 'ETA', 'BACIA', 'BATALHA', 'BATALHA', 'AL', -9.673000, -37.132000, '0'),
(383, 14, 'ETA', 'SERRANA', 'CAPELA', 'CAPELA', 'AL', -9.415000, -36.080002, '0'),
(384, 14, 'ETA', 'SERTAO', 'DELMIRO GOUVEIA - BARRAGEM LESTE', 'DELMIRO GOUVEIA', 'AL', -9.368000, -38.188999, '0'),
(385, 14, 'ETA', 'SERTAO', 'DELMIRO GOUVEIA - EE3', 'DELMIRO GOUVEIA', 'AL', -9.392000, -38.011002, '0'),
(386, 14, 'ETA', 'SERRANA', 'ESTRELA DE ALAGOAS', 'ESTRELA DE ALAGOAS', 'AL', -9.389000, -36.763000, '0'),
(387, 14, 'ETA', 'LESTE', 'FLEXEIRAS', 'FLEXEIRAS', 'AL', -9.280000, -35.721001, '0'),
(388, 14, 'ETA', 'LESTE', 'JOAQUIM GOMES', 'JOAQUIM GOMES', 'AL', -9.132000, -35.749001, '0'),
(389, 14, 'ETA', 'AGRESTE', 'JUNQUEIRO', 'CAJUEIRO', 'AL', -9.905000, -36.469002, '0'),
(390, 14, 'ETA', 'MACEIO', 'MACEIO - AVIACAO', 'MACEIO', 'AL', 0.000000, 0.000000, '0'),
(391, 14, 'ETA', 'MACEIO', 'MACEIO - CARDOSO', 'MACEIO', 'AL', -9.623000, -35.745998, '0'),
(392, 14, 'ETA', 'LESTE', 'MURICI - CACHOEIRA', 'MURICI', 'AL', 0.000000, 0.000000, '0'),
(393, 14, 'ETA', 'LESTE', 'MURICI - CANSANCAO', 'MURICI', 'AL', -9.319000, -35.950001, '0'),
(394, 14, 'ETA', 'LESTE', 'NOVO LINO', 'NOVO LINO', 'AL', -8.944000, -35.661999, '0'),
(395, 14, 'ETA', 'SERTAO', 'OLHO DAGUA DO CASADO', 'OLHO DAGUA DO CASADO', 'AL', -9.469000, -37.844002, '0'),
(396, 14, 'ETA', 'SERRANA', 'PALMEIRA DOS INDIOS', 'PALMEIRA DOS INDIOS', 'AL', -9.402000, -36.629002, '0'),
(397, 14, 'ETA', 'BACIA', 'PAO DE ACUCAR', 'PAO DE ACUCAR', 'AL', -9.705000, -37.415001, '0'),
(398, 14, 'ETA', 'SERRANA', 'PAULO JACINTO', 'PAULO JACINTO', 'AL', -9.359000, -36.365002, '0'),
(399, 14, 'ETA', 'AGRESTE', 'PIACABUCU', 'PIACABUCU', 'AL', -10.405000, -36.429001, '0'),
(400, 14, 'ETA', 'SERTAO', 'PIRANHAS', 'PIRANHAS', 'AL', -9.597000, -37.773998, '0'),
(401, 14, 'ETA', 'MACEIO', 'PRATAGY', 'MACEIO', 'AL', -9.558000, -35.737000, '0'),
(402, 14, 'ETA', 'SERRANA', 'QUEBRANGULO', 'QUEBRANGULO', 'AL', -9.315000, -36.473999, '0'),
(403, 14, 'ETA', 'SERRANA', 'QUEBRANGULO - CACAMBAS', 'QUEBRANGULO', 'AL', -9.303000, -36.478001, '0'),
(404, 14, 'ETA', 'LESTE', 'RIO LARGO - MATA DO ROLO', 'RIO LARGO', 'AL', -9.481000, -35.840000, '0'),
(405, 14, 'ETA', 'LESTE', 'RIO LARGO - TABULEIRO DO PINTO', 'RIO LARGO', 'AL', -9.505000, -35.812000, '0'),
(406, 14, 'ETA', 'LESTE', 'SATUBA', 'SATUBA', 'AL', -9.559000, -35.819000, '0'),
(407, 14, 'ETA', 'AGRESTE', 'TRAIPU', 'TRAIPU', 'AL', -9.962000, -36.997002, '0'),
(408, 17, 'ETA', '', '40 HORAS SABIA', 'ANANINDEUA', 'PA', 0.000000, 0.000000, '0'),
(409, 17, 'ETA', '', '5 SETOR', 'BELEM', 'PA', -1.427000, -48.456001, '0'),
(410, 17, 'ETA', '', 'ABAETETUBA', 'ABAETETUBA', 'PA', -1.721000, -48.882000, '0'),
(411, 17, 'ETA', '', 'ABAETETUBA ALGODOAL', 'ABAETETUBA', 'PA', 0.000000, 0.000000, '0'),
(412, 17, 'ETA', '', 'AFUA', 'AFUA', 'PA', 0.000000, 0.000000, '0'),
(413, 17, 'ETA', '', 'ALENQUER', 'ALENQUER', 'PA', 0.000000, 0.000000, '0'),
(414, 17, 'ETA', '', 'ALTAMIRA', 'ALTAMIRA', 'PA', 0.000000, 0.000000, '0'),
(415, 17, 'ETA', '', 'ANAJAS', 'ANAJAS', 'PA', 0.000000, 0.000000, '0'),
(416, 17, 'ETA', '', 'ANANINDEUA - CENTRO', 'ANANINDEUA', 'PA', -1.353000, -48.373001, '0'),
(417, 17, 'ETA', '', 'ARIRI 1', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(418, 17, 'ETA', '', 'ARIRI 2', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(419, 17, 'ETA', '', 'ARIRI-BOLONHA', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(420, 17, 'ETA', '', 'AUGUSTO CORREIA', 'AUGUSTO CORREA', 'PA', 0.000000, 0.000000, '0'),
(421, 17, 'ETA', 'METROPOLITANA', 'BELEM - BEJAMIM SODRE P5/ P8', 'BELEM', 'PA', -1.358000, -48.446999, '0'),
(422, 17, 'ETA', '', 'BENGUI', 'BELEM', 'PA', -1.375000, -48.442001, '0'),
(423, 17, 'ETA', '', 'BOLONHA', 'BELEM', 'PA', -1.418000, -48.438999, '0'),
(424, 17, 'ETA', '', 'BRAGANCA - CHUMUCUI', 'BRAGANCA', 'PA', -1.095000, -46.792000, '0'),
(425, 17, 'ETA', '', 'BREU BRANCO', 'BREU BRANCO', 'PA', 0.000000, 0.000000, '0'),
(426, 17, 'ETA', '', 'BREVES', 'BREVES', 'PA', -1.686000, -50.483002, '0'),
(427, 17, 'ETA', '', 'CACHOEIRA DOA ARARI', 'CACHOEIRA DO ARARI', 'PA', 0.000000, 0.000000, '0'),
(428, 17, 'ETA', 'METROPOLITANA', 'CANARINHO', 'BELEM', 'PA', -1.336000, -48.456001, '0'),
(429, 17, 'ETA', '', 'CAPANEMA - VILA TAUARI', 'CAPANEMA', 'PA', -1.123000, -47.058998, '0'),
(430, 17, 'ETA', '', 'CAPITAO POCO', 'CAPITAO POCO', 'PA', 0.000000, 0.000000, '0'),
(431, 17, 'ETA', '', 'CASTANHAL', 'CASTANHAL', 'PA', 0.000000, 0.000000, '0'),
(432, 17, 'ETA', 'BAIXO AMAZONAS', 'CASTANHAL - CAICARA', 'CASTANHAL', 'PA', -1.316000, -47.896000, '0'),
(433, 17, 'ETA', '', 'CATALINA', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(434, 17, 'ETA', '', 'CDP', 'BELEM', 'PA', -1.402000, -48.480999, '0'),
(435, 17, 'ETA', '', 'CHEGUEVARA', 'MARITUBA', 'PA', -1.368000, -48.308998, '0'),
(436, 17, 'ETA', '', 'CIDADE NOVA ( ANANINDEUA )', 'ANANINDEUA', 'PA', -1.336000, -48.382999, '0'),
(437, 17, 'ETA', '', 'COHAB', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(438, 17, 'ETA', '', 'CASTANHAL - COMANDANTE ASSIS', 'CASTANHAL', 'PA', -1.290000, -47.931999, '0'),
(439, 17, 'ETA', '', 'CONCEICAO DO ARAGUAIA', 'CONCEICAO DO ARAGUAIA', 'PA', -8.283000, -49.264000, '0'),
(440, 17, 'ETA', '', 'CONJUNTO MAGUARI', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(441, 17, 'ETA', '', 'COQUEIRO', 'BELEM', 'PA', -1.370000, -48.429001, '0'),
(442, 17, 'ETA', '', 'CORDEIRO DE FARIAS I', 'BELEM', 'PA', -1.350000, -48.464001, '0'),
(443, 17, 'ETA', '', 'CORDEIRO DE FARIAS II', 'BELEM', 'PA', -1.350000, -48.464001, '0'),
(444, 17, 'ETA', '', 'DOM ELISEU', 'DOM ELISEU', 'PA', -4.247000, -47.561001, '0'),
(445, 17, 'ETA', '', 'FARO', 'FARO', 'PA', 0.000000, 0.000000, '0'),
(446, 17, 'ETA', '', 'GUANABARA I', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(447, 17, 'ETA', '', 'GUANABARA II', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(448, 17, 'ETA', '', 'IGARAPE - MIRI C. NOVA', 'IGARAPE-MIRI', 'PA', 0.000000, 0.000000, '1'),
(449, 17, 'ETA', '', 'IGARAPE - MIRI ESCRITORIO', 'IGARAPE-MIRI', 'PA', 0.000000, 0.000000, '1'),
(450, 17, 'ETA', '', 'IGARAPE - MIRI ESTACAO', 'IGARAPE-MIRI', 'PA', -1.980000, -48.964001, '0'),
(451, 17, 'ETA', '', 'INHANGAPI', 'INHANGAPI', 'PA', 0.000000, 0.000000, '0'),
(452, 17, 'ETA', '', 'ITAITUBA', 'ITAITUBA', 'PA', -4.276000, -55.986000, '0'),
(453, 17, 'ETA', '', 'ITUPIRANGA', 'ITUPIRANGA', 'PA', 0.000000, 0.000000, '0'),
(454, 17, 'ETA', '', 'JACUNDA', 'JACUNDA', 'PA', 0.000000, 0.000000, '0'),
(455, 17, 'ETA', '', 'JADERLANDIA', 'BELEM', 'PA', -1.303000, -47.895000, '0'),
(456, 17, 'ETA', '', 'JURUTI', 'JURUTI', 'PA', 0.000000, 0.000000, '0'),
(457, 17, 'ETA', '', 'LIMOEIRO DO AJURU', 'LIMOEIRO DO AJURU', 'PA', 0.000000, 0.000000, '0'),
(458, 17, 'ETA', '', 'MAGALHAES BARATA', 'MAGALHAES BARATA', 'PA', 0.000000, 0.000000, '0'),
(459, 17, 'ETA', '', 'MAGUARI', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(460, 17, 'ETA', '', 'MAIUATA', 'IGARAPE-MIRI', 'PA', 0.000000, 0.000000, '0'),
(461, 17, 'ETA', '', 'MARABA CIDADE NOVA', 'MARABA', 'PA', 0.000000, 0.000000, '0'),
(462, 17, 'ETA', '', 'MARABA NOVA', 'MARABA', 'PA', -5.326000, -49.077000, '0'),
(463, 17, 'ETA', '', 'MARABA PIONEIRA', 'MARABA', 'PA', -5.339000, -49.124001, '0'),
(464, 17, 'ETA', '', 'MARAPANIN', 'MARAPANIM', 'PA', 0.000000, 0.000000, '0'),
(465, 17, 'ETA', '', 'MARITUBA BEIJA FLOR', 'MARITUBA', 'PA', 0.000000, 0.000000, '0'),
(466, 17, 'ETA', '', 'MARITUBA CENTRO', 'MARITUBA', 'PA', 0.000000, 0.000000, '0'),
(467, 17, 'ETA', '', 'MARITUBA COHAB', 'MARITUBA', 'PA', 0.000000, 0.000000, '0'),
(468, 17, 'ETA', '', 'MARUDA', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(469, 17, 'ETA', '', 'CASTANHAL - MILAGRE', 'CASTANHAL', 'PA', -1.304000, -47.908001, '0'),
(470, 17, 'ETA', '', 'MOCAJUBA', 'MOCAJUBA', 'PA', -2.585000, -49.509998, '0'),
(471, 17, 'ETA', '', 'MOJU', 'MOJU', 'PA', 0.000000, 0.000000, '0'),
(472, 17, 'ETA', '', 'MONTE ALEGRE', 'MONTE ALEGRE', 'PA', -1.994000, -54.055000, '0'),
(473, 17, 'ETA', '', 'MOSQUEIRO - BAIA DO SOL', 'BELEM', 'PA', -1.065000, -48.334999, '0'),
(474, 17, 'ETA', 'NORDESTE', 'NOVA TIMBOTEUA - ESCRITORIO', 'NOVA TIMBOTEUA', 'PA', -1.206000, -47.386002, '0'),
(475, 17, 'ETA', '', 'NOVO REPARTIMENTO', 'NOVO REPARTIMENTO', 'PA', -4.248000, -49.956001, '0'),
(476, 17, 'ETA', '', 'OBIDOS', 'OBIDOS', 'PA', -1.900000, -55.507999, '0'),
(477, 17, 'ETA', '', 'OEIRA DO PARA', 'OEIRAS DO PARA', 'PA', 0.000000, 0.000000, '0'),
(478, 17, 'ETA', 'BAIXO AMAZONAS', 'ORIXIMINA', 'ORIXIMINA', 'PA', -1.763000, -55.866001, '0'),
(479, 17, 'ETA', '', 'OUREM', 'OUREM', 'PA', 0.000000, 0.000000, '0'),
(480, 17, 'ETA', '', 'PAAR', 'BELEM', 'PA', -1.336000, -48.382999, '0'),
(481, 17, 'ETA', '', 'PANORAMA XXI', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(482, 17, 'ETA', 'NORDESTE', 'PEIXE BOI', 'PEIXE-BOI', 'PA', -1.188000, -47.316002, '0'),
(483, 17, 'ETA', '', 'PONTA DE PEDRAS', 'PONTA DE PEDRAS', 'PA', 0.000000, 0.000000, '0'),
(484, 17, 'ETA', '', 'PORTEL', 'PORTEL', 'PA', 0.000000, 0.000000, '0'),
(485, 17, 'ETA', '', 'PRAINHA', 'PRAINHA', 'PA', 0.000000, 0.000000, '0'),
(486, 17, 'ETA', '', 'PRATINHA', 'BELEM', 'PA', -1.376000, -48.480000, '0'),
(487, 17, 'ETA', '', 'R6', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(488, 17, 'ETA', '', 'SALGADO GRANDE', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(489, 17, 'ETA', '', 'SALINOPOLIS - ESCRITORIO ', 'SALINOPOLIS', 'PA', -0.621626, -47.354000, '0'),
(490, 17, 'ETA', '', 'SALVA TERRA', 'SALVATERRA', 'PA', 0.000000, 0.000000, '0'),
(491, 17, 'ETA', '', 'SANTA CRUZ DO ARARI', 'SANTA CRUZ DO ARARI', 'PA', 0.000000, 0.000000, '0'),
(492, 17, 'ETA', '', 'SANTA LUZIA DO PARA', 'SANTA LUZIA DO PARA', 'PA', 0.000000, 0.000000, '0'),
(493, 17, 'ETA', '', 'SANTA MARIA DAS BARREIRAS', 'SANTA MARIA DAS BARREIRAS', 'PA', 0.000000, 0.000000, '0'),
(494, 17, 'ETA', '', 'SANTA MARIA DO PARA - POCO SANTA ROSA', 'SANTA MARIA DO PARA', 'PA', -1.357000, -47.568001, '0'),
(495, 17, 'ETA', 'BAIXO AMAZONAS', 'SANTAREM', 'SANTAREM', 'PA', -2.443000, -54.730999, '0'),
(496, 17, 'ETA', '', 'SAO BRAS', 'BELEM', 'PA', -1.449000, -48.469002, '0'),
(497, 17, 'ETA', '', 'SAO CAETANO DE ODOVELAS', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(498, 17, 'ETA', '', 'SAO FELIX DO XINGU', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(499, 17, 'ETA', '', 'SAO FRANCISCO DO PARA', 'BELEM', 'PA', -1.175000, -47.803001, '0'),
(500, 17, 'ETA', '', 'SATELITE', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(501, 17, 'ETA', '', 'SIDERAL', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(502, 17, 'ETA', '', 'SOURE', 'SOURE', 'PA', 0.000000, 0.000000, '0'),
(503, 17, 'ETA', '', 'TAILANDIA', 'TAILANDIA', 'PA', -2.948000, -48.953999, '0'),
(504, 17, 'ETA', '', 'TANGARAS', 'BELEM', 'PA', -1.276000, -47.953999, '0'),
(505, 17, 'ETA', '', 'TENONE', 'BELEM', 'PA', 0.000000, 0.000000, '0'),
(506, 17, 'ETA', '', 'TERRA SANTA', 'TERRA SANTA', 'PA', 0.000000, 0.000000, '0'),
(507, 17, 'ETA', '', 'TRACUATEUA', 'TRACUATEUA', 'PA', 0.000000, 0.000000, '0'),
(508, 17, 'ETA', '', 'UIRAPURU', 'ANANINDEUA', 'PA', -1.327000, -48.398998, '0'),
(509, 17, 'ETA', '', 'CASTANHAL - USINA', 'CASTANHAL', 'PA', -1.295000, -47.930000, '0'),
(510, 17, 'ETA', '', 'VERDEJANTE', 'BELEM', 'PA', -1.410000, -48.394001, '0'),
(511, 17, 'ETA', '', 'VIGIA DE NAZARE', 'VIGIA', 'PA', 0.000000, 0.000000, '0'),
(512, 17, 'ETA', '', 'VILA CAFEZAL', 'MAGALHAES BARATA', 'PA', 0.000000, 0.000000, '0'),
(513, 17, 'ETA', '', 'VILA CUIARANA - SALINOPOLIS', 'SALINOPOLIS', 'PA', -0.650630, -47.264999, '0'),
(514, 17, 'ETA', '', 'VILA DE BEJA', 'ABAETETUBA', 'PA', 0.000000, 0.000000, '0'),
(515, 17, 'ETA', '', 'CASTANHAL - VILA DO APEU', 'CASTANHAL', 'PA', -1.299000, -47.988998, '0'),
(516, 17, 'ETA', '', 'VILA FATIMA', 'TRACUATEUA', 'PA', 0.000000, 0.000000, '0'),
(517, 17, 'ETA', '', 'VILA MAUIATA', 'IGARAPE-MIRI', 'PA', 0.000000, 0.000000, '0'),
(518, 17, 'ETA', '', 'VILA TAUARI', 'CAPANEMA', 'PA', 0.000000, 0.000000, '0'),
(519, 17, 'ETA', '', 'VISEU', 'VISEU', 'PA', 0.000000, 0.000000, '0'),
(520, 18, 'ETA', '', 'ETA II - NOVA', 'VARZEA GRANDE', 'MT', -15.640000, -56.168999, '0'),
(521, 18, 'ETA', '', 'ETA I VELHA', 'VARZEA GRANDE', 'MT', -15.642000, -56.129002, '0'),
(522, 19, 'ETA', '', 'RIO BRANCO - SOBRAL', 'RIO BRANCO', 'AC', -10.004000, -67.842003, '0'),
(523, 20, 'ETA', '', 'ETA CAJAIBA - ITABAIANA', 'ITABAIANA', 'SE', -10.800000, -37.431000, '0'),
(524, 20, 'ETA', '', 'AREIA BRANCA', 'AREIA BRANCA', 'SE', -10.759000, -37.318001, '0'),
(525, 20, 'ETA', '', 'LAGARTO', 'LAGARTO', 'SE', -10.919000, -37.662998, '0'),
(526, 20, 'ETA', '', 'TOBIAS BARRETO', 'TOBIAS BARRETO', 'SE', -11.183000, -37.998001, '0'),
(527, 21, 'ETA', '', 'PETROLINA', 'PETROLINA', 'PE', -9.395000, -40.528999, '0'),
(528, 22, 'ETA', '', 'BACABAL', 'BACABAL', 'MA', -4.234000, -44.778000, '0'),
(529, 23, 'ETA', 'CAXIAS', 'CAXIAS - ETA POINT', 'CAXIAS', 'MA', -4.885000, -43.381001, '0'),
(530, 23, 'ETA', 'CAXIAS', 'CAXIAS - ETA VOLTA REDONDA', 'CAXIAS', 'MA', -4.883000, -43.354000, '0'),
(531, 26, 'ETA', '', 'PETROLINA', 'PETROLINA', 'PE', -9.395000, -40.529999, '0'),
(532, 27, 'ETA', '', 'CAMPUS - NATAL UFRN', 'NATAL', 'RN', -5.837000, -35.202000, '0'),
(533, 11, 'ETA', '', 'CAJUPIRANGA  - P68', 'PARNAMIRIM', 'RN', 0.000000, 0.000000, '0'),
(536, 28, 'ETA', '', 'BRASIL KIRIN IGARASSU', 'IGARASSU', 'PE', -7.797000, -34.928001, '0'),
(535, 24, 'ETA', '', 'ITAPISSUMA', 'ITAPISSUMA', 'PE', -7.799000, -34.924999, '0'),
(537, 26, 'ETA', '', 'ARAPIRACA', 'ARAPIRACA', 'AL', -9.785000, -36.654999, '0'),
(538, 11, 'ETA', '', 'SAO JOSE DO SERIDO', 'SAO JOSE DO SERIDO', 'RN', -6.450000, -36.875999, '0'),
(539, 14, 'ETA', '', 'ALTO SERTAO - AGUA BRANCA', 'AGUA BRANCA', 'AL', -9.314000, -37.980999, '0'),
(540, 3, 'ETA', '', 'ITAPISSUMA - XAROPARIA', 'ITAPISSUMA', 'PE', -7.751000, -34.924000, '0'),
(542, 3, 'ETA', '', 'ITAPISSUMA - ETA/ETEI', 'ITAPISSUMA', 'PE', -7.751000, -34.924000, '0'),
(543, 14, 'ETA', '', 'ALTO SERTAO(ETA NOVA)', 'DELMIRO GOUVEIA', 'AL', -9.314000, -37.980999, '0'),
(544, 11, 'ETA', '', 'JARDIM DE PIRANHAS - MANOEL TORRES EB1', 'JARDIM DE PIRANHAS', 'RN', -6.377000, -37.353001, '0'),
(545, 16, 'ETA', 'CPR Norte', 'BOTAFOGO', 'IGARASSU', 'PE', -7.852000, -34.938000, '0'),
(547, 16, 'ETA', 'CPR Norte', 'BOTAFOGO', 'IGARASSU', 'PE', -7.852000, -34.938000, '0'),
(548, 16, 'ETA', 'CPR Norte', 'ARACOIABA', 'ARACOIABA', 'PE', -7.788000, -35.091999, '0'),
(549, 16, 'ETA', 'CPR Norte', 'GOIANA', 'GOIANA', 'PE', -7.531000, -34.995998, '0'),
(550, 16, 'ETA', 'CPR Leste', 'ALTO DO CEU', 'RECIFE', 'PE', -8.014000, -34.890999, '0'),
(551, 16, 'ETA', 'CPR Leste', 'CAIXA DAGUA', 'RECIFE', 'PE', -7.995000, -34.904999, '0'),
(552, 16, 'ETA', 'CPR Leste', 'VERA CRUZ', 'CAMARAGIBE', 'PE', -7.954000, -35.007999, '0'),
(553, 16, 'ETA', 'CPR Leste', 'GUABIRABA - POCOS', 'RECIFE', 'PE', 0.000000, 0.000000, '0'),
(554, 16, 'ETA', 'CPR Leste', 'DOIS IRMAOS EE', 'RECIFE', 'PE', -8.015000, -34.944000, '0'),
(555, 16, 'ETA', 'CPR Leste', 'MACACOS EE', 'RECIFE', 'PE', -8.015000, -34.946999, '0'),
(556, 16, 'ETA', 'CPR Oeste', 'TAPACURA', 'RECIFE', 'PE', -8.078000, -34.988998, '0'),
(557, 16, 'ETA', 'CPR Oeste', 'VARZEA DO UNA', 'CAMARAGIBE', 'PE', -7.997000, -35.044998, '0'),
(558, 16, 'ETA', 'CPR Oeste', 'MANOEL DE SENA', 'JABOATAO DOS GUARARAPES', 'PE', -8.106000, -35.014999, '0'),
(559, 16, 'ETA', 'CPR Oeste', 'MORENO', 'MORENO', 'PE', -8.115000, -35.116001, '0'),
(560, 16, 'ETA', 'CPR Oeste', 'Parque CAPIBARIBE', 'SAO LOURENCO DA MATA', 'PE', 0.000000, 0.000000, '0'),
(561, 16, 'ETA', 'CPR Oeste', 'BONANCA', 'MORENO', 'PE', -8.112000, -35.188000, '0'),
(562, 16, 'ETA', 'CPR Oeste', 'MATRIZ DA LUZ', 'SAO LOURENCO DA MATA', 'PE', -8.037000, -35.099998, '0'),
(563, 16, 'ETA', 'CPR Sul', 'SUAPE', 'IPOJUCA', 'PE', -8.367000, -35.018002, '0'),
(564, 16, 'ETA', 'CPR Sul', 'PORTO DE GALINHAS', 'IPOJUCA', 'PE', -8.505000, -35.023998, '0'),
(565, 16, 'ETA', 'CPR Sul', 'IPOJUCA', 'IPOJUCA', 'PE', -8.396000, -35.062000, '0'),
(566, 16, 'ETA', 'CPR Sul', 'CAMELA', 'IPOJUCA', 'PE', -8.509000, -35.122002, '0'),
(567, 16, 'ETA', 'CPP', 'MARCOS FREIRE - CAPTACAO', 'JABOATAO DOS GUARARAPES', 'PE', -8.159000, -34.979000, '0'),
(568, 16, 'ETA', 'CPP', 'MARCOS FREIRE - CONV. E COMP.', 'JABOATAO DOS GUARARAPES', 'PE', -8.132000, -34.973999, '0'),
(569, 16, 'ETA', 'CPP', 'CHARNECA', 'CABO DE SANTO AGOSTINHO', 'PE', -8.296000, -35.062000, '0'),
(570, 16, 'ETA', 'CPP', 'MURIBEQUINHA - CAPTACAO', 'JABOATAO DOS GUARARAPES', 'PE', -8.166000, -35.007000, '0'),
(571, 16, 'ETA', 'CPP', 'MURIBEQUINHA - ETA', 'JABOATAO DOS GUARARAPES', 'PE', -8.172000, -34.999001, '0'),
(572, 16, 'ETA', 'CPP', 'PIRAPAMA - CABO', 'CABO DE SANTO AGOSTINHO', 'PE', -8.267000, -35.049999, '0'),
(573, 16, 'ETA', 'CPP', 'GURJAU / MATAPAGIPE', 'CABO DE SANTO AGOSTINHO', 'PE', -8.267000, -35.048000, '0'),
(574, 16, 'ETA', 'MATA SUL', 'TAMANDARE - VELHA', 'TAMANDARE', 'PE', 0.000000, 0.000000, '0'),
(575, 16, 'ETA', 'MATA SUL', 'TAMANDARE - NOVA - RIO FORMOSO', 'TAMANDARE', 'PE', 0.000000, 0.000000, '0'),
(576, 16, 'ETA', 'MATA SUL', 'RIO FORMOSO', 'RIO FORMOSO', 'PE', 0.000000, 0.000000, '0'),
(577, 16, 'ETA', 'MATA SUL', 'SIRINHAEM - Captacao', 'SIRINHAEM', 'PE', 0.000000, 0.000000, '0'),
(578, 16, 'ETA', 'MATA SUL', 'SIRINHAEM - ETA', 'SIRINHAEM', 'PE', 0.000000, 0.000000, '0'),
(579, 16, 'ETA', 'MATA SUL', 'VITORIA DE SANTO ANTAO', 'VITORIA DE SANTO ANTAO', 'PE', -8.116000, -35.300999, '0'),
(580, 16, 'ETA', 'MATA SUL', 'BARREIROS', 'BARREIROS', 'PE', 0.000000, 0.000000, '0'),
(581, 16, 'ETA', 'MATA SUL', 'SAO JOSE DA COROA GRANDE', 'SAO JOSE DA COROA GRANDE', 'PE', 0.000000, 0.000000, '0'),
(582, 16, 'ETA', 'MATA SUL', 'CUCAU', 'RIO FORMOSO', 'PE', -8.631000, -35.265999, '0'),
(583, 16, 'ETA', 'MATA SUL', 'GLORIA DO GOITA', 'GLORIA DO GOITA', 'PE', -8.005000, -35.291000, '0'),
(584, 16, 'ETA', 'MATA SUL', 'JOAQUIM NABUCO', 'JOAQUIM NABUCO', 'PE', -8.630000, -35.532001, '0'),
(585, 16, 'ETA', 'MATA SUL', 'PRIMAVERA', 'PRIMAVERA', 'PE', 0.000000, 0.000000, '0'),
(586, 16, 'ETA', 'MATA SUL', 'SANTO AMARO', 'RECIFE', 'PE', 0.000000, 0.000000, '0'),
(587, 16, 'ETA', 'MATA SUL', 'RIBEIRAO', 'RIBEIRAO', 'PE', -8.507000, -35.384998, '0'),
(588, 16, 'ETA', 'MATA SUL', 'ESCADA', 'ESCADA', 'PE', 0.000000, 0.000000, '0'),
(589, 16, 'ETA', 'MATA SUL', 'FREXEIRAS', 'ESCADA', 'PE', 0.000000, 0.000000, '0');
INSERT INTO `tb_locais` (`id`, `loja`, `tipo`, `regional`, `name`, `municipio`, `uf`, `latitude`, `longitude`, `ativo`) VALUES
(590, 16, 'ETA', 'MATA SUL', 'SAUE', 'TAMANDARE', 'PE', -8.768000, -35.318001, '0'),
(591, 16, 'ETA', 'MATA NORTE', 'PAUDALHO', 'PAUDALHO', 'PE', -7.882000, -35.179001, '0'),
(592, 16, 'ETA', 'MATA NORTE', 'BIZARRA', 'BOM JARDIM', 'PE', -7.756000, -35.484001, '0'),
(593, 16, 'ETA', 'MATA NORTE', 'BUENOS AIRES', 'BUENOS AIRES', 'PE', 0.000000, 0.000000, '0'),
(594, 1, 'ETA', '', 'TESTE', 'ITAPISSUMA', 'PE', -7.111111, -34.923485, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_locais_grupos`
--

CREATE TABLE `tb_locais_grupos` (
  `id` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `ativo` enum('0','1') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_locais_grupos`
--

INSERT INTO `tb_locais_grupos` (`id`, `local`, `grupo`, `ativo`) VALUES
(1, 2, 1, '0'),
(2, 2, 3, '0'),
(3, 3, 1, '0'),
(4, 2, 2, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_local_grupo`
--

CREATE TABLE `tb_local_grupo` (
  `id` int(11) NOT NULL,
  `local` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_local_grupo`
--

INSERT INTO `tb_local_grupo` (`id`, `local`, `grupo`, `ativo`) VALUES
(1, 2, 1, '0'),
(2, 2, 3, '0'),
(3, 3, 1, '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_loja`
--

CREATE TABLE `tb_loja` (
  `id` int(11) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `name` varchar(250) NOT NULL,
  `proprietario` int(11) NOT NULL,
  `grupoLoja` varchar(2) NOT NULL,
  `seguimento` varchar(4) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_loja`
--

INSERT INTO `tb_loja` (`id`, `nick`, `name`, `proprietario`, `grupoLoja`, `seguimento`, `data`, `ativo`) VALUES
(1, 'AGESPISA', 'AGESPISA', 1, 'C', 'SAN', '2017-08-18', '0'),
(2, 'ALUBAR', 'ALUBAR', 1, 'C', 'IND', '2017-08-18', '0'),
(3, 'AMBEV', 'AMBEV', 1, 'C', 'BEB', '2017-08-18', '0'),
(4, 'APERAM', 'APERAM', 1, 'C', 'IND', '2017-08-18', '0'),
(5, 'BATERIAS MOURA', 'BATERIAS MOURA', 1, 'C', 'IND', '2017-08-18', '0'),
(6, 'BIOSEV - GIASA', 'BIOSEV - GIASA', 1, 'C', 'USI', '2017-08-18', '0'),
(7, 'CAB AGRESTE', 'CAB AGRESTE', 1, 'C', 'SAN', '2017-08-18', '0'),
(8, 'CAB CUIABA', 'CAB CUIABA', 1, 'C', 'SAN', '2017-08-18', '0'),
(9, 'CAEMA', 'CAEMA', 1, 'C', 'SAN', '2017-08-18', '0'),
(10, 'CAER', 'CAER', 1, 'C', 'SAN', '2017-08-18', '0'),
(11, 'CAERN', 'CAERN', 1, 'C', 'SAN', '2017-08-18', '0'),
(12, 'CAGECE', 'CAGECE', 1, 'C', 'SAN', '2017-08-18', '0'),
(13, 'CAGEPA', 'CAGEPA', 1, 'C', 'SAN', '2017-08-18', '0'),
(14, 'CASAL', 'CASAL', 1, 'C', 'SAN', '2017-08-18', '0'),
(15, 'CESAN', 'CESAN', 1, 'C', 'SAN', '2017-08-18', '0'),
(16, 'COMPESA', 'COMPESA', 1, 'C', 'SAN', '2017-08-18', '0'),
(17, 'COSANPA', 'COSANPA', 1, 'C', 'SAN', '2017-08-18', '0'),
(18, 'DAE-VARZEA GRANDE', 'DAE-VARZEA GRANDE', 1, 'C', 'SAN', '2017-08-18', '0'),
(19, 'DEPASA', 'DEPASA', 1, 'C', 'SAN', '2017-08-18', '0'),
(20, 'DESO', 'DESO', 1, 'C', 'SAN', '2017-08-18', '0'),
(21, 'NIAGRO NICHIREI-PE', 'NIAGRO NICHIREI-PE', 1, 'C', 'IND', '2017-08-18', '0'),
(22, 'SAAE - BACABAL', 'SAAE - BACABAL', 1, 'C', 'SAN', '2017-08-18', '0'),
(23, 'SAAE - CAXIAS', 'SAAE - CAXIAS', 1, 'C', 'SAN', '2017-08-18', '0'),
(24, 'SABARA', 'SABARA', 1, 'P', 'IND', '2017-08-18', '0'),
(25, 'SERRA NEGRA DO NORTE', 'SERRA NEGRA DO NORTE', 1, 'C', 'SAN', '2017-08-18', '0'),
(26, 'SOLAR', 'SOLAR', 1, 'C', 'BEB', '2017-08-18', '0'),
(27, 'UFRN', 'UFRN', 1, 'C', 'OUT', '2017-08-18', '0'),
(28, 'BRASIL KIRIN', 'BRASIL KIRIN', 1, 'C', 'BEB', '2017-08-18', '0'),
(29, 'GERDAU', 'GERDAU', 1, 'C', 'IND', '2017-08-18', '0'),
(30, 'HEINEKEN', 'HEINEKEN', 1, 'C', 'BEB', '2017-08-18', '0'),
(31, 'SANEAR RONDONOPOLIS', 'SANEAR RONDONOPOLIS', 1, 'C', 'SAN', '2017-08-18', '0');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_loja_grupo`
--

CREATE TABLE `tb_loja_grupo` (
  `id` int(11) NOT NULL,
  `loja` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_loja_grupo`
--

INSERT INTO `tb_loja_grupo` (`id`, `loja`, `grupo`, `ativo`) VALUES
(1, 1, 1, '0');

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
  `id` varchar(4) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_produto_tipo`
--

INSERT INTO `tb_produto_tipo` (`id`, `name`) VALUES
('PROD', 'PRODUTO'),
('SERV', 'SERVICO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produtos`
--

CREATE TABLE `tb_produtos` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `tipo` varchar(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Estrutura da tabela `tb_proprietario`
--

CREATE TABLE `tb_proprietario` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `ativo` enum('0','1') CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `cadastro` date NOT NULL DEFAULT '0000-00-00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_proprietario`
--

INSERT INTO `tb_proprietario` (`id`, `name`, `nick`, `ativo`, `cadastro`) VALUES
(1, 'Sabará Químicos Ingredientes S/A', 'Sabará', '', '2017-08-17');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_seguimento`
--

CREATE TABLE `tb_seguimento` (
  `id` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_seguimento`
--

INSERT INTO `tb_seguimento` (`id`, `name`) VALUES
('SAN', 'SANEAMENTO'),
('IND', 'INDUSTRIA'),
('BEB', 'BEBIDA'),
('USI', 'USINA'),
('OUT', 'OUTRO');

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
-- Estrutura da tabela `tb_tipo`
--

CREATE TABLE `tb_tipo` (
  `id` varchar(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_tipo`
--

INSERT INTO `tb_tipo` (`id`, `name`) VALUES
('ETA', 'ETA'),
('ETE', 'ETE'),
('EEA', 'EEA'),
('IND', 'INDUSTRIA'),
('POC', 'POCO'),
('OUT', 'OUTROS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `avatar` varchar(350) DEFAULT NULL,
  `proprietario` int(11) DEFAULT NULL,
  `grupoLoja` int(2) DEFAULT NULL,
  `loja` int(11) DEFAULT NULL,
  `nivel` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `ativo` enum('0','1') NOT NULL DEFAULT '0',
  `data_cadastro` date NOT NULL DEFAULT '0000-00-00',
  `data_ultimo_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user`, `password`, `avatar`, `proprietario`, `grupoLoja`, `loja`, `nivel`, `ativo`, `data_cadastro`, `data_ultimo_login`) VALUES
(0, 'FABIO VITORINO BONINA MORAIS', 'fabiobonina@gmail.com', 'Fabio Bonina', 'a906449d5769fa7361d7ecc6aa3f6d28', 'http://www.gravatar.com/avatar/5f3781a40c3fde1b4ac568a97692aa70?d=identicon', NULL, NULL, NULL, '0', '0', '2017-11-08', '2017-11-08 20:18:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bem`
--
ALTER TABLE `tb_bem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `loja` (`loja`),
  ADD KEY `local` (`local`);

--
-- Indexes for table `tb_bens_familia`
--
ALTER TABLE `tb_bens_familia`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bens_frabricante`
--
ALTER TABLE `tb_bens_frabricante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bens_grupo`
--
ALTER TABLE `tb_bens_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_bens_nivel`
--
ALTER TABLE `tb_bens_nivel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `segmento` (`segmento`);

--
-- Indexes for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `tb_eq_componentes`
--
ALTER TABLE `tb_eq_componentes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_eq_localizacao`
--
ALTER TABLE `tb_eq_localizacao`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_equipamentos`
--
ALTER TABLE `tb_equipamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_frabricante`
--
ALTER TABLE `tb_frabricante`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- Indexes for table `tb_grupo`
--
ALTER TABLE `tb_grupo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `tb_grupoloja`
--
ALTER TABLE `tb_grupoloja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_locais`
--
ALTER TABLE `tb_locais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_locais_grupos`
--
ALTER TABLE `tb_locais_grupos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_local_grupo`
--
ALTER TABLE `tb_local_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_loja`
--
ALTER TABLE `tb_loja`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- Indexes for table `tb_produto_tipo`
--
ALTER TABLE `tb_produto_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag` (`tag`);

--
-- Indexes for table `tb_proprietario`
--
ALTER TABLE `tb_proprietario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- Indexes for table `tb_seguimento`
--
ALTER TABLE `tb_seguimento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_sistema`
--
ALTER TABLE `tb_sistema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tipo`
--
ALTER TABLE `tb_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_bem`
--
ALTER TABLE `tb_bem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_bens_familia`
--
ALTER TABLE `tb_bens_familia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_bens_frabricante`
--
ALTER TABLE `tb_bens_frabricante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_bens_grupo`
--
ALTER TABLE `tb_bens_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_bens_nivel`
--
ALTER TABLE `tb_bens_nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_categoria`
--
ALTER TABLE `tb_categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_eq_componentes`
--
ALTER TABLE `tb_eq_componentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_eq_localizacao`
--
ALTER TABLE `tb_eq_localizacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_equipamentos`
--
ALTER TABLE `tb_equipamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_frabricante`
--
ALTER TABLE `tb_frabricante`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_grupo`
--
ALTER TABLE `tb_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_locais`
--
ALTER TABLE `tb_locais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;
--
-- AUTO_INCREMENT for table `tb_locais_grupos`
--
ALTER TABLE `tb_locais_grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_local_grupo`
--
ALTER TABLE `tb_local_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_loja`
--
ALTER TABLE `tb_loja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tb_produtos`
--
ALTER TABLE `tb_produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_estados`
--

CREATE TABLE `dados_estados` (
  `id` int(11) NOT NULL,
  `status` smallint(1) NOT NULL,
  `iso3` char(3) COLLATE utf8_swedish_ci NOT NULL,
  `uf` char(4) COLLATE utf8_swedish_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `dados_estados`
--

INSERT INTO `dados_estados` (`id`, `status`, `iso3`, `uf`, `nome`) VALUES
(1, 1, 'BRA', 'AC', 'Acre'),
(2, 1, 'BRA', 'AL', 'Alagoas'),
(3, 1, 'BRA', 'AP', 'Amapá'),
(4, 1, 'BRA', 'AM', 'Amazonas'),
(5, 1, 'BRA', 'BA', 'Bahia'),
(6, 1, 'BRA', 'CE', 'Ceará'),
(7, 1, 'BRA', 'DF', 'Distrito Federal'),
(8, 1, 'BRA', 'ES', 'Espírito Santo'),
(9, 1, 'BRA', 'GO', 'Goiás'),
(10, 1, 'BRA', 'MA', 'Maranhão'),
(11, 1, 'BRA', 'MT', 'Mato Grosso'),
(12, 1, 'BRA', 'MS', 'Mato Grosso do Sul'),
(13, 1, 'BRA', 'MG', 'Minas Gerais'),
(14, 1, 'BRA', 'PA', 'Pará'),
(15, 1, 'BRA', 'PB', 'Paraíba'),
(16, 1, 'BRA', 'PR', 'Paraná'),
(17, 1, 'BRA', 'PE', 'Pernambuco'),
(18, 1, 'BRA', 'PI', 'Piauí'),
(19, 1, 'BRA', 'RJ', 'Rio de Janeiro'),
(20, 1, 'BRA', 'RN', 'Rio Grande do Norte'),
(21, 1, 'BRA', 'RS', 'Rio Grande do Sul'),
(22, 1, 'BRA', 'RO', 'Rondônia'),
(23, 1, 'BRA', 'RR', 'Roraima'),
(24, 1, 'BRA', 'SC', 'Santa Catarina'),
(25, 1, 'BRA', 'SP', 'São Paulo'),
(26, 1, 'BRA', 'SE', 'Sergipe'),
(27, 1, 'BRA', 'TO', 'Tocantins');

-- --------------------------------------------------------

--
-- Estrutura da tabela `dados_paises`
--

CREATE TABLE `dados_paises` (
  `status` smallint(1) NOT NULL,
  `iso` char(2) COLLATE utf8_swedish_ci NOT NULL,
  `iso3` char(3) COLLATE utf8_swedish_ci NOT NULL,
  `numero` smallint(6) DEFAULT NULL,
  `nome` varchar(255) COLLATE utf8_swedish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Extraindo dados da tabela `dados_paises`
--

INSERT INTO `dados_paises` (`status`, `iso`, `iso3`, `numero`, `nome`) VALUES
(1, 'AF', 'AFG', 4, 'Afeganistão'),
(1, 'ZA', 'ZAF', 710, 'África do Sul'),
(1, 'AX', 'ALA', 248, 'Åland, Ilhas'),
(1, 'AL', 'ALB', 8, 'Albânia'),
(1, 'DE', 'DEU', 276, 'Alemanha'),
(1, 'AD', 'AND', 20, 'Andorra'),
(1, 'AO', 'AGO', 24, 'Angola'),
(1, 'AI', 'AIA', 660, 'Anguilla'),
(1, 'AQ', 'ATA', 10, 'Antárctida'),
(1, 'AG', 'ATG', 28, 'Antigua e Barbuda'),
(1, 'AN', 'ANT', 530, 'Antilhas Holandesas'),
(1, 'SA', 'SAU', 682, 'Arábia Saudita'),
(1, 'DZ', 'DZA', 12, 'Argélia'),
(1, 'AR', 'ARG', 32, 'Argentina'),
(1, 'AM', 'ARM', 51, 'Arménia'),
(1, 'AW', 'ABW', 533, 'Aruba'),
(1, 'AU', 'AUS', 36, 'Austrália'),
(1, 'AT', 'AUT', 40, 'Áustria'),
(1, 'AZ', 'AZE', 31, 'Azerbeijão'),
(1, 'BS', 'BHS', 44, 'Bahamas'),
(1, 'BH', 'BHR', 48, 'Bahrain'),
(1, 'BD', 'BGD', 50, 'Bangladesh'),
(1, 'BB', 'BRB', 52, 'Barbados'),
(1, 'BE', 'BEL', 56, 'Bélgica'),
(1, 'BZ', 'BLZ', 84, 'Belize'),
(1, 'BJ', 'BEN', 204, 'Benin'),
(1, 'BM', 'BMU', 60, 'Bermuda'),
(1, 'BY', 'BLR', 112, 'Bielo-Rússia'),
(1, 'BO', 'BOL', 68, 'Bolívia'),
(1, 'BA', 'BIH', 70, 'Bósnia-Herzegovina'),
(1, 'BW', 'BWA', 72, 'Botswana'),
(1, 'BV', 'BVT', 74, 'Bouvet, Ilha'),
(1, 'BR', 'BRA', 76, 'Brasil'),
(1, 'BN', 'BRN', 96, 'Brunei'),
(1, 'BG', 'BGR', 100, 'Bulgária'),
(1, 'BF', 'BFA', 854, 'Burkina Faso'),
(1, 'BI', 'BDI', 108, 'Burundi'),
(1, 'BT', 'BTN', 64, 'Butão'),
(1, 'CV', 'CPV', 132, 'Cabo Verde'),
(1, 'KH', 'KHM', 116, 'Cambodja'),
(1, 'CM', 'CMR', 120, 'Camarões'),
(1, 'CA', 'CAN', 124, 'Canadá'),
(1, 'KY', 'CYM', 136, 'Cayman, Ilhas'),
(1, 'KZ', 'KAZ', 398, 'Cazaquistão'),
(1, 'CF', 'CAF', 140, 'Centro-africana, República'),
(1, 'TD', 'TCD', 148, 'Chade'),
(1, 'CZ', 'CZE', 203, 'Checa, República'),
(1, 'CL', 'CHL', 152, 'Chile'),
(1, 'CN', 'CHN', 156, 'China'),
(1, 'CY', 'CYP', 196, 'Chipre'),
(1, 'CX', 'CXR', 162, 'Christmas, Ilha'),
(1, 'CC', 'CCK', 166, 'Cocos, Ilhas'),
(1, 'CO', 'COL', 170, 'Colômbia'),
(1, 'KM', 'COM', 174, 'Comores'),
(1, 'CG', 'COG', 178, 'Congo, República do'),
(1, 'CD', 'COD', 180, 'Congo, República Democrática do (antigo Zaire)'),
(1, 'CK', 'COK', 184, 'Cook, Ilhas'),
(1, 'KR', 'KOR', 410, 'Coreia do Sul'),
(1, 'KP', 'PRK', 408, 'Coreia, República Democrática da (Coreia do Norte)'),
(1, 'CI', 'CIV', 384, 'Costa do Marfim'),
(1, 'CR', 'CRI', 188, 'Costa Rica'),
(1, 'HR', 'HRV', 191, 'Croácia'),
(1, 'CU', 'CUB', 192, 'Cuba'),
(1, 'DK', 'DNK', 208, 'Dinamarca'),
(1, 'DJ', 'DJI', 262, 'Djibouti'),
(1, 'DM', 'DMA', 212, 'Dominica'),
(1, 'DO', 'DOM', 214, 'Dominicana, República'),
(1, 'EG', 'EGY', 818, 'Egipto'),
(1, 'SV', 'SLV', 222, 'El Salvador'),
(1, 'AE', 'ARE', 784, 'Emiratos Árabes Unidos'),
(1, 'EC', 'ECU', 218, 'Equador'),
(1, 'ER', 'ERI', 232, 'Eritreia'),
(1, 'SK', 'SVK', 703, 'Eslováquia'),
(1, 'SI', 'SVN', 705, 'Eslovénia'),
(1, 'ES', 'ESP', 724, 'Espanha'),
(1, 'US', 'USA', 840, 'Estados Unidos da América'),
(1, 'EE', 'EST', 233, 'Estónia'),
(1, 'ET', 'ETH', 231, 'Etiópia'),
(1, 'FO', 'FRO', 234, 'Faroe, Ilhas'),
(1, 'FJ', 'FJI', 242, 'Fiji'),
(1, 'PH', 'PHL', 608, 'Filipinas'),
(1, 'FI', 'FIN', 246, 'Finlândia'),
(1, 'FR', 'FRA', 250, 'França'),
(1, 'GA', 'GAB', 266, 'Gabão'),
(1, 'GM', 'GMB', 270, 'Gâmbia'),
(1, 'GH', 'GHA', 288, 'Gana'),
(1, 'GE', 'GEO', 268, 'Geórgia'),
(1, 'GS', 'SGS', 239, 'Geórgia do Sul e Sandwich do Sul, Ilhas'),
(1, 'GI', 'GIB', 292, 'Gibraltar'),
(1, 'GR', 'GRC', 300, 'Grécia'),
(1, 'GD', 'GRD', 308, 'Grenada'),
(1, 'GL', 'GRL', 304, 'Gronelândia'),
(1, 'GP', 'GLP', 312, 'Guadeloupe'),
(1, 'GU', 'GUM', 316, 'Guam'),
(1, 'GT', 'GTM', 320, 'Guatemala'),
(1, 'GG', 'GGY', 831, 'Guernsey'),
(1, 'GY', 'GUY', 328, 'Guiana'),
(1, 'GF', 'GUF', 254, 'Guiana Francesa'),
(1, 'GW', 'GNB', 624, 'Guiné-Bissau'),
(1, 'GN', 'GIN', 324, 'Guiné-Conacri'),
(1, 'GQ', 'GNQ', 226, 'Guiné Equatorial'),
(1, 'HT', 'HTI', 332, 'Haiti'),
(1, 'HM', 'HMD', 334, 'Heard e Ilhas McDonald, Ilha'),
(1, 'HN', 'HND', 340, 'Honduras'),
(1, 'HK', 'HKG', 344, 'Hong Kong'),
(1, 'HU', 'HUN', 348, 'Hungria'),
(1, 'YE', 'YEM', 887, 'Iémen'),
(1, 'IN', 'IND', 356, 'Índia'),
(1, 'ID', 'IDN', 360, 'Indonésia'),
(1, 'IQ', 'IRQ', 368, 'Iraque'),
(1, 'IR', 'IRN', 364, 'Irão'),
(1, 'IE', 'IRL', 372, 'Irlanda'),
(1, 'IS', 'ISL', 352, 'Islândia'),
(1, 'IL', 'ISR', 376, 'Israel'),
(1, 'IT', 'ITA', 380, 'Itália'),
(1, 'JM', 'JAM', 388, 'Jamaica'),
(1, 'JP', 'JPN', 392, 'Japão'),
(1, 'JE', 'JEY', 832, 'Jersey'),
(1, 'JO', 'JOR', 400, 'Jordânia'),
(1, 'KI', 'KIR', 296, 'Kiribati'),
(1, 'KW', 'KWT', 414, 'Kuwait'),
(1, 'LA', 'LAO', 418, 'Laos'),
(1, 'LS', 'LSO', 426, 'Lesoto'),
(1, 'LV', 'LVA', 428, 'Letónia'),
(1, 'LB', 'LBN', 422, 'Líbano'),
(1, 'LR', 'LBR', 430, 'Libéria'),
(1, 'LY', 'LBY', 434, 'Líbia'),
(1, 'LI', 'LIE', 438, 'Liechtenstein'),
(1, 'LT', 'LTU', 440, 'Lituânia'),
(1, 'LU', 'LUX', 442, 'Luxemburgo'),
(1, 'MO', 'MAC', 446, 'Macau'),
(1, 'MK', 'MKD', 807, 'Macedónia, República da'),
(1, 'MG', 'MDG', 450, 'Madagáscar'),
(1, 'MY', 'MYS', 458, 'Malásia'),
(1, 'MW', 'MWI', 454, 'Malawi'),
(1, 'MV', 'MDV', 462, 'Maldivas'),
(1, 'ML', 'MLI', 466, 'Mali'),
(1, 'MT', 'MLT', 470, 'Malta'),
(1, 'FK', 'FLK', 238, 'Malvinas, Ilhas (Falkland)'),
(1, 'IM', 'IMN', 833, 'Man, Ilha de'),
(1, 'MP', 'MNP', 580, 'Marianas Setentrionais'),
(1, 'MA', 'MAR', 504, 'Marrocos'),
(1, 'MH', 'MHL', 584, 'Marshall, Ilhas'),
(1, 'MQ', 'MTQ', 474, 'Martinica'),
(1, 'MU', 'MUS', 480, 'Maurícia'),
(1, 'MR', 'MRT', 478, 'Mauritânia'),
(1, 'YT', 'MYT', 175, 'Mayotte'),
(1, 'UM', 'UMI', 581, 'Menores Distantes dos Estados Unidos, Ilhas'),
(1, 'MX', 'MEX', 484, 'México'),
(1, 'MM', 'MMR', 104, 'Myanmar (antiga Birmânia)'),
(1, 'FM', 'FSM', 583, 'Micronésia, Estados Federados da'),
(1, 'MZ', 'MOZ', 508, 'Moçambique'),
(1, 'MD', 'MDA', 498, 'Moldávia'),
(1, 'MC', 'MCO', 492, 'Mónaco'),
(1, 'MN', 'MNG', 496, 'Mongólia'),
(1, 'ME', 'MNE', 499, 'Montenegro'),
(1, 'MS', 'MSR', 500, 'Montserrat'),
(1, 'NA', 'NAM', 516, 'Namíbia'),
(1, 'NR', 'NRU', 520, 'Nauru'),
(1, 'NP', 'NPL', 524, 'Nepal'),
(1, 'NI', 'NIC', 558, 'Nicarágua'),
(1, 'NE', 'NER', 562, 'Níger'),
(1, 'NG', 'NGA', 566, 'Nigéria'),
(1, 'NU', 'NIU', 570, 'Niue'),
(1, 'NF', 'NFK', 574, 'Norfolk, Ilha'),
(1, 'NO', 'NOR', 578, 'Noruega'),
(1, 'NC', 'NCL', 540, 'Nova Caledónia'),
(1, 'NZ', 'NZL', 554, 'Nova Zelândia (Aotearoa)'),
(1, 'OM', 'OMN', 512, 'Oman'),
(1, 'NL', 'NLD', 528, 'Países Baixos (Holanda)'),
(1, 'PW', 'PLW', 585, 'Palau'),
(1, 'PS', 'PSE', 275, 'Palestina'),
(1, 'PA', 'PAN', 591, 'Panamá'),
(1, 'PG', 'PNG', 598, 'Papua-Nova Guiné'),
(1, 'PK', 'PAK', 586, 'Paquistão'),
(1, 'PY', 'PRY', 600, 'Paraguai'),
(1, 'PE', 'PER', 604, 'Peru'),
(1, 'PN', 'PCN', 612, 'Pitcairn'),
(1, 'PF', 'PYF', 258, 'Polinésia Francesa'),
(1, 'PL', 'POL', 616, 'Polónia'),
(1, 'PR', 'PRI', 630, 'Porto Rico'),
(1, 'PT', 'PRT', 620, 'Portugal'),
(1, 'QA', 'QAT', 634, 'Qatar'),
(1, 'KE', 'KEN', 404, 'Quénia'),
(1, 'KG', 'KGZ', 417, 'Quirguistão'),
(1, 'GB', 'GBR', 826, 'Reino Unido da Grã-Bretanha e Irlanda do Norte'),
(1, 'RE', 'REU', 638, 'Reunião'),
(1, 'RO', 'ROU', 642, 'Roménia'),
(1, 'RW', 'RWA', 646, 'Ruanda'),
(1, 'RU', 'RUS', 643, 'Rússia'),
(1, 'EH', 'ESH', 732, 'Saara Ocidental'),
(1, 'AS', 'ASM', 16, 'Samoa Americana'),
(1, 'WS', 'WSM', 882, 'Samoa (Samoa Ocidental)'),
(1, 'PM', 'SPM', 666, 'Saint Pierre et Miquelon'),
(1, 'SB', 'SLB', 90, 'Salomão, Ilhas'),
(1, 'KN', 'KNA', 659, 'São Cristóvão e Névis (Saint Kitts e Nevis)'),
(1, 'SM', 'SMR', 674, 'San Marino'),
(1, 'ST', 'STP', 678, 'São Tomé e Príncipe'),
(1, 'VC', 'VCT', 670, 'São Vicente e Granadinas'),
(1, 'SH', 'SHN', 654, 'Santa Helena'),
(1, 'LC', 'LCA', 662, 'Santa Lúcia'),
(1, 'SN', 'SEN', 686, 'Senegal'),
(1, 'SL', 'SLE', 694, 'Serra Leoa'),
(1, 'RS', 'SRB', 688, 'Sérvia'),
(1, 'SC', 'SYC', 690, 'Seychelles'),
(1, 'SG', 'SGP', 702, 'Singapura'),
(1, 'SY', 'SYR', 760, 'Síria'),
(1, 'SO', 'SOM', 706, 'Somália'),
(1, 'LK', 'LKA', 144, 'Sri Lanka'),
(1, 'SZ', 'SWZ', 748, 'Suazilândia'),
(1, 'SD', 'SDN', 736, 'Sudão'),
(1, 'SE', 'SWE', 752, 'Suécia'),
(1, 'CH', 'CHE', 756, 'Suíça'),
(1, 'SR', 'SUR', 740, 'Suriname'),
(1, 'SJ', 'SJM', 744, 'Svalbard e Jan Mayen'),
(1, 'TH', 'THA', 764, 'Tailândia'),
(1, 'TW', 'TWN', 158, 'Taiwan'),
(1, 'TJ', 'TJK', 762, 'Tajiquistão'),
(1, 'TZ', 'TZA', 834, 'Tanzânia'),
(1, 'TF', 'ATF', 260, 'Terras Austrais e Antárticas Francesas (TAAF)'),
(1, 'IO', 'IOT', 86, 'Território Britânico do Oceano Índico'),
(1, 'TL', 'TLS', 626, 'Timor-Leste'),
(1, 'TG', 'TGO', 768, 'Togo'),
(1, 'TK', 'TKL', 772, 'Toquelau'),
(1, 'TO', 'TON', 776, 'Tonga'),
(1, 'TT', 'TTO', 780, 'Trindade e Tobago'),
(1, 'TN', 'TUN', 788, 'Tunísia'),
(1, 'TC', 'TCA', 796, 'Turks e Caicos'),
(1, 'TM', 'TKM', 795, 'Turquemenistão'),
(1, 'TR', 'TUR', 792, 'Turquia'),
(1, 'TV', 'TUV', 798, 'Tuvalu'),
(1, 'UA', 'UKR', 804, 'Ucrânia'),
(1, 'UG', 'UGA', 800, 'Uganda'),
(1, 'UY', 'URY', 858, 'Uruguai'),
(1, 'UZ', 'UZB', 860, 'Usbequistão'),
(1, 'VU', 'VUT', 548, 'Vanuatu'),
(1, 'VA', 'VAT', 336, 'Vaticano'),
(1, 'VE', 'VEN', 862, 'Venezuela'),
(1, 'VN', 'VNM', 704, 'Vietname'),
(1, 'VI', 'VIR', 850, 'Virgens Americanas, Ilhas'),
(1, 'VG', 'VGB', 92, 'Virgens Britânicas, Ilhas'),
(1, 'WF', 'WLF', 876, 'Wallis e Futuna'),
(1, 'ZM', 'ZMB', 894, 'Zâmbia'),
(1, 'ZW', 'ZWE', 716, 'Zimbabwe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dados_estados`
--
ALTER TABLE `dados_estados`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dados_paises`
--
ALTER TABLE `dados_paises`
  ADD PRIMARY KEY (`iso`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dados_estados`
--
ALTER TABLE `dados_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;--
-- Database: `teste_db`
--
CREATE DATABASE IF NOT EXISTS `teste_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teste_db`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbl_excel`
--

CREATE TABLE `tbl_excel` (
  `excel_id` int(11) NOT NULL,
  `excel_name` varchar(250) NOT NULL,
  `excel_email` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tbl_excel`
--

INSERT INTO `tbl_excel` (`excel_id`, `excel_name`, `excel_email`) VALUES
(1, 'Fabio bonina', 'fabiobonina@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_excel`
--
ALTER TABLE `tbl_excel`
  ADD PRIMARY KEY (`excel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_excel`
--
ALTER TABLE `tbl_excel`
  MODIFY `excel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
