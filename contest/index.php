<html>
<head></head>
<body>
<div id='body'>


<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");

	include("../functions.php");
		
	$sql="SELECT * FROM `$DB`.`contest` ORDER BY `start` DESC";
	$result=mysqli_query($conn,$sql);

	echo "<div id='conls'>";
	echo "<table class='conlist' cellspacing='0'>";
	
	echo "<tr class='conlist'> <th class='conlist cls-name'>Name of The Contest</th>
		<th class='conlist cls-uname'>Owner</th>
		<th class='conlist cls-start'>start</th>
		<th class='conlist cls-start '>duration</th>
		<th class='conlist cls-status '>status</th>
		<th class='conlist cls-in'>enter</th> 
		</tr>\n";
	while($row=mysqli_fetch_array($result))
	{
		$conid=$row['id'];
		$cDB=$pre.$conid;
		$name=$row['name'];
		$start=$row['start'];
		$owner=$row['uid'];
		$resx=mysqli_fetch_array(mysqli_query($conn,"SELECT `status`,`duration`	FROM `$cDB`.`settings`"));
		$constatus=$resx['status'];
		$duration=$resx['duration'];
		$colstatus=getColorByConStatus($constatus);
		
		echo "<tr class='conlist'> <td class='conlist cls-name'>".htmlentities($name)."</td>
		<td class='conlist cls-uname'>".getProfileById($owner)."</td>
		<td class='conlist cls-start'>".printDateLocal($start)."</td>
		<td class='conlist cls-start'>".printContestDuration($duration)."</td>
		<td class='conlist cls-status $colstatus'>  $constatus </td>
		<td class='conlist cls-in'><a href='dash.php?conid=$conid' >enter</a></td> 
		</tr>\n";
		
	}
	echo "</table>";
	echo "</div>";
	
?>