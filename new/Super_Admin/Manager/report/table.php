<div class="w3-container">
  <div class="w3-card-4" style="width:100%;">

      <div class="col-sm-3">
<form class="w3-container" method="post" >
<br/>
<label>
<select name="usertype" style="width:200px" class="w3-input" >
<option class="w3-input" <?php if(isset($_POST["usertype"]) && $_POST['usertype']=="") {echo "selected";} ?> value="">--Select--</option>
<option class="w3-input" <?php if(isset($_POST["usertype"]) && $_POST['usertype']==1) {echo "selected";} ?> value="1">Active Sub-Admin</option>
<option class="w3-input" <?php if(isset($_POST["usertype"]) && $_POST['usertype']==0) {echo "selected";} ?> value="0">In-Active Sub-Admin</option>
<option class="w3-input" <?php if(isset($_POST["usertype"]) && $_POST['usertype']==2) {echo "selected";} ?> value="2">Active Operator</option>
<option class="w3-input" <?php if(isset($_POST["usertype"]) && $_POST['usertype']==3) {echo "selected";} ?> value="3">In-Active Operator</option>
</select> 
<button class="w3-button w3-blue" name="btn_select" id="submit" type="submit">Submit</button>
</label>
</div>

<br>
  <br>
  <table class="w3-table-all">
  <thead>
    <tr class="w3-blue">
      <th>Username</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Role</th>
    
    </tr>
  </thead>
  <?php
    $sn=1;
  while($row=mysqli_fetch_array($result_user)){
    
  ?>

  <tr>
    <td><?php echo $row['user_name']; ?></td>
    <td><?php echo $row['first_name']; ?></td>
    <td><?php echo $row['last_name']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php if($row['role']==1){ echo "Operator";}else if($row['role']==0){ echo "Sub-Admin";} ?></td>  
  </tr>
  <?php
                    }
                    ?>
</table>
<br/><br/>
</form>
</div>

</div>
