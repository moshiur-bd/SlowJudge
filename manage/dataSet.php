<html>
<head></head>
<body>
	
	<?php
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		
		echo "<div id='dash' class='dash'>";
		
		echo '<h2>Upload dataset & source </h2>';
		
		$conid=$_GET['conid'];
		$cDB=$pre.$conid;
		$sql="SELECT * FROM `$cDB`.`problem`";
		$in='in';
		$out='out';
		
		$result=mysqli_query($conn,$sql);
		$ltr='A';
		echo "<form action='uploadData.php?conid=$conid' method='post' enctype='multipart/form-data'>"; //edit
		echo "<ol type='A'>";
		$j=0;
		for($i=0;$row=mysqli_fetch_array($result);$i++)
		{
			$pid=$row['pid'];
			$sql="SELECT * FROM `$DB`.`problem` WHERE `pid`='$pid'";
			$res=mysqli_query($conn,$sql);
			if($row=mysqli_fetch_array($res));
			else die("DB fetching failed");
			
			$name=$row['name'];
			$dscnt=$row['dscnt'];
			$sql="SELECT * FROM `$cDB`.`srcset` WHERE `pid`='$pid' AND `sid`='0'";
			
			
			$srcl= mysqli_query($conn,$sql);
			if($srcl=mysqli_fetch_array($srcl)){
				$srcl=$srcl['src'];
				if(file_exists($target_src.$pid."\\Main.txt"))
					$srcl="<label class='green'> ".$srcl."</label>";
				else $srcl="<label class='red'> ".$srcl."</label>";
			}
			else $srcl='Source code:';
			
			
			echo "
					
					<div class='pname'>
					<li><label class='name' id='name$i'> $name</label> 
						<div class='src' >
						<label id='srcl$i' for='src$i' class='srctxt'>$srcl</label>
						<input class='srcbtn' id='src$i' type='file' name='src$i'> 
						</div>
					</li>	
					</div> 
					<ol>
					";
					for($j=0;$j<$dscnt;$j++){
						$sql="SELECT * FROM `$cDB`.`inset` WHERE `pid`='$pid' AND `dsid`='$j'";
						$inl=mysqli_query($conn,$sql);
						if($inl=mysqli_fetch_array($inl)){
							$inl=$inl['in'];
							if(file_exists($target_in.$pid."\\$j.txt"))
								$inl="<label class='green'> ".$inl."</label>";
							else $inl="<label class='red'> ".$inl."</label>";
						}
						else $inl="Input:";
						
						$sql="SELECT * FROM `$cDB`.`outset` WHERE `pid`='$pid' AND `dsid`='$j'";
						$outl=mysqli_query($conn,$sql);
						if($outl=mysqli_fetch_array($outl)){
							$outl=$outl['out'];
							if(file_exists($target_out.$pid."\\$j.txt"))
								$outl="<label class='green'> ".$outl."</label>";
							else $outl="<label class='red'> ".$outl."</label>";
						}
						else $outl="Output:";
						
						
						echo "
						<div id='$i.dataset$j'>
							<li class='ds'> 
									<label for='$i.in$j' id='$i.inl$j' class='intxt'>$inl</label> 
									<input class='inbtn' id='$i.in$j' type='file' name='$i$in$j'>
									 <label for='$i.out$j' id='$i.outl$j' class='outtxt'>$outl</label>
									 <input class='outbtn' id='$i.out$j' type='file' name='$i$out$j'>
							</li>
						</div>
						
						
							";
					}
					
					
					echo "
					<div id='new$i'> </div>
					<div id='btn$i'>
						<input type='button' class='plusd' value='+' onclick ='addDS($i,$j);'>
						<input type='button' class='minusd' value='-' onclick ='removeDS($i,$j);'>
					</div>
					<div>
						<input type='hidden' name='dscnt$i' value='$dscnt'>		
					</div>
					<div id='len$i'>
						<input type='hidden' name='len$i' value='$dscnt'>		
					</div>
					
					</ol>
					
				 ";
		}
		echo "</ol>";
		//echo "<input name='up' type='hidden' value='$i' >";
		//echo "<div id='addP' ><input class='plus' type='button' name='plus' value='+' onclick='addP();'> <input class='minus'  type='button' name='minus' value='-' onclick='removeP();'></div> </br>";
		
		//echo "<div id='total' ><input type='hidden' name='total' value='$i' ></div> </br>";
		
		echo "<input  name='submit' type='submit' value='submit'>";
		
		echo "</ol></form></div>";
		
	
	?>
	
	
	
	<script>
		function addDS(i,j){
			
			
			var s=document.getElementById("new"+i).innerHTML;
			var addF= "<li class='ds'> <label for='"+i+".in"+j+"' id='"+i+".inl"+j+"' class='intxt'>Input:</label> <input class='inbtn' id='"+i+".in"+j+"' type='file' name='"+i+"in"+j+"' required='true' > <label for='"+i+".out"+j+"' id='"+i+".outl"+j+"' class='outtxt'>Output:</label> <input class='outbtn' id='"+i+"out"+j+"' type='file' name='"+i+"out"+j+"' required='true'>	</li>";
			
			
			//add new field
			var div=document.createElement("div");
			div.setAttribute("id",i+".dataset"+j);
			div.innerHTML=addF;
			document.getElementById('new'+i).appendChild(div);
			
			
			//increment dataset count
			j++;
						
			//update button fileds variable to increse dataset count &len
			var addBtn="<input type='button' class='plusd' value='+' onclick ='addDS("+i+","+j+");'> <input type='button' class='minusd' value='-' onclick ='removeDS("+i+","+j+");'>";
			document.getElementById('btn'+i).innerHTML=addBtn;
			document.getElementById('len'+i).innerHTML="<input type='hidden' name='len"+i+"' value='"+j+"'>";

		}
		function removeDS(i,j){
			//grab the list index and delete
			
			j--;
			
			var element = document.getElementById(i+".dataset"+j);
			element.parentNode.removeChild(element);
			
			//update button fileds variable & len 
			var addBtn="<input type='button' class='plusd' value='+' onclick ='addDS("+i+","+j+");'> <input type='button' class='minusd' value='-' onclick ='removeDS("+i+","+j+");'>";
			document.getElementById('btn'+i).innerHTML=addBtn;
			document.getElementById('len'+i).innerHTML="<input type='hidden' name='len"+i+"' value='"+j+"'>";
			
			
		}
</script>
				
</body>
</html>
