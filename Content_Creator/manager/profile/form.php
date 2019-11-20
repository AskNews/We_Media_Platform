
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
                                <h3><?php echo $row["username"]; ?></h3>
                                
                                <p>Content Creator</p>
                            </div>
                    </div>
                        <div class="profile-footer">
                            <ul>
                                <li>
                                    <span>Followers</span>
                                    <span>1.234</span>
                                </li>
                                <li>
                                    <span>Likes</span>
                                    <span>1.201</span>
                                </li>
                                <li>
                                    <span>Comments</span>
                                    <span>14.252</span>
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
                                                        <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                    </div>
                                                    <span class="error"><?php if(isset($_POST["chang_pass"])){ if($_POST["OldPassword"]!=$row["password"]){ echo "your password is not match with current password";}} ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" pattern="(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"  name="NewPassword" placeholder="New Password" >
                                                    </div>
                                                    <span  class="error">Password must be 6 character long and have alphanumeric and have one special character  </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                <div class="col-sm-9">
                                                    <div class="form-line">
                                                        <input type="password" class="form-control" name="NewPasswordConfirm" placeholder="New Password (Confirm)" >
                                                    </div>
                                                    <span class="error"><?php echo @$error_pass;  ?></span>
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
                                                        <input type="text" class="form-control" pattern="[a-zA-Z]+" id="txtbname"   name="txtbname" placeholder="Bank Name">
                                                    </div>
                                                    <span class="error"><?php echo @$error_bname; ?></span>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="In	putSkills"  class="col-sm-2 control-label">Account Holder Name</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" pattern="[a-zA-Z]+" class="form-control" id="txtaccountHname"  name="txtaccountHname" placeholder="Account Holder Name">
                                                    </div>
                                                    <span class="error"><?php echo @$error_holderName; ?></span>
                                                </div>
                                            </div>
                                            
                                            
                                            <div class="form-group">
                                                <label for="In	putSkills" class="col-sm-2 control-label">Account Number</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" class="form-control"  id="txtaccountno" name="txtaccountno" placeholder="Account Number">
                                                    </div>
                                                    <span class="error"><?php echo @$error_accountNum; ?></span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="In	putSkills" <?php //if($row["Monetization"]==0){ echo "disabled";} ?> class="col-sm-2 control-label">IFSC Code</label>

                                                <div class="col-sm-10">
                                                    <div class="form-line">
                                                        <input type="text" pattern="^[A-Za-z]{4}[0]{1}[0-9a-zA-Z]{6}$" class="form-control"  id="txtIfsc" name="txtIfsc" placeholder="IFSC Code">
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