<html>
<head></head>
<body>
	<div id='body'>
	
	<?php
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		$conid=$_GET['conid'];
		$cDB=$pre.$conid;
		include("isupcoming.php");
		
		include("sidebar.php");
		echo "<div id='content' >\n";
		
		include("toolbar.php");
		include("functions.php");
		
		
		
		
		$sql="SELECT `pid` FROM `$cDB`.`problem` ORDER BY `cpid` ASC";
		$respid=mysqli_query($conn,$sql);
		
		
		$ltr='A';
		
		
		echo "<div id='dash' class='dash'>
				<table cellspacing='0' class='dash'>";
		echo "<tr class='dash' > <th class='dash ltr'> # </th>    <th class='dash'> Name </th> <th class='dash tl'> Time Limit (ms) </th> <th class='dash ml'> Memory Limit (MB) </th>   <th class='dash sub'> Submit</th> <th class='dash cnt'>AC / Attempt</th> </tr>";

		$cpid=0;
		while($row=mysqli_fetch_array($respid))
		{
			$pid=$row['pid'];
			$sql="SELECT * FROM `$DB`.`problem` WHERE `pid`='$pid'";
			$result=mysqli_query($conn,$sql);
			if(!$data=mysqli_fetch_array($result))
				die("Problem info fetching failed!");
			$pname=$data['name'];
			$tl=$data['tl'];
			$ml=$data['ml'];
			$slcnt="".getACuCount($cpid)." / ".getAlluCount($cpid);
			$isolved=isSolvedByMe($cpid);
			
			echo "<tr title='$isolved' class='dash dash-$isolved' > <td class='dash ltr'> $ltr </td>    <td class='dash'> <a class='pname dashpname' href='viewproblem.php?conid=$conid&pid=$pid&ltr=$ltr'> $pname</a> </td> <td class='dash tl'> $tl</td>  <td class='dash ml'> $ml</td>  <td class='dash sub'> <a class='pname' href='submit.php?conid=$conid&pid=$pid' >submit</a> </td> <td class='dash cnt'> $slcnt</td> </tr>";
			$ltr++;
			$cpid++;
		}
		echo "</table>";
		if(file_exists("../pdf-archive/con$conid.pdf"))
			echo "<a class='pname' href='../pdf-archive/con$conid.pdf' > complete problemset</a>";
			
		include("customlinks.php");
		
		echo "</div></div>";
		
		
	
	?>


	</div>
	
</body>
</html>
