
							<div class="tab-pane active" id="formcontrols">
								<form id="edit-profile" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
									<fieldset>
                                    <div class="control-group">
												
                                                <?php
                                                include "includes/msg.php";
                                                ?>
                                            		 </div>
										<div class="control-group">											
											<label class="control-label" for="image">Profile Image</label>
											<div class="controls">
												<input type="file" class="span6" id="image" name="image">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<?php
        if(isset($editData)){
			if(file_exists($imgPath.$editData['image']) && !empty($editData['image'])){
				?>
				<img src="<?php echo $imgPath.$editData['image']; ?>" width="100"/>
				<?php
				}else echo "No Image found.";
				?>
                <input type="hidden" name="oldImage" value="<?php echo $editData['image'];?>" />
                <?php
			}
		?>

										<div class="control-group">											
											<label class="control-label" for="username">Username</label>
											<div class="controls">
												<input type="text" class="span6" id="firstname" name="uname" value="<?php echo isset($editData)?$editData['user_name']:"";?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="firstname">First Name</label>
											<div class="controls">
												<input type="text" class="span6" id="firstname" name="fname" value="<?php echo isset($editData)?$editData['first_name']:"";?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="lastname">Last Name</label>
											<div class="controls">
												<input type="text" class="span6" id="lastname" name="lname" value="<?php echo isset($editData)?$editData['last_name']:"";?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="email">Email Address</label>
											<div class="controls">
												<input type="text" class="span4" id="email" name="email" value="<?php echo isset($editData)?$editData['email']:"";?>">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										
										<div class="control-group">											
											<label class="control-label" for="password1">Password</label>
											<div class="controls">
												<input type="password" class="span4" id="password1" name="pwd" >
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										
										
										<div class="control-group">											
											<label class="control-label" for="password2">Confirm</label>
											<div class="controls">
												<input type="password" class="span4" id="password2">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
												
										
                                        
                                        
                                        <div class="control-group">											
											<label class="control-label">Permission</label>
											<?php
        $sub='';
		$operator='';
		if(isset($editData)){
			if($editData['status']==0){
				 $operator='checked';
		
				}else{
					$sub='checked';
				}
			}
		?>
	
                                            
                                            <div class="controls">
                                            <label class="radio inline">
                                              <input type="radio"  name="role" value="0" <?php echo $sub;?>> News Operator
                                            </label>
                                            
                                            <label class="radio inline">
                                              <input type="radio" name="role" value="1" <?php echo $operator; ?>>Ad Operator
                                            </label>
                                          </div>	<!-- /controls -->			
										</div> <!-- /control-group -->
                                        
										
											
										 <br />
										
											
										<div class="form-actions">
										<?php
    if(isset($editData)){
	?>
	<button type="submit" class="btn btn-warning" name="u_<?php echo $type;?>"><i class="fa fa-plus-square"> Update &nbsp;<?php echo ucfirst($type);?> &nbsp;Details</i></button>
										
      <input type="hidden" name="id" value="<?php echo $editData['id'];?>" />
      <?php
	}else{
	  ?>
<button type="submit" class="btn btn-success" name="c_<?php echo $type;?>"> Create <?php echo ucfirst($type);?></button>
<?php
	}
	  ?>							

											</div> <!-- /form-actions -->
									</fieldset>
								</form>
								</div>
							