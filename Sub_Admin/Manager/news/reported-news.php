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
											<th>Head Line</th>
											<th>Summery</th>
											<th>Channel Name</th>
											<th>Category</th>
											<th>Status</th>
											<th>Operation</th>
											</tr>
										</thead>
										<tbody>
										<?php
	  $sn=1;
	  

	  while($row1=mysqli_fetch_array($query)):
		$g=$row1['news_id'];
		$tt="select * from tbl_news where id=$g";
		$j=mysqli_query($con,$tt);
		while($row=mysqli_fetch_array($j)):
	  ?>
											<tr>
											<td><?php echo $row['id']; ?></td>
											<td><?php echo $row['HeadLine']; ?></td>
											<td><?php echo $row['Summary']; ?></td>
											<td><?php echo fetch_detail("title","categories","id",$row['CategoryID']); ?></td>
										
											<td><?php echo fetch_detail("ChannelName","content_creator","id",$row['CreatorID']); ?></td>
										
											<td>
		<a href="?status=<?php echo $row['id']; ?>" style="color:<?php echo $row['Status']?'green':'red'; ?>" onclick="return confirm('Are you sure to change the status of item?')">
		<?php echo $row['Status']?'Active':'in-active'; ?></td>
        <td><a href="?del=<?php echo $row['id']; ?>" class="ico del" onclick="return confirm('Are you sure to delete this item?')">Delete</a>
        <a href="?edit=<?php echo $row['id']; ?>" class="ico edit">Review</a></td>
      
        
											</tr>
											<?php
											endwhile;
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