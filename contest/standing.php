<html>
<head></head>
<body>
<div id='body'>

	<?php
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		include("toolbar.php");
		include("info\\scoreinfo.php");



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


		echo "<div id='standing' class='standing'>
				<table class='standing'>";

		//declare header
		echo "<tr class='standing' > <th class='standing rank'> # </th>    <th class='standing name'> Name </th>    <th class='standing sum'> solved </th> <th class='standing pen'> penalty </th> ";



		for($i=0;$i<$problemCount;$i++){
			echo "<th class='standing field ltr'> $ltr </th>";
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

			if($cnt%2==0)
				echo "<tr class='standing even' > <td class='standing rank'> $rank </td>    <td class='standing name'> $name </td>    <td class='standing sum'> $score </td> <td class='standing pen'> $penalty</td> ";
			else echo "<tr class='standing odd' > <td class='standing rank'> $rank </td>    <td class='standing name'> $name </td>    <td class='standing sum'> $score </td> <td class='standing pen'> $penalty</td> ";
			for($i=0;$i<$problemCount;$i++){
				$time=$row["penalty$i"];
				$wsub=$row["wrong$i"]+1;
				$time=$time-($wsub*$penaltyset); ///read penalty here from settings
				$fac=$row["firstac$i"];
				if($fac==2147483647)
					echo"<td class='standing field nosub' ></td>";

				else echo "<td class='standing field accepted' > <a class='score field' href='submissions.php?uid=$uid&pid=$pid[$i]'>$wsub($time)</a> </td>";


			}
			echo "</tr>";

			$ppen=$penalty;
			$pscore=$score;
			$cnt++;
		}
		echo "</table></div>";

	?>
</div>
</body>
</html>