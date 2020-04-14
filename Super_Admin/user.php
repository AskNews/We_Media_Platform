<?php
$type="user";
$s=1;
$e=10;
$imgPath = "image/module_user/";
include "includes/header.php";

?>

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	 
	      <div class="row"> 
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
						  <h3><?php
						 	 if(isset($_GET['c_user']) || isset($_POST['create']) || isset($_GET['edit']) || $decide==true){
									echo "Create ";
							  }else{
								echo "Manage ";
							  }
						  ?>
							   User</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						<div class="tabbable">

						
						<div class="tab-content">
                            <?php
							if(isset($_GET['c_user']) || isset($_POST['create']) || isset($_GET['edit']) || $decide==true){
								include "Manager/user/form.php";
								
								
							}
							else{
							
									include "Manager/user/tbl.php";
							
							}
							?>							
						</div>
						
						
						
						
						
					</div> <!-- /widget-content -->
						
				</div> <!-- /widget -->
	      		
		    </div> <!-- /span8 -->
	      	
	      	
	      	
	      	
	      </div> <!-- /row -->
	
	    </div> <!-- /container -->
	    
	</div> <!-- /main-inner -->
    
</div> <!-- /main -->

				  
						  
    
<?php
include "includes/footer.php";
?>
    
    