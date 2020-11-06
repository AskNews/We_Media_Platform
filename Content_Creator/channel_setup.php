<?php
$type="channel";
include "includes/header.php"
?>
<section class="content"> 
  <div class="container-fluid">
  <div class="row clearfix">
    <?php
      
        if(isset($_GET['channelSetup']))
        {
            include 'manager/channelSetup/form.php';
        }
    ?>
  </div>
  </div>
</section>
<?php 
include "includes/footer.php";
?>