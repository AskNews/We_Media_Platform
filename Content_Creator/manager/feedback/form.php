<form method="post" action="#" enctype="multipart/form-data" >
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    SEND FEEDBACK
                </h2>           
                <br/>
                <a href="feedback.php?showfeed" role="buttton" class="btn btn-success  waves-effec" >SHOW FEEDBACK</a>
            </div>      
        <div class="body">
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <select class="form-control show-tick"  name="category">
                            <option value="">--Feedack Category--</option>
                                <option value="10">10</option>
                            </select>
                        </div>    
                        <span id="error_category" class="error"></span>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" name="message" class="form-control" placeholder="Please type what you want..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="file" name="file">
                                </div>
                                <span class="error" ><?php echo @$error; ?></span>
                            </div>
                        </div>
                    </div>

                        <button type="submit"  name="btn_send" class="btn btn-primary waves-effect">SEND</button>
                </div>
            </div>
        </div>
</div>
</form>

