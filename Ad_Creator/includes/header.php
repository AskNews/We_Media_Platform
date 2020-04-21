<?php
session_start();
$creatorid=0;
$info=null;
$email="";
$warning=null;
$success=null;
$profile_image="";
$uname="";
include "../Super_Admin/includes/dbconfig.php";


$sql="SELECT * from tbl_ad_creator WHERE username='$_SESSION[ad_creator_uname]' and status=1";
echo $sql;
$query_details=mysqli_query($con,$sql);
if(isset($_SESSION['ad_creator_uname']))
{
    echo "hello from session";
    $sql="SELECT * from tbl_ad_creator WHERE username='$_SESSION[ad_creator_uname]' and status=1";
    echo $sql;
    $query=mysqli_query($con,$sql);
    //echo $query;
   //$r=mysqli_fetch_array($query);
   //print_r($r);
    while($data=mysqli_fetch_assoc($query))
    {
        $email=$data["email"];
        $_SESSION['ad_creator_profile']=$data["profile_image"];
        $creatorid=$data["ad_creator_id"];
    }
    //echo    $_SESSION['ad_creator_profile'];
}

else
{
    header ("location: login.php");
}

$noti=mysqli_query($con,"select count(id) as c from tbl_notification where role=1 and user_id=".$creatorid." and is_seen=0");
$noti_count=mysqli_fetch_array($noti);
$noti_count=$noti_count['c'];

include "engine/engine.php";
?>

<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Welcome To Asknews</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

    <style type="text/css">
        /* Chart.js */
        @-webkit-keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        @keyframes chartjs-render-animation {
            from {
                opacity: 0.99
            }

            to {
                opacity: 1
            }
        }

        .chartjs-render-monitor {
            -webkit-animation: chartjs-render-animation 0.001s;
            animation: chartjs-render-animation 0.001s;
        }
    </style>
</head>

<body class="animsition" style="animation-duration: 900ms; opacity: 1;">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/logo.png" alt="AskNews">
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub"<?php echo $type == "index"?'class="active"':'';?>>
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fas fa-desktop"></i>Ad Unit</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="adunit.php">Create New Ad</a>
                                </li>
                                <li>
                                    <a href="manage_ad_unit.html">Manage Ad Unit</a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fas fa-desktop"></i>Ad Unit Balance</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="create_ad.php">Account Balance</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub" <?php echo $type == "feedback"?'class="active"':'';?>>
                            <a class="js-arrow" href="feedback.php?feedback">
                                <i class="fas fa fa-commenting"></i>Feedback</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="qna.php">
                                <i class="fas fa fa-comments"></i>QNA</a>
                        </li>
                        <li class="has-sub" <?php echo $type == "noti"?'class="active"':'';?>>
                            <a class="js-arrow" href="notification.php?noti">
                                <i class="fas fa fa-bell"></i>Notification</a>
                        </li>
                        <li class="has-sub"  <?php echo $type == "rules"?'class="active"':'';?>>
                            <a class="js-arrow" href="rules.php?rules">
                                <i class="fas fa fa-gavel"></i>Rules</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Help</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Contact-us</a>
                        </li>

                    

                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/logo.png" alt="Cool Admin">
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1 ps">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fas fa-desktop"></i>Ad Unit</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="adunit.php">Create New Ad</a>
                                </li>
                                <li>
                                    <a href="manage_ad_unit.php">Manage Ad Unit</a>
                                </li>
                                
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fas fa-desktop"></i>Ad Unit Balance</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">Account Balance</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub" <?php echo $type == "feedback"?'class="active"':'';?>>
                            <a class="js-arrow" href="feedback.php?feedback">
                                <i class="fas fa fa-commenting"></i>Feedback</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="qna.php">
                                <i class="fas fa fa-comments"></i>QNA</a>
                        </li>
                        <li class="has-sub" <?php echo $type == "noti"?'class="active"':'';?>>
                            <a class="js-arrow" href="notification.php?noti">
                                <i class="fas fa fa-bell"></i>Notification</a>
                        </li>
                        <li class="has-sub"  <?php echo $type == "rules"?'class="active"':'';?>>
                            <a class="js-arrow" href="rules.php?rules">
                                <i class="fas fa fa-gavel"></i>Rules</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-info-circle"></i>Help</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-phone"></i>Contact-us</a>
                        </li>
                    </ul>
                </nav>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                        <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>

                            <div class="header-button">
                            <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <a href="javascript:void(0);">
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have <?php echo $noti_count;?> Notifications</p>
                                            </div>
                                            <div class="notifi__footer">
                                                <a href="notification.php?noti">All notifications</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="<?php echo "img/".$_SESSION['ad_creator_profile'];?>" width="80" height="80" alt="User">
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION['ad_creator_uname'];?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="<?php echo "img/".$_SESSION['ad_creator_profile']; ?>" width="80" height="80" alt="User">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo $_SESSION['ad_creator_uname'];?></a>
                                                    </h5>
                                               </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item" <?php echo $type == "profile"?'class="active"':'';?>>
                                                    <a href="profile.php?update_profile">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>

                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->