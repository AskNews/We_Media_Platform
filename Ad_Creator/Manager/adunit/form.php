
<?php  //print_r($update);?>
<div class="container">
                    <div class="au-card">
                        <div class="login-wra">
                            <div class="login-content">
                                <div class="login-logo">
                                    <a href="#">
                                        <b>Create Your Advertise Here</b>
                                    </a>
                                </div>
                                <div class="login-form">
                                <?php include "includes/msg.php";?>
                                    <form id="form_advanced_validation" enctype="multipart/form-data" method="POST">
                                    <input type="hidden" name="HiddennewsId" value="<?php echo @$_GET['adid'];?>">
                                        <div class="row form-group">

                                            <div class="col-6">
                                            <div class="form-group">
                                                    <label>Catagory</label>
                                                    <div>
                                                        <select name="catagory" id="select" class="form-control">
                                                        <?php
                                                             $query="select * from tbl_categories where status=1";
                                                             $data=mysqli_query($con,$query);
                                                             while($row=mysqli_fetch_assoc($data))
                                                             {
                                                               $selected=null;
                                                             if(isset($update))
                                                             {if($update['category_id']==$row['id']){
                                                                $selected='selected';
                                                             }
                                                             }
                                                        ?>
                                                             <option value="<?php echo $row['id'];  ?>" <?php if(@$update["category_id"]==$row["id"]){ echo "selected";}?> ><?php echo $row['title'];?></option>
                                                         <?php
                                                          }
                                            
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <span id="error_category" class="error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ad Unit Name</label>
                                                    <input class="au-input au-input--full" type="text" name="unit_name"  value="<?php echo @$update['unit_name']; echo @$_POST['unit_name']; ?>" id="unit_name" onkeyup="convertToSlug(this.value);convertToComa(this.value);" placeholder="Unit Name">
                                                </div>
                                                <span style="color:red" id="error_unitname" class="error"><?php if(isset($error_unitname)){echo $error_unitname;}?></span>
                                                <div class="form-group">
                                                    <label>Ad Url</label>
                                                    <input class="au-input au-input--full" type="text" name="url" value="<?php echo @$update['url']; echo @$_POST['url'];?>" id="unit_name"  placeholder="Ad url">
                                                </div>
                                                <span style="color:red" id="error_unitname" class="error"><?php if(isset($error_url)){echo $error_url;}?></span>
                                            
                                                <div class="form-group">
                                                    <label>Ad Unit Image</label>
                                                    <input type="file" id="file-input" name="file"  value="<?php echo @$update['file_attach']; ?>" class="form-control-file">
                                                </div>
                                                <span style="color:red" id="error_attach_file"  class="error"><?php if(isset($error_attach_file)){echo $error_attach_file;}?></span>

                                            </div>
                                            <div class="col-6">
                                            <div class="form-group">
                                            <div class="form-group">
                                                    <label>Amount (in rupees)</label>
                                                    <select name="amount" class="au-input au-input--full" <?php if(@$update!=null) { echo "disabled"; } ?> >
                                                    <option <?php if(@$update['amount']=="100"){ echo "selected";  } ?> value="100">100</option>
                                                    <option <?php if(@$update['amount']=="200"){ echo "selected"; } ?> value="200">200</option>
                                                    <option <?php if(@$update['amount']=="300"){ echo "selected"; } ?> value="300">300</option>
                                                    <option <?php if(@$update['amount']=="400"){ echo "selected"; } ?> value="400">400</option>
                                                    </select>
                                                    <!-- <input class="au-input au-input--full" type="number" name="amount"  value="<?php //echo @$update['amount']; ?>" placeholder="Amount"> -->
                                                </div>
                                                <span class="error" ><?php echo @$error_amount; ?></span>
                                                
                                                <div class="form-group">
                                                    <label>CPC</label>
                                                    <!-- <input class="au-input au-input--full" type="number" name="cpc" value="<?php //echo @$update['cpc']; ?>" placeholder="CPC"> -->
                                                    <select name="cpc" class="au-input au-input--full" <?php if(@$update!=null) { echo "disabled"; } ?> >
                                                    <option <?php if(@$update['cpc']=="1"){ echo "selected"; } ?> value="1">1</option>
                                                    <option <?php if(@$update['cpc']=="2"){ echo "selected"; } ?> value="2">2</option>
                                                    <option <?php if(@$update['cpc']=="4"){ echo "selected"; } ?> value="4">4</option>
                                                    </select>
                                                </div>
                                                <span class="error" ><?php echo @$error_cpc; ?></span>
                                                
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <div class="form-group">
                                                        <select value="<?php echo @$update['status']; ?>" name='status'  id='status' class="form-control">
                                                            <option value="1" <?php if(@$update['status']==1) echo 'selected'; ?>>Active</option>
                                                            <option value="0" <?php if(@$update['status']==0) echo 'selected'; ?> >In-Active</option>
                                                        </select>
                                                    </div>
                                                    <span id="error_status" class="error"></span>
                                                </div>
                                               
                                            <div style="margin-left:1%;">
                                                
                                                 <?php if(@$update['id']==null) { ?>
                                                    <button class="au-btn au-btn--block au-btn--green" name="add_<?php echo (isset($_GET["adid"]))?'u':$type;?>" id="submit" type="submit">SUBMIT</button>
  
                                               <?php }
                                               elseif(@$update["approve"]==0 && @$update["offline"]==1 && @$update["rejected"]==3){ ?>
                                                 <button type="button" class="au-btn au-btn--block au-btn--green" disabled>Not Modify!</button>
                                                 <span class="error" >your ad is dis-approved by platform</span>
                                               <?php } 
                                               elseif(@$update["approve"]==0 && @$update["offline"]==0 && @$update['rejected']==1) {?>
                                                <button type="button" class="au-btn au-btn--block au-btn--green" disabled>Pending</button>
                                                <span class="error" >your ad is in process</span>
                                                <?php }
                                                elseif(@$update["approve"]==1 && @$update['offline']==0 && (@$update['rejected']==1 || @$update['rejected']==2)) { ?> 
                                                 <button type="button" class="au-btn au-btn--block au-btn--green" disabled>Not Modify!</button>
                                                 <span class="error" >your ad is approved..you can't modify it</span>
                                                <?php }
                                                elseif(@$update["approve"]==0 && @$update["rejected"]==2 && @$update["offline"]==0) { ?> 
                                                     <!-- <button type="submit" name="update_add" class="au-btn au-btn--block au-btn--green" >Update</button> -->
                                                     <input type='submit' name='update_ad' value='Update Ad' class='au-btn au-btn--block au-btn--green'>
                                                    <span class="error" >your ad is rejected...please modify it</span>
                                                <?php }
                                               else { } 
                                               ?>
                                            </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>