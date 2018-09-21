<?php 
	$constat=mysqli_fetch_array(mysqli_query($conn,"SELECT `status` FROM `$cDB`.`settings`"))['status'];
	if($usertype!='manager'&&($constat=='upcoming'||$constat=='paused'))
		die("Upcoming or Paused!")
?>
