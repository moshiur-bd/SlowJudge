<?php
	$conid=$_GET['conid'];
	/*this block is to highlight active link*/
	$activedash='';
	$activeds='';
	$activejudge='';
	$activestanding='';
	if(strpos($url,'dash.php')!==false)
		$activedash='activecon';
	else if(strpos($url,'dataset.php')!==false)
		$activeds='activecon';
	else if(strpos($url,'status.php')!==false)
		$activejudge='activecon';
	else if(strpos($url,'standing.php')!==false)
		$activestanding='activecon';
	/*...........................*/
	
	/*echo"<ul class='navCon'>
		<li class='navCon $activedash' ><a href='dash.php?conid=$conid'> Problems </a></li>
		<li class='navCon $activeds' ><a href='dataset.php?conid=$conid'> Dataset </a></li>
		<li class='navCon $activejudge' ><a href='status.php?conid=$conid'> Judgement </a></li>
		<li class='navCon $activestanding' ><a href='standing.php?conid=$conid'> Scoreboard </a></li>
		
	</ul>"*/
	//changes
	echo"<ul class='navCon'>
		<li class='navCon $activedash' ><a href='dash.php?conid=$conid'> Problems </a></li>
		<li class='navCon $activeds' ><a href='dataset.php?conid=$conid'> Dataset </a></li>
		<li class='navCon $activejudge' ><a href='status.php?conid=$conid'> Judgement </a></li>
		<li class='navCon $activeds' ><a href='htmldataset.php?conid=$conid'> DatasetHTML </a></li>
		
	</ul>"
?>
