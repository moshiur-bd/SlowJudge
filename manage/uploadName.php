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
	
	
	
	if($total>=$up){ // if greater new problems added or unchanged!!
		$sqlScr="ALTER TABLE `$cDB`.`scoreboard` ";
		$comma="";
		for(;$i<$total;$i++)
		{
			$tl=$_POST['tl'.$i];
			$ml=$_POST['ml'.$i];
			$name=$_POST['name'.$i];

			
			$sql="INSERT INTO `$DB`.`problem`  (`name`,`tl`,`ml`) VALUES( '$name', '$tl', '$ml');";
			$result=mysqli_query($conn,$sql);
			if(!$result) die("Intertion failed into Golbal DB!");
			
			$pid=mysqli_insert_id($conn);
		
			$sql="INSERT INTO `$cDB`.`problem` (`pid`,`cpid`) VALUES( '$pid', '$i');";
			
			$result=mysqli_query($conn,$sql);
			if(!$result) die("Intertion failed into Contest DB!");
			//add scoreboard coloumn
			
			
			$sqlScr=$sqlScr.$comma."ADD `penalty$i` int NOT NULL DEFAULT '0', ADD `score$i` int NOT NULL DEFAULT '0',  ADD `firstac$i` int NOT NULL DEFAULT '2147483647',  ADD `wrong$i` int NOT NULL DEFAULT '0'";
			$comma=" , ";
			
			
		}
		
		echo "$sqlScr</br>";
		$result=mysqli_query($conn,$sqlScr);
		if(!$result) die("Scoreboard Alter failed while adding new row!");
		
		
	}
	else{//problems deleted
	
		//
		$sqlScr="ALTER TABLE `$cDB`.`scoreboard` ";
		$comma="";
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
			if(!$res)die("couldn't delete Golbal DB record!");
			
			//delete scoreboard coloumn
			$sqlScr=$sqlScr.$comma."DROP COLUMN `penalty$i`, DROP COLUMN  `score$i`,  DROP COLUMN  `firstac$i`,  DROP COLUMN  `wrong$i`";;
			$comma=" , ";
			
		}
		echo "$sqlScr</br>";
		$result=mysqli_query($conn,$sqlScr);
		if(!$result) die("Scoreboard Alter failed while adding new row!");
	
	}
	
	//update problemCount
	$sql="UPDATE `$cDB`.`settings` SET `problemCount`='$total'";
	mysqli_query($conn,$sql);
	
	
	echo "OK!";
	header("Location: dataSet.php?conid=$conid");
	
	
	
	

?>