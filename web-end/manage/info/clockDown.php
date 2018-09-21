


<script>

var start=(Date.now()/1000);
var written=parseInt(document.getElementById("timeremain").innerHTML);
document.getElementById("timeremain").innerHTML=sec2str(written);
var dur=parseInt(document.getElementById("duration").innerHTML);
document.getElementById("duration").innerHTML=sec2strDur(dur);
var retId = setInterval(myTimer, 1000);



function myTimer() {
    var d = new Date();
	var t=Math.round(written-((Date.now()/1000)-start));
	var sts=document.getElementById("status").innerHTML;
	
	if(String(sts).localeCompare("running")!=0){
		clearInterval(retId);
		return;
	}
	
    document.getElementById("timeremain").innerHTML=sec2str(t);

	
	
	if(t==0){
		clearInterval(retId);
		alert("contest finished!");
	}
	
		
	
}
function sec2str(t){
    var d = Math.floor(t/86400),
        h = ('0'+Math.floor(t/3600) % 24).slice(-2),
        m = ('0'+Math.floor(t/60)%60).slice(-2),
        s = ('0' + t % 60).slice(-2);
    return (d>0?d+'d ':'')+h+":"+m+":"+s;
}
function sec2strDur(t){
    var d = Math.floor(t/86400),
        h = Math.floor(t/3600) % 24,
        m = Math.floor(t/60)%60,
        s = t % 60;
        return (d>0?d+'days ':'')+(h>0?h+' hours ':'')+(m>0?m+' minutes ':'')+(s>0?s+' seconds':'');
}

</script>
