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
-- Database: `mosuser`
--

-- --------------------------------------------------------

--
-- Table structure for table `contest`
--

CREATE TABLE IF NOT EXISTS `contest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `uid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`id`, `name`, `uid`) VALUES
(28, 'NHSPC practice contest 2', 0);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL,
  `value` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `value`) VALUES
(1, 'C'),
(2, 'C++'),
(3, 'C++11'),
(4, 'java');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE IF NOT EXISTS `problem` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `tl` int(11) NOT NULL,
  `ml` int(11) NOT NULL,
  `dscnt` int(11) NOT NULL,
  `status` varchar(30) NOT NULL DEFAULT 'private',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=83 ;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`pid`, `name`, `tl`, `ml`, `dscnt`, `status`) VALUES
(1, 'a', 1000, 512, 0, 'private'),
(2, 'a', 1000, 512, 0, 'private'),
(3, 'hhsdhsdh', 1000, 512, 0, 'private'),
(4, 'hhsdhsdh', 1000, 512, 0, 'private'),
(5, 'new', 1000, 512, 0, 'private'),
(6, 'first success', 1000, 512, 0, 'private'),
(7, 'dfdf', 1000, 512, 0, 'private'),
(8, 'A deep', 1000, 512, 0, 'private'),
(9, 'Way', 1000, 512, 0, 'private'),
(10, 'To ', 1000, 512, 0, 'private'),
(11, 'Learn', 3000, 1233, 0, 'private'),
(17, 'New', 1000, 512, 0, 'private'),
(18, 'Eid 1', 1000, 512, 0, 'private'),
(19, 'Eid 2', 1000, 512, 0, 'private'),
(20, 'Eid 3', 1000, 512, 0, 'private'),
(21, 'Ant', 0, 0, 2, 'private'),
(27, 'Ball', 1000, 512, 0, 'private'),
(28, 'Cat', 1000, 512, 0, 'private'),
(29, 'Dog', 1000, 512, 0, 'private'),
(30, 'Egg', 1000, 512, 0, 'private'),
(31, 'Asia Cup 2016', 1000, 512, 10, 'private'),
(32, 'Leap Year', 10000, 512, 1, 'private'),
(33, 'Number System', 1000, 512, 1, 'private'),
(34, 'Pyramid of Dreamland', 1000, 512, 1, 'private'),
(40, 'a', 1000, 512, 0, 'private'),
(50, 'Robot Command', 1000, 512, 0, 'private'),
(51, 'SameSymWord', 1000, 512, 0, 'private'),
(52, 'The Mathmatician NusLaAlludba', 1000, 512, 0, 'private'),
(53, 'The Value of X', 1000, 512, 0, 'private'),
(54, 'abc', 1000, 512, 0, 'private'),
(55, 'dfdfdf', 1000, 512, 0, 'private'),
(56, '', 1000, 512, 0, 'private'),
(57, 'one', 1000, 512, 0, 'private'),
(58, 'two', 1000, 512, 0, 'private'),
(77, '', 1000, 512, 0, 'private'),
(78, '', 1000, 512, 0, 'private'),
(79, '', 1000, 512, 0, 'private'),
(80, '', 1000, 512, 0, 'private'),
(81, '', 1000, 512, 0, 'private'),
(82, '', 1000, 512, 0, 'private');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `flag` int(11) DEFAULT NULL,
  `runtime` int(11) DEFAULT NULL,
  `arrtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hold` bigint(11) DEFAULT NULL,
  `uid` int(11) NOT NULL,
  `conid` int(11) NOT NULL,
  `countable` int(11) NOT NULL DEFAULT '1',
  `uname` varchar(50) NOT NULL DEFAULT 'noname',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `pid`, `lang`, `flag`, `runtime`, `arrtime`, `hold`, `uid`, `conid`, `countable`, `uname`) VALUES
(35, 31, 3, 0, 63, '2016-07-23 11:35:32', 1469900872, 2, 28, 1, 'moshiur.bd'),
(36, 31, 3, 0, 38, '2016-07-23 12:47:06', 1469900874, 2, 28, 1, 'moshiur.bd'),
(37, 31, 3, 0, 25, '2016-07-23 12:47:10', 1469900875, 2, 28, 1, 'moshiur.bd'),
(38, 31, 3, 0, 29, '2016-07-23 12:47:12', 1469900876, 2, 28, 1, 'moshiur.bd'),
(39, 31, 3, 0, 34, '2016-07-23 12:47:15', 1469900877, 2, 28, 1, 'moshiur.bd'),
(40, 34, 3, 0, 218, '2016-07-23 12:49:49', 1469900878, 2, 28, 1, 'moshiur.bd'),
(41, 34, 3, 0, 165, '2016-07-23 12:51:30', 1469900879, 2, 28, 1, 'moshiur.bd'),
(42, 31, 3, 1, 1013, '2016-07-23 14:52:01', 1469900879, 2, 28, 1, 'moshiur.bd'),
(43, 33, 3, 0, 118, '2016-07-23 14:54:27', 1469900880, 11, 28, 1, 'tnvr'),
(45, 33, 3, 2, 108, '2016-07-24 04:14:39', 1469900881, 13, 28, 1, 'FakeUser'),
(46, 33, 3, 0, 75, '2016-07-24 04:16:26', 1469900881, 13, 28, 1, 'FakeUser'),
(47, 31, 3, 0, 28, '2016-07-24 04:55:56', 1469900881, 9, 28, 1, 'sudipto.bd'),
(48, 31, 3, 0, 27, '2016-07-24 04:58:00', 1469900882, 9, 28, 1, 'sudipto.bd'),
(49, 32, 3, -2, 0, '2016-07-24 15:57:13', 1469900883, 2, 28, 1, 'moshiur.bd'),
(50, 31, 3, 2, 67, '2016-07-25 04:03:16', 1469900886, 2, 28, 1, 'moshiur.bd'),
(51, 32, 3, 2, 60, '2016-07-25 04:18:19', 1469900886, 13, 28, 1, 'FakeUser'),
(52, 32, 3, 2, 99, '2016-07-25 04:18:52', 1469900887, 13, 28, 1, 'FakeUser'),
(53, 32, 3, 0, 125, '2016-07-25 04:19:09', 1469900887, 13, 28, 1, 'FakeUser'),
(54, 31, 3, 1, 1022, '2016-07-25 04:20:13', 1469900887, 13, 28, 1, 'FakeUser'),
(55, 31, 3, 0, 24, '2016-07-25 04:20:24', 1469900889, 13, 28, 1, 'FakeUser'),
(56, 31, 3, 2, 105, '2016-07-25 04:25:27', 1469900889, 9, 28, 1, 'sudipto.bd'),
(57, 32, 3, 2, 200, '2016-07-25 04:26:10', 1469900890, 9, 28, 1, 'sudipto.bd'),
(58, 31, 3, 3, 124, '2016-07-25 06:20:10', 1469900890, 14, 28, 1, 'skmonir'),
(59, 31, 3, 3, 67, '2016-07-25 06:20:20', 1469900891, 14, 28, 1, 'skmonir'),
(60, 31, 3, 0, 41, '2016-07-25 06:20:56', 1469900891, 14, 28, 1, 'skmonir'),
(61, 31, 3, 0, 26, '2016-07-25 06:49:35', 1469900892, 13, 28, 1, 'FakeUser'),
(62, 33, 3, 2, 80, '2016-07-25 07:26:10', 1469900892, 13, 28, 1, 'FakeUser'),
(63, 31, 3, 0, 28, '2016-07-25 08:30:19', 1469900893, 9, 28, 1, 'sudipto.bd'),
(64, 31, 3, 1, 1013, '2016-07-25 09:54:56', 1469900893, 14, 28, 1, 'skmonir'),
(65, 31, 3, -2, 0, '2016-07-25 09:55:47', 1469900895, 14, 28, 1, 'skmonir'),
(66, 31, 3, 2, 86, '2016-07-25 09:57:23', 1469900901, 14, 28, 1, 'skmonir'),
(67, 31, 3, -2, 0, '2016-07-25 09:58:05', 1469900902, 14, 28, 1, 'skmonir'),
(68, 31, 3, -2, 0, '2016-07-25 09:58:20', 1469900906, 14, 28, 1, 'skmonir'),
(69, 31, 3, 0, 27, '2016-07-25 10:01:41', 1469900910, 14, 28, 1, 'skmonir'),
(70, 31, 3, -2, 0, '2016-07-25 17:23:27', 1469900913, 2, 28, 1, 'moshiur.bd'),
(71, 31, 3, 2, 300, '2016-07-25 17:23:43', 1469900914, 2, 28, 1, 'moshiur.bd'),
(72, 32, 3, 0, 321, '2016-07-25 17:29:18', 1469900916, 2, 28, 1, 'moshiur.bd'),
(73, 32, 3, 1, 10028, '2016-07-25 17:30:48', 1469900917, 2, 28, 1, 'moshiur.bd'),
(74, 32, 3, -1, 65, '2016-07-25 17:31:38', 1469900928, 2, 28, 1, 'moshiur.bd'),
(75, 32, 3, -1, 107, '2016-07-25 17:32:30', 1469900928, 2, 28, 1, 'moshiur.bd'),
(76, 32, 3, -2, 0, '2016-07-25 17:34:06', 1469900928, 2, 28, 1, 'moshiur.bd'),
(77, 32, 3, -1, 1985, '2016-07-25 17:34:46', 1469900931, 2, 28, 1, 'moshiur.bd'),
(78, 31, 3, 1, 1015, '2016-07-25 18:19:08', 1469900933, 13, 28, 1, 'FakeUser'),
(79, 31, 3, -1, 62, '2016-07-26 02:52:41', 1469900934, 2, 28, 1, 'moshiur.bd'),
(80, 31, 3, 1, 1029, '2016-07-26 02:53:33', 1469900935, 2, 28, 1, 'moshiur.bd'),
(81, 32, 3, 0, 95, '2016-07-26 02:55:26', 1469900936, 2, 28, 1, 'moshiur.bd'),
(82, 32, 3, -1, 67, '2016-07-26 02:56:44', 1469900936, 2, 28, 1, 'moshiur.bd'),
(83, 33, 3, 1, 1019, '2016-07-26 04:01:42', 1469900936, 9, 28, 1, 'sudipto.bd'),
(84, 33, 3, 100, 0, '2016-07-26 04:03:46', 1469900937, 9, 28, 1, 'sudipto.bd'),
(85, 31, 3, 100, 0, '2016-07-26 04:05:36', 1469900938, 2, 28, 1, 'moshiur.bd'),
(86, 31, 3, 2, 69, '2016-07-26 04:06:27', 1469900938, 2, 28, 1, 'moshiur.bd'),
(87, 31, 3, 1, 1030, '2016-07-26 04:08:51', 1469900938, 2, 28, 1, 'moshiur.bd'),
(88, 34, 3, -1, 68, '2016-07-26 04:09:22', 1469900939, 9, 28, 1, 'sudipto.bd'),
(89, 33, 3, -2, 0, '2016-07-26 04:14:20', 1469900939, 9, 28, 1, 'sudipto.bd'),
(90, 31, 3, -2, 0, '2016-07-26 04:28:14', 1469900943, 2, 28, 1, 'moshiur.bd'),
(91, 31, 1, 2, 100, '2016-07-26 08:38:38', 1469900946, 2, 28, 1, 'moshiur.bd'),
(92, 31, 1, -1, 55, '2016-07-26 08:43:21', 1469900946, 2, 28, 1, 'moshiur.bd'),
(93, 31, 1, -2, 0, '2016-07-26 08:43:41', 1469900947, 2, 28, 1, 'moshiur.bd'),
(94, 31, 1, -2, 0, '2016-07-26 08:47:37', 1469900947, 2, 28, 1, 'moshiur.bd'),
(95, 31, 3, -2, 0, '2016-07-26 08:47:55', 1469900948, 2, 28, 1, 'moshiur.bd'),
(96, 31, 2, -2, 0, '2016-07-26 08:49:00', 1469900951, 2, 28, 1, 'moshiur.bd'),
(97, 31, 1, -2, 0, '2016-07-26 08:50:04', 1469900952, 2, 28, 1, 'moshiur.bd'),
(98, 31, 1, -2, 0, '2016-07-26 08:51:09', 1469900953, 2, 28, 1, 'moshiur.bd'),
(99, 31, 3, -2, 0, '2016-07-26 09:01:30', 1469900953, 2, 28, 1, 'moshiur.bd'),
(100, 31, 3, -2, 0, '2016-07-26 09:01:33', 1469900957, 2, 28, 1, 'moshiur.bd'),
(101, 31, 3, -2, 0, '2016-07-26 09:01:36', 1469900960, 2, 28, 1, 'moshiur.bd'),
(102, 31, 3, -2, 0, '2016-07-26 09:01:38', 1469900964, 2, 28, 1, 'moshiur.bd'),
(103, 31, 1, -2, 0, '2016-07-26 09:01:48', 1469900967, 2, 28, 1, 'moshiur.bd'),
(104, 31, 3, 0, 27, '2016-07-26 09:19:13', 1469900967, 2, 28, 1, 'moshiur.bd'),
(105, 34, 3, 2, 117, '2016-07-26 09:52:18', 1469900968, 13, 28, 1, 'FakeUser'),
(106, 31, 4, -2, 0, '2016-07-26 11:54:39', 1469900969, 2, 28, 1, 'moshiur.bd'),
(107, 33, 3, -2, 0, '2016-07-26 12:00:50', 1469900969, 2, 28, 1, 'moshiur.bd'),
(108, 33, 4, -2, 0, '2016-07-26 12:00:55', 1469900969, 2, 28, 1, 'moshiur.bd'),
(109, 33, 2, 2, 63, '2016-07-26 12:01:25', 1469900969, 2, 28, 1, 'moshiur.bd'),
(110, 33, 1, -2, 0, '2016-07-26 12:02:12', 1469900969, 2, 28, 1, 'moshiur.bd'),
(111, 31, 3, 0, 76, '2016-07-26 14:39:12', 1469900970, 2, 28, 1, 'moshiur.bd'),
(112, 31, 3, 0, 31, '2016-07-26 14:56:38', 1469900971, 2, 28, 1, 'moshiur.bd'),
(113, 31, 3, 1, 1020, '2016-07-27 04:33:16', 1469900972, 13, 28, 1, 'FakeUser'),
(114, 31, 3, 1, 1020, '2016-07-27 04:34:32', 1469900973, 13, 28, 1, 'FakeUser'),
(115, 31, 3, 0, 25, '2016-07-28 02:49:40', 1469900974, 2, 28, 1, 'moshiur.bd'),
(116, 31, 3, 2, 59, '2016-07-30 07:19:11', 1469900975, 2, 28, 1, 'moshiur.bd'),
(117, 31, 3, 1, 1016, '2016-07-30 07:22:51', 1469900975, 2, 28, 1, 'moshiur.bd'),
(118, 31, 3, 0, 26, '2016-07-30 07:23:22', 1469900976, 2, 28, 1, 'moshiur.bd');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `uname` varchar(40) NOT NULL,
  `upass` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `name`, `uname`, `upass`, `type`) VALUES
(1, '', 'root', '', 'admin'),
(2, 'Moshiur Rahman', 'moshiur.bd', '1', 'coach'),
(5, '', 'ab', 'a', 'user'),
(6, '', 'aaa', 'a', 'user'),
(9, 'Sudipto', 'sudipto.bd', '12345', 'user'),
(10, '', 'newer', '12345', 'user'),
(11, 'Tanvir Hasan', 'tnvr', 'tnvr', 'user'),
(13, 'FakeUser', 'FakeUser', '12345', 'user'),
(14, 'skmonir', 'skmonir', 'ghorardim', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
