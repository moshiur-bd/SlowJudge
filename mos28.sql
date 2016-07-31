-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 31, 2016 at 07:10 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mos28`
--

-- --------------------------------------------------------

--
-- Table structure for table `inset`
--

CREATE TABLE IF NOT EXISTS `inset` (
  `pid` int(11) NOT NULL,
  `dsid` int(11) NOT NULL,
  `in` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inset`
--

INSERT INTO `inset` (`pid`, `dsid`, `in`) VALUES
(32, 0, 'judge.in'),
(33, 0, 'judge.in'),
(34, 0, 'judge.in'),
(31, 0, 'alter1.in'),
(31, 1, 'alter1.in'),
(31, 2, 'clean.bat'),
(31, 3, 'alter1.in'),
(31, 4, 'alter1.in'),
(31, 5, 'alter1.in'),
(31, 6, 'alter1.in'),
(31, 7, 'alter1.in'),
(31, 8, 'alter1.in'),
(31, 9, 'alter2.in'),
(83, 0, 'balance.in'),
(83, 1, 'balance.in'),
(83, 2, 'balance.in'),
(83, 3, 'balance.in'),
(83, 4, 'balance.in'),
(83, 5, '1.in'),
(83, 6, '1.in');

-- --------------------------------------------------------

--
-- Table structure for table `outset`
--

CREATE TABLE IF NOT EXISTS `outset` (
  `pid` int(11) NOT NULL,
  `dsid` int(11) NOT NULL,
  `out` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outset`
--

INSERT INTO `outset` (`pid`, `dsid`, `out`) VALUES
(32, 0, 'judge.out'),
(33, 0, 'alter1.in'),
(34, 0, 'judge.out'),
(31, 0, 'judge.in'),
(31, 1, 'judge.in'),
(31, 2, 'judge.in'),
(31, 3, 'judge.in'),
(31, 4, 'judge.in'),
(31, 5, 'judge.in'),
(31, 6, 'judge.in'),
(31, 7, 'judge.in'),
(31, 8, 'judge.in'),
(31, 9, 'judge.in'),
(83, 0, 'balance.out'),
(83, 1, 'balance.out'),
(83, 2, 'balance.out'),
(83, 3, 'balance.out'),
(83, 4, 'balance.out'),
(83, 5, '1.in'),
(83, 6, '1.in');

-- --------------------------------------------------------

--
-- Table structure for table `pdfset`
--

CREATE TABLE IF NOT EXISTS `pdfset` (
  `pid` int(11) NOT NULL,
  `pdf` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pdfset`
--

INSERT INTO `pdfset` (`pid`, `pdf`) VALUES
(32, 'count leap year.pdf'),
(31, 'Asia Cup.pdf'),
(34, 'Pyramid of DreamLand.pdf'),
(33, 'Number System.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `pid` int(11) NOT NULL,
  `cpid` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`pid`, `cpid`, `score`) VALUES
(31, 0, 1),
(32, 1, 1),
(33, 2, 1),
(34, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scoreboard`
--

CREATE TABLE IF NOT EXISTS `scoreboard` (
  `uid` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rank` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `penalty` int(11) NOT NULL,
  `penalty0` int(11) NOT NULL DEFAULT '0',
  `firstac0` int(11) NOT NULL DEFAULT '2147483647',
  `penalty1` int(11) NOT NULL DEFAULT '0',
  `firstac1` int(11) NOT NULL DEFAULT '2147483647',
  `penalty2` int(11) NOT NULL DEFAULT '0',
  `firstac2` int(11) NOT NULL DEFAULT '2147483647',
  `penalty3` int(11) NOT NULL DEFAULT '0',
  `firstac3` int(11) NOT NULL DEFAULT '2147483647',
  `score0` int(11) NOT NULL DEFAULT '0',
  `score1` int(11) NOT NULL DEFAULT '0',
  `score2` int(11) NOT NULL DEFAULT '0',
  `score3` int(11) NOT NULL DEFAULT '0',
  `wrong0` int(11) NOT NULL DEFAULT '0',
  `wrong1` int(11) NOT NULL DEFAULT '0',
  `wrong2` int(11) NOT NULL DEFAULT '0',
  `wrong3` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoreboard`
--

INSERT INTO `scoreboard` (`uid`, `uname`, `name`, `rank`, `score`, `penalty`, `penalty0`, `firstac0`, `penalty1`, `firstac1`, `penalty2`, `firstac2`, `penalty3`, `firstac3`, `score0`, `score1`, `score2`, `score3`, `wrong0`, `wrong1`, `wrong2`, `wrong3`) VALUES
(2, 'moshiur.bd', 'Moshiur Rahman', 0, 300, 1504, 138, 35, 1165, 72, 0, 2147483647, 201, 40, 100, 100, 0, 100, 1, 2, 4, 1),
(9, 'sudipto.bd', 'sudipto', 0, 100, 274, 274, 47, 0, 2147483647, 0, 2147483647, 0, 2147483647, 100, 0, 0, 0, 1, 1, 3, 1),
(11, 'tnvr', 'Tanvir', 0, 100, 213, 0, 2147483647, 0, 2147483647, 213, 43, 0, 2147483647, 0, 0, 100, 0, 0, 0, 1, 0),
(13, 'FakeUser', 'FakeUser', 0, 300, 1197, 482, 55, 481, 53, 234, 46, 0, 2147483647, 100, 100, 100, 0, 2, 3, 2, 1),
(14, 'skmonir', 'skmonir', 0, 100, 602, 602, 60, 0, 2147483647, 0, 2147483647, 0, 2147483647, 100, 0, 0, 0, 3, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `delay` int(11) NOT NULL DEFAULT '2000',
  `duration` bigint(20) NOT NULL DEFAULT '3600000',
  `penalty` int(11) NOT NULL DEFAULT '20',
  `problemCount` int(11) NOT NULL DEFAULT '0',
  `status` varchar(30) NOT NULL DEFAULT 'upcoming',
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`delay`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`delay`, `duration`, `penalty`, `problemCount`, `status`, `name`) VALUES
(5000, 287800000, 20, 4, 'running', 'NHSPC practice contest 2');

-- --------------------------------------------------------

--
-- Table structure for table `srcset`
--

CREATE TABLE IF NOT EXISTS `srcset` (
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `src` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `srcset`
--

INSERT INTO `srcset` (`pid`, `sid`, `src`) VALUES
(31, 0, 'Judge.cpp'),
(32, 0, 'judge.cpp'),
(33, 0, 'Judge.cpp'),
(34, 0, 'judge.cpp'),
(88, 0, 'balance.out');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `arrtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `uid`, `pid`, `arrtime`) VALUES
(35, 2, 31, 8323),
(36, 2, 31, 12005),
(37, 2, 31, 12009),
(38, 2, 31, 12011),
(39, 2, 31, 12014),
(40, 2, 34, 12080),
(41, 2, 34, 12181),
(42, 2, 31, 12662),
(43, 11, 33, 12809),
(45, 13, 33, 13962),
(46, 13, 33, 14070),
(47, 9, 31, 16440),
(48, 9, 31, 16564),
(49, 2, 32, 21997),
(50, 2, 31, 27926),
(51, 13, 32, 28829),
(52, 13, 32, 28862),
(53, 13, 32, 28880),
(54, 13, 31, 28940),
(55, 13, 31, 28951),
(56, 9, 31, 29254),
(57, 9, 32, 29298),
(58, 14, 31, 36082),
(59, 14, 31, 36093),
(60, 14, 31, 36128),
(61, 13, 31, 37847),
(62, 13, 33, 40042),
(63, 9, 31, 43891),
(64, 14, 31, 48968),
(65, 14, 31, 49019),
(66, 14, 31, 49116),
(67, 14, 31, 49157),
(68, 14, 31, 49172),
(69, 14, 31, 49373),
(70, 2, 31, 69602),
(71, 2, 31, 69618),
(72, 2, 32, 69953),
(73, 2, 32, 70043),
(74, 2, 32, 70093),
(75, 2, 32, 70145),
(76, 2, 32, 70241),
(77, 2, 32, 70281),
(78, 13, 31, 72943),
(79, 2, 31, 98098),
(80, 2, 31, 98150),
(81, 2, 32, 98263),
(82, 2, 32, 98341),
(83, 9, 33, 102239),
(86, 2, 31, 102524),
(87, 2, 31, 102668),
(88, 9, 34, 102699),
(89, 9, 33, 102998),
(90, 2, 31, 103831),
(91, 2, 31, 118846),
(92, 2, 31, 119128),
(93, 2, 31, 119149),
(94, 2, 31, 119385),
(95, 2, 31, 119402),
(96, 2, 31, 119468),
(97, 2, 31, 119531),
(98, 2, 31, 119596),
(99, 2, 31, 119654),
(100, 2, 31, 119658),
(101, 2, 31, 119660),
(102, 2, 31, 119662),
(103, 2, 31, 119673),
(104, 2, 31, 120717),
(105, 13, 34, 122668),
(106, 2, 31, 126499),
(107, 2, 33, 126869),
(108, 2, 33, 126874),
(109, 2, 33, 126904),
(110, 2, 33, 126951),
(111, 2, 31, 136371),
(112, 2, 31, 137418),
(113, 13, 31, 147134),
(114, 13, 31, 147210),
(115, 2, 31, 158390),
(116, 2, 31, 187816),
(117, 2, 31, 188036),
(118, 2, 31, 188067);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `elapsed` mediumtext NOT NULL,
  `stamp` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`elapsed`, `stamp`) VALUES
('190554970', '1469903619878');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
