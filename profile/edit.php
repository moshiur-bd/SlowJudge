<?php
	$row=mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM `$DB`.`user` WHERE `uid`='$uid'"));
	$name=$row['name'];
	$upass=$row['upass'];

?>


	<div id="login"> 
		<h2>Edit profile</h2>
		<h3 style='color:red'>*Don't use your social id's password!!</h3>
		<p id="error" class="error" style="color:red;"><br/></p>
		<form name="regf" action="upload.php" method="post" onsubmit="return validateForm()" >
		
		<label>Full Name :</label>
		<input id="name" value="<?php echo $name ;?>"  name="name" placeholder="Ex: Moshiur Rahman" type="text"  pattern="[A-Za-z][A-Za-z0-9_\.]*{3,30}" title="username must start with letter and can contain numberic,underscore and dot and between 3-30 of size">

		<label>Old-password:</label>
		<input id="oldpass" name="oldpass" placeholder="***********" type="password" >
		<input id="original-pass" name="original-pass" type='hidden' value="<?php echo $upass ;?>"> 

		
		<label>New-Password :</label>
		<input id="password"  name="upass" placeholder="**********" type="password" pattern="[A-Za-z0-9_\.]{3,30}" title="paasword can contain alphanumberic,underscore and dot and between 3-30 of size">
		<label>Confirm Password :</label>
		<input id="password" name="upass2" placeholder="**********" type="password">
		<input name="submit" type="submit" value=" Submit ">
		</form>
	</div>


<script>
function validateForm() {
    var x = document.forms["regf"]["name"].value;
    var p1 = document.forms["regf"]["upass"].value;
    var p2 = document.forms["regf"]["upass2"].value;
    var pold = document.forms["regf"]["oldpass"].value;
    var porig = document.forms["regf"]["original-pass"].value;
    if (x == null || x == "") {
        document.getElementById("error").innerHTML= "Name must be filled up";
        return false;
    }
    
    if(pold!="" && pold !=null &&porig!=pold){
		document.getElementById("error").innerHTML= "old password is wrong";
		return false;
	}
	if (p1!=p2) {
        document.getElementById("error").innerHTML= "New Password did not match";
        return false;
    }
    if((p1!=null||p1!='')&&(pold==''||pold==null)){
        document.getElementById("error").innerHTML= "You must enter old password to change to a new password";
        return false;
    }
		
    
    
}
</script>
</div>
</body>

</html>
