<html>
<head></head>
<body>
<div id='body'>
	
	<?php
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		include("isManager.php");
		
		echo "<div  class='dataset'>";
		echo "<p >total bytes to upload: <span id='totalbytes' >0</span></p>";
		echo "<p >Max: <span  >200MB</span></p>";
		
		echo '<h2>Upload dataset & source </h2>';
		
		$conid=$_GET['conid'];
		$cDB=$pre.$conid;
		$sql="SELECT * FROM `$cDB`.`problem`";
		$in='in';
		$out='out';
		
		$result=mysqli_query($conn,$sql);
		$ltr='A';
		echo "<form action='uploadData.php?conid=$conid' method='post' enctype='multipart/form-data'>"; //edit
		
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
			
			//for pdf
			$sql="SELECT * FROM `$cDB`.`pdfset` WHERE `pid`='$pid'";
			$pdfl= mysqli_query($conn,$sql);
			if($pdfl=mysqli_fetch_array($pdfl)){
				$pdfl=$pdfl['pdf'];
				if(file_exists(__DIR__ ."\\..\\pdf-archive\\$pid.pdf"))
					$pdfl="<label class='green'> ".$pdfl."</label>";
				else $pdfl="<label class='red'> ".$pdfl."</label>";
			}
			else $pdfl='pdf statement:';
			
			
			$pdf='pdf';
			//source& statement
			
			echo "<table class='ds-problems'>";
			echo "
					
					<tr>
						<td class='ds-ltr'>[$ltr] </td>
						<td class='pname'> <label title='Name of the problem' class='name' id='name$i'> $name</label> </td> 
						
						<td class='pdfl'> <label title='pdf statement' id='pdfl$i' for='pdf$i' class='pdftxt'>$pdfl</label> </td>
						<td class='pdf'> <input title='pdf statement'class='pdfbtn' id='pdf$i' type='file' name='pdf$i' onChange='getFileSize(&quot;pdf$i&quot;)'> </td>
						
						<td class='srcl'> <label title='source code' id='srcl$i' for='src$i' class='srctxt'>$srcl</label> </td>
						<td class='src'> <input title='source code' class='srcbtn' id='src$i' type='file' name='src$i' onChange='getFileSize(&quot;src$i&quot;)'> </td>
						
					</tr>
					</table>
					<div class='ds-io'>
					<table id='new$i' class='ds-io'>
					";
					
					//io
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
							<tr id='$i.dataset$j' class='ds'> 
									 <td class='sl'>[$j]</td>
									 <td class='inl'> <label title='input file' for='$i.in$j' id='$i.inl$j' class='intxt'>$inl</label> </td>
									 <td class='in' > <input title='input file' class='inbtn' id='$i.in$j' type='file' name='$i$in$j' onChange='getFileSize(&quot;$i.in$j&quot;)'></td>
									 <td class='outl'> <label title='output file' for='$i.out$j' id='$i.outl$j' class='outtxt'>$outl</label> </td>
									 <td class='out'> <input title='output file' class='outbtn' id='$i.out$j' type='file' name='$i$out$j' onChange='getFileSize(&quot;$i.out$j&quot;)'> </td>
							</tr>
						
						
							";
					}
					
					//extend
					echo "
					</table>

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
					
					</div>
					
					
				 ";
				 
				 $ltr++;
		}
		//echo "</ol>";
		//echo "<input name='up' type='hidden' value='$i' >";
		//echo "<div id='addP' ><input class='plus' type='button' name='plus' value='+' onclick='addP();'> <input class='minus'  type='button' name='minus' value='-' onclick='removeP();'></div> </br>";
		
		//echo "<div id='total' ><input type='hidden' name='total' value='$i' ></div> </br>";
		
		echo "<input class='big-submit' name='' type='submit' value='Upload'>";
		
		echo "</table></form></div>";
		
	
	?>
	
	
	
	<script>
		function addDS(i,j){
			
			
			var s=document.getElementById("new"+i).innerHTML;
			var addF= " <td class='sl'>["+j+"]</td> <td class='inl'><label for='"+i+".in"+j+"' id='"+i
			+".inl"+j+"' class='intxt'>Input:</label> </td> <td class='in'> <input  id='"+i+".in"+j+"' type='file' name='"+i
			+"in"+j+"'   onChange='getFileSize(&quot;"+i+".in"+j+"&quot;)'> </td> <td class='outl'> <label for='"+i+".out"+j+"' id='"+i
			+".outl"+j+"' >Output:</label> </td> <td class='out'> <input  id='"+i+".out"+j+"' type='file' name='"+i
			+"out"+j+"' required='true'   onChange='getFileSize(&quot;"+i+".out"+j+"&quot;)'> </td> ";
			
			
			//add new field
			var div=document.createElement("tr");
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
		function getFileSize(x){
			
			//alert("fucl"+x);
			var v=document.getElementById(x).files[0].size;
			//alert(v);
			var a=parseInt(document.getElementById("totalbytes").innerHTML)+v;
			document.getElementById("totalbytes").innerHTML=a;
			if(a<209000000) 
				document.getElementById("totalbytes").setAttribute("class","green");
			else 	document.getElementById("totalbytes").setAttribute("class","red");
			
		}
</script>
</div>				
</body>
</html>
