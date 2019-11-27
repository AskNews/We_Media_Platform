
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
  
<div class="w3-card-4" style="width:100%;">

<div class="w3-container">
    
  <header class="w3-container w3-blue">
    <h1>Manage Users</h1>
  </header>
   <br>
<input type="submit" name="create" value="Create <?php echo $type;?>" class="w3-button w3-theme">
  <br>
  <br>
  <table class="w3-table-all">
  <thead>
    <tr class="w3-blue">
      <th>ID</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Status</th>
      <th>Action</th>
    
    </tr>
  </thead>
  <?php
    $sn=1;
  while($row=mysqli_fetch_array($query)):
    
  ?>

  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['first_name']; ?></td>
    <td><?php echo $row['last_name']; ?></td>
    <td>
		<a href="?status=<?php echo $row['id']; ?>" style="color:<?php echo $row['status']?'green':'red'; ?>" onclick="return confirm('Are you sure to change the status of item?')">
		<?php echo $row['status']?'Active':'in-active'; ?></td>
        <td><a href="?del=<?php echo $row['id']; ?>" class="ico del" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
        <a href="?edit=<?php echo $row['id']; ?>" class="ico edit">Edit</a></td>
      
  </tr>
  <?php
                    endwhile;
                    ?>
</table>
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


  <footer class="w3-container w3-blue">
    <h5>AskNews</h5>
  </footer>
  </div>
</div>

</form>