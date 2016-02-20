
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
<script type="text/javascript" src="js/jquery-1.12.0.min"></script>
<style>

</style>
<title>Welcome To Hotel Prangan</title>
</head>

<body>
 <div><?php include("includes/header.php")?></div> 
<div><?php include("includes/footer.php")?></div>
 
<?php

$servername = "198.71.225.65:3306";
$username = "Hadmin";
$password = "Hadmin@124";
$dbname = "hotelPrangan";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

include("includes/connection.php");
 
$sql="INSERT INTO bar_hp_order (product_name, product_id, table_no, quantity, current_price)
VALUES
('$_POST[product_name]','$_POST[product_id]','$_POST[table_no]', '$_POST[quantity]', '$_POST[current_price]')";
 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
	echo "<br/>";
	echo "<br/>";
	echo '<a href="order.php">Return Back</a>';
	echo "<br/>";
	echo "<br/>";
	echo '<a href="logout.php">logout</a>';
	
	//echo '<a href="/default.asp">Click here to enter another record</a>;
	
	
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
 
?>
</body>
</html>

<?php } ?>