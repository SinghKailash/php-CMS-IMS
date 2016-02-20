<html>
<head>
<link rel="stylesheet" href="index1.css">
<title>singh news</title>
</head>
<body>
<div id="top"><p> topvar</p></div>
<div> <?php include("includes/header.php"); ?></div>
<div> <?php include("includes/navbar.php"); ?></div>
<div> <?php include("includes/sliderbar.php"); ?></div>
<div class="post_body.php">
<?php
include("includes/connect.php");
$page_id = $_GET['id'];
$query = "select * from posts where post_id = '$page_id'";
$run=mysql_query($query);

while($row= mysql_fetch_array($run)){
	$title= $row['post_title'];
	$date= $row['post_date'];
	$author= $row['post_author'];
	$image= $row['post_image'];
	$content= $row['post_content'];





?>
<h2>
<?php echo $title;?></h2>

<p>Published On:&nbsp;&nbsp;<b><?php echo $date ?></b></p>
<p align="right">Posted By:&nbsp;&nbsp;<b><?php echo $author ?></b>

</p>
<center><img src= "images/<?php echo $image; ?>" width="600"></center>
<p align="justify"><?php echo $content ?></p>

<?php }?>
</div>

<div class="footer">this is footer</div>





</body>




</html>