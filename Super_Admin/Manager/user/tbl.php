	
								<div class="tab-pane active" id="formcontrols">
                                <?php
                                                include "includes/msg.php";
                                                ?>
								<form id="edit-profile" class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
									<fieldset>
                                                                        
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
                    <th> Email</th>
                    <th> Date</th>
                    <th>Status</th>
                    <th class="td-actions"> </th>
                  </tr>
                </thead>
                <tbody>
                <?php
                while($row=mysqli_fetch_array($qry)){
                ?>
                  <tr>
                    <td> <?php echo $row['id'];?> </td>
                    <td> <?php echo $row['user_name'];?> </td>
                    <td> <?php echo $row['email'];?> </td>
                    <td> <?php echo $row['date'];?> </td>
                    <td>
		<a href="?status=<?php echo $row['id']; ?>" style="color:<?php echo $row['status']?'green':'red'; ?>" onclick="return confirm('Are you sure to change the status of item?')">
		<?php echo $row['status']?'Active':'in-active'; ?></td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only icon-ok"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                <?php
                }
                ?>
                </tbody>
              </table>
            </div>
            <ul class="pagination">
        <li class="<?php if($s == 1 && $e == 10){ echo 'disabled'; } ?>">
		<a href="?first">First</a>
		</li>
        <li class="<?php if($s == 1 && $e == 10){ echo 'disabled'; } ?>">
            <a href="?prev">Prev</a>
        </li>
        <li>
            <a href="?next">Next</a>
        </li>
        <li><a href="?last">Last</a></li>
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
							