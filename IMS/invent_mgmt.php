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
<link rel="stylesheet" href="css/table.css">
<link rel="stylesheet" href="css/button.css">
<script type="text/javascript" href="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min"></script>

<title>Welcome to Hotel Prangan</title>
	
			<script>
			function addRow()
				{
$('#myTable tr:last').after('<tr>...</tr><tr>...</tr>');
				}			
				
var z={};
function tdClicks(){
var x="",y="";
$("table tr td").click(function(){
    z=$(this);
    x = $(this).text() || $(this).find("input[type='text']").val();
    if(!x){
        x="";
    }
    $(this).html("<input type='text' size='15' value='"+ x+"' />");
    $(this).find("input[type='text']").focus();
    $(this).unbind("click");
    $(this).find("input[type='text']").bind("blur", function(){
        catchme($(this).val());
        tdClicks();
    });
});
}

function catchme(wht){
    $(z).text(wht);
}
		</script>
	
</head>

<body>

<div><?php include("includes/header.php")?></div> 
<div><?php include("includes/footer.php")?></div>

<div style="width:620px; margin:0 auto;">
<form action="#" method="post">
  <button href="#" class="action-button shadow animate blue" name="in_cat" value="wine" onclick="javascript: submit()">Wine</br>
  <button href="#" class="action-button shadow animate red"name="in_cat" value="vodka" onclick="javascript: submit()">Vodka</br>
  <button href="#" class="action-button shadow animate green"name="in_cat" value="rum" onclick="javascript: submit()">Rum</br>
  <button href="#" class="action-button shadow animate yellow"name="in_cat" value="beer" onclick="javascript: submit()">Beer</br>
</form>
</div>
</br>

<?php
echo "</br>";
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

if(isset($_POST['in_cat']))
{echo "</br></br>";
$a = $_POST['in_cat'];
$sql ="SELECT 
INV.product_id 'Product Id', 
INV.product_name 'Product Name', 
@rownum := @rownum + 1 AS 'Row Number',

INV.product_category 'Product Catagory', 
INV.retail_price 'Retal Price', 
INV.max_price 'Max Price', 
INV.min_price 'Min Price',
INV.quantity 'Initial Stock',
@sold := IFNULL(ORD.quantity, 0) 'Quantity Sold', 
INV.quantity - @sold 'Current Stock',
ORD.order_time 'Last Order'

FROM bar_hp_inventory INV,(SELECT @rownum := 0) R, bar_hp_order ORD WHERE INV.product_id = ORD.product_id AND INV.product_category = '$a'";

$result = $conn->query($sql);
	
	echo "<div align = 'center'>You have Selected <strong>".$_POST['in_cat']; 
echo "</strong></div></br>";

echo "<table border='1'>
<tr>
<th>Sl Number</th>
<th>Product Id</th>
<th>Product Name</th>
<th>Product Catagory</th>
<th>Retal Price</th>
<th>Max Price</th>
<th>Min Price</th>
<th>Initial Stock</th>
<th>Quantity Sold</th>
<th>Current Stock</th>
<th>Last Order</th>
<th>Edit/Update</th>
</tr>";
while($row = $result->fetch_assoc())
{
		echo "<tr>";
	echo "<td>" . $row["Row Number"]. "</td>";
	echo "<td>" . $row["Product Id"]. "</td>";
	echo "<td>" . $row["Product Name"]. "</td>";
	echo "<td>" . $row["Product Catagory"]. "</td>";
	echo "<td>" . $row["Retal Price"]. "</td>";
	echo "<td>" . $row["Max Price"]. "</td>";
	echo "<td>" . $row["Min Price"]."</td>";
	echo "<td>" . $row["Initial Stock"]."</td>";
	echo "<td>" . $row["Quantity Sold"]. "</td>";
	echo "<td>" . $row["Current Stock"]."</td>";
	echo "<td>" . $row["Last Order"]."</td>";
	echo "<td><a href = '#'>Edit/Update</a></td>";
		echo "</tr>";   
}

 echo "<button onlcick = addRow()>Add Item</button>";
}
	  
	 
	  
$conn->close();

?>
</body>
<?php
?>
</html>
<?php } ?>
