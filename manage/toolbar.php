<?php
	$conid=$_GET['conid'];
	/*this block is to highlight active link*/
	$activedash='';
	$activemy='';
	$activejudge='';
	$activestanding='';
	if(strpos($url,'dash.php')!==false)
		$activedash='activecon';
	else if(strpos($url,'my.php')!==false)
		$activemy='activecon';
	else if(strpos($url,'status.php')!==false)
		$activejudge='activecon';
	else if(strpos($url,'standing.php')!==false)
		$activestanding='activecon';
	/*...........................*/
	
	echo"<ul class='navCon'>
		<li class='navCon $activedash' ><a href='dash.php?conid=$conid'> Problems </a></li>
		<li class='navCon $activemy' ><a href='my.php?conid=$conid'> Dataset </a></li>
		<li class='navCon $activejudge' ><a href='status.php?conid=$conid'> Judgement </a></li>
		<li class='navCon $activestanding' ><a href='standing.php?conid=$conid'> Scoreboard </a></li>
		
	</ul>"
?>