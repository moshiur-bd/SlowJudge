<?php
///some bug found in this file . need to fix later

	include(__DIR__ ."\\..\\connection.php");
	include(__DIR__ ."\\..\\header.php");
	include("isManager.php");
	$maxFileSize=5*1024*1024;
	$maxSrcSize=1*1024*1024;
	$maxPdfSize=20*1024*1024;

	if(disk_free_space($slowjudge)<=$maxFileSize) die("Disk is full!"); //incase the disk is full
	
	
	$in='in';
	$out='out';
	$src='src';
	$cDB=$pre.$_GET['conid'];
	
	$sql="SELECT * FROM `$cDB`.`problem`";
	$result=mysqli_query($conn,$sql);
	$i=0;
	echo count($_POST)."</br>";
	echo count($_FILES)."</br>";

	
	
	while($row=mysqli_fetch_array($result)){
		$pid=$row['pid'];
		$j=$_POST["len$i"];
		$dscnt=$_POST["dscnt$i"];
		
		$mn=min($dscnt,$j);
		
		///src up
		{
			///src upload
			if ($_FILES["src$i"]['error']==UPLOAD_ERR_NO_FILE) {
			}
			else if($_FILES["src$i"]["size"]>$maxSrcSize)
			{
				echo "$i  Src File too large!";
			}
			else{
				if(!file_exists($target_src.$pid))
					mkdir($target_src.$pid);
				if (move_uploaded_file($_FILES["src$i"]["tmp_name"], $target_src.$pid."\\"."Main.txt")) {//////////////////Things to do here later onSS
					$flabel=basename( $_FILES["src$i"]["name"]);
					echo "</br>The SRC file ".$flabel. " has been uploaded. $i";
					$sql="DELETE FROM `$cDB`.`srcset` WHERE `pid`='$pid' AND `sid`='0' ";
					if(!mysqli_query($conn,$sql))
						echo "</br>Src label del failed!</br>";
					$sql=" INSERT INTO `$cDB`.`srcset` (`pid`,`sid`,`src`) VALUES ('$pid','0','$flabel')";
					if(!mysqli_query($conn,$sql))
						echo "</br>Src label insertion failed!</br>";
					
				} else {
					echo "</br>Sorry, there was an error uploading your Src file $i . ";
				}
				
			}
			
		}
		
		
		$target_pdf="..\\pdf-archive\\";
		///pdf up
		{
			///pdf upload
			if ($_FILES["pdf$i"]['error']==UPLOAD_ERR_NO_FILE) {
			}
			else if($_FILES["pdf$i"]["size"]>$maxSrcSize)
			{
				echo "$i  Pdf File too large!";
			}
			else{
				if (move_uploaded_file($_FILES["pdf$i"]["tmp_name"], $target_pdf.$pid.".pdf")) {
					$flabel=basename( $_FILES["pdf$i"]["name"]);
					echo "</br>The PDF file ".$flabel. " has been uploaded. $i";
					$sql="DELETE FROM `$cDB`.`pdfset` WHERE `pid`='$pid' ";
					if(!mysqli_query($conn,$sql))
						echo "</br>PDF label del failed!</br>";
					$sql=" INSERT INTO `$cDB`.`pdfset` (`pid`,`pdf`) VALUES ('$pid','$flabel')";
					if(!mysqli_query($conn,$sql))
						echo "</br>PDF label insertion failed!</br>";
					
				} else {
					echo "</br>Sorry, there was an error uploading your PDF file $i . ";
				}
				
			}
			
		}
		
		
		
		
		
		
		
		
		for($k=0;$k<$j;$k++){
			
			///in upload
			if ($_FILES["$i$in$k"]['error']==UPLOAD_ERR_NO_FILE) {
			}
			else if($_FILES["$i$in$k"]["size"]>$maxFileSize)
			{
				echo "$i -> $k File too large!";
			}
			else{
				if(!file_exists($target_in.$pid))
					mkdir($target_in.$pid);
				if (move_uploaded_file($_FILES["$i$in$k"]["tmp_name"], $target_in.$pid."\\".$k.".txt")) {
					$flabel=basename( $_FILES["$i$in$k"]["name"]);
					echo "</br>The In file ".$flabel. " has been uploaded. $i- $k";
					$sql="DELETE FROM `$cDB`.`inset` WHERE `pid`='$pid' AND `dsid`='$k' ";
					if(!mysqli_query($conn,$sql))
						echo "</br>In label del failed!</br>";
					$sql=" INSERT INTO `$cDB`.`inset` (`pid`,`dsid`,`in`) VALUES ('$pid','$k','$flabel')";
					if(!mysqli_query($conn,$sql))
						echo "</br>In label insertion failed!</br>";
					
				} else {
					echo "</br>Sorry, there was an error uploading your Input file $i $k . ";
				}
				
			}
			///out upload
			if ($_FILES["$i$out$k"]['error']==UPLOAD_ERR_NO_FILE) {
			}
			else if($_FILES["$i$out$k"]["size"]>$maxFileSize)
			{
				echo "$i -> $k File too large!";
			}
			else{
				if(!file_exists($target_out.$pid))
					mkdir($target_out.$pid);
				if (move_uploaded_file($_FILES["$i$out$k"]["tmp_name"], $target_out.$pid."\\".$k.".txt")) {
					$flabel=basename( $_FILES["$i$out$k"]["name"]);
					echo "</br>The  Out file ".$flabel. " has been uploaded. $i - $k ";
					$sql="DELETE FROM `$cDB`.`outset` WHERE `pid`='$pid' AND `dsid`='$k' ";
					if(!mysqli_query($conn,$sql))
						echo "</br>Out label del failed!</br>";
					$sql=" INSERT INTO `$cDB`.`outset` (`pid`,`dsid`,`out`) VALUES ('$pid','$k','$flabel')";
					if(!mysqli_query($conn,$sql))
						echo "</br>Out label insertion failed!</br>";
					
				} else {
					echo "</br>Sorry, there was an error uploading your Output file $i - $k .";
				}
				
			}
			
			
			
		}
		//if any ds deleted remove residual data
		for($k=$dscnt-1;$k>=$j;$k--)
		{
			unlink($target_out.$pid."\\".$k.".txt");
			unlink($target_in.$pid."\\".$k.".txt");
		}
		
		
		$sql="UPDATE `$DB`.`problem` SET `dscnt`='$j' WHERE `pid`='$pid'";
		if(mysqli_query($conn,$sql))
		{
			
		}
		else echo "</br> Error  in problem DB Updated for $i ";
		
		
		$i++;
	}
	

?>