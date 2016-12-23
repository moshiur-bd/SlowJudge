<?php

	include(__DIR__."\\..\\connection.php");
	$uname=$_POST['uname'];
	$upass=$_POST['upass'];
	if( (strlen($upass))<3) die("password too short!");
	
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
	echo "username already taken!";

	
	
?>
	<script>
		sleep(2000);
		window.history.back(-1);

		function sleep(delay) {
		var start = new Date().getTime();
		while (new Date().getTime() < start + delay);
	}
	</script>
