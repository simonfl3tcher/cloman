CREATE TABLE `address` (
	`Address_ID` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`Address_Line_1` VARCHAR(150) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`Address_Line_2` VARCHAR(150) NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`Address_Line_3` VARCHAR(150) NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`City` VARCHAR(100) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`Region_Name` VARCHAR(100) NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	`Country_ID` INT(11) UNSIGNED NOT NULL DEFAULT '0',
	`Postcode` VARCHAR(10) NOT NULL DEFAULT '' COLLATE 'utf8_unicode_ci',
	PRIMARY KEY (`Address_ID`)
)
COLLATE='utf8_unicode_ci'
ENGINE=MyISAM
AUTO_INCREMENT=1052;
