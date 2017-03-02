<form method='get'>
	<input type='hidden' name='conid' value="<?php echo $conid; ?>">
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
	
	<input type='submit' value='filter' style='color:white; background-color:#444'>
</form>
