<html>
<head>

<link href="prism/prism.css" rel="stylesheet" />
</head>

<body>

<script src="prism/prism.js"></script>
<div id='body'>




	<?php
		include(__DIR__ ."\\..\\..\\connection.php");
		include(__DIR__ ."\\..\\..\\header.php");
		include(__DIR__ ."\\..\\functions.php");
		
		$id=$_GET['id'];
		$pid=$_GET['pid'];
		$conid=$_GET['conid'];
		$suid=0;
		$status='private';
		$suname='';
		$runtime=0;
		$arrtime=0;
		$verdict='ac';
		$lang='c++11';
		$pname='';
		
		
		
		
		
		
		//get submission-problem status=public/private &name
		$sql="SELECT * FROM `$DB`.`problem` WHERE `pid`='$pid'";
		if($res=mysqli_query($conn,$sql))
		{
			$row=mysqli_fetch_array($res);
			$status=$row['status'];
			$pname=$row['name'];
		}else die("submission-problem status fetching failed!");
		
		
		
		
		
		
		
		//get submission userid and submission status=public/private
		$sql="SELECT * FROM `$DB`.`submission` WHERE `id`='$id'";
		if($res=mysqli_query($conn,$sql))
		{
			$row=mysqli_fetch_array($res);
			$suid=$row['uid'];
			$runtime=$row['runtime'];
			$arrtime=$row['arrtime'];
			$flag=$row['flag'];
			$lang=$row['lang'];
			$mb='512';//fake
			$verdict=getVerdict($flag);
			$lang=getLanguage($lang,$DB,$conn);
		}else die("submission info fetching failed!");
		
		if($usertype!='manager'&&$status=='private'&& $uid!=$suid)
			die("Khamosh!!! Onner Solution churi kora thik na! "); //illegal solution access!!
		
		
		//get username of the submission
		$sql="SELECT `uname` FROM `$DB`.`user` WHERE `uid`='$suid'";
		if($res=mysqli_query($conn,$sql))
		{
			$row=mysqli_fetch_array($res);
			$suname=$row['uname'];
		}
		else die("Doer info fetching failed!");
		
		
		
		
		
		
		
		$path=$target_sub.$id."\\Main.cpp";
		$src='cpp';
		if(file_exists($path)==FALSE)
			$path=$target_sub.$id."\\Main.c";
		if(file_exists($path)==FALSE){
			$path=$target_sub.$id."\\Main.java";
			$src='java';
		}
		if(file_exists($path)==FALSE){
			$path='';
		}
		$src='language-'.$src;
		
	?>
	
	
	
	<?php
	//sub info
		echo "<table class='viewsource'>";
		if($flag==null)
				echo "<tr class='submission my' >
						<td class='submission my id'>  $id </td>
						<td class='submission my pname'> <a class='pname' href='..\\pdfView.php?conid=$conid&pid=$pid' > $pname </a> </td>  						
						<td class='submission my time'>$arrtime</td>
						<td class='submission my lang'>lang: $lang</td>
						<td class='submission my cpu'> $runtime ms </td> 
						<td class='submission my memory'> $mb MB </td>   
						<td class='submission my verdict'>  <span class='queueText' >$verdict</span></td>	</tr>";
			else if($flag==0)
				echo "<tr class='submission my' >
						<td class='submission my id'>  $id </td>
						<td class='submission my pname'> <a class='pname' href='..\\pdfView.php?conid=$conid&pid=$pid' > $pname </a> </td>  						
						<td class='submission my time'>$arrtime</td>
						<td class='submission my lang'>lang: $lang</td>
						<td class='submission my cpu'> $runtime ms </td> 
						<td class='submission my memory'> $mb MB </td>   
						<td class='submission my verdict'> <span class='acceptedText' >$verdict</span></td>	</tr>";
				
			else echo "<tr class='submission my' >
						<td class='submission my id'>  $id </td>
						<td class='submission my pname'> <a class='pname' href='..\\pdfView.php?conid=$conid&pid=$pid' > $pname </a> </td>  						
						<td class='submission my time'>$arrtime</td>
						<td class='submission my lang'>lang: $lang</td>
						<td class='submission my cpu'> $runtime ms </td> 
						<td class='submission my memory'> $mb MB </td>     
						<td class='submission my verdict'>  <span class='rejectedText' >$verdict</span> </td>	</tr>";
	
		echo "</table>";
		
		if ($flag==-2)
			include("buildlog.php");
		
		
		
	?>
	


  <pre class='line-numbers' ><code class="<?php echo $src; ?>"><?php echo htmlentities(file_get_contents($path));?></code></pre>
  
  
  </div>
</body>
</html>