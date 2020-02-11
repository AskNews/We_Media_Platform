
  <div class="wmp-card-4" style="width:100%;">

  <div class="wmp-container">
      
    <header class="wmp-container wmp-blue">
      <h1>My Ads</h1>
    </header>
    <table class="wmp-table-all">
    <thead>
      <tr class="wmp-blue">
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


    <footer class="wmp-container wmp-blue">
      <h5>Footer</h5>
    </footer>
    </div>
  </div>
