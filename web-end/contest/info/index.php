<?php
	$conName='';
	$status='';
	$delay=0;
	$duration=0;
	//$pre="mos" ///for now only. delete this.
	//$cDB='mos28';
	//include(__DIR__ ."\\..\\..\\connection.php");
	$conid=$_GET['conid'];
	$cDB=$pre.$conid;
	
	$sql="SELECT * FROM `$cDB`.`settings`";
	if($res=mysqli_query($conn,$sql)){
		$row=mysqli_fetch_array($res);
		$resn=mysqli_query($conn,"SELECT `name` FROM `$DB`.contest WHERE `id`='$conid'");
		$conName=mysqli_fetch_array($resn)['name'];
		
		$status=$row['status'];
		$delay=$row['delay'];
		$duration=$row['duration'];
	}
	
	$elapsed=0;
	$stamp=0;
	$sql="SELECT * FROM `$cDB`.`time`";
	if($res=mysqli_query($conn,$sql)){
		$row=mysqli_fetch_array($res);
		$elapsed=$row['elapsed'];
		$stamp =$row['stamp'];
	}

	$now=0;
	if($status=='running'){ //if running check if it's paused by load-sheddingor not
		$now=round(1000*microtime(true));
		if(($now-$stamp)>=($delay+1000)){
			$status='paused';
			$sql="UPDATE `$cDB`.`settings` SET `status`='paused' WHERE `status`='running'";
			if(mysqli_query($conn,$sql)==FALSE)
				echo "status update failed in time calc";
			
		}
		else $now=round(($now-$stamp +$elapsed)/1000); 
		
	}
	if($status!='running'){
		$now=round($elapsed/1000);
	}
	
	
	$duration=round($duration/1000);
	$now =round($duration-$now);
	if($now<0)$now=0;
	echo "
		<table class='contestInfo' >
		<tr><td> <span class='conName' id='conName'> $conName </span> </td><tr>
		<tr><td> <span class='status' id='status'>$status</span> </td><tr>
		
		<tr><td> <span class='timeremain' id='timeremain' >$now</span> </td><tr>
		<tr><td> <span class='duration' id='duration' >$duration</span> </td><tr>
		</table>
	   ";
	   
	include(__DIR__ ."\\clockDown.php");

?>