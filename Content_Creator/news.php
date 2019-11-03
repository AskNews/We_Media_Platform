<?php
$type="news";
include "includes/header.php";
 include "engine/engine.php";
 
$imgPath = "img/";
?>
<section class="content"> 
  <div class="container-fluid">
  <div class="row clearfix">
  
               <?php
              if($channel_setup_status==1)
              {
                  if(isset($_GET['c_news']))
                {
                    include "manager/news/form.php";
                }
                elseif(isset($_GET['m_news']))
                {
                  include "manager/news/.php";
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
<?php 
include "includes/footer.php";
?>