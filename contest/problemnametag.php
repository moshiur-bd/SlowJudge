<?php

	$row=mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM `$DB`.`problem` WHERE `pid`='$pid'"));
	$name=$row['name'];
	$tl=$row['tl'];
	$ml=$row['ml'];
	$pltr='';
	if(isset($_GET['ltr'])){
		$pltr=$_GET['ltr'];
	}
	$space='';
	if($pltr!='') $space='. ';
	
	echo "<div class='problemnametag' >
			<h3>$pltr$space$name</h3> 
			<p>$tl ms, $ml MB</p>
		</div>"

?> 
