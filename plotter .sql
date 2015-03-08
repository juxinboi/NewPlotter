-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2015 at 06:57 AM
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
-- Table structure for table `plotted_subject`
--

CREATE TABLE IF NOT EXISTS `plotted_subject` (
  `plotterid` int(11) NOT NULL,
  `edpcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plotted_subject`
--

INSERT INTO `plotted_subject` (`plotterid`, `edpcode`) VALUES
(11, 13134),
(13, 13134),
(18, 0),
(21, 13134),
(21, 3),
(21, 12345),
(21, 4),
(21, 13),
(21, 12346),
(21, 13123),
(21, 208526),
(22, 12346),
(22, 13),
(22, 3),
(23, 12346),
(23, 21333);

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
  PRIMARY KEY (`plotterid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `plotter`
--

INSERT INTO `plotter` (`plotterid`, `plotterdate`, `plottersy`, `plottersem`, `studentid`) VALUES
(2, '2015-03-07 16:00:00', 2014, '1st', 12345678),
(3, '0000-00-00 00:00:00', 2014, '1st', 12345678),
(4, '0000-00-00 00:00:00', 2014, '1st', 12345678),
(5, '2015-03-07 20:23:27', 2014, '1st', 12345678),
(6, '2015-03-07 21:45:56', 2014, '1st', 12345678),
(7, '2015-03-07 21:49:02', 2014, '1st', 12345678),
(8, '2015-03-07 21:55:02', 2014, '1st', 12345678),
(9, '2015-03-07 21:56:08', 2014, '1st', 12345678),
(10, '2015-03-07 22:03:01', 2014, '1st', 12345678),
(11, '2015-03-07 23:20:01', 2014, '1st', 12345678),
(12, '2015-03-07 23:21:55', 2014, '1st', 12345678),
(13, '2015-03-08 01:02:20', 2014, '1st', 1),
(14, '2015-03-08 01:04:16', 2014, '1st', 1),
(15, '2015-03-08 01:14:04', 2014, '1st', 1),
(16, '2015-03-08 01:35:01', 2014, '1st', 1),
(17, '2015-03-08 01:35:04', 2014, '1st', 1),
(18, '2015-03-08 01:44:32', 2014, '1st', 1),
(19, '2015-03-08 02:10:12', 2014, '1st', 1),
(20, '2015-03-08 03:05:28', 2014, '1st', 1),
(21, '2015-03-08 03:10:21', 2014, '1st', 1),
(22, '2015-03-08 03:22:19', 2014, '1st', 1),
(23, '2015-03-08 04:22:13', 2014, '1st', 1),
(24, '2015-03-08 04:27:39', 2014, '1st', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `studentno` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` varchar(15) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `mname` varchar(3) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `course` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  `contact` varchar(15) NOT NULL,
  PRIMARY KEY (`studentno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentno`, `studentid`, `fname`, `mname`, `lname`, `course`, `year`, `contact`) VALUES
(1, '12345678', 'bob', 'c', 'clems', 'BSIT', '3', '12345'),
(2, '1', 'jxin', 'c', 'coder', 'bsit', '4', '4321');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

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
(40, '21333', 'MGT1A', '00:33:00', '01:33:00', 'M-F', '123', 1, ''),
(41, '12346', '233232', '02:22:00', '14:02:00', 'M-F', '3333', 3, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
