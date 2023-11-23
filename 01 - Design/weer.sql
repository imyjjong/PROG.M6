CREATE SCHEMA IF NOT EXISTS weer;
USE weer;
CREATE TABLE IF NOT EXISTS weersomstandighedenPerdag(
    idWeersomstandighedenPerDag INT UNSIGNED NOT NULL AUTO_INCREMENT,
    datum DATE NOT NULL,
    plaats VARCHAR(120) NOT NULL,
    graden DECIMAL NOT NULL,
    windkracht INT UNSIGNED NOT NULL AUTO_INCREMENT,
    regenInMilimeters DECIMAL NOT NULL,
    PRIMARY KEY (idWeersomstandighedenPerDag),
    UNIQUE INDEX idWeersomstandighedenPerDag_UNIQUE (idWeersomstandighedenPerDag ASC) VISIBLE,
);