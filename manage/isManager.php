<?php
	if(!isset($_SESSION['usertype']))die("No permit!");
	if($_SESSION['usertype']=='user') die("No permit!");
?>