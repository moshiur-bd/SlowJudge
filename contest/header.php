<div id="header">
<table>
<tr>
	<td><a href="index.php">Home</a></td>
	<td><a href="contest">Contest</a></td>
	<td><a href=
	
	<?php
		session_start();
		if(isset($_SESSION['uid']))
		{
			echo "'profile.php' >";
			echo $_SESSION['uname'];
		}else{
			echo "'login' >";
			echo "Login";
			
		}
		

	?>
	</a></td>
	
	

	
</tr></table>
</div>