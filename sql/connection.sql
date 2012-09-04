CREATE TABLE  `my.company`.`connection` (
  `Connection_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Business_ID` int(11) unsigned DEFAULT NULL,
  `Solution` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Url` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `Username` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Connection_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci