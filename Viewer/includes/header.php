<?php
#include "session.php";
session_start();
include "../Super_Admin/includes/dbconfig.php";
$title="Welcome to Ask News";
$description="The News Sharing Platform";	
  include "engine/engine.php";
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $title;?></title>
<meta name="description" content="<?php echo $description;?>">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="icon" type="image/png" sizes="96x96" href="../icon.png">
	
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="contactus.php">About</a></li>
              <li><a href="contactus.php">Contact</a></li>
              <?php
              if(isset($_SESSION['newViewerLogin'])){
              ?>
              <li><a href="logout.php">Logout</a></li>
              <?php
              }else{
              ?>
<li><a href="login.php">Login</a></li>
<li><a href="register.php">Register</a></li>
              
              <?php
              }
              ?>
            </ul>
          </div>
          <div class="header_top_right">
            <p><?php echo date("l"). ", " .date("Y/m/d"); ?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img style="height:100px;" src="../logo.png" alt=""></a></div>
          </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li <?php echo $type == "Index"?'class="active"':'';?>><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
          <?php
     
	 while($row=mysqli_fetch_array($query)){
	 ?>
      <li <?php echo (@$url==$row['url'])?'class="active"':'';?>><a href="category.php?cat=<?php echo $row['url'];?>" title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a></li>
      <?php
   }
   $row_t=mysqli_fetch_array($query);
	  ?> 
         </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker">
          <?php
              if(isset($data1)){
                $cid=$data1;
               
              }
              else{
                $cid=1;
               
              }
                $sql="select * from tbl_news where Status='1' and CategoryID='$cid' and Approved='1'";
                $query=mysqli_query($con,$sql);
                $index = 0; 
                while($row1 = mysqli_fetch_array($query)){
              
                ?>
               
            <li><a href="?nid=<?php echo $row1['id'];?>"><img src="images/news_thumbnail3.jpg" alt=""><?php echo $row1['HeadLine'];?></a></li>
            <?php
            }
            ?>
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  