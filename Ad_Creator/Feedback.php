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
    else
    {
      echo "<big>sorry... :(   <br/><a href=channel_setup.php?channelSetup>please set your channel</a></big>";
    }
  
?>
</div>
</div>
<?php
 include "includes/footer.php"; ?>