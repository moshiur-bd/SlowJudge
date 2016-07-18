<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	$conid=$_GET['conid'];
	$cDB=$pre.$conid;
	$up=$_POST['up'];
	$total=$_POST['total'];
	$mn=min($total,$up);
	for($i=0;$i<$mn;$i++)
	{
		$tl=$_POST['tl'.$i];
		$ml=$_POST['ml'.$i];
		$name=$_POST['name'.$i];
		$pid= 0;//get it from contest dba_close
		$sql="SELECT * FROM `$cDB`.`problem` WHERE `cpid`='$i'";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result)){
			$pid=$row['pid'];
		}
		else die("To update problems haven't been found in the list");
		
		$sql="UPDATE `$DB`.`problem` SET `name`='$name' ,`tl`='$tl', `ml`='$ml' WHERE `pid`='$pid'";
		$result=mysqli_query($conn,$sql);
		if(!$result) die("Couldn't been updated");
	}
	
	if($total>=$up) // if greater new problems added
	for(;$i<$total;$i++)
	{
		$tl=$_POST['tl'.$i];
		$ml=$_POST['ml'.$i];
		$name=$_POST['name'.$i];

		
		$sql="INSERT INTO `$DB`.`problem`  (`name`,`tl`,`ml`) VALUES( '$name', '$tl', '$ml');";
		$result=mysqli_query($conn,$sql);
		if(!$result) die("Couldn't been inserted");
		
		$pid=mysqli_insert_id($conn);
	
		$sql="INSERT INTO `$cDB`.`problem` (`pid`,`cpid`) VALUES( '$pid', '$i');";
		
		$result=mysqli_query($conn,$sql);
		if(!$result) die("Couldn't been Inseted in Contest DB");
		
	}
	else{//problems deleted
		for($i=$mn;$i<$up;$i++)
		{
			$sql="SELECT * FROM `$cDB`.`problem` WHERE `cpid`='$i'";
			$res=mysqli_query($conn,$sql);
			$pid=0;
			if($row=mysqli_fetch_array($res))
				$pid=$row['pid'];
			else die("couldn't get pid");
			
			$sql="DELETE FROM `$cDB`.`problem` WHERE `cpid`='$i'";
			$res=mysqli_query($conn,$sql);
			if(!$res)die("couldn't delete contestDB record!");
			
			$sql="DELETE FROM `$DB`.`problem` WHERE `pid`='$pid'";
			$res=mysqli_query($conn,$sql);
			if(!$res)die("couldn't delete mainDB record!");
			
		}
	
	}
	
	echo "OK!";
	header("Location: dataSet.php?conid=$conid");
	
	
	
	

?>