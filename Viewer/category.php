<?php
$type="categories";
include "includes/header.php";

//single post 
$c=mysqli_query($con,"select * from tbl_news where CategoryID='$data[id]' and Status=1 and Approved=1 and Offline=0");
$d=mysqli_fetch_array($c);

?>
<section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          <div class="single_post_content">
            <h2><span><?php echo @$data['title'];?></span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                  <figure class="bsbig_fig"> <a href="view.php?nid=<?php echo $d['Url'];?>" class="featured_img"> <img alt="" style="height:300px;" src="../Content_Creator/img/<?php echo $d['FileAttach'];?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="view.php?nid=<?php echo $d['Url'];?>"><?php echo $d['HeadLine'];?></a> </figcaption>
                    <p><?php echo $d['Summary'];?></p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
               <?php
               while($result=mysqli_fetch_array($c)){
               ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="view.php?nid=<?php echo $result['NewsID'];?>" class="media-left"> <img alt="" src="../Content_Creator/img/<?php echo $d['FileAttach'];?>"> </a>
                    <div class="media-body"> <a href="view.php?nid=<?php echo $result['NewsID'];?>" class="catg_title"> <?php echo $result['HeadLine'];?></a> </div>
                  </div>
                </li>
                <?php
               }
                ?>
              </ul>
            </div>
          </div>
  </section>
<?php
include "includes/footer.php";
?>