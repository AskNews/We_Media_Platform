<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<button type="submit" class="btn btn-success" name="create"><i class="fa fa-plus-square">&nbsp; Create New <?php echo ucfirst($type);?></i></button>
           <br><br>             <div class="input-group">
							<input class="form-control" type="text" name="keyword">
							<span class="input-group-btn"><button class="btn btn-primary" type="submit" name="search">Search!</button></span>
						</div>
				<br><br>
                		<table class="table table-striped">
										<thead>
											<tr>
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
        if(file_exists($imgPath."/".$row['image']) && !empty($row['image'])){
		?>
        <img src="<?php echo $imgPath."/".$row['image']; ?>" width="80"/>
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
									
                                 
                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                    <li class="paginate_button previous <?php if($page<$total_pages){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
                                    <a href="?page=1" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Previous</a></li>
                                    <?php
                                    for($i=1;$i<=$total_pages;$i++)
                                    {
                                        
                                        ?>
                                        <li class="paginate_button <?php echo ($i==$_GET['page'])?'active':'';?>"><a href="?page=<?php echo $i;?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"><?php echo $i;?></a></li>
                                        <!--echo "<a href='news.php?page=$i' style='text-decoration:none'>$i </a>";-->
                                        &nbsp;
                                    <?php }

                                    ?>
                                    <li class="paginate_button previous <?php if($page>=$total_pages){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
                                    <a href="?page=<?php echo $total_pages;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Next</a></li>
                                    
                                    </ul>
                                </div>
                                
						</form>