<?php
if(isset($_POST["submit"]))
{
    //echo "<script>alert('hello');</script>";
    $cat=$_POST["category"];
    $headLine=$_POST["newsheadline"];
    //$url=$_POST["url"];
    //$seoTitle=$_POST["seotitle"];
    $seoDes=$_POST["seodes"];
    @$attachFile=$_FILES["file_attach"]["name"];
    $details=$_POST["editor1"];
    $summary=$_POST["summary"];
    $_POST["status"];
    @move_uploaded_file($_FILES["file_attach"]["tmp_name"],"img/".$_FILES["file_attach"]);
    $url=str_replace(' ','_',$headLine);
    $seoTitle=str_replace(' ','_',$headLine);
}

?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               ADD NEWS
                            </h2>
                            
                        </div>
                        <div class="body">
                            <form id="form_advanced_validation"  method="POST">            
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name="category">
                                        <option value="">-- select category --</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="30">30</option>
                                        <option value="40">40</option>
                                        <option value="50">50</option>
                                    </select>
                                </div>    
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">New Headline</label>
                                        <input type="url" class="form-control" onkeyup="convertToSlug(this.value);convertToComa(this.value);" id="newsheadline" name="newsheadline" >
                                    </div>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Url</label>
                                        <input type="url" class="form-control" id="url" name="url">
                                    </div>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">SEO Title</label>
                                        <input type="text" class="form-control" name="seotitle">  
                                    </div>
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">SEO Description</label>
                                        <input type="text" class="form-control" name="seodes" >    
                                    </div>
                            </div>
                            <div class="form-group form-float">
                            <label class="form-label" style="color:grey;">Attach File</label>
                                    <div class="form-line">
                                        <input type="file"  class="form-control" name="file_attach">    
                                    </div>
                            </div>
                            <div class="form-group form-float">
                                <label class="form-label">Details</label>
                                    <div class="form-line">
                                           <!-- Ckeditor -->
                                        <script src="plugins/ckeditor/ckeditor.js"></script>
                                            <textarea name="editor1">
                                            </textarea>
                                        <script>
                                            // Replace the <textarea id="editor1"> with a CKEditor
                                            // instance, using default configuration.
                                            CKEDITOR.replace("editor1");
                                        </script>
                                    </div>  
                            </div>
                            <div class="form-group form-float">
                                    <div class="form-line">
                                    <label class="form-label">Summary</label>
                                        <input type="text" class="form-control" name="summary" >    
                                    </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-sm-12">
                                    <select class="form-control show-tick" name='status'>
                                        <option value="">-- Status --</option>
                                        <option value="10">Active</option>
                                        <option value="20">In-Active</option>
                                        
                                    </select>
                                </div>    
                            </div>
                                <button class="btn btn-primary waves-effect" name="submit" type="submit">SUBMIT</button>
                            </form>
                        </div>      
                    </div>
                </div>
<!--<script src="../plugins/jquery/jquery.min.js">
$('document').ready(function() {
   $('#newsheadline').on('change',function(){
       if(ctype_alnum(this.value))
        {
            var s1=$('#newsheadline').val();
            var s2= s1.replace(/" "/g,'_');
            $('#url').html(s2);
        }
        else
        {
           var error="only aplhanum character are allow";
           $("#errorHeadline").html(error);
        }
    }); 
});
</script>-->