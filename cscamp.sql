-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 28, 2021 at 01:36 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cscamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `vol_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`vol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`vol_id`, `username`, `password`, `email`) VALUES
(2, 'alex', '$2y$10$ibWqf9NwEIrjSEIvD4OhI.voZgMTwzB.8PSbiFMaiQUCFG2me0i6C', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `job_id` int(11) NOT NULL,
  `job_name` varchar(25) NOT NULL,
  `man_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`job_id`),
  KEY `man_id` (`man_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `job_name`, `man_id`, `start_date`, `end_date`) VALUES
(7068, 'Web Development', 3002, '0000-00-00', '0000-00-00'),
(7071, 'Gadgeteers', 3003, '0000-00-00', '0000-00-00'),
(7079, 'Data Analysis', 3001, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `manager_info`
--

DROP TABLE IF EXISTS `manager_info`;
CREATE TABLE IF NOT EXISTS `manager_info` (
  `man_id` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `first_name` varchar(14) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `hire_date` date NOT NULL,
  PRIMARY KEY (`man_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager_info`
--

INSERT INTO `manager_info` (`man_id`, `birth_date`, `first_name`, `last_name`, `hire_date`) VALUES
(3001, '0000-00-00', 'Harrison', 'Perry', '0000-00-00'),
(3002, '0000-00-00', 'Storm', 'Willis', '0000-00-00'),
(3003, '0000-00-00', 'Stephanie', 'Kim', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `vol_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `job_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`vol_id`),
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`vol_id`, `task_id`, `task_name`, `job_id`, `start_date`, `end_date`) VALUES
(0, 8031, 'HTML & CSS', 7068, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_hours`
--

DROP TABLE IF EXISTS `volunteer_hours`;
CREATE TABLE IF NOT EXISTS `volunteer_hours` (
  `vol_id` int(11) NOT NULL,
  `curr_date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  PRIMARY KEY (`vol_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_info`
--

DROP TABLE IF EXISTS `volunteer_info`;
CREATE TABLE IF NOT EXISTS `volunteer_info` (
  `vol_id` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `first_name` varchar(14) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `hire_date` date NOT NULL,
  PRIMARY KEY (`vol_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer_info`
--

INSERT INTO `volunteer_info` (`vol_id`, `birth_date`, `first_name`, `last_name`, `hire_date`) VALUES
(2001, '0000-00-00', 'Genesis', 'McAllen', '0000-00-00'),
(2002, '0000-00-00', 'Hazel', 'Gonzalez', '0000-00-00'),
(2003, '0000-00-00', 'Michael', 'Smith', '0000-00-00'),
(2004, '0000-00-00', 'Jennifer', 'Carmichael', '0000-00-00'),
(2005, '0000-00-00', 'Benjamin', 'Figueroa', '0000-00-00'),
(2006, '0000-00-00', 'Janet', 'Robinson', '0000-00-00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
