<?php
	function isSolvedByMe($cpid){
		global $conn,$cDB,$uid;
		if($res=mysqli_query($conn,"SELECT `firstac$cpid`,`wrong$cpid` FROM $cDB.`scoreboard` WHERE `uid`='$uid' "))$uid=$uid;
		else return "untouched";
		$row= mysqli_fetch_array($res);
		if(!isset($row["firstac$cpid"]))return "untouched";
		if($row["firstac$cpid"]!=2147483647)
			return "solved";
		if($row["wrong$cpid"]>0)
			return "unsolved";
		return "untouched";
		
		
		
	}
	function getACuCount($cpid){
		global $conn,$cDB;		
		return mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(`uid`) FROM $cDB.`scoreboard` WHERE `score$cpid`>0"))["COUNT(`uid`)"];
	}
	function getALluCount($cpid){
		global $conn,$cDB;		
		return mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(`uid`) FROM $cDB.`scoreboard` WHERE `wrong$cpid`>0 OR `score$cpid`>0 "))["COUNT(`uid`)"];
	}
	
	function getVerdict($x){
		if($x===null) return "in queue";
		if($x==0)return 'Accepted'; 
		if($x== 1) return 'Time limit Exceeded';
		if($x== 2) return 'Wrong Answer';
		if($x== 100) return 'Submission Error';
		if($x== 3) return 'Presentation Error';
		if($x== -2) return 'Compile Error';
		if($x== -1) return 'Runtime Error';
		return $x;
	}
	function getLanguage($idx,$DB,$conn){
		$sql="SELECT `value` FROM `$DB`.`language` WHERE `id`='$idx'";
		if($res=mysqli_query($conn,$sql)){
			$row=mysqli_fetch_array($res);
			return $row['value'];
		}
		else return $idx;
	}
	function sec2str($t){
		//return $t;
		$d = floor($t/86400);
        $h = substr('0'.(floor($t/3600) % 24),-2);
        $m = substr('0'.(floor($t/60)%60),-2);
        $s = substr('0'.($t % 60),-2);
		$ret="";
		if($d!='0') $ret=$d."d ";
		$ret=$ret.$h.":".$m.":".$s;
		
    return $ret;
	}
	
	
?>
