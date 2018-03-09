-- MySQL Script generated by MySQL Workbench
-- Fri Feb 23 21:59:54 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema system_tec
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema system_tec
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `system_tec` DEFAULT CHARACTER SET utf8 ;
USE `system_tec` ;

-- -----------------------------------------------------
-- Table `system_tec`.`login`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`login` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) CHARACTER SET 'latin1' NOT NULL,
  `email` VARCHAR(100) CHARACTER SET 'latin1' NOT NULL,
  `nickuser` VARCHAR(30) CHARACTER SET 'latin1' NOT NULL,
  `senha` VARCHAR(32) CHARACTER SET 'latin1' NOT NULL,
  `nivel` ENUM('0', '1', '2', '3') CHARACTER SET 'latin1' NOT NULL DEFAULT '0',
  `ativo` ENUM('0', '1') CHARACTER SET 'latin1' NOT NULL DEFAULT '0',
  `data_cadastro` DATE NOT NULL DEFAULT '0000-00-00',
  `data_ultimo_login` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `niciuser_UNIQUE` (`nickuser` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 23
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_ativo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_ativo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cliente` VARCHAR(30) CHARACTER SET 'latin1' NOT NULL,
  `localidade` INT(11) NOT NULL,
  `plaqueta` VARCHAR(11) CHARACTER SET 'latin1' NOT NULL,
  `data` DATE NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  INDEX `cliente` (`cliente` ASC),
  INDEX `localidade` (`localidade` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 493
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_fabricante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_fabricante` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `nick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_proprietario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_proprietario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) CHARACTER SET 'latin1' NOT NULL,
  `nick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `ativo` ENUM('0', '1') CHARACTER SET 'utf8' NOT NULL DEFAULT '0',
  `cadastro` DATE NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nick_UNIQUE` (`nick` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_grupoloja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_grupoloja` (
  `id` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `decricao` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_seguimento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_seguimento` (
  `id` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_loja`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_loja` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `name` VARCHAR(250) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `proprietario` INT(11) NOT NULL,
  `grupoLoja` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `seguimento` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `data` DATE NOT NULL DEFAULT '0000-00-00',
  `ativo` ENUM('0', '1') CHARACTER SET 'utf8' NOT NULL DEFAULT '0',
  INDEX `fk_tb_loja_tb_proprietario1_idx` (`proprietario` ASC),
  INDEX `fk_tb_loja_tb_grupoloja1_idx` (`grupoLoja` ASC),
  INDEX `fk_tb_loja_tb_seguimento1_idx` (`seguimento` ASC),
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nick_UNIQUE` (`nick` ASC),
  CONSTRAINT `fk_tb_loja_tb_proprietario1`
    FOREIGN KEY (`proprietario`)
    REFERENCES `system_tec`.`tb_proprietario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_loja_tb_grupoloja1`
    FOREIGN KEY (`grupoLoja`)
    REFERENCES `system_tec`.`tb_grupoloja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_loja_tb_seguimento1`
    FOREIGN KEY (`seguimento`)
    REFERENCES `system_tec`.`tb_seguimento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL,
  `tag` VARCHAR(30) CHARACTER SET 'latin1' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_produto_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_produto_tipo` (
  `id` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `name` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_produtos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_produtos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `tag` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `tipo` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  INDEX `fk_tb_produtos_tb_produto_tipo1_idx` (`tipo` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_produtos_tb_produto_tipo1`
    FOREIGN KEY (`tipo`)
    REFERENCES `system_tec`.`tb_produto_tipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_tipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_tipo` (
  `id` VARCHAR(11) NOT NULL,
  `name` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_locais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_locais` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `loja` INT(11) NOT NULL,
  `tipo` VARCHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `regional` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `name` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `municipio` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `uf` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `latitude` FLOAT(10,6) NULL DEFAULT NULL,
  `longitude` FLOAT(10,6) NULL DEFAULT NULL,
  `ativo` ENUM('0', '1') CHARACTER SET 'utf8' NOT NULL DEFAULT '0',
  INDEX `fk_tb_locais_tb_loja1_idx` (`loja` ASC),
  INDEX `fk_tb_locais_tb_tipo1_idx` (`tipo` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_locais_tb_loja1`
    FOREIGN KEY (`loja`)
    REFERENCES `system_tec`.`tb_loja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_locais_tb_tipo1`
    FOREIGN KEY (`tipo`)
    REFERENCES `system_tec`.`tb_tipo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_bem`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_bem` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `produto` INT(11) NOT NULL,
  `tag` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `name` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `modelo` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `numeracao` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `fabricante` INT(11) NOT NULL,
  `fabricanteNick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `proprietario` INT(11) NOT NULL,
  `proprietarioNick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `proprietarioLocal` INT(11) NOT NULL,
  `categoria` INT(11) NOT NULL,
  `plaqueta` VARCHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `dataFrabricacao` DATE NULL DEFAULT '0000-00-00',
  `dataCompra` DATE NULL DEFAULT '0000-00-00',
  INDEX `fk_tb_bem_tb_fabricante1_idx` (`fabricante` ASC),
  INDEX `fk_tb_bem_tb_loja1_idx` (`proprietario` ASC),
  INDEX `fk_tb_bem_tb_categoria1_idx` (`categoria` ASC),
  INDEX `fk_tb_bem_tb_produtos1_idx` (`produto` ASC),
  INDEX `fk_tb_bem_tb_locais1_idx` (`proprietarioLocal` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_bem_tb_fabricante1`
    FOREIGN KEY (`fabricante`)
    REFERENCES `system_tec`.`tb_fabricante` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_bem_tb_loja1`
    FOREIGN KEY (`proprietario`)
    REFERENCES `system_tec`.`tb_loja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_bem_tb_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `system_tec`.`tb_categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_bem_tb_produtos1`
    FOREIGN KEY (`produto`)
    REFERENCES `system_tec`.`tb_produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_bem_tb_locais1`
    FOREIGN KEY (`proprietarioLocal`)
    REFERENCES `system_tec`.`tb_locais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_bem_localizacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_bem_localizacao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `bem` INT(11) NOT NULL,
  `loja` INT(11) NULL DEFAULT NULL,
  `local` INT(11) NULL DEFAULT NULL,
  `dataInicial` DATE NULL DEFAULT '0000-00-00',
  `dataFinal` DATE NULL DEFAULT '0000-00-00',
  `status` ENUM('0', '1', '2', '3') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '0',
  INDEX `fk_tb_bem_localizacao_tb_bem1_idx` (`bem` ASC),
  INDEX `fk_tb_bem_localizacao_tb_loja1_idx` (`loja` ASC),
  INDEX `fk_tb_bem_localizacao_tb_locais1_idx` (`local` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_bem_localizacao_tb_bem1`
    FOREIGN KEY (`bem`)
    REFERENCES `system_tec`.`tb_bem` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_bem_localizacao_tb_loja1`
    FOREIGN KEY (`loja`)
    REFERENCES `system_tec`.`tb_loja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_bem_localizacao_tb_locais1`
    FOREIGN KEY (`local`)
    REFERENCES `system_tec`.`tb_locais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_grupo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `decricao` VARCHAR(150) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_bens_grupo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_bens_grupo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `bem` INT(11) NOT NULL,
  `grupo` INT(11) NOT NULL,
  INDEX `fk_tb_bens_grupo_tb_grupo1_idx` (`grupo` ASC),
  INDEX `fk_tb_bens_grupo_tb_bem1_idx` (`bem` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_bens_grupo_tb_grupo1`
    FOREIGN KEY (`grupo`)
    REFERENCES `system_tec`.`tb_grupo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_bens_grupo_tb_bem1`
    FOREIGN KEY (`bem`)
    REFERENCES `system_tec`.`tb_bem` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_clientes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) CHARACTER SET 'latin1' NOT NULL,
  `nick` VARCHAR(30) CHARACTER SET 'latin1' NOT NULL,
  `ativo` ENUM('0', '1') CHARACTER SET 'latin1' NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nick` (`nick` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 36
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_descricao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_descricao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `oat` INT(11) NOT NULL,
  `descricao` VARCHAR(800) CHARACTER SET 'latin1' NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `tb_oat` (`oat` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2322
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_eq_componentes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_eq_componentes` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `produto` INT(11) NOT NULL,
  `tag` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `name` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `capacidade` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `unidade` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `numeracao` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `frabicante` INT(11) NOT NULL,
  `frabicanteNick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `proprietario` INT(11) NOT NULL,
  `proprietarioNick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `local` INT(11) NOT NULL,
  `categoria` INT(11) NOT NULL,
  `dataFrabricacao` DATE NOT NULL DEFAULT '0000-00-00',
  `dataCompra` DATE NOT NULL DEFAULT '0000-00-00',
  INDEX `fk_tb_eq_componentes_tb_produtos1_idx` (`produto` ASC),
  INDEX `fk_tb_eq_componentes_tb_fabricante1_idx` (`frabicante` ASC),
  INDEX `fk_tb_eq_componentes_tb_loja1_idx` (`proprietario` ASC),
  INDEX `fk_tb_eq_componentes_tb_locais1_idx` (`local` ASC),
  INDEX `fk_tb_eq_componentes_tb_categoria1_idx` (`categoria` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_eq_componentes_tb_produtos1`
    FOREIGN KEY (`produto`)
    REFERENCES `system_tec`.`tb_produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_eq_componentes_tb_fabricante1`
    FOREIGN KEY (`frabicante`)
    REFERENCES `system_tec`.`tb_fabricante` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_eq_componentes_tb_loja1`
    FOREIGN KEY (`proprietario`)
    REFERENCES `system_tec`.`tb_loja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_eq_componentes_tb_locais1`
    FOREIGN KEY (`local`)
    REFERENCES `system_tec`.`tb_locais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_eq_componentes_tb_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `system_tec`.`tb_categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_equipamentos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_equipamentos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `produto` INT(11) NOT NULL,
  `tag` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `name` VARCHAR(100) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `capacidade` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `unidade` VARCHAR(4) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `numeracao` VARCHAR(20) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `fabricante` INT(11) NOT NULL,
  `fabricanteNick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `proprietario` INT(11) NOT NULL,
  `proprietarioNick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `local` INT(11) NOT NULL,
  `categoria` INT(11) NOT NULL,
  `plaqueta` VARCHAR(11) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `dataFrabricacao` DATE NOT NULL DEFAULT '0000-00-00',
  `dataCompra` DATE NOT NULL DEFAULT '0000-00-00',
  INDEX `fk_tb_equipamentos_tb_produtos1_idx` (`produto` ASC),
  INDEX `fk_tb_equipamentos_tb_fabricante1_idx` (`fabricante` ASC),
  INDEX `fk_tb_equipamentos_tb_proprietario1_idx` (`proprietario` ASC),
  INDEX `fk_tb_equipamentos_tb_locais1_idx` (`local` ASC),
  INDEX `fk_tb_equipamentos_tb_categoria1_idx` (`categoria` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_equipamentos_tb_produtos1`
    FOREIGN KEY (`produto`)
    REFERENCES `system_tec`.`tb_produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_equipamentos_tb_fabricante1`
    FOREIGN KEY (`fabricante`)
    REFERENCES `system_tec`.`tb_fabricante` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_equipamentos_tb_proprietario1`
    FOREIGN KEY (`proprietario`)
    REFERENCES `system_tec`.`tb_proprietario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_equipamentos_tb_locais1`
    FOREIGN KEY (`local`)
    REFERENCES `system_tec`.`tb_locais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_equipamentos_tb_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `system_tec`.`tb_categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_eq_localizacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_eq_localizacao` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `equipamento` INT(11) NOT NULL,
  `loja` INT(11) NOT NULL,
  `local` INT(11) NULL DEFAULT NULL,
  `dataIncial` DATE NULL DEFAULT '0000-00-00',
  `dataFinal` DATE NULL DEFAULT '0000-00-00',
  `status` ENUM('0', '1', '2', '3') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '0',
  INDEX `fk_tb_eq_localizacao_tb_equipamentos1_idx` (`equipamento` ASC),
  INDEX `fk_tb_eq_localizacao_tb_loja1_idx` (`loja` ASC),
  INDEX `fk_tb_eq_localizacao_tb_locais1_idx` (`local` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_eq_localizacao_tb_equipamentos1`
    FOREIGN KEY (`equipamento`)
    REFERENCES `system_tec`.`tb_equipamentos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_eq_localizacao_tb_loja1`
    FOREIGN KEY (`loja`)
    REFERENCES `system_tec`.`tb_loja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_eq_localizacao_tb_locais1`
    FOREIGN KEY (`local`)
    REFERENCES `system_tec`.`tb_locais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_insumos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_insumos` (
  `id` INT(11) NOT NULL,
  `tb_oat_id` INT(11) NOT NULL,
  `descricao` VARCHAR(100) CHARACTER SET 'latin1' NOT NULL,
  `quantidade` DOUBLE NOT NULL,
  `valor` DECIMAL(10,2) NOT NULL,
  `obs` VARCHAR(255) CHARACTER SET 'latin1' NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tb_osdespesa_tb_oat10` (`tb_oat_id` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_local_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_local_categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `local` INT(11) NOT NULL,
  `categoria` INT(11) NOT NULL,
  `ativo` ENUM('0', '1') CHARACTER SET 'utf8' NOT NULL DEFAULT '0',
  INDEX `fk_tb_local_categoria_tb_locais1_idx` (`local` ASC),
  INDEX `fk_tb_local_categoria_tb_categoria1_idx` (`categoria` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_local_categoria_tb_locais1`
    FOREIGN KEY (`local`)
    REFERENCES `system_tec`.`tb_locais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_local_categoria_tb_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `system_tec`.`tb_categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_localidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_localidades` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cliente` VARCHAR(30) CHARACTER SET 'latin1' NOT NULL,
  `regional` VARCHAR(100) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `nome` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL,
  `municipio` VARCHAR(100) CHARACTER SET 'latin1' NOT NULL,
  `uf` VARCHAR(2) CHARACTER SET 'latin1' NOT NULL,
  `latitude` FLOAT(10,6) NULL DEFAULT NULL,
  `longitude` FLOAT(10,6) NULL DEFAULT NULL,
  `ativo` ENUM('0', '1') CHARACTER SET 'latin1' NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `fk_clientes` (`cliente` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 874
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_loja_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_loja_categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `loja` INT(11) NOT NULL,
  `categoria` INT(11) NOT NULL,
  `ativo` ENUM('0', '1') CHARACTER SET 'utf8' NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_servicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_servicos` (
  `id` VARCHAR(6) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `name` VARCHAR(30) CHARACTER SET 'utf8' NOT NULL,
  `tipo` ENUM('0', '1', '2', '3', '4') CHARACTER SET 'utf8' NOT NULL DEFAULT '0',
  `ativo` ENUM('0', '1') CHARACTER SET 'utf8' NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_os`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_os` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `loja` INT(11) NOT NULL,
  `lojaNick` VARCHAR(30) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `local` INT(11) NOT NULL,
  `servico` VARCHAR(6) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `categoria` INT(11) NOT NULL,
  `tipoServ` INT(1) NOT NULL,
  `bem` INT(11) NOT NULL,
  `tecnicos` VARCHAR(450) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `data` DATE NOT NULL DEFAULT '0000-00-00',
  `dtUltimoMan` DATE NULL DEFAULT '0000-00-00',
  `dtCadastro` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `filial` INT(2) NULL DEFAULT NULL,
  `os` INT(11) NULL DEFAULT NULL,
  `dtOs` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
  `dtFech` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
  `dtTerm` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
  `estado` ENUM('0', '1', '2', '3', '4') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '0',
  `processo` ENUM('0', '1', '2', '3', '4', '5') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '0',
  `status` ENUM('0', '1', '2', '3', '4') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '0',
  `ativo` ENUM('0', '1') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '0',
  INDEX `fk_tb_os_tb_loja1_idx` (`loja` ASC),
  INDEX `fk_tb_os_tb_locais1_idx` (`local` ASC),
  INDEX `fk_tb_os_tb_servicos1_idx` (`servico` ASC),
  INDEX `fk_tb_os_tb_categoria1_idx` (`categoria` ASC),
  INDEX `fk_tb_os_tb_bem1_idx` (`bem` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_os_tb_loja1`
    FOREIGN KEY (`loja`)
    REFERENCES `system_tec`.`tb_loja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_os_tb_locais1`
    FOREIGN KEY (`local`)
    REFERENCES `system_tec`.`tb_locais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_os_tb_servicos1`
    FOREIGN KEY (`servico`)
    REFERENCES `system_tec`.`tb_servicos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_os_tb_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `system_tec`.`tb_categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_os_tb_bem1`
    FOREIGN KEY (`bem`)
    REFERENCES `system_tec`.`tb_bem` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) CHARACTER SET 'latin1' NOT NULL,
  `email` VARCHAR(100) CHARACTER SET 'latin1' NOT NULL,
  `user` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL,
  `password` VARCHAR(32) CHARACTER SET 'latin1' NOT NULL,
  `avatar` VARCHAR(350) CHARACTER SET 'latin1' NULL DEFAULT NULL,
  `proprietario` INT(11) NULL DEFAULT NULL,
  `grupoLoja` VARCHAR(2) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NULL DEFAULT NULL,
  `loja` INT(11) NULL DEFAULT NULL,
  `nivel` ENUM('0', '1', '2', '3', '4') CHARACTER SET 'latin1' NOT NULL DEFAULT '0',
  `ativo` ENUM('0', '1') CHARACTER SET 'latin1' NOT NULL DEFAULT '0',
  `data_cadastro` DATE NOT NULL DEFAULT '0000-00-00',
  `data_ultimo_login` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email` (`email` ASC),
  UNIQUE INDEX `user` (`user` ASC),
  INDEX `fk_users_tb_proprietario_idx` (`proprietario` ASC),
  INDEX `fk_users_tb_grupoloja1_idx` (`grupoLoja` ASC),
  INDEX `fk_users_tb_loja1_idx` (`loja` ASC),
  CONSTRAINT `fk_users_tb_proprietario`
    FOREIGN KEY (`proprietario`)
    REFERENCES `system_tec`.`tb_proprietario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tb_grupoloja1`
    FOREIGN KEY (`grupoLoja`)
    REFERENCES `system_tec`.`tb_grupoloja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_tb_loja1`
    FOREIGN KEY (`loja`)
    REFERENCES `system_tec`.`tb_loja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_tecnicos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_tecnicos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `user` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `hh` DOUBLE(5,2) NOT NULL,
  `ativo` ENUM('0', '1') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '0',
  INDEX `fk_tb_tecnicos_users1_idx` (`user` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_tecnicos_users1`
    FOREIGN KEY (`user`)
    REFERENCES `system_tec`.`users` (`user`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_mod`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_mod` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `os` INT(11) NOT NULL,
  `tecnico` INT(11) NOT NULL,
  `dtInicio` DATETIME NOT NULL,
  `dtFinal` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
  `tempo` INT(11) NULL DEFAULT NULL,
  `kmInicio` INT(11) NULL DEFAULT NULL,
  `kmFinal` INT(11) NULL DEFAULT NULL,
  `valor` INT(11) NULL DEFAULT NULL,
  `tipoTrajeto` INT(11) NULL DEFAULT NULL,
  `status` ENUM('0', '1', '2', '3', '4', '5') CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `fk_tb_mod_tb_os1_idx` (`os` ASC),
  INDEX `fk_tb_mod_tb_tecnicos1_idx` (`tecnico` ASC),
  CONSTRAINT `fk_tb_mod_tb_os1`
    FOREIGN KEY (`os`)
    REFERENCES `system_tec`.`tb_os` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_mod_tb_tecnicos1`
    FOREIGN KEY (`tecnico`)
    REFERENCES `system_tec`.`tb_tecnicos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_oat`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_oat` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nickuser` VARCHAR(30) CHARACTER SET 'latin1' NOT NULL,
  `cliente` VARCHAR(30) CHARACTER SET 'latin1' NOT NULL,
  `localidade` INT(11) NOT NULL,
  `servico` VARCHAR(6) CHARACTER SET 'latin1' NOT NULL,
  `sistema` VARCHAR(12) CHARACTER SET 'latin1' NOT NULL,
  `data` DATE NOT NULL DEFAULT '0000-00-00',
  `data_sol` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `filial` INT(2) NULL DEFAULT NULL,
  `os` INT(11) NULL DEFAULT NULL,
  `data_os` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
  `data_fech` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
  `data_term` DATETIME NULL DEFAULT '0000-00-00 00:00:00',
  `status` ENUM('0', '1', '2', '3', '4') CHARACTER SET 'latin1' NOT NULL DEFAULT '0',
  `ativo` ENUM('0', '1') CHARACTER SET 'latin1' NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `nickuser` (`nickuser` ASC, `cliente` ASC, `localidade` ASC, `servico` ASC, `sistema` ASC),
  INDEX `fk_cleinte` (`cliente` ASC),
  INDEX `fk_localidades` (`localidade` ASC),
  INDEX `servico` (`servico` ASC),
  INDEX `sistema` (`sistema` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 2475
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_os_tecnico`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_os_tecnico` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `os` INT(11) NOT NULL,
  `loja` INT(11) NOT NULL,
  `tecnico` INT(11) NULL DEFAULT NULL,
  `user` VARCHAR(50) CHARACTER SET 'utf8' COLLATE 'utf8_unicode_ci' NOT NULL,
  `hh` DOUBLE(5,2) NULL DEFAULT NULL,
  INDEX `fk_tb_os_tecnico_tb_os1_idx` (`os` ASC),
  INDEX `fk_tb_os_tecnico_tb_loja1_idx` (`loja` ASC),
  INDEX `fk_tb_os_tecnico_tb_tecnicos1_idx` (`tecnico` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_os_tecnico_tb_os1`
    FOREIGN KEY (`os`)
    REFERENCES `system_tec`.`tb_os` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_os_tecnico_tb_loja1`
    FOREIGN KEY (`loja`)
    REFERENCES `system_tec`.`tb_loja` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_os_tecnico_tb_tecnicos1`
    FOREIGN KEY (`tecnico`)
    REFERENCES `system_tec`.`tb_tecnicos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_produto_categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_produto_categoria` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `produto` INT(11) NOT NULL,
  `categoria` INT(11) NOT NULL,
  INDEX `fk_tb_produto_categoria_tb_categoria1_idx` (`categoria` ASC),
  INDEX `fk_tb_produto_categoria_tb_produtos1_idx` (`produto` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tb_produto_categoria_tb_categoria1`
    FOREIGN KEY (`categoria`)
    REFERENCES `system_tec`.`tb_categoria` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_produto_categoria_tb_produtos1`
    FOREIGN KEY (`produto`)
    REFERENCES `system_tec`.`tb_produtos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_sistema`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_sistema` (
  `id` VARCHAR(12) CHARACTER SET 'latin1' NOT NULL,
  `descricao` VARCHAR(30) CHARACTER SET 'utf8' NOT NULL,
  `ativo` ENUM('0', '1') CHARACTER SET 'utf8' NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tb_teste`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tb_teste` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `bem` VARCHAR(500) CHARACTER SET 'latin1' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 404
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


-- -----------------------------------------------------
-- Table `system_tec`.`tipo_despesa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `system_tec`.`tipo_despesa` (
  `id` INT(11) NOT NULL,
  `tipo_despesa` VARCHAR(45) CHARACTER SET 'latin1' NOT NULL,
  `ativo` ENUM('0', '1') CHARACTER SET 'latin1' NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;