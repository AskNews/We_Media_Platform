<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="panel-heading">

	<h3 class="panel-title">Subject</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['subject']:"";?>" disabled>

</div>

<div class="panel-heading">

	<h3 class="panel-title">Query/Feedback</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['message']:"";?>" disabled>

</div>

<div class="panel-heading">
	<h3 class="panel-title">Reply</h3>
	<input type="text" class="form-control" id="title" name="reply" placeholder="Text field" value="<?php echo isset($editData)?$editData['reply']:"";?>" required>

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
