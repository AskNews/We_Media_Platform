<div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              Channel Setup
                            </h2>
                        </div>
                        <div class="body">
                            <form>
                                <label>Channel Name</label>
                                <div class="form-group">
                                    <div class="form-line">

                                        <input type="text" id="channelName" readonly="<?php if($channel_setup_status==1){ echo 'readonly';} ?>" value="<?php if(isset($channel_name)){ echo $channel_name;}?>" class="form-control" placeholder="Enter Channel name">
                                    </div>
                                </div>
                                <label>Channel Description</label>
                                <div class="form-group">
                                    <div class="form-line">
                                    <textarea name="description" row="5" <?php if($channel_setup_status==1){ echo 'disabled';} ?>  class="form-control">
                                    <?php if(isset($channel_des)){ echo $channel_des;} ?>
                                    </textarea>

                                    </div>
                                </div>
                               
                                <br>
                                <button type="button" class="btn btn-primary m-t-15 waves-effect">Done</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>