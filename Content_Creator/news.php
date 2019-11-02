<?php
$type="news";
include "includes/header.php"
?>
<section class="content"> 
  <div class="container-fluid">
  <div class="row clearfix">
               <?php
              if($channel_setup_status==1)
              {
                  if(isset($_GET['c_news']))
                {
                    include "manager/news/add_news.php";
                }
                elseif(isset($_GET['m_news']))
                {
                  include "manager/news/manager_manage_news.php";
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