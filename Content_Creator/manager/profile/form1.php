<div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                        <form class="form-horizontal" method="POST" >
                                            <div class="form-group">
                                                <label for="uname" class="col-sm-2 control-label">User Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" pattern="[a-zA-Z0-9]+" class="form-control" value="<?php echo $row["username"] ?>" id="txtuname" name="txtuname" placeholder="User Name" >
                                                        
                                                    </div>
                                                    <span class="error"><?php echo @$error_username; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="email" class="form-control" value="<?php echo $row["email"] ?>" id="Email" name="email" placeholder="Email" >
                                                    </div>
                                                    <span class="error"><?php echo @$error_email; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Mobile" class="col-sm-2 control-label">Mobile</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php echo $row["mobile"] ?>" pattern="[6|7|8|9][0-9]{9}" id="txtmobile" name="txtmobile"  placeholder="Mobile"></textarea>
                                                    </div>
                                                    <span class="error"><?php echo @$error_mobile; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="In	putSkills" class="col-sm-2 control-label">Bank Name</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" pattern="[a-zA-Z]+" id="txtbname"  <?php if($row["Monetization"]==0){ echo "disabled";} ?> name="txtbname" placeholder="Bank Name">
                                                    </div>
                                                    <span class="error"><?php echo @$error_bname; ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="In	putSkills"  class="col-sm-2 control-label">Account Holder Name</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" pattern="[a-zA-Z]+" class="form-control" id="txtaccountHname" <?php if($row["Monetization"]==0){ echo "disabled";} ?> name="txtaccountHname" placeholder="Account Holder Name">
                                                    </div>
                                                    <span class="error"><?php echo @$error_holderName; ?></span>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="In	putSkills" class="col-sm-2 control-label">Account Number</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" <?php if($row["Monetization"]==0){ echo "disabled";} ?> id="txtaccountno" name="txtaccountno" placeholder="Account Number">
                                                    </div>
                                                    <span class="error"><?php echo @$error_accountNum; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="In	putSkills" <?php //if($row["Monetization"]==0){ echo "disabled";} ?> class="col-sm-2 control-label">IFSC Code</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" pattern="^[A-Za-z]{4}[0]{1}[0-9a-zA-Z]{6}$" class="form-control" <?php if($row["Monetization"]==0){ echo "disabled";} ?> id="txtIfsc" name="txtIfsc" placeholder="IFSC Code">
                                                    </div>
                                                    <span class="error"><?php echo @$error_ifsc; ?></span>
                                                </div>
                                            
                                            
                                            
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="update_profile" class="btn btn-danger">UPDATE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>