<?php
mysqli_query($con,"update tbl_notification set is_seen=1 where role=1 and user_id=".$creatorid);
?>
<div class="container-fluid">
            <div class="row">
			 <div class="col-lg-10">
                <form name="f1" action="notification.php?noti" method="post">
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="rs-select2--light rs-select2--md">
                               <label>Show </label>
                                <select name="sort" aria-controls="DataTables_Table_0" class="form-control show-tick">
                                <option class="wmp-input" <?php if(isset($_POST["sort"]) && $_POST['sort']=="") {echo "selected";} ?> value="">--Select--</option>
                                <option class="wmp-input" <?php if(isset($_POST["sort"]) && $_POST['sort']==1) {echo "selected";} ?> value="1">Ascending</option>
                                <option class="wmp-input" <?php if(isset($_POST["sort"])&& $_POST['sort']==2) {echo "selected";} ?> value=2>Descending</option>
                                </select>
                            </div>
                            <button class="au-btn-filter" name="btn_noti_filter" id="submit" type="submit">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
						<div class="header-wrap">
                                     <div class="table-data__tool-right form-header">
                                     <input class="au-input au-input" type="text" name="keyword" value="<?php if(isset($_POST['search_noti'])){ echo $_POST['keyword']; } ?>" placeholder="Search for Feedback. . . . . . " aria-controls="DataTables_Table_0" />
                                     <button class="au-btn--submit"   name="search_noti" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                       </button>
                                    </div>
                         </div>
                    </div>
					
                </form>
			 </div>
            </div>

			<div class="col-lg-12">
                 <div class="au-card au-card--bg-blue au-card-top-countries m-b-30">
                     <div class="au-card-inner">
                         <div class="table-responsive">
							 <table class="table table-top-countries">
							  <thead>
								<tr role="row" style="color:white">
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
								<td><?php echo $row['c_date'] ?></td>                        
								</tr>
							  <?php } ?>
                                </tbody>
							 </table>
						 </div>                  
                     </div>
                 </div>
             </div>

             <div class="row justify-content-center" >
					<div class="col-sm-12">
					<!--<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo $page1;?> to 5 of <?php echo $total_rec;?> entries</div>-->
					</div>
					<div class="col-sm-6 ">  
						<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
						<ul class="pagination">
						<li class="paginate_button previous <?php if(/*$page*/$_GET['page']>$total_pages || $_GET['page']==1){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
						<a class="page-link" href="notification.php?page=<?php echo $_GET['page']-1;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Previous</a></li>
						<?php
						for($i=1;$i<=$total_pages;$i++)
						{
							?>
							<li class="paginate_button <?php echo ($i==$_GET['page'])?'active':'';?>"><a class="page-link" href="notification.php?page=<?php echo $i;?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"><?php echo $i;?></a></li>        
							&nbsp;
						<?php }
						?>
						<li class="paginate_button previous <?php if($page>=$total_pages){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
						<a class="page-link" href="notification.php?page=<?php echo $_GET['page']+1;//$total_pages;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Next</a></li>
						
						</ul>
					</div>
				</div>
</div>
            