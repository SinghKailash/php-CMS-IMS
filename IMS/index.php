<?php
session_start();

if (!isset($_SESSION['user_name']))
{
	
	header("location: login.php");
}
	
else {
?>

<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" href="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>

<title>Welcome to Hotel Prangan</title>



</head>

<body> 

<div><?php include("includes/header.php")?></div>
<h4 align = "center">Hello <?php echo $_SESSION['user_name'];?></h4>
<div class = "divider"></div>


<div align = center><?php include("includes/nav.php")?></div>
	
<div align = center><?php include("includes/footer.php")?></div>
</body>
</html>

<?php } ?>
