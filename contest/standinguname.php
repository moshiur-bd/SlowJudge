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
		include("isupcoming.php");

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


		$sql="SELECT * FROM `$cDB`.`scoreboard` ORDER BY `score` DESC,`penalty` ASC, `uname` ASC";
		$result=mysqli_query($conn,$sql);


		$ltr='A';


		echo "<div id='standing' class='standing'>
				<table class='standing' cellspacing='0'>";

		//declare header
		echo "<tr class='standing head' > <th class='standing rank'> # </th>    <th class='standing name'> Name </th>    <th class='standing sum'> score </th> <th class='standing pen'> penalty </th> ";



		for($i=0;$i<$problemCount;$i++){
			echo "<th class='standing field ltr'> <a class='standing-head' href='viewproblem.php?conid=$conid&pid=$pid[$i]'>$ltr</a> </th>";
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
			$puname=$row['uname'];
			$puid=$row['uid'];
			$handle_color='default-color';
			if($ppen==$penalty&&$pscore==$score);
			else $rank=$cnt;
			$evenodd='odd';
			if($cnt%2==0)
				$evenodd='even';
			else $evenodd='odd';
				
			
			echo "<tr class='standing $evenodd' > 
				<td class='standing rank'> $rank </td>   
				<td class='standing name'> <a class='$handle_color standing-uname' href='../profile?uid=$puid&uname=$puname'>$puname</a> </td> 
				<td class='standing sum'> $score </td> <td class='standing pen'> $penalty</td> ";
				
			for($i=0;$i<$problemCount;$i++){
				$time=$row["penalty$i"];
				$wsub=$row["wrong$i"];
				$time=$time-($wsub*$penaltyset); ///read penalty here from settings
				$fac=$row["firstac$i"];
				if($fac==2147483647){
					if($wsub>0)
						echo"<td class='standing field rejected' >
							<span class='field rejected' > </span>
							<a class='score field' href='submissions.php?conid=$conid&uid=$puid&pid=$pid[$i]'>-$wsub</a>
							</td>";
					else echo"<td class='standing field nosub' ></td>";
				}
				else{
					$wsub++;
				 echo "<td class='standing field accepted' ><span class='field accepted' > </span> 
					<a class='score field' href='submissions.php?conid=$conid&uid=$puid&pid=$pid[$i]'>$wsub($time)</a> </td>";
				}

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
