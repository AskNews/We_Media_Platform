<?php
$type="feedback";
include "includes/header.php";?>
   <div class="main-content">
 <div class="container">
<?php include "manager/$type/form.php";

if(isset($_POST['myfeed']))
      {
        include "manager/$type/table.php";
      }
      ?>
</div>
</div>
<?php
 include "includes/footer.php"; ?>