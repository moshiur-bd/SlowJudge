<?php

	include(__DIR__."\\..\\connection.php");
	include(__DIR__."\\..\\header.php");
	//session_start();
	if(!isset($_SESSION['uid'])){
		die ("you are not Logged in!");
	}
	
	$conname=$_POST['name'];
	
	$sql="INSERT INTO `$DB`.`contest` (`name`) VALUES ( '$conname'); ";
	if(mysqli_query($conn,$sql))
	{
		$conid=mysqli_insert_id($conn);
		$cDB=$pre.$conid;
		
		$qcnt=0;
		
		$sql="CREATE DATABASE IF NOT EXISTS `$cDB`; ";
		$qcnt+=mysqli_query($conn,$sql);
		
		
		$sql="CREATE TABLE IF NOT EXISTS `$cDB`.`submission`  ( id int NOT NULL , uid int NOT NULL, pid int NOT NULL, PRIMARY KEY (id) )";
		$qcnt+=mysqli_query($conn,$sql);
		
		$sql="CREATE TABLE IF NOT EXISTS `$cDB`.`problem` ( pid int NOT NULL ,cpid int NOT NULL)";
		$qcnt+=mysqli_query($conn,$sql);
		
		$sql="CREATE TABLE IF NOT EXISTS `$cDB`.`scoreboard` (
			  `uid` int(11) NOT NULL,
			  `uname` varchar(100) NOT NULL,
			  `name` varchar(100) NOT NULL,
			  `rank` int(11) NOT NULL,
			  `score` int(11) NOT NULL DEFAULT '0',
			  `penalty` int(11) NOT NULL DEFAULT '0',
			  PRIMARY KEY (`uid`)
			)";//change
		$qcnt+=mysqli_query($conn,$sql);
		
		$sql="CREATE TABLE IF NOT EXISTS `$cDB`.`settings` ( name varchar(30) NOT NULL , value varchar(100) NOT NULL, PRIMARY KEY (name) ) ";
		$qcnt+=mysqli_query($conn,$sql);
		
		$sql="CREATE TABLE IF NOT EXISTS `$cDB`.`inset` ( pid int NOT NULL, dsid int NOT NULL, `in` VARCHAR(100)  ) ";
		$qcnt+=mysqli_query($conn,$sql);
		
		$sql="CREATE TABLE IF NOT EXISTS `$cDB`.`outset` ( pid int NOT NULL, dsid int NOT NULL, `out` VARCHAR(100)  ) ";
		$qcnt+=mysqli_query($conn,$sql);
		
		$sql="CREATE TABLE IF NOT EXISTS `$cDB`.`srcset` ( pid int NOT NULL, sid int NOT NULL, `src` VARCHAR(100)  ) ";
		$qcnt+=mysqli_query($conn,$sql);
		
		if($qcnt==8)
			echo "Adding Contest was successfull!";
		else{
			$conid=mysqli_insert_id($conn);
			$sql="DELETE FROM `$DB`.`contest` WHERE `id`='$conid' ";
			mysqli_query($conn,$sql);
			
			die("DATABASE or Table could not be created!!!");
		}
		
		header("Location: ".$root."\\manage\\dash.php?conid=$conid");
	}
	else "Failed!!Try Again!";
	
	
	
?>