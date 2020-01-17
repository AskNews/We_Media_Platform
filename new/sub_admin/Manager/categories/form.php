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
  <label>Title </label>   
    <input class="wmp-input" type="text" name="title" onkeyup="convertToSlug(this.value);convertToComa(this.value);" value="<?php echo isset($editData)?$editData['title']:"";?>" required>
    
  </div>
  <div class="wmp-section">   
  <label>URL </label>   
    <input class="wmp-input" type="text" id="url" name="url" value="<?php echo isset($editData)?$editData['url']:"";?>" required>
    
  </div>
  <div class="wmp-section">   
  <label>SEO title </label>   
    <input class="wmp-input" type="text" id="seo_title" name="seo_title" value="<?php echo isset($editData)?$editData['seo_title']:"";?>" required>
    
  </div>
  <div class="wmp-section">   
  <label>SEO Description </label>   
    <input class="wmp-input" type="text" id="slug-text" name="seo_desc" value="<?php echo isset($editData)?$editData['seo_desc']:"";?>" required>
    
  </div>
  <div class="wmp-section">   
  <label>Date</label>   
    <input class="wmp-input" type="date" id="date" name="dat" value="<?php echo isset($editData)?$editData['c_date']:"";?>" required>
    
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




