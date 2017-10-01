CREATE TABLE IF NOT EXISTS `tb_bemPai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bem` varchar(50) NOT NULL,
  `bemDesc` varchar(100) NOT NULL,
  `codProprietario` enum('0','1') NOT NULL DEFAULT '0',
  `descProprietario` varchar(30) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `localidade` int(11) NOT NULL,
  `plaqueta` varchar(11) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  KEY `cliente` (`cliente`),
  KEY `localidade` (`localidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=355 ;

CREATE TABLE IF NOT EXISTS `tb_bemFamilia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bem` varchar(50) NOT NULL,
  `bemDesc` varchar(100) NOT NULL,
  `cliente` varchar(30) NOT NULL,
  `localidade` int(11) NOT NULL,
  `plaqueta` varchar(11) NOT NULL,
  `data` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  KEY `cliente` (`cliente`),
  KEY `localidade` (`localidade`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=355 ;