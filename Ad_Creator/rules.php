<?php
$type="rules";
include "includes/header.php";
include_once "engine/engine.php";
?>
<div class="main-content">
<div class="page-wrapper">
    <?php    
      if(isset($_GET['rules']))
      {
        include "manager/$type/table.php";
      }
    else
    {
      echo "<big>sorry... :(  </big>";
    }
?>
  </div>
  </div>
<?php include "includes/footer.php"; ?>