<html>
<head></head>
<body>
<div id='body'>


<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("isManager.php");
	include("signals.php");
	include("../functions.php");
	$conid=$_GET['conid'];	
		
	$sql="DELETE FROM `$DB`.`links` WHERE `conid`='$conid'";
	echo $sql;
	$result=mysqli_query($conn,$sql);
	
	$n=$_POST['size'];
	
	
	
	for($i=0;$i<=$n;$i++)
	{
		$title=$_POST["title$i"];
		$link=$_POST["link$i"];
		if($link=='') continue;
		
		$sql="INSERT INTO `$DB`.`links` (`conid`,`title`,`link`) VALUES ('$conid','$title','$link')";
		$ret=mysqli_query($conn,$sql);
	}
	
?>


</script>
</div>

</body>
</html>

