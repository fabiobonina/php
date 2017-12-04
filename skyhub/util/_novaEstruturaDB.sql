CREATE TABLE IF NOT EXISTS `tb_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `tag` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;
--
-- Extraindo dados da tabela `tb_grupo`
--
INSERT INTO `tb_grupo` (`id`, `name`, `tag`) VALUES
(1, 'SEGURAÇA','SEG');

CREATE TABLE IF NOT EXISTS `tb_bens_nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `tag` int(11) NOT NULL,
  `segmento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `segmento` (`segmento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;
--
-- Extraindo dados da tabela `tb_bens_nivel`
--
INSERT INTO `tb_bens_nivel` (`id`, `name`, `tag`, `segmento`) VALUES
(1, 'PRIMERIO', '1', '1'),
(2, 'SECUNDARIO', '2', '1'),
(3, 'TERCERARIO', '3', '1');

CREATE TABLE IF NOT EXISTS `tb_bens_frabricante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `tag` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2;
--
-- Extraindo dados da tabela `tb_bens_frabricante`
--
INSERT INTO `tb_bens_frabricante` (`id`, `name`, `tag`) VALUES
(1, 'MSA', 'MSA');

CREATE TABLE IF NOT EXISTS `tb_bem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `familia` int(11) NOT NULL AUTO_INCREMENT,
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
  `plaqueta` varchar(11) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  KEY `loja` (`loja`),
  KEY `local` (`local`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `tb_bem` (`id`, `familia`, `name`, `tag`,`capacidade`,`unidade`,`modelo`,`frabicante`,`codProprietario`,`descProprietario`,`loja`,`local`,`plaqueta`,`data`) VALUES
(1, 1, 'MASCARA AUTONOMA', 'MSA', '240','KG','1','24','SABARA','1','1','1','101010','2017-12-04');

CREATE TABLE IF NOT EXISTS `tb_bens_familia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
--
-- Extraindo dados da tabela `tb_bens_familia`
--
INSERT INTO `tb_bens_familia` (`id`, `name`, `tag`) VALUES
(1, 'MASCARA AUTONOMA', 'MSA');