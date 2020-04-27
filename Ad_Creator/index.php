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
</div>
</div>
<?php
include 'includes/footer.php';
?>