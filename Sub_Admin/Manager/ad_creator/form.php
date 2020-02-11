<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="panel-heading">
	<h3 class="panel-title">Title</h3>
	<input type="text" class="form-control" id="title" name="title" placeholder="Text field" onkeyup="convertToSlug(this.value);convertToComa(this.value);" value="<?php echo isset($editData)?$editData['title']:"";?>" required>

</div>

<div class="panel-heading">
	<h3 class="panel-title">URL</h3>
	<input type="text" class="form-control" id="url" name="url" placeholder="Automatically Generated" value="<?php echo isset($editData)?$editData['url']:"";?>">
</div>
<div class="panel-heading">
	<h3 class="panel-title">SEO Title</h3>
	<input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="Automatically Generated" value="<?php echo isset($editData)?$editData['seo_title']:"";?>">
</div>
<div class="panel-heading">
	<h3 class="panel-title">Seo Description</h3>
	<input type="text" class="form-control" id="slug-text" name="seo_desc" placeholder="Text field" value="<?php echo isset($editData)?$editData['seo_desc']:"";?>"> 
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
