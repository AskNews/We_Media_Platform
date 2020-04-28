<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
           <br><br>             <div class="input-group">
							<input class="form-control" type="text" name="keyword">
							<span class="input-group-btn"><button class="btn btn-primary" type="submit" name="search">Search!</button></span>
						</div>
				<br><br>
                		<table class="table table-striped">
										<thead>
											<tr>
											<th>No</th>
											<th>User Id</th>
											<th>Subject</th>
											<th>Message</th>
											
											<th>Role</th>
											<th>Date</th>
											
											<th>Operation</th>
											</tr>
										</thead>
										<tbody>
										<?php
      $sn=0;
	  while($row=mysqli_fetch_array($query)):
		  
	  ?>
											<tr>
											<td><?php echo $sn=$sn+1;?></td>
											<td><?php echo $row['user_id']; ?></td>
											<td><?php echo $row['subject']; ?></td>
											<td><?php echo $row['message']; ?></td>
											
											<td><?php 
											if($row['role']==0){
											echo 'Content Creator';
											}
											else if($row['role']==1){
												echo 'Viewer';
											 }
											 else{
												 echo 'Ad Creator';
											 } ?></td>
											
											<td><?php echo $row['c_date']; ?></td>
											
        <td><a href="?del=<?php echo $row['id']; ?>" class="ico del" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
       </td>
      
         
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