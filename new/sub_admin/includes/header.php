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
<nav class="wmp-sidebar wmp-bar-block wmp-card wmp-animate-left wmp-center" style="display:none" id="mySidebar">
  <h1 class="wmp-xxxlarge wmp-text-theme">Side Navigation</h1>
  <button class="wmp-bar-item wmp-button" onclick="w3_close()">Close <i class="fa fa-remove"></i></button>
  <a href="#" class="wmp-bar-item wmp-button">Link 1</a>
  <a href="#" class="wmp-bar-item wmp-button">Link 2</a>
  <a href="#" class="wmp-bar-item wmp-button">Link 3</a>
  <a href="#" class="wmp-bar-item wmp-button">Link 4</a>
</nav>-->
<!-- Header -->
<header class="wmp-container wmp-theme wmp-padding" id="myHeader">
 <!-- <i onclick="w3_open()" class="fa fa-bars wmp-xlarge wmp-button wmp-theme"></i> -->
  <div class="wmp-center">
  <h4>Ask News Sub Admin Panel</h4>
  </div>
  
<div class="wmp-container">

<div class="wmp-bar wmp-theme">
<a href="index.php" class="wmp-bar-item wmp-button wmp-padding-16 <?php echo $type == "index"?'active':'';?>">Dashboard</a>
<a href="content_creator.php" class="wmp-bar-item wmp-button wmp-padding-16 <?php echo $type == "content_creator"?'active':'';?>">Content Creator</a>
<a href="ad_creator.php" class="wmp-bar-item wmp-button wmp-padding-16 <?php echo $type == "ad_creator"?'active':'';?>">Ad Creator</a>
<a href="gallery.php" class="wmp-bar-item wmp-button wmp-padding-16 <?php echo $type == "gallery"?'active':'';?>">Gallery</a>
<a href="picture.php" class="wmp-bar-item wmp-button wmp-padding-16 <?php echo $type == "picture"?'active':'';?>">Picture</a>
<a href="slideshow.php" class="wmp-bar-item wmp-button wmp-padding-16 <?php echo $type == "slideshow"?'active':'';?>">Slideshow</a>
<a href="categories.php" class="wmp-bar-item wmp-button wmp-padding-16 <?php echo $type == "categories"?'active':'';?>">Categories</a>
<a href="feedback.php" class="wmp-bar-item wmp-button wmp-padding-16 <?php echo $type == "feedback"?'active':'';?>">Feedback</a>
<a href="qna.php" class="wmp-bar-item wmp-button wmp-padding-16 <?php echo $type == "qna"?'active':'';?>">QNA</a>
<a href="logout.php" class="wmp-bar-item wmp-button wmp-padding-16 ">Logout</a>
  
  <!--
  <div class="wmp-dropdown-hover">
    <button class="wmp-button wmp-padding-16">
      Dropdown <i class="fa fa-caret-down"></i>
    </button>
    <div class="wmp-dropdown-content wmp-card-4 wmp-bar-block">
      <a href="#" class="wmp-bar-item wmp-button">Link 1</a>
      <a href="#" class="wmp-bar-item wmp-button">Link 2</a>
      <a href="#" class="wmp-bar-item wmp-button">Link 3</a>
    </div>
  </div>-->

</header>

<style>
.form-card{width:70%;margin: 3% auto;}
a{
    font-size: 14px;
    text-decoration: none;
    color: #00BCD4;
}
</style>

<div class="form-card">