

<div id="header">

<?php
	$root="\\slowjudge";
	echo "<link href='$root\\css\\style.css' rel='stylesheet' type='text/css'>";
	
	echo "<div id='uinfo' >"; 
	echo "<table><tr>";
		session_start();
		if(isset($_SESSION['uid']))
		{
			$uname=$_SESSION['uname'];
			echo "<td class ='uname'><a href='$root\\profile'> $uname </a></td>";
			echo "<td class ='uinfo'><a href='$root\\logout'> Logout </a></td>";
		}else{
			echo "<td class ='uinfo'><a href='$root\\login'> Login </a></td>";
			echo "<td class ='uinfo'><a href='$root\\register'> Register </a></td>";
			
		}
	echo "</tr></table>";	
	echo "</div>";	
	
	echo "<div id='menu'>";
	echo "<li><a href='$root'>Home</a></li>";
	echo "<li><a href='$root\\contest'>Contest</a></li>";
	echo "</div ></br></br></br>";
	?>
	
	

	

</div>