<?php
mysqli_query($con,"update tbl_notification set is_seen=1 where role=0 and user_id=".$creatorid);
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                MY NOTIFICATION
            </h2>
        </div>
        <div class="body">
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                <form name="f1" action="notification.php?noti" method="post">
				<div class="col-sm-5">
				<div class="dataTables_length" name="" id="DataTables_Table_0_length">
				<label>Show 
				<select name="sort" aria-controls="DataTables_Table_0" class="form-control show-tick">
				<option class="wmp-input" <?php if(isset($_POST["sort"]) && $_POST['sort']=="") {echo "selected";} ?> value="">--Select--</option>
				<option class="wmp-input" <?php if(isset($_POST["sort"]) && $_POST['sort']==1) {echo "selected";} ?> value="1">Ascending</option>
				<option class="wmp-input" <?php if(isset($_POST["sort"])&& $_POST['sort']==2) {echo "selected";} ?> value=2>Descending</option>
				</select> 
				<input type="submit" name="btn_noti_filter" class="btn btn-primary waves-effect" value="FILTER">
				
				</label>
				</div>
				</div>
				<div class="col-sm-5">
				<div id="DataTables_Table_0_filter" class="dataTables_filter">  
				<label>Search:<input type="search" class="form-control input-sm" name="keyword" value="<?php if(isset($_POST['search_noti'])){ echo $_POST['keyword']; } ?>" placeholder="" aria-controls="DataTables_Table_0">
				<input type="submit" name="search_noti" class="btn btn-primary waves-effect" value="SEARCH">
				
			   </form>
				</div>

				</div>
                <div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                    <thead>
                        <tr role="row">
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Subject</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 235px;">Description</th>
                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Date</th>
                       
                        </tr>
                    </thead>
                    <tbody>
                    <?php while($row=mysqli_fetch_assoc($result_noti)) {?>
                        <tr>
                        <td><?php echo $row['sub'] ?></td>
                        <td><?php echo $row['description'] ?></td>
                        <td><?php echo substr($row['c_date'],0,10) ?></td>                        
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div></div>
			<div class="row">
					<div class="col-sm-12">
					<!--<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo $page1;?> to 5 of <?php echo $total_rec;?> entries</div>-->
					</div>
					<div class="col-sm-6">  
						<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
						<ul class="pagination">
						<li class="paginate_button previous <?php if(/*$page*/$_GET['page']>$total_pages || $_GET['page']==1){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
						<a href="notification.php?page=<?php echo $_GET['page']-1;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Previous</a></li>
						<?php
						for($i=1;$i<=$total_pages;$i++)
						{
							?>
							<li class="paginate_button <?php echo ($i==$_GET['page'])?'active':'';?>"><a href="notification.php?page=<?php echo $i;?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"><?php echo $i;?></a></li>        
							&nbsp;
						<?php }
						?>
						<li class="paginate_button previous <?php if($page>=$total_pages){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
						<a href="notification.php?page=<?php echo $_GET['page']+1;//$total_pages;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Next</a></li>
						
						</ul>
					</div>
				</div>
        </div>
    </div>
</div>