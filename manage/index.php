<html>
<head></head>
<body>
<div id='body'>


<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("isManager.php");
	include("signals.php");
		
	$sql="SELECT * FROM `$DB`.`contest`";
	$result=mysqli_query($conn,$sql);

	echo "<div id='conls'>";
	echo "<table>";
	while($row=mysqli_fetch_array($result))
	{
		$conid=$row['id'];
		$name=$row['name'];
		echo "<tr> <td>".htmlentities($name)."</td> <td>  </td><td><a href='dash.php?conid=$conid' > Manage</a></td> </tr>\n";
		
	}
	echo "</table>";
	echo "<div id='addCon'><input type='button' value='+' onclick='addCon();'></div>";
	echo "</div>";
	
?>
<script>
function addCon(){
	var h="<div id='conname'> <form action='addCon.php' method='post'>		<input  name='name' placeholder='Name of The contest' type='text' pattern='.{5,100}' title='minimum 5 character long!' autocomplete='off'>		<input name='submit' type='submit' value='Add'>	</form>	</div>";
	document.getElementById("addCon").innerHTML=h;
	
}

</script>
</div>

</body>
</html>

