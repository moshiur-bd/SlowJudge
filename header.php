

<div id="header">
<span class='slowjudge'>SlowJudge</span>

<?php
	$root="\\slowjudge";
	echo "<link href='$root\\css\\style.css' rel='stylesheet' type='text/css'>";
	
	echo "<ul class='nav'>";
		echo "<li class='nav'><a href='$root'>Home</a></li>";
		echo "<li class='nav'><a href='$root\\contest'>Contest</a></li>";
		
		
		$uname='';
		$uid=0;
	
		session_start();
		if(isset($_SESSION['uid']))
		{
			$uname=$_SESSION['uname'];
			$uid=$_SESSION['uid'];
			echo "<li class='user' ><a class ='uinfo' href='$root\\profile'> $uname </a> | <a class='uinfo' href='$root\\logout'> Logout </a></li>";
		}else{
			echo "<li class ='user'><a class='uinfo' href='$root\\login'> Login </a> | <a class= 'uinfo' href='$root\\register'> Register </a></li>";
			
		}
	echo "</ul>";	

	
	echo "";
	?>
	
	

	

</div>