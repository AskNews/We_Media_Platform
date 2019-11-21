<?php
$type="qna";
$imgPath = "images/gallery/";

include "includes/header.php";
?>
<br>
<?php
						if(isset($_GET['create']) || isset($p) || isset($_GET['edit'])){
							
							include "Manager/$type/form.php";
							
							}else
							{
									if(isset($_POST['m_table'])){
									include "Manager/$type/tbl.php";
									}
									include "Manager/$type/tbl.php";
									
								}
						?>	
		<br>				
<?php

include "includes/footer.php";
?>