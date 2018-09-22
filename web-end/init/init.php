<div id="body">
<?php include(__DIR__ . '\\..\\header.php'); ?>
<?php
	
	include(__DIR__."\\..\\connection.php");

	$dbSql = "
		CREATE DATABASE IF NOT EXISTS `$DB`;
	";

	$schemasql="

		CREATE TABLE `contest` (
		`id` int(11) NOT NULL,
		`name` varchar(100) NOT NULL,
		`uid` int(11) NOT NULL,
		`start` bigint(20) DEFAULT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;

		-- --------------------------------------------------------

		--
		-- Table structure for table `judge`
		--

		CREATE TABLE `judge` (
		`status` varchar(30) NOT NULL DEFAULT 'off'
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;

		--
		-- Dumping data for table `judge`
		--

		INSERT INTO `judge` (`status`) VALUES
		('off');

		-- --------------------------------------------------------

		--
		-- Table structure for table `language`
		--

		CREATE TABLE `language` (
		`id` int(11) NOT NULL,
		`value` varchar(30) NOT NULL
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
		-- Table structure for table `links`
		--

		CREATE TABLE `links` (
		`auto` int(11) NOT NULL,
		`conid` int(11) NOT NULL,
		`title` varchar(100) NOT NULL,
		`link` varchar(300) NOT NULL
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;

		-- --------------------------------------------------------

		--
		-- Table structure for table `problem`
		--

		CREATE TABLE `problem` (
		`pid` int(11) NOT NULL,
		`name` varchar(100) NOT NULL,
		`tl` int(11) NOT NULL,
		`ml` int(11) NOT NULL,
		`dscnt` int(11) NOT NULL,
		`status` varchar(30) NOT NULL DEFAULT 'private'
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;

		-- --------------------------------------------------------

		--
		-- Table structure for table `settings`
		--

		CREATE TABLE `settings` (
		`id` int(11) NOT NULL,
		`usertype` varchar(11) NOT NULL DEFAULT 'user'
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;

		--
		-- Dumping data for table `settings`
		--

		INSERT INTO `settings` (`id`, `usertype`) VALUES
		(1, 'user');

		-- --------------------------------------------------------

		--
		-- Table structure for table `submission`
		--

		CREATE TABLE `submission` (
		`id` int(11) NOT NULL,
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
		`type` varchar(30) NOT NULL DEFAULT 'unofficial'
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;

		-- --------------------------------------------------------

		--
		-- Table structure for table `user`
		--

		CREATE TABLE `user` (
		`uid` int(11) NOT NULL,
		`name` varchar(100) NOT NULL,
		`uname` varchar(40) NOT NULL,
		`upass` varchar(40) NOT NULL,
		`type` varchar(20) NOT NULL DEFAULT 'user',
		`sex` varchar(10) DEFAULT 'untold'
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;

		--
		-- Dumping data for table `user`
		--

		INSERT INTO `user` (`uid`, `name`, `uname`, `upass`, `type`, `sex`) VALUES
		(129, 'admin', 'admin', 'admin', 'manager', 'untold');

		--
		-- Indexes for dumped tables
		--

		--
		-- Indexes for table `contest`
		--
		ALTER TABLE `contest`
		ADD PRIMARY KEY (`id`);

		--
		-- Indexes for table `judge`
		--
		ALTER TABLE `judge`
		ADD PRIMARY KEY (`status`);

		--
		-- Indexes for table `language`
		--
		ALTER TABLE `language`
		ADD PRIMARY KEY (`id`);

		--
		-- Indexes for table `links`
		--
		ALTER TABLE `links`
		ADD PRIMARY KEY (`auto`);

		--
		-- Indexes for table `problem`
		--
		ALTER TABLE `problem`
		ADD PRIMARY KEY (`pid`);

		--
		-- Indexes for table `settings`
		--
		ALTER TABLE `settings`
		ADD PRIMARY KEY (`id`);

		--
		-- Indexes for table `submission`
		--
		ALTER TABLE `submission`
		ADD PRIMARY KEY (`id`);

		--
		-- Indexes for table `user`
		--
		ALTER TABLE `user`
		ADD PRIMARY KEY (`uid`),
		ADD UNIQUE KEY `uname` (`uname`);

		--
		-- AUTO_INCREMENT for dumped tables
		--

		--
		-- AUTO_INCREMENT for table `contest`
		--
		ALTER TABLE `contest`
		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
		--
		-- AUTO_INCREMENT for table `links`
		--
		ALTER TABLE `links`
		MODIFY `auto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
		--
		-- AUTO_INCREMENT for table `problem`
		--
		ALTER TABLE `problem`
		MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
		--
		-- AUTO_INCREMENT for table `settings`
		--
		ALTER TABLE `settings`
		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
		--
		-- AUTO_INCREMENT for table `submission`
		--
		ALTER TABLE `submission`
		MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
		--
		-- AUTO_INCREMENT for table `user`
		--
		ALTER TABLE `user`
		MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
		/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
		/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
		/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

	
	 ";


	if(mysqli_query($conn,$dbSql))
	{
		echo "Database created!<br>";
		if(mysqli_select_db($conn, $DB)){
			echo "creating schema....<br>";
		}
		if(mysqli_multi_query($conn,$schemasql)){
			echo "schema created!<br>";
			header("Location: $root/login?msg=user:admin-pass:admin");
		}
		else{
			echo "schema creation failed!<br>";
		}
	}
	else{
		echo "Could not create database!<br>";
	}
	
	
?>
</div>
