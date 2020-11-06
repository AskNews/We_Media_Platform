<div class="wrapper row2">
  <div id="footer" class="clear">
    <div class="one_quarter first">
      <h2 class="footer_title">Footer Navigation</h2>
      <nav class="footer_nav">
        <ul class="nospace">
          <li><a href="../Content_Creator/index.php">Join As Content Creator</a></li>
          <li><a href="#">Join Our We Media Program</a></li>
          <?php
     if(isset($_SESSION['newViewerLogin'])){
     ?>
 <li><a href="logout.php">Logout</a></li>
     <?php
     }else{
     ?>
          <li><a href="login.php">Login</a></li>
          <li><a href="register.php">Register</a></li>
        <?php
     }
        ?>
        </ul>
      </nav>
    </div>
    <div class="one_quarter">
      <h2 class="footer_title">Latest Gallery</h2>
      <ul id="ft_gallery" class="nospace spacing clear">
      <?php
      $sql="select * from tbl_gallery where status='1'";
	  $query=mysqli_query($con,$sql);
	  $index=1;
	  while($row=mysqli_fetch_array($query)){
      $url=createUrlSlug($row['title']);
		  $gallery_id=$row['id'];
		  $pictureSql="Select * from tbl_picture where status='1' and gallery_id='$gallery_id' ORDER BY RAND() LIMIT 1";
		  $pictureQuery=mysqli_query($con,$pictureSql);
		  $count=mysqli_num_rows($pictureQuery);
		  $pictureData=mysqli_fetch_array($pictureQuery);
		  //if picture not found in the gallery then continue the loop
		  if($count==0)
		  continue;
	  ?>
        <li class="one_quarter <?php echo ($index==1 || $index%4==0)?'first':''; ?>"><a href="pictures.php?gallery=<?php echo $url; ?>">
          <img src="../Super_Admin/image/gallery/<?php echo$gallery_id."/".$pictureData['image']; ?>" alt="" style="width:70px;height:70px; " ></a>
           
        </li>
     <?php
	 $index++;
	  }
	 ?>
      </ul>
    </div>
    <div class="one_quarter">
      <h2 class="footer_title">Top Content Creator</h2>
      <div class="tweet-container">
        <ul class="list none">
        <li><strong>@<a href="#">Avinash</a></strong> <span class="tweet_text">Channel Name <span class="at">@</span><a href="#">AviWeb</a> </span> </li>
          <li><strong>@<a href="#">Priyanka</a></strong> <span class="tweet_text">Channel Name <span class="at">@</span><a href="#">Web Tech</a> </span> </li>
          
          <li><strong>@<a href="#">Shabnam</a></strong> <span class="tweet_text">Channel Name <span class="at">@</span><a href="#">Tech Talk</a> </span> </li>
          <li><strong>@<a href="#">Jaimin</a></strong> <span class="tweet_text">Channel Name <span class="at">@</span><a href="#">Knowledge</a> </span> </li>
           </ul>
      </div>
    </div>
    <?php
    ?>
    <div class="one_quarter">
      <h2 class="footer_title">Contact Us</h2>
      <form class="rnd5" action="<?php  echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <?php @$uid=$_SESSION['id']; ?>
      <input type="hidden" name="user_id" value="<?php echo $uid; ?>">
        <div class="form-input clear">
          <label for="ft_author">Name <span class="required">*</span><br>
            <input type="text" name="ft_author" id="ft_author" <?php if(isset($_SESSION['newViewerLogin'])) { echo "readonly"; } else {} ?> value="<?php echo @$_SESSION['newViewerLogin']?>" size="22">
          </label>
          <label for="ft_email">Email <span class="required">*</span><br>
            <input type="text" name="ft_email" id="ft_email" value="<?php echo @$_SESSION['newVieweremail'] ?>" <?php if(isset($_SESSION['newViewerLogin'])) { echo "readonly"; } else {} ?>>
          </label>
        </div>
        <div class="form-message">
          <textarea name="data" id="ft_message" cols="25" rows="10"></textarea>
        </div>
        <p>
          <input type="submit" value="Submit" name="insert_feed" class="button small orange">
          &nbsp;
          <input type="reset" value="Reset" class="button small grey">
        </p>
      </form>
    </div>
<?php
     //}
?>
  </div>
</div>
<div class="wrapper row4">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2020 - All Rights Reserved - <a href="#">Ask News</a></p>
     </div>
</div>
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="layout/scripts/jquery-latest.min.js"><\/script>\
<script src="layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="layout/scripts/responsiveslides.js-v1.53/responsiveslides.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="layout/scripts/custom.js"></script>
<script src="js/lightbox.js"></script>
<script src="js/jquery.min.js"></script>
</body>
</html>

