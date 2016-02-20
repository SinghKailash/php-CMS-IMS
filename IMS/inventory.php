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
		$('td').click(

  function() {
    var text = $(this).text();
    $(this).text('');
    $('<textarea />').appendTo($(this)).val(text).select().blur(

      function() {
        var newText = $(this).val();
        $(this).parent().text(newText).find('textarea').remove();
      });
  });
		</script>
		
</head>
	
<title>Welcome </title>
<body>

	
	
<div><?php include("includes/header.php")?></div> 
<div><?php include("includes/footer.php")?></div>


<form action="insert_product.php" method="post">
Product Id: <input type="text" name="fname"/><br><br>
Product Name: <input type="text" name="lname"/><br><br>
Category: <input type="text" name="fname"/><br><br>
Retail Price: <input type="text" name="lname"/><br><br>
Max Price: <input type="text" name="fname"/><br><br>
Min Price: <input type="text" name="lname"/><br><br>
Quantity: <input type="text" name="fname"/><br><br>
Update Time: <input type="text" name="lname"/><br><br>
<input type="submit" />

	
<table border='1'>
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
</tr>
	
</form>
</body>
</html>