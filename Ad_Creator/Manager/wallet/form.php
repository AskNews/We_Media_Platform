  
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
<form method="post"  enctype="multipart/form-data" >
<div class="col-lg-8">
<div class="card">
    <div class="card-header">
        <strong>MY WALLET</strong>
    </div>
    <div class="card-body card-block">
        
                <div class="form-group">
                <span>Ad Amount to refill your wallet</span>
                    <input type="text" name="wallet_amt" value=<?php if(isset($_POST['wallet_amt'])) { echo $_POST['wallet_amt']; } else { echo $wal_amt; } ?> class="form-control">
            </div>
        
                <span class="error" ><?php echo @$error_wallet; ?></span>
        </form>
    </div>
    <div class="card-footer">
    <div class="form-actions form-group">
                <button type="submit" name="updt_wallet" class="btn btn-success btn-sm">Refill Wallet</button>
            </div>
    </div>
</div>
</div>

