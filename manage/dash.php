<html>
<head></head>
<body>
<div id='body'>
	
	<?php
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		include("isManager.php");
		
		echo "<div id='dash' class='dash'>";
		
		echo '<h2>Add Problems To The Contest!</h2>';
		
		$conid=$_GET['conid'];
		$cDB=$pre.$conid;
		$sql="SELECT * FROM `$cDB`.`problem`";
		$result=mysqli_query($conn,$sql);
		$ltr='A';
		echo "<form action='uploadName.php?conid=$conid' method='post'>"; //edit
		echo "<ol type='A'>";
		for($i=0;$row=mysqli_fetch_array($result);$i++)
		{
			$pid=$row['pid'];
			$sql="SELECT * FROM `$DB`.`problem` WHERE `pid`='$pid'";
			$res=mysqli_query($conn,$sql);
			if($row=mysqli_fetch_array($res));
			else die("DB fetching failed");
			
			$name=$row['name'];
			$tl=$row['tl'];
			$ml=$row['ml'];
			$dscnt=$row['dscnt'];
			echo "<li id='li$i' ><input class='pname' name='name$i' type='text' id = 'name$i' value='$name' placeholder='Name of the Problem' > <input class='limit' name='tl$i' type='text' id = 'tl$i' value='$tl' placeholder='TL in milisecond' > <input class='limit' name='ml$i' type='text' id = 'ml$i' value='$ml' placeholder='ML in MB'> </li>";			
			$ltr++;
		}
		echo "<input name='up' type='hidden' value='$i' >";
		echo "<div id='new'></div>";
		echo "<div id='addP' ><input class='plus' type='button' name='plus' value='+' onclick='addP();'> <input class='minus'  type='button' name='minus' value='-' onclick='removeP();'></div> </br>";
		
		echo "<div id='total' ><input type='hidden' name='total' value='$i' ></div> </br>";
		
		echo "<input  name='submit' type='submit' value='submit'>";
		
		echo "</ol></form></div>";
		
	
	?>
	
	
	
	<script>
        var n = <?php echo(json_encode($i)); ?>;
		var dtl=1000,dml=512;
		var lo=n,i=0;
		function addP(){
			
			
			var s=document.getElementById("new").innerHTML;
			var add="<input class='pname' name='name"+n+"' type='text' id = 'name"+n+"' placeholder='Name of the Problem'> <input class='limit' name='tl"+n+"' type='text' id = 'tl"+n+"' value='"+dtl+"' placeholder='TL in milisecond'> <input class='limit' name='ml"+n+"' type='text' id = 'ml"+n+"' placeholder='ML in MB' value='"+dml+"'>";			
			
			//add new field
			var li=document.createElement('li');
			li.setAttribute('id','li'+n);
			li.innerHTML=add;
			document.getElementById("new").appendChild(li);
			
			//increase field size
			n++;
			//send the value of n
			var total="<input type='hidden' name='total' value='"+n+"' >";
			document.getElementById('total').innerHTML=total;
		}
		function removeP(){
			n--;
			//grab the list index and delete
			var element = document.getElementById("li"+(n));
			element.parentNode.removeChild(element);
			//send n to next page
			var total="<input type='hidden' name='total' value='"+n+"' >";
			document.getElementById('total').innerHTML=total;
			
		}
</script>

	</div>
</body>
</html>
