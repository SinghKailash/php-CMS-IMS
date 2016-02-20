<?php
session_start();
?>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" href="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-1.12.0.min"></script>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:600">
<link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
<div><?php include("includes/header.php")?></div>
<form action = "login.php" method = "post">
	<div class="login">
		<div class="login-screen">
			<div class="app-title">
				<h1>Login</h1>
			</div>

			<div class="login-form">
				<div class="control-group">
				<input type="text" class="login-field" value="" name = "user_name" placeholder="username" id="login-name">
				<label class="login-field-icon fui-user" for="login-name"></label>
				</div>

				<div class="control-group">
				<input type="password" class="login-field" value="" name = "user_pwd" placeholder="password" id="login-pass">
				<label class="login-field-icon fui-lock" for="login-pass"></label>
				</div>

				<input type="submit"class="btn btn-primary btn-large btn-block" href="#" value="login" name = "login">
				<a class="login-link" href="#">Lost your password?</a>
			</div>
		</div>
	</div>
</form>

<div><?php include("includes/footer.php")?></div>
</body>
</html>

<?php
include("includes/connection.php");

if(isset($_POST['login'])){
	
	$user_name = mysql_real_escape_string($_POST['user_name']);
	$user_pwd = mysql_real_escape_string($_POST['user_pwd']);
	$login_query = "SELECT * FROM bar_hp_user WHERE user_name = '$user_name' and user_pwd = '$user_pwd'";

	$run = mysql_query($login_query);
	$count=mysql_num_rows($run);
	
// If result matched $myusername and $mypassword, table row must be 1 row
if($count > 0){

$_SESSION['user_name'] = $user_name;
echo"<script>window.open('index.php', '_self')</script>"; 

}
else {
echo "<script>alert('Username or Password is incorrect!')</script>";
}
}
?>