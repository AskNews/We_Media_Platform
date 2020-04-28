<?php
session_start();
$creatorid=0;
$info=null;
$email="";
$warning=null;
$success=null;
$profile_image="";
$uname="";
$wal_amt=0;
$cvv=0;
$card=0;
$approve=0;
$lifetime_amt=0;
$spend_amt=0;
include "../Super_Admin/includes/dbconfig.php";

$sql="SELECT * from tbl_ad_creator WHERE username='$_SESSION[ad_creator_uname]' and status=1";
$query_details=mysqli_query($con,$sql);
if(isset($_SESSION['ad_creator_uname']))
{
    $sql="SELECT * from tbl_ad_creator WHERE username='$_SESSION[ad_creator_uname]' or email='$_SESSION[ad_creator_uname]' and status=1";
    $query=mysqli_query($con,$sql);
    while($data=mysqli_fetch_assoc($query))
    {
        $email=$data["email"];
        $_SESSION['ad_creator_profile']=$data["profile_image"];
        $creatorid=$data["ad_creator_id"];
        $wal_amt=$data['wallet'];
        $lifetime_amt=$data['lifetime_amount'];
        $spend_amt=$data['spend_amount'];
        $cvv=$data['cvv_number'];
        $card=$data['card_number'];
        $approve=$data['approval'];
    }
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
    <link rel="icon" href="../icon.png" type="image/x-icon">
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
        .error{color:red;}
    </style>
</head>

<body class="animsitsion" style="animation-duration: 900ms; opacity: 1;">
    <div class="page-wrapper">
        <aside class="menu-sidebar2">
        <div class="logo">
                    <a href="#">
                        <img src="../logo.png" style="height:100%;width:140%;border:3px solid black;" />
                    </a>
                </div>
        <div class="menu-sidebar2__content js-scrollbar1">
                <div class="account2">
                    <div class="image img-cir img-120">
                        <img src="img/<?php echo $_SESSION['ad_creator_profile']?>" alt="no image" />
                    </div>
                    <h4 class="name"><?php echo $_SESSION['ad_creator_uname']?></h4>
                    <a href="logout.php">Sign out</a>
                </div>
                <nav class="navbar-sidebar2">
                    
                    <ul class="list-unstyled navbar__list">

                        <li <?php echo $type == "index"?'class="active"':'';?>>
                            <a href="index.php">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>


                        <li <?php echo $type == "adunit"?'class="active"':'';?>>
                            <a class="js-arrow" href="#">
                                <i class="fas fas fa-plus-square"></i>Ads 
                                <span class="arrow">
                                    <i class="fas fa-angle-down"></i>
                                </span>
                            </a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                <a href="adunit.php?form">
                                        <i ></i>Create New Ad</a>
                                </li>
                                <li>
                                    <a href="adunit.php?table">
                                        <i ></i>Manage Ad Unit</a>
                                </li>
                            </ul>
                        </li>

                        <li <?php echo $type == "wallet"?'class="active"':'';?>>
                            <a href="wallet.php?wallet">
                                <i class="fas fa-rupee"></i>Wallet</a>
                        </li>

                        <li <?php echo $type == "feedback"?'class="active"':'';?>>
                            <a  href="feedback.php?feedback">
                                <i class="fas fa fa-commenting"></i>Feedback</a>
                        </li>
                        <li <?php echo $type == "qna"?'class="active"':'';?>>
                            <a href="qna.php">
                                <i class="fas fa fa-comments"></i>QNA</a>
                        </li>
                        <li <?php echo $type == "notification"?'class="active"':'';?>>
                            <a  href="notification.php?noti">
                                <i class="fas fa fa-bell"></i>Notification</a>
                        </li>
                        <li <?php echo $type == "rules"?'class="active"':'';?>>
                            <a  href="rules.php?rules">
                                <i class="fas fa fa-gavel"></i>Rules</a>
                        </li>
                    </ul>
                    
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <!-- <img src="images/icon/logo-white.png" alt="CoolAdmin" /> -->
                                </a>
                            </div>
                            <div class="header-button">
                            <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications">
                                        <span class='quantity'><?php echo $noti_count;?></span>
                                        </i>
                                        <a href="javascript:void(0);">
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__title">
                                                <p>You have <?php echo $noti_count; ;?> Notifications</p>
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
                                            <img src="<?php echo "img/".$_SESSION['ad_creator_profile'];?>" width="150" height="150" style="margin-right:15px; margin-top:10px;"  alt="User">
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