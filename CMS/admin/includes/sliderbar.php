<div id="sliderbar">
<h2 align="center">Subscribe via Email</h2>
<div align="center">
<form style =="border:1px solid #ccc; padding:3px; text align:center; action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=OnlineComputerTeacherKarachi' ,'popupwindow' ,'scrollbars=yes, width=550, height=520');
return true">
<p>Enter Your email Address:</p>
<p><input type="text" style="width:140px" name="email"/></p>
<input type="hidden" value="OnlineComputerTeacherKarachi" name="uri"/>
<input type="hidden" value="en_US" name="loc"/>
<input type="submit" value="Subscribe"/>
<p>Delivered by <a href="http://feedburner.google.com" target="_blank">FeedBurner</a></p>
</form> 
</div>
<div class="social" align="center">
<h2 align="center">Follow Us</h2>
<a href="hhtp://www.facebook.com/onlineustaadwali" target="blank">
<img src="images/download.jpg"></a>
<img src="images/download (1).jpg">
<img src="images/download.png">
</div>
<h2>Recent post</h2>
<?php 
include("includes/connect.php");
$query = "select * from posts order by 1 DESC LIMIT 0,4";
$run = mysql_query($query);
while($row = mysql_fetch_array($run)){
	$post_id = $row['post_id'];
	$title = $row['post_title'];
	$image = $row['post_image'];
?>
<center><a href="pages.php?id=<?php echo $post_id; ?>"><img src="images/<?php echo $image; ?>" width="150" height="150"></a>
<a href="pages.php?id=<?php echo $post_id; ?>">
<h3><?php echo $title; ?></a></h3></a></center>
<?php } ?>
</div>
