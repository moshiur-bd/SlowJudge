<?php
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
		$d = substr('0'.floor($t/86400),-2);
        $h = substr('0'.(floor($t/3600) % 24),-2);
        $m = substr('0'.(floor($t/60)%60),-2);
        $s = substr('0'.($t % 60),-2);
		
    return ($d>0?$d+'d ':'').$h.":".$m.":".$s;
}
?>