<html>
<head></head>
<body>
	
	<?php
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		
		
		
		$conid=$_GET['conid'];
		$cDB=$pre.$conid;
		
		$sql="SELECT `pid` FROM `$cDB`.`problem` ORDER BY `cpid` ASC";
		$respid=mysqli_query($conn,$sql);
		
		
		$ltr='A';
		
		
		echo "<div id='dash' class='dash'>
				<table class='dash'>";
		echo "<tr class='dash' > <td class='dash ltr'> # </td>    <td class='dash'> Name </td> <td class='dash tl'> Time Limit (ms) </td> <td class='dash ml'> Memory Limit (MB) </td>   <td class='dash sub'> Submit</td> <td class='dash cnt'> Solved by</td> </tr>";

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
			$slcnt=0; //implemet asap
			echo "<tr class='dash' > <td class='dash ltr'> $ltr </td>    <td class='dash'> <a href='pdfView.php?conid=$conid&pid=$pid'> $pname</a> </td> <td class='dash tl'> $tl</td>  <td class='dash ml'> $ml</td>  <td class='dash sub'> <a href='submit.php?conid=$conid&pid=$pid' >submit</a> </td> <td class='dash cnt'> $slcnt</td> </tr>";
			$ltr++;
		}
		echo "</table></div>";
	
	?>
	
</body>
</html>