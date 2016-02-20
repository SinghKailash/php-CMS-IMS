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
<div class="post_body">
<?php
include("includes/connect.php");
if(isset($_GET['submit'])){
	$search_id=$_GET['search'];
	 $query="select * from posts where post_title like '%$search_id%' "; 
	 $run = mysql_query($query);
	 while($row=mysql_fetch_array($run)){
		 $post_id = $row['post_id'];
		 $post_title = $row['post_title'];
		 $post_image = $row['post_image'];
		 $post_content = substr($row['post_content'],0,50);
	 
	 
}


?>  
<h2><a href="pages.php?id=<?php echo $post_id;?>"><?php echo $post_title;?></a></h2>
<center><img src= "images/<?php echo $post_image; ?>" width="100" height="100"></center>
<p align="justify"><?php echo $post_content ?></p>
<p align="right"><a href="pages.php?id=<?php echo $post_id; ?>">Read More</a></p>
<?php }?> 
</div>
<div class="footer">this is footer</div>





</body>




</html>