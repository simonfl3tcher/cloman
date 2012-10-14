-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.5.16 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL version:             7.0.0.4053
-- Date/time:                    2012-10-14 15:37:24
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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.address: 18 rows
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
	(25, '2 Gelbe House', 'Woolpit', 'Suffolk', 'Stowmarket', 'England', 'IP30 9TY'),
	(26, '', '', '', '', '', '');
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
	(3, '0', 'Nicola Sexton', '01284 760011', 'info@nicolasexton.co.uk', 'Y'),
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
	(26, '20', 'Sam Hunt Artistry', '01284 706842', 'sam@hunt.co.uk', 'Y'),
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
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.business_to_people: ~31 rows (approximately)
DELETE FROM `business_to_people`;
/*!40000 ALTER TABLE `business_to_people` DISABLE KEYS */;
INSERT INTO `business_to_people` (`b2p_id`, `business_id`, `people_id`) VALUES
	(15, 1, 55),
	(19, 1, 43),
	(23, 10, 57),
	(32, 1, 51),
	(33, 23, 51),
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
	(86, 1, 58),
	(88, 0, 0);
/*!40000 ALTER TABLE `business_to_people` ENABLE KEYS */;


-- Dumping structure for table my.company.chat
DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `sent` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `recd` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.chat: ~0 rows (approximately)
DELETE FROM `chat`;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;


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
	(4, 9, 6, 'example1', '', 'logicdesign123', 'www.google.com', NULL, 'Y'),
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
	(49, 'Finn Johnson', 'Website Designer / Studio Manager', 'finn@logicdesign.co.uk', '', 'N', 'Finn is the senior designer and studio manager', 'Y'),
	(50, 'Keith Bradley', 'Website Developer', 'keith@logicdesign.co.uk', '', 'N', 'Keith is the senior web developer and Managing Director at logic design you are looking here ', 'Y'),
	(51, 'Howie', 'Media Consultant', 'howie@logicdesign.co.uk', '01284 706842', 'N', 'Media Consultant here at logic design', 'N'),
	(52, 'Howie', 'Managing DIrector', 'howie@logicdesign.co.uk', '01284 706842', 'N', 'He is a hardd working individual', 'N'),
	(53, 'Simon Fletcher', 'Managing Director', 'simon@logicdesign.co.uk', '01284 345 345 ', 'N', 'This is the same as any other contact being added into the system.', 'N'),
	(54, 'Keith Bradley', 'Managing Director / Web Developer', 'keith@logicdesign.co.uk', '01284 706842', 'N', 'Great employer and good web developer grewat person', 'N'),
	(55, 'Shaun Palfrey', 'Medrecs Officer', 'shaun@NHS.co.uk', '01284 345 345', 'N', 'this is the notes', 'N'),
	(56, 'Darren Smith', 'Managing Director / Web Developer', 'darren@logicdesign.co.uk', '01284 345 345', 'N', 'this is the the best thing to do...', 'Y'),
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
  `on_hold` enum('Y','N') DEFAULT 'N',
  `hold_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.projects: ~8 rows (approximately)
DELETE FROM `projects`;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`project_id`, `business_id`, `sales_id`, `project_name`, `manager_id`, `project_type_id`, `status_id`, `start_date`, `internal_deadline`, `client_deadline`, `budget`, `notes`, `task_template_id`, `complete`, `on_hold`, `hold_id`) VALUES
	(5, '1', '5', 'Reason Marketing', 4, '3', 0, '2012-09-30 00:00:00', '2012-10-31 00:00:00', '2012-10-29 00:00:00', '3500', 'This is the notes section ', NULL, 'N', 'N', NULL),
	(6, '1', '5', 'Reason Marketing', 4, '3', 4, '2012-09-30 00:00:00', '2012-10-02 00:00:00', '2012-10-02 00:00:00', '4000', 'Project notes go in here', NULL, 'N', 'N', NULL),
	(7, '12', '3', 'Animal DNA Diagnostics', 4, '5', 2, '2012-10-30 00:00:00', '2012-11-29 00:00:00', '2012-11-27 00:00:00', '12000', 'This is a bespoke development project make sure you spend time testing.', NULL, 'N', 'N', NULL),
	(8, '', '', 'hello', 0, '1', 1, '2012-09-30 00:00:00', '2012-09-17 00:00:00', '2012-09-17 00:00:00', '', '', NULL, 'N', 'N', NULL),
	(9, '1', '5', 'Hello Project', 4, '2', 3, '2012-09-30 00:00:00', '2012-09-17 00:00:00', '2012-09-17 00:00:00', '4000', 'dsfdsfds', NULL, 'N', 'N', NULL),
	(10, '2', '3', 'Ta Shain (ebay like site)', 4, '4', 3, '2012-10-26 00:00:00', '2013-01-22 00:00:00', '2013-01-31 00:00:00', '20000', 'This is a shop like ebay for uni student books check this out it really is working check it out', NULL, 'N', 'N', NULL),
	(11, '1', '5', 'Animal DNA Diagnostics', 4, '3', 1, '2012-10-03 00:00:00', '2012-10-18 00:00:00', '2012-10-18 00:00:00', '4000', 'These are the project notes check them out here y\'all', NULL, 'N', 'N', NULL),
	(12, '', '', '', 0, '', 0, '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '', '', NULL, 'N', 'N', NULL);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;


-- Dumping structure for table my.company.projects_comments
DROP TABLE IF EXISTS `projects_comments`;
CREATE TABLE IF NOT EXISTS `projects_comments` (
  `project_comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `user_id` int(10) DEFAULT NULL,
  `comment_date_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`project_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.projects_comments: ~6 rows (approximately)
DELETE FROM `projects_comments`;
/*!40000 ALTER TABLE `projects_comments` DISABLE KEYS */;
INSERT INTO `projects_comments` (`project_comment_id`, `project_id`, `comment`, `user_id`, `comment_date_time`) VALUES
	(10, 10, 'this is the data', 1, NULL),
	(22, 9, 'you are making a comment, but does it stand correctly ?', 1, NULL),
	(27, 9, 'and another ', 1, NULL),
	(30, 9, 'I want to add another comment is that alright ?', 1, NULL),
	(31, 10, 'Comment 21', 1, NULL),
	(32, 10, 'this is another comment you may want to check out', 1, NULL);
/*!40000 ALTER TABLE `projects_comments` ENABLE KEYS */;


-- Dumping structure for table my.company.projects_on_hold
DROP TABLE IF EXISTS `projects_on_hold`;
CREATE TABLE IF NOT EXISTS `projects_on_hold` (
  `project_hold_id` int(10) NOT NULL AUTO_INCREMENT,
  `project_id` int(10) NOT NULL,
  `hold_date` datetime NOT NULL,
  `unhold_date` datetime DEFAULT NULL,
  `reason` text COLLATE utf8_unicode_ci,
  `done_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`project_hold_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.projects_on_hold: ~7 rows (approximately)
DELETE FROM `projects_on_hold`;
/*!40000 ALTER TABLE `projects_on_hold` DISABLE KEYS */;
INSERT INTO `projects_on_hold` (`project_hold_id`, `project_id`, `hold_date`, `unhold_date`, `reason`, `done_by`) VALUES
	(28, 11, '2012-10-14 13:10:35', '2012-10-14 14:27:52', NULL, 1),
	(29, 10, '2012-10-14 13:13:34', '2012-10-14 13:14:01', NULL, 1),
	(30, 10, '2012-10-14 13:14:33', '2012-10-14 13:14:38', NULL, 1),
	(31, 10, '2012-10-14 13:14:48', '2012-10-14 13:16:09', NULL, 1),
	(32, 10, '2012-10-14 13:16:13', '2012-10-14 16:17:34', NULL, 1),
	(33, 10, '2012-10-14 13:17:35', '2012-10-14 13:23:44', NULL, 1),
	(34, 10, '2012-10-14 13:23:48', '2012-10-14 14:27:56', NULL, 1);
/*!40000 ALTER TABLE `projects_on_hold` ENABLE KEYS */;


-- Dumping structure for table my.company.project_to_users
DROP TABLE IF EXISTS `project_to_users`;
CREATE TABLE IF NOT EXISTS `project_to_users` (
  `users_to_project_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) DEFAULT NULL,
  `project_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`users_to_project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.project_to_users: ~23 rows (approximately)
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
	(11, 1, 7),
	(12, 2, 7),
	(13, 6, 7),
	(14, 0, 8),
	(15, 1, 9),
	(16, 6, 9),
	(17, 2, 9),
	(46, 1, 6),
	(47, 2, 6),
	(48, 7, 6),
	(49, 1, 11),
	(50, 6, 11),
	(52, 0, 0),
	(53, 0, 0),
	(58, 2, 10),
	(59, 1, 10);
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


-- Dumping structure for table my.company.reminders
DROP TABLE IF EXISTS `reminders`;
CREATE TABLE IF NOT EXISTS `reminders` (
  `reminder_id` int(11) NOT NULL AUTO_INCREMENT,
  `reminder_time` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `remindee` int(10) DEFAULT NULL,
  PRIMARY KEY (`reminder_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.reminders: 10 rows
DELETE FROM `reminders`;
/*!40000 ALTER TABLE `reminders` DISABLE KEYS */;
INSERT INTO `reminders` (`reminder_id`, `reminder_time`, `name`, `text`, `remindee`) VALUES
	(1, '0000-00-00 00:00:00', 'Task Reminder 1', 'this is a texting reminder', 0),
	(2, '0000-00-00 00:00:00', 'This is a task with a date', 'dated', 0),
	(3, '0000-00-00 00:00:00', 'This is a task with a date', 'reminder text goes here buddy', 0),
	(4, '2012-10-25 07:00:00', 'This is a task with a date', 'check this out then...', 0),
	(5, '2012-10-24 12:00:00', 'reminder task', 'this is the reminder text. PLease make sure you you do your reminder stuff', 0),
	(6, '2012-10-24 12:00:00', 'reminder task', 'this is the reminder text. PLease make sure you you do your reminder stuff', 0),
	(7, '2012-10-19 08:30:00', 'Task Reminder 1', 'this is a reminder for everyone to do their work today', 1),
	(8, '2012-10-19 08:30:00', 'Task Reminder 1', 'this is a reminder for everyone to do their work today', 2),
	(9, '2012-10-19 09:00:00', 'THis is a reminder to be set.', 'You have got a meeting in 24 hours with animal DNA', 1),
	(10, '2012-10-19 09:00:00', 'THis is a reminder to be set.', 'You have got a meeting in 24 hours with animal DNA', 4);
/*!40000 ALTER TABLE `reminders` ENABLE KEYS */;


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
  `left_extent` int(10) DEFAULT '0',
  `parent_task_id` int(10) DEFAULT '0',
  `right_extent` int(10) DEFAULT '0',
  `business_id` int(10) NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `task_type_id` varchar(255) DEFAULT NULL,
  `status_id` varchar(255) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `internal_deadline` datetime DEFAULT NULL,
  `client_deadline` datetime DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `notes` tinytext,
  `status_notes` varchar(255) DEFAULT NULL,
  `task_created_by` int(10) DEFAULT NULL,
  `last_updated` datetime DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  `complete` enum('Y','N') DEFAULT 'N',
  `actual_completion_date` datetime DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.tasks: ~32 rows (approximately)
DELETE FROM `tasks`;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;
INSERT INTO `tasks` (`task_id`, `left_extent`, `parent_task_id`, `right_extent`, `business_id`, `project_id`, `task_type_id`, `status_id`, `start_date`, `internal_deadline`, `client_deadline`, `name`, `notes`, `status_notes`, `task_created_by`, `last_updated`, `updated_by`, `sort`, `complete`, `actual_completion_date`) VALUES
	(5, 0, 0, 0, 0, 10, '2', '2', '2012-10-05 00:00:00', '2012-10-05 00:00:00', '2012-10-05 00:00:00', 'Hosting Package', 'these are the task notes.... they should be displaying properly', NULL, 1, '2012-10-12 00:00:00', 2, 13, 'N', NULL),
	(6, 0, 0, 0, 1, 10, '2', '4', '2012-10-05 00:00:00', '2012-10-05 00:00:00', '2012-10-05 00:00:00', 'Hosting Package', 'this is the task check it out', NULL, 1, NULL, NULL, 12, 'Y', '2012-10-11 00:00:00'),
	(7, 0, 0, 0, 9, 10, '2', '4', '2012-10-05 00:00:00', '2012-10-05 00:00:00', '2012-10-05 00:00:00', 'Hosting Package', 'hello there how are you ?', NULL, 1, NULL, NULL, 11, 'N', '2012-10-11 00:00:00'),
	(8, 0, 0, 0, 9, 7, '2', '4', '2012-10-05 00:00:00', '2012-10-05 00:00:00', '2012-10-05 00:00:00', 'Hosting Package', 'task notes', NULL, 1, NULL, NULL, 12, 'N', '2012-10-11 00:00:00'),
	(9, 0, 0, 0, 2, 7, '2', '3', '2012-10-05 00:00:00', '2012-10-05 00:00:00', '2012-10-05 00:00:00', 'Hosting Package', 'Put your task notes here will you ', NULL, 1, NULL, NULL, 11, 'Y', '2012-10-11 00:00:00'),
	(10, 0, 0, 0, 9, 7, '', '3', '2012-10-06 00:00:00', '2012-10-05 00:00:00', '2012-10-05 00:00:00', 'Hosting Package', 'this is the normal task option', NULL, 1, NULL, NULL, 10, 'Y', '2012-10-11 00:00:00'),
	(11, 0, 0, 0, 1, 7, '', '3', '2012-10-05 00:00:00', '2012-10-05 00:00:00', '2012-10-05 00:00:00', 'Hosting Package', 'this is a great project team...', NULL, 1, NULL, NULL, 16, 'Y', '2012-10-07 00:00:00'),
	(12, 0, 0, 0, 2, 10, '7', '2', '2012-10-12 00:00:00', '2012-10-12 00:00:00', '2012-10-12 00:00:00', 'new task', 'task notes', NULL, 1, NULL, NULL, 9, 'Y', '2012-10-11 00:00:00'),
	(14, 0, 0, 0, 0, NULL, '8', '1', '2012-10-25 00:00:00', '2012-10-25 00:00:00', '2012-10-25 00:00:00', 'new task', '', NULL, 2, NULL, NULL, 8, 'Y', '2012-10-11 00:00:00'),
	(15, 0, 0, 0, 0, NULL, '0', '0', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '', '', NULL, 1, NULL, NULL, 7, 'Y', '2012-10-11 00:00:00'),
	(16, 0, 0, 0, 1, NULL, '', '1', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task1', 'these are the notes ', NULL, 1, '1970-01-01 00:00:00', 1, 15, 'Y', '2012-10-10 23:59:55'),
	(17, 0, 0, 0, 1, NULL, '2', '1', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task2', 'these are the npotes', NULL, 1, '1970-01-01 00:00:00', 1, 6, 'Y', '2012-10-11 00:00:00'),
	(18, 0, 0, 0, 1, NULL, '2', '1', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task3', 'these are the task notes', NULL, 1, '1970-01-01 00:00:00', 1, 9, 'N', '2012-10-11 00:00:00'),
	(19, 0, 0, 0, 2, 10, '2', '1', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task4', 'update this now....', NULL, 1, '1970-01-01 00:00:00', 1, 10, 'N', NULL),
	(20, 0, 0, 0, 0, NULL, '2', '1', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task5', 'These are the task notes', NULL, 1, '2012-10-09 00:00:00', 1, 17, 'Y', '0000-00-00 00:00:00'),
	(21, 0, 0, 0, 0, NULL, '0', '0', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task6', '', NULL, 1, NULL, NULL, 5, 'Y', '2012-10-11 00:00:00'),
	(22, 0, 0, 0, 0, NULL, '0', '0', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task7', '', NULL, 1, NULL, NULL, 4, 'Y', '2012-10-11 00:00:00'),
	(23, 0, 0, 0, 1, NULL, '2', '1', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task8', 'update these areas', NULL, 1, '1970-01-01 00:00:00', 1, 14, 'Y', '2012-10-10 23:59:59'),
	(24, 0, 0, 0, 0, NULL, '0', '0', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task9', '', NULL, 1, NULL, NULL, 3, 'Y', '2012-10-11 00:00:00'),
	(25, 0, 0, 0, 0, NULL, '0', '0', '2012-10-09 00:00:00', '2012-10-09 00:00:00', '2012-10-08 00:00:00', 'task10', '', NULL, 1, NULL, NULL, 1, 'Y', '2012-10-11 00:00:00'),
	(26, 0, 0, 0, 2, 5, '6', '0', '2012-10-10 00:00:00', '2012-10-10 00:00:00', '2012-10-25 00:00:00', 'task 28 (Check it out)', 'this is a massive task statement... check it out more task notes added against the project', NULL, 1, '2012-10-13 00:00:00', 1, 0, 'N', '2012-10-11 00:00:00'),
	(27, 0, 26, 0, 2, 10, '0', '0', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'this is a sub task', '', NULL, 1, NULL, NULL, 8, 'N', '2012-10-11 00:00:00'),
	(28, 0, 27, 0, 0, NULL, '10', '1', '2012-10-18 00:00:00', '2012-10-18 00:00:00', '2012-10-18 00:00:00', 'second sub task', '', NULL, 1, NULL, NULL, 2, 'Y', '2012-10-12 00:00:00'),
	(29, 0, 0, 0, 1, 5, '2', '1', '2012-10-11 00:00:00', '2012-10-11 00:00:00', '2012-10-11 00:00:00', 'easy price pro', 'erewr', NULL, 1, NULL, NULL, 6, 'N', NULL),
	(30, 0, 28, 0, 9, 5, '11', '1', '2012-10-11 00:00:00', '2012-10-19 00:00:00', '2012-10-19 00:00:00', 'Sagepay now taking orders', 'These are task notes', NULL, 1, '2012-10-13 00:00:00', 1, 2, 'N', '2012-10-11 00:00:00'),
	(31, 0, 0, 0, 1, 5, '12', '3', '2012-10-19 00:00:00', '2012-10-24 00:00:00', '2012-10-24 00:00:00', 'Simons Top level task', 'This is a top level task status check it all out...', NULL, 1, NULL, NULL, 7, 'N', '2012-10-09 00:00:00'),
	(32, 0, 31, 0, 1, 5, '12', '3', '2012-10-12 00:00:00', '2012-10-25 00:00:00', '2012-10-25 00:00:00', 'Simons Sub Class task', 'This is a sublevel task type so does this work ??', NULL, 1, NULL, NULL, 0, 'Y', '2012-10-11 00:00:00'),
	(33, 0, 31, 0, 1, 5, '6', '1', '1970-01-24 00:00:00', '1973-09-24 00:00:00', '1970-01-28 00:00:00', 'This is a sub task 24', 'This is the task notes you want to see whats happened to them ?', NULL, 2, '2012-10-11 00:00:00', 2, 4, 'N', '2012-10-11 00:00:00'),
	(34, 0, 33, 0, 0, NULL, '0', '0', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'another sub task goes here y\'alll', '', NULL, 2, '2012-10-12 00:00:00', 2, 5, 'N', NULL),
	(35, 0, 0, 0, 1, 5, '0', '0', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'I want to make another task that i am asigning to myself', '', NULL, 2, NULL, NULL, 0, 'Y', '2012-10-12 00:00:00'),
	(36, 0, 35, 0, 0, NULL, '0', '0', '1970-01-01 00:00:00', '1970-01-01 00:00:00', '1970-01-01 00:00:00', 'adding a sub class in now', '', NULL, 2, NULL, NULL, 3, 'N', NULL),
	(37, 0, 26, 0, 3, NULL, '5', '1', '2012-10-25 00:00:00', '2012-10-23 00:00:00', '2012-10-24 00:00:00', 'new task', 'this is a very urgent notice to get something done!!!', 'With the client, make sure you chase up on the 27th', 1, NULL, NULL, 1, 'N', NULL);
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


-- Dumping structure for table my.company.tasks_to_users
DROP TABLE IF EXISTS `tasks_to_users`;
CREATE TABLE IF NOT EXISTS `tasks_to_users` (
  `task_to_user_id` int(10) NOT NULL AUTO_INCREMENT,
  `task_id` int(10) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `sort` int(10) DEFAULT NULL,
  UNIQUE KEY `task_to_user_id` (`task_to_user_id`),
  KEY `task_to_user_id_2` (`task_to_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.tasks_to_users: ~50 rows (approximately)
DELETE FROM `tasks_to_users`;
/*!40000 ALTER TABLE `tasks_to_users` DISABLE KEYS */;
INSERT INTO `tasks_to_users` (`task_to_user_id`, `task_id`, `user_id`, `sort`) VALUES
	(6, 0, 1, NULL),
	(7, 0, 1, 1),
	(8, 0, 6, NULL),
	(9, 0, 1, NULL),
	(10, 12, 1, 8),
	(11, 12, 1, 8),
	(12, 13, 0, NULL),
	(14, 6, 1, 8),
	(15, 14, 2, 1),
	(16, 15, 0, NULL),
	(17, 16, 1, 2),
	(18, 16, 2, NULL),
	(19, 17, 1, 1),
	(20, 17, 2, NULL),
	(21, 18, 1, 8),
	(22, 18, 2, 2),
	(23, 19, 1, 9),
	(24, 19, 2, 0),
	(27, 21, 1, 2),
	(28, 21, 2, NULL),
	(29, 22, 1, 3),
	(30, 22, 2, NULL),
	(31, 23, 1, 1),
	(32, 23, 2, NULL),
	(33, 24, 1, 5),
	(34, 24, 2, NULL),
	(35, 25, 1, 3),
	(36, 25, 2, NULL),
	(68, 20, 1, 0),
	(69, 20, 2, 0),
	(71, 27, 1, 5),
	(72, 28, 1, 3),
	(73, 29, 1, 7),
	(75, 31, 1, 3),
	(76, 31, 2, 1),
	(77, 32, 1, NULL),
	(78, 32, 6, NULL),
	(83, 33, 2, 4),
	(84, 35, 1, NULL),
	(85, 35, 6, NULL),
	(86, 35, 2, 3),
	(87, 35, 7, NULL),
	(88, 5, 1, 6),
	(89, 34, 1, 4),
	(90, 34, 6, 0),
	(91, 36, 0, NULL),
	(100, 30, 2, 5),
	(101, 30, 1, 2),
	(103, 26, 1, 0),
	(104, 37, 1, 1);
/*!40000 ALTER TABLE `tasks_to_users` ENABLE KEYS */;


-- Dumping structure for table my.company.task_comments
DROP TABLE IF EXISTS `task_comments`;
CREATE TABLE IF NOT EXISTS `task_comments` (
  `task_comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `task_id` int(10) DEFAULT NULL,
  `comment` text COLLATE utf8_unicode_ci,
  `comment_date_time` datetime DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`task_comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.task_comments: ~13 rows (approximately)
DELETE FROM `task_comments`;
/*!40000 ALTER TABLE `task_comments` DISABLE KEYS */;
INSERT INTO `task_comments` (`task_comment_id`, `task_id`, `comment`, `comment_date_time`, `user_id`) VALUES
	(1, 27, 'adding a comment', NULL, 1),
	(2, 27, 'hello ', NULL, 1),
	(6, 26, 'this is another task comemnt', NULL, 1),
	(7, 26, 'and another', NULL, 1),
	(15, 31, 'This is a comment against the top level task if you would to comment back please', NULL, 1),
	(16, 32, 'this is the first comment agains the task by me', NULL, 1),
	(17, 31, 'this is a comment back simon', NULL, 1),
	(18, 31, 'His this is a comment back simon do some more work please. K', NULL, 2),
	(21, 5, 'this is a comment against a achieved tasks', NULL, 2),
	(22, 5, 'this is a comment after it has been archived', NULL, 2),
	(23, 28, ' this is the first comment against this project', NULL, 2),
	(25, 37, 'FIrst comment ', NULL, 1),
	(26, 37, 'check it out ', NULL, 1);
/*!40000 ALTER TABLE `task_comments` ENABLE KEYS */;


-- Dumping structure for table my.company.task_type
DROP TABLE IF EXISTS `task_type`;
CREATE TABLE IF NOT EXISTS `task_type` (
  `task_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`task_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.task_type: ~11 rows (approximately)
DELETE FROM `task_type`;
/*!40000 ALTER TABLE `task_type` DISABLE KEYS */;
INSERT INTO `task_type` (`task_type_id`, `name`) VALUES
	(2, 'development'),
	(3, 'Wordpress Plugin Installation'),
	(4, 'Wordpress Plugin Installation'),
	(5, 'Wordpress Plugin Installation'),
	(6, 'new task type'),
	(7, 'new task type'),
	(8, 'new task type 2'),
	(9, 'new task types'),
	(10, 'new task type - simon'),
	(11, 'sagepay'),
	(12, 'Simons Top level task type');
/*!40000 ALTER TABLE `task_type` ENABLE KEYS */;


-- Dumping structure for table my.company.task_types
DROP TABLE IF EXISTS `task_types`;
CREATE TABLE IF NOT EXISTS `task_types` (
  `task_type_id` int(10) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.task_types: ~3 rows (approximately)
DELETE FROM `task_types`;
/*!40000 ALTER TABLE `task_types` DISABLE KEYS */;
INSERT INTO `task_types` (`task_type_id`, `name`) VALUES
	(NULL, 'logo'),
	(NULL, 'development'),
	(NULL, 'hosting');
/*!40000 ALTER TABLE `task_types` ENABLE KEYS */;


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
  `is_logged_in` enum('Y','N') DEFAULT 'N',
  `privilage` int(10) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table my.company.users: ~7 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `name`, `email`, `display_name`, `password`, `phone`, `bio`, `twitter`, `is_logged_in`, `privilage`) VALUES
	(1, 'Simon Fletcher', 'simon@logicdesign.co.uk', 'SFletcher', '041529ab9a34a072fe9ac57db4e088ff2602a83d', NULL, NULL, NULL, 'Y', 4),
	(2, 'Keith Bradley', 'keith@logicdesign.co.uk', 'KBradley', 'a5feda985b8fafe7fad17aca9c4265a9bab6113d', NULL, NULL, NULL, 'Y', 5),
	(3, 'Howie Connelberry', 'howie@logicdesign.co.uk', 'HConnelberry', 'a5feda985b8fafe7fad17aca9c4265a9bab6113d', NULL, NULL, NULL, 'Y', 5),
	(4, 'Sam Hunt', 'sam@logicdesign.co.uk', 'SHunt', 'b12a426afd2940f0b5020f2784a0a186de7e0069', NULL, NULL, NULL, 'N', 1),
	(5, 'Darren Smith', 'darren@logicdesign.co.uk', 'D.Smith', NULL, NULL, NULL, NULL, 'N', 2),
	(6, 'Finn Johnston', 'finn@logicdesign.co.uk', 'F.Johnston', NULL, NULL, NULL, NULL, 'N', 3),
	(7, 'Adam Howson', 'adam@logicdesign.co.uk', 'A.Howson', NULL, NULL, NULL, NULL, 'N', 5);
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table my.company.user_groups: ~5 rows (approximately)
DELETE FROM `user_groups`;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;
INSERT INTO `user_groups` (`group_id`, `group_name`) VALUES
	(1, 'Account Manager'),
	(2, 'Media Consultant'),
	(3, 'Designer'),
	(4, 'Developer'),
	(5, 'Manager');
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
