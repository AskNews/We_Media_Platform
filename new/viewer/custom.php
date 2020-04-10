<?php
$type="custom";
include "includes/header.php";
$index=1;
?>
<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="portfolio" class="three_quarter <?php echo $index++%2 !=0?'first':'';?>">
    <h2><?php echo $data['title']; ?></h2>
      <ul class="clear">
       <?php
		 //find out the news related to the category
		 
		 $cat_id=$data['id'];
		 $sql="select * from tbl_news where Status ='1' and Approved='1' and CreatorID=".$_GET['id']." order by id PublishDate desc ";
		 $query=mysqli_query($con,$sql);
		 
		 
		 while($row = mysqli_fetch_array($query)):
		 ?>
        <li class="one_half first">
          <article class="clear">
           <?php
        if(file_exists("../Content_Creator/img/".$row['FileAttach']) && !empty($row['FileAttach'])){
		?>
            
            <img src="../Content_Creator/img/<?php echo $row['FileAttach']; ?>" style="width:420px; height:140px; " alt="">
           
            <?php
		}
				?>
            <header>
              <h2 class="blog-post-title"><a href="news.php?news=<?php echo $row['Url']; ?>"><?php echo substr($row['HeadLine'],0,30); ?> ...</a></h2>
              <div class="blog-post-meta">
                <ul>
                  <li class="blog-post-date">
                    <time datetime="2000-04-06T08:15+00:00"><strong>Date: </strong><?php echo date("F j, y, g:i a", strtotime($row['PostDate'])); ?></time>
                  </li>
                  <li class="blog-post-cats"></li>
                </ul>
              </div>
            </header>
            <p><?php echo substr($row['Summary'],0,70); ?> ...</p>
            <footer class="read-more"><a href="news.php?news=<?php echo $row['Url']; ?>">Read More &raquo;</a></footer>
          </article>
        </li>
         <?php
          endwhile;
?>
       
      </ul>
     
    </div>
    <!-- ################################################################################################ -->
    <div id="sidebar_1" class="sidebar one_quarter">
      <aside>
        <!-- ########################################################################################## -->
        <h2><?php echo $data['title']; ?></h2>
        <nav>
          <ul>
          <?php
		 //find out the news related to the category
		 
		 $cat_id=$data['id'];
		 $sql="select * from tbl_news where Status ='1' and Approved='1' and CategoryID='$cat_id' order by id DESC LIMIT 10";
		 $query=mysqli_query($con,$sql);
		 
		 
		 while($row = mysqli_fetch_array($query)):
		 ?>
            <li>
           <a href="news.php?news=<?php echo $row['Url']; ?>"><?php echo substr($row['HeadLine'],0,50); ?> ...</a></li>
            <?php
          endwhile;
?>
          </ul>
        </nav>
        <!-- /nav -->
        
        <!-- /section -->
        <section>
          <article>
            <img style="height:550px;width:300px;">
          </article>
        </section>
        <!-- /section -->
        <!-- ########################################################################################## -->
      </aside>
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<?php 
include "includes/footer.php";
?>