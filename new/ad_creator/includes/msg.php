<?php

if(isset($success)){
?>

<div class="wmp-panel wmp-blue">
  <h3>Success!</h3>
  <p><?php echo $success; ?></p>
</div> 

<?php
} else if(isset($error)){
?>

<div class="wmp-panel wmp-red">
  <h3>Warning!</h3>
  <p><?php echo $error; ?></p>
</div>
<?php
}else if(isset($info)){
?> 
<div class="wmp-panel wmp-orange">
  <h3>Information!</h3>
  <p><?php echo $info; ?></p>
</div> 
<?php
}
  ?>