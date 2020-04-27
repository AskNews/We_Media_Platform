<?php
$type="index";
	include "includes/header.php";
?>
<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h3>DASHBOARD</h3>
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
            <div class="row clearfix">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-6">
                                    <h2>NEWS FLOW</h2>
                                </div>
                            </div>
                        </div>
                        <div class="body">
                            <div id="graph">
                            <?php 
                            // $chart=mysqli_query($con,"select * from tbl_news where status=1 and CreatorID=".$creatorid." order by PublishDate"); 
                            echo "select * from tbl_news where status=1 and CreatorID=".$creatorid." order by PublishDate";
                            ?>
                            <script>
                            Morris.Bar({ element: 'graph', 
                            data: <?php echo $data; ?> , 
                            xkey: 'year' ,
                            ykeys: ['purchase', 'sale', 'profit'] , 
                            labels: ['Purchase', 'Sale', 'Profit'] }); 
                            </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
include "includes/footer.php";
?>
