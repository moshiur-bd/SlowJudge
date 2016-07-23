<html>
<head></head>
<body>
	
	<?php
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		include("toolbar.php");
		
		
		
		$conid=$_GET['conid'];
		$cDB=$pre.$conid;
		
		$problemCount=0;
		
		
		$penaltyset=0;
		$sql="SELECT * FROM `$cDB`.settings";
		$result=mysqli_query($conn,$sql);
		if($row=mysqli_fetch_array($result)){
			$problemCount=$row['problemCount'];
			$penaltyset=$row['penalty'];
		}
		
		$pp=$problemCount;
		if($pp==0)$pp++;
		$fwidth=round(65/$pp);
		//get pids
		$pid;
		$sql="SELECT * FROM `$cDB`.`problem`";
		$res=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($res)){
			$pid[$row['cpid']]=$row['pid'];
		}
		
		
		$sql="SELECT * FROM `$cDB`.`scoreboard` ORDER BY `score` DESC,`penalty` ASC, `name` ASC";
		$result=mysqli_query($conn,$sql);
		
		
		$ltr='A';
		
		
		echo "<div id='dash' class='dash'>
				<table class='dash'>";
			
		//declare header
		echo "<tr class='dash' > <th class='dash rank'> # </th>    <th class='dash name'> Name </th>    <th class='dash sum'> solved </th> <th class='dash pen'> penalty </th> ";
		
		
		
		for($i=0;$i<$problemCount;$i++){
			echo "<th class='dash ltr'> $ltr </th>";
			$ltr++;
			
		}
		echo "</tr>";
		
		$ppen=-1;
		$pscore=-1;
		$rank=1;
		$cnt=1;
		
		while($row=mysqli_fetch_array($result))
		{
			$penalty=$row['penalty'];
			$score=$row['score'];
			$name=$row['name'];
			$uid=$row['uid'];
			if($ppen==$penalty&&$pscore==$score);
			else $rank=$cnt;
				
			
			echo "<tr class='dash' > <td class='dash rank'> $rank </td>    <td class='dash name'> $name </td>    <td class='dash sum'> $score </td> <td class='dash pen'> $penalty</td> ";
			for($i=0;$i<$problemCount;$i++){
				$time=$row["penalty$i"];
				$wsub=$row["wrong$i"];
				$time=$time-($wsub*$penaltyset); ///read penalty here from settings
				$fac=$row["firstac$i"];
				if($fac==2147483647)
					echo"<td class='dash field' style='width:$fwidth%'></td>";
				
				else echo "<td class='dash field' style='width:$fwidth%'> <a class='score field' href='submissions.php?uid=$uid&pid=$pid[$i]'>$wsub($time)</a> </td>";
			
				
			}
			echo "</tr>";
			
			$ppen=$penalty;
			$pscore=$score;
			$cnt++;
		}
		echo "</table></div>";
	
	?>
	
</body>
</html>
