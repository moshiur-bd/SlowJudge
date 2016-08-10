<html>
<head></head>
</body>
	<div id="body">
		<?php 
			include(__DIR__ ."\\..\\connection.php");
			include(__DIR__ ."\\..\\header.php");
			$conid=$_GET['conid'];
		?>
		
		<form action="timeSubmit.php?conid=<?php echo $conid;?>" method='post'>
			<input type='datetime-local' name='start' id='start' value='12:00' >Start</input>
			<input type='time' name='duration' id='duration' value='01:00'>
			<input type='submit'>
		</form>
	
	</div>
</body>

<script>
	var elm=document.getElementById("start");


</script>

</html>