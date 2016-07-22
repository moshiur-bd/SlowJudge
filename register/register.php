<?php

	include(__DIR__."\\..\\connection.php");
	$uname=$_POST['uname'];
	$upass=$_POST['upass'];
	
	mysqli_select_db($conn,$uDB);
	$sql="INSERT INTO `$DB`.`user` (`uname`, `upass`) VALUES ( '$uname', '$upass'); ";
	echo $sql;
	if(mysqli_query($conn,$sql))
	{
		session_start();
		$_SESSION['uid']=mysqli_insert_id($conn);
		$_SESSION['uname']=$uname;
		echo "ok";
		header("Location: ".$root."\\profile");
	}
	//else header("Location: ".$root."\\register");
	echo "username already taken";
	
	
	
?>