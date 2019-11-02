<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="panel-heading">
	<h3 class="panel-title">Title</h3>
	<input type="text" class="form-control" id="title" name="title" placeholder="Text field"  onkeyup="convertToSlug(this.value);convertToComa(this.value);">

</div>

<div class="panel-heading">
	<h3 class="panel-title">URL</h3>
	<input type="text" class="form-control" id="url" name="url" placeholder="Automatically Generated" >
</div>
<div class="panel-heading">
	<h3 class="panel-title">SEO Title</h3>
	<input type="text" class="form-control" id="seo_title" name="seo_title" placeholder="Automatically Generated" >
</div>
<div class="panel-heading">
	<h3 class="panel-title">Seo Description</h3>
	<input type="text" class="form-control" id="slug-text" name="seo_desc" placeholder="Text field">
</div>
<div class="panel-heading">
	<h3 class="panel-title">Location</h3>
	<input type="text" class="form-control" name="location" placeholder="Text field">
</div>
<div class="panel-heading">
	<h3 class="panel-title">Date</h3>
	<input type="date" class="form-control" id="date" name="dat" placeholder="Text field">
</div>

<div class="panel-heading">
	<h3 class="panel-title">Status</h3>
	<select class="form-control" name="status">
										<option value="0">Active</option>
										<option value="1">In-Active</option>
										
									</select>
</div>

<button type="submit" class="btn btn-success" name="c_<?php echo $type;?>"><i class="fa fa-plus-square"> Create <?php echo ucfirst($type);?></i></button>
<button type="button" class="btn btn-success btn-toastr" data-context="success" data-message="This is success info" data-position="top-right">Success Info</button>
										
</form>
