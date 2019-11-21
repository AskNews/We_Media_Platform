
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post"> 
<div class="w3-container">
  
  <div class="w3-center">
    <h2><?php echo $type;?></h2>
    
  </div>
  
  <div class="w3-section">      
    <input class="w3-input" type="text" name="keyword" required>
    <label>Search</label>
    
  </div><input type="submit" name="search" value="Saerch" class="w3-button w3-theme">
  <a class="w3-button w3-circle w3-large w3-theme" href="?create" ><i class="fa fa-plus" ></i></a>
<br><br>
<?php
include "includes/msg.php";
?>
<hr>
<div class="w3-responsive w3-card-4">
<table class="w3-table w3-striped w3-bordered">
<thead>
<tr class="w3-theme">
<th>Id</th>
											<th>Title</th>
											<th>Description</th>
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
											<td><?php echo $row['title']; ?></td>
											<td><?php echo $row['seo_desc']; ?></td>
											<td><?php echo $row['c_date']; ?></td>
											<td>
		<a href="?status=<?php echo $row['id']; ?>" style="color:<?php echo $row['status']?'green':'red'; ?>" onclick="return confirm('Are you sure to change the status of item?')">
		<?php echo $row['status']?'Active':'in-active'; ?></td>
        <td><a href="?del=<?php echo $row['id']; ?>" class="ico del" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
        <a href="?edit=<?php echo $row['id']; ?>" class="ico edit">Edit</a></td>
      
        
											</tr>	<?php
											endwhile;
											?>
										
</tbody>
</table>
</div>
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
<br>
</form>