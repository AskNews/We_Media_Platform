<?php
$type='categories';
include 'includes/header.php';
?>
<div class="w3-cell-row">
  <div class="w3-container  w3-cell w3-twothird " >
  <br><br>
  <div class="w3-panel w3-card ">
  
    <p><?php echo $_GET['nam'];?></p>
    <?php
    $a=$_GET['cat'];
            $sql1="select * from tbl_news where Status='1' and Approved='1' and CategoryID='$a' LIMIT 5";
			$query1=mysqli_query($con,$sql1);
			while($row1=mysqli_fetch_array($query1)){
			?>
                        <a href="news.php?sid=<?php echo $row1['NewsID'];?>">
    
    <div class=" w3-card w3-two third ">
        <br>
        
        &nbsp;&nbsp;<img src="../content_creator/img/<?php echo $row1['FileAttach'];?>" class="w3-round-small" alt="Norway" style="width:280px; height:150px;">
        &nbsp;<?php echo substr($row1['Summary'],0,50);?>...
      
<br><br>
        </div>
        <br><br>
        </a>
        <?php
                        }
        ?>

</div>
<div class="w3-center">
  
  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
    <div class="w3-bar">
	  <a href="?page=1" class="w3-bar-item w3-button <?php echo ($i==$_GET['page'])?'w3-theme':'';?> w3-hover-theme">&laquo;</a>
	  <?php
                                    for($i=1;$i<=$total_pages;$i++)
                                    {
                                        
                                        ?>
                                        <a href="?page=<?php echo $i;?>" class="w3-bar-item w3-button <?php echo ($i==$_GET['page'])?'w3-theme':'';?> w3-hover-theme"><?php echo $i;?></a>
                                    <?php }

                                    ?>
                                  
     
      <a href="?page=<?php echo $i;?>" class="w3-bar-item w3-button  <?php echo ($i==$_GET['page'])?'w3-theme':'';?> w3-hover-theme">&raquo;</a>
    </div>
  </div>
</div>

</div>
</div>
<?php
include 'includes/footer.php';
?>
