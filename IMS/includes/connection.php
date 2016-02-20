<?php
$mysql_hostname = "198.71.225.65:3306";
$mysql_user = "Hadmin";
$mysql_password = "Hadmin@124";
$mysql_database = "hotelPrangan";
$prefix = "";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>
