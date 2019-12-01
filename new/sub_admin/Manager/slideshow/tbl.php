
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"> 
<div class="wmp-container">
  
  <div class="wmp-center">
    <h2><?php echo $type;?></h2>
    
  </div>
  
  <div class="wmp-section">      
    <input class="wmp-input" type="text" name="keyword" required>
    <label>Search</label>
    
  </div><input type="submit" name="search" value="Saerch" class="wmp-button wmp-theme">
  <a class="wmp-button wmp-circle wmp-large wmp-theme" href="?create" ><i class="fa fa-plus" ></i></a>
<br><br>
<?php
include "includes/msg.php";
?>
<hr>
<div class="wmp-responsive wmp-card-4">
<table class="wmp-table wmp-striped wmp-bordered">
<thead>
<tr class="wmp-theme">
<th>Id</th>
											<th>Image</th>
											<th>Caption</th>
											<th>Date</th>
											<th>Status</th>
											<th>Operation</th>
											</tr>
</thead>
<tbody>
<?php
      $sn=1;
	  while($row=mysqli_fetch_array($query)):
		  
	  ?>
											<tr>
											<td><?php echo $row['id']; ?></td>
											
											<td><?php
        if(file_exists($imgPath.$row['image']."/".$row['image']) && !empty($row['image'])){
		?>
        <img src="<?php echo $imgPath.$row['image']."/".$row['image']; ?>" width="80"/>
        <?php
		}else echo "No Image found.";
		?></td><td><?php echo $row['caption']; ?></td>
											<td><?php echo $row['c_date']; ?></td>
											<td>
		<a href="?status=<?php echo $row['id']; ?>" style="color:<?php echo $row['status']?'green':'red'; ?>" onclick="return confirm('Are you sure to change the status of item?')">
		<?php echo $row['status']?'Active':'in-active'; ?></td>
        <td><a href="?del=<?php echo $row['id']; ?>" class="ico del" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
        <a href="?edit=<?php echo $row['id']; ?>" class="ico edit">Edit</a></td>
      
        
											</tr>
											<?php
											endwhile;
											?>
										
</tbody>
</table>
</div>
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
<br>
</form>