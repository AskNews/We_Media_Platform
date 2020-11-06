
<?php
session_start();
$channel_setup_status=0;
$channel_name="";
$channel_des="";
$creatorid=0;
$info=null;
$email="";
$warning=null;
$success=null;
$channel_logo="";
$uname="";
$mon=0;
$approve_account=0;


include "../Super_Admin/includes/dbconfig.php";


$sql="SELECT * from tbl_content_creator WHERE username='$_SESSION[content_creator_uname]' or email='$_SESSION[content_creator_uname]' and Status=1";
$query_details=mysqli_query($con,$sql);
if(isset($_SESSION['content_creator_uname']))
{
    $sql="SELECT * from tbl_content_creator WHERE username='$_SESSION[content_creator_uname]' or email='$_SESSION[content_creator_uname]' and Status=1";
    $query=mysqli_query($con,$sql);
    while($data=mysqli_fetch_assoc($query_details))
    {
        $email=$data["email"];
        $mon=$data["Monetization"];
        $_SESSION['content_creator_profile']=$data["channel_logo"];
        $creatorid=$data["id"];
        $approve_account=$data['AccountApproval'];
        if(strlen($data["ChannelName"])>0 && strlen($data["ChannelDescription"])>0 ) 
        {
            $channel_name=$data["ChannelName"];   
            $channel_des=$data["ChannelDescription"];
            $channel_setup_status=1;
            
            
        }
        else
        {
            $channel_setup_status=0;
        }
    }
}

else
{
    header ("location: login.php");
}

$noti=mysqli_query($con,"select count(id) as c from tbl_notification where role=0 and user_id=".$creatorid." and is_seen=0");
$noti_count=mysqli_fetch_array($noti);
$noti_count=$noti_count['c'];

$fl_count=mysqli_query($con,"select count(f.id) as follower from tbl_follower f, tbl_content_creator c where f.content_creator_id=c.id and c.id=".$creatorid);
$fl=mysqli_fetch_array($fl_count);
$fl=$fl['follower'];

$i_count=mysqli_query($con,"select index_point as ip from tbl_content_creator where id=".$creatorid);
//echo "select index_point as ip from tbl_content_creator where id=".$creatorid;
$index=mysqli_fetch_array($i_count);
$index=$index['ip'];

$bal_count=mysqli_query($con,"select earnings as bal from tbl_content_creator where id=".$creatorid);
$bal=mysqli_fetch_array($bal_count);
$bal=$bal['bal'];

$n_count=mysqli_query($con,"select count(id) as news from tbl_news where CreatorID=".$creatorid);
$news=mysqli_fetch_array($n_count);
$news=$news['news'];

$n_p_count=mysqli_query($con,"select count(id) as news from tbl_news where Approved=0 and CreatorID=".$creatorid);
$news_p=mysqli_fetch_array($n_p_count);
$news_p=$news_p['news'];

$v_count=mysqli_query($con,"select sum(Views) as view from tbl_news where Approved=1 and CreatorID=".$creatorid);
$views=mysqli_fetch_array($v_count);
$views=$views['view'];

$l_count=mysqli_query($con,"select count(id) as l from tbl_like where news_id in (select id from tbl_news where CreatorID in(select id from tbl_content_creator where id=".$creatorid."))");
$t_like=mysqli_fetch_array($l_count);
$t_like=$t_like['l'];

$ttl_with=mysqli_query($con,"select life_time_withdraw_amt lf from tbl_content_creator where id=".$creatorid);
$ttl_withdraw=mysqli_fetch_array($ttl_with);
$ttl_withdraw=$ttl_withdraw['lf'];

$last_with=mysqli_query($con,"select withdraw_amt wa from tbl_transaction where content_creator_id=".$creatorid." order by c_date desc limit 1");
$last_withdraw=mysqli_fetch_array($last_with);
@$last_withdraw=$last_withdraw['wa'];

include "engine/engine.php";
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
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <link href="css/styles-pie.css" rel="stylesheet" />
    <!-- script for replacement of whitespace with - and , -->
    <script src="js/canvasjs.min.js"></script>
    
<head>
<script src="js/highcharts.js"></script>
<script src="js/exporting.js"></script>
<script src="js/export-data.js"></script>
<script src="js/accessibility.js"></script>

<style>
    .error{color:red;}
    .highcharts-figure, .highcharts-data-table table {
    min-width: 310px; 
    max-width: 800px;
    margin: 1em auto;
}

#container {
    height: 400px;
}

.highcharts-data-table table {
	font-family: Verdana, sans-serif;
	border-collapse: collapse;
	border: 1px solid #EBEBEB;
	margin: 10px auto;
	text-align: center;
	width: 100%;
	max-width: 500px;
}
.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}
.highcharts-data-table th {
	font-weight: 600;
    padding: 0.5em;
}
.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
    padding: 0.5em;
}
.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}
.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>
<script type="text/javascript">

</script>
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
                <!-- #END# Call Sx`x`earch -->
                <!-- Notifications -->
                <li class="dropdown"> 
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <span class="label-count"><?php echo $noti_count; ?></span>
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
                                            <h4><?php echo $noti_count." New Notification";?></h4>
         
                                        </div>
                                    </a>
                                </li>
                            
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="notification.php?noti">View All Notifications</a>
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
                    <img src="<?php echo "img/".$_SESSION['content_creator_profile']; ?>" width="80" height="80" alt="User" />
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
                    
                    <li <?php echo $type == "index"?'class="active"':'';?>> 
                        <a href="index.php">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li <?php echo $type == "profile"?'class="active"':'';?>>
                        <a href='profile.php?update_profile'>
                            <i class="material-icons">account_circle</i>
                            <span>profile</span>
                        </a>
                    </li>
                    <?php if($_SESSION['content_creator_profile'] && $channel_setup_status==0)
                    {?>
                    <li <?php echo $type == "channel"?'class="active"':'';?>>
                        <a href="channel_setup.php?channelSetup">
                            <i class="material-icons">build</i>
                            <span>Channel Setup</span>
                        </a>
                    </li>    
                    <?php } ?>
                    <?php if($approve_account==1){ ?>
                    <li <?php echo $type == "news"?'class="active"':'';?>>
                    <a href="news.php?c_news">
                            <i class="material-icons">receipt</i>
                            <span>Add News</span>
                        </a>
                    </li>
                    <li <?php echo $type == "m_news"?'class="active"':'';?>>
                    <a href="news.php">
                            <i class="material-icons">receipt</i>
                            <span>Manage News</span>
                        </a>
                    </li>
                    <?php } ?>
                    <!-- <li <?php echo $type == "m_news"?'class="active"':'';?> >
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">receipt</i>
                            <span>News</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="news.php?c_news">Add News</a>
                            </li>
                            <li>
                                <a href="news.php">Manage News</a>
                            </li>
                        </ul>
                    </li> -->

                    <?php if($mon==1){?> 
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
                         <?php } ?>
                         <?php if($approve_account==1) { ?>
                    <li <?php echo $type == "comment"?'class="active"':'';?>>
                        <a href="comment.php?comment">
                            <i class="material-icons">comment</i>
                            <span>Comment</span>
                        </a>
                    </li>
                         <?php } ?>
                    
                    <li <?php echo $type == "feedback"?'class="active"':'';?>>
                        <a href="feedback.php?feedback">
                            <i class="material-icons">edit</i>
                            <span>FeedBack</span>
                        </a>
                    </li>
					<li <?php echo $type == "qna"?'class="active"':'';?>>
                        <a href="qna.php?qna">
                            <i class="material-icons">question_answer</i>
                            <span>QNA</span>
                        </a>
                    </li>
					<li <?php echo $type == "rules"?'class="active"':'';?>>
                        <a href="rules.php?rules">
                            <i class="material-icons">gavel</i>
                            <span>Rules</span>
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
            
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar --> 
    </section>