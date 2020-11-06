<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<h3 class="panel-title">Creator Details</h3>
	<?php
	 echo isset($editData)?"<b>Creator ID :- </b>".$editData['ad_creator_id']."<br>":"";
	 echo "<b>User Name :- </b>". fetch_detail("username","ad_creator","id",$editData['ad_creator_id'])."<br>";
	 
	 echo "<b>Email :- </b>". fetch_detail("email","ad_creator","id",$editData['ad_creator_id'])."<br>";
	 echo "<b>Wallet :- </b>". fetch_detail("wallet","ad_creator","id",$editData['ad_creator_id'])."<br>";
	 echo "<b>Life Time Amount :- </b>". fetch_detail("lifetime_amount","ad_creator","id",$editData['ad_creator_id'])."<br>";
	 echo "<b>Contact No :- </b>". fetch_detail("phone","ad_creator","id",$editData['ad_creator_id'])."<br>";
	 
	 ?>
<div class="panel-heading">
	<h3 class="panel-title">Ad Name</h3>
	<input type="text" class="form-control" id="title" name="title" placeholder="Text field" value="<?php echo isset($editData)?$editData['unit_name']:"";?>" disabled>

</div>

<div class="panel-heading">
	<h3 class="panel-title">CPC</h3>
	<input type="text" class="form-control" id="slug-text" name="seo_desc" placeholder="Text field" value="<?php echo isset($editData)?$editData['cpc']:"";?>" disabled> 
</div>
<div class="panel-heading">
	<h3 class="panel-title">Amount</h3>
	<input type="text" class="form-control" id="email" name="email" placeholder="Text field" value="<?php echo isset($editData)?$editData['amount']:"";?>" disabled>

</div>
<div class="panel-heading">
	<h3 class="panel-title">URL</h3>
	<a href="<?php echo isset($editData)?$editData['url']:"";?>"><?php echo isset($editData)?$editData['url']:"";?></a>

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
