USE `m6prog`;
CREATE TABLE `imagetable`
(
    `idImagetable` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(250) NOT NULL,
    `path` VARCHAR(250) NOT NULL,
    `type` VARCHAR(100) NOT NULL,
    `tmp_name` VARCHAR(250) NOT NULL,
    `error` VARCHAR(10) NOT NULL,
    `size` INT NOT NULL,
    `uploadDateTime` DateTime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`idImagetable`),
    UNIQUE INDEX `idImagetable_UNIQUE` (`idImagetable` ASC) VISIBLE
);