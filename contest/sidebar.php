<?php
	echo" <div id='sidebar'>";//start
	
	include("info/index.php");
	
	if(isset($_GET['pid']))
		include("submitside.php");
		
	if(isset($instatus)&&$instatus==true)
		include("submissionfilter.php");
	
	
	echo"</div>";//end
?>
