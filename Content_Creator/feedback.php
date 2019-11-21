<?php
$type="feedback";
include "includes/header.php";
include_once "engine/engine.php";
?>
<section class="content"> 
  <div class="container-fluid">
  <div class="row clearfix">
    <?php 
    if($channel_setup_status==1)
    {
      if(isset($_GET["feedback"]))
      {
        include "manager/$type/form.php";
      }
      if(isset($_GET['showfeed']))
      {
        include "manager/$type/table.php";
      }
    }
    else
    {
      echo "<big>sorry... :(   <br/><a href=channel_setup.php?channelSetup>please set your channel</a></big>";
    }
?>
  </div>
  </div>
</section>
<?php include "includes/footer.php"; ?>