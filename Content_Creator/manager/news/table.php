<script>

</script>


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               MANAGE NEWS
                            </h2>
                            
                        </div>
                        <div class="body">
                        
                            <div class="table-responsive">
                                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                
                                <form name="f1" action="news.php" method="post">
                                <div class="col-sm-5">
								<div class="dataTables_length" name="" id="DataTables_Table_0_length">
								<label>Show 
								<select name="newsType" aria-controls="DataTables_Table_0" class="form-control show-tick">
								<option value="">--Select--</option>
                                <option value="0">Pending</option>
								<option value="1">Offline</option>
								<option value="2">Rejected</option>
                                <option value="3">Draft</option>
								</select> 
                                <button class="btn btn-primary waves-effect" name="btn_filter" id="submit" type="submit">FILTER</button>
                                </label>
								</div>
								</div>

                                <div class="col-sm-5">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">  
                                <label>Search:<input type="search" class="form-control input-sm" name="keyword" placeholder="" aria-controls="DataTables_Table_0">
                                <button class="btn btn-primary waves-effect"  name="btn_search" id="submit" type="submit">SEARCH</button>
                               </form>
                                </label>
                                </div>
                                </div>
                                </div>
                                <div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 142px;">Headline</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 235px;">File</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Modify Date</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Publish Date</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Views</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 79px;">Status</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 79px;">Action</th></tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    while($row=mysqli_fetch_array($result_news))
                                    {?>
                                        <tr role="row">
                                            <td class="sorting_1"><?php echo $row['HeadLine']?></td>
                                            <td><img src="<?php echo $imgPath."/".$row['FileAttach'];?>" height="100px" widht="100px" ></td>
                                            <?php if($row["Approved"]){ ?>
                                            <td><?php echo $row['ModifyDate'];?></td>
                                            <td><?php echo $row['PublishDate'];?></td>
                                            <td><?php echo $row['Views'];?></td>
                                            <?php } elseif($row["Approved"]==0 && $row["Offline"]==1 && $row["Rejected"]==3){ ?> 
                                            <td colspan='3'> Your News is offline due to <?php echo $row["RejectionMsg"]; ?></td>
                                            <?php }
                                            elseif($row["Approved"]==0 && $row["Offline"]==0 && $row["Rejected"]==1){ ?>
                                            <td colspan='3'>Pending</td>
                                            <?php } elseif($row["Approved"]==0 && $row["Rejected"]==2){ ?>
                                                <td colspan='3'>News is Rejected due to <?php echo $row["RejectionMsg"]; ?><br/> <a href="?newsid=<?php echo $row["NewsID"]; ?>">click to modify</a> </td>
                                            <?php } ?>
                                            
                                            <td>
                                            <a  href="?status=<?php echo $row["NewsID"];?>">
                                            <button <?php if($row["Approved"]==0 && $row["Offline"]==1 && $row["Rejected"]==3 || $row["Rejected"]==2){ echo "disabled";} ?>  class="btn <?php echo $row['Status']?'btn-primary waves-effect':'btn-warning waves-effect'?>"><?php if($row['Status']){ echo "Active";}else{ echo "In-Active";} ?></button>
                                            
                                            </a>        
                                            </td>
                                            <!--<td><small><a role="button" href="?newsid=<?php //echo $row["NewsID"]; ?>"><button class="btn btn-primary waves-effect">click to view news</button></a></small>--->
                                            <td><small><a role="button" data-toggle="tooltip" data-placement="bottom" title="click to view news" href="?newsid=<?php echo $row["NewsID"]; ?>"><i class="material-icons"><big>remove_red_eye</big></a></i></a></small>
                                           </td>
                                           </tr>    
                            <?php   }//while
                                    
                                    ?>                      
                                    </tbody>
                                </table>
                            </div></div>
                            
                            <div class="row">
                                <div class="col-sm-5">
                                <!--<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo $page1;?> to 5 of <?php echo $total_rec;?> entries</div>-->
                                </div>
                                <div class="col-sm-7">  
                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                    <ul class="pagination">
                                    <li class="paginate_button previous <?php if($page<$total_pages){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
                                    <a href="news.php?page=1" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Previous</a></li>
                                    <?php
                                    for($i=1;$i<=$total_pages;$i++)
                                    {
                                        
                                        ?>
                                        <li class="paginate_button <?php echo ($i==$_GET['page'])?'active':'';?>"><a href="news.php?page=<?php echo $i;?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"><?php echo $i;?></a></li>
                                        <!--echo "<a href='news.php?page=$i' style='text-decoration:none'>$i </a>";-->
                                        &nbsp;
                                    <?php }

                                    ?>
                                    <li class="paginate_button previous <?php if($page>=$total_pages){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
                                    <a href="news.php?page=<?php echo $total_pages;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Next</a></li>
                                    
                                    </ul>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
          