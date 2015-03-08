-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2015 at 10:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `plotter`
--

-- --------------------------------------------------------

--
-- Table structure for table `plotter`
--

CREATE TABLE IF NOT EXISTS `plotter` (
  `plotterid` int(11) NOT NULL AUTO_INCREMENT,
  `plotterdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `plottersy` int(11) NOT NULL,
  `plottersem` varchar(10) NOT NULL,
  `studentid` int(11) NOT NULL,
  `status` smallint(6) NOT NULL,
  PRIMARY KEY (`plotterid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `plotter`
--

INSERT INTO `plotter` (`plotterid`, `plotterdate`, `plottersy`, `plottersem`, `studentid`, `status`) VALUES
(2, '2015-03-07 16:00:00', 2014, '1st', 12345678, 1),
(3, '0000-00-00 00:00:00', 2014, '1st', 12345678, 1),
(4, '0000-00-00 00:00:00', 2014, '1st', 12345678, 1),
(5, '2015-03-07 20:23:27', 2014, '1st', 12345678, 1),
(6, '2015-03-07 21:45:56', 2014, '1st', 12345678, 1),
(7, '2015-03-07 21:49:02', 2014, '1st', 12345678, 1),
(8, '2015-03-07 21:55:02', 2014, '1st', 12345678, 1),
(9, '2015-03-07 21:56:08', 2014, '1st', 12345678, 1),
(10, '2015-03-07 22:03:01', 2014, '1st', 12345678, 1),
(11, '2015-03-07 23:20:01', 2014, '1st', 12345678, 1),
(12, '2015-03-07 23:21:55', 2014, '1st', 12345678, 2),
(13, '2015-03-08 01:02:20', 2014, '1st', 1, 1),
(14, '2015-03-08 01:04:16', 2014, '1st', 1, 1),
(15, '2015-03-08 01:14:04', 2014, '1st', 1, 2),
(16, '2015-03-08 01:35:01', 2014, '1st', 1, 2),
(17, '2015-03-08 01:35:04', 2014, '1st', 1, 2),
(18, '2015-03-08 01:44:32', 2014, '1st', 1, 1),
(19, '2015-03-08 02:10:12', 2014, '1st', 1, 1),
(20, '2015-03-08 03:05:28', 2014, '1st', 1, 1),
(21, '2015-03-08 03:10:21', 2014, '1st', 1, 1),
(22, '2015-03-08 03:22:19', 2014, '1st', 1, 1),
(23, '2015-03-08 04:22:13', 2014, '1st', 1, 1),
(24, '2015-03-08 04:27:39', 2014, '1st', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
