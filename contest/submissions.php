<html>
<head></head>
<body>
	<div id='body'>

	<?php
		include("functions.php");
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");

		$conid=$_GET['conid'];
		$pid=$_GET['pid'];
		$uid=$_GET['uid'];
		
		include("sidebar.php");
		echo "<div id='content' >\n";
		include("toolbar.php");

		
		$cDB=$pre.$conid;
		
		$sql="SELECT * FROM `$cDB`.`submission` WHERE `uid`=$uid AND `pid`='$pid'  ORDER BY `arrtime` DESC";
		$ressub=mysqli_query($conn,$sql);


		include("who.php");//contestant name

		echo "<div id='submission my' class='submission my'>
				<table class='submission my' cellspacing='0'>";
		echo "<tr class='submission my heads' >
				<th class='submission my id'> # </th>  
				<th class='submission pname'> Problem </th> 
				<th class='submission my'> When </th>
				<th class='submission my lang'> Language </th>
				<th class='submission my tl'> CPU Time (ms) </th>
				<th class='submission my ml'> Memory (MB) </th> 
				<th class='submission my sub'> verdict </th>  </tr>";
		$rowbg='odd';
		while($row=mysqli_fetch_array($ressub))
		{
			
			$pid=$row['pid'];
			$id=$row['id'];
			$arrtime=$row['arrtime'];
			//fetch problem name
			$sql="SELECT * FROM `$DB`.`problem` WHERE `pid`='$pid'";
			$result=mysqli_query($conn,$sql);
			if(!$data=mysqli_fetch_array($result))
				echo"Problem info fetching failed! $pid";
			$pname=$data['name'];

			//fetch sub info
			$sql="SELECT `flag`,`runtime`,`lang` FROM `$DB`.`submission` WHERE `id`='$id'";
			$result=mysqli_query($conn,$sql);
			if(!$data=mysqli_fetch_array($result))
				echo "sub info fetching failed! $id";
			$mb=512;// not defined!!
			$runtime=$data['runtime'];
			$langid=$data['lang'];
			$flag=$data['flag'];
			$verdict=getVerdict($flag);
			$arrtime=sec2str($arrtime);
			$lang=getLanguage($langid,$DB,$conn);
			if($flag==null)
				echo "<tr class='submission my $rowbg' >
						<td class='submission my id'> <a class='submission' href='view?conid=$conid&id=$id&pid=$pid'> $id</a> </td>
						<td class='submission my pname'> <a class='pname' href='pdfView.php?pid=$pid&conid=$conid'> $pname</a>  </td>  
						
						<td class='submission my time'>$arrtime</td>
						<td class='submission my lang'>$lang</td>
						<td class='submission my cpu'> $runtime </td> 
						<td class='submission my memory'> $mb </td>   
						<td class='submission my verdict'> <a class='submission verdict' href='view?conid=$conid&id=$id&pid=$pid'> <span class='queueText' >$verdict</span></a></td>	</tr>";
			else if($flag==0)
				echo "<tr class='submission my $rowbg' >
						<td class='submission my id'> <a class='submission' href='view?conid=$conid&id=$id&pid=$pid'> $id</a> </td>
						<td class='submission my pname'> <a class='pname' href='pdfView.php?pid=$pid&conid=$conid'> $pname</a>  </td>  
						
						<td class='submission my time'>$arrtime</td>
						<td class='submission my lang'>$lang</td>
						<td class='submission my cpu'> $runtime </td> 
						<td class='submission my memory'> $mb </td>   
						<td class='submission my verdict'> <a class='submission verdict' href='view?conid=$conid&id=$id&pid=$pid'> <span class='acceptedText' >$verdict</span></a></td>	</tr>";
				
			else echo "<tr class='submission my $rowbg' >
						<td class='submission my id'> <a class='submission' href='view?conid=$conid&id=$id&pid=$pid'> $id</a> </td>
						<td class='submission my pname'> <a class='pname' href='pdfView.php?pid=$pid&conid=$conid'> $pname</a>  </td>   
						
						<td class='submission my time'>$arrtime</td>
						<td class='submission my lang'>$lang</td>
						<td class='submission my cpu'> $runtime </td> 
						<td class='submission my memory'> $mb </td>   
						<td class='submission my verdict'> <a class='submission verdict' href='view?conid=$conid&id=$id&pid=$pid'> <span class='rejectedText' >$verdict</span></a></td>	</tr>";
			if($rowbg=='odd')
				$rowbg='even';
			else $rowbg='odd';
		}
		echo "</table></div>";

		echo "</div>";

	?>
	</div>

</body>
</html>
