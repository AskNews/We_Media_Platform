<?php
$type="feedback";
include "includes/header.php";
include_once "engine/engine.php";?>
   <div class="main-content">
 <div class="container">
 <?php 
  
      if(isset($_GET["feedback"]))
      {
        include "manager/$type/form.php";
      }
     else if(isset($_GET['showfeed']) || isset($_GET['page']))
      {
        include "manager/$type/table.php";
      }
?>
</div>
</div>
<?php
 include "includes/footer.php"; ?>