<?php
	$puname='';
	$sql="SELECT `uname` FROM `$DB`.`user` WHERE `uid`='$uid'";
	if($res=mysqli_query($conn,$sql))
	{
		$row=mysqli_fetch_array($res);
		$puname=$row['uname'];
		
	}
	else "USername Fetching failed!";
	
	
?>


<div id='who'>
	
	<p><?php echo $puname."'s submission";?> </p>
</div>