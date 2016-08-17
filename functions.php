<?php
//time offset
	$timeoffset=3600*4;
	function addTimeOffset($t){
		global $timeoffset;
		return $t+$timeoffset;
	}
	function removeTimeOffset($t){
		global $timeoffset;
		return $t-$timeoffset;
	}
?>

<?php
function getProfile($puid,$puname){
	return "<a class='uname' href='../profile?uid=$puid'> $puname</a>";
}
function getProfileById($puid){
	$puname='';
	global $conn,$DB;
	$puname=mysqli_fetch_array(mysqli_query($conn,"SELECT `uname`	FROM `$DB`.`user` WHERE `uid`='$puid'"))['uname'];
	
	return "<a class='uname' href='../profile?uid=$puid'> $puname</a>";
}

function printDateLocal($start){
	$t=floor(addTimeOffset($start/1000));
	return date("d-M-Y H:i",$t);
}
function getColorByConStatus($x){
	if($x=="upcoming")
		return "orange";
	if($x=="running")
		return "green";
	if($x=="paused")
		return "red";
	if($x=="finished")
		return "black";
}
function printContestDuration($dur){
	$dur=floor($dur/1000);
	$d=floor($dur/(24*3600));
	$dur-=($d*24*3600);
	$h=floor($dur/3600);
	$dur-=($h*3600);
	$m=floor($dur/60);
	$ret='';
	if($d>0)
		$ret=$d."d:";
	return $ret.$h.":".$m;
}

?>