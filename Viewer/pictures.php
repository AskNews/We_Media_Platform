<?php
//session_start();
$type="gallery";
include "includes/header.php";
if(isset($_GET['gallery'])){
	$url=$_GET['gallery'];
	$sql="select * from tbl_gallery where status='1' and url='$url'";
	$query=mysqli_query($con,$sql);
	$result1=mysqli_fetch_array($query);
	if($result1){
		$gallery_id=$result1['id'];
		
		$title=$result1['seo_title'];
		$description=$result1['seo_desc'];
		
		}
	}
?>


<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="gallery">
      <section>
       <?php
      if(isset($result1) && $result1):
	  ?>
        <figure>
          <h2><?php echo $result1['title']; ?></h2>
          <ul class="clear">
          <?php
          $sql="SELECT * FROM tbl_picture WHERE status='1' AND gallery_id='$gallery_id'";
		  $query=mysqli_query($con,$sql);
		  $index=1;
		  while($row=mysqli_fetch_array($query)){
		  ?>
            <li class="one_fifth <?php echo ($index==1 || $index%6==0)?'first':'';?>">
            <a href="../Super_Admin/image/gallery/<?php echo $gallery_id."/".$row['image'];?>" data-lightbox="<?php echo $result1['title']; ?>" data-title="<?php echo $row['caption']; ?>"><img src="../Super_Admin/image/gallery/<?php echo $gallery_id."/".$row['image'];?>" alt=""></a></li>
            <?php
			$index++;
      }
      //../Super_Admin/image/gallery/<?php echo$gallery_id."/".$pictureData['image']; 
			?>
          </ul>
          
        </figure>
        <?php
        else:
		echo "<h2>Gallery not found</h2>";
		endif;
		?>
      </section>
     
    <div class="clear"></div>
  </div>
</div>

<?php 
include "includes/footer.php";
?>