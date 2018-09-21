<?php
	include(__DIR__ ."\\..\\connection.php");
	include("LaunchBgProcess.php");

	
	$contests=mysqli_query($conn,"SELECT `id` FROM `$DB`.contest WHERE `start`<= '".floor(mktime()*1000)."'");
	
	while($row=mysqli_fetch_array($contests)){
		$cDB=$pre.$row['id'];
		$status=mysqli_fetch_array(mysqli_query($conn,"SELECT `status` FROM `$cDB`.settings"))['status'];
		if($status=='running')
			LaunchBackgroundProcess($target_timer,$slowjudge,$cDB);
	}
	$judgestatus=mysqli_fetch_array(mysqli_query($conn,"SELECT `status` FROM `$DB`.`judge`"))['status'];
	if($judgestatus=='on')
		LaunchBackgroundProcess($target_judge,$slowjudge,'');
	//include("..\\footer.php");
	
?>