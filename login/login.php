<?php

	include(__DIR__."\\..\\connection.php");
	$uname=$_POST['uname'];
	$upass=$_POST['upass'];
	
	mysqli_select_db($conn,"mosUser");
	$sql="SELECT * FROM `user` WHERE uname = '$uname' ";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result))
	{
		session_start();
		if($row['upass']==$upass){
			$_SESSION['uid']=$row['uid'];
			$_SESSION['uname']=$row['uname'];
			
			echo "ok";
			header("Location: ".$root);
			
		}
	}
	else header("Location: ".$root."\\login");
	
	
?>