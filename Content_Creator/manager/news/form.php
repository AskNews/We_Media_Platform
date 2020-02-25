
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">                    
                        <div class="header">
                            <h2>
                               ADD NEWS
                            </h2>
                        </div>
                        <div class="body">
                        <?php include "includes/msg.php";?>
                            <form id="form_advanced_validation" enctype="multipart/form-data" method="POST">            
                            <input type="hidden" name="HiddennewsId" value="<?php echo @$_GET['newsid'];?>" <?php //echo "<script>alert(newsid=$newsid);</script>";?> />
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" id="category" name="category">
                                        <!--<option  value="<?php //echo $update['CategoryID']; ?>"></option>-->
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
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">New Headline</label>
                                        <input type="text" class="form-control" value="<?php echo @$update['HeadLine']; ?>" id="newsheadline" onkeyup="convertToSlug(this.value);convertToComa(this.value);" name="newsheadline" >
                                    </div>
                                    <span id="error_headline" class="error"><?php if(isset($error_headline)){echo $error_headline;}?></span>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Url</label>
                                        <input type="text" class="form-control" id="url" value="<?php echo @$update['Url']; ?>" readonly="readonly"  name="url">
                                    </div>
                                    <span id="error_url" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">SEO Title</label>
                                        <input type="text" class="form-control"  name="seotitle" value="<?php echo @$update['SeoTitle']; ?>" readonly="readonly" id="seotitle">  
                                    </div>
                                    <span id="error_seo_title" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Summary</label>
                                        <input type="text" class="form-control" name="summary" value="<?php echo @$update['Summary']; ?>" onkeyup="convertToComa1(this.value);" id="summary" >    
                                    </div>
                                    <span id="error_summary" class="error"><?php if(isset($error_summary)){echo $error_summary;}  ?></span>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">SEO Description</label>
                                        <input type="text" class="form-control" name="seodes"value="<?php echo @$update['SeoDescription']; ?>"  readonly="readonly"  id="seodes" >    
                                    </div>
                                    <span id="error_seo_desc" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                            <label class="form-label" style="color:grey;">Attach File</label>
                                    <div class="form-line">
                                        <input type="file" value="<?php echo @$update['FileAttach']; ?>"  class="form-control" name="file">    
                                    </div>
                                    <span id="error_attach_file"  class="error"><?php if(isset($error_attach_file)){echo $error_attach_file;}?></span>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Details</label>
                                    <div class="form-line">
                                           <!-- Ckeditor -->
                                        <script src="plugins/ckeditor/ckeditor.js"></script>
                                            <textarea name="editor1" id="editor1">
                                            <?php echo @$update['Details']; ?>
                                            </textarea>
                                        <script>
                                            // Replace the <textarea id="editor1"> with a CKEditor
                                            // instance, using default configuration.
                                            CKEDITOR.replace("editor1");
                                        </script>
                                    </div>  
                                    <span id="error_details" class="error"></span>
                            </div>
                            
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" value="<?php echo @$update['Status']; ?>" name='status'  id='status'>
                                        
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                        <option value="2">Draft</option>
                                    </select>
                                </div>    
                                <span id="error_status" class="error"></span>
                            </div>
                            <?php
                            if(isset($_GET['newsid'])){
                            $query_status="select * from tbl_news where deletion=0 and id=".$_GET['newsid'];
                            $data1=mysqli_query($con,$query_status);
                            $row1=mysqli_fetch_assoc($data1);
                            {
                            ?>
                            <button <?php if(isset($_GET['newsid'])){ if($row1["Approved"]==0 && $row1["Offline"]==1 && $row1["Rejected"]==3){ echo "disabled";}elseif($row1["Rejected"]==2 && $row1["Approved"]==0){echo "enabled";}elseif($row1["Approved"]==0 && $row1["Rejected"]==1 && $row1["Offline"]==0 ){echo "disabled";} elseif($row1["Approved"]==1 && $row1["Rejected"]==1 && $row1["Offline"]==0 ){echo "disabled";}else{ echo "enabled";}}?> class="btn btn-primary waves-effect" name="add_<?php echo (isset($_GET["newsid"]))?'u':$type;?>" id="submit" type="submit">SUBMIT</button>
                            <?php }}else{?>
                                <button class="btn btn-primary waves-effect" name="add_<?php echo (isset($_GET["newsid"]))?'u':$type;?>" id="submit" type="submit">SUBMIT</button>
                             <?php } ?>
                        </form>
                        </div>      
                    </div>
                </div>