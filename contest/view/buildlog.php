<?php
	echo" <div class='buildlog'>";//start
	
	$build=$target_sub.$id."\\build.log";
	if(file_exists($build))
		echo "<p>".htmlentities("\n".file_get_contents($build))."</p>";
	
	echo"</div>";//end
?>