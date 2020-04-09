<?php
$type="news";
include 'includes/header.php';
$user=@$_SESSION['newViewerLogin'];
$uid=$_SESSION['id'];
//mysqli_query($con,"insert into tbl_recent(user,news_id) values('".$user."','".$res_view['id']."')");
?>
<!---content--->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <section class="clear">
     
     <h1><?php echo $res_view['HeadLine'];?></h1><br/>
     <div class="imgl">
        <img src="../Content_Creator/img/<?php echo $res_view['FileAttach'];?>" style=" padding:15px;width:160px; height:160px;" alt="">
      </div><br/>
     <p><?php  echo $res_view['Details']; ?></p><br/>
     <p><h3>Summary:-</h3> <?php  echo $res_view['Summary']; ?></p>
     <br/><br/>
     <form class="rnd5" action="#" id='comment' method="post">
     <input type='hidden' name='id' id='newsid' value="<?php echo $res_view['id']?>">
     <input type='hidden' name='user_name' id='user_name' value="<?php echo $user?>">
     <input type='hidden' name='cid' id='cid' value="<?php echo $res_view['CreatorID']?>">
     <input type='hidden' name='uid' id='uid' value="<?php echo $uid; ?>">
     
     <?php $qry=mysqli_query($con,"select username,ChannelName,ChannelDescription from tbl_content_creator where id=".$res_view['CreatorID']);
     $row=mysqli_fetch_array($qry);
     $c_name=$row['username'];
     ?>
     posted by:-<h4><a href="javascript:void()" class="channel_details"  ><?php echo $c_name ?></a></h4><br/>
     <div class="myDIV">
      <h4>Channel Details:-</h4><?php echo $row['ChannelName']?><br/>
      <?php echo $row['ChannelDescription']?>
      </div>

      <?php $qry=mysqli_query($con,"select * from tbl_follower where viewer_id='".$uid."' and content_creator_id='".$res_view['CreatorID']."'"); ?>
      <input type='hidden' <?php echo mysqli_num_rows($qry)>0?'value="yes"':'value="no"'; ?> name='isFollow' id='isFollow' >
      <input type='button' id='follow' class='button small gradient blue' name='follow' <?php echo mysqli_num_rows($qry)>0?'value="UnFollow"':'value="Follow"'; ?> >

      <?php $qry=mysqli_query($con,"select * from tbl_like where viewer_id='".$uid."' and news_id='".$res_view['id']."'") ?>
      <input type='hidden' <?php echo mysqli_num_rows($qry)>0?'value="yes"':'value="no"'; ?> name='isLike' id='isLike' >
      <span id='like'  <?php echo mysqli_num_rows($qry)>0?'class="icon-heart icon-3x"':'class="icon-heart-empty icon-3x"'; ?> ></span><br/><br/>
     
     <div class="form-input clear">
      <div class="form-message">
        <textarea name="comment" placeholder='add your comment here.........' id="ft_message" cols="10" rows="5"></textarea>
      </div>
      <p>
        <input type="button" id="btnSave" value="Send" name='send_comment'  class="button small orange">
        &nbsp;
        <input type="reset" value="Reset" class="button small grey">
       <br/>
      <br/><br/>
      
      </p>
      </bel>
      </div>
      </form>
    </section>
    <li>
        <h2>Comments</h2><br/><br/>
        <ul class="list underline list arrow">
        <?php $qry=mysqli_query($con,"select * from tbl_comment where status=1 and news_id=".$res_view['id']);  
        while ($row=mysqli_fetch_array($qry)) { ?>
          <li ><b>
          <?php echo $row['user_name'] ?><br/>
          </b><?php echo $row['comment']?></li>
        <?php } ?>
        </ul>
      </li>
    <div class="clear"></div>
    <!-- ################################################################################################ -->
  </div>
</div>
<script src='js/jquery.min.js'></script>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  $(".myDIV").addClass('hide');
  $(".channel_details").click(function(){
    $(".myDIV").removeClass('hide');
  });

  $("#btnSave").click(function(){
    console.log($("#comment").serialize());
    $.ajax({
        url: "engine/engine.php",
        type: "POST",
        data: $("#comment").serialize(),
        success:function(data)
        {
          location.reload();
        },
        error:function(error)
        {
          alert('comment not send..:(');
        }
      });
  })
  $("#follow").click(function(){
    $.ajax({
        url: "engine/engine.php",
        type: "POST",
        data:{ user_name:$("#user_name").val(),CreatorID:$("#cid").val(),viewer_id:$('#uid').val(),isFollow:$("#isFollow").val()},
        success:function(data)
        {
          alert(data);
          location.reload();
        }
      });
  })
  $("#like").click(function(){
    console.log($('#uid').val());
    console.log($('#newsid').val());
    console.log($("#isLike").val());
    $.ajax({
        url: "engine/engine.php",
        type: "POST",
        data:{ viewer_id:$("#uid").val(),news_id:$("#newsid").val(),isLike:$("#isLike").val()},
        success:function(data)
        {
          alert(data);
          location.reload();
        }
      });
  })
});
</script>
<?php
include 'includes/footer.php';
?>