<?php
	$conName='';
	$status='';
	$delay=0;
	$duration=0;
	//$pre="mos" ///for now only. delete this.
	//$cDB='mos28';
	//include(__DIR__ ."\\..\\..\\connection.php");
	
	$cDB=$pre.$_GET['conid'];
	
	$sql="SELECT * FROM `$cDB`.`settings`";
	if($res=mysqli_query($conn,$sql)){
		$row=mysqli_fetch_array($res);
		$conName=$row['name'];
		$status=$row['status'];
		$delay=$row['delay'];
		$duration=$row['duration'];
	}
	else echo "contest status fetching failed!!";
	
	$elapsed=0;
	$stamp=0;
	$sql="SELECT * FROM `$cDB`.`time`";
	if($res=mysqli_query($conn,$sql)){
		$row=mysqli_fetch_array($res);
		$elapsed=$row['elapsed'];
		$stamp =$row['stamp'];
	}
	else echo "contest time fetching failed!!";
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
		<table class='scrcontestInfo' >
		<tr><td> <span class='scrconName' id='conName'> $conName </span> </td><tr>
		<tr><td> <span class='scrstatus' id='status'>$status</span> </td><tr>
		
		<tr><td> <span class='scrtimeremain' id='timeremain' >$now</span> </td><tr>
		<tr><td> <span class='scrduration' id='duration' >$duration</span> </td><tr>
		</table>
	   ";
	   
	include(__DIR__ ."\\clockDown.php");

?>