-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 10, 2013 at 06:08 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id`, `user_no`, `question_id`, `answer`) VALUES
(1, 1, 1, '1'),
(2, 0, 1, '1'),
(3, 0, 1, '0'),
(4, 0, 1, '0'),
(5, 0, 1, '0'),
(6, 5, 1, '2'),
(7, 6, 1, '0'),
(8, 7, 1, '1'),
(9, 8, 1, '2'),
(10, 9, 1, '0'),
(11, 10, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE IF NOT EXISTS `options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `options` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `question_id`, `options`) VALUES
(1, 1, 'Internet'),
(2, 1, 'Friend'),
(3, 1, 'Mailing List');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer_type` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `answer_type`) VALUES
(1, 'where did you hear about FOSS ?', 1),
(2, 'what is your name', 0);

-- --------------------------------------------------------

--
-- Table structure for table `visitor_info`
--

CREATE TABLE IF NOT EXISTS `visitor_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `os` varchar(32) NOT NULL,
  `browser` varchar(32) NOT NULL,
  `timestamp` varchar(11) NOT NULL,
  `ip` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `visitor_info`
--

INSERT INTO `visitor_info` (`id`, `os`, `browser`, `timestamp`, `ip`) VALUES
(1, '', '', '456', '127.0.0.1'),
(2, '', '', '456', '127.0.0.1'),
(3, '', '', '456', '127.0.0.1'),
(4, '', '', '456', '127.0.0.1'),
(5, '', '', '456', '127.0.0.1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
