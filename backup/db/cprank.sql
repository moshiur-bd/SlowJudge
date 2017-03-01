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
-- Database: `cprank`
--

-- --------------------------------------------------------

--
-- Table structure for table `codeforces`
--

CREATE TABLE IF NOT EXISTS `codeforces` (
  `handle` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codeforces`
--

INSERT INTO `codeforces` (`handle`, `id`, `rating`, `active`, `name`) VALUES
('aim_to_miss', 0, 1167, 1, 'md rahman'),
('arif_bsmrstu', 0, 1054, 0, 'Ariful Islam Arif'),
('azizul300', 0, 1157, 1, ' '),
('bsmrstubellal', 0, 0, 0, ' '),
('Ehsan_sShuvo', 0, 1172, 1, 'MD.Ahosanur Rahaman Chowdhury (sShuvo)'),
('frpartho', 0, 0, 0, 'Partho Bala'),
('Jahidul_Afrad', 0, 0, 0, ' '),
('jisan047', 0, 1375, 1, 'Jisan Shaikh'),
('khsaikat', 0, 0, 0, 'Khairul Hossain Saikat'),
('Linkon_BSMRSTU', 0, 0, 0, 'Fazle Rabbi Linkon'),
('mizan.1400', 0, 1255, 1, 'Mizanur Rahman'),
('moshiur.bd', 0, 1635, 1, 'Moshiur Rahman'),
('msiamn', 0, 936, 1, 'Masnun Siam'),
('net008', 0, 924, 0, 'Md.Masum Billah'),
('Nur_Alam39', 0, 1117, 1, 'Nur-E- Alam Jony'),
('papiakarmakar785', 0, 1051, 1, 'Ankita Dutta'),
('prodipdatta7', 0, 1091, 1, 'Prodip Datta'),
('prodip_cse', 0, 0, 0, 'Prodip Datta'),
('Ramprosad', 0, 1066, 1, ' '),
('Sanjit', 0, 1357, 1, 'Sanjit Majumdar'),
('skmonir', 0, 1431, 1, 'Sheikh Monir'),
('skmonirlive', 0, 1270, 0, 'Sheikh Monir'),
('sudipto.bd', 0, 1353, 1, ' '),
('tahmidhasan.3003', 0, 0, 0, 'Md Tahmid Hasan Sarkar'),
('tanvir_cse', 0, 1239, 1, 'Tanvir Hasan'),
('weak_coder', 0, 1657, 0, 'Md. Moshiur Rahman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codeforces`
--
ALTER TABLE `codeforces`
 ADD PRIMARY KEY (`handle`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
