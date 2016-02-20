<html>
<head>
<link rel="stylesheet" href="index1.css">
<title>singh news</title>
<script>
function myclock(){
	time=new Date();
	hours=time.getHours();
	mins=time.getMinutes();
	sec=time.getSeconds();
	if(sec<10){
		sec="0"+sec;
	}
	if(mins<10){
		mins="0"+sec;
	}
	document.getElementById("clock").innerHTML=hours+":"+mins+":"+sec;
	timer=setTimeout(function(){myclock()},500);
}
</script>
</head>
<body onload="myclock()">
<div id="top">
<p>Today Date is:&nbsp;&nbsp;<?php echo date("l, jS, F Y");?></p>
<p id="clock" class="clock"></p>
</div>
<div> <?php include("includes/header.php"); ?></div>
<div> <?php include("includes/navbar.php"); ?></div>
<div> <?php include("includes/sliderbar.php"); ?></div>
<div> <?php include("includes/post_body.php"); ?></div>

<div class="footer">this is footer</div>





</body>




</html>