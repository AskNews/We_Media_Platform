<?php
//session starting
session_start();
//check where the key exists or not
if(isset($_SESSION['newSuper-AdminLogin'])){
	header("location: index.php");//content type defer function, where we redirect the page to the login page
	}
include "../../Super_Admin/includes/dbconfig.php";
//check for login
if(isset($_POST['login'])){
include "common_master.php";
	
@$username = mysqli_real_escape_string($con,$_POST['username']);
$ms = mysqli_real_escape_string($con,$_POST['password']);
$a=login("tbl_module_user",$username,$ms,3);
if($a==1){
	
	if(isset($_POST['rem'])){
		$time = time()+60*60; // for one hour
		setcookie("Super-adminCookie",$username,$time);
		}
	$_SESSION['newSuper-AdminLogin']=$username;
	echo "<script>alert('Success');</script>";
	header ("location: index.php");
	

}else{
	echo "<script>alert('Wrong Username or Password')</script>";
}
}

?>


<!DOCTYPE html>
<html>
	<head>
<title>Ask News Super Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_color.css">
<link rel="icon" type="image/png" sizes="96x96" href="../../icon.png">
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>

<!-- Side Navigation 
<nav class="wmp-sidebar wmp-bar-block wmp-card wmp-animate-left wmp-center" style="display:none" id="mySidebar">
  <h1 class="wmp-xxxlarge wmp-text-theme">Side Navigation</h1>
  <button class="wmp-bar-item wmp-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
  <a href="#" class="wmp-bar-item wmp-button">Link 1</a>
  <a href="#" class="wmp-bar-item wmp-button">Link 2</a>
  <a href="#" class="wmp-bar-item wmp-button">Link 3</a>
  <a href="#" class="wmp-bar-item wmp-button">Link 4</a>
</nav>-->

<!DOCTYPE html>
<html>
<title>Welcome to AskNews </title>
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
<!-- Header -->
<header class="wmp-container wmp-theme wmp-padding" id="myHeader">
 <!-- <i onclick="w3_open()" class="fa fa-bars wmp-xlarge wmp-button wmp-theme"></i> -->
  <div class="wmp-center">
  <h4>Ask News Super Admin Panel</h4>
  </div>
  <style>
.login-card{width:50%;margin: 12% auto;}
a{
    font-size: 14px;
    text-decoration: none;
    color: #00BCD4;
}
</style>
<div class="wmp-container">

</header>

<div> 
<div class="wmp-card-4">

<form class="wmp-container" method="post" ><br/>

 <input type="text" class="wmp-input" name="username" placeholder="Username" required autofocus><br/>

<input type="password" class="wmp-input" name="password" placeholder="Password" required><br>
<div style="float:left" >
<label><input type="checkbox" name="rem" id="rememberme">
Remember Me</label>
</div>
<button class="wmp-button wmp-green" name="login" type="submit" style="float: right;">Login</button><br/><br/><br/>
<a href="forgot-password.html" style="float:right">Forgot Password?</a><br/><br/>
</form>
</div>
</div>
</body>
</html>

