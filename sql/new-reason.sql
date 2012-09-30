-- --------------------------------------------------------
-- Host:                         
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-09-30 23:46:12
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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.address: 17 rows
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
	(19, '2 Gelbe House', 'Woolpit', 'Suffolk', 'Stowmarket', 'England', 'IP30 9TY'),
	(20, '29 Wirghts Way', 'Woolpit', '', 'Bury St Edmunds', 'Suffolk', 'IP30 9Ty'),
	(21, 'West Suffolk Hospital', 'Hardwick Lane', '', 'Bury St Edmunds', 'Suffolk', 'IP33 2QZ'),
	(22, 'West Suffolk Hospital', 'Hardwick Lane', '', 'Bury St Edmunds', 'Suffolk', 'IP33 2QZ'),
	(23, 'West Suffolk Hospital', 'Hardwick Lane', '', 'Bury St Edmunds', 'Suffolk', 'IP33 2QZ'),
	(24, '29 Wirghts Way', 'Hardwick Lane', '', 'Bury St Edmunds', 'Suffolk', 'IP33 2QZ'),
	(25, '2 Gelbe House', 'Woolpit', 'Suffolk', 'Stowmarket', 'England', 'IP30 9TY');
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.businesses: ~22 rows (approximately)
DELETE FROM `businesses`;
/*!40000 ALTER TABLE `businesses` DISABLE KEYS */;
INSERT INTO `businesses` (`business_id`, `address_id`, `name`, `phone`, `email`, `disabled`) VALUES
	(1, '0', 'Logic Design', '01284706842', 'hello@logicdesign.co.uk', 'N'),
	(2, '18', 'Big Earth', '0207 657 2727', 'office@bigearth.co.uk', 'N'),
	(3, '0', 'Nicola Sexton', '01284 760011', 'info@nicolasexton.co.uk', 'N'),
	(6, '10', 'Display World', '01284 345345', 'hello@displayworld.co.uk', 'N'),
	(9, '0', 'Reason Marketing', '01284 456 456', 'howie@reason.co.uk', 'N'),
	(11, '0', 'Finns Freelancer', '01284 345345', 'finn@finn.co.uk', 'N'),
	(12, '12', 'Kats Designs', '01284 345 345', 'kat@logicdesign.co.uk', 'N'),
	(15, '13', 'Waitrose', '10', 'finn@finn.co.uk', 'N'),
	(18, '19', 'Logic Two', '01284 345 345', 'finn@finn.co.uk', 'Y'),
	(19, '0', 'Logic Two', '10', 'finn@finn.co.uk', 'Y'),
	(20, '0', 'fdgfdgsd', 'fsdfdsf', 'fddsf', 'N'),
	(21, '14', 'John Lewis', '0184 706842', 'john@lewis.com', 'N'),
	(22, '15', 'John Lewis', '0184 706842', 'john@lewis.com', 'N'),
	(23, '16', 'Simon Fletcher Designs', '10', 'hello@logicdesign.co.uk', 'N'),
	(24, '0', 'David Fulcher', '01284 345778', 'david@logicdesign.co.uk', 'N'),
	(25, '17', 'David Fulcher - 2', '01284 345 345', 'david@logicdesign.co.uk', 'N'),
	(26, '20', 'Sam Hunt Artistry', '01284 706842', 'sam@hunt.co.uk', 'N'),
	(27, '21', 'NHS', '01284 706842', 'hello@nhs.co.uk', 'N'),
	(28, '22', 'NHS 2 ', '01284 706842', 'hello@nhs.co.uk', 'N'),
	(29, '23', 'Sam Hunt Artistry', '01284 706842', 'sam@hunt.co.uk', 'N'),
	(30, '24', 'NHS 2', '01284 706842', 'hello@nhs.co.uk', 'N'),
	(32, '25', 'Adams Pottery', '01284 706842', 'adam@pottery.co.uk', 'Y');
/*!40000 ALTER TABLE `businesses` ENABLE KEYS */;


-- Dumping structure for table my.company.business_to_people
DROP TABLE IF EXISTS `business_to_people`;
CREATE TABLE IF NOT EXISTS `business_to_people` (
  `b2p_id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` int(10) DEFAULT '0',
  `people_id` int(10) DEFAULT '0',
  PRIMARY KEY (`b2p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.business_to_people: ~34 rows (approximately)
DELETE FROM `business_to_people`;
/*!40000 ALTER TABLE `business_to_people` DISABLE KEYS */;
INSERT INTO `business_to_people` (`b2p_id`, `business_id`, `people_id`) VALUES
	(7, 0, 44),
	(11, 0, 52),
	(15, 1, 55),
	(19, 1, 43),
	(23, 10, 57),
	(32, 1, 51),
	(33, 23, 51),
	(34, 24, 0),
	(36, 1, 53),
	(42, NULL, 51),
	(44, 6, 53),
	(45, 6, 44),
	(51, 25, 51),
	(56, 2, 51),
	(59, 18, 51),
	(64, 28, 55),
	(65, 28, 56),
	(66, 29, 57),
	(67, 1, 49),
	(68, 3, 49),
	(69, 2, 49),
	(70, 28, 49),
	(71, 31, 0),
	(72, 1, 59),
	(74, 6, 50),
	(75, 25, 50),
	(76, 2, 50),
	(77, 18, 50),
	(78, 26, 50),
	(79, 27, 50),
	(82, 1, 54),
	(84, 32, 54),
	(85, 32, 51),
	(86, 1, 58);
/*!40000 ALTER TABLE `business_to_people` ENABLE KEYS */;


-- Dumping structure for table my.company.connections
DROP TABLE IF EXISTS `connections`;
CREATE TABLE IF NOT EXISTS `connections` (
  `connection_id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` int(10) DEFAULT NULL,
  `connection_options_id` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `username_two` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `notes` text,
  `disabled` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`connection_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.connections: ~21 rows (approximately)
DELETE FROM `connections`;
/*!40000 ALTER TABLE `connections` DISABLE KEYS */;
INSERT INTO `connections` (`connection_id`, `business_id`, `connection_options_id`, `username`, `username_two`, `password`, `url`, `notes`, `disabled`) VALUES
	(1, NULL, 3, 'logicdesign', '0', 'logicdesign123', 'www.google.com', NULL, 'N'),
	(2, 12, 3, 'logicdesign', '', 'logicdesign123', 'www.google.com', NULL, 'N'),
	(3, 0, 5, '', '', '', '', NULL, 'Y'),
	(4, 9, 6, 'example1', '', 'logicdesign123', 'www.google.com', NULL, 'N'),
	(5, 9, 3, 'example1', '', 'logicdesign123', 'www.google.com', NULL, 'N'),
	(6, 9, 7, 'logicdesign123', 'Logicdesign2', 'logicdesign12322', 'test.sagepay.co.uk/MySagePay', NULL, 'N'),
	(7, 0, 1, '', '', '', '', NULL, 'N'),
	(8, 0, 8, 'sdfdsf', '', '', 'sdfsd', NULL, 'N'),
	(9, 9, 1, '', '', '', '', NULL, 'Y'),
	(10, 21, 5, 'sfdf', 'fff', '123456', 'www.google.com', NULL, 'N'),
	(11, 1, 4, '123', '123', '12345689', '', NULL, 'Y'),
	(12, 1, 4, '213', '123', '132', '', NULL, 'Y'),
	(13, 0, 9, '', '', '', '', NULL, 'N'),
	(14, 0, 10, 'hgvhv', '', '', '', NULL, 'N'),
	(15, 1, 11, '', '', 'hhhh', '', NULL, 'Y'),
	(16, 0, 1, '', '', '', '', NULL, 'N'),
	(17, 2, 5, '123123', '123123', 'ioi', 'www.google.com', NULL, 'N'),
	(18, 9, 1, 'fgfg', '', 'fgfg', '', NULL, 'Y'),
	(19, 9, 5, 'mo', 'mo', '123456', 'moose1.com', NULL, 'N'),
	(20, 1, 13, 'logicdesign', '', 'logicdesign123', 'hello@google.com', NULL, 'N'),
	(21, 21, 4, 'logicdesign', 'logicdesign', 'logicdesign123', 'www.opencart.co.uk', NULL, 'Y');
/*!40000 ALTER TABLE `connections` ENABLE KEYS */;


-- Dumping structure for table my.company.connection_options
DROP TABLE IF EXISTS `connection_options`;
CREATE TABLE IF NOT EXISTS `connection_options` (
  `connection_options_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`connection_options_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.connection_options: ~13 rows (approximately)
DELETE FROM `connection_options`;
/*!40000 ALTER TABLE `connection_options` DISABLE KEYS */;
INSERT INTO `connection_options` (`connection_options_id`, `name`) VALUES
	(1, 'ftp'),
	(2, 'wodpress'),
	(3, 'cs-cart'),
	(4, 'Opencart'),
	(5, 'Sagepay'),
	(6, 'Wordpress Login'),
	(7, 'Sagepay Test Account'),
	(8, 'dfdsfds'),
	(9, 'ihkjjkjl'),
	(10, 'iyhuhkj'),
	(11, 'hybjhkh'),
	(12, 'Moose'),
	(13, 'Sagepay Live Account');
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.people: ~13 rows (approximately)
DELETE FROM `people`;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` (`people_id`, `name`, `role`, `email`, `phone`, `is_primary_contact`, `notes`, `disabled`) VALUES
	(44, 'Charlie Robinson', 'Website Developer', 'simon@logicdesign.co.uk', '10', 'N', 'sdfsgdhg', 'Y'),
	(48, 'Charlie Robinson', 'Website Developer', 'david@williams.co.uk', '01284 345345', 'N', '', 'Y'),
	(49, 'Finn Johnson', 'Website Designer / Studio Manager', 'finn@logicdesign.co.uk', '', 'N', 'Finn is the senior designer and studio manager', 'N'),
	(50, 'Keith Bradley', 'Website Developer', 'keith@logicdesign.co.uk', '', 'N', 'Keith is the senior web developer and Managing Director at logic design you are looking here ', 'Y'),
	(51, 'Howie', 'Media Consultant', 'howie@logicdesign.co.uk', '01284 706842', 'N', 'Media Consultant here at logic design', 'N'),
	(52, 'Howie', 'Managing DIrector', 'howie@logicdesign.co.uk', '01284 706842', 'N', 'He is a hardd working individual', 'N'),
	(53, 'Simon Fletcher', 'Managing Director', 'simon@logicdesign.co.uk', '01284 345 345 ', 'N', 'This is the same as any other contact being added into the system.', 'N'),
	(54, 'Keith Bradley', 'Managing Director / Web Developer', 'keith@logicdesign.co.uk', '01284 706842', 'N', 'Great employer and good web developer grewat person', 'N'),
	(55, 'Shaun Palfrey', 'Medrecs Officer', 'shaun@NHS.co.uk', '01284 345 345', 'N', 'this is the notes', 'N'),
	(56, 'Darren Smith', 'Managing Director / Web Developer', 'darren@logicdesign.co.uk', '01284 345 345', 'N', 'this is the the best thing to do...', 'N'),
	(57, 'David Fletcher', 'Web Developer', 'david@logicdesign.co.uk', '01284 706842', 'N', 'this is a great person...', 'N'),
	(58, 'Charlie Robinson', 'MD', 'charlie@displayworld.co.uk', '01284 345 345', 'N', 'fdgsfdgsfg', 'N'),
	(59, 'David Williams', 'Website Developer', 'david@logicdesign.co.uk', '01284 706842', 'N', 'Great guy', 'N');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;


-- Dumping structure for table my.company.projects
DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `project_id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` varchar(255) DEFAULT NULL,
  `sales_id` varchar(255) DEFAULT NULL,
  `project_name` varchar(255) DEFAULT NULL,
  `manager_id` int(10) DEFAULT NULL,
  `project_type_id` varchar(255) DEFAULT NULL,
  `status_id` int(10) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `internal_deadline` datetime DEFAULT NULL,
  `client_deadline` datetime DEFAULT NULL,
  `budget` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `task_template_id` varchar(255) DEFAULT NULL,
  `complete` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.projects: ~6 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`project_id`, `business_id`, `sales_id`, `project_name`, `manager_id`, `project_type_id`, `status_id`, `start_date`, `internal_deadline`, `client_deadline`, `budget`, `notes`, `task_template_id`, `complete`) VALUES
	(5, '1', '5', 'Reason Marketing', 4, '3', 0, '2012-09-30 00:00:00', '2012-10-31 00:00:00', '2012-10-29 00:00:00', '3500', 'This is the notes section ', NULL, 'N'),
	(6, '1', '5', 'Reason Marketing', 4, '3', 4, '2012-09-30 00:00:00', '2012-11-21 00:00:00', '2012-11-29 00:00:00', '3000', 'Project notes go in here', NULL, 'N'),
	(7, '12', '3', 'Animal DNA Diagnostics', 4, '5', 2, '2012-10-30 00:00:00', '2012-11-29 00:00:00', '2012-11-27 00:00:00', '12000', 'This is a bespoke development project make sure you spend time testing.', NULL, 'N'),
	(8, '', '', 'hello', 0, '1', 1, '2012-09-30 00:00:00', '2012-09-17 00:00:00', '2012-09-17 00:00:00', '', '', NULL, 'N'),
	(9, '1', '5', 'Hello Project', 4, '2', 3, '2012-09-30 00:00:00', '2012-09-17 00:00:00', '2012-09-17 00:00:00', '4000', 'dsfdsfds', NULL, 'N'),
	(10, '2', '5', 'Ta Shain', 4, '5', 1, '2012-09-26 00:00:00', '2012-11-30 00:00:00', '2012-09-28 00:00:00', '6800', 'This is a shop like ebay for uni student books', NULL, 'N');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;


-- Dumping structure for table my.company.project_to_users
DROP TABLE IF EXISTS `project_to_users`;
CREATE TABLE IF NOT EXISTS `project_to_users` (
  `users_to_project_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `project_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`users_to_project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.project_to_users: ~20 rows (approximately)
DELETE FROM `project_to_users`;
/*!40000 ALTER TABLE `project_to_users` DISABLE KEYS */;
INSERT INTO `project_to_users` (`users_to_project_id`, `user_id`, `project_id`) VALUES
	(1, 1, 4),
	(2, 2, 4),
	(3, 6, 4),
	(4, 6, 5),
	(5, 2, 5),
	(6, 2, 5),
	(7, 7, 5),
	(8, 1, 6),
	(9, 2, 6),
	(10, 7, 6),
	(11, 1, 7),
	(12, 2, 7),
	(13, 6, 7),
	(14, 0, 8),
	(15, 1, 9),
	(16, 6, 9),
	(17, 2, 9),
	(18, 1, 10),
	(19, 2, 10),
	(20, 7, 10);
/*!40000 ALTER TABLE `project_to_users` ENABLE KEYS */;


-- Dumping structure for table my.company.project_type
DROP TABLE IF EXISTS `project_type`;
CREATE TABLE IF NOT EXISTS `project_type` (
  `project_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`project_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.project_type: ~5 rows (approximately)
DELETE FROM `project_type`;
/*!40000 ALTER TABLE `project_type` DISABLE KEYS */;
INSERT INTO `project_type` (`project_type_id`, `name`) VALUES
	(1, 'Logo Design'),
	(2, 'Wordpress Design &amp; Development'),
	(3, 'Wordpress Development'),
	(4, 'Opencart E-commerce'),
	(5, 'Bespoke Web Development');
/*!40000 ALTER TABLE `project_type` ENABLE KEYS */;


-- Dumping structure for table my.company.status_table
DROP TABLE IF EXISTS `status_table`;
CREATE TABLE IF NOT EXISTS `status_table` (
  `status_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.status_table: ~4 rows (approximately)
DELETE FROM `status_table`;
/*!40000 ALTER TABLE `status_table` DISABLE KEYS */;
INSERT INTO `status_table` (`status_id`, `name`) VALUES
	(1, 'urgent'),
	(2, 'semi-urgent'),
	(3, 'normal'),
	(4, 'bellow normal');
/*!40000 ALTER TABLE `status_table` ENABLE KEYS */;


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


-- Dumping structure for table my.company.tasks_to_customers
DROP TABLE IF EXISTS `tasks_to_customers`;
CREATE TABLE IF NOT EXISTS `tasks_to_customers` (
  `people_task_id` int(10) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `assign_to` int(11) DEFAULT NULL,
  `task_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `task_set_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `task_due_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `task_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`people_task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.tasks_to_customers: ~0 rows (approximately)
DELETE FROM `tasks_to_customers`;
/*!40000 ALTER TABLE `tasks_to_customers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tasks_to_customers` ENABLE KEYS */;


-- Dumping structure for table my.company.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `bio` varchar(255) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.users: ~7 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `name`, `email`, `display_name`, `password`, `phone`, `bio`, `twitter`) VALUES
	(1, 'Simon Fletcher', 'simon@logicdesign.co.uk', 'S.Fletcher', NULL, NULL, NULL, NULL),
	(2, 'Keith Bradley', 'keith@logicdesign.co.uk', 'K.Bradley', NULL, NULL, NULL, NULL),
	(3, 'Howie Connelberry', 'howie@logicdesign.co.uk', 'H.Connelberry', NULL, NULL, NULL, NULL),
	(4, 'Sam Hunt', 'sam@logicdesign.co.uk', 'S.Hunt', NULL, NULL, NULL, NULL),
	(5, 'Darren Smith', 'darren@logicdesign.co.uk', 'D.Smith', NULL, NULL, NULL, NULL),
	(6, 'Finn Johnston', 'finn@logicdesign.co.uk', 'F.Johnston', NULL, NULL, NULL, NULL),
	(7, 'Adam Howson', 'adam@logicdesign.co.uk', 'A.Howson', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Dumping structure for table my.company.users_to_group
DROP TABLE IF EXISTS `users_to_group`;
CREATE TABLE IF NOT EXISTS `users_to_group` (
  `user_to_group_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `group_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_to_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.users_to_group: ~7 rows (approximately)
DELETE FROM `users_to_group`;
/*!40000 ALTER TABLE `users_to_group` DISABLE KEYS */;
INSERT INTO `users_to_group` (`user_to_group_id`, `user_id`, `group_id`) VALUES
	(1, 1, 4),
	(2, 2, 4),
	(3, 3, 2),
	(4, 4, 1),
	(5, 5, 2),
	(6, 6, 3),
	(7, 7, 3);
/*!40000 ALTER TABLE `users_to_group` ENABLE KEYS */;


-- Dumping structure for table my.company.user_groups
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `group_id` int(10) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.user_groups: ~4 rows (approximately)
DELETE FROM `user_groups`;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` (`group_id`, `group_name`) VALUES
	(1, 'Account Manager'),
	(2, 'Media Consultant'),
	(3, 'Designer'),
	(4, 'Developer');
/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;


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
