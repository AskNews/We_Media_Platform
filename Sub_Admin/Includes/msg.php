<?php
if(isset($info)){
?>
<div class="alert alert-info alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-info-circle"></i> <?php echo $info; ?>
									</div>
                                                                          
 <?php
}else if(isset($success)){
?>
									<div class="alert alert-success alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-check-circle"></i> <?php echo $success; ?>
									</div>
                                                                               
 <?php
}else if(isset($error)){
?>
									
									<div class="alert alert-danger alert-dismissible" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<i class="fa fa-times-circle"></i> <?php echo $error; ?>
									</div>
                                    <?php
}
 ?>	