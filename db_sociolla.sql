-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 15, 2016 at 10:18 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_sociolla`
--

-- --------------------------------------------------------

--
-- Table structure for table `ask_us`
--

CREATE TABLE IF NOT EXISTS `ask_us` (
  `division` varchar(20) NOT NULL,
  `name_ask_us` varchar(20) NOT NULL,
  `question` text NOT NULL,
  PRIMARY KEY (`name_ask_us`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ask_us`
--

INSERT INTO `ask_us` (`division`, `name_ask_us`, `question`) VALUES
('technology', 'haha', 'asdsad'),
('technology', 'huhu', 'dasdsad');

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

CREATE TABLE IF NOT EXISTS `company_profile` (
  `street` varchar(100) NOT NULL,
  `city` varchar(20) NOT NULL,
  `province` varchar(20) NOT NULL,
  `postal` int(12) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`street`, `city`, `province`, `postal`, `name`, `description`) VALUES
('kp bendunga', 'depok', 'west java', 16414, 'anaida', 'pt global indonesia'),
('depok', 'depokkk', 'west java', 123123, 'ida ', 'idasulis');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
