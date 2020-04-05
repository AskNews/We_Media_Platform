<?php
$type="index";
	include "includes/header.php";
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h3>DASHBOARD</h3>
            <!-- Widgets -->
            <br/>
            <div class="row clearfix">
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-pink">
                            <i class="material-icons ">face</i>
                        </div>
                        <div class="content">
                            <div class="text">FOLLOWER</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $fl ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-blue">
                            <i class="material-icons">trending_up</i>
                        </div>
                        <div class="content">
                            <div class="text">INDEX</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $index; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-indigo">	
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">BALANCE</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $bal; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-lime">
                            <i class="material-icons">list</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL NEWS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $news; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-green">
                            <i class="material-icons ">timelapse</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL PENDING NEWS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $news_p; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-black">
                            <i class="material-icons">remove_red_eye</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL VIEWS</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $views; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-red">
                            <i class="material-icons">favorite</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL LIKES</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $t_like; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            
            <!-- CPU Usage -->
            
            <!-- #END# CPU Usage -->
           
            <div class="row clearfix">
                
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-cyan">
                            <div class="m-b--35 font-bold">LATEST TRENDS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    #socialtrends
                                    <span class="pull-right">
                                        <i class="material-icons">trending_up</i>
                                    </span>
                                </li>
                                <li>
                                    #materialdesign
                                    <span class="pull-right">
                                        <i class="material-icons">trending_up</i>
                                    </span>
                                </li>
                                <li>#adminbsb</li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Latest Social Trends -->
                <!-- Answered Tickets -->
                
                <div class="col-xs-14 col-sm-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="body bg-teal">
                            <div class="font-bold m-b--35">TOP CONTENT CREATORS</div>
                            <ul class="dashboard-stat-list">
                                <li>
                                    <div class="image">
                                                image controls
                                            </div>
                                            <div class="menu-info">
                                                <h4>user name</h4>
                                                <p>
                                                    <i class="material-icons">access_time</i> 14 mins ago
                                                </p>
                                            </div>  
                                </li>
                        </ul>
                        </div>
                    </div>
                </div>
                <!-- #END# Answered Tickets -->
            </div>
            <div class="row clearfix">
            </div>
        </div>
    </section>
<?php
include "includes/footer.php";
?>
