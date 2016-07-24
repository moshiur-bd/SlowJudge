<?php
	echo" <div id='sidebar'>";//start
	
	
	if(isset($_GET['pid']))
		include("submitside.php");
	
	echo"</div>";//end
?>