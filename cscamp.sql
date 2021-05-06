-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2021 at 04:24 AM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`vol_id`, `username`, `password`, `email`) VALUES
(2, 'alex', '$2y$10$ibWqf9NwEIrjSEIvD4OhI.voZgMTwzB.8PSbiFMaiQUCFG2me0i6C', 'test@gmail.com'),
(5, 'dvdvdv', '$2y$10$5qp5ZR.vDuqb3tsMUCAgEuFhnzxcqVkX6nwFbT.yP/XwY9c.C3TtC', '123ava@yahoo.com'),
(6, 'gfdfh', '$2y$10$aRB2KwuUExjzulx/U6eaDOkT0tjd38mDo/oOY/MJvBnEmv2Dvd6L2', 'fhdfh@yahoo.com'),
(7, 'bob', '$2y$10$Fc/M4pqqUIe47YTNOxBDcewiB6Zof5X1YHDrxkQhfAZr8v2.FgJ2K', 'fas@gmail.com'),
(8, 'jam', '$2y$10$.wGuEsltvGbFSebu4jzzK./rWg.Bg8cQ3a5sWi9icmqWZBFno3686', 'test562@yahoo.com'),
(9, 'max', '$2y$10$Xet9sKSJRpcwU8nY5d740uULjNal8RoPptbuq.y2rhlXgNpmvZ7o2', 'max123@gmail.com'),
(10, 'jack', '$2y$10$KfP7mk06RigojrutTBcyk.IWjGf8G6O6OAMXmv8h52TlPKmM6DjJa', 'jack123@yahoo.com');

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
  `vol_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `task_name` varchar(50) NOT NULL,
  `job_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`vol_id`),
  KEY `job_id` (`job_id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`vol_id`, `task_id`, `task_name`, `job_id`, `start_date`, `end_date`) VALUES
(46, 8039, 'Gadget Projects', 7071, '0000-00-00', '0000-00-00'),
(45, 8038, 'Data Projects', 7079, '0000-00-00', '0000-00-00'),
(44, 8037, 'Web Dev Projects', 7068, '0000-00-00', '0000-00-00'),
(43, 8036, 'Raspberry Pi', 7071, '0000-00-00', '0000-00-00'),
(41, 8034, 'JavaScript & JQuery', 7068, '0000-00-00', '0000-00-00'),
(42, 8035, 'R', 7079, '0000-00-00', '0000-00-00'),
(40, 8033, 'Arduino', 7071, '0000-00-00', '0000-00-00'),
(39, 8032, 'Python', 7079, '0000-00-00', '0000-00-00'),
(38, 8031, 'HTML & CSS', 7068, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vol_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `vol_id` (`vol_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `TaskID` int(11) NOT NULL,
  PRIMARY KEY (`vol_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer_hours`
--

INSERT INTO `volunteer_hours` (`vol_id`, `curr_date`, `time_in`, `time_out`, `TaskID`) VALUES
(10, '2021-05-13', '12:05:00', '15:15:00', 8031);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_info`
--

DROP TABLE IF EXISTS `volunteer_info`;
CREATE TABLE IF NOT EXISTS `volunteer_info` (
  `vol_id` int(11) NOT NULL AUTO_INCREMENT,
  `birth_date` date NOT NULL,
  `first_name` varchar(14) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  PRIMARY KEY (`vol_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer_info`
--

INSERT INTO `volunteer_info` (`vol_id`, `birth_date`, `first_name`, `last_name`) VALUES
(25, '1987-11-11', 'jack', 'reppera'),
(24, '2021-01-04', 'max', 'great'),
(23, '2004-02-11', 'jam', 'sam'),
(22, '2021-05-18', 'thth', 'thth'),
(21, '2003-05-06', 'ale', 'csc'),
(20, '2003-05-06', 'ale', 'csc'),
(19, '2003-05-06', 'ale', 'csc'),
(18, '2017-05-08', 'aaaa', 'aaaa');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
