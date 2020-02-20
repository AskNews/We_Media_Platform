<?php
$select="";
//##################PAGINATION ##############################
@$page=$_GET["page"];
  if($page=="" || $page==1)
  {
      @$page1=0;
  }
  else
  {
      @$page1=($page*5)-5;
  }
  if($type=='user'){
    $select= mysqli_query($con,"select * from tbl_module_$type where deletion='1' limit $page1,5");
   }else{
       $select= mysqli_query($con,"select * from tbl_$type where deletion='1' limit $page1,5");
   
   }
 
$result_news=$select;
if($type=='user'){
    $sql1= mysqli_query($con,"select * from tbl_module_$type where deletion='1' ");
   }else{
       $sql1= mysqli_query($con,"select * from tbl_$type where deletion='1' ");
   
   }

@$total_rec=mysqli_num_rows($sql1);
$total_pages=ceil($total_rec/5);  
$last=$total_pages-1;    


 //changing name
@$temp = explode(".", $_FILES["image"]["name"]);
               
@ $extension = end($temp);
          @ $fileName = $temp[0] . "." . $temp[1];
          @ $temp[0] = rand(0, 3000); //Set to random number
         @  $temp = explode(".", $_FILES["image"]["name"]);
          @ $newfilename = round(microtime(true)) . '.' . $extension;
          @$image=$_FILES['image'];
          @	$imageName=$_POST['oldImage'];
//##############LOG ENGINE(Not tested)############
$l="";
function log_engine($c){
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
//##############COMPRESS ENGINE########################
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

 //##############INSERT ENGINE######################## 
@$a;
function insert($b){
global $a,$type,$con,$success,$error,$select;
$c=$b-1;
if($type=="user"){
$p="INSERT INTO tbl_module_".$type." (";
}else{
    $p="INSERT INTO tbl_".$type." (";

}
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
        if ($con->query($sql) === TRUE) {
       
            $success="User created success";
           // $qry=$select;
            } else {
            $error="Error: " . $sql . "<br>" . $con->error;
            }$con->close();
    
		return 0;	
}
//####################UPDATE ENGINE#############################

function update($b){
    global $con,$error,$select,$type,$success,$id,$a;
    $c=$b-1;
    if($type=="user"){
    $p="UPDATE tbl_module_".$type." SET ";
    }else{
        $p="UPDATE tbl_".$type." SET ";
        
    }
    for($i=0;$i<$b;$i++){	
    $p=$p."`".$a[$i][0]."`='".$a[$i][1]."'";
    if($i==$c){}else{$p=$p.",";}
    }
    if($type=="user"){
    
    $p=$p." WHERE `tbl_module_".$type."`.`id`='".@$id."' ";
    }else{
        $p=$p." WHERE `tbl_".$type."`.`id`='".@$id."' ";
        
    }
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
  
if(isset($_POST['c_'.$type])){
    if($type=="user"){
    @$image=$_FILES['image'];
    
    @$imageName='';
    @$temp = explode(".", $_FILES["image"]["name"]);
               
     @ $extension = end($temp);
               @ $fileName = $temp[0] . "." . $temp[1];
               @ $temp[0] = rand(0, 3000); //Set to random number
              @  $temp = explode(".", $_FILES["image"]["name"]);
               @ $newfilename = round(microtime(true)) . '.' . $extension;
  
   $a=array(
    array('image',$newfilename),   
    array('user_name',$_POST["uname"]),
    array('first_name',$_POST["fname"]),
    array('last_name',$_POST["lname"]),
    array('email',$_POST["email"]),
    array('password',md5($_POST["pwd"])),
    array('ip',$_SERVER['REMOTE_ADDR']),
    array('role',$_POST['role'])); 
    insert(8);

        compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
   }
   if($type=="categories"){
     
    $a=array(
     
     array('title',$_POST['title']),
     array('url',$_POST['url']),
     array('seo_title',$_POST['seo_title']),
     array('seo_desc',$_POST['seo_desc']),
     array('c_date',$_POST['dat']));
     
      insert(5);
   
   }
   if($type=="gallery"){
    $a=array(
     array('title',$_POST['title']),
     array('url',$_POST['title']),
     array('seo_title',$_POST['seo_title']),
     array('seo_desc',$_POST['seo_desc']),
     array('location',$_POST['location']),
     array('c_date',$_POST['dat'])
 
 );
 insert(6);
}
if($type=="picture"){
    
    //check existing folder and create new one
    if(!is_dir($imgPath.$_POST['gal'])){
      mkdir($imgPath.$_POST['gal']);
      }
    //working for image
    
    if(isset($image['name'])&&!empty($image['name'])){
      //to copy or move from temp to a destination
              // Compress image
      compressImage($_FILES['image']['tmp_name'],$imgPath.$_POST['gal']."/".$newfilename,60);
      }
     $a=array(
      
      array('gallery_id',$_POST['gal']),
      array('caption',$_POST['caption']),
      array('image',$newfilename),
      array('c_date',$_POST['dat']));
     
       insert(4);
       
       
      
     }
     if($type=="slideshow"){
        $a=array(
            array('caption',$_POST['caption']),
            array('image',$newfilename),
            array('orderby',$_POST['orderby']),
            array('c_date',$_POST['dat']),
            
        );
        insert(4);
        compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
     }
     }

    //to editable  record
if(isset($_GET['edit'])){
    $id1=$_GET['edit'];
    if($type=="user"){
	$sql="SELECT * FROM tbl_module_$type WHERE id='$id1'";
    }else{
        $sql="SELECT * FROM tbl_$type WHERE id='$id1'";
        
    }
    $query=mysqli_query($con,$sql);
  $editData=mysqli_fetch_assoc($query);
  
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
//to change the status of a record
if(isset($_GET['status'])){
    $id1=$_GET['status'];
    if($type=="user"){
	$sql="update tbl_module_$type set status=!status WHERE id='$id1'";
    }else{
        $sql="update tbl_$type set status=!status WHERE id='$id1'";
        
    }
	if ($con->query($sql) === TRUE) {
       
       
        if($type=="user"){
            $success="User Detail Updated success";
        @$qry=$select;
        }else{
            $success=$type." Detail Updated success";
            @$qry=$select;
            
        }
        } else {
        $error="Error: " . $sql . "<br>" . $con->error;
        }$con->close();
    }
    if(isset($_GET['del'])){
        del();
        }
if(isset($_POST['u_'.$type])){
       $id=$_POST['id'];
  
  if($type=="user"){
 
    if(isset($image['name'])&&!empty($image['name'])){
		
        compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
        
            if($imageName!=""){
                //to remove old image from directory
                @unlink($imgPath.$imageName);
          
        }  
      }$a=array(
      array('image',$newfilename),   
      array('user_name',$_POST["uname"]),
      array('first_name',$_POST["fname"]),
      array('last_name',$_POST["lname"]),
      array('email',$_POST["email"]),
      array('ip',$_SERVER['REMOTE_ADDR']),
      array('role',$_POST['role'])); 
               update(7);
      }
      if($type=="categories"){
     
        $a=array(
         
         array('title',$_POST['title']),
         array('url',$_POST['url']),
         array('seo_title',$_POST['seo_title']),
         array('seo_desc',$_POST['seo_desc']),
         array('c_date',$_POST['dat']));
         
          update(5);
       
       }
      if($type=="gallery"){
       
            $a=array(
                array('title',$_POST['title']),
                array('url',$_POST['title']),
                array('seo_title',$_POST['seo_title']),
                array('seo_desc',$_POST['seo_desc']),
                array('location',$_POST['location']),
                array('c_date',$_POST['dat'])
        );
        update(6);
    }
    if($type=="picture"){
        if(!is_dir($imgPath.$_POST['gal'])){
          
              @mkdir(@$imgPath.$_POST['gal']);
          }
        
          //working for image
          if(isset($image['name'])&&!empty($image['name'])){
              
          compressImage($_FILES['image']['tmp_name'],$imgPath.$_POST['gal']."/".$newfilename,60);
          
              if($imageName!=""){
                  //to remove old image from directory
                  @unlink($imgPath.$gallery_id."/".$imageName);
           
          }  
        }
       $a=array(
            array('gallery_id',$_POST['gal']),
            array('caption',$_POST['caption']),
            array('image',$newfilename),
            array('c_date',$_POST['dat']));
            
           update(4);
          
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
                array('c_date',$_POST['dat']));
                
                 update(4);
             
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
  if($type=="picture" || $type=="slideshow"){
    $sql=mysqli_query($con,"select * from tbl_$type where caption like '%$searchkey%' or id like '%$searchkey%' and deletion='1'");
    }
    if($type=="gallery" || $type=="categories"){
      $sql=mysqli_query($con,"select * from tbl_$type where title like '%$searchkey%' or id like '%$searchkey%' and deletion='1'");
      }
      if($type=="qna"){
        $sql=mysqli_query($con,"select * from tbl_$type where question like '%$searchkey%' or id like '%$searchkey%' and deletion='1'");
        }
        if($type=="feedbcak"){
          $sql=mysqli_query($con,"select * from tbl_$type where subject like '%$searchkey%' or message like '%$searchkey%' or id like '%$searchkey%' and deletion='1'");
          }
          if($type=="user"){
            $sql=mysqli_query($con,"select * from tbl_module_$type where user_name like '%$searchkey%' or first_name like '%$searchkey%' or id like '%$searchkey%' or last_name like '%$searchkey%' or email like '%$searchkey%' and deletion='1'");
            }  
}
}else{
  $sql=$select;
  
  }
    
?>