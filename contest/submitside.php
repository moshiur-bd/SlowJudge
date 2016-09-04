<?php
echo "<div id='submit-sub'>
	
	<form id='subform' action='upload.php?conid=$conid&pid=$pid' method='post' enctype='multipart/form-data'> 
	
	<table>
	<tr> <td> </td></tr>
	<tr><td> Language </td>
									<td><input type='radio' name='lang' value='1' /> C</br>
									<input type='radio' name='lang' value='2'  /> C++ </br>
									<input type='radio' name='lang' value='3' checked /> C++11 </br>
									
	</tr>
    
	<tr><td> source </td>           <td><input type='file' name='fileToUpload' id='fileToUpload' accept='.txt,.c,.cpp,.java'></br> </td></tr>
    <tr> <td>  </td>    <td><input type='submit' value='Submit code' name='submit'> </td> </tr>
	
	</table>
</form>
</div>";

//<input type='radio' name='lang' value='4' /> Java</br>  </td>
	?>
