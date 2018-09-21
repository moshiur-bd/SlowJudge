
<?php
	$judge='bgred';
	if($res=mysqli_query($conn,"SELECT `status` FROM `$DB`.`judge` ")){
		$status=mysqli_fetch_array($res)['status'];
		if($status=='on')
			$judge='bggreen';
		else if($status=='off')
			$judge='bgred';
		else if($status=='halting'){
			$judge='bgorange';
		}
		else if($status=='initiating'){
			$judge='bggreenish';
		}
	}
	else "failed to get signals";
	
 ?>

<table id='signals' class='signals'>
	
	
	<tr>
	<td class='signal'> 
	<a  href="alterjudge.php" ><span class="<?php echo $judge; ?> box" ><?php echo $status; ?></span>~</a>
	<span class='signallabel' >Judge</span>
	
	</td>
	
	</tr>
	
	
</table>