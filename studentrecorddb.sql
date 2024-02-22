-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2024 at 03:43 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentrecorddb`
--

-- --------------------------------------------------------

--
-- Table structure for table `platoons_tb`
--

DROP TABLE IF EXISTS `platoons_tb`;
CREATE TABLE IF NOT EXISTS `platoons_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `platoons` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `platoons_tb`
--

INSERT INTO `platoons_tb` (`id`, `platoons`) VALUES
(1, 'ALPHA'),
(2, 'BRAVO'),
(3, 'CHARLIE'),
(4, 'DELTA'),
(5, 'ECHO'),
(19, 'asd'),
(18, 'sadasd'),
(17, 'dsadasd'),
(16, 'Zebra'),
(15, 'golf'),
(6, 'FOXTROT');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

DROP TABLE IF EXISTS `registration`;
CREATE TABLE IF NOT EXISTS `registration` (
  `stud_id` int NOT NULL AUTO_INCREMENT,
  `platoon` varchar(255) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `gname` varchar(250) NOT NULL,
  `ocp` varchar(50) NOT NULL,
  `nationality` varchar(250) NOT NULL,
  `mobno` varchar(50) NOT NULL,
  `emailid` varchar(250) NOT NULL,
  `pro` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `padd` text NOT NULL,
  `cadd` text NOT NULL,
  `session` varchar(250) NOT NULL,
  `session_id` int NOT NULL,
  `regno` varchar(250) NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`stud_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`stud_id`, `platoon`, `fname`, `mname`, `lname`, `gender`, `gname`, `ocp`, `nationality`, `mobno`, `emailid`, `pro`, `city`, `padd`, `cadd`, `session`, `session_id`, `regno`, `regdate`) VALUES
(13, 'Bravo', 'fdsfgdsf', 'dsfsdf', '', '', 'sdfsdfsdfd', '', '', '987235944358734', '', '', '', '', 'ertertret', '2023-2024', 14, '3501720284', '2024-02-20 03:43:41'),
(15, 'Bravo', 'sadsadasd', '', '', 'Male', 'adsfsdafdsaf', '', '', '45673474646785987', '', '', '', 'dfgfdsgdfg', 'dsfgsdfg', '2023-2024', 14, '4898878891', '2024-02-20 03:45:13'),
(17, 'CHARLIE', 'JUNX', 'DSF', 'DSF', 'Female', 'SDFSD', 'FDG', 'DSFSDF', '5464536546', 'SDSDF@GMAIL.COM', 'ASDASD', 'ASDASD', 'ASDASD', 'ASDASD', '2023-2024', 14, '2363490022', '2024-02-22 03:16:53');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session` varchar(50) NOT NULL,
  `postingdate` date NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`id`, `session`, `postingdate`, `status`) VALUES
(14, '2023-2024', '2023-09-12', 1),
(15, '2024-2025', '2023-09-12', 0),
(16, '2025-2026', '2023-09-12', 0),
(17, '2026-2027', '2023-09-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
CREATE TABLE IF NOT EXISTS `tbl_login` (
  `id` int NOT NULL AUTO_INCREMENT,
  `FullName` varchar(255) DEFAULT NULL,
  `AdminEmail` varchar(255) DEFAULT NULL,
  `loginid` varchar(250) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `FullName`, `AdminEmail`, `loginid`, `password`) VALUES
(1, 'admin', 'admin123@gmail.com', 'admin', 'Test@12345'),
(2, NULL, NULL, 'User', 'user'),
(3, NULL, NULL, 'asdas', 'asd');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
