


<script>

var start=(Date.now()/1000);
var written=parseInt(document.getElementById("time").innerHTML);
var myVar = setInterval(myTimer, 1000);

function myTimer() {
    var d = new Date();
	var t=Math.round(written+((Date.now()/1000)-start));
    document.getElementById("time").innerHTML=t;
}
function sec2str(t){
    var d = Math.floor(t/86400),
        h = ('0'+Math.floor(t/3600) % 24).slice(-2),
        m = ('0'+Math.floor(t/60)%60).slice(-2),
        s = ('0' + t % 60).slice(-2);
    return (d>0?d+'d ':'')+(h>0?h+':':'')+(m>0?m+':':'')+(t>60?s:s+'s');
}

</script>
