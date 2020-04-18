<?php
$type="index";
include 'includes/header.php';
?>
<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <div id="homepage" class="clear">
      <div class="two_third first">
        <section class="main_slider">
          <div class="rslides_container clear">
            <ul class="rslides clear" id="rslides">
            <?php
            $sql="select * from tbl_slideshow where status='1' ORDER BY orderby ASC";
            $query=mysqli_query($con,$sql);
            while($slideshow=mysqli_fetch_array($query)):
            ?> 
              <li><img src="../Super_Admin/image/slideshow/<?php echo $slideshow['image'];?>" style="width:600; height:300px;" alt=""></li>  
            <?php
            endwhile;
            ?>
            </ul>
          </div>
        </section>    
        <div class="divider2"></div>
        <?php
        $sql="select * from tbl_categories where status='1'";
		$query=mysqli_query($con,$sql);
		$index = 1; 
		while($row = mysqli_fetch_array($query)):
		?>
        <article class="one_half push30 <?php echo $index++%2 !=0?'first':'';?>">
         <h2><?php echo $row['title']; ?></h2>
         <?php
		 //find out the news related to the category
		 $cat_id=$row['id'];
		 $subSql="select * from tbl_news where Status ='1' and Approved='1' and CategoryID='$cat_id' order by PublishDate DESC LIMIT 6";
		 $subQuery=mysqli_query($con,$subSql);
		 $firstNews=mysqli_fetch_array($subQuery);
		?>
    <?php
    if(file_exists("../Content_Creator/img/".$firstNews['FileAttach']) && !empty($firstNews['FileAttach'])){
		?>
      <div ><img alt="" style="height:283px;width:340px;" src="<?php echo "../Content_Creator/img/".$firstNews['FileAttach'];?>"></div><?php
		}
				?>
        <h2><?php echo substr($firstNews['HeadLine'],0,60);?> ...</h2>
          <p><?php echo substr($firstNews['Summary'],0,60);?> ...</p>
          <footer class="read-more"><a href="news.php?news=<?php echo $firstNews['Url']; ?>">Read More &raquo;</a></footer>
           <ul class="list underline push50">
           <?php
           while($subRow = mysqli_fetch_array($subQuery)):
		    ?>
          <li><a href="news.php?news=<?php echo $subRow['Url']; ?>"><?php echo substr($subRow['HeadLine'],0,60);?> ...</a></li>
          <?php
          endwhile;
?>
</ul>
        </article>
        <?php
        endwhile;
		?>
      </div>
      <!-- #### -->
      <div class="one_third">
        <div class="tab-wrapper clear">
          <ul class="tab-nav clear">
            <li><a href="#tab-1">Top News</a></li>
            <li><a href="#tab-2">Popular News</a></li>
            <li><a href="#tab-3">Recent News</a></li>
          </ul>
          <div class="tab-container">
            <!-- Tab Content -->
            <div id="tab-1" class="tab-content clear">
              <article class="clear push20">
              <?php
            $sql="select * from tbl_news where Status='1' and Approved='1' and TopNews='1' order by id DESC LIMIT 5";
      $query=mysqli_query($con,$sql);
      print_r(mysqli_fetch_array($query));
			while($row=mysqli_fetch_array($query)){
			?>       <article class="clear push20">
              <?php
        if(file_exists("../Content_Creator/img/".$row['FileAttach']) && !empty($row['FileAttach'])){
		?>
                <div class="imgl"><img src="../Content_Creator/img/<?php echo $row['FileAttach'];?>" style="width:50px; height:50px;" alt=""></div><?php
		}
				?>
                <h2 class="font-medium nospace"><a href="news.php?news=<?php echo $row['Url'];?>"><?php echo substr($row['HeadLine'],0,30); ?> ...</a></h2>
                <p class="nospace"><?php echo substr($row['Summary'],0,60); ?>...</p>
              </article>
              <?php
			}
			  ?>
              </article>
            </div>
            <!-- ## TAB 2 ## -->
            <div id="tab-2" class="tab-content clear">
              <article class="clear push20">
             <?php
              $sql="select * from tbl_news where Status='1' and Approved='1' order by Views DESC LIMIT 5";
			$query=mysqli_query($con,$sql);
			while($row=mysqli_fetch_array($query)){
			?>
              <article class="clear push20">
              <?php
       if(file_exists("../Content_Creator/img/".$row['FileAttach']) && !empty($row['FileAttach'])){
        ?>
                <div class="imgl"><img src="../Content_Creator/img/<?php echo $row['FileAttach'];?>" style="width:50px; height:50px;" alt=""></div><?php
		}
				?>
                <h2 class="font-medium nospace"><a href="news.php?news=<?php echo $row['Url'];?>"><?php echo substr($row['HeadLine'],0,30); ?> ...</a></h2>
                <p class="nospace"><?php echo substr($row['Summary'],0,60); ?>...</p>
              </article>
              <?php
			}
			  ?>
              </article>
            </div>
            <!-- ## TAB 3 ## -->
            <div id="tab-3" class="tab-content clear">
            <?php 
            @$query=mysqli_query($con,"select * from tbl_news where id in(select DISTINCT(news_id) from tbl_recent where user='".$_SESSION['newViewerLogin']."' order by c_date desc ) limit 5");
            while($row=mysqli_fetch_array($query)){
            ?>
            <div class="imgl"><img src="../Content_Creator/img/<?php echo $row['FileAttach'];?>" style="width:50px; height:50px;" alt=""></div>
              <h4><?php echo $row['HeadLine'] ?></h4>
              <p><a href="news.php?news=<?php echo $row['Url'];?>"><?php echo substr($row['Details'],0,40)?></a></p>
            <?php } ?>
            </div>
          </div>
        </div>
        <div class="divider2"></div>
        <h2 class="nospace font-medium push20">Recommended</h2>
        <ul class="list underline push50">
        <?php @$qry=mysqli_query($con,"select count(r.news_id),n.id as news_id,n.CategoryID as cat_id from tbl_recent r,tbl_news n where n.id=r.news_id and r.user='".$_SESSION['newViewerLogin']."' GROUP BY n.CategoryID order by count(r.news_id) DESC limit 5"); 
        $arr=array();
        while($row=mysqli_fetch_array($qry))
        {
          array_push($arr,$row['cat_id']);
        }
        for($i=0;$i<count($arr);$i++)
        {
          $qry=mysqli_query($con,"select * from tbl_news where Status='1' and Approved='1' and CategoryID=".$arr[$i]." and datediff(PublishDate,date(now()))<=30 limit 2"); 
          while($row=mysqli_fetch_array($qry))
          { ?>
            <li>
            <div class="imgl">
            <img src="../Content_Creator/img/<?php echo $row['FileAttach'];?>" style="width:35px; height:35px;" alt="">
            <a href="news.php?news=<?php echo $row['Url'];?>"><?php echo substr($row['HeadLine'],0,30); ?></a>
            </div>
            </li>  
          <?php 
          }
        }
        ?>
        </ul>
        <div class="clear push30"></div>
      </div>
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<?php
include "includes/footer.php";
?>