<html>
<head>

</head>


<body>
<div id='body'>
<?php
include(__DIR__ . '\\..\\header.php');
if(isset($_SESSION['uid']))
{
	header("Location: $root.\\profile");
}

 ?>

	
	<div id="login"> 
		<h2>Login Form</h2>
		<form action="login.php" method="post">
		<label>UserName :</label>
		<input id="name" name="uname" placeholder="username" type="text">
		<label>Password :</label>
		<input id="password" name="upass" placeholder="**********" type="password">
		<input name="submit" type="submit" value=" Login ">
		</form
	</div>

</div>
</body>



</html>