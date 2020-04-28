<div class="container">
<div class="table-responsive table-responsive-data2">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Manage Advertisement</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                        <label>Show </label>
                                        <select name="adType" aria-controls="DataTables_Table_0" class="form-control show-tick">
                                <option class="wmp-input" <?php if(isset($_POST["newsType"]) && ($_POST['newsType']=="")) {echo "selected";} ?> value="">--Select--</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"]) && ($_POST['newsType']==4)) {echo "selected";} ?> value="4">Approved</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==0)) {echo "selected";} ?> value="0">Pending</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==1)) {echo "selected";} ?> value="1">Offline</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==2)) {echo "selected";} ?> value="2">Rejected</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==3)) {echo "selected";} ?> value="3">Draft</option>
								</select> 
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter" name="btn_filter" type="submit">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>

                                            <tr role="row">
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">unitname</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">File</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Modify Date</th>
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
                                <td><img src="<?php echo "img/".$row['file_attach'];?>" height="100px" width="100px" > </td>
                                <td><?php echo substr($row['u_date'],0,10)?></td>
                                <?php if($row["approve"]==1 && $row['offline']==0 && ($row['rejected']==0 || $row['rejected']==1)){ ?>
                                            <td><?php echo $row['publish_date'];?></td>
                                            <td style="width: 10px;"><?php echo $row['view'];?></td>
                                            <?php } elseif($row["approve"]==0 && $row["offline"]==1 && $row["rejected"]==2){ ?> 
                                            <td colspan='2' style="text-align:center"> Your Ad is offline due to <?php echo $row["rejection_msg"]; ?></td>
                                            <?php }
                                            elseif($row["approve"]==0 && $row["offline"]==0 && $row['rejected']==0){ ?>
                                            <td colspan='2' style="text-align:center">Pending</td>
                                            <?php } elseif($row["approve"]==0 && $row["rejected"]==1 && $row["offline"]==0){ ?>
                                                <td colspan='2' style="text-align:center">News is Rejected due to <?php echo $row["rejection_msg"]; ?><a href="?adid=<?php echo $row["id"]; ?>">click to modify</a> </td>
                                            <?php } ?>    
                                            <td><?php echo $row['amount'];?></td>       
                                <td>
                                <a data-toggle="tooltip" data-placement="top" title="Status" href="?status=<?php echo $row["ad_id"];?>">
                                <button <?php if($row["approve"]==0 && $row["offline"]==1 && $row["rejected"]==2 || $row["rejected"]==1 || $row['amount']==0.00){ echo "disabled";} ?>  class="btn <?php echo $row['status']==1?'btn-primary waves-effect':'btn-warning waves-effect'?>"><?php if($row['status']==1){ echo "Active";}else{ echo "In-Active";} ?></button>
                                </a>        
                                </td>
                                <td>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Show Ad" ><button  class="btn btn-primary waves-effect"><span class="fas fas fa-eye" ></span></button></a>
                                <a data-toggle="tooltip" data-placement="top" title="Refill Ad" href="adunit.php?amount=<?php echo $row['seo_title']?>"><button   class="btn btn-primary waves-effect"><span class="fas fas fa-rupee plus-sqaure" ></span></button></a>
                                </td>
                                 </tr>
                             <?php   }//while   
                                    ?>  
                                        </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
  </div>
  </div>