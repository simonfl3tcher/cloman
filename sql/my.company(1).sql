-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 27, 2012 at 08:52 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my.company`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `Address_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Address_Line_1` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Address_Line_2` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `Address_Line_3` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `City` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Region_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT '',
  `Postcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Address_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=27 ;

--
-- Dumping data for table `address`
--

REPLACE INTO `address` (`Address_ID`, `Address_Line_1`, `Address_Line_2`, `Address_Line_3`, `City`, `Region_Name`, `Postcode`) VALUES
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
(26, 'West Suffolk Hospital', 'Hardwick Lane', '', 'Bury St Edmunds', 'Suffolk', 'IP33 2QZ');

-- --------------------------------------------------------

--
-- Table structure for table `businesses`
--

CREATE TABLE IF NOT EXISTS `businesses` (
  `business_id` int(10) NOT NULL AUTO_INCREMENT,
  `address_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `disabled` enum('Y','N') DEFAULT 'N',
  PRIMARY KEY (`business_id`),
  KEY `business_id` (`business_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `businesses`
--

REPLACE INTO `businesses` (`business_id`, `address_id`, `name`, `phone`, `email`, `disabled`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `business_to_people`
--

CREATE TABLE IF NOT EXISTS `business_to_people` (
  `b2p_id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` int(10) DEFAULT '0',
  `people_id` int(10) DEFAULT '0',
  PRIMARY KEY (`b2p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=89 ;

--
-- Dumping data for table `business_to_people`
--

REPLACE INTO `business_to_people` (`b2p_id`, `business_id`, `people_id`) VALUES
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
(86, 1, 0),
(87, 0, 57),
(88, 0, 51);

-- --------------------------------------------------------

--
-- Table structure for table `connections`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `connections`
--

REPLACE INTO `connections` (`connection_id`, `business_id`, `connection_options_id`, `username`, `username_two`, `password`, `url`, `notes`, `disabled`) VALUES
(2, 12, 3, 'logicdesign', '', 'logicdesign123', 'www.google.com', NULL, 'N'),
(4, 9, 6, 'example1', '', 'logicdesign123', 'www.google.com', NULL, 'Y'),
(5, 9, 3, 'example1', '', 'logicdesign123', 'www.google.com', NULL, 'Y'),
(6, 9, 7, 'logicdesign', 'Logicdesign2', 'logicdesign123', 'test.sagepay.co.uk/MySagePay', NULL, 'N'),
(8, 0, 8, 'sdfdsf', '', '', 'sdfsd', NULL, 'N'),
(10, 21, 5, 'sfdf', 'fff', '123456', 'www.google.com', NULL, 'N'),
(11, 1, 4, '123', '123', '12345689', '', NULL, 'Y'),
(12, 1, 4, '213', '123', '132', '', NULL, 'Y'),
(14, 0, 10, 'hgvhv', '', '', '', NULL, 'N'),
(17, 9, 5, '123123', '123123', 'ioio', 'www.google.com', NULL, 'N'),
(18, 9, 1, 'fgfg', '', 'fgfg', '', NULL, 'Y'),
(19, 1, 12, 'moose1', 'moose2', '123123123', 'moose1.co.uk', NULL, 'N'),
(20, 1, 0, 'logicdesign', '', 'logic123', 'www.google.com', NULL, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `connection_options`
--

CREATE TABLE IF NOT EXISTS `connection_options` (
  `connection_options_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`connection_options_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `connection_options`
--

REPLACE INTO `connection_options` (`connection_options_id`, `name`) VALUES
(1, 'ftp'),
(2, 'wodpress'),
(3, 'cs-cart'),
(4, 'Opencart'),
(5, 'Sagepay'),
(6, 'Wordpress Login'),
(7, 'Sagepay Test Account'),
(12, 'Moose'),
(13, 'Logic Wordpress');

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `people`
--

REPLACE INTO `people` (`people_id`, `name`, `role`, `email`, `phone`, `is_primary_contact`, `notes`, `disabled`) VALUES
(44, 'Charlie Robinson', 'Website Developer', 'simon@logicdesign.co.uk', '10', 'N', 'sdfsgdhg', 'Y'),
(48, 'Charlie Robinson', 'Website Developer', 'david@williams.co.uk', '01284 345345', 'N', '', 'Y'),
(49, 'Finn Johnson', 'Website Designer / Studio Manager', 'finn@logicdesign.co.uk', '', 'N', 'Finn is the senior designer and studio manager', 'Y'),
(50, 'Keith Bradley', 'Website Developer', 'keith@logicdesign.co.uk', '', 'N', 'Keith is the senior web developer and Managing Director at logic design you are looking here ', 'Y'),
(51, 'Howie', 'Media Consultant', 'howie@logicdesign.co.uk', '01284 706842', 'N', 'Media Consultant here at logic design', 'N'),
(52, 'Howie', 'Managing DIrector', 'howie@logicdesign.co.uk', '01284 706842', 'N', 'He is a hardd working individual', 'N'),
(53, 'Simon Fletcher', 'Managing Director', 'simon@logicdesign.co.uk', '01284 345 345 ', 'N', 'This is the same as any other contact being added into the system.', 'N'),
(54, 'Keith Bradley', 'Managing Director / Web Developer', 'keith@logicdesign.co.uk', '01284 706842', 'N', 'Great employer and good web developer grewat person', 'N'),
(55, 'Shaun Palfrey', 'Medrecs Officer', 'shaun@NHS.co.uk', '01284 345 345', 'N', 'this is the notes', 'N'),
(56, 'Darren Smith', 'Managing Director / Web Developer', 'darren@logicdesign.co.uk', '01284 345 345', 'N', 'this is the the best thing to do...', 'N'),
(57, 'David Fletcher', 'Web Developer', 'david@logicdesign.co.uk', '01284 706842', 'N', 'this is a great person...', 'N'),
(58, 'Charlie Robinson', 'MD', 'charlie@displayworld.co.uk', '01284 345 345', 'N', 'fdgsfdgsfg', 'N'),
(59, 'David Williams', 'Website Developer', 'david@logicdesign.co.uk', '01284 706842', 'N', 'Great guy', 'N'),
(60, 'hello there', 'managing director', 'simon@logicdesign.co.uk', '01284 706842', 'N', 'this is the notes section...', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `projects`
--


-- --------------------------------------------------------

--
-- Table structure for table `support_packs`
--

CREATE TABLE IF NOT EXISTS `support_packs` (
  `support_packs_id` int(10) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) DEFAULT NULL,
  `includes` text,
  `time_allowed_pm` int(11) DEFAULT NULL,
  PRIMARY KEY (`support_packs_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `support_packs`
--


-- --------------------------------------------------------

--
-- Table structure for table `support_packs_to_businesses`
--

CREATE TABLE IF NOT EXISTS `support_packs_to_businesses` (
  `sptb_id` int(10) NOT NULL AUTO_INCREMENT,
  `businesses_id` int(10) DEFAULT NULL,
  `support_pack_id` int(10) DEFAULT NULL,
  `reminder` enum('Y','N') NOT NULL DEFAULT 'N',
  `reminder_when` datetime DEFAULT NULL,
  PRIMARY KEY (`sptb_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `support_packs_to_businesses`
--


-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tasks`
--


-- --------------------------------------------------------

--
-- Table structure for table `tasks_to_customers`
--

CREATE TABLE IF NOT EXISTS `tasks_to_customers` (
  `people_task_id` int(10) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) DEFAULT NULL,
  `assign_to` int(11) DEFAULT NULL,
  `task_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `task_set_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `task_due_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `task_description` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`people_task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tasks_to_customers`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `bio` text,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `users`
--


-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE IF NOT EXISTS `websites` (
  `website_id` int(10) NOT NULL AUTO_INCREMENT,
  `business_id` int(10) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`website_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `websites`
--

