<?php

if(isset($success)){
?>

<div class="w3-panel w3-blue">
  <h3>Success!</h3>
  <p><?php echo $success; ?></p>
</div> 

<?php
} else if(isset($error)){
?>

<div class="w3-panel w3-red">
  <h3>Warning!</h3>
  <p><?php echo $error; ?></p>
</div>
<?php
}else if(isset($info)){
?> 
<div class="w3-panel w3-orange">
  <h3>Information!</h3>
  <p><?php echo $info; ?></p>
</div> 
<?php
}
  ?>