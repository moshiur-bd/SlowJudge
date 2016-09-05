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
		
	$sql="SELECT * FROM `$DB`.`links` WHERE `conid`='$conid'";
	$result=mysqli_query($conn,$sql);
	echo "<form action='uploadlink.php?conid=$conid' method='post'>";
	$i=0;
	while($row=mysqli_fetch_array($result)){
		$link=$row['link'];
		$title=$row['title'];
		echo "<input type='text' name='title$i' value='$title' title='title' placeholder='display name'> <input type='text' name='link$i' value='$link' title='link' placeholder='paste the link here'></br>";
		$i++;
	}
	echo "<input type='text' name='title$i' value='new' title='title' placeholder='display name'> <input type='text' name='link$i' value='' title='link' placeholder='paste the link here'></br>";
	echo" <input type='hidden' name='size' value='$i'>";
	echo" <input type='submit' value='upload'>";
	echo "</form>";
	
?>


</script>
</div>

</body>
</html>

