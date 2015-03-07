-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2015 at 05:51 AM
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
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentid` int(11) NOT NULL AUTO_INCREMENT,
  `studentfname` varchar(30) NOT NULL,
  `studentmi` varchar(2) NOT NULL,
  `studentlname` varchar(30) NOT NULL,
  `studentcourse` varchar(15) NOT NULL,
  `studentyear` int(11) NOT NULL,
  `studentcontactno` varchar(15) NOT NULL,
  PRIMARY KEY (`studentid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentfname`, `studentmi`, `studentlname`, `studentcourse`, `studentyear`, `studentcontactno`) VALUES
(1, 'bob', 'mi', 'clems', 'bsit', 3, '123'),
(2, 'lary', 'c', 'last', 'bsit', 3, '321'),
(3, 'jxin', 'c', 'coders', 'bsit', 4, '3'),
(4, 'lary', 'c', 'last', 'bsit', 3, '321'),
(5, 'jxin', 'c', 'coders', 'bsit', 4, '3');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subjNo` int(11) NOT NULL AUTO_INCREMENT,
  `edpcode` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `stime` time NOT NULL,
  `etime` time NOT NULL,
  `days` varchar(30) NOT NULL,
  `room` varchar(30) NOT NULL,
  `units` int(11) NOT NULL,
  `prereq` varchar(30) NOT NULL,
  PRIMARY KEY (`subjNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjNo`, `edpcode`, `subject`, `stime`, `etime`, `days`, `room`, `units`, `prereq`) VALUES
(22, '1', '1', '13:01:00', '14:01:00', 'MF', '1', 1, ''),
(23, '2', '2', '14:22:00', '14:23:00', 'MWF', '2', 2, ''),
(24, '3', '3', '15:03:00', '16:03:00', 'MF', '2', 2, ''),
(25, '4', '4', '04:04:00', '05:04:00', 'MF', '4', 4, ''),
(29, '12345', 'AIS32', '04:30:00', '05:30:00', 'MWF', '213', 5, ''),
(30, '208526', 'MGT1A', '05:30:00', '06:30:00', 'MWF', '511', 3, ''),
(31, '3', '3', '03:03:00', '03:04:00', 'MF', '1', 1, ''),
(32, '13', '3', '01:01:00', '14:02:00', 'TTH', '3', 3, ''),
(36, '13', '3', '01:01:00', '14:02:00', 'TTH', '3', 3, ''),
(37, '13134', '3232322', '01:01:00', '13:02:00', 'M-F', '3222', 3, ''),
(38, '13123', '321312', '01:01:00', '14:02:00', 'M-F', '1231', 1, ''),
(39, '21333', 'MGT1A', '00:03:00', '01:04:00', 'M-F', '123', 3, ''),
(40, '21333', 'MGT1A', '00:33:00', '01:33:00', 'M-F', '123', 1, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
