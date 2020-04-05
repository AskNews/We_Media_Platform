<?php
$type="index";
include "includes/header.php";
$a=$_SESSION['newAccount-AdminLogin'];
$qry=mysqli_query($con,"select * from tbl_module_user where user_name='$a'");
$res=mysqli_fetch_array($qry);
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
 <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-user "></i>
              <h3>User Profile</h3>
            </div>
            <div class="widget-content">
						
						<div class="pricing-plans plans-3">
							
            <div class="plan-container">
					        <div class="plan green">
						        <div class="plan-header">
					                
						        	<div class="plan-title">
						        		We Media Admin	        		
					        		</div> <!-- /plan-title -->
					                
						            <div class="plan-price">
					                	<img src="Image/module_user/<?php echo $res['image'];?>">
									</div> <!-- /plan-price -->
									
						        </div> <!-- /plan-header -->	          
						        
						        <div class="plan-features">
									<ul>					
                                    <li>User Name: <?php echo $res['user_name'];?> </li>
                                    <li>First Name: <?php echo $res['first_name'];?> </li>
                                    <li>Last Name: <?php echo $res['last_name'];?> </li>
                                    <li>Email: <?php echo $res['email'];?> </li>
										
									</ul>
								</div> <!-- /plan-features -->
								
								<div class="plan-actions">				
									<a href="index.php" class="btn">Go to Dashboard</a>				
								</div> <!-- /plan-actions -->
					
							</div> <!-- /plan -->
					    </div> <!-- /plan-container -->
</div>
</div>
          </div>
</div>

</div>
</div>
</div>
</div>
<?php
include "includes/footer.php";

?>