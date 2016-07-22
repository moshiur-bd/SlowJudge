<html>
<head></head>
<body>
	
	<?php
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		$pid=$_GET['pid'];
		$conid=$_GET['conid'];
		
		
		echo "<div id='pdf'>
				<object data='..\\pdf-archive\\$pid.pdf' type='application/pdf' id='pdf-field'>
				alt : <a href='..\\pdf-archive\\$pid.pdf'>PDF Statement</a>
				</object>
			</div> ";
		
		
	echo "<div id='submit-sub'>
	
	<form id='subform' action='upload.php?conid=$conid&pid=$pid' method='post' enctype='multipart/form-data'> 
	
	<table>
	<tr> <td> </td></tr>
	<tr><td> Language </td>
									<td><input type='radio' name='lang' value='1' /> C</br>
									<input type='radio' name='lang' value='2'  /> C++ </br>
									<input type='radio' name='lang' value='3' checked /> C++11 </br>
									<input type='radio' name='lang' value='4' /> Java</br>  </td>
	</tr>
    
	<tr><td> source </td>           <td><input type='file' name='fileToUpload' id='fileToUpload' accept='.txt,.c,.cpp,.java'></br> </td></tr>
    <tr> <td>  </td>    <td><input type='submit' value='Submit code' name='submit'> </td> </tr>
	
	</table>
</form>
</div>";
					
		
	
	?>
	
</body>
</html>
