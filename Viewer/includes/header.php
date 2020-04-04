<?php
session_start();
include "../Super_Admin/includes/dbconfig.php";
$title="Welcome to Ask News";
$desc="The News Sharing Platform";

	
  include "engine/engine.php";
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="layout/styles/main.css" rel="stylesheet" type="text/css" media="all">
<link href="layout/styles/mediaqueries.css" rel="stylesheet" type="text/css" media="all">
<meta name="description" content="<?php echo $desc;?>">
  <meta name="keywords" content="<?php echo $keyword;?>">
<link href="css/lightbox.css" rel="stylesheet">
<link rel="icon" type="image/png" sizes="96x96" href="../icon.png">
	
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<!--[if lt IE 9]>
<link href="layout/styles/ie/ie8.css" rel="stylesheet" type="text/css" media="all">
<script src="layout/scripts/ie/css3-mediaqueries.min.js"></script>
<script src="layout/scripts/ie/html5shiv.min.js"></script>
<![endif]-->
<!-- Slider -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="main.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.2.2/jquery.form.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<link href="layout/scripts/responsiveslides.js-v1.53/responsiveslides.css" rel="stylesheet" type="text/css" media="all">
</head>
<body class="">
<div class="wrapper row1">
  <header id="header" class="full_width clear">
    <div id="hgroup">
      <img src="../logo.png" style="height:100px;">
    </div>
    <div id="header-contact">
      <ul class="list none">
      <?php
      if(isset($_SESSION['newViewerLogin'])){
      ?>
        <li><span class="icon-envelope"></span> <a href="#">Welcome <?php echo @$_SESSION['newViewerLogin'];?></a></li>
        <?php
      }
        ?>
      </ul>
    </div>
  </header>
</div>
<!-- ################################################################################################ -->
<div class="wrapper row2">
  <nav id="topnav">
    <ul class="clear">
      <li <?php echo $type == "Index"?'class="active"':'';?>><a href="index.php" title="Homepage">Homepage</a></li>
      <?php
     
	 while($row=mysqli_fetch_array($query)){
	 ?>
      <li <?php echo (@$url==$row['url'])?'class="active"':'';?>><a href="category.php?cat=<?php echo $row['url'];?>" title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a></li>
      <?php
     }
      ?>
      <li <?php echo $type == "gallery"?'class="active"':'';?>><a href="gallery.php" title="Gallery">Gallery</a></li>
     <?php
     if(isset($_SESSION['newViewerLogin'])){
     ?>
      <li <?php echo $type == "Logout"?'class="active"':'';?>><a href="logout.php" title="Logout">Logout</a></li>
      <li <?php echo $type == "Contact"?'class="active"':'';?>><a href="contact.php" title="Contact Us">Contact US</a></li>
    
       <?php
     }else{
      ?>
       <li <?php echo $type == "Login"?'class="active"':'';?>><a href="login.php" title="Login">Login</a></li>
      <li <?php echo $type == "Register"?'class="active"':'';?>><a href="Register.php" title="Register">Register</a></li>
     <?php
     }
     ?>
    </ul>
  </nav>
</div>