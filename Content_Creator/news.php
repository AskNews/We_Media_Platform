<?php
$imgPath = "img/";
$type="news";
include "includes/header.php";
include_once "engine/engine.php";
?>

<section class="content"> 
  <div class="container-fluid">
  <div class="row clearfix">
  
               <?php
              if($channel_setup_status==1)
              {
                  if(isset($_GET['c_news'])||isset($_GET['newsid']) ||isset($_GET['newsidModify']))
                {
                    include "manager/$type/form.php";
                }
                elseif(isset($_GET['m_news'])||isset($_POST["btn_search"]) || isset($_POST["btn_filter"]))
                {
                  include "manager/$type/table.php";
                }
                else
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
<?php 
include "includes/footer.php";
?>