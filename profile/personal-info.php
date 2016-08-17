<?php
	$res=mysqli_query($conn,"SELECT `name`,`uname`,`type` FROM `$DB`.`user` WHERE `uid`='$puid'");
	$row=mysqli_fetch_array($res);
	$puname=$row['uname'];
	$pname=$row['name'];
	$ptype=$row['type'];
?>
<table class='userinfo'>
<tr class='handle'>
<td><?php echo $puname;?></td>
</tr >
<tr class='uname' >
 <td><?php echo $pname;?></td>
</tr>
<tr>
<td><?php echo $ptype;?></td>
</tr>

