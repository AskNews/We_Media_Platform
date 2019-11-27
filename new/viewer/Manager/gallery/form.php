
<div class="w3-cell-row">
<br><br>
  <div class="w3-container  w3-cell " >
  
  <div class="w3-panel w3-card ">
  
    <p>w3-card</p>
    
        <?php
			$query=mysqli_query($con,$select1);
			while($row=mysqli_fetch_array($query)):
				
			?>

        <div class=" w3-card w3-two w3-quarter ">
        
        <?php echo $row['title'];?>
        <img src="../../logo.png" class="w3-round-small" alt="Norway" style="width:280px; height:150px;">
<br><br>
        </div>
        <?php
          endwhile;
          ?>
  
        <br><br><br><p>hi</p>
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

</div>