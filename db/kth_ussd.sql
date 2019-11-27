-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 22, 2019 at 08:05 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kth_ussd`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank_details`
--

DROP TABLE IF EXISTS `bank_details`;
CREATE TABLE IF NOT EXISTS `bank_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `paybill_number` int(100) NOT NULL,
  `account_number` int(100) NOT NULL,
  UNIQUE KEY `unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_details`
--

INSERT INTO `bank_details` (`id`, `paybill_number`, `account_number`) VALUES
(1, 390390, 113567890);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cellphone_one` varchar(100) NOT NULL,
  `cellphone_two` varchar(100) NOT NULL,
  UNIQUE KEY `unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `cellphone_one`, `cellphone_two`) VALUES
(1, '0726179177', '0770464394');

-- --------------------------------------------------------

--
-- Table structure for table `dates`
--

DROP TABLE IF EXISTS `dates`;
CREATE TABLE IF NOT EXISTS `dates` (
  `term` int(10) NOT NULL AUTO_INCREMENT,
  `openingdate` date NOT NULL,
  `closingdate` date NOT NULL,
  `agmdate` date NOT NULL,
  `parentsdate` date NOT NULL,
  `aob` varchar(50) NOT NULL,
  PRIMARY KEY (`term`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dates`
--

INSERT INTO `dates` (`term`, `openingdate`, `closingdate`, `agmdate`, `parentsdate`, `aob`) VALUES
(1, '2019-11-12', '2019-11-19', '2019-11-26', '2019-11-27', 'Board of governors meeting coming soon');

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

DROP TABLE IF EXISTS `fee_structure`;
CREATE TABLE IF NOT EXISTS `fee_structure` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `boarding_equipment` decimal(11,0) NOT NULL,
  `repairs` decimal(11,0) NOT NULL,
  `travel_transport` decimal(11,0) NOT NULL,
  `admin_costs` decimal(11,0) NOT NULL,
  `electricity_water` decimal(11,0) NOT NULL,
  `activity` decimal(11,0) NOT NULL,
  `pe` decimal(11,0) NOT NULL,
  `total_fee` decimal(11,0) NOT NULL,
  UNIQUE KEY `unique` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_structure`
--

INSERT INTO `fee_structure` (`id`, `boarding_equipment`, `repairs`, `travel_transport`, `admin_costs`, `electricity_water`, `activity`, `pe`, `total_fee`) VALUES
(1, '27385', '2400', '650', '1850', '4900', '150', '3100', '40535');

-- --------------------------------------------------------

--
-- Table structure for table `performance`
--

DROP TABLE IF EXISTS `performance`;
CREATE TABLE IF NOT EXISTS `performance` (
  `admno` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `marks` int(200) NOT NULL,
  `grade` varchar(200) NOT NULL,
  `position` int(200) NOT NULL,
  PRIMARY KEY (`admno`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `performance`
--

INSERT INTO `performance` (`admno`, `firstname`, `surname`, `marks`, `grade`, `position`) VALUES
(100, 'mark', 'chesire', 400, 'A-', 1),
(101, 'chesire', 'mark', 350, 'B+', 10);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
