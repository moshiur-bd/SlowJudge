<html>
<head></head>
</body>
	<div id="body">
		<?php 
			include(__DIR__ ."\\..\\connection.php");
			include(__DIR__ ."\\..\\header.php");
			include(__DIR__ ."\\..\\functions.php");
			$conid=$_GET['conid'];
			$cDB=$pre.$conid;
			$duration=3600000;
			$start=$_SERVER['REQUEST_TIME']*1000;
			$conname='';
			if($res=mysqli_query($conn,"SELECT `start`,`name` FROM `$DB`.`contest`  WHERE `id`='$conid'")){
				$row=mysqli_fetch_array($res);
				if($row['start']!=null)
					$start=$row['start'];
				$conname=$row['name'];
			}
			
			if($res=mysqli_query($conn,"SELECT `duration` FROM `$cDB`.`settings`")){
				$row=mysqli_fetch_array($res);
				if($row['duration']==null)
					mysqli_query($conn,"INSERT INTO `$cDB`.`settings` (`penalty`) VALUES(20) ");
				$duration=$row['duration'];
			}

			
			$start=addTimeOffset(round($start/1000));
			$duration=round($duration/1000);
			
			$durh=floor($duration/3600);
			$durm=floor(($duration-$durh*3600)/60);;
			
			
			
			
			
		?>

		<form action="timeSubmit.php?conid=<?php echo $conid;?>" method='post' class 'timetable'>
			Contest : <input type='text' name='conname' value='<?php echo $conname;?>'> </br>
			Start Time:<input type='datetime-local' name='start' id='start' class='start' value='<?php echo date("Y-m-d\TH:i",$start); ?>' ></br>
			Duration: <input size='5' type='text' name='durationh' placeholder='hour' class='duration hour' value='<?php echo $durh;?>' >
			: <input size='5' type='text' name='durationm' placeholder='minute' class='duration minute' value='<?php echo $durm;?>' ></br>
			<input type='submit'>
		</form>
	
	</div>
</body>

<script>



</script>

</html>