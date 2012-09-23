-- --------------------------------------------------------
-- Host:                         
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-09-23 23:18:06
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET FOREIGN_KEY_CHECKS=0 */;

-- Dumping structure for table my.company.address
DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `Address_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Address_Line_1` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Address_Line_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `Address_Line_3` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `City` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Region_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `Postcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Address_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.address: 5 rows
DELETE FROM `address`;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` (`Address_ID`, `Address_Line_1`, `Address_Line_2`, `Address_Line_3`, `City`, `Region_Name`, `Postcode`) VALUES
	(1, '2 Gelbe House', 'Woolpit', 'Rattlesden', 'Stowmarket', '', 'IP29 1LD'),
	(15, '29 Wrights Way', 'Woolpit', 'Suffolk', 'Bury St Edmunds', '', 'ip30 9ty'),
	(14, '29 Wrights Way', 'Woolpit', 'Suffolk', 'Bury St Edmunds', '', 'IP30 9TY'),
	(13, '2 Gelbe House', 'Woolpit', 'Rattlesden', 'Stowmarket', '', 'IP30 9TY'),
	(12, '29 Wrights Way', 'Woolpit', 'Rattlesden', 'Stowmarket', '', 'IP30 9TY'),
	(11, '29 Wrights Way', 'Woolpit', 'Suffolk', 'Bury St Edmunds', '', 'ip30 9ty'),
	(10, '2 Gelbe House', 'Woolpit', 'Suffolk', 'Bury St Edmunds', '', 'IP30 9TY'),
	(16, '2 Gelbe House', 'Woolpit', 'Rattlesden', 'Bury St Edmunds', '', 'ip30 9ty'),
	(17, '2 Gelbe House', 'Woolpit', 'England', 'Stowmarket', '', 'IP29 1LD'),
	(18, 'Hello Roadyu', 'Walsham', 'Suffolk', 'Bury St Edmunds', 'England', 'IP30 9ty'),
	(19, '2 Gelbe House', 'Woolpit', 'Suffolk', 'Stowmarket', 'England', 'IP30 9TY');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;


-- Dumping structure for table my.company.businesses
DROP TABLE IF EXISTS `businesses`;
CREATE TABLE IF NOT EXISTS `businesses` (
  `business_id` int(10) NOT NULL AUTO_INCREMENT,
  `address_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `disabled` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`business_id`),
  KEY `business_id` (`business_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.businesses: ~14 rows (approximately)
DELETE FROM `businesses`;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
INSERT INTO `businesses` (`business_id`, `address_id`, `name`, `phone`, `email`, `disabled`) VALUES
	(1, NULL, 'Logic Design', '01284706842', 'hello@logicdesign.co.uk', 'N'),
	(2, '18', 'Big Earth', '0207 657 2727', 'office@bigearth.co.uk', 'N'),
	(3, NULL, 'Nicola Sexton', '01284 760011', 'info@nicolasexton.co.uk', 'N'),
	(6, '10', 'Display World', '01284 345345', 'hello@displayworld.co.uk', 'N'),
	(9, '0', 'Reason Marketing', '01284 456 456', 'howie@reason.co.uk', 'N'),
	(10, '11', '', '', '', 'Y'),
	(11, '0', 'Finns Freelancer', '01284 345345', 'finn@finn.co.uk', 'N'),
	(12, '12', 'Kats Designs', '01284 345 345', 'kat@logicdesign.co.uk', 'N'),
	(15, '13', 'Waitrose', '10', 'finn@finn.co.uk', 'N'),
	(16, '0', '', '', '', 'Y'),
	(17, '0', '', '', '', 'Y'),
	(18, '19', 'Logic Two', '01284 345 345', 'finn@finn.co.uk', 'N'),
	(19, '0', 'Logic Two', '10', 'finn@finn.co.uk', 'Y'),
	(20, '0', 'fdgfdgsd', 'fsdfdsf', 'fddsf', 'N'),
	(21, '14', 'John Lewis', '0184 706842', 'john@lewis.com', 'Y'),
	(22, '15', 'John Lewis', '0184 706842', 'john@lewis.com', 'Y'),
	(23, '16', 'Simon Fletcher Designs', '10', 'hello@logicdesign.co.uk', 'N'),
	(24, '0', 'David Fulcher', '01284 345778', 'david@logicdesign.co.uk', 'Y'),
	(25, '17', 'David Fulcher - 2', '01284 345 345', 'david@logicdesign.co.uk', 'N');
/*!40000 ALTER TABLE `businesses` ENABLE KEYS */;


-- Dumping structure for table my.company.business_to_people
DROP TABLE IF EXISTS `business_to_people`;
CREATE TABLE IF NOT EXISTS `business_to_people` (
  `b2p_id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` int(10) DEFAULT '0',
  `people_id` int(10) DEFAULT '0',
  PRIMARY KEY (`b2p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.business_to_people: ~16 rows (approximately)
DELETE FROM `business_to_people`;
/*!40000 ALTER TABLE `business_to_people` DISABLE KEYS */;
INSERT INTO `business_to_people` (`b2p_id`, `business_id`, `people_id`) VALUES
	(7, 0, 44),
	(11, 0, 52),
	(14, 20, 54),
	(15, 1, 55),
	(17, 0, 56),
	(19, 1, 43),
	(23, 10, 57),
	(29, 0, 58),
	(31, 0, 50),
	(32, 1, 51),
	(33, 23, 51),
	(34, 24, 0),
	(36, 1, 53),
	(38, 1, 49),
	(39, 3, 49),
	(42, NULL, 51),
	(44, 6, 53),
	(45, 6, 44),
	(46, 6, 50),
	(51, 25, 51),
	(52, 25, 50),
	(56, 2, 51),
	(57, 2, 50),
	(58, 2, 49),
	(59, 18, 51),
	(60, 18, 50);
/*!40000 ALTER TABLE `business_to_people` ENABLE KEYS */;


-- Dumping structure for table my.company.connections
DROP TABLE IF EXISTS `connections`;
CREATE TABLE IF NOT EXISTS `connections` (
  `connection_id` int(10) NOT NULL AUTO_INCREMENT,
  `website_id` int(10) DEFAULT NULL,
  `connection_options_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `notes` text,
  PRIMARY KEY (`connection_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.connections: ~0 rows (approximately)
DELETE FROM `connections`;
/*!40000 ALTER TABLE `connections` DISABLE KEYS */;
/*!40000 ALTER TABLE `connections` ENABLE KEYS */;


-- Dumping structure for table my.company.connection_options
DROP TABLE IF EXISTS `connection_options`;
CREATE TABLE IF NOT EXISTS `connection_options` (
  `connection_options_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`connection_options_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.connection_options: ~0 rows (approximately)
DELETE FROM `connection_options`;
/*!40000 ALTER TABLE `connection_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `connection_options` ENABLE KEYS */;


-- Dumping structure for table my.company.people
DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `people_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `is_primary_contact` enum('Y','N') DEFAULT 'N',
  `notes` text,
  `disabled` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`people_id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.people: ~5 rows (approximately)
DELETE FROM `people`;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` (`people_id`, `name`, `role`, `email`, `phone`, `is_primary_contact`, `notes`, `disabled`) VALUES
	(44, 'Charlie Robinson', 'Website Developer', 'simon@logicdesign.co.uk', '10', 'N', 'sdfsgdhg', 'Y'),
	(48, 'Charlie Robinson', 'Website Developer', 'david@williams.co.uk', '01284 345345', 'N', '', 'Y'),
	(49, 'Finn Johnson', 'Website Designer / Studio Manager', 'finn@logicdesign.co.uk', '', 'N', 'Finn is the senior designer and studio manager', 'N'),
	(50, 'Keith Bradley', 'Website Developer', 'keith@logicdesign.co.uk', '', 'N', 'Keith is the senior web developer and Managing Director at logic design', 'Y'),
	(51, 'Howie', 'Media Consultant', 'howie@logicdesign.co.uk', '01284 706842', 'N', 'Media Consultant here at logic design', 'N'),
	(52, 'Howie', 'Managing DIrector', 'howie@logicdesign.co.uk', '01284 706842', 'N', 'He is a hardd working individual', 'N'),
	(53, 'Simon Fletcher', 'Managing Director', 'simon@logicdesign.co.uk', '01284 345 345 ', 'N', 'This is the same as any other contact being added into the system.', 'N');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;


-- Dumping structure for table my.company.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` varchar(255) DEFAULT NULL,
  `project_manager` varchar(255) DEFAULT NULL,
  `status` enum('Y','N') DEFAULT NULL,
  `project_type` varchar(255) DEFAULT NULL,
  `project_people` varchar(255) DEFAULT NULL,
  `project_users` varchar(255) DEFAULT NULL,
  `client_deadline` datetime DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.projects: ~0 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;


-- Dumping structure for table my.company.support_packs
DROP TABLE IF EXISTS `support_packs`;
CREATE TABLE IF NOT EXISTS `support_packs` (
  `support_packs_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `includes` text,
  `time_allowed_pm` int(11) DEFAULT NULL,
  PRIMARY KEY (`support_packs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.support_packs: ~0 rows (approximately)
DELETE FROM `support_packs`;
/*!40000 ALTER TABLE `support_packs` DISABLE KEYS */;
/*!40000 ALTER TABLE `support_packs` ENABLE KEYS */;


-- Dumping structure for table my.company.support_packs_to_businesses
DROP TABLE IF EXISTS `support_packs_to_businesses`;
CREATE TABLE IF NOT EXISTS `support_packs_to_businesses` (
  `sptb_id` int(10) NOT NULL AUTO_INCREMENT,
  `businesses_id` int(10) DEFAULT NULL,
  `support_pack_id` int(10) DEFAULT NULL,
  `reminder` enum('Y','N') NOT NULL DEFAULT 'N',
  `reminder_when` datetime DEFAULT NULL,
  PRIMARY KEY (`sptb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.support_packs_to_businesses: ~0 rows (approximately)
DELETE FROM `support_packs_to_businesses`;
/*!40000 ALTER TABLE `support_packs_to_businesses` DISABLE KEYS */;
/*!40000 ALTER TABLE `support_packs_to_businesses` ENABLE KEYS */;


-- Dumping structure for table my.company.tasks
DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(10) NOT NULL AUTO_INCREMENT,
  `assign_to` varchar(255) DEFAULT NULL,
  `task_type_id` varchar(255) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `est_completion` varchar(255) DEFAULT NULL,
  `task` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `complete` enum('Y','N') DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.tasks: ~0 rows (approximately)
DELETE FROM `tasks`;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;


-- Dumping structure for table my.company.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table my.company.websites
DROP TABLE IF EXISTS `websites`;
CREATE TABLE IF NOT EXISTS `websites` (
  `website_id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` int(10) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.websites: ~0 rows (approximately)
DELETE FROM `websites`;
/*!40000 ALTER TABLE `websites` DISABLE KEYS */;
/*!40000 ALTER TABLE `websites` ENABLE KEYS */;
/*!40014 SET FOREIGN_KEY_CHECKS=1 */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
