	
								<div class="tab-pane active" id="formcontrols">
                                <?php
                                                include "includes/msg.php";
                                                ?>
								<form id="edit-profile" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
									<fieldset>
                  <div class="form-actions">
                  <div class="control-group">											
											<label class="control-label" for="title">Search</label>
											<div class="controls">
												<input type="text" class="span6" id="title" name="keyword" value="<?php if(isset($vskeyword)){ echo $vskeyword;}?>">
                        <input type="hidden"  name="vskeyword" />
                        <button class="btn btn-success" name="search">Search <?php echo ucfirst($type);?></button>
                        <br><br>
                        <button class="btn btn-info" name="create">Create new <?php echo ucfirst($type);?></button>
										
                    	</div> <!-- /controls -->				
										</div> <!-- /control-group -->
												</div>                                 
											 <!-- /widget -->
         								 <div class="widget widget-table action-table">
            								<div class="widget-header"> <i class="icon-th-list"></i>
             								 <h3>A Table Example</h3>
           									 </div>
           									 <!-- /widget-header -->
            									<div class="widget-content">
                                                
             							 <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th style="width: 100px;"> Id </th>
                    <th> User Name</th>
                    <th>Profile</th>
                    <th> Email</th>
                    <th> Date</th>
                    <th>Status</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                while($row=mysqli_fetch_array($sql)){
                if($row['role']==3){

                }else{
                ?>
                  <tr>

                    <td> <?php echo $row['id'];?> </td>
                    <td> <?php echo $row['user_name'];?> </td>
                    <td><?php
        if(file_exists($imgPath."/".$row['image']) && !empty($row['image'])){
		?>
        <img src="<?php echo $imgPath."/".$row['image']; ?>" width="80"/>
        <?php
		}else echo "No Image found.";
		?></td>
                    <td> <?php echo $row['email'];?> </td>
                    <td> <?php echo $row['date'];?> </td>
                    <td>
		<a href="?status=<?php echo $row['id']; ?>" style="color:<?php echo $row['status']?'green':'red'; ?>" onclick="return confirm('Are you sure to change the status of item?')">
		<?php echo $row['status']?'Active':'in-active'; ?></td>
                    <td class="td-actions"><a href="?edit=<?php echo $row['id']; ?>" class="btn btn-small btn-success"><i class="btn-icon-only icon-pencil"> </i></a><a href="?del=<?php echo $row['id']; ?>" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                <?php
                }
                }
                ?>
                </tbody>
              </table>
            </div>
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
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 
         
											
										<!--Baad me	<div class="form-actions">
												<button type="submit" class="btn btn-primary">Save</button> <button class="btn">Cancel</button>
                                                <button class="btn btn-info">Info</button>
                                                <button class="btn btn-danger">Danger</button>
                                                <button class="btn btn-warning">Warning</button>
                                                <button class="btn btn-invert">Invert</button>
                                                <button class="btn btn-success">Success</button>
											</div>-->
										</fieldset>
									</form>
								</div>
							