<?php
$query="";
$select="SELECT * FROM `tbl_$type` where `deletion`='1'";


  $User_email=$_SESSION['newSub-AdminLogin'];
  $sql="SELECT * FROM `tbl_module_user` WHERE `email`='$User_email' ";
  $qry=mysqli_query($con,$sql);
  $data=mysqli_fetch_array($qry);
  $user_id=$data['id'];
if(isset($_POST['c_'.$type.''])){
    
    @$title=$_POST['title'];
    @$url=$_POST['url'];
    @$seo_title=$_POST['seo_title'];
    @$desc=$_POST['seo_desc'];
    @$location=$_POST['location'];
    @$date=$_POST['dat'];
   @$status=$_POST['status'];
   if($type=="gallery"){
   @$sql="INSERT INTO `tbl_$type` (`sub_admin_id`, `title`, `url`, `seo_title`, `seo_desc`, `location`, `c_date`,`status`)
     VALUES ('$user_id', '$title', '$url', '$seo_title', '$desc', '$location', '$date', '$status')";
   }
   if($type=="picture"){
    @$gallery_id=$_POST['gallery_id'];
	
    @$caption=$_POST['caption'];
    @$status=$_POST['status'];
    //check existing folder and create new one
    if(!is_dir($imgPath.$gallery_id)){
      mkdir($imgPath.$gallery_id);
      }
    //working for image
    $image=$_FILES['image'];
    
    $imageName='';
    if(isset($image['name'])&&!empty($image['name'])){
      //to copy or move from temp to a destination
      $temp = explode(".", $_FILES["image"]["name"]);
               
      $extension = end($temp);
                $fileName = $temp[0] . "." . $temp[1];
                $temp[0] = rand(0, 3000); //Set to random number
                $temp = explode(".", $_FILES["image"]["name"]);
                $newfilename = round(microtime(true)) . '.' . $extension;
              // Compress image
        function compressImage($source, $destination, $quality) {

          $info = getimagesize($source);

          if ($info['mime'] == 'image/jpeg') {
              $image = imagecreatefromjpeg($source);
          }
          elseif ($info['mime'] == 'image/gif'){ 
              $image = imagecreatefromgif($source);
          }
          elseif ($info['mime'] == 'image/png'){ 
              $image = imagecreatefrompng($source);
          }
          imagejpeg($image, $destination, $quality);
      
      }
      compressImage($_FILES['image']['tmp_name'],$imgPath.$gallery_id."/".$newfilename,60);
      //copy or move_uploaded_file function
      //to move the uploaded file to the required destination
      //$move=move_uploaded_file($image['tmp_name'],$imgPath.$gallery_id."/".$newfilename);
     // $move=move_uploaded_file($_FILES["image"]["tmp_name"],$imgPath.$gallery_id."/".$newfilename);
      
      
      }
    
    
    $sql="INSERT INTO `tbl_picture` ( `sub_admin_id`,`gallery_id`, `caption`, `image`, `c_date`, `status`) 
    VALUES 
    ('$user_id','$gallery_id', '$caption', '$newfilename', '$date', '$status')";
    
   }
     $qry=mysqli_query($con,$sql);
     if($qry){
      $success=ucfirst($type). " Created Success";
      
    //$p="c_".$type;
     }else{
        $error=ucfirst($type). " Not Created".mysqli_error($con);
        $sql=$select;
     }
}
  
if(isset($_POST["m_'.$type.'"])){
  $sql=$select;
 
}else{
  $sql=$select;
 
}
//delete
if(isset($_GET['del'])){
	$id1=$_GET['del'];
	$sql="update `tbl_$type` set deletion=!deletion WHERE id='$id1'";
	$query=mysqli_query($con,$sql);
	if($query){
    $info=ucfirst($type) . "Deleted Success";
  $sql=$select;
  
  }
  else{
  $error=ucfirst($type) ." is not deleted". Mysqli_error($con);
  $sql=$select;
  }
}
//status

//to change the status of a record
if(isset($_GET['status'])){
	$id1=$_GET['status'];
	$sql="update tbl_$type set status=!status WHERE id='$id1'";
	$query=mysqli_query($con,$sql);
	if($query){
  $success=ucfirst($type)." status has been successfully changed.";
  $sql=$select;
	}
  else{
    $error=ucfirst($type) ." is not changed". Mysqli_error($con);
    $sql=$select;
    }
  }
//to editable  record
if(isset($_GET['edit'])){
	$id1=$_GET['edit'];
	$sql="SELECT * FROM tbl_$type WHERE id='$id1'";
	$query=mysqli_query($con,$sql);
  $editData=mysqli_fetch_assoc($query);
  
  }
  //update query
  if(isset($_POST['u_'.$type.''])){
  @$id=$_POST['id'];
  @$title=$_POST['title'];

  
  @$url=$_POST['url'];
  @$seo_title=$_POST['seo_title'];
  @$desc=$_POST['seo_desc'];
  @$location=$_POST['location'];
  @$date=$_POST['dat'];
 @$status=$_POST['status'];
 //for picture
 @$gallery_id=$_POST['gallery_id'];
	@$caption=$_POST['caption'];
	//check existing folder and create new one
	if(!is_dir($imgPath.$gallery_id)){
		mkdir($imgPath.$gallery_id);
		}
	//working for image
	@$image=$_FILES['image'];
@	$imageName=$_POST['oldImage'];
	if(isset($image['name'])&&!empty($image['name'])){
		//to copy or move from temp to a destination
		//copy or move_uploaded_file function
		//to move the uploaded file to the required destination
		$move=move_uploaded_file($image['tmp_name'],$imgPath.$gallery_id."/".$image['name']);
		if($move){
			//to remove old image from directory
			@unlink($imgPath.$gallery_id."/".$imageName);
		$imageName = $image['name'];
		}
  }
  if($type=="gallery"){
 $sql="UPDATE `tbl_$type` SET `title` = '$title', `url` = '$url', `seo_title` = '$seo_title', `seo_desc` = '$desc', `location` = '$location', `c_date`='$date',`status`='$status'
  WHERE `tbl_gallery`.`id` = '$id'";
  }
  if($type=="picture"){
    $sql="UPDATE `tbl_picture` SET 
    `gallery_id` = '$gallery_id', `caption` = '$caption',`image`='$imageName', `c_date` = '$date', `status` = '$status'
     WHERE `tbl_picture`.`id` = '$id'";
  }
  $qry=mysqli_query($con,$sql);
   if($qry){
     $success=ucfirst($type). " Details Updated Success";
     
     $sql=$select;

  //$p="c_".$type;
   }else{
      $error=ucfirst($type). " Details Not Updated".mysqli_error($con);
      $sql=$select;
   }
}
//to search records
if(isset($_POST['search'])){
	if($_POST['keyword']==NULL){
    $error="Please Enter Hint Like ID or Title or caption to search ";
    $sql=$select;
    
  }
else{
  $searchkey = $_POST['keyword'];
  if($type=="picture"){
    $sql="select * from tbl_$type where caption like '%$searchkey%' or id like '%$searchkey%' and deletion='1'";
    }
    if($type=="gallery"){
      $sql="select * from tbl_$type where title like '%$searchkey%' or id like '%$searchkey%' and deletion='1'";
      }
        
}
}else{
  $sql=$select;
  
  }


  $query=mysqli_query($con,$sql);

?>