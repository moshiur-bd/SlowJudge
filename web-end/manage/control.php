
<?php
	$color='bgorange';
	$conid=$_GET['conid'];
	$cDB=$pre.$conid;
	$status='';
	if($res=mysqli_query($conn,"SELECT `status` FROM `$cDB`.`settings` ")){
		$status=mysqli_fetch_array($res)['status'];
		if($status=='running')
			$color='bggreen';
		else if($status=='paused')
			$color='bgred';
		else if($status=='finished'){
			$color='bgblack';
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
	
	<?php
		if($status=='upcoming')
			echo "<tr>
			<td class='signal'> 
			<a  href='forcestart.php?conid=$conid' ><span class='box' >Force</span>~</a>
			<span class='signallabel' >start</span>
			</td>
			</tr>"
	?>
	
	
</table>