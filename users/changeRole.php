<html>
<head></head>
<body>
<div id='body'>

<?php
	include(__DIR__ ."\\..\\header.php");
	include(__DIR__ ."\\..\\connection.php");
	include("isManager.php");
	include("../functions.php");
    $uid = $_POST['uid'];
    $type = $_POST['role'];
    if($uid==0 && isset($_POST['default']) && $_POST['default']=='yes')
    {
        $sql="UPDATE `$DB`.`settings` SET `usertype` = '$type' WHERE `id` = 1";
        $result=mysqli_query($conn,$sql);
    }
    else{
        $sql="UPDATE `$DB`.`user` SET `type` = '$type' WHERE `uid` = $uid";
        $result=mysqli_query($conn,$sql);
    }

    header("Location: $root/users")
	
?>
</div>

</body>
</html>

