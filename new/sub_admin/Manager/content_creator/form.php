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
		<label>Select Image</label>   
  
		<input type="file" class="wmp-theme" name="image" placeholder="Please Select File" value="<?php echo isset($editData)?$editData['image']:"";?>">
	<?php
        if(isset($editData)){
			if(file_exists($imgPath.$editData['channel_logo']) && !empty($editData['channel_logo'])){
				?>
				<img src="<?php echo $imgPath.$editData['channel_logo']; ?>" width="100"/>
				<?php
				}else echo "No Image found.";
				?>
                <input type="hidden" name="not" value="<?php echo $editData['channel_logo'];?>" />
                <?php
			}
		?>
</div>
<div class="wmp-section">   
  <label>User Name</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['username']:"";?>" disabled>
</div>
<div class="wmp-section">   
  <label>Email</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['email']:"";?>" disabled>
</div>
<div class="wmp-section">   
  <label>Mobile</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['mobile']:"";?>" disabled>
</div>
<div class="wmp-section">   
  <label>Channel Name</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['ChannelName']:"";?>" disabled>
</div>
<div class="wmp-section">   
  <label>Channel Description</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['ChannelDescription']:"";?>" disabled>
</div>
<div class="wmp-section">   
  <label>IP</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['IP']:"";?>" disabled>
</div>
<div class="wmp-section">   
  <label>Bank Name</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['bank_name']:"";?>" disabled>
</div>
<div class="wmp-section">   
  <label>Account Holder Name</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['account_holder_name']:"";?>" disabled>
</div>
<div class="wmp-section">   
  <label>Account Number</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['bank_account_number']:"";?>" disabled>
</div>
<div class="wmp-section">   
  <label>IFSC Code</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['ifsc_code']:"";?>" disabled>
</div>

<div class="wmp-section">   
  <label>Apply Date</label>   
    <input class="wmp-input" type="text" name="not" value="<?php echo isset($editData)?$editData['DateTime']:"";?>" disabled>
    
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




