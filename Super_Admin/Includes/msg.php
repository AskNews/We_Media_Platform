<div class="controls">
<?php
if(isset($error)){
?>
<div class="alert">
<button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong>Warning!</strong> <?php echo $error; ?>
</div>
                                        
 <?php
}else if(isset($success)){
?>       
<div class="alert alert-success">
 <button type="button" class="close" data-dismiss="alert">&times;</button>

 <strong>Success!</strong> <?php echo $success; ?>
</div>
                                            
 <?php
}else if(isset($info)){
?>             
 <div class="alert alert-info">
<button type="button" class="close" data-dismiss="alert">&times;</button>
 <strong>Done!</strong> <?php echo $info; ?>
</div>
 <?php
}
 ?>	
</div>										