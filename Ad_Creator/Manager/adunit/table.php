<div class="container">
<div class="table-responsive table-responsive-data2">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <form method='post'>
                                <h3 class="title-5 m-b-35">Manage Advertisement</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                        <label>Show </label>
                                        <select name="adType" aria-controls="DataTables_Table_0" class="form-control show-tick">
                                <option class="wmp-input" <?php if(isset($_POST["adType"]) && ($_POST['adType']=="")) {echo "selected";} ?> value="">--Select--</option>
                                <option class="wmp-input" <?php if(isset($_POST["adType"]) && ($_POST['adType']==4)) {echo "selected";} ?> value="4">Approved</option>
                                <option class="wmp-input" <?php if(isset($_POST["adType"])&& ($_POST['adType']==0)) {echo "selected";} ?> value="0">Pending</option>
                                <option class="wmp-input" <?php if(isset($_POST["adType"])&& ($_POST['adType']==1)) {echo "selected";} ?> value="1">Dis-Approve</option>
                                <option class="wmp-input" <?php if(isset($_POST["adType"])&& ($_POST['adType']==2)) {echo "selected";} ?> value="2">Rejected</option>
                                <option class="wmp-input" <?php if(isset($_POST["adType"])&& ($_POST['adType']==3)) {echo "selected";} ?> value="3">Wallet Down</option>
                                <option class="wmp-input" <?php if(isset($_POST["adType"])&& ($_POST['adType']==5)) {echo "selected";} ?> value="5">Wallet Up</option>
								</select> 
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter" name="btn_filter" type="submit">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                    <div class="header-wrap">
                                     <div class="table-data__tool-right form-header">
                                     <input class="au-input au-input" type="text" name="search"  value="<?php if(@isset($_POST['keyword'])){ echo $_POST['keyword'];}?>" placeholder="Search for ads. . . . . . " />
                                     <button class="au-btn--submit"  name="btn_search" id="submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                       </button>
                                    </div>
                                    </div>
                                
                                </div>
                                </form>
                                
                                <?php  //if(isset($_POST['btn_filter'])) { echo "<script>alert('hello');</script>"; } ?>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>

                                            <tr role="row">
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">unitname</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">File</th>
 
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Publish Date</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10px;">Views</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10px;">Amount</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 79px;">Status</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 50px;">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    while($row=mysqli_fetch_array($result_ad))
                                    {?>
                                            <tr role="row" class="tr-shadow">
                                            <td style="width: 150px;"><?php echo wordwrap($row['unit_name'],35,"<br>")?></td>
                                            <td  style="width: 80px;"><a href='img/<?php echo $row['file_attach']?>'><img src="<?php echo "img/".$row['file_attach'];?>" height="100px" width="80px" ></a></td>
                                <td><?php echo substr($row['publish_date'],0,10)?></td>
                                                           
                                <?php if($row["approve"]==1){ ?>
                                            
                                            <td style="width: 10px;"><?php echo $row['view'];?></td>
                                            <?php } 
                                            elseif($row["approve"]==0 && $row["rejected"]==1 && $row["offline"]==0){ ?>
                                                <td>Pending</td>
                                           <?php }
                                           else if($row["approve"]==0 && $row['offline']==0 && ($row["rejected"]==1 || $row["rejected"]==2) ){ ?>
                                                        <td>your ad is rejected due to <?php echo $row['rejection_msg']; ?><br/> <a href="?adid=<?php echo $row["id"]; ?>">click to modify</a></td>
                                           <?php } 
                                           else if($row["approve"]==0 && $row['offline']==1 ){ ?>
                                            <td>your ad is rejected due to <?php echo $row['rejection_msg']; ?></td>
                                           <?php } ?>
                                               
                                            <td><?php echo $row['amount'];?></td>       
                                <td>
                                <a data-toggle="tooltip" data-placement="top" title="Status" href="?status=<?php echo $row["id"];?>">
                                <button <?php if($row["approve"]==0 && $row["offline"]==1 && $row["rejected"]==3 || $row['amount']==0.00){ echo "disabled";} ?>  class="btn <?php echo $row['status']==1?'btn-primary waves-effect':'btn-warning waves-effect'?>"><?php if($row['status']==1){ echo "Active";}else{ echo "In-Active";} ?></button>
                                </a>        
                                </td>


                                <td>
                                <a href="?adid=<?php echo $row['id']?>" data-toggle="tooltip" data-placement="top" title="Show Ad" ><button  class="btn btn-primary waves-effect"><span class="fas fas fa-eye" ></span></button></a>
                                <a data-toggle="tooltip" data-placement="top" title="Refill Ad" href="adunit.php?amount=<?php echo $row['unit_name']?>"><button   class="btn btn-primary waves-effect"><span class="fas fas fa-rupee plus-sqaure" ></span></button></a>
                                </td>
                                 </tr>
                             <?php   }//while   
                                    ?>  
                                        </tbody>
                                    </table>
                                </div>

                                  <div class="row">
                                    <div class="col-sm-12">
                                    <!--<div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing <?php echo $page1;?> to 5 of <?php echo $total_ad_rec;?> entries</div>-->
                                    </div>
                                    <div class="col-sm-6">  
                                        <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                        <ul class="pagination">
                                        <li class="page-item paginate_button previous <?php if(/*$page*/$_GET['page']>$total_ad_pages || $_GET['page']==1){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
                                        <a class="page-link" href="adunit.php?page=<?php echo $_GET['page']-1;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Previous</a></li>
                                        <?php
                                        for($i=1;$i<=$total_ad_pages;$i++)
                                        {
                                            ?>
                                            <li class="page-item paginate_button <?php echo ($i==$_GET['page'])?'active':'';?>"><a class="page-link" href="adunit.php?page=<?php echo $i;?>" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0"><?php echo $i;?></a></li>        
                                            &nbsp;
                                        <?php }
                                        ?>
                                        <li class="page-item paginate_button previous <?php if($page>=$total_ad_pages){ echo "disabled";} ?>" id="DataTables_Table_0_previous">
                                        <a class="page-link" href="adunit.php?page=<?php echo $_GET['page']+1;//$total_pages;?>" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0">Next</a></li>
                                        
                                        </ul>
                                    </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
  </div>
  </div>