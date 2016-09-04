<?php

	include(__DIR__."\\..\\connection.php");
	$uname=$_POST['uname'];
	$upass=$_POST['upass'];
	$name=$_POST['name'];
	if($name==''||$name==null)
		$name=$uname;
	mysqli_select_db($conn,$DB);
	$sql="INSERT INTO `$DB`.`user` (`uname`, `upass`,`name`) VALUES ( '$uname', '$upass','$name'); ";
	if(mysqli_query($conn,$sql))
	{
		session_start();
		$_SESSION['uid']=mysqli_insert_id($conn);
		$_SESSION['uname']=$uname;
		$_SESSION['usertype']='user';
		echo "ok";
		header("Location: $root");
	}
	else header("Location: $root/register");
	echo "username already taken!";
	
	
	
?>
