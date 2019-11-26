<?php

	session_start();
	if(isset($_SESSION['content_creator_uname']))
	{
		header("location: index.php");
	}
	include "../../Super_Admin/Includes/dbconfig.php";
	if(isset($_POST['login']))
	{
		$username = mysqli_real_escape_string($con,$_POST['username']);
		$password = mysqli_real_escape_string($con,$_POST['password']);
		$sql="SELECT * from tbl_content_creator WHERE username='$username' AND password=md5('$password') and Status=1";
        $query=mysqli_query($con,$sql);
		// $data=mysqli_fetch_assoc($query);
		// if($data)
		// {
		// 	if(isset($_POST['rememberme']))
		// 	{
		// 		$time = time()+60*60; // for one hour
		// 		setcookie("content_creator_Cookie",$username,$time);
		// 	}
        //     $_SESSION['content_creator_uname']=$username;
        //     $_SESSION['content_creator_profile']=$data[]
		// 	header ("location: index.php");
        // }
        while($data=mysqli_fetch_assoc($query))
		//if($data)
		{
			if(isset($_POST['rememberme']))
			{
				$time = time()+60*60; // for one hour
				setcookie("content_creator_Cookie",$username,$time);
			}
            $_SESSION['content_creator_uname']=$username;
            $_SESSION['content_creator_profile']=$data["channel_logo"];
            //echo "image= ".$_SESSION['content_creator_profile'];
			header ("location:index.php");
		}
		// else
		// {
		// 	$error = "invalid username and password. please try later";
		// }
	}
?>
<!DOCTYPE html>
<html>
<title>Welcome to AskNews</title>
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
<div class="w3-container w3-green">
  <h2>Login</h2>
</div>
<form class="w3-container" method="post" ><br/>

 <input type="text" class="w3-input" name="username" placeholder="Username" required autofocus><br/>

<input type="password" class="w3-input" name="password" placeholder="Password" required><br>
<div style="float:left" >
<label><input type="checkbox" name="rememberme" id="rememberme">
Remember Me</label>
</div>
<button class="w3-button w3-green" name="login" style="float: right;">Submit</button><br/><br/><br/>
<a  href="sign-up.php" style="float:left">Register Now!</a>
<a href="forgot-password.html" style="float:right">Forgot Password?</a><br/><br/>
</form>
</div>
</div>
</body>
</html>

