<?php
$type="news";
include 'includes/header.php';
$user=@$_SESSION['newViewerLogin'];
$uid=@$_SESSION['id'];

@$uid=$_SESSION['id'];
if(@$uid!=null)
{
  mysqli_query($con,"delete from tbl_recent where user='".$user."' and news_id='".$res_view['id']."'"); 
  mysqli_query($con,"insert into tbl_recent(user,news_id) values('".$user."','".$res_view['id']."')");
}

$sql_ad=mysqli_query($con,"SELECT * FROM tbl_adunit where status='1' ORDER BY RAND ( )  LIMIT 1");
$row=mysqli_fetch_array($sql_ad);
?>
<div class="wrapper row3">
  <div id="container">
  <div class="two_quarter first">
      <section class="clear">
      

      <div id="player"></div>
      <form method='post'>
     
     <h1 id='read-1'><?php echo $res_view['HeadLine'];?></h1>
  
      <br/>
     
      <div class="polaroid">
        <img src="../Content_Creator/img/<?php echo $res_view['FileAttach'];?>" alt="news image" style="width:100%; height:160px;">
        <div class="container">
             <p><b><font size='5' style="text-align:center" >News</font></b></p>
        </div>
      </div>
      <span class='icon-volume-up icon-4x'  id='texttospeechh'></span><br/><br/>
      <div id='read-2'><?php  echo substr($res_view['Details'],0,100); ?></div> <br/><br/>

      <div class="polaroid">
      <a href="<?php echo $row['url']?>" ><img src="../Ad_Creator/img/<?php echo $row['file_attach'];?>" alt="ad image" style="width:100% height:160px">
        </a>
        <div class="container">
        <p ><b><font size='5' style="text-align:center" >Ad</font></b></p>
        </div>
      </div>
      
     
      <p id='read-3'><?php  echo substr($res_view['Details'],101); ?></p><br/>

      </form>
    
      <div class="sharethis-inline-share-buttons"></div>
      </section>
       <div id="respond">
        <h2>Comment</h2>
        <form class="rnd5" action="#" method="post">
        <input type='hidden' name='id' id='newsid' value="<?php echo $res_view['id']?>">
        <input type='hidden' name='aid' id='ad_id' value="<?php echo $row['ad_id']?>">
        <input type='hidden' name='cpc' id='cpc' value="<?php echo $row['cpc']?>">
        <input type='hidden' name='user_name' id='user_name' value="<?php echo $user?>">
        <input type='hidden' name='cid' id='cid' value="<?php echo $res_view['CreatorID']?>">
        <input type='hidden' name='uid' id='uid' value="<?php echo $uid; ?>">
        <?php $qry=mysqli_query($con,"select username,ChannelName,ChannelDescription,channel_logo from tbl_content_creator where id=".$res_view['CreatorID']);
        $row=mysqli_fetch_array($qry);
        $c_name=$row['username'];
        ?>
          <div class="form-message">
            <textarea name="comment" placeholder='add your comment here....' id="comment" cols="10" rows="5"></textarea>
          </div>
          <p>
            <input type="button" id="btnSave" value="Send" name='send_comment'  class="button small orange">
            <input type="reset" value="Reset" class="button small grey">
          </p>
        </form>
      </div>
    </div>
    <!-- ################################################################################################ -->
    <div id="sidebar_1" class="sidebar two_quarter">
      <aside>
        <!-- ########################################################################################## -->
        <h2>Channel Details</h2>
        <nav>
          <ul>
          <li>
          posted by:-<br/><br/>
          <div class="imgl">
          <img src="../Content_Creator/img/<?php echo $row['channel_logo'];?>" style=" width:35px; height:35px;border-radius:50%" alt="">
        </div>
          <h4 style="padding-bottom:15px"><a href="javascript:void()" class="channel_details"  ><?php echo $c_name ?></a></h4><br/><li>
          <li><div class="myDIV">
          <h4>Channel Details:-</h4><?php echo $row['ChannelName']?><br/>
          <?php echo $row['ChannelDescription']?><br/>
          </div></li>
        </ul>  
          <h2>Follow & Like & Report</h2>  
          <ul class="list underline list arrow">  
          <?php $qry=mysqli_query($con,"select * from tbl_follower where viewer_id='".$uid."' and content_creator_id='".$res_view['CreatorID']."'");
          $fl_count=mysqli_query($con,"select count(f.id) as follower from tbl_follower f, tbl_content_creator c where f.content_creator_id=c.id and c.id=".$res_view['CreatorID']);
          $fl=mysqli_fetch_array($fl_count);
          $fl=$fl['follower'];  
          ?>
          <div style="display:inline">
          <input type='hidden' <?php echo mysqli_num_rows($qry)>0?'value="yes"':'value="no"'; ?> name='isFollow' id='isFollow' >
            <li><input type='button' id='follow' class='button small gradient blue' name='follow' <?php echo mysqli_num_rows($qry)>0?'value="UnFollow"':'value="Follow"'; ?> ><br/><br/><p> total followers are :- <?php echo $fl;?></p>
            </li>
          <div class='like' style='margin-left:250px;margin-top:-90px'>
          <?php $qry=mysqli_query($con,"select * from tbl_like where viewer_id='".$uid."' and news_id='".$res_view['id']."'");
            $l_count=mysqli_query($con,"select count(id) as l from tbl_like where news_id in (select id from tbl_news where id=".$res_view['id'].")");
            $t_like=mysqli_fetch_array ($l_count);
            $t_like=$t_like['l'];
          ?>
          <input type='hidden' <?php echo mysqli_num_rows($qry)>0?'value="yes"':'value="no"'; ?> name='isLike' id='isLike' >
          <li><span id='like'  <?php echo mysqli_num_rows($qry)>0?'class="icon-heart icon-3x"':'class="icon-heart-empty icon-3x"'; ?> ></span>
          <br/><p>total likes :- <?php echo $t_like; ?></p>
          </li>
          </div> 
          <div class='report' style='margin-left:430px;margin-top:-80px'>
          <li ><a title="Report" href="javascript:void();"><span id='report'  class="icon-flag icon-3x " ></a></span>
          </li>
          </div> 
          </div>
          </ul><br/><br/>
        <h2>Comments</h2><br/><br/>
        <form method='post'>
        <ul class="list underline list arrow">
        <?php $qry=mysqli_query($con,"select * from tbl_comment where status=1 and to_comment='' and news_id=".$res_view['id']);  
        while ($r=mysqli_fetch_array($qry)) { ?>
          <li ><b>
          <?php echo $r['user_name'] ?><br/>
          </b><?php echo $r['comment']?></li>
          <?php
    
            echo "<input data-id=".$r['id']." class='jsText' type='text' placeholder='replay to ".$r['user_name']."' name='replay'>";
            echo "<input data-id=".$r['id']." class='jsButton button small orange' type='button'  value='send'><br/>";
            echo "<input data-id=".$r['id']." class='jsHidden' type='hidden'  value='".$r['id']."'>";
            echo "<input data-id=".$r['id']." class='jsHiddenname' type='hidden'  value='".$r['user_name']."'><br/>";
            show_comment($r['id']);
          ?>
        <?php }
        
        function show_comment($id) {
          $margin=20;
          $con=mysqli_connect('localhost','root','','dbasknews');
          if(mysqli_query($con,'select id,comment,user_name from tbl_comment where to_comment='.$id))
          {
            $recom=mysqli_query($con,'select id,comment,user_name from tbl_comment where to_comment='.$id);
            $user=mysqli_query($con,'select user_name as user from tbl_comment where id='.$id);
            $uname=mysqli_fetch_array($user);
            $uname=$uname['user'];
            while($r1=mysqli_fetch_assoc($recom))
            {
              echo "<div style='margin-left:".$margin."px'>";
              echo "<b>".$r1['user_name']."</b> <span class='icon-circle-arrow-right '></span> ";
              echo "<b>@".$uname."</b> ".$r1['comment']."<br/>";
              echo "<input data-id=".$r1['id']." class='jsText' type='text' placeholder='replay to ".$r1['user_name']."' name='replay'>";
              echo "<input data-id=".$r1['id']." class='jsButton button small orange' type='button'  value='send'><br/>";
              echo "<input data-id=".$r1['id']." class='jsHidden' type='hidden'  value='".$r1['id']."'>";
              echo "<input data-id=".$r1['id']." class='jsHiddenname' type='hidden'  value='".$r1['user_name']."'><br/>";
              $margin=$margin+20;
              show_comment($r1['id']);
              echo "</div>";
            }
          }
        }	
        
        ?>
        </ul>
        </form>
      </li>    
          </ul>
        </nav>
        <!-- /nav -->
        <!-- /section -->
        <!-- ########################################################################################## -->
      </aside>
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<script src='js/jquery.min.js'></script>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  $.ajax({
      url:"engine/engine.php",
      type:"POST",
      data:{ ad_id:$("#ad_id").val(),news_id:$("#newsid").val(),user_id:$("#uid").val(),cpc:$("#cpc").val() },
      success:function(data)
      {
        //alert(data);
        lecation.reload();
      }
    });
  $(".myDIV").addClass('hide');
  $(".channel_details").click(function(){
    $(".myDIV").removeClass('hide');
  });
  $("#btnSave").click(function(){
    if($("#user_name").val()!="")
    {
      $.ajax({
          url: "engine/engine.php",
          type: "POST",
          data: { user_name:$("#user_name").val(),comment:$("#comment").val(),news_id:$("#newsid").val()},
          success:function(data)
          {
            //location.reload();
            alert(data);
          }
        });
    }
    else
    {
      alert("please login...");
    }
  })
  $("#follow").click(function(){
    if($("#user_name").val()!="")
    {
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
    }
    else
    {
      alert("please login...");
    }
  })
  $("#like").click(function(){
    if($("#uid").val()!=0)
    {
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
    }
    else
    {
      alert("please login...");
    }
  })
  $("#report").click(function(){
  if($("#uid").val()!=0)
  {
    $.ajax({
      url:"engine/engine.php",
      type:"POST",
      data:{ user_id:$("#uid").val(),news_id:$("#newsid").val()},
      success:function(data)
      {
        alert(data);
      }
    });
  }
    else
    {
      alert("please login...");
    }
  })
  $('#texttospeechh').click(function(){
		var txt=$('#read-1').text()+" "+$('#read-2').text()+" "+$('#read-3').text();
		console.log(txt);
		$.ajax({
			url:'engine/engine.php',
			type:'post',
			data:'txt='+txt,
			success:function(result){
				$('#player').html(result);
			}
		});
	});
  let currentComment=null;
		$(".jsButton").click(function(){
			currentComment=$(this).data('id');
			var tocom=$(`.jsHidden[data-id='${currentComment}']`).val();
			var comm=$(`.jsText[data-id='${currentComment}']`).val();
			var user=$(`.jsHiddenname[data-id='${currentComment}']`).val();
      var newsid=$('#newsid').val();
			console.log('comm =>'+ comm);				
			console.log('to  comment id =>'+ tocom);	
			console.log('to user =>'+ user);	
      console.log('new id =>'+ newsid);
			$.ajax({
				url:'comment_chat.php',
				type:'POST',
				data:{
          comment:$(`.jsText[data-id='${currentComment}']`).val(),
          to_com:$(`.jsHidden[data-id='${currentComment}']`).val(),
          news_id:$('#newsid').val(),
          user_name:$('#user_name ').val()
        },
				success:function(result)
				{
          alert(result+$(`.jsHiddenname[data-id='${currentComment}']`).val());
          location.reaload();
					
				}
		 });
		});
});
</script>
<?php
include 'includes/footer.php';
?>