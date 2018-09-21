<!DOCTYPE html>
<html>
<body>
<div id='body'>
<div id="subid">
<?php
include(__DIR__ ."\\..\\connection.php");
include(__DIR__ ."\\..\\header.php");


echo "<div id='msg'>";
if(!isset($_SESSION['uid']))
	die("you are not logged in!");

$conid=$_GET['conid'];
$pid=$_GET['pid'];
include("problemnametag.php");
echo "<div id='submit-onepage'>
	
	<form id='subform' action='upload.php?conid=$conid&pid=$pid' method='post' enctype='multipart/form-data'> 
	
	<table>
	<tr> <td> </td></tr>
	<tr><td> Language </td>
									<td><input type='radio' name='lang' value='1' /> C</br>
									<input type='radio' name='lang' value='2'  /> C++ </br>
									<input type='radio' name='lang' value='3' checked /> C++11 </br>
									
	</tr>
    
	<tr><td> source </td>           <td><input type='file' name='fileToUpload' id='fileToUpload' accept='.txt,.c,.cpp,.java'></br> </td></tr>
    <tr> <td>  </td> <td>  </td>    <td><input type='submit' value='Submit code' name='submit'> </td> </tr>
	
	</table>
</form>
</div>";
// <input type='radio' name='lang' value='4' /> Java</br>  </td>
?>
</div>
</body>

</html>
