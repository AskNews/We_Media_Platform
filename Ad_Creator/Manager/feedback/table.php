

     <div class="section__content section__content--p30">
         <div class="container-fluid">
            <div class="row">
                <form name="f1" action="feedback.php?showfeed" method="post">
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
                            <button class="au-btn-filter" name="btn_feed_filter" id="submit" type="submit">
                                <i class="zmdi zmdi-filter-list"></i>filters</button>
                        </div>
                    </div>
                </form>
            
                            <div class="col-lg-12">
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Feedback Topic</th>
                                                <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 235px;">date</th>
                                                <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">File</th>
                                                <th tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php while($row=mysqli_fetch_assoc($result_feedback)) {?>
                                        <tr>
                                                <td><?php echo $row['subject'] ?></td>
                                                <td><?php echo $row['c_date'] ?></td>
                                                <td><img src="<?php echo "img/".$row['file'];?>" height="100px" widht="100px" ></td>
                                                <td>
                                                    <div class="table-data-feature">
                                                    </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit" data-toggle="collapse" data-target="#subject<?php echo $row['id']?>" aria-expanded="false" aria-controls="collapseExample">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" href="?feedid=<?php echo $row["id"]; ?>" data-toggle="tooltip" aria-expanded="false" aria-controls="collapseExample">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                    <div class="collapse" id="subject<?php echo $row['id']?>">
                                    <div class="well">
                                    <?php echo $row['message'] ?>
                                    </div>
                                                    </div>
                                                </td>
                                          </tr> 
                                           <?php } ?> 
                                          </tbody>
                                    </table>
                                </div>  
                            </div>

                            <div class="row">
					<div class="col-sm-12">
					<!--<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo $page1;?> to 5 of <?php echo $total_rec;?> entries</div>-->
					</div>
					<div class="col-sm-6">  
						<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
						<ul class="pagination">
						<li class="paginate_button previous <?php if(/*$page*/$_GET['page']>$total_pages || $_GET['page']==1){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
						<a href="feedback.php?page=<?php echo $_GET['page']-1;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Previous</a></li>
						<?php
						for($i=1;$i<=$total_pages;$i++)
						{
							?>
							<li class="paginate_button <?php echo ($i==$_GET['page'])?'active':'';?>"><a href="feedback.php?page=<?php echo $i;?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"><?php echo $i;?></a></li>        
							&nbsp;
						<?php }
						?>
						<li class="paginate_button previous <?php if($page>=$total_pages){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
						<a href="feedback.php?page=<?php echo $_GET['page']+1;//$total_pages;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Next</a></li>
						
						</ul>
					</div>
				</div>
        </div>
            
        </div>
    </div>
</div>
