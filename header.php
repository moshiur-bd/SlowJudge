

<div id="header">
<span class='slowjudge'>SlowJudge</span>
<div class="ad" style="float:right" >
<a href="/cprank"  >Competitive Programmer Rank</a>
</br>
<span style="float:right"> auto generated using codeforces!</span>
</div>
<?php
	//get user info
	session_start();
	$uname='';
	$uid=0;
	$usertype='';
	if(isset($_SESSION['uid'])){
		$uname=$_SESSION['uname'];
		$uid=$_SESSION['uid'];
		$usertype=$_SESSION['usertype'];
	}
	


	$root="/slowjudge";
	
	/*this block is to highlight active link*/
	$url=rtrim($_SERVER['REQUEST_URI'],"/\\");
	$conurl=$root."/contest";
	$mgrurl=$root."/manage";
	//add active class variable
	$activecon='';
	$activehome='';
	$activemgr='';
	/*...........................*/
	
	if(strpos($url,$conurl)!==false)
		$activecon='active';
	else if(strpos($url,$mgrurl)!==false)
		$activemgr='active';
	else if($url==$root) //at last home checking. else it'll activate home always
		$activehome='active';
	
	//in manager tab the whole style file is changed
	if($activemgr=='active')
		echo "<link href='$root/css/stylemgr.css' rel='stylesheet' type='text/css'>";
	else 	echo "<link href='$root/css/style.css' rel='stylesheet' type='text/css'>";
	
	
	echo "<ul class='nav'>";
		echo "<li class='nav $activehome'><span id='contestTab' > <a href='$root'>Home</a> </span></li>";
		echo "<li class='nav $activecon'><span id='homeTab'> <a href='$conurl'>Contest</a> </span></li>";
			
		if($usertype=='manager')
			echo "<li class='nav $activemgr'><span id='homeTab'> <a href='$mgrurl'>Manage</a> </span></li>";
		
		
		
	
		
		if(isset($_SESSION['uid']))
		{

			echo "<li class='user' ><a class ='uinfo' href='$root/profile'> $uname </a> | <a class='uinfo' href='$root/logout'> Logout </a></li>";
		}else{
			echo "<li class ='user'><a class='uinfo' href='$root/login'> Login </a> | <a class= 'uinfo' href='$root/register'> Register </a></li>";
			
		}
	echo "</ul>";	

	?>
	
	


</div>
