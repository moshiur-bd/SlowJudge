
<html>
<head>
</head>
<body>
<div id='body'>
	<?php 
	
		include(__DIR__ ."\\..\\connection.php");
		include(__DIR__ ."\\..\\header.php");
		
		if(!isset($_SESSION['uid']))
			die("unauhorized!");
		
	?>
	
	
	<?php
		include("edit.php");
			
	?>
	


</div>

</body>
</html>
