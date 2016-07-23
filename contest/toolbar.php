<?php
	$conid=$_GET['conid'];
	echo"<ul>
		<li><a href='dash.php?conid=$conid'> Dashboard </a></li>
		<li><a href='my.php?conid=$conid'> My Submissions </a></li>
		<li><a href='scoreboard.php?conid=$conid'> Scoreboard </a></li>
	</ul>"
?>