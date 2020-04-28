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
                        <div id="news_graph"></div>
                        <?php 
                        $chart_qry=mysqli_query($con,"select Month,count(month(PublishDate)) NewsCountMonth FROM
                        ( select *,( CASE 
                            WHEN month(PublishDate)=01 THEN 'January'
                            WHEN month(PublishDate)=02 THEN 'February'
                            WHEN month(PublishDate)=03 THEN 'March'
                            WHEN month(PublishDate)=04 THEN 'April' 
                            WHEN month(PublishDate)=05 THEN 'May'
                            WHEN month(PublishDate)=06 THEN 'June' 
                            WHEN month(PublishDate)=07 THEN 'July' 
                            WHEN month(PublishDate)=08 THEN 'August' 
                            WHEN month(PublishDate)=09 THEN 'September' 
                            WHEN month(PublishDate)=10 THEN 'Octuber'
                            WHEN month(PublishDate)=11 THEN 'November' 
                            WHEN month(PublishDate)=12 THEN 'December' 
                            END) AS Month from tbl_news ) AS Result where Approved=1 and CreatorID=".$creatorid." GROUP BY Month order by month(PublishDate)");
                            
                        $arr=array();
                        $i=0;
                        while($row=mysqli_fetch_assoc($chart_qry))
                        {
                            $arr[]=$row;
                            
                        }
                        ?>
                        <script src='js/jquery.min.js'></script>
                        <script src='js/morris.min.js'></script>
                        <script src='js/raphael-min.js'></script>
                        <script type="text/javascript" language="javascript" >
                        Morris.Bar({
                            element:'news_graph',
                            data:<?php echo json_encode($arr); ?>,
                            xkey:'Month',
                            ykeys:['NewsCountMonth'],
                            labels:['News Count']
                        });
                        </script>                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include "includes/footer.php";
?>
