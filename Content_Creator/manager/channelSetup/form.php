<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Channel Setup
                            </h2>
                        </div>
                        <div class="body">
                            <form method="post">
                                <label>Channel Name</label>
                                <div class="form-group">
                                    <div class="form-line">

                                        <input type="text" id="channelName" name="channelname"  value="<?php if(isset($channel_name)){ echo $channel_name; } ?>" <?php if($channel_setup_status==1){ echo 'disabled';} ?> class="form-control" placeholder="Enter Channel name">
                                    </div>
                                </div>
                                <label>Channel Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    
                                    <textarea name="description" row="5"  <?php if($channel_setup_status==1){ echo 'disabled';} ?>  class="form-control">
                                    <?php if(isset($channel_des)){ echo $channel_des;} ?>
                                    </textarea>

                                    </div>
                                </div>
                               
                                <br>
                                <span class='error'><?php echo @$error_channel; ?></span><br/>
                                <!--<button type="button" class="btn btn-primary m-t-15 waves-effect">Done</button>-->
                                <input type="submit" name="channel_update" value="done" class="btn btn-primary m-t-15 waves-effect">
                            </form>
                        </div>
                    </div>
                </div>
            </div>