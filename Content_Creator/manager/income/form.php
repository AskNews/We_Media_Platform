                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-green">
                            <i class="material-icons ">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">BALANCE</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $bal ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-orange ">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">LAST WITHDRAW AMOUNT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $last_withdraw; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box hover-zoom-effect">
                        <div class="icon bg-red">
                            <i class="material-icons">attach_money</i>
                        </div>
                        <div class="content">
                            <div class="text">TOTAL WITHDRAW AMOUNT</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $ttl_withdraw?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                
        </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               Make Transaction
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post" action="" >
                                <label>Transfer Amount</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="amount" name="amount" class="form-control" value="<?php echo @$_POST['amount']?>" placeholder="Enter amount to transfer">
                                        
                                    </div>
                                    <span class='error'><?php echo @$err;?><span>
                                </div>
                                <br>
                                <button type="submit" name="transaction" class="btn btn-primary m-t-15 waves-effect">Done</button>
                            </form>
                        </div>
                    </div>
                </div>