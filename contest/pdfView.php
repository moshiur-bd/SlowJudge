<html>
<head></head>
<body>
	<div id='body'> 
	<?php
	
		
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		$pid=$_GET['pid'];
		$conid=$_GET['conid'];
		
		include("isupcoming.php");
		
		include("sidebar.php");
		echo "<div id='content' >\n";
		include("toolbar.php");
		include("problemnametag.php");
		
		
		echo "<div id='pdf'>
				<object data='../pdf-archive/$pid.pdf' type='application/pdf' id='pdf-field'>
				alt : <a href='../pdf-archive/$pid.pdf'>PDF Statement</a>
				</object>
			</div> ";
		
		
	

echo "</div>";
					
		
	
	?>
	</div>
</body>
</html>
