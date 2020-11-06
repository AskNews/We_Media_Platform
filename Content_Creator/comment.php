<?php
$type="comment";
include 'includes/header.php';
include_once "engine/engine.php";
?>
<section class="content"> 
  <div class="container-fluid">
  <div class="row clearfix">
<?php
if($channel_setup_status==1)
{
if(isset($_GET['comment']) || isset($_GET['approve']) || isset($_GET['spam'])|| isset($_GET['deleteComment']) || isset($_GET['page']) )
{
include 'manager/comment/table.php';
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
include 'includes/footer.php';
?>