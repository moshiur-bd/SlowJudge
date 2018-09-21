<form action="">
<input type="hidden" name="conid" value="<?php echo $conid; ?>">

<table class="filter">
<tr>

<?php
 $selectRadio1="checked";
 $selectRadio2="";
 if($unofficial==true){
	$selectRadio1="";
	$selectRadio2="checked";
 }
	
 ?> 

<td class="filter1" align="left">
<div class="filterofficial" >
<input type="radio" name="unofficial" value="0" <?php echo $selectRadio1;?> > Official <br>
<input type="radio" name="unofficial" value="1" <?php echo $selectRadio2;?> > Un-Official <br>
</div>
</td>

<td class="filter2" align="center">
<input class="filtbtn" type="submit" value="Filter Ranklist">
</td>

<?php
 $selectRadio1="checked";
 $selectRadio2="";
 if($girlsOnly==true){
	$selectRadio1="";
	$selectRadio2="checked";
 }
	
 ?> 


<td class="filter2" align="right">
<div class= "filtergirl" >
<input type="radio" name="girlsrank" value="0" <?php echo $selectRadio1;?> > Regular&nbsp;&nbsp;&nbsp; <br>
<input type="radio" name="girlsrank" value="1" <?php echo $selectRadio2;?> > Only Girls<br>
</div>
</td>


</tr>
</table>



</form>



<style>
	table.filter{
		width:100%;
	}
	input.filtbtn{

		color:white;
		background-color:#444
	}
	td.filter1,td.filter3{
		width:30%;
	}
	td.filter2{
		width:30%;
	}
		
	
	
</style>
