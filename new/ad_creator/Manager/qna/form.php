<div class="w3-container">
  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
      <h1>QNA</h1>
    </header>
    <div class="w3-container">
    <table class="w3-table-all">
    <thead>
      <tr class="w3-blue">
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

    <footer class="w3-container w3-blue">
      <h5>Footer</h5>
    </footer>
  </div>
  </div>
