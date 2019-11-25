
  <div class="w3-card-4" style="width:100%;">

  <div class="w3-container">
      
    <header class="w3-container w3-blue">
      <h1>My Ads</h1>
    </header>
    <table class="w3-table-all">
    <thead>
      <tr class="w3-blue">
        <th>ID</th>
        <th>Ad Name</th>
        <th>url</th>
      </tr>
    </thead>
    <?php
      $sn=1;
	  while($row=mysqli_fetch_array($query)):
		  
	  ?>

    <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['url']; ?></td>
    </tr>
    <?php
											endwhile;
											?>
  </table>


    <footer class="w3-container w3-blue">
      <h5>Footer</h5>
    </footer>
    </div>
  </div>
