<?php
$type="follower";
$uid=$_SESSION['id'];
$qry=mysqli_query($con,"select count(*) as c from tbl_follower where viewer_id=".$uid);
$c=mysqli_fetch_array($qry);
$c=$c['c'];
$rec=ceil($c/4);
echo $rec." ".$c;
$t=0;
?>
<div id="container">
<ul class="nospace clear">
<?php while($t<=$c){ ?>
<li class="one_quarter first">
    <ul class="list underline">
    <?php
    if($t<=$c)
    {
        $qry=mysqli_query($con,"select id,username,channel_logo from tbl_content_creator where id in(select content_creator_id from tbl_follower where viewer_id=".$uid.") limit ".$t." ,".$rec);
        $t=$t+$rec;
        while($row=mysqli_fetch_array($qry))
        {
        ?>
        <div class="imgl">
        <img src="../Content_Creator/img/<?php echo $row['channel_logo'];?>" style=" width:35px;height:35px;border-radius:50%;" alt="">
      </div>
      <li><h4><a href="new.php?id=<?php echo $row['id'];?>"><?php echo $row['username'] ?></a></h4?<br/></li>
        <?php }
    } ?>
    </ul>
</li>
<li class="one_quarter push30">
    <ul class="list underline">
    <?php
    if($t<=$c)
    {
        $qry=mysqli_query($con,"select id,username,channel_logo from tbl_content_creator where id in(select content_creator_id from tbl_follower where viewer_id=".$uid.") limit ".$t." ,".$rec);
        $t=$t+$rec;
        while($row=mysqli_fetch_array($qry))
        {
        ?>
        <div class="imgl">
        <img src="../Content_Creator/img/<?php echo $row['channel_logo'];?>" style=" width:35px;height:35px;border-radius:50%;" alt="">
      </div>
      <li><h4><a href="new.php?id=<?php echo $row['id'];?>"><?php echo $row['username'] ?></a></h4?<br/></li>
        <?php }
    } ?> 

    </ul>
</li>
<li class="one_quarter push30">
    <ul class="list underline">
    <?php
    if($t<=$c)
    {
        $qry=mysqli_query($con,"select id,username,channel_logo from tbl_content_creator where id in(select content_creator_id from tbl_follower where viewer_id=".$uid.") limit ".$t." ,".$rec);
        $t=$t+$rec;
        while($row=mysqli_fetch_array($qry))
        {
        ?>
        <div class="imgl">
        <img src="../Content_Creator/img/<?php echo $row['channel_logo'];?>" style=" width:35px;height:35px;border-radius:50%;" alt="">
      </div>
      <li><h4><a href="new.php?id=<?php echo $row['id'];?>"><?php echo $row['username'] ?></a></h4?<br/></li>
        <?php }
    } ?> 
    </ul>
</li>
<li class="one_quarter push30">
    <ul class="list underline">
    <?php
   if($t<=$c)
   {
       $qry=mysqli_query($con,"select id,username,channel_logo from tbl_content_creator where id in(select content_creator_id from tbl_follower where viewer_id=".$uid.") limit ".$t." ,".$rec);
       $t=$t+$rec;
       while($row=mysqli_fetch_array($qry))
       {
       ?>
       <div class="imgl">
       <img src="../Content_Creator/img/<?php echo $row['channel_logo'];?>" style=" width:35px;height:35px;border-radius:50%;" alt="">
     </div>
     <li><h4><a href="new.php?id=<?php echo $row['id'];?>"><?php echo $row['username'] ?></a></h4?<br/></li>
       <?php }
   } ?>
    </ul>
    </li>
<?php } ?>
</ul>
</div>