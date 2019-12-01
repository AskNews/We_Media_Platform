<?php
session_start();
$type="index";
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
		<!-- MAIN -->
    <div class="wmp-container">
    <div class="wmp-container wmp-card">
    <h3>Dashboard <i class="fa fa-tachometer"></i></h3>
    <br>
<table class="wmp-responsive">
<tr><td>
<div class="wmp-card wmp-quarter wmp-hover-shadow" style="width: 200px;">
<p>&nbsp;&nbsp;Categories &nbsp;<i class="fa fa-newspaper-o"></i></p>
  <div class="wmp-center wmp-blue">
  <font size="6" >10.4K</font> 
  </div>
  <br>
</div>
</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<div class="wmp-card wmp-border wmp-quarter wmp-hover-shadow" style="width: 200px;">
<p>&nbsp;&nbsp;Gallery &nbsp;<i class="fa fa-file-image-o"></i></p>
  <div class="wmp-center wmp-green">
  <font size="6" >30</font> 
  </div>
  <br>
</div>
</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<div class="wmp-card wmp-quarter wmp-hover-shadow" style="width: 200px;">
<p>&nbsp;&nbsp;Pictures &nbsp;<i class="fa fa-picture-o"></i></p>
  <div class="wmp-center wmp-blue">
  <font size="6" >400</font> 
  </div>
  <br>
</div> 
</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<div class="wmp-card wmp-border wmp-quarter wmp-hover-shadow" style="width: 200px;">
<p>&nbsp;&nbsp;SlideShow &nbsp;<i class="fa fa-slideshare"></i></p>
  <div class="wmp-center wmp-blue">
  <font size="6" >16</font> 
  </div>
  <br>
</div> 
</td></tr></table>
<br><br>&nbsp;
</div><br><br>
	
<div class="wmp-responsive wmp-card-4">
<h3>Feedback <i class="fa fa-commenting-o" aria-hidden="true"></i>
</h3> 
<table class="wmp-table wmp-striped wmp-bordered">
<thead>
<tr class="wmp-theme">
  <th>ID</th>
  <th>User</th>
  <th>Message</th>
  <th>Action</th>
</tr>
</thead>
<tbody>
<tr>
  <td>1</td>
  <td>bhavesh</td>
  <td>Nice service</td>
  <td><a href="#">Report</a>&nbsp;<a href="#">Reply</a></td>
</tr>
<tr>
  <td>2</td>
  <td>bhavik</td>
  <td>Great idea, Thank you</td>
  <td><a href="#">Report</a>&nbsp;<a href="#">Reply</a></td>
</tr>
<tr>
  <td>3</td>
  <td>jeet</td>
  <td>How can i earn money?</td>
  <td><a href="#">Report</a>&nbsp;<a href="#">Reply</a></td>
</tr>
</tbody>
</table>
</div>
<br><br>

<div class="wmp-container wmp-card">
    <h3>Account Review <i class="fa fa-users"></i></h3>
    <br>
<table class="wmp-responsive">
<tr><td>
<div class="wmp-card wmp-quarter wmp-hover-shadow" style="width: 200px;">
<p>&nbsp;&nbsp;Content Creators &nbsp;<i class="fa fa-users"></i></p>
  <div class="wmp-center wmp-blue">
  <font size="6" >152K</font> 
  </div>
  <br>
</div>
</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<div class="wmp-card wmp-border wmp-quarter wmp-users" style="width: 200px;">
<p>&nbsp;&nbsp;Ad Creators &nbsp;<i class="fa fa-users"></i></p>
  <div class="wmp-center wmp-green">
  <font size="6" >20</font> 
  </div>
  <br>
</div>
</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<div class="wmp-card wmp-quarter wmp-hover-shadow" style="width: 200px;">
<p>&nbsp;&nbsp;Pendding Accounts &nbsp;<i class="fa fa-users"></i></p>
  <div class="wmp-center wmp-blue">
  <font size="6" >56</font> 
  </div>
  <br>
</div> 
</td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td><td>
<div class="wmp-card wmp-border wmp-quarter wmp-hover-shadow" style="width: 200px;">
<p>&nbsp;&nbsp;Feedback &nbsp;<i class="fa fa-comment"></i></p>
  <div class="wmp-center wmp-blue">
  <font size="6" >160</font> 
  </div>
  <br>
</div> 
</td></tr></table>


<br><br>&nbsp;
</div><br><br>
	</div>
		<!-- END MAIN -->
        <?php
        include "includes/footer.php";
        ?>
