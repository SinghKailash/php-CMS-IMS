<div class="post_body">

<?php

include("includes/connect.php");
$query="select * from posts order by rand() LIMIT 0,2";
$run=mysql_query($query);

while($row= mysql_fetch_array($run)){
	$post_id= $row['post_id'];
	$title= $row['post_title'];
	$date= $row['post_date'];
	$author= $row['post_author'];
	$image= $row['post_image'];
	$content= substr($row['post_content'],0,100);





?>
<h2><a href="pages.php?id=<?php echo $post_id;?>"><?php echo $title;?></a></h2>

<p>Published On:&nbsp;&nbsp;<b><?php echo $date ?></b></p>
<p align="right">Posted By:&nbsp;&nbsp;<b><?php echo $author ?></b>

</p>
<center><img src= "images/<?php echo $image; ?>" width="600" height="300"></center>
<p align="justify"><?php echo $content ?></p>
<p align="right"><a href="pages.php?id=<?php echo $post_id; ?>">Read More</a></p>
<?php }?>
</div>