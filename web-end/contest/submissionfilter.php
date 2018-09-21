<form method='get'>
	<input type='hidden' name='conid' value="<?php echo $conid; ?>">
	
	<table> 
		<tr> <td>Verdict:</td> <td> 
	<select name='flag'>
		<option value='<?php echo $fltrflag;?>'><?php echo getVerdict($fltrflag);?></option>
		<option value='notset'>All</option>
		<option value='0'>Accepted</option>
		<option value='1'>Time limit Exceeded</option>
		<option value='2'>Wrong Answer</option>
		<option value='100'>Submission Error</option>
		<option value='3'>Presentation Error</option>
		<option value='-2'>Compile Error</option>
		<option value='-1'>Runtime Error</option>
		<option value='q' >Queued</option>
		
		
	</select>
	</td></tr>
	
	<tr> <td>Problem:</td> <td> 
	
	<select name='fltrpid'>
		<option value='<?php echo $fltrcpid;?>'><?php echo cpidLabel($fltrcpid);?></option>
		<option value='notset'>All</option>
	<?php
		
		$res=(int)mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(`cpid`) FROM `$cDB`.`problem`"))["COUNT(`cpid`)"];
		for($i=0;$i<$res;$i++){
			$labl=cpidLabel($i);
			echo "<option value='$i'>$labl</option>";
		}
			
		
	 ?>

	</select>
	</td></tr>
	<tr><td> </td> <td> 
	<input type='submit' value='filter' style='color:white; background-color:#444'>
	</td></tr>
	</table>
</form>


<?php 
	function cpidLabel($x){
		if((string)$x=='notset') return 'All';
		return chr( 65+(int)$x);
	}
	
	
?>
