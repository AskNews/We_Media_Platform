<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

           <br><br>             <div class="input-group">
							<input class="form-control" type="text" name="keyword">
							<span class="input-group-btn"><button class="btn btn-primary" type="submit" name="search">Search!</button></span>
						</div>
				<br><br> 
                		<table class="table table-striped">
										<thead>
											<tr>
											<th>Id</th>
											<th>User Name</th>
											<th>Company Name</th>
										
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
											<td><?php echo $row['username']; ?></td>
											<td><?php echo $row['company_name']; ?></td>
										
											
											<td><?php echo $row['c_date']; ?></td>
											<td>
		<a href="?status=<?php echo $row['id']; ?>" style="color:<?php echo $row['status']?'green':'red'; ?>" onclick="return confirm('Are you sure to change the status of item?')">
		<?php echo $row['status']?'Active':'in-active'; ?></td>
        <td><a href="?del=<?php echo $row['id']; ?>" class="ico del" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
        <a href="?edit=<?php echo $row['id']; ?>" class="ico edit">Preview</a></td>
      
        
											</tr>
											<?php
											endwhile;
											?>
										</tbody>
									</table>
						</form>