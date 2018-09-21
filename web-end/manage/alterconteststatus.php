<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("LaunchBgProcess.php");
	$cDB=$pre.$_GET['conid'];
	$status='upcoming';
	if($res=mysqli_query($conn,"SELECT `status` FROM `$cDB`.`settings` "))
		$status=mysqli_fetch_array($res)['status'];
	if($status=='upcoming'){
		
	}
	
	else{
		if($status=='running')
			mysqli_query($conn,"UPDATE `$cDB`.`settings` SET `status`='paused'");
		else {
			$stamp=round(microtime(true)*1000);
			
			mysqli_query($conn,"UPDATE `$cDB`.`time` SET `stamp`='$stamp'");
			mysqli_query($conn,"UPDATE `$cDB`.`settings` SET `status`='running'");
			LaunchBackgroundProcess($target_timer,$slowjudge,$cDB);
		}
	}
	//include("..\\footer.php");
	
?>
<script>
	history.go(-1);
</script>