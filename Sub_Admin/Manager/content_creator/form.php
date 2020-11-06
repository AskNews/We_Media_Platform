<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="panel-heading">
	<h3 class="panel-title">Channel Logo</h3>
	<img style="width:300; height:300px;" src="<?php echo isset($editData)?'../Content_Creator/img/'.$editData['channel_logo']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">User Name</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['username']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Email</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['email']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Mobile</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['mobile']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Channel Name</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['ChannelName']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Channel Description</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['ChannelDescription']:"";?>" disabled>
</div>


<div class="panel-heading">
	<h3 class="panel-title">Join Date</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['c_date']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Bank Name</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['bank_name']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Bank Account Number</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['bank_account_number']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Account Holder Name</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['account_holder_name']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">IFSC Code</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['ifsc_code']:"";?>" disabled>
</div>


<div class="panel-heading">
	<h3 class="panel-title">Date</h3>
	<input type="date" class="form-control" id="date" name="dat" placeholder="Text field" value="<?php echo isset($editData)?$editData['c_date']:"";?>">
</div>

<div class="panel-heading">
	<h3 class="panel-title">Is Approved</h3>
	<select class="form-control" name="status">
	<?php
        $active='selected="selected"';
		$inactive='';
		if(isset($editData)){
			if(!$editData['AccountApproval']){
				 $active='';
		$inactive='selected="selected"';
				}
			}
		?>
										
										<option value="0" <?php echo $inactive; ?>>Reject</option>
										<option value="1" <?php echo $active; ?>>Approve</option>
									</select>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Rejection Description</h3>
	<input type="text" class="form-control" id="title" name="rejDesc" placeholder="Only when Account is rejected" value="" >
</div>
<?php
    if(isset($editData)){
	?>
	<button type="submit" class="btn btn-warning" name="u_<?php echo $type;?>"><i class="fa fa-plus-square"> Final &nbsp;<?php echo ucfirst($type);?> &nbsp;Details</i></button>
										
      <input type="hidden" name="id" value="<?php echo $editData['id'];?>" />
      <?php
	}else{
	  ?> 
<button type="submit" class="btn btn-success" name="c_<?php echo $type;?>"><i class="fa fa-plus-square"> Create <?php echo ucfirst($type);?></i></button>
<?php
	}
	  ?>							
</form>
