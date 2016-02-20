<?php 
session_start();
if(!isset($_SESSION['user_name'])){
	header("location:login.php");

}
else{




?>






<html>
<head>
<title>Admin Panel</title>
<link rel="stylesheet" href="admin_style.css">
</head>
<body>  
<header>
<h1><a href="index.php">Welcome to Admin panel of kailash.com</a></h1>
</header>

<aside>
Welcome:<font color="red" size="5"><?php echo $_SESSION['user_name']; ?></font>
<h1> Manage content</h1> 
<h2><a href="logout.php">Admin Logout<a></h2> 
<h2><a href="index.php?view=view">View Posts<a></h2>
<h2><a href="index.php?insert=insert">Insert New Posts<a></h2>
</aside>
<center><h1>This is your Admin Panel</h1>
<p>You can manage all of your website content here.</p>
<h1><?php echo @$_GET['delete']; ?>
</center>
<?php    
if(isset ($_GET['insert'])){
	include("insert_post.php");
}




?>







<?php if(isset ($_GET['view'])){ ?>

<table align="center" width="900px" border="3">
<tr>
<td align="center" colspan="9" bgcolor="yellow"><h1>View all Posts</h1></td>
</tr>
	<tr>
			<th>Post no:</th>
			<th>Post Title:</th>
			<th>Post Date:</th>
			<th>Post Author:</th>
			<th>Post Image:</th>
			<th>Post Content:</th>
			<th>Edit</th>
			<th>Delete</th>
	</tr>
<?php
include("includes/connect.php");
$i=1;
if(isset ($_GET['view']))
{
	$query="select * from posts order by 1 DESC";
	$run=mysql_query($query);
	while($row=mysql_fetch_array($run)){
					
				$id= $row['post_id'];
				$title=$row['post_title'];
				$date=$row['post_date'];
				$author=$row['post_author'];
				$image=$row['post_image'];
				$content=substr($row['post_content'],0,50);
		
	




?>
	<tr align="center">
		<td><?php echo $i++; ?></td> 
		<td><?php echo $title;?></td>
		<td><?php echo $date;?></td>
		<td><?php echo $author;?></td>
		<td><img src="../images/<?php echo $image;?>" width="50" height="50"></td>
		<td><?php echo $content;?></td>
	
		<td><a href="edit.php?edit=<?php echo $id;?>">Edit</a></td>
			<td><a href="delete.php?del=<?php echo $id; ?>">Delete</td>
	
	</tr>
	<?php } }} ?>
</table>

<body>



</html>
<?php } ?>