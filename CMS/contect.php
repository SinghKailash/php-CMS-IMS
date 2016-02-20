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
<div class="post_body"> 
<form action="contect.php" method="post">
<table width="600" align="center" border="0" >
<tr>
<td align="center" colspan="5"><h1>Contect Us</h1></td>
</tr>
	<tr>
	<td align="right"><strong>Your Email:</strong></td>
	<td><input type="text" name="email"></td>
	</tr>
	<tr>
	<td align="right"><strong>Subject:</strong></td>
	<td><input type="text" name="subject"></td>
	</tr>
	<tr>
	<td align="right"><strong>Your Message:</strong></td>
	<td><textarea cols="20" rows="10" name="message"></textarea></td>
	</tr>
	<tr>
	<td align="center" colspan="5"><input type="submit" name="send_email" value="Send Email"></td>
		</tr>



</table>
</form>
</div>
<?php 

	if(isset($_POST['send_email'])){
		
		$sender_email=$_POST['email'];
		
		$subject=$_POST['subject'];
		
		$mes=$_POST['message'];
		
		$to="kailashsingh0029@gmail.com";
			$message= "Email From:<br>".$mes;
			if($sender_email=='' or $subject=='' or $mes==''){
				echo "<script> alert('Please filled blanked field')</script>";
				exit();
			}
				
				mail($to,$subject,$message,$sender_email);
				$to_sender=$_POST['email'];
				$sub="onlineUstaad.com<br>";
				$mesg="Thank you for sending an email, we will get you very soon<br>";
				$from="kailashsingh0029@gmail";
				mail($to_sender,$sub,$mesg,$from);
				echo "<center><h2>Email sent,get to you very soon.!</h2></center>";
				
				
	}







?>

<div class="footer">this is footer</div>





</body>




</html>