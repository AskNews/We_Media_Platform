<?php
session_start();
include "../Super_Admin/includes/dbconfig.php";
$imgPath="../Super_Admin/image/module_user";
$ses="";
	if(isset($_SESSION['newAdSub-AdminLogin'])||isset($_SESSION['newNewsSub-AdminLogin'])){
	if(isset($_SESSION['newAdSub-AdminLogin'])){
		$ses=$_SESSION['newAdSub-AdminLogin'];
	}else{
		$ses=$_SESSION['newNewsSub-AdminLogin'];
	}
    }
    else{
        header ("location: login.php");
    }
	include "engine/engine.php";

?>
<!doctype html>
<html lang="en">

<head>
	<title>Welcome to Ask News Sub Admin Panel</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!--<link rel="stylesheet" href="assets/vendor/chartist/css/chartist-custom.css">-->
	<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="../icon.png">
	
	<script type="text/javascript">
		function convertToSlug( str ) {
	
  //replace all special characters | symbols with a space
  str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
	
  // trim spaces at start and end of string
  str = str.replace(/^\s+|\s+$/gm,'');
	
  // replace space with dash/hyphen
  str = str.replace(/\s+/g, '-');	
  
  document.getElementById("url").value= str;
  
  //return str;
}
function convertToComa( str1 ) {
	
	//replace all special characters | symbols with a space
	str1 = str1.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();
	  
	// trim spaces at start and end of string
	str1 = str1.replace(/^\s+|\s+$/gm,'');
	  
	// replace space with dash/hyphen
	str1 = str1.replace(/\s+/g, ', ');	
	
	document.getElementById("seo_title").value= str1;
  //return str;
  }
	</script>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand" >
				<a href="index.php"><img src="assets/img/logo-dark.png" style="height:21px;width:90px;"  ></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				
				
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<!--<li class="dropdown">
							<a href="#" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger">5</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>System space is almost full</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-danger"></span>You have 9 unfinished tasks</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Monthly report is available</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-warning"></span>Weekly meeting in 1 hour</a></li>
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>Your request has been approved</a></li>
								<li><a href="#" class="more">See all notifications</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>-->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?php echo $imgPath."/".$data['image']; ?>" class="img-circle" alt="Avatar"> <span><?php echo $data['user_name'];?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="profile.php"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
					<ul class="nav">
					<li><a href="index.php" <?php echo $type == "index"?'class="active"':'';?>><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
					
					<?php
					if($_SESSION['role']==0){
					?>
					<li><a href="content_creator.php" <?php echo $type == "content_creator"?'class="active"':'';?>><i class="fa fa-users"></i> <span>Content Creator</span></a></li>
					<li><a href="news.php" <?php echo $type == "news"?'class="active"':'';?>><i class="fa fa-newspaper-o"></i> <span> News</span></a></li>
					<li><a href="feedback.php" <?php echo $type == "feedback"?'class="active"':'';?>><i class="fa fa-commenting"></i> <span>Feedback</span></a></li>
					<li><a href="qna.php" <?php echo $type == "qna"?'class="active"':'';?>><i class="fa fa-question-circle-o"></i> <span>QNA</span></a></li>
					
					<?php
					}else{
					?>	
					
					<li><a href="ad_creator.php" <?php echo $type == "ad_creator"?'class="active"':'';?>><i class="fa fa-users"></i> <span>Ad Creator</span></a></li>
					<li><a href="ads.php" <?php echo $type == "ads"?'class="active"':'';?>><i class="fa fa-adn"></i> <span>Ads</span></a></li>
					
					<li><a href="feedback.php" <?php echo $type == "feedback"?'class="active"':'';?>><i class="fa fa-commenting"></i> <span>Feedback</span></a></li>
					<li><a href="qna.php" <?php echo $type == "qna"?'class="active"':'';?>><i class="fa fa-question-circle-o"></i> <span>QNA</span></a></li>
					
					<?php
					}
					?>
                       
					</ul>
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->