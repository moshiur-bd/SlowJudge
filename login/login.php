<div id="body">
<?php

	include(__DIR__."\\..\\connection.php");
	$uname=$_POST['uname'];
	$upass=$_POST['upass'];
	
	
	$sql="SELECT * FROM `$DB`.`user` WHERE uname = '$uname' ";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result))
	{
		session_start();
		if($row['upass']==$upass){
			$_SESSION['uid']=$row['uid'];
			$_SESSION['uname']=$row['uname'];
			$_SESSION['usertype']=$row['type'];
			
			//echo "ok $root /login";
			
			header("Location: $root");
			
		}
	}
	else header("Location: $root/login");
	
	
?>
</div>
