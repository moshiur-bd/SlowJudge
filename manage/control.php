
<?php
	$color='bgred';
	$conid=$_GET['conid'];
	$cDB=$pre.$conid;
	if($res=mysqli_query($conn,"SELECT `status` FROM `$cDB`.`settings` ")){
		$status=mysqli_fetch_array($res)['status'];
		if($status=='running')
			$color='bggreen';
		else if($status=='paused')
			$color='bgred';
		else if($status=='finished'){
			$color='bgorange';
		}
	}
	else "failed to get signals";
	
 ?>

<table id='signals' class='signals'>
	
	
	<tr>
	<td class='signal'> 
	<a  href="alterconteststatus.php?conid=<?php echo $conid;?>" ><span class="<?php echo $color; ?> box" ><?php echo $status; ?></span>~</a>
	<span class='signallabel' >Contest</span>
	
	</td>
	
	</tr>
	
	
</table>