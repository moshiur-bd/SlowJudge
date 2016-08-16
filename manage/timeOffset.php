<?php
	$offset=3600*4;
	function addTimeOffset($t,$o){
		return $t+$o;
	}
	function removeTimeOffset($t,$o){
		return $t-$o;
	}
?>