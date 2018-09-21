<html>
<head></head>
<body>
	<div id='body'>


<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__."\\..\\connection.php");
?>
<br><br><br><br><br><br><br><br>

<h3 align="center">

<?php
	$uname=$_POST['uname'];
	$upass=$_POST['upass'];
	if( (strlen($upass))<3) die("password too short!");
	
	$name=$_POST['name'];
	if($name==''||$name==null)
		$name=$uname;
	mysqli_select_db($conn,$DB);

	$sql="SELECT `usertype` FROM `$DB`.`settings` WHERE id = 1";
	$default_type=mysqli_fetch_assoc(mysqli_query($conn,$sql))['usertype'];

	$sql="INSERT INTO `$DB`.`user` (`uname`, `upass`,`name`,`type`) VALUES ( '$uname', '$upass','$name','$default_type'); ";

	if(mysqli_query($conn,$sql))
	{
		if($default_type == 'user' || $default_type == 'manager')
		{
			session_start();
			$_SESSION['uid']=mysqli_insert_id($conn);
			$_SESSION['uname']=$uname;
			$_SESSION['usertype']=$default_type;
			header("Location: $root");

		}
		else{
			echo "Id created. Ask site manager to activate your account!";
		}
		
	}
	else echo "Username already taken!";

	
	
?>
</h3>

	<!-- <script>
		sleep(2000);
		window.history.back(-1);

		function sleep(delay) {
		var start = new Date().getTime();
		while (new Date().getTime() < start + delay);
	}
	</script> -->




</div>

</body>
</html>
