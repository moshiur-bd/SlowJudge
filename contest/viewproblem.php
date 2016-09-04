<html>
<head></head>
<body>
	<div id='body'> 
	<?php
	
		
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		$pid=$_GET['pid'];
		$conid=$_GET['conid'];
		$pltr='';
		include("sidebar.php");
		echo "<div id='content' >\n";
		include("toolbar.php");
		
		include("problemnametag.php");
		
		echo "<a href='pdfview.php?pid=$pid&conid=$conid&ltr=$pltr' >PDF Statement</a>";
		
		
	

echo "</div>";
					
		
	
	?>
	</div>
</body>
</html>
