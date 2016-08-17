<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("LaunchBgProcess.php");
	include("isManager.php");
	$cDB=$pre.$_GET['conid'];
	$pid=$_GET['pid'];
	$cpid=$_GET['cpid'];
	if($res=mysqli_query($conn,"SELECT `status` FROM `$cDB`.`settings` ")){
		if("finished"!=mysqli_fetch_array($res)['status'])
			die("contest is not finished yet!");
	}
	
	
	$sql1="UPDATE `$DB`.`problem` SET 
		     `status`= IF (`status`='public','private','public') WHERE `pid`='$pid'";

	if(mysqli_query($conn,$sql1));
	else die( "something wrong");
	

	
?>
<script>
	history.go(-1);
</script>