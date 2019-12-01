<?php
session_start();
include "../../Super_Admin/includes/dbconfig.php";
if(isset($_SESSION['new-Operator-Login'])){
    
}
else{
    header ("location: login.php");
}	include "engine/engine.php";
?>
<!DOCTYPE html>
<html>
<title>Ask News Operator Panel</title>
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

<div class="wmp-theme wmp-sidebar wmp-bar-block wmp-card wmp-animate-left" style="display:none" id="mySidebar">
  <button class="wmp-bar-item wmp-button wmp-large"
  onclick="w3_close()">Close &times;</button>
  <a href="index.php" class="wmp-bar-item wmp-button wmp-large <?php echo $type == "index"?'active':'';?>">Dashboard</a>
<a href="categories.php" class="wmp-bar-item wmp-button wmp-large <?php echo $type == "categories"?'active':'';?>">Categories</a>
<a href="logout.php" class="wmp-bar-item wmp-button wmp-large ">Logout</a>

</div>

<div id="main">

<div class="wmp-theme wmp-teal">
  <button id="openNav" class="wmp-theme wmp-button wmp-teal wmp-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="wmp-container">
    <h1>Ask News Operator Panel</h1>
  </div>
</div>
<div class="wmp-container">
