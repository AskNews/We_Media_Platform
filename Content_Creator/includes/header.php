<?php

session_start();
$channel_setup_status=0;
include "../Super_Admin/includes/dbconfig.php";
	if(isset($_SESSION['content_creator_uname'])){
        $sql="select ChannelName,ChannelDescription from tbl_content_creator where username=$_SESSION[content_creator_uname]";
        $query=mysqli_query($con,$sql);
        @$data=mysqli_fetch_assoc($query);
        
        if(strlen($data["ChannelName"])>0 and strlen($data["ChannelDescription"])>0 )
        {
            $channel_setup_status=1;
        }
        else
        {
            $channel_setup_status=0;
        }
    }
    else{
        header ("location: login.php");
    }
?>
<html>
<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To AskNews</title>
    <!-- Favicon-->
    <link rel="icon" href="../icon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

     <!-- Sweet Alert Css -->
     <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- JQuery DataTable Css -->
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />

    <!-- Wait Me Css -->
    <link href="plugins/waitme/waitMe.css" rel="stylesheet" />

    <!-- Bootstrap Select Css -->
    <link href="plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-red">
<nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">CONTENT CREATOR</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <!--<li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>-->
                    <!-- #END# Call Search -->
                    <!-- Notifications -->
                    <li class="dropdown"> 
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count">7</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICATIONS</li>
                            <li class="body">
                                <ul class="menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <div class="icon-circle bg-light-green">
                                                <i class="material-icons">person_add</i>
                                            </div>
                                            <div class="menu-info">
                                                <h4>12 new members joined</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                               
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">View All Notifications</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                    <!-- Tasks -->
                   
                    <!-- #END# Tasks -->
                    
                </ul>
            </div>
        </div>
    </nav>


<section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo "img/".$_SESSION['content_creator_profile']; ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['content_creator_uname'];?></div>
                    <div class="email"><?php echo $_SESSION['content_creator_uname'];?></div>
                   
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <!--<li class="header">MAIN NAVIGATION</li>-->
                    <li <?php echo $type == "index"?'class="active"':'';?>> 
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    
                    
                    <li <?php echo $type == "profile"?'class="active"':'';?>>
                        <?php <a href='profile.php?update_profile'>
                            <i class="material-icons">account_circle</i>
                            <span>profile</span>
                        </a>
                        
                    </li>    
                    <li <?php echo $type == "news"?'class="active"':'';?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">receipt</i>
                            <span>News</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
							
                                <a href="news.php?c_news">Add News</a>
                            </li>
                            <li>
                                <a href="news.php?m_news">Manage News</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li <?php echo $type == "post"?'class="active"':'';?>>
                        <a href="post.php?all_post">
                            <i class="material-icons">library_books</i>
                            <span>Post</span>
                        </a>
                    </li>
                    <li <?php echo $type == "income"?'class="active"':'';?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">attach_money</i>
                            <span>Income</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
							
                                <a href="income.php?earnNtransaction">Earning & Transaction</a>
                            </li>
                            <li>
                                <a href="income.php?history">Transaction History</a>
                            </li>
                            
                        </ul>
                    </li>
                    <li <?php echo $type == "comment"?'class="active"':'';?>>
                        <a href="comment.php?comment">
                            <i class="material-icons">comment</i>
                            <span>Comment</span>
                        </a>
                    </li>
                    <li>
                        <a href="pages/typography.html">
                            <i class="material-icons">notifications</i>
                            <span>Notification</span>
                        </a>
                    </li>
                    <!--<li>
                         <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">attach_money</i>
                            <span>Transaction</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
							
                                <a href="pages/ui/alerts.html">Make transaction</a>
                            </li>
                            <li>
                                <a href="pages/ui/animations.html">Histroy</a>
                            </li>
                            
                        </ul>
                    </li>-->
                    <li>
                        <a href="pages/typography.html">
                            <i class="material-icons">edit</i>
                            <span>Feedback</span>
                        </a>
                    </li>
                      <li>
                        <a href="logout.php">
                            <i class="material-icons">input</i>
                            <span>Logout</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
       
       
       
    </section>

