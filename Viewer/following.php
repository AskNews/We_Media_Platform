<?php
session_start();
include "admin/includes/dbconfig.php";

if(isset($_SESSION['newViewerLogin'])){
  	//content type defer function, where we redirect the page to the login page
	}else{
    header("location: login.php");
  }

include "includes/header.php";

?>

<?php
$viewid=$_SESSION['newViewerLogin'];
$sqq="select * from dbviewer where user_name='$viewid'";
$qwe=mysqli_query($con,$sqq);
$fdc=mysqli_fetch_array($qwe);
$azx=$fdc['id'];
$sql="select * from dbfollower where receiver_id='$azx'";
$qwee=mysqli_query($con,$sql);
?>
<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <section>
      <h2>My Followings</h2>
      <ul class="nospace clear">
       <?php
       while($qee=mysqli_fetch_array($qwee)){
         ?>
 <li class="one_quarter first">
   <?php
   $fgh=$qee['sender_id'];
   $sqln="select * from dbccreator where id='$fgh'";
   $qween=mysqli_query($con,$sqln);
   $fdcn=mysqli_fetch_array($qween);
   ?>
          <figure class="team-member"><img src="content-creator/images/profile/<?php echo $fdcn['profile_image'];?>" alt="" style="height:250px;width:300px">
            <figcaption>
              <p class="team-name"><?php echo $fdcn['channel_name'];?></p>
              <?php
$ceator_id=$fdcn['id'];
               $sq34="select count(*) from dbfollower where sender_id='$ceator_id'";
               $query34=mysqli_query($con,$sq34);
               $chk34=mysqli_fetch_row($query34);
                             
              ?>
              <p class="team-title">Followers (<?php print_r($chk34[0])?>)</p>
              <p class="team-description"><?php echo $fdcn['desc'];?>&hellip;</p>
              <p class="read-more"><a href="detail.php?aa=<?php echo $fdcn['id']; ?>">Read More &raquo;</a></p>
            </figcaption>
          </figure>
        </li>
         <?php
       }
       ?>
        
      </ul>
    </section>
   
  </div>
</div>

<?php 
include "includes/footer.php";
?>