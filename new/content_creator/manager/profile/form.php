
<div> 
<div class="w3-card-4">
<div class="w3-container w3-green">
  <h2>Sign Up</h2>
</div>
<form id="sign_up" method="POST" class="w3-container" enctype="multipart/form-data" ><br/>

<input type="text" pattern="[a-zA-Z0-9]+" class="form-control" value="<?php echo $row["username"] ?>" id="txtuname" name="txtuname" placeholder="User Name" >
<span class="error"><?php echo @$error_username; ?></span>

<input type="email" class="form-control" value="<?php echo $row["email"] ?>" id="Email" name="email" placeholder="Email" >
<span class="error"><?php echo @$error_email; ?></span>

<input type="text" class="form-control" value="<?php echo $row["mobile"] ?>" pattern="[6|7|8|9][0-9]{9}" id="txtmobile" name="txtmobile"  placeholder="Mobile"></textarea>
<span class="error"><?php echo @$error_mobile; ?></span>

<input type="file" class="form-control"  name="file">
<span class="error"><?php echo @$errorForFile; ?></span>

<?php if(@$row["Monetization"]==1){?>
<input type="text" class="form-control" pattern="[a-zA-Z]+" id="txtbname"   name="txtbname" placeholder="Bank Name">
<span class="error"><?php echo @$error_bname; ?></span>

<input type="text" pattern="[a-zA-Z]+" class="form-control" id="txtaccountHname"  name="txtaccountHname" placeholder="Account Holder Name">
<span class="error"><?php echo @$error_holderName; ?></span>

<input type="text" class="form-control"  id="txtaccountno" name="txtaccountno" placeholder="Account Number">
<span class="error"><?php echo @$error_accountNum; ?></span>

<input type="text" pattern="^[A-Za-z]{4}[0]{1}[0-9a-zA-Z]{6}$" class="form-control"  id="txtIfsc" name="txtIfsc" placeholder="IFSC Code">
<span class="error"><?php echo @$error_ifsc; ?></span>

<input type="submit" class="w3-button w3-green" name="submit" value="Update"><br/><br/><br/>
<br/><br/>
</form>
</div>
</div>