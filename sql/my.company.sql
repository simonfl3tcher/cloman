-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2012 at 10:07 PM
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
-- Table structure for table `access_levels`
--

CREATE TABLE IF NOT EXISTS `access_levels` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Level_Status` varchar(50) DEFAULT 'customer',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `access_levels`
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
  `Country_ID` int(11) unsigned NOT NULL DEFAULT '0',
  `Postcode` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Address_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`Address_ID`, `Address_Line_1`, `Address_Line_2`, `Address_Line_3`, `City`, `Region_Name`, `Country_ID`, `Postcode`) VALUES
(19, '2 Gelebe House', 'Rattelsden', '', 'Bury St Edmunds', 'Suffolk', 240, 'IP43 6LD'),
(18, '29 Wrights Way', 'Woolpit', '', 'Bury St Edmunds', 'Suffolk', 240, 'IP30 9TY');

-- --------------------------------------------------------

--
-- Table structure for table `connection`
--

CREATE TABLE IF NOT EXISTS `connection` (
  `Connection_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Business_ID` int(11) unsigned DEFAULT NULL,
  `Solution` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `Url` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `Username` varchar(150) COLLATE utf8_unicode_ci DEFAULT '',
  `Password` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`Connection_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `connection`
--


-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Name_Title` varchar(5) DEFAULT '',
  `Name_First` varchar(60) NOT NULL DEFAULT '',
  `Name_Initial` char(1) DEFAULT '',
  `Name_Last` varchar(60) NOT NULL DEFAULT '',
  `Address_ID` int(11) unsigned DEFAULT '0',
  `Contact_Phone` varchar(40) DEFAULT NULL,
  `Contact_Email` varchar(100) NOT NULL,
  `Contact_Password` varchar(64) NOT NULL,
  `Contact_Url` varchar(100) NOT NULL,
  `Contact_Registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Contact_Status` int(11) NOT NULL DEFAULT '0',
  `Contact_Level` int(2) NOT NULL DEFAULT '0',
  `Display_Name` varchar(250) NOT NULL,
  `Notes` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`ID`, `Name_Title`, `Name_First`, `Name_Initial`, `Name_Last`, `Address_ID`, `Contact_Phone`, `Contact_Email`, `Contact_Password`, `Contact_Url`, `Contact_Registered`, `Contact_Status`, `Contact_Level`, `Display_Name`, `Notes`) VALUES
(13, '', 'Simon', '', 'Fletcher', 18, NULL, 'simonfletcher0@gmail.com', '041529ab9a34a072fe9ac57db4e088ff2602a83d', 'simon-fletcher.me', '2012-09-05 00:00:00', 0, 1, 'simonify', NULL),
(14, '', 'Shaun', '', 'Palfrey', 19, NULL, 'shaun@gmail.com', '041529ab9a34a072fe9ac57db4e088ff2602a83d', 'shaun-palfrey.me', '2012-09-05 00:00:00', 0, 0, 'shanuy', 'Works for the NHS			');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `Country_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Country` varchar(64) NOT NULL DEFAULT '',
  `ISO_Code` char(3) NOT NULL DEFAULT '',
  `Allow_Sales` enum('Y','N') NOT NULL DEFAULT 'N',
  PRIMARY KEY (`Country_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`Country_ID`, `Country`, `ISO_Code`, `Allow_Sales`) VALUES
(240, 'United Kingdom', 'GBR', 'Y');
