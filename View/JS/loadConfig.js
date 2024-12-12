var start=new Date();
start=Date.parse(start)/1000;
var counts=3;

function CountDown()
{
  var now=new Date();
  now=Date.parse(now)/1000;
  var x=parseInt(counts-(now-start),10);
  if(document.form1) { document.form1.clock.value = x; }
  if(x > 0) {timerID=setTimeout("CountDown()", 100); }
  else { location.href="../Controller/home.php"; }
}

window.setTimeout('CountDown()',100);