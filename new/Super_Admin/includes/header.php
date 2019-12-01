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
<nav class="wmp-sidebar wmp-bar-block wmp-card wmp-animate-left wmp-center" style="display:none" id="mySidebar">
  <h1 class="wmp-xxxlarge wmp-text-theme">Side Navigation</h1>
  <button class="wmp-bar-item wmp-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
  <a href="#" class="wmp-bar-item wmp-button">Link 1</a>
  <a href="#" class="wmp-bar-item wmp-button">Link 2</a>
  <a href="#" class="wmp-bar-item wmp-button">Link 3</a>
  <a href="#" class="wmp-bar-item wmp-button">Link 4</a>
</nav>-->
<!-- Header -->

<div class="wmp-theme wmp-sidebar wmp-bar-block wmp-card wmp-animate-left" style="display:none" id="leftMenu">
  <button onclick="closeLeftMenu()" class="wmp-bar-item wmp-button wmp-large">Close &times;</button>
  <a href="index.php" class="wmp-bar-item wmp-button <?php echo $type == "index"?'active':'';?>">Dashboard</a>
<a href="logout.php" class="wmp-bar-item wmp-button ">Logout</a>

</div>

<div class="wmp-theme wmp-sidebar wmp-bar-block wmp-card wmp-animate-right" style="display:none;right:0;" id="rightMenu">
  <button onclick="closeRightMenu()" class="wmp-bar-item wmp-button wmp-large">Close &times;</button>
  <a href="#" class="wmp-bar-item wmp-button">Link 1</a>
  <a href="index.php" class="wmp-bar-item wmp-button <?php echo $type == "index"?'active':'';?>">Dashboard</a>
<a href="user.php" class="wmp-bar-item wmp-button <?php echo $type == "user"?'active':'';?>">User</a>
<a href="logout.php" class="wmp-bar-item wmp-button">Logout</a>
</div>

<div class="wmp-theme wmp-teal">
  <button class="wmp-theme wmp-button wmp-teal wmp-xlarge wmp-left" onclick="openLeftMenu()">&#9776;</button>
  <button class="wmp-theme wmp-button wmp-teal wmp-xlarge wmp-right" onclick="openRightMenu()">&#9776;</button>
  <div class="wmp-center">
    <h1>Ask News Super Admin Panel</h1>
  </div>
</div>

<div class="wmp-container">
