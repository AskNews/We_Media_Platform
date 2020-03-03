<?php
$type="Index";
 include "includes/header.php";
 ?>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="slick_slider">
        <?php
			$sql="select * from tbl_slideshow where status='1' ORDER BY orderby ASC";
			$query=mysqli_query($con,$sql);
			while($slideshow=mysqli_fetch_array($query)):
				
			?> 
          <div class="single_iteam"> <a href="pages/single_page.html"> <img src="../Super_Admin/image/slideshow/<?php echo $slideshow['image'];?>" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="pages/single_page.html"><?php echo $slideshow['caption'];?></a></h2>
              <p>Created Date : <?php echo $slideshow['c_date'];?></p>
            </div>
          </div>
          <?php
          endwhile;
          ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Latest post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              <li>
                <div class="media"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">

        <?php
         $sql="select * from tbl_categories where status='1' limit 1";
         $query=mysqli_query($con,$sql);
         $index = 0; 
         $row = mysqli_fetch_array($query)
      
        ?>
            <div class="single_post_content">
            <h2><span><?php echo $row['title'];?></span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                <li>
                <?php
                $cid=$row['id'];
                $sql="select * from tbl_news where Status='1' and Approved='1' and CategoryID='$cid' limit 1";
                $query=mysqli_query($con,$sql);
                $index = 0; 
                $row1 = mysqli_fetch_array($query)
              
                ?>
                  <figure class="bsbig_fig"> <a href="view.php?nid=<?php echo $row1['NewsID'];?>" class="featured_img"> <img alt="" style="height:283px;width:340px;" src="<?php echo "../Content_Creator/img/".$row1['FileAttach'];?>"> <span class="overlay"></span> </a>
                    <figcaption> <a href="view.php?nid=<?php echo $row1['Url'];?>"><?php echo $row1['HeadLine'];?></a> </figcaption>
                    <p><?php echo $row1['Summary'];?></p>
                  </figure>
                </li>
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
              <?php
              $cid=$row['id'];
              $nid=$row1['NewsID'];
              $sql="select * from tbl_news where Status='1' and Approved='1' and CategoryID='$cid' and NewsID!='$nid' limit 4";
              $query=mysqli_query($con,$sql);
              $index = 0; 
              while($row_s1 = mysqli_fetch_array($query)):
            
              ?>
                <li>
                  <div class="media wow fadeInDown"> <a href="view.php?nid=<?php echo $row_s1['Url'];?>" class="media-left"> <img alt="" src="<?php echo "../Content_Creator/img/".$row_s1['FileAttach'];?>"> </a>
                    <div class="media-body"> <a href="view.php?nid=<?php echo $row_s1['Url'];?>" class="catg_title"> <?php echo $row_s1['HeadLine'];?></a> </div>
                  </div>
                </li>
                <?php
                endwhile;
                ?>
              </ul>
            </div>
          </div>
        <div class="fashion_technology_area">
        <?php
        $a=$row['id'];
        $sql="select * from tbl_categories where id NOT IN('$a') and status='1' limit 1";
        $query=mysqli_query($con,$sql);
        $index = 0; 
        $row2 = mysqli_fetch_array($query)
       
          ?>
            
            <div class="fashion">
              <div class="single_post_content">
                <h2><span><?php echo $row2['title'];?></span></h2>
                <ul class="business_catgnav wow fadeInDown">
                  <li>
                  <?php
                $cid=$row2['id'];
                $sql="select * from tbl_news where Status='1' and Approved='1' and CategoryID='$cid' limit 1";
                $query=mysqli_query($con,$sql);
                $index = 0; 
                $row_2 = mysqli_fetch_array($query)
              
                ?>
               
                    <figure class="bsbig_fig"> <a href="view.php?nid=<?php echo $row_2['NewsID'];?>" class="featured_img"> <img alt="" style="height:225px;width:340px;" src="<?php echo "../Content_Creator/img/".$row_2['FileAttach'];?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="view.php?nid=<?php echo $row_2['NewsID'];?>"><?php echo $row_2['HeadLine'];?></a> </figcaption>
                      <p><?php echo $row_2['Summary'];?></p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                <?php
                $cid=$row2['id'];//category
                $nid=$row_2['NewsID'];//news id
                $sql="select * from tbl_news where Status='1' and Approved='1' and CategoryID='$cid' and NewsID!='$nid' limit 4";
                $query=mysqli_query($con,$sql);
                $index = 0; 
                while($row_s1 = mysqli_fetch_array($query)):
              
                ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="view.php?nid=<?php echo $row_s1['Url'];?>" class="media-left"> <img alt="" src="<?php echo "../Content_Creator/img/".$row_s1['FileAttach'];?>"> </a>
                      <div class="media-body"> <a href="view.php?nid=<?php echo $row_s1['Url'];?>" class="catg_title"> <?php echo $row_s1['HeadLine'];?></a> </div>
                    </div>
                  </li>
                  <?php
                  endwhile;
                  ?>
                </ul>
              </div>
            </div>
            <?php
        $b=$row2['id'];
        $sql="select * from tbl_categories where id NOT IN ('$a','$b') and status='1' limit 1";
        $query=mysqli_query($con,$sql);
        $index = 0; 
        $row3 = mysqli_fetch_array($query)
       
          ?>
       
            <div class="technology">
              <div class="single_post_content">
                <h2><span><?php echo $row3['title'];?></span></h2>
                <ul class="business_catgnav">
                <?php
                $cid=$row3['id'];
                $sql="select * from tbl_news where Status='1' and Approved='1' and CategoryID='$cid' limit 1";
                $query=mysqli_query($con,$sql);
                $index = 0; 
                $row_2 = mysqli_fetch_array($query)
              
                ?>
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="view.php?nid=<?php echo $row_2['NewsID'];?>" class="featured_img"> <img alt="" src="<?php echo "../Content_Creator/img/".$row_2['FileAttach'];?>"> <span class="overlay"></span> </a>
                      <figcaption> <a href="view.php?nid=<?php echo $row_2['NewsID'];?>"><?php echo $row_2['HeadLine']?></a> </figcaption>
                      <p><?php echo $row_2['Summary']?></p>
                    </figure>
                  </li>
                </ul>
                <ul class="spost_nav">
                <?php
                $cid=$row3['id'];//category
                $nid=$row_2['NewsID'];//news id
                $sql="select * from tbl_news where Status='1' and Approved='1' and CategoryID='$cid' and NewsID!='$nid' limit 4";
                $query=mysqli_query($con,$sql);
                $index = 0; 
                while($row_s1 = mysqli_fetch_array($query)):
              
                ?>
                  <li>
                    <div class="media wow fadeInDown"> <a href="view.php?nid=<?php echo $row_s1['Url'];?>" class="media-left"> <img alt="" src="<?php echo "../Content_Creator/img/".$row_s1['FileAttach'];?>"> </a>
                      <div class="media-body"> <a href="view.php?nid=<?php echo $row_s1['Url'];?>" class="catg_title"> <?php echo $row_s1['HeadLine'];?></a> </div>
                    </div>
                  </li>
                  <?php
                  endwhile;
                  ?>
                </ul>
              </div>
            </div>
          </div>
        
          <div class="single_post_content">
            <h2><span>Gallery</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
            <?php
            $ini_gallery=mysqli_query($con,"select * from tbl_gallery where status=1 limit 6");
                while($load_gallery=mysqli_fetch_array($ini_gallery)){
                  $gid=$load_gallery['id'];
                  $ini_picture=mysqli_query($con,"select * from tbl_picture where gallery_id=$gid and status=1 and deletion=1");
                  $load_picture=mysqli_fetch_array($ini_picture);
                  
            ?>
              <li>
                <div class="photo_grid">
                  <figure class="effect-layla"> <a class="fancybox-buttons" data-fancybox-group="button" href="images/photograph_img2.jpg" title="<?php echo $load_picture['caption'];?>"> <img src="../Super_Admin/image/gallery/<?php echo $gid."/".$load_picture['image'];?>" alt=""/></a> </figure>
                </div>
              </li>
         <?php
                }
         ?>
             
            </ul>
          </div>
          
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          <div class="single_sidebar">
            <h2><span>Popular Post</span></h2>
            <ul class="spost_nav">
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                </div>
              </li>
              <li>
                <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                  <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                </div>
              </li>
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  <li class="cat-item"><a href="#">Sports</a></li>
                  <li class="cat-item"><a href="#">Fashion</a></li>
                  <li class="cat-item"><a href="#">Business</a></li>
                  <li class="cat-item"><a href="#">Technology</a></li>
                  <li class="cat-item"><a href="#">Games</a></li>
                  <li class="cat-item"><a href="#">Life &amp; Style</a></li>
                  <li class="cat-item"><a href="#">Photography</a></li>
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe>
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                <ul class="spost_nav">
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 1</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 2</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img1.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 3</a> </div>
                    </div>
                  </li>
                  <li>
                    <div class="media wow fadeInDown"> <a href="pages/single_page.html" class="media-left"> <img alt="" src="images/post_img2.jpg"> </a>
                      <div class="media-body"> <a href="pages/single_page.html" class="catg_title"> Aliquam malesuada diam eget turpis varius 4</a> </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Sponsor</span></h2>
            <a class="sideAdd" href="#"><img src="images/add_img.jpg" alt=""></a> </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Category Archive</span></h2>
            <select class="catgArchive">
              <option>Select Category</option>
              <option>Life styles</option>
              <option>Sports</option>
              <option>Technology</option>
              <option>Treads</option>
            </select>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="#">Blog</a></li>
              <li><a href="#">Rss Feed</a></li>
              <li><a href="#">Login</a></li>
              <li><a href="#">Life &amp; Style</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
 <?php
 include "includes/footer.php";
 ?>