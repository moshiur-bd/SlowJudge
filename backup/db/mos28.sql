-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2016 at 02:26 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

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
(83, 1, 'balance.in'),
(83, 2, 'balance.in'),
(83, 3, 'balance.in'),
(83, 4, 'balance.in'),
(83, 5, '1.in'),
(83, 6, '1.in'),
(83, 0, 'judge.in'),
(84, 0, 'judge.in'),
(85, 0, 'judge.in'),
(86, 0, 'judge.in'),
(86, 1, 'judge2.in');

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
(83, 1, 'balance.out'),
(83, 2, 'balance.out'),
(83, 3, 'balance.out'),
(83, 4, 'balance.out'),
(83, 5, '1.in'),
(83, 6, '1.in'),
(83, 0, 'judge.out'),
(84, 0, 'judge.out'),
(85, 0, 'judge.out'),
(86, 0, 'judge.out'),
(86, 1, 'judge2.out');

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
(33, 'Number System.pdf'),
(83, 'problemstatement.pdf'),
(84, 'description.pdf'),
(85, 'Mathematician Nus La Alladba.pdf'),
(86, 'The value of X.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `pid` int(11) NOT NULL,
  `cpid` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`pid`, `cpid`, `score`) VALUES
(31, 0, 1),
(32, 1, 1),
(33, 2, 1),
(34, 3, 1),
(83, 4, 1),
(84, 5, 1),
(85, 6, 1),
(86, 7, 1);

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
  `penalty4` int(11) NOT NULL DEFAULT '0',
  `score4` int(11) NOT NULL DEFAULT '0',
  `firstac4` int(11) NOT NULL DEFAULT '2147483647',
  `wrong4` int(11) NOT NULL DEFAULT '0',
  `penalty5` int(11) NOT NULL DEFAULT '0',
  `score5` int(11) NOT NULL DEFAULT '0',
  `firstac5` int(11) NOT NULL DEFAULT '2147483647',
  `wrong5` int(11) NOT NULL DEFAULT '0',
  `penalty6` int(11) NOT NULL DEFAULT '0',
  `score6` int(11) NOT NULL DEFAULT '0',
  `firstac6` int(11) NOT NULL DEFAULT '2147483647',
  `wrong6` int(11) NOT NULL DEFAULT '0',
  `penalty7` int(11) NOT NULL DEFAULT '0',
  `score7` int(11) NOT NULL DEFAULT '0',
  `firstac7` int(11) NOT NULL DEFAULT '2147483647',
  `wrong7` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoreboard`
--

INSERT INTO `scoreboard` (`uid`, `uname`, `name`, `rank`, `score`, `penalty`, `penalty0`, `firstac0`, `penalty1`, `firstac1`, `penalty2`, `firstac2`, `penalty3`, `firstac3`, `score0`, `score1`, `score2`, `score3`, `wrong0`, `wrong1`, `wrong2`, `wrong3`, `penalty4`, `score4`, `firstac4`, `wrong4`, `penalty5`, `score5`, `firstac5`, `wrong5`, `penalty6`, `score6`, `firstac6`, `wrong6`, `penalty7`, `score7`, `firstac7`, `wrong7`) VALUES
(2, 'moshiur.bd', 'Moshiur Rahman', 0, 400, 5226, 138, 35, 1185, 72, 0, 2147483647, 201, 40, 100, 100, 0, 100, 0, 1, 4, 0, 0, 0, 2147483647, 0, 3702, 100, 126, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(9, 'sudipto.bd', 'sudipto', 0, 100, 274, 274, 47, 0, 2147483647, 0, 2147483647, 0, 2147483647, 100, 0, 0, 0, 0, 1, 3, 1, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(11, 'tnvr', 'Tanvir', 0, 100, 213, 0, 2147483647, 0, 2147483647, 213, 43, 0, 2147483647, 0, 0, 100, 0, 0, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(13, 'FakeUser', 'FakeUser', 0, 200, 775, 0, 2147483647, 521, 53, 254, 46, 0, 2147483647, 0, 100, 100, 0, 6, 2, 1, 1, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(14, 'skmonir', 'skmonir', 0, 100, 601, 601, 58, 0, 2147483647, 0, 2147483647, 0, 2147483647, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(40, 'prodipdatta7', 'Prodip Datta', 0, 0, 0, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 0, 0, 0, 1, 3, 2, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(41, 'mesbaulbsmrstu', 'mesbaulhasan', 0, 0, 0, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(42, 'aim_to_miss', 'MD Rahman', 0, 0, 0, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 0, 0, 0, 2, 2, 2, 3, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(43, 'newid', 'FakeId', 0, 0, 0, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(44, 'Ramprosad', 'Ramprosad Gharami', 0, 100, 4173, 0, 2147483647, 4173, 164, 0, 2147483647, 0, 2147483647, 0, 100, 0, 0, 7, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(45, 'loosercoder', 'Ankita Dutta |Mou', 0, 100, 4129, 4129, 153, 0, 2147483647, 0, 2147483647, 0, 2147483647, 100, 0, 0, 0, 0, 1, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(46, 'Jakia', 'Khairun Nahar', 0, 0, 0, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(50, 'jisan047', 'Jisan Shaikh', 0, 0, 0, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 2147483647, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 2, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(53, 'azizul300', 'azizul islam', 0, 100, 16483, 16483, 185, 0, 2147483647, 0, 2147483647, 0, 2147483647, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(56, 'Ramprosad49', 'Ramprosad', 0, 600, 106444, 17698, 276, 17708, 277, 17721, 278, 17737, 279, 100, 100, 100, 100, 0, 0, 0, 0, 17772, 100, 283, 1, 17808, 100, 285, 1, 0, 0, 2147483647, 0, 0, 0, 2147483647, 2),
(62, 'pallab', 'syed pallab', 0, 200, 33042, 16508, 208, 16534, 232, 0, 2147483647, 0, 2147483647, 100, 100, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(63, 'anamika', 'anamika gain', 0, 100, 16500, 16500, 199, 0, 2147483647, 0, 2147483647, 0, 2147483647, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0);

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
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`delay`, `duration`, `penalty`, `problemCount`, `status`, `name`) VALUES
(5000, 1767360000, 20, 8, 'paused', 'NHSPC practice contest 2');

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
(88, 0, 'balance.out'),
(83, 0, 'judge.cpp'),
(84, 0, 'judge.cpp'),
(85, 0, 'judge.cpp'),
(86, 0, 'judge.cpp');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `arrtime` int(11) NOT NULL
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
(118, 2, 31, 188067),
(119, 2, 31, 190595),
(120, 2, 31, 191080),
(121, 2, 31, 192473),
(122, 9, 31, 207607),
(123, 9, 31, 207640),
(124, 9, 31, 207721),
(125, 2, 31, 216487),
(126, 2, 84, 222146),
(127, 2, 84, 222244),
(128, 2, 31, 222407),
(129, 2, 84, 222825),
(130, 2, 84, 222853),
(131, 2, 31, 230644),
(132, 2, 31, 230654),
(133, 2, 31, 230659),
(134, 2, 31, 230664),
(135, 2, 84, 234214),
(136, 43, 31, 246035),
(137, 40, 31, 246131),
(138, 42, 31, 246184),
(139, 42, 31, 246225),
(140, 44, 31, 246666),
(141, 44, 31, 246802),
(142, 42, 32, 246812),
(143, 42, 32, 246853),
(144, 42, 33, 247177),
(145, 42, 33, 247216),
(146, 40, 32, 247295),
(147, 44, 31, 247545),
(148, 41, 31, 247647),
(149, 40, 32, 247652),
(150, 44, 31, 247733),
(151, 40, 32, 247755),
(152, 41, 31, 247776),
(153, 45, 31, 247776),
(154, 42, 34, 247790),
(155, 42, 34, 247884),
(156, 44, 31, 247957),
(157, 40, 33, 247983),
(158, 40, 33, 248025),
(159, 44, 31, 248042),
(160, 42, 34, 248052),
(161, 44, 31, 248238),
(162, 45, 32, 248561),
(163, 46, 31, 248819),
(164, 44, 32, 250414),
(185, 53, 31, 989006),
(199, 63, 31, 990053),
(208, 62, 31, 990495),
(232, 62, 32, 992059),
(238, 50, 84, 992386),
(247, 50, 84, 993422),
(270, 56, 86, 1052065),
(276, 56, 31, 1061932),
(277, 56, 32, 1062525),
(278, 56, 33, 1063274),
(279, 56, 34, 1064232),
(281, 56, 83, 1064979),
(283, 56, 83, 1065144),
(284, 56, 84, 1067016),
(285, 56, 84, 1067284),
(887, 56, 86, 1118136);

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
('1404132745', '1476792853334');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
 ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `scoreboard`
--
ALTER TABLE `scoreboard`
 ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`delay`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
