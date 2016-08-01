<html>
<head></head>
<body>
<div id='body'>
	
	<?php
		include(__DIR__ ."\\..\\header.php");
		include(__DIR__ ."\\..\\connection.php");
		include("isManager.php");
		include("signals.php");
	?>
	
	
	
	<form name="control" action="getControl.php" >
	<table id="control" class="controlbtns">
		<tr>
			<th>feature</th>
			<th>control</th>
		</tr>
		<tr>
			<td> Judge</td>
			<td> 
			<input type="button" id="controlJudge" class="black"  name="controlJudge" onclick="chageJudgeStatus()" value="<?php echo "$status" ?>">
			</td>
		</tr>
		
	</table>
	<input type="submit">
	</form>
	
	
</div>

	<script>
		function chageJudgeStatus(){
			var elm=document.getElementById("controlJudge");
			if(elm.value=="off"||elm.value=="halt"){
				elm.value="initiate";
				elm.class="green";
			}
			else{ 
				elm.value="halt";
				elm.class="red";
			}
		}
		
	</script>

</body>
</html>