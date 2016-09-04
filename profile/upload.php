<?php

	include(__DIR__."\\..\\connection.php");
	include(__DIR__."\\..\\header.php");
	
	$upass=$_POST['upass'];
	$name=$_POST['name'];
	mysqli_select_db($conn,$DB);
	$sql="UPDATE `$DB`.`user` SET `name`='$name'  WHERE `uid`='$uid'";
	if(mysqli_query($conn,$sql))
	{
		
	}
	if($upass!=null ||$upass!='')
		mysqli_query($conn,"UPDATE `$DB`.`user` SET `upass`='$upass'  WHERE `uid`='$uid' ");
	
	header("Location: $root/profile");
	
?>
