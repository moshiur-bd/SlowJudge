<html>
<head></head>
<body>
	<div id='body'>

<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("isManager.php");
	$id=$_GET['id'];
	$sql1="UPDATE `$DB`.`submission` SET 
		     `flag`=NULL, `hold`=NULL WHERE `id`='$id'";
	
			
	if(mysqli_query($conn,$sql1));
	else echo "something wrong1";
	
	
?>
</body>

<script>
	history.go(-1);
</script>
</html>
