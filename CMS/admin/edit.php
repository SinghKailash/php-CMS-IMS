 <html>
<body>
<?php
include("index.php");
include("includes/connect.php");
$edit_id=@$_GET['edit'];
	$query="select * from posts where post_id='$edit_id'";
	$run=mysql_query($query);
	while($row=mysql_fetch_array($run)){
		
				$edit_id1= $row['post_id'];
				$title=$row['post_title'];
				$date=$row['post_date'];
				$author=$row['post_author'];
				$image=$row['post_image'];
				$content=$row['post_content'];
		
	
	
	
	
	
?>
	<form method="post" action="edit.php?edit_form=<?php echo $edit_id1; ?>" enctype="multipart/form-data">

<table align="center" border="10" width="600">
<tr>
	<td align="center" colspan="5" bgcolor="yellow">
	<h1> Editing post</h1></td>
</tr>
<tr>
<td align="right">Post Title:</td>
<td><input type="text" name="title" value="<?php echo $title;?>" size="40"></td>

</tr>

<td align="right">Post Author:</td>
<td><input type="text" value="<?php echo $author;?>" name="author"></td>

</tr>
<tr>
<td align="right">Post Image:</td>
<td><input type="file" name="image">
<img src="../images/<?php echo $image;?>"width="60" height="60">
</td>

</tr>
<tr>
<td align="right">Post Content:</td>
<td><textarea name="content" value="<?php echo $content;?>" cols="40" rows="20"><?php echo $content;?></textarea></td>
</tr>
<tr>
<td align="center" colspan="5"><input type="submit" name="update" value="Update Now"></td>
</tr


	<?php } ?>
</table>
</form>
</body>
</html>
<?php 

if(isset($_POST['update'])){
	$update_id=$_GET['edit_form'];
	$post_title =$_POST['title'];
	$post_date =date('y-m-d');
	$post_author =$_POST['author'];
	$post_content =$_POST['content'];
	$post_image =$_FILES['image']['name'];
	$image_tmp = $_FILES['image']['tmp_name'];
	$post_image_type =$_FILES['image']['type'];
	$post_image_size =$_FILES['image']['size'];
	
	move_uploaded_file($image_tmp,"../images/$post_image");  
	$update_query="update posts set post_title='$post_title', post_date='$post_date',post_author='$post_author',post_image='$post_image',post_content='$post_content' where post_id='$update_id' ";
	if(mysql_query($update_query)){
		
		echo "<script> window.open('view.php?update=Post has been updated','_self)</script>'";
	}
	
}


?>
  

