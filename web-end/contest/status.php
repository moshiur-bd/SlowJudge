<html>
<head></head>
<body>
	<div id='body'>

	<?php
		include("functions.php");
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		
		$conid=$_GET['conid'];
		$cDB=$pre.$conid;
		
		///filter//
		$fltrflag='notset';//filter variable
		$fltrpid='notset';//filter variable
		$fltrcpid='notset';//filter variable
		if(isset($_GET["flag"]))
			$fltrflag=$_GET["flag"];
		if(isset($_GET["fltrpid"]))
			$fltrcpid=$_GET["fltrpid"];
		/////	
		$fltrpid=getPid($fltrcpid);
		$instatus=true;
			
		include("sidebar.php");
		echo "<div id='content' >\n";
		include("toolbar.php");
		
		

		
		
		include("isupcoming.php");
		
		$sql="SELECT * FROM `$cDB`.`submission` ORDER BY `id` DESC";
		$ressub=mysqli_query($conn,$sql);




		echo "<div id='submission my' class='submission my'>
				<table class='submission my' cellspacing='0'>";
		echo "<tr class='submission my heads' >
				<th class='submission my id'> # </th>  
				<th class='submission pname'> Problem  </th> 
				<th class='submission uname'> Who  </th> 
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
				echo "Problem info fetching failed! $pid";
			$pname=$data['name'];

			//fetch sub info
			$sql="SELECT `flag`,`runtime`,`lang`,`uname`,`uid`,`hold` FROM `$DB`.`submission` WHERE `id`='$id'";
			$result=mysqli_query($conn,$sql);
			if(!$data=mysqli_fetch_array($result)){
				echo "$id $pid  fetching faied!!";
				//die("sub info fetching failed!");
			}
			$mb=512;// not defined!!
			$puname=$data['uname'];
			$puid=$data['uid'];
			$runtime=$data['runtime'];
			$langid=$data['lang'];
			$flag=$data['flag'];
			//// filter////
			if($fltrflag=='q'){
				if($flag!=null) continue;
			}
			else if( ($fltrflag!='notset' &&((string)$fltrflag!=(string)$flag))) continue;
			
			if($fltrpid!='notset' && $fltrpid!=$pid) continue;
			
			/////
			
			$hold=$data['hold'];
			
			
			$verdict=getVerdict($flag);
			if($hold!=null&&$flag==null)
				$verdict='running...';
				
			$arrtime=sec2str($arrtime);
			$lang=getLanguage($langid,$DB,$conn);
			
			if($flag==null)
				echo "<tr class='submission my $rowbg' >
						<td class='submission my id'> <a class='submission' href='view?conid=$conid&id=$id&pid=$pid'> $id</a> </td>
						<td class='submission my pname'> <a class='pname' href='viewproblem.php?pid=$pid&conid=$conid'> $pname</a>  </td>  
						<td class='submission my uname'> <a class='uname' href='../profile?uid=$puid'> $puname</a> </td>  
						
						<td class='submission my time'>$arrtime</td>
						<td class='submission my lang'>$lang</td>
						<td class='submission my cpu'> $runtime </td> 
						<td class='submission my memory'> $mb </td>   
						<td class='submission my verdict'> <a class='submission verdict' href='view?conid=$conid&id=$id&pid=$pid'> <span class='queueText' >$verdict</span></a></td> ";
			else if($flag==0)
				echo "<tr class='submission my $rowbg' >
						<td class='submission my id'> <a class='submission' href='view?conid=$conid&id=$id&pid=$pid'> $id</a> </td>
						<td class='submission my pname'> <a class='pname' href='viewproblem.php?pid=$pid&conid=$conid'> $pname</a>  </td>  
						<td class='submission my uname'> <a class='uname' href='../profile?uid=$puid'> $puname</a> </td>  
						
						<td class='submission my time'>$arrtime</td>
						<td class='submission my lang'>$lang</td>
						<td class='submission my cpu'> $runtime </td> 
						<td class='submission my memory'> $mb </td>   
						<td class='submission my verdict'> <a class='submission verdict' href='view?conid=$conid&id=$id&pid=$pid'> <span class='acceptedText' >$verdict</span></a></td>	";
				
			else echo "<tr class='submission my $rowbg' >
						<td class='submission my id'> <a class='submission' href='view?conid=$conid&id=$id&pid=$pid'> $id</a> </td>
						<td class='submission my pname'> <a class='pname' href='viewproblem.php?pid=$pid&conid=$conid'> $pname</a>  </td>  
						<td class='submission my uname'> <a class='uname' href='../profile?uid=$puid'> $puname</a> </td>  
						
						<td class='submission my time'>$arrtime</td>
						<td class='submission my lang'>$lang</td>
						<td class='submission my cpu'> $runtime </td> 
						<td class='submission my memory'> $mb </td>   
						<td class='submission my verdict'> <a class='submission verdict' href='view?conid=$conid&id=$id&pid=$pid'> <span class='rejectedText' >$verdict</span></a></td>	";

			if($rowbg=='odd')
				$rowbg='even';
			else $rowbg='odd';
			
			if(isset($_SESSION['usertype'])&&$_SESSION['usertype']!='user')
			echo"<td> 
			
			<form methos='get' action='rejudge.php'>
			<input type='hidden' name='id' value='$id'>
			<input type='submit' value='rejudge?' style='color:white; background-color:#444'>
			</form>
			</td>
			";
			
			
			echo "</tr>";
			
			
		}
		echo "</table></div>";

		echo "</div>";

	?>
	<?php include(__DIR__ ."\\..\\footer.php"); ?>
	
	</div>
	
	
	

</body>
</html>

<?php
function getPid($cpid){
		if((string)$cpid=='notset') return $cpid;
		global $cDB,$conn;
		$pid=mysqli_fetch_array(mysqli_query($conn,"SELECT `pid` FROM `$cDB`.`problem` WHERE `cpid`='$cpid'"))['pid'];
		return $pid;
	}
 
?>

