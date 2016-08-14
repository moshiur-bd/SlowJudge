<html>
<head></head>
</body>
	<div id="body">
		<?php 
			include(__DIR__ ."\\..\\connection.php");
			include(__DIR__ ."\\..\\header.php");
			$conid=$_GET['conid'];
		?>
		
		<form action="timeSubmit.php?conid=<?php echo $conid;?>" method='post' class 'timetable'>
			<input type='datetime-local' name='start' id='start' class='start' >
			<input type='text' name='durationh' placeholder='hour' class='duration hour' >
			<input type='text' name='durationm' placeholder='minute' class='duration minute' >
			<input type='submit'>
		</form>
	
	</div>
</body>

<script>
	var elm=document.getElementById("start");


</script>

</html>