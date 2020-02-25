<section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
            <?php  $data="select * from tbl_content_creator where id=".$creatorid;
            $result=mysqli_query($con,$data);
            while($row=mysqli_fetch_assoc($result)){ ?>
                    <div class="card profile-card">
                        <div class="profile-header">&nbsp;</div>
                        <div class="profile-body">
                            <div class="image-area">
                                <img src=<?php echo "img/".$row["channel_logo"]; ?> alt="AdminBSB - Profile Image" height="150px" width="150px" />
                            </div>
                            <div class="content-area">
                                <h3><?php echo $row["username"];?></h3>
                                <p>Content Creator</p>
                            </div>
                    </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Followers</span>
                                    <span><?php echo $follower ?></span>
                                </li>
                                <li>
                                    <span>Likes</span>
                                    <span><?php echo $like ?></span>
                                </li>
                                <li>
                                    <span>Comments</span>
                                    <span><?php echo $comment; ?></span>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-9">
                    <div class="card">
                        <div class="body">
                            <div>
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings"  role="tab" data-toggle="tab">Profile Settings</a></li>
                                    <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                </ul>
                                <div class="tab-content">
                                <?php
                                //if(isset($_POST['change_pass'])){
                                ?>
                                    <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                        <form class="form-horizontal" method="POST" >
                                            <div class="form-group">
                                                <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" id="OldPassword" value="<?php echo @$_POST['OldPassword'] ?>" name="OldPassword" placeholder="Old Password"  required>
                                                    </div>
                                <span class="error"><?php echo @$error_old; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" value="<?php echo @$_POST['NewPassword'] ?>" title="Your password must contains alphanumeric character"  class="form-control" name="NewPassword" placeholder="New Password" >
                                                    </div>
                                                    <span class="error"><?php echo @$error_pass;  ?></span>
                                                </div>
                                                
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" name="NewPasswordConfirm" value="<?php echo @$_POST['NewPasswordConfirm'] ?>" placeholder="New Password (Confirm)" >
                                                    </div>
                                                    <span class="error"><?php echo @$error_cpass;  ?></span>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" href="#change_password_settings" name="change_pass" class="btn btn-danger">CHANGE PASSWORD</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                //}
                                    ?>
                                    <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                        <form class="form-horizontal" method="POST" enctype="multipart/form-data" >
                                            <div class="form-group">
                                                <label for="uname" class="col-sm-2 control-label">User Name</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" pattern="[a-zA-Z0-9]+" class="form-control" value="<?php if(isset($_POST['update_profile'])){ echo $_POST['txtuname'];}else{echo $row["username"];} ?>" id="txtuname" name="txtuname" placeholder="User Name" >
                                                        
                                                    </div>
                                                    <span class="error"><?php echo @$error_username; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="Email" class="col-sm-2 control-label">Email</label>
                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control" value="<?php if(isset($_POST['update_profile'])){echo $_POST['email'];}else{echo $row["email"];} ?>" id="Email" name="email" placeholder="Email" >
                                                    </div>
                                                    <span class="error"><?php echo @$error_email; ?></span>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label for="Mobile" class="col-sm-2 control-label">Mobile</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                         <input type="text" class="form-control" value="<?php if(isset($_POST['update_profile'])){echo $_POST['txtmobile'];}else{echo $row["mobile"];} ?>"  id="txtmobile" name="txtmobile"  placeholder="Mobile"></textarea>
                                                    </div>
                                                    <span class="error"><?php echo @$error_mobile; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="file" class="col-sm-2 control-label">Profile</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="file" class="form-control"  name="file">
                                                    </div>
                                                    <span class="error"><?php echo @$errorForFile; ?></span>
                                                </div>
                                            </div>
                                            
                                            <?php if(@$row["Monetization"]==1){?>
                                            <div class="form-group">
                                                <label for="In	putSkills" class="col-sm-2 control-label">Bank Name</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <!--<input type="text" class="form-control" pattern="[a-zA-Z]+" id="txtbname"  value="<?php //if(isset($_POST['update_profile'])){echo $_POST['txtbname'];}else{echo $row["bank_name"];} ?>"  name="txtbname" placeholder="Bank Name">-->
                                                        <select class="form-control show-tick" value="" name='status'  id='status'>
                                        <option>--Select Bank--</option>
                                        <option value="axis">Axis Bank</option>
                                        <option value="bob">Bank of Baroda</option>
                                        <option value="sbi">State Bank of India</option>
                                        <option value="kotak">Kotak Bank</option>
                                        <option value="union">Union Bank</option>
                                        <option value="pnb">Punjab Nation Bank</option>
                                        </select>
                                                    </div>
                                                    <span class="error"><?php echo @$error_bname; ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="In	putSkills"  class="col-sm-2 control-label">Account Holder Name</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" pattern="[a-zA-Z]+" class="form-control" id="txtaccountHname" value="<?php if(isset($_POST['update_profile'])){echo $_POST['txtaccountHname'];}else{echo $row["account_holder_name"];} ?>"  name="txtaccountHname" placeholder="Account Holder Name">
                                                    </div>
                                                    <span class="error"><?php echo @$error_holderName; ?></span>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="In	putSkills" class="col-sm-2 control-label">Account Number</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  id="txtaccountno" name="txtaccountno" placeholder="Account Number" value="<?php if(isset($_POST['update_profile'])){echo $_POST['txtaccountno'];}else{echo $row["bank_account_number"];} ?>">
                                                    </div>
                                                    <span class="error"><?php echo @$error_accountNum; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="In	putSkills" <?php //if($row["Monetization"]==0){ echo "disabled";} ?> value="<?php if(isset($_POST['update_profile'])){echo $_POST['txtaccountno'];}else{echo $row["ifsc_code"];} ?>" class="col-sm-2 control-label">IFSC Code</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" pattern="^[A-Za-z]{4}[0]{1}[0-9a-zA-Z]{6}$" class="form-control"  id="txtIfsc" name="txtIfsc"   value="<?php if(isset($_POST['update_profile'])){echo $_POST['txtIfsc'];}else{echo $row["ifsc_code"];} ?>" placeholder="IFSC Code">
                                                    </div>
                                                    <span class="error"><?php echo @$error_ifsc; ?></span>
                                                </div>
                                            
                                            
                                            
                                            <div class="form-group">
                                            <?php }?>
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" name="update_profile" class="btn btn-danger">UPDATE</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <?php
                                //}
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
          
        </div>
</section>