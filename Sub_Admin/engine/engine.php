<?php 
$query="";
$select="SELECT * FROM `tbl_$type` where `deletion`='1'";
//changing name
@$temp = explode(".", $_FILES["image"]["name"]);
               
@ $extension = end($temp);
          @ $fileName = $temp[0] . "." . $temp[1];
          @ $temp[0] = rand(0, 3000); //Set to random number
         @  $temp = explode(".", $_FILES["image"]["name"]);
          @ $newfilename = round(microtime(true)) . '.' . $extension;
          @$image=$_FILES['image'];
          @	$imageName=$_POST['oldImage'];
        //##############LOG ENGINE############
$a;
function log_engine($b){
    global $l,$type,$con,$success,$error,$select;
    $c=$b-1;
    $p="INSERT INTO tbl_log (";
    for($i=0;$i<$b;$i++){	
    $p=$p."`".$a[$i][0]."`";
    if($i==$c){}else{$p=$p.",";}
    }
    $p=$p.") VALUES (";
    for($i=0;$i<$b;$i++){	
    $p=$p."'".$a[$i][1]."'";
    if($i==$c){}else{$p=$p.",";}
    }
    $sql= $p.");";
    mysqli_query($con,$sql);
            return 0;	
    
}

          
//###################COMPRESS ENGINE########################
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
//#####################INSERT ENGINE######################## 
@$a;
function insert($b){
global $a,$type,$con,$success,$error;
$c=$b-1;
$p="INSERT INTO tbl_".$type." (";
for($i=0;$i<$b;$i++){	
$p=$p."`".$a[$i][0]."`";
if($i==$c){}else{$p=$p.",";}
}
$p=$p.") VALUES (";
for($i=0;$i<$b;$i++){	
$p=$p."'".$a[$i][1]."'";
if($i==$c){}else{$p=$p.",";}
}
$sql= $p.");";
$qry=mysqli_query($con,$sql);
		if($qry){
      $success=ucfirst($type). " Created Success";
      
		}else{
      $error=ucfirst($type). " Not Created".mysqli_error($con);
      $sql=$select;	
		}
		return 0;	
}
//##############DELETE ENGINE###################################
function del(){
  global $con,$error,$select,$type,$info;
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
//###################STATUS ENGINE############################
function status(){
  global $con,$error,$select,$type,$success;
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
//####################UPDATE ENGINE#############################
function update($b){
  global $con,$error,$select,$type,$success,$id,$a;
  $c=$b-1;
  $p="UPDATE tbl_".$type." SET ";
  for($i=0;$i<$b;$i++){	
  $p=$p."`".$a[$i][0]."`='".$a[$i][1]."'";
  if($i==$c){}else{$p=$p.",";}
  }
  $p=$p." WHERE `tbl_".$type."`.`id`='".@$id."' ";
  
  $sql= $p.";";
  $qry=mysqli_query($con,$sql);
  if($qry){
    $success=ucfirst($type). " Details Updated Success";
    
    $sql=$select;

 //$p="c_".$type;
  }else{
     $error=ucfirst($type). " Details Not Updated".mysqli_error($con);
     $sql=$select;
  }
      return 0;
  }
  
  $User_email=$_SESSION['newSub-AdminLogin'];
  $sql="SELECT * FROM `tbl_module_user` WHERE `email`='$User_email' ";
  $qry=mysqli_query($con,$sql);
  $data=mysqli_fetch_array($qry);
  
if(isset($_POST['c_'.$type.''])){
    
    @$image=$_FILES['image'];
    
    @$imageName='';
    @$temp = explode(".", $_FILES["image"]["name"]);
               
     @ $extension = end($temp);
               @ $fileName = $temp[0] . "." . $temp[1];
               @ $temp[0] = rand(0, 3000); //Set to random number
              @  $temp = explode(".", $_FILES["image"]["name"]);
               @ $newfilename = round(microtime(true)) . '.' . $extension;
      
   if($type=="gallery"){

     $a=array(
       array('sub_admin_id',$data['id']),
       array('title',$_POST['title']),
       array('url',$_POST['url']),
       array('seo_title',$_POST['seo_title']),
       array('seo_desc',$_POST['seo_desc']),
       array('location',$_POST['location']),
       array('c_date',$_POST['dat']),
       array('status',$_POST['status']));
       insert(8);
      }
   
   if($type=="categories"){
     
   $a=array(
    array('sub_admin_id',$data['id']),
    array('title',$_POST['title']),
    array('url',$_POST['url']),
    array('seo_title',$_POST['seo_title']),
    array('seo_desc',$_POST['seo_desc']),
    array('c_date',$_POST['dat']),
    array('status',$_POST['status']));
     insert(7);
   $a=array(
     array('log',$type.' inserted')

   );
   log_engine(1);
  }
   if($type=="picture"){
    
    //check existing folder and create new one
    if(!is_dir($imgPath.$_POST['gallery_id'])){
      mkdir($imgPath.$_POST['gallery_id']);
      }
    //working for image
    
    if(isset($image['name'])&&!empty($image['name'])){
      //to copy or move from temp to a destination
              // Compress image
      compressImage($_FILES['image']['tmp_name'],$imgPath.$_POST['gallery_id']."/".$newfilename,60);
      }
     $a=array(
      array('sub_admin_id',$data['id']),
      array('gallery_id',$_POST['gallery_id']),
      array('caption',$_POST['caption']),
      array('image',$newfilename),
      array('c_date',$_POST['dat']),
      array('status',$_POST['status']));
       insert(6);
   }
  
   if($type=="slideshow"){
    //working for image
    
    if(isset($image['name'])&&!empty($image['name'])){
      //to copy or move from temp to a destination
              // Compress image
      compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
      }
     $a=array(
      array('sub_admin_id',$data['id']),
      array('caption',$_POST['caption']),
      array('orderby',$_POST['orderby']),
      array('image',$newfilename),
      array('c_date',$_POST['dat']),
      array('status',$_POST['status']));
       insert(6);
   }
}
  
if(isset($_POST["m_'.$type.'"])){
  $sql=$select;
 
}else{
  $sql=$select;
 
}
if(isset($_GET['del'])){
del();
}
//status

//to change the status of a record
if(isset($_GET['status'])){
status();
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
 //for picture
 
  @$orderby=$_POST['orderby'];
  

	//check existing folder and create new one
  if($type=="picture"){
  if(!is_dir($imgPath.$_POST['gallery_id'])){
    
		@mkdir(@$imgPath.$_POST['gallery_id']);
    }
  
	//working for image
	if(isset($image['name'])&&!empty($image['name'])){
		
    compressImage($_FILES['image']['tmp_name'],$imgPath.$_POST['gallery_id']."/".$newfilename,60);
    
		if($imageName!=""){
			//to remove old image from directory
			@unlink($imgPath.$gallery_id."/".$imageName);
     
    }  
  }
 $a=array(
      array('gallery_id',$_POST['gallery_id']),
      array('caption',$_POST['caption']),
      array('image',$newfilename),
      array('c_date',$_POST['dat']),
      array('status',$_POST['status']));
     update(5);
    
  }

  if($type=="gallery"){
   $a=array(
    array('title',$_POST['title']),
    array('url',$_POST['url']),
    array('seo_title',$_POST['seo_title']),
    array('seo_desc',$_POST['seo_desc']),
    array('location',$_POST['location']),
    array('c_date',$_POST['dat']),
    array('status',$_POST['status']));
    update(7);
 
  }
  if($type=="categories"){
     $a=array(
     array('title',$_POST['title']),
     array('url',$_POST['url']),
     array('seo_title',$_POST['seo_title']),
     array('seo_desc',$_POST['seo_desc']),
     array('c_date',$_POST['dat']),
     array('status',$_POST['status']));
      update(6);
    
     }
  
  if($type=="slideshow"){
    //working for image
	if(isset($image['name'])&&!empty($image['name'])){
		
    compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
    
		if($imageName!=""){
			//to remove old image from directory
			@unlink($imgPath.$imageName);
      
    }  
  }
      $a=array(
      array('caption',$_POST['caption']),
      array('orderby',$_POST['orderby']),
      
      array('image',$newfilename),
        array('c_date',$_POST['dat']),
        array('status',$_POST['status']));
         update(5);
     
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