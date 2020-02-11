<?php
include "includes/msg.php";
?>
<form class="wmp-container wmp-card-4" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
<?php
if(isset($_GET['edit'])){
?>
<h2>Edit <?php echo ucfirst($type);?> Details</h2>

<?php
}else{
?>
<h2>Create New <?php echo ucfirst($type);?></h2>

<?php
}
?>
  <div class="wmp-section">   
  <label>Select Gallery</label>   
   
  <select class="wmp-button wmp-theme" name="gallery_id">
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
		<div class="wmp-section">   
		<label>Select Image</label>   
  
		<input type="file" class="wmp-theme" name="image" placeholder="Please Select File" value="<?php echo isset($editData)?$editData['image']:"";?>">
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
  <div class="wmp-section">   
  <label>Caption</label>   
    <input class="wmp-input" type="text" name="caption" value="<?php echo isset($editData)?$editData['caption']:"";?>" required>
    
  </div>
  <div class="wmp-section">   
  <label>Date</label>   
    <input class="wmp-input" type="date" name="dat" value="<?php echo isset($editData)?$editData['c_date']:"";?>" required>
    
  </div>
   
<div class="wmp-section">
	<label>Status</label>
	<select class="wmp-theme" name="status">
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

<div class="wmp-section">   
  
<?php
    if(isset($editData)){
	?>
	<button type="submit" class="wmp-theme" name="u_<?php echo $type;?>"><i class="fa fa-plus-square"> Update &nbsp;<?php echo ucfirst($type);?> &nbsp;Details</i></button>
										
      <input type="hidden" name="id" value="<?php echo $editData['id'];?>" />
      <?php
	}else{
	  ?>
<button type="submit" class="wmp-theme" name="c_<?php echo $type;?>"><i class="fa fa-plus-square"> Create <?php echo ucfirst($type);?></i></button>
<?php
	}
	  ?>							
</div>

</form>
</div>
</div>



