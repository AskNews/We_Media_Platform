
							<div class="tab-pane active" id="formcontrols">
								<form id="edit-profile" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
									<fieldset>
                                    <div class="control-group">
												
                                                <?php
                                                include "includes/msg.php";
                                                ?>
                                            		 </div>
										
									

													 <div class="control-group">											
											<label class="control-label" for="title">Title</label>
											<div class="controls">
												<input type="text" class="span6" id="title" name="title" onkeyup="convertToSlug(this.value);convertToComa(this.value);" value="<?php echo isset($editData)?$editData['title']:"";?><?php if(isset($viewstateTitle)){ echo $viewstateTitle;}?>">
												<input type="hidden"  name="viewstateTitle" />
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="url">URL</label>
											<div class="controls">
												<input type="text" class="span6" id="url" name="url" value="<?php echo isset($editData)?$editData['url']:"";?><?php if(isset($vsUrl)){ echo $vsUrl;}?>">
												<input type="hidden"  name="vsUrl" />
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="seo_title">SEO Title</label>
											<div class="controls">
												<input type="text" class="span6" id="seo_title" name="seo_title" value="<?php echo isset($editData)?$editData['seo_title']:"";?><?php if(isset($vsSeoTitle)){ echo $vsSeoTitle;}?>">
												<input type="hidden"  name="vsSeoTitle" />
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="seo_desc">SEO Description</label>
											<div class="controls">
												<input type="text" class="span6" id="seo_desc" name="seo_desc" value="<?php echo isset($editData)?$editData['seo_desc']:"";?><?php if(isset($vsSeoDesc)){ echo $vsSeoDesc;}?>">
												<input type="hidden"  name="vsSeoDesc" />
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="location">Location</label>
											
											<div class="controls">
												<input type="text" class="span6" id="location" name="location" value="<?php echo isset($editData)?$editData['location']:"";?><?php if(isset($vsLocation)){ echo $vsLocation;}?>">
												<input type="hidden"  name="vsLocation" />
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="date">Date</label>
											<div class="controls">
												<input type="date" class="span6" id="date" name="dat" value="<?php echo isset($editData)?$editData['c_date']:"";?>">
											</div> <!-- /controls -->				
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
							