-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema temma
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema temma
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `temma` DEFAULT CHARACTER SET utf8 ;
USE `temma` ;

-- -----------------------------------------------------
-- Table `temma`.`Artikel`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Artikel` ;

CREATE TABLE IF NOT EXISTS `temma`.`Artikel` (
  `artikelNR` INT NOT NULL AUTO_INCREMENT,
  `artikelBezeichnung` VARCHAR(45) NULL,
  `artikelPreis` INT NULL,
  `artikelBestand` INT NULL,
  PRIMARY KEY (`artikelNR`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Kunde`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Kunde` ;

CREATE TABLE IF NOT EXISTS `temma`.`Kunde` (
  `kundeNR` INT NOT NULL AUTO_INCREMENT,
  `kundeName` VARCHAR(45) NULL,
  `kundeVorname` VARCHAR(45) NULL,
  `kundeAdresse` VARCHAR(45) NULL,
  `kundeLieferhinweis` VARCHAR(45) NULL,
  PRIMARY KEY (`kundeNR`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Geschaeftsart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Geschaeftsart` ;

CREATE TABLE IF NOT EXISTS `temma`.`Geschaeftsart` (
  `ArtID` INT NOT NULL AUTO_INCREMENT,
  `ArtBezeichnung` VARCHAR(45) NULL,
  PRIMARY KEY (`ArtID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Mitarbeiter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Mitarbeiter` ;

CREATE TABLE IF NOT EXISTS `temma`.`Mitarbeiter` (
  `mitarbeiterID` VARCHAR(5) NOT NULL,
  `mitarbeiterName` VARCHAR(45) NULL,
  `mitarbeiterVorname` VARCHAR(45) NULL,
  `mitarbeiterTelefon` VARCHAR(45) NULL,
  `mitarbeiterAdresse` VARCHAR(45) NULL,
  `passwd` VARCHAR(255) NULL,
  PRIMARY KEY (`mitarbeiterID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Geschaefte`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Geschaefte` ;

CREATE TABLE IF NOT EXISTS `temma`.`Geschaefte` (
  `geschaeftID` INT NOT NULL AUTO_INCREMENT,
  `Datum` VARCHAR(45) NULL,
  `Geschaeftsart` INT NOT NULL,
  `kundeNR` INT NOT NULL,
  `angelegtVon` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`geschaeftID`),
  INDEX `fk_Geschaefte_Geschaeftsart1_idx` (`Geschaeftsart` ASC),
  INDEX `fk_Geschaefte_Kunde1_idx` (`kundeNR` ASC),
  INDEX `fk_Geschaefte_Mitarbeiter1_idx` (`angelegtVon` ASC),
  CONSTRAINT `fk_Geschaefte_Geschaeftsart1`
    FOREIGN KEY (`Geschaeftsart`)
    REFERENCES `temma`.`Geschaeftsart` (`ArtID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Geschaefte_Kunde1`
    FOREIGN KEY (`kundeNR`)
    REFERENCES `temma`.`Kunde` (`kundeNR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Geschaefte_Mitarbeiter1`
    FOREIGN KEY (`angelegtVon`)
    REFERENCES `temma`.`Mitarbeiter` (`mitarbeiterID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Posten`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Posten` ;

CREATE TABLE IF NOT EXISTS `temma`.`Posten` (
  `artikelNR` INT NOT NULL,
  `artikelMenge` INT NULL,
  `postenID` INT NOT NULL AUTO_INCREMENT,
  `geschaeftID` INT NOT NULL,
  INDEX `fk_Geschaefte_has_Artikel_Artikel1_idx` (`artikelNR` ASC),
  PRIMARY KEY (`postenID`),
  INDEX `fk_Posten_Geschaefte1_idx` (`geschaeftID` ASC),
  CONSTRAINT `fk_Geschaefte_has_Artikel_Artikel1`
    FOREIGN KEY (`artikelNR`)
    REFERENCES `temma`.`Artikel` (`artikelNR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Posten_Geschaefte1`
    FOREIGN KEY (`geschaeftID`)
    REFERENCES `temma`.`Geschaefte` (`geschaeftID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
