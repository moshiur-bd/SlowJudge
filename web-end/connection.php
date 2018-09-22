<?php

	$pre='slowjudge-contest-';
	$DB=$pre.'engine';
	
	$root="/slowjudge";
	
	//slowjudge storage paths
	$slowjudge=getenv("slowjudgeback");
	$target_in = $slowjudge."in\\";
	$target_out = $slowjudge."out\\";
	$target_src = $slowjudge."src\\";
	$target_sub = $slowjudge."sub\\";
	$target_judge="java Judge";
	$target_timer="java Timer";

	$conn=mysqli_connect("localhost","root","");
	if(!$conn)die("connection Failed".mysqli_connect_error());
	else{
		$res = '';
		if($res = mysqli_fetch_array(mysqli_query($conn,"SHOW DATABASES LIKE '$DB'"))){
		}
		else{
			if(!(strpos($url,"$root/init")!==false))
				header("Location: $root/init");
		}
	}	
?>
