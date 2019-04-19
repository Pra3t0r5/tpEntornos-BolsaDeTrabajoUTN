-- MySQL Script generated by MySQL Workbench
-- Fri Apr 19 15:45:37 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bolsadetrabajoutn
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `bolsadetrabajoutn` ;

-- -----------------------------------------------------
-- Schema bolsadetrabajoutn
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bolsadetrabajoutn` DEFAULT CHARACTER SET utf8 ;
USE `bolsadetrabajoutn` ;

-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`Cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`Cliente` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`Cliente` (
  `idCliente` INT(9) NOT NULL,
  `nombreCliente` VARCHAR(45) NULL,
  `apellidoCliente` VARCHAR(45) NULL,
  `emailCliente` VARCHAR(45) NULL,
  `telefonoCliente` INT NULL,
  `usuCliente` VARCHAR(45) NULL,
  `contCliente` VARCHAR(45) NULL,
  `dniCliente` INT(9) NULL,
  `domicilioCliente` VARCHAR(45) NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`Provincia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`Provincia` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`Provincia` (
  `idProvincia` INT(9) NOT NULL,
  `descProvincia` VARCHAR(45) NULL,
  PRIMARY KEY (`idProvincia`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`Localidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`Localidad` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`Localidad` (
  `idLocalidad` INT(9) NOT NULL,
  `descLocalidad` VARCHAR(45) NULL,
  INDEX `idProvincia_idx` (`idLocalidad` ASC) VISIBLE,
  CONSTRAINT `FKidProvincia`
    FOREIGN KEY (`idLocalidad`)
    REFERENCES `bolsadetrabajoutn`.`Provincia` (`idProvincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`OfertaLaboral`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`OfertaLaboral` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`OfertaLaboral` (
  `idOfertaLaboral` INT(9) NOT NULL,
  `descOferta` VARCHAR(45) NULL,
  `modalidadOferta` VARCHAR(45) NULL,
  `horarioLaboral` VARCHAR(45) NULL,
  `remuneracion` FLOAT NULL,
  PRIMARY KEY (`idOfertaLaboral`),
  CONSTRAINT `FKidLocalidad`
    FOREIGN KEY (`idOfertaLaboral`)
    REFERENCES `bolsadetrabajoutn`.`Localidad` (`idLocalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`Contratista`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`Contratista` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`Contratista` (
  `idContratista` INT(9) NOT NULL,
  `nombreContratista` VARCHAR(45) NULL,
  `descContratista` VARCHAR(45) NULL,
  PRIMARY KEY (`idContratista`),
  CONSTRAINT `FKLocalidad`
    FOREIGN KEY (`idContratista`)
    REFERENCES `bolsadetrabajoutn`.`Localidad` (`idLocalidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`Postulaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`Postulaciones` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`Postulaciones` (
  `idPostulaciones` INT(9) NOT NULL,
  `cvElegido` BLOB NULL,
  PRIMARY KEY (`idPostulaciones`),
  CONSTRAINT `FKidOfertaLaboral`
    FOREIGN KEY (`idPostulaciones`)
    REFERENCES `bolsadetrabajoutn`.`OfertaLaboral` (`idOfertaLaboral`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`CurriculumVitae`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`CurriculumVitae` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`CurriculumVitae` (
  `idCurriculumVitae` INT(9) NOT NULL,
  `curriculumVitae` BLOB NULL,
  PRIMARY KEY (`idCurriculumVitae`),
  CONSTRAINT `FKidCliente`
    FOREIGN KEY (`idCurriculumVitae`)
    REFERENCES `bolsadetrabajoutn`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`Administrador`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`Administrador` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`Administrador` (
  `idAdministrador` INT NOT NULL,
  `nivelAcceso` VARCHAR(45) NULL,
  `nombreAdm` VARCHAR(45) NULL,
  `apeAdm` VARCHAR(45) NULL,
  `dniAdm` INT(9) NULL,
  `emailAdm` VARCHAR(45) NULL,
  `usuAdm` VARCHAR(45) NULL,
  `contAdm` VARCHAR(45) NULL,
  `telefonoAdm` INT NULL,
  `domicilioAdm` VARCHAR(45) NULL,
  PRIMARY KEY (`idAdministrador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`Cliente_Postulaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`Cliente_Postulaciones` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`Cliente_Postulaciones` (
  `idCliente` INT NOT NULL,
  `idPostulaciones` INT NOT NULL,
  PRIMARY KEY (`idCliente`, `idPostulaciones`),
  INDEX `FKPos_idx` (`idPostulaciones` ASC) VISIBLE,
  CONSTRAINT `FKCli`
    FOREIGN KEY (`idCliente`)
    REFERENCES `bolsadetrabajoutn`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FKPos`
    FOREIGN KEY (`idPostulaciones`)
    REFERENCES `bolsadetrabajoutn`.`Postulaciones` (`idPostulaciones`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bolsadetrabajoutn`.`Contratista_OfertaLaboral`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bolsadetrabajoutn`.`Contratista_OfertaLaboral` ;

CREATE TABLE IF NOT EXISTS `bolsadetrabajoutn`.`Contratista_OfertaLaboral` (
  `idContratista` INT NOT NULL,
  `idOfertaLaboral` INT NOT NULL,
  PRIMARY KEY (`idContratista`, `idOfertaLaboral`),
  INDEX `FKidOfertaLaboral_idx` (`idOfertaLaboral` ASC) VISIBLE,
  CONSTRAINT `FKidContratista`
    FOREIGN KEY (`idContratista`)
    REFERENCES `bolsadetrabajoutn`.`Contratista` (`idContratista`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FKOfertaLaboral`
    FOREIGN KEY (`idOfertaLaboral`)
    REFERENCES `bolsadetrabajoutn`.`OfertaLaboral` (`idOfertaLaboral`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
