<div id='body'>
<?php
include(__DIR__ ."\\..\\header.php");
include(__DIR__ ."\\..\\connection.php");

$sql="SELECT * FROM `$DB`.`contest`";
$result=mysqli_query($conn,$sql);

echo "<div id='conls'>";
echo "<table>";
while($row=mysqli_fetch_array($result))
{
	$conid=$row['id'];
	$name=$row['name'];
	echo "<tr> <td>".htmlentities($name)." </td> <td>  </td><td><a href='dash.php?conid=$conid' > Enter </a></td> </tr>\n";
}
echo "</table>";
echo "</div>";



?>
</div>