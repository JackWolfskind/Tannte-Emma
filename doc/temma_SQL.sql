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
CREATE DATABASE IF NOT EXISTS `temma`;
USE `temma` ;

DROP TABLE IF EXISTS Artikel;
DROP TABLE IF EXISTS Geschaefte;
DROP TABLE IF EXISTS Mitarbeiter;
DROP TABLE IF EXISTS Geschaeftsart;
DROP TABLE IF EXISTS Warenkorb;
DROP TABLE IF EXISTS Kunde;

-- -----------------------------------------------------
-- Table `temma`.`Artikel`
-- -----------------------------------------------------
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
CREATE TABLE IF NOT EXISTS `temma`.`Kunde` (
  `kundeNR` INT NOT NULL,
  `kundeName` VARCHAR(45) NULL,
  `kundeVorname` VARCHAR(45) NULL,
  `kundeAdresse` VARCHAR(45) NULL,
  `kundeLieferhinweis` VARCHAR(45) NULL,
  PRIMARY KEY (`kundeNR`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Geschaeftsart`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `temma`.`Geschaeftsart` (
  `ArtID` INT NOT NULL,
  `ArtBezeichnung` VARCHAR(45) NULL,
  PRIMARY KEY (`ArtID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Mitarbeiter`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `temma`.`Mitarbeiter` (
  `mitarbeiterNR` INT NOT NULL,
  `mitarbeiterName` VARCHAR(45) NULL,
  `mitarbeiterVorname` VARCHAR(45) NULL,
  `mitarbeiterTelefon` VARCHAR(45) NULL,
  `mitarbeiterAdresse` VARCHAR(45) NULL,
  PRIMARY KEY (`mitarbeiterNR`))
ENGINE = InnoDB;


-- CREATE TABLE IF NOT EXISTS `temma`.`TEST` (
--   `BLahID` INT NOT NULL,
--   `name` VARCHAR(45) NULL,
--   `Vorname` VARCHAR(45) NULL,
--   `Telefon` VARCHAR(45) NULL,
--   `Adresse` VARCHAR(45) NULL,
--   PRIMARY KEY (`BLahID`))
-- ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Geschaefte`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `temma`.`Geschaefte` (
  `geschaeftID` INT NOT NULL,
  `Geschaeftecol` VARCHAR(45) NULL,
  `Kunde_kundeNR` INT NOT NULL,
  `Geschaeftsart` INT NOT NULL,
  `Datum` VARCHAR(45) NULL,
  `angelegtVonMitarbeiter` INT NOT NULL,
  PRIMARY KEY (`geschaeftID`),
  INDEX `fk_Geschaefte_Kunde_idx` (`Kunde_kundeNR` ASC),
  INDEX `fk_Geschaefte_Geschaeftsart1_idx` (`Geschaeftsart` ASC),
  INDEX `fk_Geschaefte_Mitarbeiter1_idx` (`angelegtVonMitarbeiter` ASC),
  CONSTRAINT `fk_Geschaefte_Kunde`
    FOREIGN KEY (`Kunde_kundeNR`)
    REFERENCES `temma`.`Kunde` (`kundeNR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Geschaefte_Geschaeftsart1`
    FOREIGN KEY (`Geschaeftsart`)
    REFERENCES `temma`.`Geschaeftsart` (`ArtID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Geschaefte_Mitarbeiter1`
    FOREIGN KEY (`angelegtVonMitarbeiter`)
    REFERENCES `temma`.`Mitarbeiter` (`mitarbeiterNR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Warenkorb`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `temma`.`Warenkorb` (
  `warenkorbID` INT NOT NULL AUTO_INCREMENT,
  `geschaeftID` INT NOT NULL,
  `artikelNR` INT NOT NULL,
  `artikelMenge` INT NULL,
  PRIMARY KEY (`warenkorbID`),
  INDEX `fk_Geschaefte_has_Artikel_Artikel1_idx` (`artikelNR` ASC),
  INDEX `fk_Geschaefte_has_Artikel_Geschaefte1_idx` (`geschaeftID` ASC),
    FOREIGN KEY (`geschaeftID`)
    REFERENCES `temma`.`Geschaefte` (`geschaeftID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    FOREIGN KEY (`artikelNR`)
    REFERENCES `temma`.`Artikel` (`artikelNR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
INSERT INTO Geschaeftsart (`ArtID`,`ArtBezeichnung`) VALUES (0, "Anlieferung");
INSERT INTO Geschaeftsart (`ArtID`,`ArtBezeichnung`) VALUES (1, "Lieferverkauf");
INSERT INTO Geschaeftsart (`ArtID`,`ArtBezeichnung`) VALUES (2, "Ladenverkauf");
INSERT INTO Artikel (`artikelBezeichnung`,`artikelPreis`,`artikelBestand`) VALUES ("Stuhl",10,3);
INSERT INTO Artikel (`artikelBezeichnung`,`artikelPreis`,`artikelBestand`) VALUES ("Tisch",150,5);
INSERT INTO Artikel (`artikelBezeichnung`,`artikelPreis`,`artikelBestand`) VALUES ("Bettt",200,1);