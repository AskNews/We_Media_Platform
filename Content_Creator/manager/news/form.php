
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
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" id="category" name="category">
                                        <option  value="">-- select category --</option>
                                        <?php
                                            $query="select * from tbl_categories where status=1";
                                            $data=mysqli_query($con,$query);
                                            while($row=mysqli_fetch_assoc($data))
                                            {
                                                //if(!isset($_GET["update"]))
                                               // {
                                                    echo "<option value=$row[id]>$row[title]</option>";
                                                //}
                                                //else
                                                //{
                                                //     if(in_array($row['title'],$update['title']))
                                                //     {
                                                //         echo "<option value=$row['id']>$update['title']</option>";
                                                //     }
                                                // }
                                            }
                                            
                                        ?>
                                        <?php //if(in_array($row['title'],$update['title']))
                                            // {
                                            //     echo "selected";
                                            // } 
                                        ?>
                                    </select>
                                </div>    
                                <span id="error_category" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">New Headline</label>
                                        <input type="text" class="form-control"  id="newsheadline" onkeyup="convertToSlug(this.value);convertToComa(this.value);" name="newsheadline" >
                                    </div>
                                    <span id="error_headline" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Url</label>
                                        <input type="text" class="form-control" id="url"  name="url">
                                    </div>
                                    <span id="error_url" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">SEO Title</label>
                                        <input type="text" class="form-control"  name="seotitle" id="seotitle">  
                                    </div>
                                    <span id="error_seo_title" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">SEO Description</label>
                                        <input type="text" class="form-control" name="seodes"  id="seo_desc" >    
                                    </div>
                                    <span id="error_seo_desc" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                            <label class="form-label" style="color:grey;">Attach File</label>
                                    <div class="form-line">
                                        <input type="file"  class="form-control" name="file">    
                                    </div>
                                    <span id="error_attach_file" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Details</label>
                                    <div class="form-line">
                                           <!-- Ckeditor -->
                                        <script src="plugins/ckeditor/ckeditor.js"></script>
                                            <textarea name="editor1" id="editor1">
                                            </textarea>
                                        <script>
                                            // Replace the <textarea id="editor1"> with a CKEditor
                                            // instance, using default configuration.
                                            CKEDITOR.replace("editor1");
                                        </script>
                                    </div>  
                                    <span id="error_details" class="error"></span>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Summary</label>
                                        <input type="text" class="form-control" name="summary" id="summary" >    
                                    </div>
                                    <span id="error_summary" class="error"></span>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name='status'  id='status'>
                                        <option value="">-- Status --</option>
                                        <option value="1">Active</option>
                                        <option value="0">In-Active</option>
                                        
                                    </select>
                                </div>    
                                <span id="error_status" class="error"></span>
                            </div>
                            <button class="btn btn-primary waves-effect" name="add_<?php echo $type;?>" id="submit" type="submit">SUBMIT</button>
                        </form>
                        </div>      
                    </div>
                </div>
                
<!--<script src="plugins/jquery/jquery.min.js">
 $("#submit").click(function()
{
    var cat=$("#category").val();
    var headline=$("#newsheadline").val();
    var url=$("#url").val();
    var seo_title=$("#seo_title").val();
    var seo_desc=$("#seo_desc").val();
    var fileName="";
    $('input[type="file"]').change(function(e){
    var fileName = e.target.files[0].name;
    });
    var details=$("#editor1").val();
    var summary=$("#summary").val();
    var status=$("#status").val();
    $.ajax({
                type:"post",
                url:"../engine/engine.php",
                //data:{Name:oName},
                data:$("#form_advanced_validation").serialize(),
                success:function(data)
                {
                    alert(data);
                },
                error:function(error)
                {
                    
                }
			});
});	

</script>-->