<?php
session_start();
if(!isset($_SESSION['uid']))
	die("you are not logged in!");






//sql////////////////
include(__DIR__ ."\\..\\connection.php");
include(__DIR__ ."\\..\\header.php");

/*
$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$conn = mysqli_connect($servername, $username, $password);
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		echo "Connected successfully</br>";*/
		
		

/////////////////////



$target_dir = $slowjudge."sub\\";
if(	!file_exists($target_dir))
	mkdir($target_dir);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = pathinfo($target_file,PATHINFO_EXTENSION);
/*// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}*/
// Check if file already exists
/*if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/
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

		$milliseconds = round(microtime(true) * 1000);//current time in milis
		$unixTimestamp = round($milliseconds / 1000);//current time in sec
		$timestamp= date("Y-m-d H:i:s", $unixTimestamp);
		$arrtime=getArrTime($milliseconds,$cDB,$conn);
		if($arrtime==-1)
			die("Contest is not running!");
		
		$arrtime/=1000;
		
		
		//insert into global DB
		$sql="INSERT INTO `$DB`.`submission` (`id`, `pid`, `lang`, `flag`, `runtime`, `arrtime`, `hold`,`uid`,`conid`,`uname`) VALUES (NULL, '$pid', '$lang', NULL, NULL, '$timestamp', NULL,'$uid','$conid','$uname');";
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
		$sql="SELECT * FROM `$cDB`.`scoreboard` WHERE `uid`='$uid'";
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
			
			$sql="INSERT INTO `$cDB`.`scoreboard` (`uid`,`uname`,`name`) VALUES('$uid','$uname','$name')";
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