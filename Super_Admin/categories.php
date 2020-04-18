<?php
$type="categories";
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
	      				<i class="icon-tag"></i>
	      				<h3><?php
						 	 if(isset($_GET['c_categories']) || isset($_POST['create']) || isset($_GET['edit']) || $decide==true){
									echo "Create ";
							  }else{
								echo "Manage ";
							  }
						   echo $type;?></h3>
	  				</div> <!-- /widget-header -->
					
					<div class="widget-content">
						
						
						
						<div class="tabbable">

						
						<div class="tab-content">
                            <?php
							if(isset($_GET['c_categories']) || isset($_POST['create']) || isset($_GET['edit']) || $decide==true){
								include "Manager/$type/form.php";
								
								
							}
							else{
							
									include "Manager/$type/tbl.php";
							
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
    
    