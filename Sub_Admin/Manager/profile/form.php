<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
<div class="panel-heading">
	<h3 class="panel-title">User Image</h3>
	<img src="<?php echo $imgPath."/".$data['image']; ?>" width="180" />

</div>
<div class="panel-heading">
	<h3 class="panel-title">User Name</h3>
	<input type="text" class="form-control" id="title" name="question" placeholder="Text field" value="<?php echo isset($data)?$data['user_name']:"";?>" disabled>

</div>
<div class="panel-heading">
	<h3 class="panel-title">Full Name</h3>
	<input type="text" class="form-control" id="slug-text" name="ans" placeholder="Text field" value="<?php echo isset($data)?$data['first_name']." ".$data['last_name']:"";?>" disabled> 
</div>
<div class="panel-heading">
	<h3 class="panel-title">Email</h3>
	<input type="text" class="form-control" id="slug-text" name="ans" placeholder="Text field" value="<?php echo isset($data)?$data['email']:"";?>" disabled> 
</div>
<div class="panel-heading">
	<h3 class="panel-title">Role</h3>
	<input type="text" class="form-control" id="slug-text" name="ans" placeholder="Text field" value="<?php echo isset($data['role'])==0?"Content Creator":"Ad Creator";?>" disabled> 
</div>

						
</form>
