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
                                        <select name="newsType" aria-controls="DataTables_Table_0" class="form-control show-tick">
                                <option class="wmp-input" <?php if(isset($_POST["newsType"]) && ($_POST['newsType']=="")) {echo "selected";} ?> value="">--Select--</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"]) && ($_POST['newsType']==4)) {echo "selected";} ?> value="4">Approved</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==0)) {echo "selected";} ?> value="0">Pending</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==1)) {echo "selected";} ?> value="1">Offline</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==2)) {echo "selected";} ?> value="2">Rejected</option>
                                <option class="wmp-input" <?php if(isset($_POST["newsType"])&& ($_POST['newsType']==3)) {echo "selected";} ?> value="3">Draft</option>
								</select> 
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <button class="au-btn-filter" name="btn_filter" id="submit" type="submit">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>

                                            <tr role="row">
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 250px;">unitname</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 80px;">File</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Modify Date</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 103px;">Publish Date</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 10px;">Views</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 79px;">Status</th>
                                        <th class="" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 50px;">Action</th></tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    while($row=mysqli_fetch_array($result_ad))
                                    {?>
                                            <tr role="row" class="tr-shadow">
                                            <td style="width: 250px;"><?php echo wordwrap($row['unit_name'],35,"<br>")?></td>
                                <td style="width: 80px;"><img src="<?php echo $imgPath."/".$row['file_attach'];?>" height="100px" width="80px" > </td>
                                <?php if($row["approve"]){ ?>
                                    <td><?php echo substr($row['u_date'],0,10);?></td>
                                            <td><?php echo $row['publish_date'];?></td>
                                            <td style="width: 10px;"><?php echo $row['View'];?></td>
                                            <?php } elseif($row["approve"]==0 && $row["offline"]==1 && $row["rejected"]==3){ ?> 
                                            <td colspan='3'> Your ad is offline due to <?php echo $row["rejection_msg"]; ?></td>
                                            <?php }
                             elseif($row["approve"]==0 && $row["offline"]==0 && $row["rejected"]==1){ ?>
                                <td colspan='3'>Pending</td>
                                <?php } elseif($row["approve"]==0 && $row["rejected"]==2){ ?>
                                    <td colspan='3'>ad is Rejected due to <?php echo $row["rejection_msg"]; ?><br/> <a href="?ad_id=<?php echo $row["id"]; ?>">click to modify</a> </td>
                                <?php } ?>          
                                <td>
                                <a  href="?status=<?php echo $row["id"];?>">
                                <button <?php if($row["approve"]==0 && $row["offline"]==1 && $row["rejected"]==3 || $row["rejected"]==2){ echo "disabled";} ?>  class="btn <?php echo $row['status']?'btn-primary waves-effect':'btn-warning waves-effect'?>"><?php if($row['status']){ echo "Active";}else{ echo "In-Active";} ?></button>
                                </a>        
                                </td>
                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </div>
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