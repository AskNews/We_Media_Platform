<div class="w3-container">
  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
      <h1>Create Ads</h1>
    </header>

   
    <div class="w3-container">
    <?php
    include "includes/msg.php";
    ?>
    <form class="w3-container" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <br>
    <label>Ad Name</label>
<input class="w3-input" type="text" name="name" required>
<br>
<label>Ad Category</label>
<select  id="category" class="w3-input" name="cat">
                                        <!--<option  value="<?php //echo $update['CategoryID']; ?>"></option>-->
                                        <?php
                                            $query="select * from tbl_categories where status=1";
                                            $data=mysqli_query($con,$query);
                                            while($row=mysqli_fetch_assoc($data))
                                            {
                                                $selected=null;
                                                if(isset($update))
                                                {if($update['CategoryID']==$row['id']){
                                                    $selected='selected';
                                                }
                                            }
                                                   ?>
                                                    <option value="<?php echo $row['id'];  ?>" <?php if(@$update["CategoryID"]==$row["id"]){ echo "selected";}?> ><?php echo $row['title'];?></option>
                                                <?php
                                            }
                                            
                                        ?>
                                        
                                    </select><hr>
<label>Ad Title</label>
<input class="w3-input" type="text" name="title" required>
<br>
<label>Ad Url</label>
<input class="w3-input" type="text" name="url" required>
<br>
<label>Ad Unit Amount</label>
<input class="w3-input" type="text" name="amt" required>
<br>
<label>Ad Unit CPC</label>
<select class="w3-input" name="cpc">
<option value="0.1">0.1</option>
<option value="0.2">0.2</option>
<option value="0.3">0.3</option>
<option value="0.4">0.4</option>
<option value="0.5">0.5</option>
<option value="0.6">0.6</option>
<option value="0.7">0.7</option>
<option value="0.8">0.8</option>
<option value="0.9">0.9</option>
<option value="1">1</option>
<option value="1.1">1.5</option>
<option value="1.2">1.2</option>
<option value="1.3">1.3</option>
<option value="1.4">1.4</option>
<option value="1.5">1.5</option>
<option value="1.6">1.6</option>
<option value="1.7">1.7</option>
<option value="1.8">1.8</option>
<option value="1.9">1.9</option>
<option value="2.0">2.0</option>

</select>
<hr>
<label>Ad Image</label>
<input class="w3-input" type="file" name="image" required>
<br>
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

    <button class="w3-button w3-purple" type="submit" name="send" >Create Ad</button>
   <br><br>
    </form>
      </div>

    <footer class="w3-container w3-blue">
      <h5>AskNews</h5>
    </footer>
  </div>
  </div>
