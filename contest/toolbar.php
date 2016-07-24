<?php
	$conid=$_GET['conid'];
	echo"<ul class='navCon'>
		<li class='navCon' ><a href='dash.php?conid=$conid'> Dashboard </a></li>
		<li class='navCon' ><a href='my.php?conid=$conid'> My Submissions </a></li>
		<li class='navCon' ><a href='scoreboard.php?conid=$conid'> Scoreboard </a></li>
	</ul>"
?>