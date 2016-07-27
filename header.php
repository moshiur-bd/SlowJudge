

<div id="header">
<span class='slowjudge'>SlowJudge</span>

<?php
	$root="/slowjudge";
	
	/*this block is to highlight active link*/
	$url=rtrim($_SERVER['REQUEST_URI'],"/\\");
	$conurl=$root."/contest";
	//add active class variable
	$activecon='';
	$activehome='';
	/*...........................*/
	
	if(strpos($url,$conurl)!==false)
		$activecon='active';
	else if(strpos($url,$root)!==false)
		$activehome='active';
	
	
	echo "<link href='$root/css/style.css' rel='stylesheet' type='text/css'>";
	echo "<ul class='nav'>";
		echo "<li class='nav $activehome'><span id='contestTab' > <a href='$root'>Home</a> </span></li>";
		echo "<li class='nav $activecon'><span id='homeTab'> <a href='$conurl'>Contest</a> </span></li>";
		
		
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

	?>
	
	


</div>