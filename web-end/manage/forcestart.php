<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("isManager.php");
	include("LaunchBgProcess.php");
	$conid=$_GET['conid'];
	$cDB=$pre.$conid;
	$status='upcoming';

	$stamp=round(microtime(true)*1000);
			
	mysqli_query($conn,"UPDATE `$DB`.`contest` SET `start`='$stamp' WHERE `id`='$conid' ");
	mysqli_query($conn,"UPDATE `$cDB`.`settings` SET `status`='running'");
	LaunchBackgroundProcess($target_timer,$slowjudge," $DB $cDB ");

	//include("..\\footer.php");
	
?>
<script>
	history.go(-1);
</script>