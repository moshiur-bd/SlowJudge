-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2016 at 03:19 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mos29`
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
(87, 0, 'input-1.txt'),
(88, 0, 'input-2.txt'),
(89, 0, 'input-3.txt'),
(90, 0, 'input-4.txt'),
(91, 0, 'input-5.txt'),
(91, 1, '1.txt'),
(91, 2, '2.txt'),
(91, 3, '3.txt'),
(91, 4, '4.txt'),
(91, 5, '5.txt'),
(91, 6, '6.txt'),
(91, 7, '7.txt'),
(91, 8, '8.txt'),
(91, 9, '9.txt'),
(91, 10, '10.txt');

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
(87, 0, 'output-1.txt'),
(88, 0, 'output-2.txt'),
(89, 0, 'output-3.txt'),
(90, 0, 'output-4.txt'),
(91, 0, 'output-5.txt'),
(91, 1, '1.txt'),
(91, 2, '2.txt'),
(91, 3, '3.txt'),
(91, 4, '4.txt'),
(91, 5, '5.txt'),
(91, 6, '6.txt'),
(91, 7, '7.txt'),
(91, 8, '8.txt'),
(91, 9, '9.txt'),
(91, 10, '10.txt');

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
(87, 'Problem-1.pdf'),
(88, 'Problem-2.pdf'),
(89, 'Problem-3.pdf'),
(90, 'Problem-4.pdf'),
(91, 'Problem-5.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `pid` int(11) NOT NULL,
  `cpid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`pid`, `cpid`) VALUES
(87, 0),
(88, 1),
(89, 2),
(90, 3),
(91, 4);

-- --------------------------------------------------------

--
-- Table structure for table `scoreboard`
--

CREATE TABLE IF NOT EXISTS `scoreboard` (
  `uid` int(11) NOT NULL,
  `uname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rank` int(11) NOT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `penalty` int(11) NOT NULL DEFAULT '0',
  `penalty0` int(11) NOT NULL DEFAULT '0',
  `score0` int(11) NOT NULL DEFAULT '0',
  `firstac0` int(11) NOT NULL DEFAULT '2147483647',
  `wrong0` int(11) NOT NULL DEFAULT '0',
  `penalty1` int(11) NOT NULL DEFAULT '0',
  `score1` int(11) NOT NULL DEFAULT '0',
  `firstac1` int(11) NOT NULL DEFAULT '2147483647',
  `wrong1` int(11) NOT NULL DEFAULT '0',
  `penalty2` int(11) NOT NULL DEFAULT '0',
  `score2` int(11) NOT NULL DEFAULT '0',
  `firstac2` int(11) NOT NULL DEFAULT '2147483647',
  `wrong2` int(11) NOT NULL DEFAULT '0',
  `penalty3` int(11) NOT NULL DEFAULT '0',
  `score3` int(11) NOT NULL DEFAULT '0',
  `firstac3` int(11) NOT NULL DEFAULT '2147483647',
  `wrong3` int(11) NOT NULL DEFAULT '0',
  `penalty4` int(11) NOT NULL DEFAULT '0',
  `score4` int(11) NOT NULL DEFAULT '0',
  `firstac4` int(11) NOT NULL DEFAULT '2147483647',
  `wrong4` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scoreboard`
--

INSERT INTO `scoreboard` (`uid`, `uname`, `name`, `rank`, `score`, `penalty`, `penalty0`, `score0`, `firstac0`, `wrong0`, `penalty1`, `score1`, `firstac1`, `wrong1`, `penalty2`, `score2`, `firstac2`, `wrong2`, `penalty3`, `score3`, `firstac3`, `wrong3`, `penalty4`, `score4`, `firstac4`, `wrong4`) VALUES
(2, 'moshiur.bd', 'Moshiur Rahman', 0, 500, -345, -85, 100, 170, 0, 3, 100, 165, 0, -89, 100, 166, 0, -88, 100, 167, 0, -86, 100, 168, 0),
(40, 'prodipdatta7', 'Prodip Datta', 0, 500, 71080, 13789, 100, 190, 1, 14865, 100, 265, 4, 14771, 100, 260, 1, 13821, 100, 222, 1, 13834, 100, 246, 0),
(41, 'mesbaulbsmrstu', 'mesbaulhasan', 0, 200, 30125, 15048, 100, 282, 1, 15077, 100, 286, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(42, 'aim_to_miss', 'MD Rahman', 0, 500, 69261, 13851, 100, 252, 0, 13852, 100, 253, 0, 13852, 100, 254, 0, 13853, 100, 255, 0, 13853, 100, 256, 0),
(45, 'loosercoder', 'Ankita Dutta |Mou', 0, 300, 43560, 13882, 100, 223, 4, 14865, 100, 273, 1, 14813, 100, 268, 1, 0, 0, 2147483647, 1, 0, 0, 2147483647, 0),
(49, 'msiamn', 'Masnun Siam', 0, 100, 7536, 7536, 100, 172, 0, 0, 0, 2147483647, 1, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(50, 'jisan047', 'Jisan Shaikh', 0, 500, 67467, 13259, 100, 174, 0, 13273, 100, 175, 0, 13282, 100, 176, 0, 13869, 100, 191, 5, 13784, 100, 205, 0),
(51, 'ehsan_sshuvo', 'Ehsan sShuvo', 0, 300, 41411, 13764, 100, 187, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 13772, 100, 195, 0, 13875, 100, 257, 1),
(52, 'SM PORAG', 'SM PORAG', 0, 100, 13913, 13913, 100, 218, 6, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(53, 'azizul300', 'azizul islam', 0, 300, 41501, 13796, 100, 197, 1, 0, 0, 2147483647, 1, 13813, 100, 235, 0, 13892, 100, 258, 1, 0, 0, 2147483647, 0),
(54, 'Jairul', 'Jairul Islam', 0, 100, 13803, 13803, 100, 204, 1, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(55, '123', '123', 0, 500, 69071, 13766, 100, 189, 0, 13841, 100, 239, 1, 13803, 100, 224, 0, 13795, 100, 220, 0, 13866, 100, 251, 1),
(56, 'Ramprosad49', 'Ramprosad', 0, 500, 70028, 13772, 100, 194, 0, 13841, 100, 240, 1, 13786, 100, 210, 0, 13840, 100, 250, 0, 14789, 100, 266, 0),
(57, 'Jahidul_Afrad', 'Jahidul afrad', 0, 300, 41558, 13826, 100, 209, 2, 0, 0, 2147483647, 0, 13795, 100, 219, 0, 13937, 100, 248, 5, 0, 0, 2147483647, 0),
(58, 'alaminv2', 'alamin', 0, 100, 13772, 13772, 100, 193, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 1),
(62, 'pallab', 'syed pallab', 0, 100, 13852, 13852, 100, 245, 1, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(63, 'anamika', 'anamika gain', 0, 300, 43488, 13813, 100, 234, 0, 14869, 100, 274, 1, 14806, 100, 269, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0),
(65, 'Nur_Alam39', 'Nur-E-Alam Jony', 0, 0, 0, 0, 0, 2147483647, 1, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0, 0, 0, 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `delay` int(11) NOT NULL DEFAULT '5000',
  `duration` bigint(20) NOT NULL DEFAULT '3600000',
  `penalty` int(11) NOT NULL DEFAULT '20',
  `problemCount` int(11) NOT NULL DEFAULT '0',
  `status` varchar(30) NOT NULL DEFAULT 'upcoming'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`delay`, `duration`, `penalty`, `problemCount`, `status`) VALUES
(5000, 1584000000, 20, 5, 'paused');

-- --------------------------------------------------------

--
-- Table structure for table `srcset`
--

CREATE TABLE IF NOT EXISTS `srcset` (
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `src` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(165, 2, 88, 208),
(166, 2, 89, -5374),
(167, 2, 90, -5315),
(168, 2, 91, -5209),
(169, 2, 91, -5170),
(170, 2, 87, -5144),
(171, 2, 87, -5095),
(172, 49, 87, 452197),
(173, 49, 88, 452545),
(174, 50, 87, 795565),
(175, 50, 88, 796403),
(176, 50, 89, 796975),
(177, 50, 89, 797044),
(178, 50, 89, 797102),
(179, 50, 89, 797601),
(180, 50, 90, 798267),
(181, 50, 90, 798692),
(182, 50, 89, 798695),
(183, 50, 90, 798829),
(184, 50, 90, 799134),
(186, 50, 90, 825704),
(187, 51, 87, 825849),
(188, 40, 87, 825956),
(189, 55, 87, 825971),
(190, 40, 87, 826153),
(191, 50, 90, 826159),
(192, 58, 91, 826298),
(193, 58, 87, 826325),
(194, 56, 87, 826355),
(195, 51, 90, 826367),
(196, 53, 87, 826498),
(197, 53, 87, 826601),
(198, 57, 87, 826667),
(200, 52, 87, 826810),
(201, 52, 87, 826906),
(202, 54, 87, 826936),
(203, 57, 87, 826973),
(204, 54, 87, 827030),
(205, 50, 91, 827087),
(206, 45, 87, 827115),
(207, 52, 87, 827137),
(209, 57, 87, 827213),
(210, 56, 89, 827218),
(211, 52, 87, 827247),
(212, 45, 87, 827329),
(213, 52, 87, 827360),
(214, 50, 89, 827429),
(215, 45, 87, 827440),
(216, 52, 87, 827447),
(217, 45, 87, 827549),
(218, 52, 87, 827581),
(219, 57, 89, 827720),
(220, 55, 90, 827737),
(221, 40, 90, 827992),
(222, 40, 90, 828114),
(223, 45, 87, 828156),
(224, 55, 89, 828183),
(225, 50, 89, 828346),
(226, 50, 89, 828393),
(227, 57, 90, 828549),
(228, 56, 88, 828649),
(229, 57, 90, 828681),
(230, 57, 90, 828704),
(231, 53, 88, 828731),
(233, 57, 90, 828766),
(234, 63, 87, 828803),
(235, 53, 89, 828822),
(236, 53, 89, 828841),
(237, 55, 88, 829011),
(239, 55, 88, 829293),
(240, 56, 88, 829303),
(241, 57, 90, 829317),
(242, 62, 87, 829634),
(243, 51, 91, 829818),
(244, 53, 90, 829888),
(245, 62, 87, 829925),
(246, 40, 91, 830076),
(248, 57, 90, 830240),
(249, 55, 91, 830245),
(250, 56, 90, 830417),
(251, 55, 91, 830801),
(252, 42, 87, 831109),
(253, 42, 88, 831136),
(254, 42, 89, 831162),
(255, 42, 90, 831187),
(256, 42, 91, 831209),
(257, 51, 91, 831348),
(258, 53, 90, 832357),
(259, 40, 89, 884938),
(260, 40, 89, 885099),
(261, 40, 88, 886105),
(262, 40, 88, 886267),
(263, 40, 88, 886555),
(264, 40, 88, 886679),
(265, 40, 88, 887101),
(266, 56, 91, 887390),
(267, 45, 89, 887526),
(268, 45, 89, 887616),
(269, 63, 89, 888397),
(271, 63, 88, 890299),
(272, 45, 88, 890680),
(273, 45, 88, 890742),
(274, 63, 88, 890993),
(275, 45, 90, 892430),
(280, 41, 87, 901502),
(282, 41, 87, 901722),
(286, 41, 88, 904635),
(287, 65, 87, 904699);

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
('907392262', '1473083606451');

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
 ADD PRIMARY KEY (`status`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
 ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
