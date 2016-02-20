<?php


header("Refresh: 24; url = exchange.php");
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/table.css">
<script type="text/javascript" href="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min"></script>


<title>Welcome to Hotel Prangan</title>
</head>

<body>



<div><?php include("includes/header.php")?></div> 
	<p><marquee><strong>Welcome to TheBeerXChange, Enjoy drink on tap price!!</strong></marquee></p>
<div><?php include("includes/footer.php")?></div>




<?php
echo "";

$servername = "198.71.225.65:3306";
$username = "Hadmin";
$password = "Hadmin@124";
$dbname = "hotelPrangan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$sql ="SELECT INV.product_name 'Product Name', 
INV.product_category 'Product Category', 
ORD.order_time 'Order Time', 
DATE_FORMAT(NOW(), '%Y-%m-%d %H:%i:%s') 'Current Date', 
round((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(ORD.order_time))/60, 0) 'Minutes',
INV.product_id 'Product Number', 
INV.quantity 'Stock',
ORD.quantity 'Sold',
COALESCE(INV.quantity - ORD.quantity, '00') 'Left',
INV.max_price 'Max Price',
INV.min_price 'Min Price',
INV.retail_price 'Retail Price', 
@rownum := @rownum + 1 AS 'Row Number',
@stock_price := 
CASE 
WHEN round((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(ORD.order_time))/60, 0)<10
THEN round(INV.retail_price, 2) 
WHEN round((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(ORD.order_time))/60, 0)< 20
THEN round((INV.retail_price)*0.98, 2) 
WHEN round((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(ORD.order_time))/60, 0)< 30
THEN round((INV.retail_price)*0.96, 2) 
WHEN round((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(ORD.order_time))/60, 0)<= 40
THEN round((INV.retail_price)*0.90, 2) 
WHEN round((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(ORD.order_time))/60, 0)> 40
THEN round((INV.retail_price)*0.80, 2)  
WHEN round((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(ORD.order_time))/60, 0) IS NULL
THEN round((INV.retail_price)*0.70, 2)  
WHEN round((UNIX_TIMESTAMP(NOW()) - UNIX_TIMESTAMP(ORD.order_time))/60, 0)<10 & ORD.quantity IS NOT NULL
THEN round(((INV.retail_price)* (1 + ORD.quantity/10)), 2) 
END 'Stock Price', 
CASE WHEN INV.retail_price - @stock_price > 0 THEN 'DOWN'
	 WHEN INV.retail_price - @stock_price < 0 THEN 'UP'
	 ELSE ';-)'
END 'Change',
round((((INV.retail_price - @stock_price)/INV.retail_price)*100), 2) 'Percentage Change'
FROM (SELECT @rownum := 0) R, bar_hp_inventory AS INV LEFT JOIN bar_hp_order AS ORD 
ON INV.product_id = ORD.product_id
";
$result = $conn->query($sql);
echo "<table border='1'>
<tr>
<th>Serial Number</th>
<th>Stock Name</th>
<th>Stock Code</th>
<th>Retail Price</th>
<th>Stock Price</th>
<th>Change</th>
<th>%Change</th>
<th>Quantity Left</th>
</tr>";
while($row = $result->fetch_assoc())
{       
$t = Change;

if ($t = "DOWN") {
     $Col = "Red";
} else if ($t = "UP")  {
     $Col = "Green";
}
  else {
	$Col = "Orange";
}



echo "<tr bgcolor ="; echo ""; echo ">";
	echo "<td><font color="; echo $t; echo ">" . $row["Row Number"]. "</font></td>";
	echo "<td><font color="; echo $t; echo ">" . $row["Product Name"]. "</font></td>";
	echo "<td><font color="; echo $t; echo ">" . $row["Product Category"]. "</font></td>";
	echo "<td><font color="; echo $t; echo ">" . $row["Retail Price"]. "</font></td>";
	echo "<td><font color="; echo $t; echo ">" . $row["Stock Price"]. "</font></td>";
	echo "<td><font color="; echo $t; echo ">" . $row["Change"]. "</font></td>";
	echo "<td><font color="; echo $t; echo ">" . $row["Percentage Change"]. "</font></td>";
	echo "<td><font color="; echo $t; echo ">" . $row["Left"]. "</font></td>";
echo "</tr>";	   
}
$conn->close();
?>

</body>
</html>
