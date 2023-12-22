UPDATE `imagetable` SET `uploadDateTime` = DATE_ADD(`uploadDateTime`, INTERVAL -31 DAY);
UPDATE `imagetable` SET `uploadDateTime` = DATE_ADD(`uploadDateTime`, INTERVAL -1 YEAR);