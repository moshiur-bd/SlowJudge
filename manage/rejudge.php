<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("LaunchBgProcess.php");
	include("isManager.php");
	$cDB=$pre.$_GET['conid'];
	$pid=$_GET['pid'];
	$cpid=$_GET['cpid'];
	$sql1="UPDATE `$DB`.`submission` SET 
		     `flag`=NULL WHERE `pid`='$pid'";
	$sql2="UPDATE `$cDB`.`scoreboard` SET
			`score`=`score`-`score$cpid`,
			`penalty`=`penalty`-`penalty$cpid`,
			`firstac$cpid`='2147483647',
			`score$cpid`=0,
			`penalty$cpid`=0,
			`wrong$cpid`=0";
	
			
	if(mysqli_query($conn,$sql1));
	else echo "something wrong1";
	
	if(mysqli_query($conn,$sql2));
	else echo "something wrong2";
	
?>
<script>
	history.go(-1);
</script>