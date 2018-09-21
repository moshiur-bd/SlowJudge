<?php

	include(__DIR__ ."\\..\\functions.php");
	$start=$_POST['start'];;
	$start=removeTimeOffset(strtotime($start))*1000;
	$dur=($_POST['durationh']*60)+($_POST['durationm']);
	$dur=$dur*60*1000;
	$conname=$_POST['conname'];
	include(__DIR__ ."\\..\\connection.php");
	$conid=$_GET['conid'];
	$cDB=$pre.$conid;
	mysqli_query($conn,"UPDATE `$DB`.`contest` SET `start`='$start',`name`='$conname' WHERE `id`='$conid'");
	mysqli_query($conn,"UPDATE `$cDB`.`settings` SET `duration`='$dur' ");
	
	header("Location: $root/manage")
	

?>