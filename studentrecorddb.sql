-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 05, 2024 at 04:18 PM
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
-- Table structure for table `comp_tb`
--

DROP TABLE IF EXISTS `comp_tb`;
CREATE TABLE IF NOT EXISTS `comp_tb` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comp_tb`
--

INSERT INTO `comp_tb` (`id`, `comp`) VALUES
(1, 'ALPHA'),
(2, 'BRAVO'),
(3, 'CHARLIE'),
(4, 'DELTA'),
(5, 'ECHO'),
(20, 'Garry'),
(6, 'FOXTROT');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
CREATE TABLE IF NOT EXISTS `course` (
  `c_id` int NOT NULL AUTO_INCREMENT,
  `c_name` varchar(255) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`) VALUES
(1, 'Bachelor of Science in Business Administration (BSBA)'),
(2, 'Bachelor of Science in Accountancy (BSA)'),
(3, 'Bachelor of Science in Information Technology (BSIT)');

-- --------------------------------------------------------

--
-- Table structure for table `first_sem`
--

DROP TABLE IF EXISTS `first_sem`;
CREATE TABLE IF NOT EXISTS `first_sem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `student_id` int NOT NULL,
  `student_reg_number` int NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `date_enrolled` datetime NOT NULL,
  `date_completed` datetime NOT NULL,
  `student_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `first_sem`
--

INSERT INTO `first_sem` (`id`, `session`, `company`, `student_id`, `student_reg_number`, `student_name`, `date_enrolled`, `date_completed`, `student_status`) VALUES
(13, '2023', 'BRAVO', 16, 83645980, 'fghfdghdf ghdfghdfgh fghdfgh', '2024-04-05 23:19:24', '2024-04-05 23:19:24', 'DROPPED'),
(12, '2023', 'ALPHA', 15, 71495220, 'fddf g fghghfg', '2024-04-05 16:45:51', '2024-04-05 17:39:26', 'DROPPED');

-- --------------------------------------------------------

--
-- Table structure for table `second_sem`
--

DROP TABLE IF EXISTS `second_sem`;
CREATE TABLE IF NOT EXISTS `second_sem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `session` varchar(20) NOT NULL,
  `company` varchar(20) NOT NULL,
  `student_id` int NOT NULL,
  `student_reg_number` int NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `date_enrolled` datetime NOT NULL,
  `date_completed` datetime NOT NULL,
  `student_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `second_sem`
--

INSERT INTO `second_sem` (`id`, `session`, `company`, `student_id`, `student_reg_number`, `student_name`, `date_enrolled`, `date_completed`, `student_status`) VALUES
(11, '2023', 'ALPHA', 15, 71495220, 'fddf g fghghfg', '2024-04-05 17:39:26', '2024-04-05 17:39:26', 'DROPPED');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

DROP TABLE IF EXISTS `semester`;
CREATE TABLE IF NOT EXISTS `semester` (
  `sem_id` int NOT NULL AUTO_INCREMENT,
  `sem` varchar(20) NOT NULL,
  PRIMARY KEY (`sem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`sem_id`, `sem`) VALUES
(1, '1st'),
(2, '2nd');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `sid` int NOT NULL AUTO_INCREMENT,
  `session` varchar(50) NOT NULL,
  `postingdate` date NOT NULL,
  `status` int NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`sid`, `session`, `postingdate`, `status`) VALUES
(14, '2023', '2023-09-12', 1),
(15, '2024', '2023-09-12', 0),
(16, '2025', '2023-09-12', 0),
(17, '2026', '2023-09-12', 0),
(18, '2027', '0000-00-00', 0),
(20, '2028', '2024-05-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comp` varchar(100) DEFAULT NULL,
  `sessionid` int DEFAULT NULL,
  `session` varchar(100) NOT NULL,
  `course` varchar(100) DEFAULT NULL,
  `major` varchar(100) DEFAULT NULL,
  `semester` varchar(100) DEFAULT NULL,
  `fname` varchar(100) DEFAULT NULL,
  `mi` varchar(10) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `pbirth` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `btype` varchar(10) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  `civil` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `father` varchar(100) DEFAULT NULL,
  `f_occupation` varchar(100) DEFAULT NULL,
  `mother` varchar(100) DEFAULT NULL,
  `m_occupation` varchar(100) DEFAULT NULL,
  `rotc_grade` varchar(10) DEFAULT NULL,
  `person_name` varchar(100) DEFAULT NULL,
  `person_relationship` varchar(100) DEFAULT NULL,
  `person_add` varchar(255) DEFAULT NULL,
  `person_phone` varchar(20) DEFAULT NULL,
  `date_enrolled` date NOT NULL,
  `reg_no` int NOT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `comp`, `sessionid`, `session`, `course`, `major`, `semester`, `fname`, `mi`, `lname`, `gender`, `pbirth`, `dob`, `btype`, `religion`, `region`, `civil`, `phone`, `address`, `father`, `f_occupation`, `mother`, `m_occupation`, `rotc_grade`, `person_name`, `person_relationship`, `person_add`, `person_phone`, `date_enrolled`, `reg_no`, `status`) VALUES
(16, 'BRAVO', 14, '2023', 'Bachelor of Science in Business Administration (BSBA)', '', '1st', 'fghfdghdf', 'ghdfghdfgh', 'fghdfgh', 'Female', 'fdgh', '2024-04-25', 'dfghfdgh', 'fghfdgh', 'fghfdg', 'fghfgh', '546456', 'dsfgdfg', 'dfghfds', 'dsfg', 'dfg', 'dfgdsfg', 'dfsg', 'dsfgdf', 'gfdgjfg', 'jffdghfds', '464643', '2024-04-05', 83645980, 'DROPPED');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `FullName`, `AdminEmail`, `loginid`, `password`) VALUES
(1, 'admin1', 'adminni@gmail.com', 'admin', 'admin'),
(2, NULL, NULL, 'User', 'user'),
(3, NULL, NULL, 'asdas', 'asd'),
(4, NULL, NULL, 'sdfsdaf', 'asdfadsf'),
(5, NULL, NULL, 'user2', 'user'),
(7, NULL, NULL, 'user3', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
