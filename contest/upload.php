<?php
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
	function getArrTimeUnofficial($t,$cDB,$conn,$DB,$pid){// returns in msec
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


		$pstatus=mysqli_fetch_array(mysqli_query($conn,"SELECT `status` FROM `$DB`.`problem` WHERE `pid`='$pid'"))['status'];
		echo "problemset is $pstatus  and contest is $status </br>";
		if($status!='finished'||$pstatus=='private')
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

		return $elapsed;

	}
	?>






<?php
include(__DIR__ ."\\..\\connection.php");
include(__DIR__ ."\\..\\header.php");
if(!isset($_SESSION['uid']))
	die("you are not logged in!");






$target_dir = $slowjudge."sub\\";
if(	!file_exists($target_dir))
	mkdir($target_dir);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {

    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
//Check Disk Space
if ($_FILES["fileToUpload"]["size"] > disk_total_space($target_dir)) {

    echo "Sorry, Disk is full!";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "c" && $fileType != "cpp" && $fileType != "java"
&& $fileType != "txt"&&$fileType != "C" && $fileType != "CPP" && $fileType != "JAVA"
&& $fileType != "TXT" ) {
    echo "Sorry, only c,cpp,java,txt files are allowed.";
    $uploadOk = 0;
}
else{
	$lang=$_POST['lang'];
	if($lang==1)
		$fileType='c';
	else if($lang==2||$lang==3)
		$fileType='cpp';
	else if($lang==4)
		$fileType='java';


}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {

	/////sql////
		$lang=$_POST['lang'];
		$pid=$_GET['pid'];
		$uid=$_SESSION['uid'];
		$conid=$_GET['conid'];
		$cDB=$pre.$conid;

		$serverTimeInSec= round($_SERVER['REQUEST_TIME']); //get request Time.
		echo "</br> server time= $serverTimeInSec </br>";
		$milliseconds = $serverTimeInSec*1000;
		$unixTimestamp = $serverTimeInSec;
		$timestamp= date("Y-m-d H:i:s", $unixTimestamp);

		$arrtime=getArrTime($milliseconds,$cDB,$conn);
		


		$submission_type='none';
		$ext='';
		/*update for unofficial manager submission*/
		
		if($usertype=='manager'){
			$ext='unofficial';
			$submission_type='unofficial';
		}else 
		
		/*..................*/
		
		if($arrtime!=-1) $submission_type='official';
		else if(($arrtimeun=getArrTimeUnofficial($milliseconds,$cDB,$conn,$DB,$pid))!=-1) {
			$arrtime=$arrtimeun;
			$ext='unofficial';
			$submission_type='unofficial';
		}
		else die("Contest is not running or upsolving is not allowed yet!");

		$arrtime/=1000;
		
		/*update for unofficial manager submission*/
		
		if($ext=='unofficial'){
		
			$sql2xx="CREATE TABLE IF NOT EXISTS `$cDB`.`scoreboardunofficial` LIKE `$cDB`.`scoreboard`";
			if(mysqli_query($conn,$sql2xx));
			else die( "something wrong");
		}
		
		/*..................*/


		//insert into global DB
		$sql="INSERT INTO `$DB`.`submission` (`id`, `pid`, `lang`, `flag`, `runtime`, `arrtime`, `hold`,`uid`,`conid`,`uname`,`type`) VALUES (NULL, '$pid', '$lang', NULL, NULL, '$timestamp', NULL,'$uid','$conid','$uname','$submission_type');";
		//echo '</br>'.$sql;
		if(mysqli_query($conn,$sql)==FALSE)
			die("Eror Occured while Inseting into DB!");
		$id=mysqli_insert_id($conn);
		$folder=$id;

		//insert into contest DB
		$sql="INSERT INTO `$cDB`.`submission` (`id`,`pid`,`uid`, `arrtime`) VALUES('$id','$pid','$uid','$arrtime')";
		if(mysqli_query($conn,$sql)==FALSE)
			die("Eror Occured while Inseting into cDB!");

		//auto register into contest Scoreboard
		$sql="SELECT * FROM `$cDB`.`scoreboard$ext` WHERE `uid`='$uid'";
		$res=mysqli_query($conn,$sql);
		if(!mysqli_fetch_array($res)){//not registered to scoreboard
			//register

			//uname find
			$uname="";
			$name="";
			$sql="SELECT `uname`,`name` FROM `$DB`.`user` WHERE `uid`='$uid'";
			echo "$sql</br>";
			if($result=mysqli_query($conn,$sql))
			{
				$row=mysqli_fetch_array($result);

				$uname=$row['uname'];
				$name=$row['name'];
			}else{
				echo "username fetching failed while registering to contest!";
				$uname=$name=$uid;
			}

			$sql="INSERT INTO `$cDB`.`scoreboard$ext` (`uid`,`uname`,`name`) VALUES('$uid','$uname','$name')";
			if(!mysqli_query($conn,$sql)) die("registering to the contest failed!");

		}


		//close database connection must be added to other files
		mysqli_close($conn);




	////////////
	$mk=$target_dir.$folder;
	mkdir($mk);
	$target_file=$mk."\\Main.".$fileType;
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		/////////////////////Start Compiling\\\\\\\\\\\\\\\\\\\\
		/*include("LaunchBgProcess.php");
		$cmdl=$slowjudge."compiler.exe ".$lang." ".$folder;
		LaunchBackgroundProcess($cmdl);*/

		//////////////////later
		header("Location: my.php?conid=$conid");

		////////////////////////\\\\\\\\\\\\\\\\\\\\\\\\\\\\









    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}



?>
