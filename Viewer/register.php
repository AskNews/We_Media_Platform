<?php
//session starting
session_start();
include "../Super_Admin/includes/dbconfig.php";
$type="viewer";
include "engine/engine.php";
//check where the key exists or not
if(isset($_SESSION['newViewerLogin'])){
	header("location: index.php");//content type defer function, where we redirect the page to the login page
	}

//check for login

?>
<!DOCTYPE html>
<html>
<head>
<title>Login to Ask news</title>
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
              <li><a href="#">About</a></li>
              <li><a href="pages/contact.html">Contact</a></li>
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
            <p>Friday, December 05, 2045</p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="index.php" class="logo"><img src="images/logo.jpg" alt=""></a></div>
          <div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div>
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

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="contact_area">
            <h2>Register</h2>
            <p>Welcome to Ask News</p>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" class="contact_form" method="post">
            <input class="form-control" type="text" placeholder="User Name*" name="user_name">
            <input class="form-control" type="email" placeholder="Email*" name="email">
              <input class="form-control" type="password" placeholder="Password*" name="password">
              <input type="submit" value="Register" name="register">
            </form>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <li>
                <div class="media wow fadeInDown"> <a href="single_page.html" class="media-left"> <img alt="" src="../images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
             
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
  
<?php
include "includes/footer.php";
?>