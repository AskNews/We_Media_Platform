<?php
$type="tbl_module_user";
$s=1;
$e=10;
include "includes/header.php";
include "engine/engine.php";

?>

<div class="main">
	
	<div class="main-inner">

	    <div class="container">
	 
	      <div class="row"> 
	      	
	      	<div class="span12">      		
	      		
	      		<div class="widget ">
	      			
	      			<div class="widget-header">
	      				<i class="icon-user"></i>
	      				<h3>Manage Users</h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						<div class="tabbable">

						
						<div class="tab-content">
                            <?php
							if(isset($_GET['c_user']) || isset($_GET['u_user'])){
								include "Manager/user/form.php";
								
								
							}
							else{
								if(isset($_GET['m_user'])){
									include "Manager/user/tbl.php";
								}
								else{
									include "Manager/user/tbl.php";
								}
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
    
    