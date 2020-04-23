
        <div class="container-fluid">
            <div class="row">
                
                <?php  $data="select * from tbl_ad_creator where ad_creator_id=".$creatorid;
                         $result=mysqli_query($con,$data);
                            while($row=mysqli_fetch_assoc($result)){ ?>
                    
                
							<div class="col-lg-10">
								<div class="card">
									<div class="card-header">
										<h4>Your Details</h4>
									</div>
									<div class="card-body">
										<div class="default-tab">
											<nav>
												<div class="nav nav-tabs" id="nav-tab" role="tablist">
													<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#profile_settings" role="tab" aria-controls="nav-home"
													 aria-selected="true">Update Profile</a>
													<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#change_password_settings" role="tab" aria-controls="nav-profile"
													 aria-selected="false">Change Password</a>
												</div>
											</nav>
											<div class="tab-content pl-3 pt-2" id="nav-tabContent">
												<div class="tab-pane fade show active" id="profile_settings" role="tabpanel" aria-labelledby="nav-home-tab">
                                                <form action="" method="post" class="">
                                            <div class="form-group">
                                            <br/><span>User Name</span>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </div>
                                                    <input type="text" pattern="[a-zA-Z0-9]+" value="<?php if(isset($_POST['update_profile'])){ echo $_POST['txtuname'];}else{echo $row["username"];} ?>" id="txtuname" name="txtuname" placeholder="Username" class="form-control">
                                                </div>
                                                <span class="error"><?php echo @$error_username; ?></span>
                                            </div>
                                            <div class="form-group">
                                            <span>Email</span>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-envelope"></i>
                                                    </div>
                                                    <input type="email" value="<?php if(isset($_POST['update_profile'])){echo $_POST['email'];}else{echo $row["email"];} ?>" id="Email" name="email" placeholder="Email" class="form-control">
                                                </div>
                                                <span class="error"><?php echo @$error_email; ?></span>
                                            </div>
                                            <div class="form-group">
                                            <span>Mobile Number</span>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-phone-square"></i>
                                                    </div>
                                                    <input type="text" value="<?php if(isset($_POST['update_profile'])){echo $_POST['txtmobile'];}else{echo $row["phone"];} ?>"  id="txtmobile" name="txtmobile" placeholder="Mobile" class="form-control">
                                                </div>
                                                <span class="error"><?php echo @$error_mobile; ?></span>
                                            </div>
                                            <div class="form-group">
                                            <span>User Profile</span>
                                             <div class="input-group">
                                             <div class="input-group-addon">
                                                        <i class="fa fa-folder"></i>
                                                    </div>
                                                    <input type="file" id="file" name="file" class="form-control">
                                                </div>
                                                <span class="error"><?php echo @$errorForFile; ?></span>
                                             </div>
                                             <div class="form-group">
                                             <span>CVV Number</span>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-phone-square"></i>
                                                    </div>
                                                    <input type="text" value="<?php if(isset($_POST['update_profile'])){echo $_POST['cvv'];}else{echo $row["cvv_number"];} ?>"  id="cvv" name="cvv" placeholder="CVV  Number" class="form-control">
                                                </div>
                                                <span class="error"><?php echo @$error_cvv; ?></span>
                                            </div>
                                             <div class="form-group">
                                             <span>Card Number</span>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-phone-square"></i>
                                                    </div>
                                                    <input type="text" value="<?php if(isset($_POST['update_profile'])){echo $_POST['card'];}else{echo $row["card_number"];} ?>"  id="card" name="card" placeholder="Card  Number" class="form-control">
                                                </div>
                                                <span class="error"><?php echo @$error_card; ?></span>
                                            </div>
                                            <div class="form-group">
                                            <span>Wallet Amount</span>
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-phone-square"></i>
                                                    </div>
                                                    <input type="text" value="<?php if(isset($_POST['update_profile'])){echo $_POST['wallet'];}else{echo $row["wallet"];} ?>"  id="wallet" name="wallet" placeholder="Wallet Amount" class="form-control">
                                                </div>
                                                <span class="error"><?php echo @$error_wallet; ?></span>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" name="update_profile" class="btn btn-success btn-sm">Update</button>
                                            </div>
                                           </form>
												</div>
										<div class="tab-pane fade" id="change_password_settings" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <form action="" method="POST" class="">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-lock"></i>
                                                    </div>
                                                    <input type="password" id="OldPassword" value="<?php echo @$_POST['OldPassword'] ?>" name="OldPassword" placeholder="Old-Password" class="form-control" required>
                                                </div>
                                                <span class="error"><?php echo @$error_old; ?></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-lock"></i>
                                                    </div>
                                                    <input type="password" id="NewPassword" value="<?php echo @$_POST['NewPassword'] ?>" title="Your password must contains alphanumeric character" placeholder="New-Password"  class="form-control" name="NewPassword">
                                                </div>
                                                <span class="error"><?php echo @$error_pass;  ?></span>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-lock"></i>
                                                    </div>
                                                    <input type="password" id="NewPasswordConfirm" name="NewPasswordConfirm" value="<?php echo @$_POST['NewPasswordConfirm'] ?>" placeholder="Confirm-new-password" class="form-control">
                                                </div>
                                                <span class="error"><?php echo @$error_cpass;  ?></span>
                                            </div>
                                            <?php }?>
                                            <div class="form-actions form-group">
                                                <button type="submit" href="#change_password_settings" name="change_pass" class="btn btn-success btn-sm">Change Password</button>
                                            </div>
                                        </form>
												</div>
											</div>

										</div>
									</div>
								</div>
							</div>
