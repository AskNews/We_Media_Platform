
<div class="wmp-row">
<?php

if(isset($error)){
?>
  <div class="wmp-padding wmp-display-container wmp-red">
  <span onclick="this.parentElement.style.display='none'" class="wmp-button wmp-display-topright"><i class="fa fa-remove"></i></span>
  <p><?php echo $error; ?></p>
</div>

  <?php
} else if(isset($success)){
?>
  
  <div class="wmp-padding wmp-display-container wmp-blue">
  <span onclick="this.parentElement.style.display='none'" class="wmp-button wmp-display-topright"><i class="fa fa-remove"></i></span>
  <p><?php echo $success; ?></p>
</div><?php
}else if(isset($info)){
?>
 
 <div class="wmp-padding wmp-display-container wmp-orange">
  <span onclick="this.parentElement.style.display='none'" class="wmp-button wmp-display-topright"><i class="fa fa-remove"></i></span>
  <p><?php echo $info; ?></p>
</div> <?php
}
  ?>
</div>
