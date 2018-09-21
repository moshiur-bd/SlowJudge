<html>
<head></head>
<body>
<div id='body'>


<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("isManager.php");
	include("../functions.php");

	$sql="SELECT * FROM `$DB`.`settings` ORDER BY `usertype` DESC";
	$default_usertype=mysqli_fetch_assoc(mysqli_query($conn,$sql))['usertype'];

	echo "
			<br>
			<table align='center' style='background:#bdbdbd'>
			<tr>
			<th>New user role: </h3> </th>
			<th>
			<form action='changeRole.php' method='post'>
				<select name='role'>
					<option value='$default_usertype'>$default_usertype</option>
					<option value='manager'>Manager</option>
					<option value='user'>User</option>
					<option value='inactive'>Inactive</option>
				</select>
				<input type='hidden' name='uid' value='0'>
				<input type='hidden' name='default' value='yes'>
				<br><br>
				<button type='submit'>update</button>
			</form>
			</th>
			</tr>
			</table>";
		
	$sql="SELECT * FROM `$DB`.`user` ORDER BY `uid` DESC";
	$result=mysqli_query($conn,$sql);

	echo "<div id='dash' class='dash'>";
	echo "<table class='conlist' cellspacing='0'>";
	
	echo "<tr class='conlist cls-name'> 
		<th class='conlist cls-name'>Handle</th>
		<th class='conlist cls-name'>Name</th>
		<th class='conlist cls-name'>Role</th>
		</tr>\n";
	while($row=mysqli_fetch_array($result))
	{
		$uname=$row['uname'];
		$uid=$row['uid'];
		$name=$row['name'];
		$type=$row['type'];
		
		echo "<tr class='conlist'> 
		
		<td class='conlist uname'> <a href='$root/profile/?uid=$uid'> $uname </a></td>
		<td class='conlist uname'> <a href='$root/profile/?uid=$uid''> $name </a></td>
		<td>
			<form action='changeRole.php' method='post'>
				<select name='role'>
					<option value='$type'>$type</option>
					<option value='manager'>Manager</option>
					<option value='user'>User</option>
					<option value='inactive'>Inactive</option>
				</select>
				<input type='hidden' name='uid' value='$uid'>
				<button type='submit'>update</button>
			</form>
		</td>
		</tr>\n";
		
	}
	echo "</table>";
	echo "";
	echo "</div>";
	
?>
</div>

</body>
</html>

