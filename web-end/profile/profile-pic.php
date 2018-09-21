<div class='profile-photo'>
	<?php
		
		$photourl="data/$puname/photo.jpg";
		if(!file_exists($photourl))
			$photourl='default.png';
		
	?>
	<div class='photo' >
	<img class='profile' src='<?php echo $photourl;?>' > </img>
	</div>
	<?php
		if($uid==$puid){
			echo "<div class='photo-upload' > ";
			echo"
				<form action='uploadPhoto.php?uname=$uname' method='post' enctype='multipart/form-data' >
					<input title='upload jpg image only' type='file' accept='.jpg' name='fileToUpload' required>
					</br><input type='submit' value='upload'>
					
				</form>
			";
			echo "</div>";
			
		}
	?>
</div>

<script>

</script>
