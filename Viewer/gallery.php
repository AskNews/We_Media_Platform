<?php
//session_start();
$type="gallery";
include "includes/header.php";

?>


<!-- content -->
<div class="wrapper row3">
  <div id="container">
    
    <section>
      <!-- <h2>Recent Photo Gallery</h2> -->
      <ul class="nospace clear">
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
        <li class="one_quarter <?php echo $index++==1?'first':''; ?>">
          <figure class="team-member"><img src="../Super_Admin/image/gallery/<?php echo$gallery_id."/".$pictureData['image']; ?>" alt="" style="width:200px;height:200px;">
            <figcaption>
              <p class="team-name"><?php echo $row['title'];?></p>
              <p class="team-title">Location: <?php echo $row['location'];?><br />Date: <?php echo $row['date'];?></p>
              <?php  $url=createUrlSlug($row['title']); ?>
              <p class="read-more"><a href="pictures.php?gallery=<?php echo $url; ?>">View Pictures &raquo;</a></p>
            </figcaption>
          </figure>
        </li>
     <?php
	  }
	 ?>
      </ul>
    </section>
    
    <div class="clear"></div>
  </div>
</div>
<?php 
include "includes/footer.php";
?>