-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 20, 2021 at 11:40 PM
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
-- Database: `procurement_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bid`
--

DROP TABLE IF EXISTS `bid`;
CREATE TABLE IF NOT EXISTS `bid` (
  `Lowest_bid` varchar(100) NOT NULL,
  `Rfp_ID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `ID` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`ID`, `Username`, `Password`) VALUES
('1', 'nimit@gmail.com', 'abc'),
('2', 'siddharth@gmail.com', 'abc'),
('3', 'yash@gmail.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `company_rfp`
--

DROP TABLE IF EXISTS `company_rfp`;
CREATE TABLE IF NOT EXISTS `company_rfp` (
  `Company_ID` varchar(100) NOT NULL,
  `Rfp_ID` varchar(100) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `Deadline` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `product_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_rfp`
--

INSERT INTO `company_rfp` (`Company_ID`, `Rfp_ID`, `Description`, `Deadline`, `end_date`, `product_name`) VALUES
('1', '666', 'coal india', '2021-03-30', '2021-03-25', 'Coal'),
('1', '777', 'Line', NULL, '2021-04-20', 'Line'),
('1', '845', 'Hello', NULL, '2021-03-19', 'Hello World'),
('1', '875', 'asdasdsad', '2021-03-26', '2021-03-24', 'sadasdas'),
('2', '37288732', 'hdas dsab', '2021-03-27', '2021-03-18', 'kjdsaj');

-- --------------------------------------------------------

--
-- Table structure for table `rfp_status`
--

DROP TABLE IF EXISTS `rfp_status`;
CREATE TABLE IF NOT EXISTS `rfp_status` (
  `Response_ID` varchar(100) NOT NULL,
  `Cost` varchar(100) NOT NULL,
  `Start_date` date NOT NULL,
  `End_date` date NOT NULL,
  `Del_mode` varchar(100) NOT NULL,
  `company_price` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rfp_status`
--

INSERT INTO `rfp_status` (`Response_ID`, `Cost`, `Start_date`, `End_date`, `Del_mode`, `company_price`) VALUES
('6056750080f64', '154', '2021-03-19', '2021-03-31', 'Vendor', '174'),
('6056751b699e1', '84', '2021-03-27', '2021-03-31', 'Vendor', '74'),
('605680eba5427', '174', '2021-03-25', '2021-03-27', 'Vendor', '174');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `Response_ID` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`Response_ID`, `Status`) VALUES
('6056750080f64', 'Accepted'),
('6056751b699e1', 'Negotiate'),
('605680eba5427', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

DROP TABLE IF EXISTS `vendor`;
CREATE TABLE IF NOT EXISTS `vendor` (
  `ID` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Username` (`Username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`ID`, `Username`, `Password`) VALUES
('12345', 'bhargav@gmail.com', 'abc'),
('12346', 'pranjael@gmail.com', 'abc'),
('12347', 'umang@gmail.com', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_rfp`
--

DROP TABLE IF EXISTS `vendor_rfp`;
CREATE TABLE IF NOT EXISTS `vendor_rfp` (
  `Vendor_ID` varchar(100) NOT NULL,
  `Rfp_ID` varchar(100) NOT NULL,
  `Response_ID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendor_rfp`
--

INSERT INTO `vendor_rfp` (`Vendor_ID`, `Rfp_ID`, `Response_ID`) VALUES
('12347', '875', '6056750080f64'),
('12347', '37288732', '6056751b699e1'),
('12347', '666', '605680eba5427');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
