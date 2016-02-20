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
<link rel="stylesheet" href="css/bill.css">
<script type="text/javascript" href="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min.js"></script>
<title>Welcome to Hotel Prangan</title>
<script>
jQuery(document).ready(function(){
	jQuery(".chosen").data("placeholder","Select Frameworks...").chosen();
});
</script>
<style>
body {
  background: #000;
  font: 98% Arial;

}

.chosenq{
font-size:22px;
}
</style>

</head>

<body>

<div><?php include("includes/header.php")?></div> 
</br
<!-- single dropdown -->
<div align = center class = "chosenq">
<select class="chosen" style="width:250px;border-radius: 20px">
	<option selected="selected">Select Table...</option>
	<option value="t1">Table-1</option>
	<option value="t2">Table-2</option>
	<option value="t3">Table-3</option>
	<option value="t4">Table-4</option>
	<option value="t5">Table-5</option>
	<option value="t6">Table-6</option>
	<option value="t7">Table-7</option>
</select>
</div>
</br>
<form align = 'center'><input type="button"  class = “btn” value=" Print this page"
onclick="window.print();return false;" />Print</form>
<div class="wrapper">

  <h1><span><i>{</i> <b>HP Bar</b> Bill <b>statement</b> <i>}</i></span> <a href="http://www.oddaka.in" target="_blank"><i>{</i> <b>Team</b>Hotel<b>prangan</b> <i>}</i></a></h1>

  <div class="income">    
    <div class="monthly-income">
      <h2>Monthly Income <i></i></h2>
      <ul class="mi">
        <li class="c"><i></i> + <b></b> = <em></em> - Chris</li>
        <li class="a"><i></i> + <b></b> = <em></em> - Adriane</li>
      </ul>
    </div>    
    <div class="percent">
      <h2>% of Monthly Income</h2>
      <ul class="ptmi">
        <li class="c"><i></i> / <b></b> = <em></em> - Chris</li>
        <li class="a"><i></i> / <b></b> = <em></em> - Adriane</li>
      </ul>
    </div>   
  </div>
  
  <div class="rent">    
    <h2>$<i></i> Rent</h2>
    <ul class="r">
      <li class="c"><i></i> * <b></b> = <em></em> - Chris</li>
      <li class="a"><i></i> * <b></b> = <em></em> - Adriane</li>
    </ul>    
    <h2>Rounded</h2>
    <ul class="tru">
      <li class="c">$<i></i> - Chris</li>
      <li class="a">$<i></i> - Adriane</li>
    </ul>  
  </div>

  <div class="electricity">    
    <h2>$<i></i> Electric Bill (Duke Energy)</h2>
    <ul class="r">
      <li class="c"><i></i> * <b></b> = <em></em> - Chris</li>
      <li class="a"><i></i> * <b></b> = <em></em> - Adriane</li>
    </ul>    
    <h2>Rounded</h2>
    <ul class="tru">
      <li class="c">$<i></i> - Chris</li>
      <li class="a">$<i></i> - Adriane</li>
    </ul>  
  </div>

  <div class="internet">    
    <h2>$<i></i> Internet Bill (Comcast)</h2>
    <ul class="r">
      <li class="c"><i></i> * <b></b> = <em></em> - Chris</li>
      <li class="a"><i></i> * <b></b> = <em></em> - Adriane</li>
    </ul>    
    <h2>Rounded</h2>
    <ul class="tru">
      <li class="c">$<i></i> - Chris</li>
      <li class="a">$<i></i> - Adriane</li>
    </ul>  
  </div>

  <div class="gas">    
    <h2>$<i></i> Gas Bill (Vectron Gas)</h2>
    <ul class="r">
      <li class="c"><i></i> * <b></b> = <em></em> - Chris</li>
      <li class="a"><i></i> * <b></b> = <em></em> - Adriane</li>
    </ul>    
    <h2>Rounded</h2>
    <ul class="tru">
      <li class="c">$<i></i> - Chris</li>
      <li class="a">$<i></i> - Adriane</li>
    </ul>  
  </div>

  <div class="car">    
    <h2>$<i></i> Car Insurance</h2>
    <ul class="r">
      <li class="c"><i></i> * <b></b> = <em></em> - Chris</li>
      <li class="a"><i></i> * <b></b> = <em></em> - Adriane</li>
    </ul>    
    <h2>Rounded</h2>
    <ul class="tru">
      <li class="c">$<i></i> - Chris</li>
      <li class="a">$<i></i> - Adriane</li>
    </ul>  
  </div>  
</div>


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


{

$sql ="SELECT 
ORD.table_no 'Table Number',
ORD.order_id 'Order Number',
ORD.product_Name 'Product Name',
INV.product_category 'Product Category',
ORD.quantity 'Quantity',
order_time 'Last Order'

FROM bar_hp_order ORD, bar_hp_inventory INV
WHERE ORD.product_id = INV.product_id";

$result = $conn->query($sql);

}

$conn->close();
?>
</body>
</html>
<?php } ?>
