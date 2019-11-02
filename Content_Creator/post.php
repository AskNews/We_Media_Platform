
<?php
$type="post";
include 'includes/header.php';
?>
<section class="content"> 
  <div class="container-fluid">
  <div class="row clearfix">
<?php 
 if($channel_setup_status==1)
 {
    if(isset($_GET['all_post']))
    {
    include 'manager/post/table.php'; 
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
include 'includes/footer.php'
?>