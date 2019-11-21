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
	

	$username = mysqli_real_escape_string($con,$_POST['uname']);
	$ms = mysqli_real_escape_string($con,$_POST['password']);
	
	//login from database
	$sql="SELECT * from tbl_super_admin WHERE user_name='$username' AND password=md5('$ms') AND status = '1'";
		$query=mysqli_query($con,$sql);
	$data=mysqli_fetch_assoc($query);
	if($data){
		 
		//for rember me
		if(isset($_POST['rem'])){
			$time = time()+60*60; // for one hour
			setcookie("SuperAdminCookie",$username,$time);
			}
		$_SESSION['newSuper-AdminLogin']=$username;
		
		header ("location: index.php");
		}else
		{
			echo mysqli_error($con)."A";
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
<nav class="w3-sidebar w3-bar-block w3-card w3-animate-left w3-center" style="display:none" id="mySidebar">
  <h1 class="w3-xxxlarge w3-text-theme">Side Navigation</h1>
  <button class="w3-bar-item w3-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="#" class="w3-bar-item w3-button">Link 2</a>
  <a href="#" class="w3-bar-item w3-button">Link 3</a>
  <a href="#" class="w3-bar-item w3-button">Link 4</a>
</nav>-->
<!-- Header -->
<header class="w3-container w3-theme w3-padding" id="myHeader">
 <!-- <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> -->
  <div class="w3-center">
  <h4>Ask News Super Admin Panel</h4>
  </div>
  
<div class="w3-container">


  <!--
  <div class="w3-dropdown-hover">
    <button class="w3-button w3-padding-16">
      Dropdown <i class="fa fa-caret-down"></i>
    </button>
    <div class="w3-dropdown-content w3-card-4 w3-bar-block">
      <a href="#" class="w3-bar-item w3-button">Link 1</a>
      <a href="#" class="w3-bar-item w3-button">Link 2</a>
      <a href="#" class="w3-bar-item w3-button">Link 3</a>
    </div>
  </div>-->

</header>

</div>

<div class="w3-row-padding">

<div class="w3-half">
	<br><br>
<form class="w3-container w3-card-4" method="post" action="login.php">
  <h2>Input Form</h2>
  <div class="w3-section">      
  <label>Email</label>	
  <input class="w3-input" type="text" name="uname" required>
    
  </div>
  <div class="w3-section">      
  <label>Password</label>
  	
  <input class="w3-input" type="password" name="password" required>
    </div>

  <div class="w3-row">
  <div class="w3-half">
    <input id="milk" class="w3-check" type="checkbox" name="rem">
    <label>Remember Me</label>
    <br>
  </div>
  <input type="submit" name="login" value="Login" class="w3-button w3-theme">
  
  </div>
  <br>
</form>
</div>
</div>
<br><br>
<?php
        include "includes/footer.php";
        ?>
