<?php
$type="index";
include 'includes/header.php';
?>
<?php
$qry_ttl_ad=mysqli_query($con,"select count(ad_id) as ttl_ad from tbl_adunit where approve=1  and ad_creator_id=".$creatorid);
$qry_ttl_pen_ad=mysqli_query($con,"select count(ad_id) as ttl_pen_ad from tbl_adunit where approve=0  and ad_creator_id=".$creatorid);
$ttl_ad=mysqli_fetch_array($qry_ttl_ad);
$ttl_ad=$ttl_ad['ttl_ad'];
$ttl_pen_ad=mysqli_fetch_array($qry_ttl_pen_ad);
$ttl_pen_ad=$ttl_pen_ad['ttl_pen_ad'];
?>
<div class="main-content">
<div class="container">
<section class="statistic statistic2">                
    <div class="row">
    
    <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--blue">
                <h2 class="number"><?php echo $ttl_ad; ?></h2>
                <span class="desc">Total Ads</span>
                <div class="icon">
                    <i class=""></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--red">
                <h2 class="number"><?php echo $ttl_pen_ad; ?></h2>
                <span class="desc">Total Pending Ads</span>
                <div class="icon">
                    <i class=""></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--green">
                <h2 class="number"><?php echo $lifetime_amt; ?></h2>
                <span class="desc">Total Lifetime Deposite Amount</span>
                <div class="icon">
                    <i class="zmdi zmdi-money"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--orange">
                <h2 class="number"><?php echo $spend_amt; ?></h2>
                <span class="desc">Total Spend Amount</span>
                <div class="icon">
                    <i class="zmdi zmdi-money"></i>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="statistic__item statistic__item--green">
                <h2 class="number"><?php echo $wal_amt; ?></h2>
                <span class="desc">Current Wallet Amount</span>
                <div class="icon">
                    <i class="zmdi zmdi-money"></i>
                </div>
            </div>
        </div>
    </div>
</section>      
<section>
    <div class="section__content section__content--p100">
        <div class="container-fluid">
        <div class="row">
        <div class="col-xl-8">
                                <div class="recent-report2">
                                    <h3 class="title-3">Month wise Ads</h3>
                                    <div class="recent-report__chart">
                                    <div id="ad_graph"></div>
                                    <?php 
                        $chart_qry=mysqli_query($con,"select Month,count(month(publish_date)) AdsCountMonth FROM
                        ( select *,( CASE 
                            WHEN month(publish_date)=01 THEN 'January'
                            WHEN month(publish_date)=02 THEN 'February'
                            WHEN month(publish_date)=03 THEN 'March'
                            WHEN month(publish_date)=04 THEN 'April' 
                            WHEN month(publish_date)=05 THEN 'May'
                            WHEN month(publish_date)=06 THEN 'June' 
                            WHEN month(publish_date)=07 THEN 'July' 
                            WHEN month(publish_date)=08 THEN 'August' 
                            WHEN month(publish_date)=09 THEN 'September' 
                            WHEN month(publish_date)=10 THEN 'Octuber'
                            WHEN month(publish_date)=11 THEN 'November' 
                            WHEN month(publish_date)=12 THEN 'December' 
                            END) AS Month from tbl_adunit ) AS Result where approve=1 and ad_creator_id=".$creatorid." GROUP BY Month");
                        $arr=array();
                        while($row=mysqli_fetch_array($chart_qry))
                        {
                            $arr[]=$row;
                        }
                        ?>
                        <script src='js/jquery.min.js'></script>
                        <script src='js/morris.min.js'></script>
                        <script src='js/raphael-min.js'></script>
                        <script type="text/javascript" language="javascript" >
                        Morris.Bar({
                            element:'ad_graph',
                            data:<?php echo json_encode($arr); ?>,
                            xkey:'Month',
                            ykeys:['AdsCountMonth'],
                            labels:['Ads Count']
                        });
                        </script>                            
                                    </div>
                                </div>
        </div>
        </div>
    </div>
</section>
                                
</div>
</div>
<?php
include 'includes/footer.php';
?>