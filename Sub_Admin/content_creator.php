<?php
$type="content_creator";
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
						include "Includes/msg.php"
						?>
						<?php
						if(isset($_POST['create']) || isset($p) || isset($_GET['edit'])){
							
							include "Manager/$type/form.php";
							
							}else
							{
									if(isset($_POST['m_table'])){
									include "Manager/$type/tbl.php";
									}
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
