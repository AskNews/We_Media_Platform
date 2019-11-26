<?php
session_start();
include "../../Super_Admin/includes/dbconfig.php";
	if(isset($_SESSION['newSub-AdminLogin'])){
    
    }
    else{
        header ("location: login.php");
    }
	include "engine/engine.php";
?>
<!DOCTYPE html>
<html>
<title>Ask News Sub Admin Panel</title>
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
<header class="w3-container w3-theme w3-padding" id="myHeader">
 <!-- <i onclick="w3_open()" class="fa fa-bars w3-xlarge w3-button w3-theme"></i> -->
  <div class="w3-center">
  <h4>Ask News Sub Admin Panel</h4>
  </div>
  
<div class="w3-container">

<div class="w3-bar w3-theme">
<a href="index.php" class="w3-bar-item w3-button w3-padding-16 <?php echo $type == "index"?'active':'';?>">Dashboard</a>
<a href="content_creator.php" class="w3-bar-item w3-button w3-padding-16 <?php echo $type == "content_creator"?'active':'';?>">Content Creator</a>
<a href="ad_creator.php" class="w3-bar-item w3-button w3-padding-16 <?php echo $type == "ad_creator"?'active':'';?>">Ad Creator</a>
<a href="gallery.php" class="w3-bar-item w3-button w3-padding-16 <?php echo $type == "gallery"?'active':'';?>">Gallery</a>
<a href="picture.php" class="w3-bar-item w3-button w3-padding-16 <?php echo $type == "picture"?'active':'';?>">Picture</a>
<a href="slideshow.php" class="w3-bar-item w3-button w3-padding-16 <?php echo $type == "slideshow"?'active':'';?>">Slideshow</a>
<a href="categories.php" class="w3-bar-item w3-button w3-padding-16 <?php echo $type == "categories"?'active':'';?>">Categories</a>
<a href="feedback.php" class="w3-bar-item w3-button w3-padding-16 <?php echo $type == "feedback"?'active':'';?>">Feedback</a>
<a href="qna.php" class="w3-bar-item w3-button w3-padding-16 <?php echo $type == "qna"?'active':'';?>">QNA</a>
<a href="logout.php" class="w3-bar-item w3-button w3-padding-16 ">Logout</a>
  
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
