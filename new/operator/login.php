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
	

	$email = mysqli_real_escape_string($con,$_POST['email']);
	$ms = mysqli_real_escape_string($con,$_POST['password']);
	
	//login from database
	$sql="SELECT * from tbl_module_user WHERE email='$email' AND password=md5('$ms') AND status = '1' And role='1'";
	$query=mysqli_query($con,$sql);
	$data=mysqli_fetch_assoc($query);
	if($data){
		 
		//for rember me
		if(isset($_POST['rem'])){
			$time = time()+60*60; // for one hour
			setcookie("OperatorCookie",$email,$time);
			}
		$_SESSION['new-Operator-Login']=$email;
		
		header ("location: index.php");
		}else
		{
			echo mysqli_error($con)."A";
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
<div class="w3-card-4">
<div class="w3-container w3-pink">
  <h2>Login AskNews Operator Panel</h2>
</div>
<form class="w3-container" method="post" ><br/>

 <input type="email" class="w3-input" name="email" placeholder="Email" required autofocus><br/>

<input type="password" class="w3-input" name="password" placeholder="Password" required><br>
<div style="float:left" >
<label><input type="checkbox" name="rememberme" id="rememberme">
Remember Me</label>
</div>
<button class="w3-button w3-green" name="login" style="float: right;">Login</button><br/><br/><br/>
<a  href="../sub_admin/login.php" style="float:left">Login as Sub Admin!</a>
<a href="forgot-password.html" style="float:right">Forgot Password?</a><br/><br/>
</form>
</div>
</div>
</body>
</html>

