<div class="wmp-container">
  <div class="wmp-card-4" style="width:100%;">
    <header class="wmp-container wmp-blue">
      <h1>QNA</h1>
    </header>
    <div class="wmp-container">
    <table class="wmp-table-all">
    <thead>
      <tr class="wmp-blue">
        <th>Question</th>
        <th>Date</th>
        
      </tr>
    </thead>
    <?php
      $sn=1;
	  while($row=mysqli_fetch_array($query)):
		  
	  ?>

    <tr>
      <td><?php echo $row['question']; ?></td>
      <td><?php echo $row['c_date']; ?></td>
      
    </tr>
    <?php
											endwhile;
											?>
  </table>

    </div>

    <footer class="wmp-container wmp-blue">
      <h5>Footer</h5>
    </footer>
  </div>
  </div>
