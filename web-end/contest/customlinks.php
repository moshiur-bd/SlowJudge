


<?php

		
	$sql="SELECT * FROM `$DB`.`links` WHERE `conid`='$conid'";
	$result=mysqli_query($conn,$sql);
	$i=0;
	while($row=mysqli_fetch_array($result)){
		$link=$row['link'];
		$title=$row['title'];
		echo"</br><a target='_blank' href='$link'>$title</a>";
		$i++;
	}
	
?>
