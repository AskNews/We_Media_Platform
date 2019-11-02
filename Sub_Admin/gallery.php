<?php
$type="gallery";
$t="";
include "Includes/header.php";
include_once "engine/engine.php";


?>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"><?php echo ucfirst($type);?></h3>
							<p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
						</div>
						<div class="panel-body">
						<?php
						if(isset($_POST['create']) || isset($p) ){
							
							include "Manager/$type/form.php";
							
							}else{
						include "Manager/$type/tbl.php";
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
