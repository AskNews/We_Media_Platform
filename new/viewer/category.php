<?php
$type='categories';
include 'includes/header.php';
?>
<div class="wmp-cell-row">
  <div class="wmp-container  wmp-cell wmp-twothird " >
  <br><br>
  <div class="wmp-panel wmp-card ">
  
    <p><?php echo $_GET['nam'];?></p>
    <?php
    $a=$_GET['cat'];
            $sql1="select * from tbl_news where Status='1' and Approved='1' and CategoryID='$a' LIMIT 5";
			$query1=mysqli_query($con,$sql1);
			while($row1=mysqli_fetch_array($query1)){
			?>
                        <a href="news.php?sid=<?php echo $row1['NewsID'];?>">
    
    <div class=" wmp-card wmp-two third ">
        <br>
        
        &nbsp;&nbsp;<img src="../content_creator/img/<?php echo $row1['FileAttach'];?>" class="wmp-round-small" alt="Norway" style="width:280px; height:150px;">
        &nbsp;<?php echo substr($row1['Summary'],0,50);?>...
      
<br><br>
        </div>
        <br><br>
        </a>
        <?php
                        }
        ?>

</div>
<div class="wmp-center">
  
  <!-- Pagination -->
  <div class="wmp-center wmp-padding-32">
    <div class="wmp-bar">
	  <a href="?page=1" class="wmp-bar-item wmp-button <?php echo ($i==$_GET['page'])?'wmp-theme':'';?> wmp-hover-theme">&laquo;</a>
	  <?php
                                    for($i=1;$i<=$total_pages;$i++)
                                    {
                                        
                                        ?>
                                        <a href="?page=<?php echo $i;?>" class="wmp-bar-item wmp-button <?php echo ($i==$_GET['page'])?'wmp-theme':'';?> wmp-hover-theme"><?php echo $i;?></a>
                                    <?php }

                                    ?>
                                  
     
      <a href="?page=<?php echo $i;?>" class="wmp-bar-item wmp-button  <?php echo ($i==$_GET['page'])?'wmp-theme':'';?> wmp-hover-theme">&raquo;</a>
    </div>
  </div>
</div>

</div>
</div>
<?php
include 'includes/footer.php';
?>
