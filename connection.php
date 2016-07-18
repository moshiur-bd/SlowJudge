<?php

	$pre='mos';
	$DB=$pre.'user';
	
	$root="\\slowjudge";
	
	//back data
	$slowjudge="C:\\SlowJudge\\";
	$target_in = $slowjudge."in\\";
	$target_out = $slowjudge."out\\";
	$target_src = $slowjudge."src\\";
	
	$conn=mysqli_connect("localhost","root","");
	if(!$conn)die("connection Failed".mysqli_connect_error());
?>