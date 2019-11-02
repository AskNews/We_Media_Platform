<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<div class="panel-heading">
	<h3 class="panel-title">Gallery</h3>
	<select class="form-control" name="gallery_id">
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
          <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?>><?php echo $row['title']; ?></option>
          <?php
		  }
		  ?>
		  	</select>
</div>

<div class="panel-heading">
	<h3 class="panel-title">image</h3>
	<input type="file" class="form-control" name="image" placeholder="Please Select File" value="<?php echo isset($editData)?$editData['image']:"";?>">
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
</div>
<div class="panel-heading">
	<h3 class="panel-title">Caption</h3>
	<input type="text" class="form-control" id="title" name="caption" placeholder="Text field" value="<?php echo isset($editData)?$editData['caption']:"";?>" required>

</div>

<div class="panel-heading">
	<h3 class="panel-title">Date</h3>
	<input type="date" class="form-control" id="date" name="dat" placeholder="Text field" value="<?php echo isset($editData)?$editData['c_date']:"";?>">
</div>

<div class="panel-heading">
	<h3 class="panel-title">Status</h3>
	<select class="form-control" name="status">
	<?php
        $active='selected="selected"';
		$inactive='';
		if(isset($editData)){
			if(!$editData['status']){
				 $active='';
		$inactive='selected="selected"';
				}
			}
		?>
										
										<option value="0" <?php echo $inactive; ?>>In-Active</option>
										<option value="1" <?php echo $active; ?>>Active</option>
									</select>
</div>

<?php
    if(isset($editData)){
	?>
	<button type="submit" class="btn btn-warning" name="u_<?php echo $type;?>"><i class="fa fa-plus-square"> Update &nbsp;<?php echo ucfirst($type);?> &nbsp;Details</i></button>
										
      <input type="hidden" name="id" value="<?php echo $editData['id'];?>" />
      <?php
	}else{
	  ?>
<button type="submit" class="btn btn-success" name="c_<?php echo $type;?>"><i class="fa fa-plus-square"> Create <?php echo ucfirst($type);?></i></button>
<?php
	}
	  ?>							
</form>
