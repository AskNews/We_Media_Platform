<div class="w3-container">
  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
      <h1>Create New <?php echo $type;?></h1>
    </header>

   
    <div class="w3-container">
    <?php
    include "includes/msg.php";
    ?>
    <form class="w3-container" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <br>
    
<label> Image</label>
<input class="w3-input" type="file" name="image" >
<?php
        if(isset($editData)){
			if(file_exists($imgPath.$editData['image']) && !empty($editData['image'])){
				?>
				<img src="<?php echo $imgPath.$editData['image']; ?>" width="100"/>
				<?php
				}else echo "No Image found.";
				?>
                <input type="hidden" name="oldImage" value="<?php echo $editData['image'];?>" />
                <?php
			}
		?>
<br>
<label>User Name</label>
<input class="w3-input" type="text" name="uname" value="<?php echo @$editData['user_name'];?>">
<br>
<label>First Name</label>
<input class="w3-input" type="text" name="fname" value="<?php echo @$editData['first_name'];?>">
<br>
<label>Last Name</label>
<input class="w3-input" type="text" name="lname" value="<?php echo @$editData['last_name'];?>">
<br>
<label>Email</label>
<input class="w3-input" type="email" name="email" value="<?php echo @$editData['email'];?>">
<br>
<label>Password</label>
<input class="w3-input" type="password" name="pwd" value="<?php echo @$editData['password'];?>">
<br>
<label>Password</label>
<input class="w3-input" type="password" >
<br>
<?php
        $sub='';
		$operator='';
		if(isset($editData)){
			if($editData['role']==0){
				 $operator='checked';
		
				}else{
					$sub='checked';
				}
			}
		?>
<label>Role &nbsp;</label>
<input type="radio" name="role" value="1" <?php echo $sub;?>> Sub Admin &nbsp;&nbsp;
<input type="radio" name="role" value="0" <?php echo $operator;?>> Operator
<br><br>
Status &nbsp; <select class="w3-input" name="status">
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
                  <br><br>
			<?php
				  if(isset($editData)){
	?>
	<button type="submit" class="w3-button w3-purple" name="u_<?php echo $type;?>"><i class="fa fa-plus-square"> Update &nbsp;<?php echo ucfirst($type);?> &nbsp;Details</i></button>
										
      <input type="hidden" name="id" value="<?php echo $editData['id'];?>" />
      <?php
	}else{
	  ?>
<button type="submit" class="w3-button w3-purple" name="c_<?php echo $type;?>"> Create <?php echo ucfirst($type);?></button>
<?php
	}
	  ?>
   <br><br>
    </form>
      </div>

    <footer class="w3-container w3-blue">
      <h5>AskNews</h5>
    </footer>
  </div>
  </div>
