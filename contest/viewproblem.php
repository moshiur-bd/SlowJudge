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
		
		if(file_exists(__DIR__ ."\\..\\pdf-archive\\$pid.pdf"))
			echo "<a href='pdfview.php?pid=$pid&conid=$conid&ltr=$pltr' >PDF Statement</a>";
		
		echo "<div class='htmldescription'>";
		$htmlpath=__DIR__ ."\\..\\html-description\\$pid.html";
		if(file_exists($htmlpath))
			include($htmlpath);
		echo "</div>";
		
		
	

echo "</div>";
					
		
	
	?>
	</div>
</body>
</html>
