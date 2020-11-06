<?php
$type="news";
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
							<h3 class="panel-title"><?php 
							 if(isset($_GET['approved'])){
								echo "Approved ".ucfirst($type);
							
							 }else  if(isset($_GET['reported'])){
								echo "Reported ".ucfirst($type);
							
							 }
							else{
								echo "Pendding".ucfirst($type);
							
							}?></h3>
							<p class="panel-subtitle"><?php period()?> </p>
						</div>
						<div class="panel-body">
						<?php
						include "Includes/msg.php"
						?>
						<?php
						if(isset($_POST['create']) || isset($p) || isset($_GET['edit'])){
							
							include "Manager/news/form.php";
							
							}else if(isset($_GET['approved'])){
							
								include "Manager/$type/approved-news.php";
							 

							}else if(isset($_GET['reported'])){
								include "Manager/$type/reported-news.php";

							}
							else
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
