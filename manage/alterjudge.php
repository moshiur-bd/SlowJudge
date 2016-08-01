<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("LaunchBgProcess.php");
	$status='off';
	if($res=mysqli_query($conn,"SELECT `status` FROM `$DB`.`judge` "))
		$status=mysqli_fetch_array($res)['status'];

		if($status=='off'||$status=='halting'){
			mysqli_query($conn,"UPDATE `$DB`.`judge` SET `status`='initiating'");
			LaunchBackgroundProcess($target_judge,$slowjudge,'');
		}
		else 	mysqli_query($conn,"UPDATE `$DB`.`judge` SET `status`='halting'");
		
		
	

?>
<script>
	history.go(-1);
</script>