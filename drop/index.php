<?php
include(__DIR__ ."\\..\\connection.php");
for($i=6;$i<43;$i++){
	if($i==28||$i==29);
	else{
		$sql="DROP DATABASE `mos$i`";
		//mysqli_query($conn,$sql);
	}
}
/*
$sql="SELECT `uid` FROM `mosuser`.submission ";
$res=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($res))
{
	$uid=$row['uid'];
	$sql="SELECT `uname` FROM `mosuser`.`user` WHERE `uid`='$uid'";
	$r=mysqli_query($conn,$sql);
	$ro=mysqli_fetch_array($r);
	$uname=$ro['uname'];
	$sql="UPDATE  `mosuser`.`submission` SET `uname`='$uname' WHERE `uid`='$uid'";
	$r=mysqli_query($conn,$sql);
}
*/

?>
