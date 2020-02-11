<?php
//session starting
session_start();
//check where the key exists or not
if(isset($_SESSION['new-Operator-Login'])){
	header("location: index.php");//content type defer function, where we redirect the page to the login page
	}
include "../../Super_Admin/includes/dbconfig.php";
//check for login
if(isset($_POST['login'])){
	
	include "../Super_Admin/common_master.php";

	$username = mysqli_real_escape_string($con,$_POST['username']);
	$ms = mysqli_real_escape_string($con,$_POST['password']);
	$a=login("tbl_module_user",$username,$ms,1);
	if($a==1){
		
		if(isset($_POST['rem'])){
			$time = time()+60*60; // for one hour
			setcookie("OperatorCookie",$username,$time);
			}
		$_SESSION['new-Operator-Login']=$username;
		echo "<script>alert('Success');</script>";
		header ("location: index.php");
		

	}else{
		echo "<script>alert('Wrong Username or Password')</script>";
	}
	}

?>

<!DOCTYPE html>
<html>
<title>Welcome to AskNews Operator Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" href="../../icon.png" type="image/x-icon">
<link rel="stylesheet" href="css/style_color.css">
<head>
<style>
.login-card{width:50%;margin: 12% auto;}
a{
    font-size: 14px;
    text-decoration: none;
    color: #00BCD4;
}
</style>
</head>
<body class="login-card">
<div> 
<div class="wmp-card-4">
<div class="wmp-container wmp-pink">
  <h2>Login AskNews Operator Panel</h2>
</div>
<form class="wmp-container" method="post" ><br/>

 <input type="username" class="wmp-input" name="username" placeholder="username" required autofocus><br/>

<input type="password" class="wmp-input" name="password" placeholder="Password" required><br>
<div style="float:left" >
<label><input type="checkbox" name="rem" id="rememberme">
Remember Me</label>
</div>
<button class="wmp-button wmp-green" name="login" style="float: right;">Login</button><br/><br/><br/>
<a  href="../sub_admin/login.php" style="float:left">Login as Sub Admin!</a>
<a href="forgot-password.html" style="float:right">Forgot Password?</a><br/><br/>
</form>
</div>
</div>
</body>
</html>

