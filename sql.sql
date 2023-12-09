
CREATE SCHEMA IF NOT EXISTS `projectDB` DEFAULT CHARACTER SET utf8 ;
USE `projectDB` ;

-- -----------------------------------------------------
-- Table `projectDB`.`PRODUIT`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectDB`.`PRODUIT` (
  `ID_PRODUIT` INT AUTO_INCREMENT PRIMARY KEY,
  `imageProduit` VARCHAR(45) NOT NULL,
  `nomProduit` VARCHAR(45) NOT NULL,
  `prixProduit` INT UNSIGNED NOT NULL)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projectDB`.`Employe`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectDB`.`Employe` (
  `ID_EMPLOYE` INT AUTO_INCREMENT PRIMARY KEY,
  `NOM_EMPLOYE` VARCHAR(45) NULL,
  `TELEPHONE` INT(10) NULL,
  `EMAIL` VARCHAR(255) NULL)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projectDB`.`ligne_command`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectDB`.`ligne_command` (
  `ID_LIGNE` INT AUTO_INCREMENT PRIMARY KEY,
  `qte` INT UNSIGNED NULL,
  `ID_PRODUIT` INT UNSIGNED NOT NULL,
  `prixTotal` INT UNSIGNED NULL,
  INDEX `ID_PRODUIT_idx` (`ID_PRODUIT` ASC) VISIBLE,
  CONSTRAINT `ID_PRODUIT`
    FOREIGN KEY (`ID_PRODUIT`)
    REFERENCES `projectDB`.`PRODUIT` (`ID_PRODUIT`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `projectDB`.`COMMANDE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `projectDB`.`COMMANDE` (
  `ID_COMMANDE` INT AUTO_INCREMENT PRIMARY KEY,
  `NUM_COMMANDE_QUOTIDIENNE` INT UNSIGNED ZEROFILL NULL,
  `MONTANT_COMMANDE` FLOAT NULL,
  `DATE_HEURE` DATETIME NULL,
  `id_ligne` INT(100) UNSIGNED NOT NULL,
  `ID_EMPLOYE` INT(100) UNSIGNED NOT NULL,
  INDEX `ID_LIGNE_idx` (`id_ligne` ASC) VISIBLE,
  INDEX `ID_EMPLOYER_idx` (`ID_EMPLOYE` ASC) VISIBLE,
  CONSTRAINT `ID_EMPLOYE`
    FOREIGN KEY (`ID_EMPLOYE`)
    REFERENCES `projectDB`.`Employe` (`ID_EMPLOYE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `ID_LIGNE`
    FOREIGN KEY (`id_ligne`)
    REFERENCES `projectDB`.`ligne_command` (`ID_LIGNE`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
