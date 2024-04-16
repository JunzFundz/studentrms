-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 16, 2024 at 05:31 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_name`) VALUES
(1, 'Bachelor of Science in Business Administration (BSBA)'),
(2, 'Bachelor of Science in Accountancy (BSA)'),
(3, 'Bachelor of Science in Information Technology (BSIT)'),
(4, '678fghfgh');

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
  `date_enrolled` date NOT NULL,
  `date_completed` date NOT NULL,
  `student_status` varchar(20) NOT NULL,
  `first_sem_grade` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `first_sem`
--

INSERT INTO `first_sem` (`id`, `session`, `company`, `student_id`, `student_reg_number`, `student_name`, `date_enrolled`, `date_completed`, `student_status`, `first_sem_grade`) VALUES
(17, '2023', 'CHARLIE', 20, 44966164, 'dfgdfgdsf sdfgsfdg dfsgdfsg', '2024-04-08', '2024-04-17', 'PASSED', '0'),
(18, '2023', 'ALPHA', 21, 98441171, 'JHBBSDBSDBKJ DFADSF SDAF', '2024-04-08', '2024-04-08', 'ONGOING', '78'),
(19, '2023', 'ECHO', 22, 45997730, 'SDFASDF SADFASDFAS FASDFASDF', '2024-04-08', '2024-04-08', 'ONGOING', '78'),
(20, '2023', 'CHARLIE', 23, 78349007, 'dfgsdg dsfgdsfg sfdgfdg', '2024-04-08', '0000-00-00', 'DROPPED', '0'),
(22, '2023', 'ALPHA', 25, 45559046, 'dsff dsfsdafas sadfsaddf', '2024-04-16', '2024-04-16', 'PASSED', '');

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
  `date_enrolled` date NOT NULL,
  `date_completed` date NOT NULL,
  `student_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `second_sem_grade` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `second_sem`
--

INSERT INTO `second_sem` (`id`, `session`, `company`, `student_id`, `student_reg_number`, `student_name`, `date_enrolled`, `date_completed`, `student_status`, `second_sem_grade`) VALUES
(26, '2023', 'CHARLIE', 20, 44966164, 'dfgdfgdsf sdfgsfdg. dfsgdfsg', '2024-04-17', '0000-00-00', 'ONGOING', '45'),
(25, '2023', 'ALPHA', 25, 45559046, 'dsff dsfsdafas. sadfsaddf', '2024-04-16', '0000-00-00', 'PASSED', '67');

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `comp`, `sessionid`, `session`, `course`, `major`, `semester`, `fname`, `mi`, `lname`, `gender`, `pbirth`, `dob`, `btype`, `religion`, `region`, `civil`, `phone`, `address`, `father`, `f_occupation`, `mother`, `m_occupation`, `rotc_grade`, `person_name`, `person_relationship`, `person_add`, `person_phone`, `date_enrolled`, `reg_no`, `status`) VALUES
(25, 'ALPHA', 14, '2023', 'Bachelor of Science in Business Administration (BSBA)', '', '2nd', 'dsff', 'dsfsdafas', 'sadfsaddf', 'Select Gender', 'asdfsadf', '2024-04-30', 'sdfsad', '345324fgdfg', 'sdfsadf', 'sdf', '542353245', 'dfgdsfg', 'dfsgsdf', 'gdsfgsdfg', 'dfsgsdfg', 'dfsgsdfg', 'N/A', 'dfsgsdf', 'sdfgds', 'fdsgdsfgfds', '567656', '2024-04-16', 45559046, 'SUBJECT COMPLETED'),
(20, 'CHARLIE', 14, '2023', 'Bachelor of Science in Information Technology (BSIT)', 'sfg', '2nd', 'dfgdfgdsf', 'sdfgsfdg', 'dfsgdfsg', 'Select Gender', 'sfdgsdfgsfg', '2024-04-26', 'sdfgsdfg', 'dfgdsfg', 'dsfgsdfg', 'gfdsgdsfg', '536456456', 'dfsgdsfg', 'dfgdfsg', 'dfgdfsg', 'fdgdsf', 'fdgsdfg', 'dfgdsfg', 'dfsgsdfg', 'dfsgdfsg', 'dfsgfds', '565346546', '2024-04-08', 44966164, 'DROPPED'),
(21, 'ALPHA', 14, '2023', 'Bachelor of Science in Business Administration (BSBA)', '', '2nd', 'JHBBSDBSDBKJ', 'DFADSF', 'SDAF', 'Select Gender', 'DSAFASD', '2024-04-25', 'ADFASD', 'ASDFSADF', 'SADFSADF', 'SDFASDF', '456345', 'FDSGSDFG', 'SDFSGFG', 'DFG', 'DFSG', 'DFG', 'DFGSDFG', 'DSFGSDFG', 'DFGDSFG', 'DFG', '635654645', '2024-04-08', 98441171, 'SUBJECT COMPLETED'),
(22, 'ECHO', 14, '2023', 'Bachelor of Science in Business Administration (BSBA)', 'SADAS', '2nd', 'SDFASDF', 'SADFASDFAS', 'FASDFASDF', 'Select Gender', 'ASDFASDF', '2024-04-24', 'FDGDFGSD', 'SDAFSDA', 'FASDFSAD', 'FASDFASD', '5463456', 'DSFGDSFG', 'DFSGDSF', 'GDFSGDFG', 'DFGDFSG', 'DFGDFG', 'DFGDFG', 'DFGDSFGSDF', 'DFGDFSGDFS', 'DFSGDSFG', '45467346', '2024-04-08', 45997730, 'DROPPED'),
(23, 'CHARLIE', 14, '2023', 'Bachelor of Science in Business Administration (BSBA)', 'gf', '1st', 'dfgsdg', 'dsfgdsfg', 'sfdgfdg', 'Male', 'sdfgsdgsdg', '2024-04-24', 'dsfgfdsgfd', 'gdsfg', 'dfgdfs', 'dsfgdsfg', '453454534', 'dfgdfsg', 'dfgdfsg', 'dfsgfd', 'dfsgdfsgdfgdsf', 'fgsdfg', 'gdfsgds', 'dfsgdfg', 'fdgdfg', 'dfgdsf', '56356435646', '2024-04-08', 78349007, 'DROPPED');

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
(2, 'ES', 'user', 'User', 'user'),
(3, NULL, NULL, 'asdas', 'asd'),
(4, NULL, NULL, 'sdfsdaf', 'asdfadsf'),
(5, NULL, NULL, 'user2', 'user'),
(7, NULL, NULL, 'user3', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
