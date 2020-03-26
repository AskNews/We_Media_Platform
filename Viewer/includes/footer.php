<!-- Footer -->
<div class="wrapper row2">
  <div id="footer" class="clear">
    <div class="one_quarter first">
      <h2 class="footer_title">Footer Navigation</h2>
      <nav class="footer_nav">
        <ul class="nospace">
          <li><a href="#">Join As Content Creator</a></li>
          <li><a href="#">Join Our We Media Program</a></li>
          <li><a href="#">Login</a></li>
          <li><a href="#">Register</a></li>
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
		  $gallery_id=$row['id'];
		  $pictureSql="Select * from tbl_picture where status='1' and gallery_id='$gallery_id' ORDER BY RAND() LIMIT 1";
		  $pictureQuery=mysqli_query($con,$pictureSql);
		  $count=mysqli_num_rows($pictureQuery);
		  $pictureData=mysqli_fetch_array($pictureQuery);
		  //if picture not found in the gallery then continue the loop
		  if($count==0)
		  continue;
	  ?>
        <li class="one_quarter <?php echo ($index==1 || $index%4==0)?'first':''; ?>"><a href="pictures.php?gallery=<?php echo $row['url']; ?>">
          <img src="../Super_Admin/image/gallery/<?php echo$gallery_id."/".$pictureData['image']; ?>" alt="" style="width:70px;height:70px; " ></a>
           
        </li>
     <?php
	 $index++;
	  }
	 ?>
      </ul>
    </div>
    <div class="one_quarter">
      <h2 class="footer_title">From Twitter</h2>
      <div class="tweet-container">
        <ul class="list none">
          <li><strong>@<a href="#">name</a></strong> <span class="tweet_text">RT <span class="at">@</span><a href="#">name</a> Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque.</span> <span class="tweet_time"><a href="#">about 9 hours ago</a></span></li>
          <li><strong>@<a href="#">name</a></strong> <span class="tweet_text">RT <span class="at">@</span><a href="#">name</a> Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque.</span> <span class="tweet_time"><a href="#">about 9 hours ago</a></span></li>
          <li><strong>@<a href="#">name</a></strong> <span class="tweet_text">RT <span class="at">@</span><a href="#">name</a> Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque.</span> <span class="tweet_time"><a href="#">about 9 hours ago</a></span></li>
          <li><strong>@<a href="#">name</a></strong> <span class="tweet_text">RT <span class="at">@</span><a href="#">name</a> Donec suscipit vehicula turpis sed lutpat Quisque vitae quam neque.</span> <span class="tweet_time"><a href="#">about 9 hours ago</a></span></li>
        </ul>
      </div>
    </div>
    <div class="one_quarter">
      <h2 class="footer_title">Contact Us</h2>
      <form class="rnd5" action="#" method="post">
        <div class="form-input clear">
          <label for="ft_author">Name <span class="required">*</span><br>
            <input type="text" name="ft_author" id="ft_author" value="" size="22">
          </label>
          <label for="ft_email">Email <span class="required">*</span><br>
            <input type="text" name="ft_email" id="ft_email" value="" size="22">
          </label>
        </div>
        <div class="form-message">
          <textarea name="ft_message" id="ft_message" cols="25" rows="10"></textarea>
        </div>
        <p>
          <input type="submit" value="Submit" class="button small orange">
          &nbsp;
          <input type="reset" value="Reset" class="button small grey">
        </p>
      </form>
    </div>
  </div>
</div>
<div class="wrapper row4">
  <div id="copyright" class="clear">
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </div>
</div>
<!-- Scripts -->
<script src="https://code.jquery.com/jquery-latest.min.js"></script>
<script src="https://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script>window.jQuery || document.write('<script src="layout/scripts/jquery-latest.min.js"><\/script>\
<script src="layout/scripts/jquery-ui.min.js"><\/script>')</script>
<script>jQuery(document).ready(function($){ $('img').removeAttr('width height'); });</script>
<script src="layout/scripts/responsiveslides.js-v1.53/responsiveslides.min.js"></script>
<script src="layout/scripts/jquery-mobilemenu.min.js"></script>
<script src="layout/scripts/custom.js"></script>
<script src="js/lightbox.js"></script>
</body>
</html>