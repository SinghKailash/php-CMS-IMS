<?php 
session_start();


?>
<html> 
<head>
<title>Admin Login</title>
</head>
<body>
	<form action="login.php" method="post">
	<table align="center" width="400" border="20">
	<tr>
	<td colspan="5" align="center" bgcolor="gray"><h1>Admin Login:</h1></td>
	</tr>
	<tr>
	<td align="right">User Name:</td>
	<td ><input type="text" name="user_name"></td>
	</tr>
	<tr>
	<td align="right">Password</td>
	<td><input type="password" name="user_pass"></td>
	</tr>
	<tr>
	<td colspan="5" align="center"><input type="submit" name="login" value="login"></td>

	</tr>
	
	
	
	</table>


</body>


</html>
<?php
include("includes/connect.php");

if(isset($_POST['login'])){
		$user_name=mysql_real_escape_string($_POST['user_name']);
		$user_pass=mysql_real_escape_string($_POST['user_pass']);
		$encrypt=md5($user_pass);
		 
		 $login_query="select *  from login where user_name='$user_name' AND user_password='$user_pass'";
		$run= mysql_query($login_query);
			if (mysql_num_rows($run)>0){
				$_SESSION['user_name']=$user_name;
				
				echo "<script>window.open('index.php','_self')</script>";
				
			}
			else{
				echo "<script> alert('user name or password are incorrect!')</script>";
			}
}







?>

