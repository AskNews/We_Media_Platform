<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<button type="submit" class="btn btn-success" name="create"><i class="fa fa-plus-square">&nbsp; Create New <?php echo ucfirst($type);?></i></button>
           <br><br>             <div class="input-group">
							<input class="form-control" type="text">
							<span class="input-group-btn"><button class="btn btn-primary" type="button">Go!</button></span>
						</div>
				<br><br>
                		<table class="table table-striped">
										<thead>
											<tr>
											<th>Id</th>
											<th>Title</th>
											<th>Description</th>
											<th>Date</th>
											
										
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
											
        
											</tr>
											<?php
											endwhile;
											?>
										</tbody>
									</table>
						</form>