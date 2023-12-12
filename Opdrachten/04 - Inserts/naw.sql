CREATE SCHEMA `m6prog`;
USE `m6prog`;
CREATE TABLE `naw`
(
    `idNaw` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `naam` VARCHAR(100) NOT NULL,
    `straat` VARCHAR(100) NOT NULL,
    `huisnummer` VARCHAR(6) NOT NULL,
    `postcode` VARCHAR(6) NOT NULL,
    `email` VARCHAR(120) NOT NULL,
    PRIMARY KEY (`idNaw`),
    UNIQUE INDEX `idNaw_UNIQUE` (`idNaw` ASC) VISIBLE
);