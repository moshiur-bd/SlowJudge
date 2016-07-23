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
	function getStatus($cDB,$conn){
		$sql="SELECT `value` FROM `$cDB`.`settings` WHERE `name`='status' ";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result))
			return $row['value'];
		else echo" reading status failed!";
		return null;
	}
	function getDelay($cDB,$conn){
		$sql="SELECT `value` FROM `$cDB`.`settings` WHERE `name`='delay' ";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result))
			return $row['value'];
		else echo" reading delay failed!";
		return null;
	}
	function getDuration($cDB,$conn){
		$sql="SELECT `value` FROM `$cDB`.`settings` WHERE `name`='duration' ";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result))
			return $row['value'];
		else echo" reading duration failed!";
		return null;
	}
	function getArrTime($t,$cDB,$conn){// returns in msec
		if(getStatus($cDB,$conn)!='running')
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
		$delay=getDelay($cDB,$conn);
		$duration=getDuration($cDB,$conn);
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