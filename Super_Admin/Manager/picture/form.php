
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
												<input type="file" class="span6" id="image" name="image" required>
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<?php
        if(isset($editData)){  
			if(file_exists($imgPath.$editData['gallery_id']."/".$editData['image']) && !empty($editData['image'])){
				?>
				<img src="<?php echo $imgPath.$editData['gallery_id']."/".$editData['image']; ?>" width="100"/>
				<?php
				}else echo "No Image found.";
				?>
                <input type="hidden" name="oldImage" value="<?php echo $editData['image'];?>" />
                <?php
			}
		?>
		<div class="control-group">											
											<label class="control-label" for="caption">Gallery</label>
											<div class="controls">
										<select name="gal" class="span6" >
										<?php
          $sql="select * from tbl_gallery";
		  $query=mysqli_query($con,$sql);
		  while($row=mysqli_fetch_array($query)){
			  $selected='';
			  if(isset($editData)){
				  if($editData['gallery_id']==$row['id']){
					  $selected='selected="selected"';
					  }
				  }
		  ?>
          <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?> ><?php echo $row['title']; ?></option>
          <?php
		  }
		  ?>
										</select>		
										</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										

										<div class="control-group">											
											<label class="control-label" for="caption">Caption</label>
											<div class="controls">
												<input type="text" class="span6" id="caption" name="caption" value="<?php echo isset($editData)?$editData['caption']:"";?><?php if(isset($vscaption)){ echo $vscaption;}?>" required>
												<input type="hidden" name="vscaption">
											</div> <!-- /controls -->				
										</div> <!-- /control-group -->
										<div class="control-group">											
											<label class="control-label" for="date">Date</label>
											<div class="controls">
												<input type="date" class="span6" id="caption" name="dat" value="<?php echo isset($editData)?$editData['c_date']:"";?>" required>
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
							