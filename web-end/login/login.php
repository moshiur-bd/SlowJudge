<div id="body">
<?php

	include(__DIR__."\\..\\connection.php");
	$uname=$_POST['uname'];
	$upass=$_POST['upass'];
		
	$sql="SELECT * FROM `$DB`.`user` WHERE uname = '$uname' ";
	$result=mysqli_query($conn,$sql);
	if($row=mysqli_fetch_array($result))
	{
		echo "fetched!";
		session_start();
		if($row['upass']==$upass){
			echo $row['type'];
			
			if($row['type']!='user' && $row['type']!='manager')
			{
				header("Location: $root/login?msg=inactive-user");
			}
			else{
				$_SESSION['uid']=$row['uid'];
				$_SESSION['uname']=$row['uname'];
				$_SESSION['usertype']=$row['type'];
				header("Location: $root");
			}
			
			
			
		}
		else header("Location: $root/login?msg=wrong-credentials");
	}
	else header("Location: $root/login?msg=wrong-credentials");
	
	
?>
</div>
