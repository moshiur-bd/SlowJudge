<html>
<head></head>
<body>
	
	<?php
		include(__DIR__ ."\\..\\header.php");
		
		echo "<div id='dash' class='dash'><table>";
		
		$conid=$_GET['conid'];
		$N=10;
		$ltr='A';
		
		for($i=1;$i<=$N;$i++)
		{
			echo "<tr> <td>".$ltr. "</td><td> <a href='submit.php?conid=$conid&"."pid=".$i."' >submit</a> </td>  </tr>";
			//echo "here</br>";
			$ltr++;
		}
		echo "</table></div>";
	
	?>
	
</body>
</html>
