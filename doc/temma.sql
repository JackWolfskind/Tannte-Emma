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
  `kundeNR` INT NOT NULL,
  `kundeName` VARCHAR(45) NULL,
  `kundeVorname` VARCHAR(45) NULL,
  `kundeAdresse` VARCHAR(45) NULL,
  `kundeLieferhinweis` VARCHAR(45) NULL,
  PRIMARY KEY (`kundeNR`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Geschäftsart`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Geschäftsart` ;

CREATE TABLE IF NOT EXISTS `temma`.`Geschäftsart` (
  `ArtID` INT NOT NULL,
  `ArtBezeichnung` VARCHAR(45) NULL,
  PRIMARY KEY (`ArtID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Mitarbeiter`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Mitarbeiter` ;

CREATE TABLE IF NOT EXISTS `temma`.`Mitarbeiter` (
  `mitarbeiterNR` INT NOT NULL,
  `mitarbeiterName` VARCHAR(45) NULL,
  `mitarbeiterVorname` VARCHAR(45) NULL,
  `mitarbeiterTelefon` VARCHAR(45) NULL,
  `mitarbeiterAdresse` VARCHAR(45) NULL,
  PRIMARY KEY (`mitarbeiterNR`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Geschäfte`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Geschäfte` ;

CREATE TABLE IF NOT EXISTS `temma`.`Geschäfte` (
  `geschäftID` INT NOT NULL,
  `Geschäftecol` VARCHAR(45) NULL,
  `Kunde_kundeNR` INT NOT NULL,
  `Geschäftsart` INT NOT NULL,
  `Datum` VARCHAR(45) NULL,
  `angelegtVonMitarbeiter` INT NOT NULL,
  PRIMARY KEY (`geschäftID`),
  INDEX `fk_Geschäfte_Kunde_idx` (`Kunde_kundeNR` ASC),
  INDEX `fk_Geschäfte_Geschäftsart1_idx` (`Geschäftsart` ASC),
  INDEX `fk_Geschäfte_Mitarbeiter1_idx` (`angelegtVonMitarbeiter` ASC),
  CONSTRAINT `fk_Geschäfte_Kunde`
    FOREIGN KEY (`Kunde_kundeNR`)
    REFERENCES `temma`.`Kunde` (`kundeNR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Geschäfte_Geschäftsart1`
    FOREIGN KEY (`Geschäftsart`)
    REFERENCES `temma`.`Geschäftsart` (`ArtID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Geschäfte_Mitarbeiter1`
    FOREIGN KEY (`angelegtVonMitarbeiter`)
    REFERENCES `temma`.`Mitarbeiter` (`mitarbeiterNR`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `temma`.`Posten`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `temma`.`Posten` ;

CREATE TABLE IF NOT EXISTS `temma`.`Posten` (
  `geschäftID` INT NOT NULL,
  `artikelNR` INT NOT NULL,
  `artikelMenge` INT NULL,
  `postenID` VARCHAR(45) NOT NULL,
  INDEX `fk_Geschäfte_has_Artikel_Artikel1_idx` (`artikelNR` ASC),
  INDEX `fk_Geschäfte_has_Artikel_Geschäfte1_idx` (`geschäftID` ASC),
  PRIMARY KEY (`postenID`),
  CONSTRAINT `fk_Geschäfte_has_Artikel_Geschäfte1`
    FOREIGN KEY (`geschäftID`)
    REFERENCES `temma`.`Geschäfte` (`geschäftID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Geschäfte_has_Artikel_Artikel1`
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
