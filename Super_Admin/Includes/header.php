<?php
session_start();
include "includes/dbconfig.php";
include "engine/engine.php";
	if(isset($_SESSION['newAccount-AdminLogin'])){
    
    }
    else{
        header ("location: login.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>We Media Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<script src="common_master.js"></script> 
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<link rel="icon" type="image/png" sizes="96x96" href="../icon.png">

<link href="css/pages/plans.css" rel="stylesheet"> 
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">We Media Admin </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i><?php echo $_SESSION['newAccount-AdminLogin'];?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="profile.php">Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
       
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li <?php echo $type == "index"?'class="active"':'';?>><a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li <?php echo $type == "user"?'class="active"':'';?>><a href="user.php"><i class="icon-user"></i><span>User</span> </a> </li>
        <li <?php echo $type == "gallery"?'class="active"':'';?>><a href="gallery.php"><i class="icon-play-circle"></i><span>Gallery</span> </a> </li>
        <li <?php echo $type == "picture"?'class="active"':'';?>><a href="picture.php"><i class="icon-picture"></i><span>Picture</span> </a> </li>
        <li <?php echo $type == "categories"?'class="active"':'';?>><a href="categories.php"><i class="icon-tag"></i><span>Categories</span> </a> </li>
        <li <?php echo $type == "slideshow"?'class="active"':'';?>><a href="slideshow.php"><i class="icon-play"></i><span>Slideshow</span> </a> </li>
        
        </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>