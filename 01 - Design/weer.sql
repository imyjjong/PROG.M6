CREATE SCHEMA `weer`;
USE `weer`;

CREATE TABLE `weersomstandigheden`
(
    `idWeersomstandigheden` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `datum` DATE NOT NULL,
    `plaats` VARCHAR(120) NOT NULL,
    `graden` DECIMAL NOT NULL,
    `windkracht` INT UNSIGNED NOT NULL,
    `regenInMilimeters` DECIMAL NOT NULL,
    PRIMARY KEY (`idWeersomstandigheden`),
    UNIQUE INDEX `idWeersomstandigheden_UNIQUE` (`idWeersomstandigheden` ASC) VISIBLE
);