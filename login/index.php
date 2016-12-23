<html>
<head>


</head>


<body>
<div id='body'>
<?php
include(__DIR__ . '\\..\\header.php');
if(isset($_SESSION['uid']))
{
	header("Location: $root/profile");
}

 ?>

	
	<div id="login" class ="login"> 
		<h2>Login to your account</h2>
		<form action="login.php" method="post">
		<input id="name" name="uname" placeholder="Username" type="text">
		<input id="password" name="upass" placeholder="Password" type="password">
		<input name="submit" type="submit" value=" Login ">
		</form>
	</div>
	
	

</div>
</body>



</html>