<html>
<body>
 
 
<?php
include("includes/connection.php");

 
$sql="INSERT INTO bar_hp_inventory (product_id, product_name, product_category, retail_price, max_price, min_price, quantity, update_time)
VALUES
('$_POST[product_id]','$_POST[product_name]','$_POST[product_category]','$_POST[retail_price]', '$_POST[max_price]','$_POST[min_price]', '$_POST[quantity]','$_POST[update_time]' )";
 

echo "1 record added";
 
?>
</body>
</html>