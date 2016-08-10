<div id="body">
<?php
	session_start();
	$_SESSION=array();
    session_regenerate_id(); 
    session_destroy();
	include(__DIR__ ."\\..\\header.php");
	
	header("Location: $root");
	
?>
</div>