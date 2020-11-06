<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="panel-heading">
	<h3 class="panel-title">Creator Details</h3>
	<?php
	 echo isset($editData)?"<b>Creator ID :- </b>".$editData['CreatorID']."<br>":"";
	 echo "<b>User Name :- </b>". fetch_detail("username","content_creator","id",$editData['CreatorID'])."<br>";
	 
	 echo "<b>Channel Name :- </b>". fetch_detail("ChannelName","content_creator","id",$editData['CreatorID'])."<br>";
	 echo "<b>Channel Description :- </b>". fetch_detail("ChannelDescription","content_creator","id",$editData['CreatorID'])."<br>";
	 echo  (fetch_detail("Monetization","content_creator","id",$editData['CreatorID']))?'<b>Monitization is :-</b><b style="color:red;"> Off</b>':'<b>Monitization is :-</b> <b style="color:green;">on</b>'."<br>";
	 
	 ?>
	  <input type="hidden" name="CreatorID" value="<?php echo $editData['CreatorID'];?>" />
</div>
<div class="panel-heading">
	<h3 class="panel-title">News Related Details</h3>
	<?php
	 echo isset($editData)?"<b>Category ID :- </b>".$editData['CategoryID']."<br>":"";
	 echo isset($editData)?"<b>Rejection Count :- </b>".$editData['Rejected']."<br>":"";
	
	 
	echo "<b>News Category :- </b>". fetch_detail("title","categories","id",$editData['CategoryID'])."<br>";
	
	 
	 ?>
	  <input type="hidden" name="Rejected" value="<?php echo $editData['Rejected'];?>" />
	  <input type="hidden" name="HeadLine" value="<?php echo $editData['HeadLine'];?>" />
</div>

<div class="panel-heading">
	<h3 class="panel-title">Head Line</h3>
	<input type="text" class="form-control" id="title" name="HeadLine" placeholder="Text field" value="<?php echo isset($editData)?$editData['HeadLine']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">File Attach</h3>
	<img src="../Content_Creator/img/<?php echo isset($editData)?$editData['FileAttach']:"";?>" style="width:200px;">
</div>
<div class="panel-heading">
	<h3 class="panel-title">Summary</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['Summary']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Details</h3>
	<?php echo isset($editData)?$editData['Details']:"";?>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Publish Date</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['PublishDate']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Rejected Count</h3>
	<input type="text" class="form-control" id="title" name="not" placeholder="Text field" value="<?php echo isset($editData)?$editData['Rejected']:"";?>" disabled>
</div>
<div class="panel-heading">
	<h3 class="panel-title">Rejection Message</h3>
	<input type="text" class="form-control" id="title" name="rejectionmsg" placeholder="Text field" value="<?php echo isset($editData)?$editData['RejectionMsg']:"";?>" >
</div>
<div class="panel-heading">
	<h3 class="panel-title">Post Date</h3>
	<input type="text" class="form-control" id="title" name="date" placeholder="Text field" value="<?php echo isset($editData)?$editData['PostDate']:"";?>" disabled>
</div>

<div class="panel-heading">
	<h3 class="panel-title">Is Approved</h3>
	<select class="form-control" name="Approved">
	<?php
        $active='selected="selected"';
		$inactive='';
		if(isset($editData)){
			if(!$editData['Approved']){
				 $active='';
		$inactive='selected="selected"';
				}
			}
		?>
										
										<option value="0" <?php echo $inactive; ?>>Reject</option>
										<option value="1" <?php echo $active; ?>>Approved</option>
									</select>
</div>
<?php
    if(isset($editData)){
	?>
	<button type="submit" class="btn btn-warning" name="u_<?php echo $type;?>"><i class="fa fa-plus-square"> Approve &nbsp;<?php echo ucfirst($type);?> &nbsp;Details</i></button>
										
      <input type="hidden" name="id" value="<?php echo $editData['id'];?>" />
      <?php
	}else{
	  ?>
<button type="submit" class="btn btn-success" name="c_<?php echo $type;?>"><i class="fa fa-plus-square"> Create <?php echo ucfirst($type);?></i></button>
<?php
	}
	  ?>							
</form>
