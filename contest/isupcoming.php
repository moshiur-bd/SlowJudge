<?php if(mysqli_fetch_array(mysqli_query($conn,"SELECT `status` FROM `$cDB`.`settings`"))['status']=='upcoming')
	die("this contest is upcoming!")
?>
