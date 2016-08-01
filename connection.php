<?php

	$pre='mos';
	$DB=$pre.'user';
	
	$root="\\slowjudge";
	
	//back data
	$slowjudge="C:\\SlowJudge\\";
	$target_in = $slowjudge."in\\";
	$target_out = $slowjudge."out\\";
	$target_src = $slowjudge."src\\";
	$target_sub = $slowjudge."sub\\";
	$target_judge=$slowjudge."Judge.bat";
	$target_timer=$slowjudge."timer.exe";
	///
	
	$conn=mysqli_connect("localhost","root","");
	if(!$conn)die("connection Failed".mysqli_connect_error());

	
	
	function getArrTime($t,$cDB,$conn){// returns in msec
		$status='running';
		$delay=0;
		$duration=0;
	
		$sql="SELECT * FROM `$cDB`.`settings` ";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result)){
			$status=$row['status'];
			$delay=$row['delay'];
			$duration=$row['duration'];
		}
		else die(" reading settings table failed!");
		
	
		
	
		if($status!='running')
			return -1;
		$sql="SELECT * FROM `$cDB`.`time` ";
		$elapsed=0;
		$stamp=0;
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result)){
			$elapsed=$row['elapsed'];
			$stamp=$row['stamp'];
		}
		else die("reading Time table failed!");
		
		$d=$t-$stamp;
		
		echo "d=$d  t= $t  stmp=$stamp   dlay=$delay     elp= $elapsed</br>";
		$ret=0;
		
		if($d<($delay+1000))
		{
			$ret= $elapsed+$d;
		}
		else return -1;
		if($ret>=($duration+1000))
			return -1;
		return $ret;
		
	}
	
	
	
	
	
?>