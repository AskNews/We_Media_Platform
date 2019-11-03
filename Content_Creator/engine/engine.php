<?php
@$Viewcat=$_POST["category"];
@$ViewheadLine=$_POST["newsheadline"];
@$Viewurl=$_POST["url"];
@$ViewseoTitle=$_POST["seotitle"];
@$ViewseoDes=$_POST["seodes"];
@$ViewattachFile=$_FILES["file"]["name"];
@$Viewdetails=$_POST["editor1"];
@$Viewsummary=$_POST["summary"];
@$Viewstatus=$_POST["status"];
/*if(isset($_POST['add_'.$type.'']))
{
  
    @$cat=$_POST["category"];
    @$headLine=$_POST["newsheadline"];
    @$url=$_POST["url"];
    @$seoTitle=$_POST["seotitle"];
    @$seoDes=$_POST["seodes"];
    @$attachFile=$_FILES["file"]["name"];
    @$details=$_POST["editor1"];
    @$summary=$_POST["summary"];
    @$status=$_POST["status"];
    $attachFileName='';
    //check for fileuploader have file or not
    if(isset($_FILES['file']['name'])&&!empty($_FILES['file']['name']))
    {
        //to copy or move from temp to a destination
        $temp = explode(".", $_FILES["file"]["name"]);           
        $extension = end($temp);
        $fileName = $temp[0] . "." . $temp[1];
        $temp[0] = rand(0, 3000); //Set to random number
        $temp = explode(".", $_FILES["file"]["name"]);
        $newfilename = round(microtime(true)) . '.' . $extension;
        // Compress image
        function compressImage($source, $destination, $quality) 
        {
          $info = getimagesize($source);
          if ($info['mime'] == 'image/jpeg') {
            $attachFile = imagecreatefromjpeg($source);
          }
          elseif ($info['mime'] == 'image/gif'){ 
              $attachFile = imagecreatefromgif($source);
          }
          elseif ($info['mime'] == 'image/png'){ 
              $attachFile = imagecreatefrompng($source);
          }
          imagejpeg($attachFile, $destination, $quality);
        }
        compressImage($_FILES['file']['tmp_name'],$imgPath."/".$newfilename,60);
    }
    $sql="insert into tbl_$type(CategoryID,CreatorID,HeadLine,Url,SeoTitle,SeoDescription,FileAttach,Summary,Details,Status) values('$cat','$creatorid','$headLine','$url','$seoTitle','$seoDes','$newfilename','$summary','$details','$status')";
    $qry=mysqli_query($con,$sql);
     if($qry){
      $success=ucfirst($type). " Created Success";
    //move_uploaded_file($_FILES['file']['tmp_name'],$imgPath."/".$newfilename);
    }else{
        $warning=ucfirst($type). " Not Created".mysqli_error($con);
        //$sql=$select;
     }
}*/
if(isset($_POST['add_'.$type.'']))
{
  $success=ucfirst($type). " Created Success";
  //echo "<script>alert('$success');</script>";
}
?>