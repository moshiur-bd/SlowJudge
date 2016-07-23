-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2016 at 01:59 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `contest`
--

INSERT INTO `contest` (`id`, `name`, `uid`) VALUES
(1, 'Testing Contest', 0),
(6, 'que', 0),
(7, 'This Is the first', 0),
(9, 'd', 0),
(10, 'hell', 0),
(11, 'hell', 0),
(12, 'COCI', 0),
(14, 'Again', 0),
(15, 'New', 0),
(16, 'BE', 0),
(19, 'sjjk-.*', 0),
(22, 'Hellyah', 0),
(23, 'SJ round #1', 0),
(24, 'hhjjj', 0),
(25, 'Eid Day', 0),
(28, 'NHSPC practice contest 2', 0),
(29, 'qwqwqwqw', 0),
(30, 'sfjksdkjfdkj', 0),
(31, '', 0),
(32, 'NEWER', 0),
(34, 'sdsds', 0),
(35, 'ghtki', 0),
(36, 'newdff', 0),
(37, 'TESTING ', 0),
(38, 'testing2', 0),
(39, 'abcde', 0);

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
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=57 ;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`pid`, `name`, `tl`, `ml`, `dscnt`) VALUES
(1, 'a', 1000, 512, 0),
(2, 'a', 1000, 512, 0),
(3, 'hhsdhsdh', 1000, 512, 0),
(4, 'hhsdhsdh', 1000, 512, 0),
(5, 'new', 1000, 512, 0),
(6, 'first success', 1000, 512, 0),
(7, 'dfdf', 1000, 512, 0),
(8, 'A deep', 1000, 512, 0),
(9, 'Way', 1000, 512, 0),
(10, 'To ', 1000, 512, 0),
(11, 'Learn', 3000, 1233, 0),
(17, 'New', 1000, 512, 0),
(18, 'Eid 1', 1000, 512, 0),
(19, 'Eid 2', 1000, 512, 0),
(20, 'Eid 3', 1000, 512, 0),
(21, 'Ant', 0, 0, 2),
(27, 'Ball', 1000, 512, 0),
(28, 'Cat', 1000, 512, 0),
(29, 'Dog', 1000, 512, 0),
(30, 'Egg', 1000, 512, 0),
(31, 'Asia Cup 2016', 1000, 512, 1),
(32, 'Leap Year', 1000, 512, 1),
(33, 'Number System', 1000, 512, 1),
(34, 'Pyramid of Dreamland', 1000, 512, 1),
(40, 'a', 1000, 512, 0),
(50, 'Robot Command', 1000, 512, 0),
(51, 'SameSymWord', 1000, 512, 0),
(52, 'The Mathmatician NusLaAlludba', 1000, 512, 0),
(53, 'The Value of X', 1000, 512, 0),
(54, 'abc', 1000, 512, 0),
(55, 'dfdfdf', 1000, 512, 0),
(56, '', 1000, 512, 0);

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`id`, `pid`, `lang`, `flag`, `runtime`, `arrtime`, `hold`, `uid`, `conid`) VALUES
(1, 31, 3, NULL, NULL, '2016-07-23 06:53:14', NULL, 2, 28),
(2, 31, 3, NULL, NULL, '2016-07-23 06:53:22', NULL, 2, 28),
(3, 31, 3, NULL, NULL, '2016-07-23 06:54:47', NULL, 2, 28),
(4, 31, 3, NULL, NULL, '2016-07-23 06:56:14', NULL, 2, 28),
(5, 31, 3, NULL, NULL, '2016-07-23 06:56:56', NULL, 2, 28),
(6, 31, 3, NULL, NULL, '2016-07-23 06:58:08', NULL, 2, 28),
(7, 31, 3, NULL, NULL, '2016-07-23 06:58:58', NULL, 2, 28),
(8, 31, 3, NULL, NULL, '2016-07-23 06:59:13', NULL, 2, 28),
(9, 31, 3, NULL, NULL, '2016-07-23 07:00:11', NULL, 2, 28),
(10, 31, 3, NULL, NULL, '2016-07-23 07:00:19', NULL, 2, 28),
(11, 31, 3, NULL, NULL, '2016-07-23 07:02:00', NULL, 2, 28),
(12, 31, 3, NULL, NULL, '2016-07-23 07:02:46', NULL, 2, 28),
(13, 31, 3, NULL, NULL, '2016-07-23 07:03:51', NULL, 2, 28),
(14, 31, 3, NULL, NULL, '2016-07-23 07:03:53', NULL, 2, 28),
(15, 31, 3, NULL, NULL, '2016-07-23 07:03:56', NULL, 2, 28),
(16, 31, 3, NULL, NULL, '2016-07-23 07:04:46', NULL, 2, 28),
(17, 31, 3, NULL, NULL, '2016-07-23 07:10:45', NULL, 2, 28),
(18, 31, 3, NULL, NULL, '2016-07-23 07:10:54', NULL, 2, 28),
(19, 31, 3, NULL, NULL, '2016-07-23 07:10:57', NULL, 2, 28),
(20, 34, 3, NULL, NULL, '2016-07-23 07:12:12', NULL, 2, 28),
(21, 34, 3, NULL, NULL, '2016-07-23 07:12:19', NULL, 2, 28),
(22, 34, 3, NULL, NULL, '2016-07-23 07:42:33', NULL, 2, 28);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(40) NOT NULL,
  `upass` varchar(40) NOT NULL,
  `type` varchar(20) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `upass`, `type`) VALUES
(1, 'root', '', 'admin'),
(2, 'moshiur.bd', '1', 'coach'),
(5, 'ab', 'a', 'user'),
(6, 'aaa', 'a', 'user'),
(9, 'sudipto.bd', '12345', 'user'),
(10, 'newer', '12345', 'user'),
(11, 'tnvr', 'tnvr', 'user');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
