<html>
<head>
</head>
<body>
<div id='body'>
	<?php 
	
		include(__DIR__ ."\\..\\connection.php");
		include(__DIR__ ."\\..\\header.php");
		$puname=$uname;
		$puid=$uid;
		
		if(isset($_GET['uname'])&&isset($_GET['uid'])){
			$puname=$_GET['uname'];
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