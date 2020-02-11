<div><br/><br/><br/>
<div class="news-card">
<div class="wmp-card-4">
<div class="wmp-container wmp-green">
  <h2>Add News</h2>
</div>
<form id="news" method="POST" class="wmp-container" enctype="multipart/form-data" ><br/>
<select id="category" class="wmp-input" name="category">
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
<br/>

<input type="text" class="wmp-input" value="<?php echo @$update['HeadLine']; ?>" id="newsheadline" onkeyup="convertToSlug(this.value);convertToComa(this.value);" placeholder="Enter news Headline" name="newsheadline" >
<span id="error_headline" class="error"><?php if(isset($error_headline)){echo $error_headline;}?></span><br/>

<input type="text" class="wmp-input" id="url" value="<?php echo @$update['Url']; ?>" readonly="readonly" placeholder="Enter Url"  name="url">
<span id="error_url" class="error"></span><br/>

<input type="text" class="wmp-input"  name="seotitle" placeholder="Enter Seo Title" value="<?php echo @$update['SeoTitle']; ?>" readonly="readonly" id="seotitle">  
<span id="error_seo_title" class="error"></span><br/>

<input type="text" class="wmp-input" name="summary" placeholder="Enter Summary" value="<?php echo @$update['Summary']; ?>" onkeyup="convertToComa1(this.value);" id="summary" >    
<span id="error_summary" class="error"><?php if(isset($error_summary)){echo $error_summary;}  ?></span><br/>

<input type="text" class="wmp-input" name="seodes"value="<?php echo @$update['SeoDescription']; ?>" placeholder="Enter Seo Description"  readonly="readonly"  id="seodes" >    
<span id="error_seo_desc" class="error"></span><br/>

<textarea name="editor1"></textarea>
    <script>
            CKEDITOR.replace( 'editor1' );
    </script>
<br/>
<input type="file" value="<?php echo @$update['FileAttach']; ?>"  class="wmp-input" name="file">    
<span id="error_attach_file"  class="error"><?php if(isset($error_attach_file)){echo $error_attach_file;}?></span><br/>

<select class="wmp-input" value="<?php echo @$update['Status']; ?>" name='status'  id='status'>                                        
<option value="1">Active</option>
<option value="0">In-Active</option>
<option value="2">Draft</option>
</select>
        
<br/>

<?php
if(isset($_GET['newsid'])){
$query_status="select * from tbl_news where Deletation=0 and NewsID=".$_GET['newsid'];
$data1=mysqli_query($con,$query_status);
$row1=mysqli_fetch_assoc($data1);
{
?>
<button <?php if(isset($_GET['newsid'])){ if($row1["Approved"]==0 && $row1["Offline"]==1 && $row1["Rejected"]==3){ echo "disabled";}elseif($row1["Rejected"]==2 && $row1["Approved"]==0){echo "enabled";}elseif($row1["Approved"]==0 && $row1["Rejected"]==1 && $row1["Offline"]==0 ){echo "disabled";} elseif($row1["Approved"]==1 && $row1["Rejected"]==1 && $row1["Offline"]==0 ){echo "disabled";}else{ echo "enabled";}}?> class="wmp-button wmp-green" name="add_<?php echo (isset($_GET["newsid"]))?'u':$type;?>" id="submit" type="submit">SUBMIT</button>
<?php }}else{?>
<button class="wmp-button wmp-green" name="add_<?php echo (isset($_GET["newsid"]))?'u':$type;?>" id="submit" type="submit">SUBMIT</button>
<?php } ?>
<br/><br/>
</form>
</div>
</div>
