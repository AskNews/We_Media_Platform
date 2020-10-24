<?php
$type="index";
include "Includes/header.php";
?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">
							<?php
							if($_SESSION['role']==0){
									echo "News Operator Dashboard";
							}else{
									echo "Ad Operator Dashborad";

							}
							?>
							</h3>
							<p class="panel-subtitle"><?php period()?> </p>
						</div>
						<div class="panel-body">
						<?php
					if($_SESSION['role']==0){
							
							include "Manager/news_dashboard/form.php";
							
							}else
							{
								include "Manager/ad_dashboard/form.php";
								}
						?>	
						</div>
					</div>
					<!-- END OVERVIEW -->
					
					
					
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
        <?php
        include "Includes/footer.php";
        ?>
