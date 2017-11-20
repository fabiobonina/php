CREATE TABLE IF NOT EXISTS `tb_bens_segmento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `tag` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
--
-- Extraindo dados da tabela `tb_bens_segmento`
--
INSERT INTO `tb_bens_segmento` (`id`, `name`, `tag`) VALUES
(1, 'SEGURAÇA','SEG');

CREATE TABLE IF NOT EXISTS `tb_bens_ordem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `tag` int(11) NOT NULL,
  `segmento` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `segmento` (`segmento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
--
-- Extraindo dados da tabela `tb_bens_ordem`
--
INSERT INTO `tb_bens_ordem` (`id`, `name`, `tag`, `segmento`) VALUES
(1, 'PRIMERIO', '1', '1'),
(2, 'SECUNDARIO', '2', '1'),
(3, 'TERCERARIO', '3', '1');

CREATE TABLE IF NOT EXISTS `tb_bens_frabricante` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nick` varchar(30) NOT NULL,
  `segmento` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;
--
-- Extraindo dados da tabela `tb_bens_frabricante`
--
INSERT INTO `tb_bens_frabricante` (`id`, `name`, `nick`, `segmento`) VALUES
(1, 'MSA', 'MSA', '1;2');

CREATE TABLE IF NOT EXISTS `tb_bemPai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bem` varchar(50) NOT NULL,
  `bemDesc` varchar(100) NOT NULL,
  `codProprietario` enum('0','1') NOT NULL DEFAULT '0',
  `descProprietario` varchar(30) NOT NULL,
  `loja` int(11) NOT NULL,
  `localidade` int(11) NOT NULL,
  `plaqueta` varchar(11) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  KEY `loja` (`loja`),
  KEY `localidade` (`localidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `tb_bens_familia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `nick` varchar(50) NOT NULL,
  `segmento` varchar(30) NOT NULL,
  `ordem` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
--
-- Extraindo dados da tabela `tb_bens_familia`
--
INSERT INTO `tb_bens_familia` (`id`, `name`, `nick`, `segmento`) VALUES
(1, 'MASCARA AUTONOMA', 'MSA', '1;2');