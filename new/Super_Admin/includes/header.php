<?php
session_start();
include "../../Super_Admin/includes/dbconfig.php";
if(isset($_SESSION['newSuper-AdminLogin'])){
    
}
else{
    header ("location: login.php");
}	include "engine/engine.php";
?>
<!DOCTYPE html>
<html>
<title>Ask News Super Admin Panel</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_color.css">
<link rel="icon" type="image/png" sizes="96x96" href="../../icon.png">
	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
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

<div class="w3-theme w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
  <a href="index.php" class="w3-bar-item w3-button <?php echo $type == "index"?'active':'';?>">Dashboard</a>
<a href="logout.php" class="w3-bar-item w3-button ">Logout</a>

</div>

<div class="w3-theme w3-sidebar w3-bar-block w3-card w3-animate-right" style="display:none;right:0;" id="rightMenu">
  <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
  <a href="#" class="w3-bar-item w3-button">Link 1</a>
  <a href="index.php" class="w3-bar-item w3-button <?php echo $type == "index"?'active':'';?>">Dashboard</a>
<a href="user.php" class="w3-bar-item w3-button <?php echo $type == "user"?'active':'';?>">User</a>
<a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>

<div class="w3-theme w3-teal">
  <button class="w3-theme w3-button w3-teal w3-xlarge w3-left" onclick="openLeftMenu()">&#9776;</button>
  <button class="w3-theme w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()">&#9776;</button>
  <div class="w3-center">
    <h1>Ask News Super Admin Panel</h1>
  </div>
</div>

<div class="w3-container">
