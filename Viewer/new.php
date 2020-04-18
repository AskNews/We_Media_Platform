<?php
$type="custom";
include "includes/header.php";
$index=1;
?>
<div class="wrapper row3">
  <div id="container">
  <?php
    $sql="select * from tbl_news where Status ='1' and Approved='1' and CreatorID=".$_GET['id']." order by PublishDate desc ";
    $query=mysqli_query($con,$sql);
    ?>
    <div id="portfolio">
      <ul class="clear">
      <?php
      $index=1;
        while($row = mysqli_fetch_array($query)):
      ?>
      <div class='page'>
        <li class="one_half <?php echo $index++%2 !=0?'first':'';?>">
          <article class="clear">
            <figure class="post-image">
            <img src="../Content_Creator/img/<?php echo $row['FileAttach']; ?>" style="width:420px; height:140px; padding:20px; " alt="">      
            </figure>
            <header>
              <h2 class="blog-post-title"><a href="news.php?news=<?php echo $row['Url']; ?>"><?php echo substr($row['HeadLine'],0,50); ?> ...</a></h2>
              <div class="blog-post-meta">
                <ul>
                  <li class="blog-post-date">
                    <time datetime="2000-04-06T08:15+00:00"><strong>Date: </strong><?php echo date("F j, y, g:i a", strtotime($row['PublishDate'])); ?></time>
                  </li>
                </ul>
              </div>
            </header>
            <p><?php echo substr($row['Summary'],0,70); ?> ...</p>
            <footer classsss="read-more"><a href="news.php?news=<?php echo $row['Url']; ?>">Read More &raquo;</a></footer>
          </article>
        </li>
        </div>
        <?php endwhile; ?>
      </ul>
      <h3><a href="javascript:void();" class="ssLoadNews" data-load="2">Load More News....</a></h3>
    <div class="clear"></div>    
  </div>
</div>
<script src='js/jquery.min.js'></script>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
  $(".page").addClass('hide');
  let TotalNewPage=$(".page").length;
  $(".page:lt("+$(".ssLoadNews").data("load")+")").removeClass('hide');
  $(".ssLoadNews").click(function(){
    var loadedNews=$(this).data("load");
    loadedNews=loadedNews+2;
    $(this).data("load",loadedNews);
    $(".page:lt("+loadedNews+")").removeClass('hide');
    if(TotalNewPage<=loadedNews)
    {
      $(".ssLoadNews").addClass('hide');
    }
  });
});
</script>
<?php 
include "includes/footer.php";
?>