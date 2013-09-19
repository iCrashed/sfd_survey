-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 19, 2013 at 06:36 AM
-- Server version: 5.5.31
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sfd13`
--
CREATE DATABASE IF NOT EXISTS `sfd13` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sfd13`;

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_no` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `user_no`, `question_id`, `answer`) VALUES
(14, 1, 1, '0'),
(15, 1, 2, 'szs'),
(16, 1, 3, '1'),
(35, 2, 1, '0'),
(36, 2, 2, 'user '),
(37, 2, 3, '0'),
(38, 3, 1, '1'),
(39, 3, 2, 'user '),
(40, 3, 3, '0'),
(41, 4, 1, '2'),
(42, 4, 2, 'Handsome'),
(43, 4, 3, '0'),
(44, 5, 1, '2'),
(45, 5, 2, 'Very'),
(46, 5, 3, '0'),
(47, 6, 1, '1'),
(48, 6, 2, ''),
(49, 6, 3, '1'),
(50, 7, 1, '0'),
(51, 7, 2, ''),
(52, 7, 3, '1'),
(53, 8, 1, '0'),
(54, 8, 2, ''),
(55, 8, 3, '1'),
(56, 9, 1, '0'),
(57, 9, 2, 'Bob'),
(58, 9, 3, '1'),
(59, 10, 1, '0'),
(60, 10, 2, ''),
(61, 10, 3, '1'),
(62, 11, 1, '1'),
(63, 11, 2, ''),
(64, 11, 3, '1'),
(65, 12, 1, '1'),
(66, 12, 2, 'nzll'),
(67, 12, 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `options` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `options`) VALUES
(1, 1, 'Internet'),
(2, 1, 'Friend'),
(3, 1, 'Mailing List'),
(4, 3, 'Yes'),
(5, 3, 'No');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `answer_type`) VALUES
(1, 'where did you hear about FOSS ?', 1),
(2, 'what is your name', 0),
(3, 'Are You Good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_info`
--

CREATE TABLE IF NOT EXISTS `visitor_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_no` int(11) NOT NULL,
  `os` varchar(32) NOT NULL,
  `browser` varchar(32) NOT NULL,
  `timestamp` varchar(11) NOT NULL,
  `ip` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `visitor_info`
--

INSERT INTO `visitor_info` (`id`, `user_no`, `os`, `browser`, `timestamp`, `ip`) VALUES
(1, 1, '', '', '456', '127.0.0.1'),
(6, 2, 'yy', 'xx', '456', '127.0.0.1'),
(7, 3, 'yy', '', '456', '127.0.0.1'),
(8, 4, 'yy', '', '456', '127.0.0.1'),
(9, 5, 'yy', '', '1379434827', '127.0.0.1'),
(10, 6, 'yy', '', '1379435264', '127.0.0.1'),
(11, 7, 'yy', '', '1379435313', '127.0.0.1'),
(12, 8, 'yy', '', '1379435390', '127.0.0.1'),
(13, 9, 'yy', '', '1379436676', '127.0.0.1'),
(14, 10, 'yy', '', '1379436716', '127.0.0.1'),
(15, 11, 'yy', '', '1379436818', '127.0.0.1'),
(16, 12, 'yy', '$browser["parent"]', '1379438151', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
