CREATE TABLE  `my.company`.`access_levels` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Level_Status` varchar(50) DEFAULT 'customer',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8