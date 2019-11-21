
<div class="w3-row">
<?php

if(isset($error)){
?>
  <div class="w3-padding w3-display-container w3-red">
  <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright"><i class="fa fa-remove"></i></span>
  <p><?php echo $error; ?></p>
</div>

  <?php
} else if(isset($success)){
?>
  
  <div class="w3-padding w3-display-container w3-blue">
  <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright"><i class="fa fa-remove"></i></span>
  <p><?php echo $success; ?></p>
</div><?php
}else if(isset($info)){
?>
 
 <div class="w3-padding w3-display-container w3-orange">
  <span onclick="this.parentElement.style.display='none'" class="w3-button w3-display-topright"><i class="fa fa-remove"></i></span>
  <p><?php echo $info; ?></p>
</div> <?php
}
  ?>
</div>
