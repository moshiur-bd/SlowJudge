<?php
	echo" <div id='sidebar'>";//start
	
	include("info/index.php");
	
	if(isset($_GET['pid']))
		include("submitside.php");
	
	
	echo"</div>";//end
?>