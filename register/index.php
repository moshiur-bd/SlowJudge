<html>
<head>

</head>


<body>
<?php
include(__DIR__ . '\\..\\header.php');
if(isset($_SESSION['uid']))
{
	header("Location: $root.\\profile");
}

 ?>

<div  style="float:right">
	
	<div id="login"> 
		<h2>Registration Form</h2>
		<p id="error" class="error" style="color:red;"><br/></p>
		<form name="regf" action="register.php" method="post" onsubmit="return validateForm()" >
		<label>UserName :</label>
		<input id="name" name="uname" placeholder="username" type="text"  pattern="[A-Za-z][A-Za-z0-9_\.]*{3,30}" title="username must start with letter and can contain numberic,underscore and dot and between 3-30 of size">
		<label>Password :</label>
		<input id="password" name="upass" placeholder="**********" type="password" pattern="[A-Za-z0-9_\.]{3,30}" title="paasword can contain alphanumberic,underscore and dot and between 3-30 of size">
		<label>Confirm Password :</label>
		<input id="password" name="upass2" placeholder="**********" type="password">
		<input name="submit" type="submit" value=" Submit ">
		</form>
	</div>
</div>

<script>
function validateForm() {
    var x = document.forms["regf"]["uname"].value;
    var p1 = document.forms["regf"]["upass"].value;
    var p2 = document.forms["regf"]["upass2"].value;
    if (x == null || x == "") {
        document.getElementById("error").innerHTML= "Name must be filled out";
        return false;
    }
	if (p1!=p2) {
        document.getElementById("error").innerHTML= "Password did not match";
        return false;
    }
}
</script>

</body>

</html>