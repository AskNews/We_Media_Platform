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
                                                             {if($update['CategoryID']==$row['id']){
                                                                $selected='selected';
                                                             }
                                                             }
                                                        ?>
                                                             <option value="<?php echo $row['id'];  ?>" <?php if(@$update["CategoryID"]==$row["id"]){ echo "selected";}?> ><?php echo $row['title'];?></option>
                                                         <?php
                                                          }
                                            
                                                        ?>
                                                        </select>
                                                    </div>
                                                    <span id="error_category" class="error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Ad Unit Name</label>
                                                    <input class="au-input au-input--full" type="text" name="unit_name" value="<?php echo @$update['unit_name']; ?>" id="unit_name" onkeyup="convertToSlug(this.value);convertToComa(this.value);" placeholder="Unit Name">
                                                </div>
                                                <span style="color:red" id="error_unitname" class="error"><?php if(isset($error_unitname)){echo $error_unitname;}?></span>
                                                <div class="form-group">
                                                    <label>URL</label>
                                                    <input class="au-input au-input--full" name="url" id="url" value="<?php echo @$update['url']; ?>" readonly="readonly" placeholder="URL">
                                                </div>
                                                <span id="error_url" class="error"></span>
                                                <div class="form-group">
                                                    <label>Seo_title</label>
                                                    <input class="au-input au-input--full" type="text" name="seo_title" value="<?php echo @$update['seo_title']; ?>" readonly="readonly" id="seotitle" placeholder="Seo_Title">
                                                </div>
                                                <span id="error_seo_title" class="error"></span>
                                                <div class="form-group">
                                                    <label>Seo_Description</label>
                                                    <input class="au-input au-input--full" type="text" name="seo_desc" value="<?php echo @$update['seo_desc']; ?>"  readonly="readonly"  id="seodes"placeholder="Seo_Description">
                                                </div>
                                                <div class="form-group">
                                                    <label>Ad Unit Image</label>
                                                    <input type="file" id="file-input" name="file"  value="<?php echo @$update['file_attach']; ?>" class="form-control-file">
                                                </div>
                                                <span style="color:red" id="error_attach_file"  class="error"><?php if(isset($error_attach_file)){echo $error_attach_file;}?></span>

                                            </div>
                                            <div class="col-6">
                                            <div class="form-group">
                                            <div class="form-group">
                                                    <label>Amount</label>
                                                    <input class="au-input au-input--full" type="amount" name="amount" placeholder="Amount">
                                                </div>
                                                <span style="color:red" id="error_amount" class="error"></span>
                                                    <label>Summary</label>
                                                    <input class="au-input au-input--full" type="text" name="summary"value="<?php echo @$update['summary']; ?>" onkeyup="convertToComa1(this.value);" id="summary" placeholder="Summary">
                                                </div>
                                                <span  style="color:red" id="error_summary" class="error"><?php if(isset($error_summary)){echo $error_summary;}  ?></span>
                                                <div class="form-group">
                                                    <label>CPC</label>
                                                    <input class="au-input au-input--full" type="cpc" name="cpc" placeholder="CPC">
                        
                                                </div>
                                                <span style="color:red" id="error_amount" class="error"></span>
                                                <div class="form-group">
                                                    <label for="textarea-input" class=" form-control-label">Details</label>
                                                    <textarea name="details" id="details" rows="5" placeholder="Content..." class="form-control">
                                                    <?php echo @$update['details']; ?></textarea>
                                             </div>
                                             <span id="error_details" class="error"></span>
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <div class="form-group">
                                                        <select value="<?php echo @$update['status']; ?>" name='status'  id='status' class="form-control">
                                                            <option value="1">Active</option>
                                                            <option value="0">In-Active</option>
                                                            <option value="2">Draft</option>
                                                        </select>
                                                    </div>
                                                    <span id="error_status" class="error"></span>
                                                </div>
                                                <?php
                            if(isset($_GET['adid'])){
                            $query_status="select * from tbl_adunit where ad_id=".$_GET['adid'];
                            $data1=mysqli_query($con,$query_status);
                            $row1=mysqli_fetch_assoc($data1);
                            {
                            ?>
                                            <div style="margin-left:43%;">
                                                <button <?php if(isset($_GET['adid'])){ if($row1["approve"]==0 && $row1["offline"]==1 && $row1["rejected"]==3){ echo "disabled";}elseif($row1["rejected"]==2 && $row1["approve"]==0){echo "enabled";}elseif($row1["approve"]==0 && $row1["rejected"]==1 && $row1["offline"]==0 ){echo "disabled";} elseif($row1["approve"]==1 && $row1["rejected"]==1 && $row1["offline"]==0 ){echo "disabled";}else{ echo "enabled";}}?>class="au-btn au-btn--block au-btn--green" name="add_<?php echo (isset($_GET["adid"]))?'u':$type;?>" id="submit" type="submit">Submit</button>
                                                <?php }}else{?>
                                                 <button class="au-btn au-btn--block au-btn--green" name="add_<?php echo (isset($_GET["adid"]))?'u':$type;?>" id="submit" type="submit">SUBMIT</button>
                                                 <?php } ?>
                                            </div>
                                    </form>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>