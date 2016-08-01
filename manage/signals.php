
<?php
	$judge='bgred';
	if($res=mysqli_query($conn,"SELECT `status` FROM `$DB`.`judge` ")){
		$status=mysqli_fetch_array($res)['status'];
		if($status=='on')
			$judge='bggreen';
		else if($status=='off')
			$judge='bgred';
		else if($status=='shut'){
			$judge='bgorange';
			$status='shutting';
		}
	}
	else "failed to get signals";
	
 ?>

<table id='signals' class='signals'>
	
	
	<tr>
	<td class='signal'> 
	<span class="<?php echo $judge; ?> box" ><?php echo $status; ?></span>
	<span class='signallabel' >Judge</span>
	</td>
	
	</tr>
	
	
</table>