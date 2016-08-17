<html>
<head>
</head>
<body>
<div id='body'>
	<?php 
	
		include(__DIR__ ."\\..\\connection.php");
		include(__DIR__ ."\\..\\header.php");
		$puid=$uid;
		
		if(isset($_GET['uid'])){
			$puid=$_GET['uid'];
		}
		
	?>
	
	
	<?php
		include("personal-info.php");
		include("profile-pic.php");
		
	?>
	


</div>

</body>
</html>