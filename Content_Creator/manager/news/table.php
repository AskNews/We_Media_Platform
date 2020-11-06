
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
								<label>Show</label>
								<select name="newsType"  class="form-control show-tick">
                                <option class="wmp-input" <?php if(isset($_POST["newsType"]) && ($_POST['newsType']=="")) {echo "selected";} ?> value="">--Select--</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"]) && ($_POST['newsType']==4)) {echo "selected";} ?> value="4">Approved</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==0)) {echo "selected";} ?> value="0">Pending</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==1)) {echo "selected";} ?> value="1">Offline</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==2)) {echo "selected";} ?> value="2">Rejected</option>
                                <!--<option class="wmp-input" <?php //if(isset($_POST["newsType"])&& ($_POST['newsType']==3)) {echo "selected";} ?> value="3">Draft</option>-->
								</select> 
                                <button class="btn btn-primary waves-effect" name="btn_filter" id="submit" type="submit">FILTER</button>
                                
								</div>
								</div>

                                <div class="col-sm-5">
                                <div id="DataTables_Table_0_filter" class="dataTables_filter">  
                                <label>Search:<input type="search" class="form-control input-sm" name="keyword" value="<?php if(@isset($_POST['keyword'])){ echo $_POST['keyword'];}?>" placeholder="" aria-controls="DataTables_Table_0">
                                <button class="btn btn-primary waves-effect"  name="btn_search" id="submit" type="submit">SEARCH</button>
                               </form>
                                </label>
                                </div>
                                </div>
                                </div>
                                <div class="row"><div class="col-sm-12"><table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="news" role="grid" aria-describedby="DataTables_Table_0_info">
                                    <thead>
                                        <tr role="row">
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 250px;">Headline</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">File</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Modify Date</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Publish Date</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10px;">Views</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 79px;">Status</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 50px;">Action</th></tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    while($row=mysqli_fetch_array($result_news))
                                    {?>
                                        <tr role="row">
                                            <td  style="width: 250px;"><?php echo wordwrap($row['HeadLine'],35,"<br>")?></td>
                                            <td  style="width: 80px;"><img src="<?php echo $imgPath."/".$row['FileAttach'];?>" height="100px" width="80px" ></td>
                                            <?php if($row["Approved"]==1 ){ ?>
                                            <td><?php echo substr($row['ModifyDate'],0,10);?></td>
                                            <td><?php echo $row['PublishDate'];?></td>
                                            <td style="width: 10px;"><?php echo $row['Views'];?></td>
                                            <?php } 
                                            elseif($row["Approved"]==0 && $row["Offline"]==1 && $row["Rejected"]==3){ ?> 
                                            <td colspan='3'> Your News is offline due to <?php echo $row["RejectionMsg"]; ?></td>
                                            <?php }
                                            elseif($row["Approved"]==0 && $row["Offline"]==0 && $row['Rejected']==1 ){ ?>
                                            <td colspan='3'>Pending</td>
                                            <?php } 
                                            elseif($row["Approved"]==0 && $row['Offline']==0 && ($row["Rejected"]==2)){ ?>
                                                <td colspan='3'>News is Rejected due to <?php echo $row["RejectionMsg"]; ?><br/> <a href="?newsid=<?php echo $row["id"]; ?>">click to modify</a> </td>
                                            <?php } ?>          
                                            <td>
                                            <a  href="?status=<?php echo $row["id"];?>">
                                            <button <?php if($row["Approved"]==0 && $row["Offline"]==1 && $row["Rejected"]==3 ){ echo "disabled";} ?>  class="btn <?php echo $row['Status']?'btn-primary waves-effect':'btn-warning waves-effect'?>"><?php if($row['Status']){ echo "Active";}else{ echo "In-Active";} ?></button>
                                            
                                            </a>        
                                            </td>
                                            <td><small><a role="button" data-toggle="tooltip" data-placement="bottom" title="click to view news" href="?newsid=<?php echo $row["id"]; ?>"><i class="material-icons">remove_red_eye</a></i></a></small>
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
                                    <li class="paginate_button previous <?php if(/*$page*/$_GET['page']>$total_news_pages || $_GET['page']==1){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
                                    <a href="news.php?page=<?php echo $_GET['page']-1;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Previous</a></li>
                                    <?php
                                    for($i=1;$i<=$total_news_pages;$i++)
                                    {
                                        ?>
                                        <li class="paginate_button <?php echo ($i==$_GET['page'])?'active':'';?>"><a href="news.php?page=<?php echo $i;?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"><?php echo $i;?></a></li>        
                                        &nbsp;
                                    <?php }
                                    ?>
                                    <li class="paginate_button previous <?php if($page>=$total_news_pages){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
                                    <a href="news.php?page=<?php echo $_GET['page']+1;//$total_pages;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Next</a></li>
                                    
                                    </ul>
                                </div>
                                </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>