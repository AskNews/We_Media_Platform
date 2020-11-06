<?php
$type="wallet";
include "includes/header.php";
include_once "engine/engine.php";
?>
<div class="main-content">
 <div class="container">
 <section class="statistic statistic2">                
    <div class="row">
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
            <div class="statistic__item statistic__item--red">
                <h2 class="number"><?php echo $wal_amt; ?></h2>
                <span class="desc">Current Wallet Amount</span>
                <div class="icon">
                    <i class="zmdi zmdi-money"></i>
                </div>
            </div>
        </div>
    </div>
</section>
 <form method="post" action="./paytm/pgRedirect.php">
<div class="col-lg-9">
<div class="card">
    <div class="card-header">
        <strong>Refill your wallet here</strong>
    </div>
    <div class="card-body card-block">
        <div class="form-group">
            <!-- <label>Amount</label><br/> -->
            your current wallet amout is <font color='red'><b><?php echo $wal_amt; ?></b></font><br/><br/>
            <input class="au-input au-input--full" name="TXN_AMOUNT" type="number" required name="amount"  value="<?php  echo @$_POST['amount']; echo @$_GET['amt']; ?>"   placeholder="Enter your amount here">
        </div>
        <span class="error"><?php echo @$err;?></span>
    </div>
    <div class="card-footer">
        <div class="form-actions form-group">
        <input value="CheckOut" type="submit"  class="btn btn-success btn-sm"	onclick="">
        </div>
        </div>
    </div>
</div>
</div>
</form>


<?php

    // if(isset($_GET['amt']))
    // {
    //     $qry=mysqli_query($con,"select cvv_number as cvv,card_number as card from tbl_ad_creator where id=".$creatorid);
    //     $data=mysqli_fetch_array($qry);
    //     $cvv=$data['cvv'];
    //     $card=$data['card'];
    //     if($card==00 || $card="" || $cvv==0 || $cvv=='')
    //     {
    //         include 'manager/profile/form.php';
    //     }
    //     else{

    //        include "manager/$type/form.php";
    //     }
    // }
    
?>
</div>
</div>
<?php
include "includes/footer.php";
?>