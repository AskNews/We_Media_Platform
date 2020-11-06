<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

<div class="panel-heading">
	<h3 class="panel-title">User Name</h3>
	<input type="text" class="form-control" id="title" name="title" placeholder="Text field" value="<?php echo isset($editData)?$editData['username']:"";?>" disabled>

</div>

<div class="panel-heading">
	<h3 class="panel-title">Phone</h3>
	<input type="text" class="form-control" id="slug-text" name="seo_desc" placeholder="Text field" value="<?php echo isset($editData)?$editData['phone']:"";?>" disabled> 
</div>
<div class="panel-heading">
	<h3 class="panel-title">Email</h3>
	<input type="text" class="form-control" id="email" name="email" placeholder="Text field" value="<?php echo isset($editData)?$editData['email']:"";?>" disabled>

</div>

<div class="panel-heading">
	<h3 class="panel-title">Date</h3>
	<input type="date" class="form-control" id="date" name="dat" placeholder="Text field" value="<?php echo isset($editData)?$editData['c_date']:"";?>" disabled>
</div>

<div class="panel-heading">
	<h3 class="panel-title">Is Approval</h3>
	<select class="form-control" name="status">
	<?php
        $active='selected="selected"';
		$inactive='';
		if(isset($editData)){
			if(!$editData['approval']){
				 $active='';
		$inactive='selected="selected"';
				}
			}
		?>
										
										<option value="1" <?php echo $inactive; ?>>Pendding</option>
										<option value="0" <?php echo $active; ?>>Approva</option>
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
