<?php 
$query="";
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
  $select="SELECT * FROM `tbl_$type` where `deletion`='1' limit $page1,5";
$result_news=mysqli_query($con,$select);
$sql1=mysqli_query($con,"select * from tbl_$type where `deletion`='1' limit $page1,5");
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
        //##############LOG ENGINE############
$log;
function log_engine($b){
    global $log,$type,$con,$success,$error,$select;
    $c=$b-1;
    $p="INSERT INTO tbl_log (";
    for($i=0;$i<$b;$i++){	
    $p=$p."`".$log[$i][0]."`";
    if($i==$c){}else{$p=$p.",";}
    }
    $p=$p.") VALUES (";
    for($i=0;$i<$b;$i++){	
    $p=$p."'".$log[$i][1]."'";
    if($i==$c){}else{$p=$p.",";}
    }
    
    $sql= $p.");";
   // $success=$sql;
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
global $a,$type,$con,$success,$error,$select;
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
      $error=$sql;
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
//###################APPROVE ENGINE############################
function approve(){
  global $con,$error,$select,$type,$success;
  $id1=$_GET['AccountApproval'];
	$sql="update tbl_$type set AccountApproval=!AccountApproval WHERE Creatorid='$id1'";
	$query=mysqli_query($con,$sql);
	if($query){
  $success=ucfirst($type)." Account has been Approved successfully.";
  $sql=$select;
	}
  else{
    $error=ucfirst($type) ." is not Approved". Mysqli_error($con);
    $sql=$select;
    }

}  


  $User_email=$_SESSION['new-AdCreator-Login'];
  $sql="SELECT * FROM `tbl_ad_creator` WHERE `email`='$User_email' ";
  $qry=mysqli_query($con,$sql);
  $data=mysqli_fetch_array($qry);
  $dat=date('m/d/Y ', time());
if(isset($_POST['send'])){
    
    @$image=$_FILES['image'];
    
    @$imageName='';
    @$temp = explode(".", $_FILES["image"]["name"]);
               
     @ $extension = end($temp);
               @ $fileName = $temp[0] . "." . $temp[1];
               @ $temp[0] = rand(0, 3000); //Set to random number
              @  $temp = explode(".", $_FILES["image"]["name"]);
               @ $newfilename = round(microtime(true)) . '.' . $extension;
      if($type=="feedback"){
        compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
      
        $a=array(
          array('user_id',$data['id']),
          array('subject',$_POST['topic']),
          array('message',$_POST['msg']),
          array('image',$newfilename),
          array('c_date',$dat),
          array('role','1')
          
        );
        insert(6);
      }
      if($type=="ads"){
       compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
     $a= array(
        array('creator_id',$data['id']),
        array('category_id',$_POST['cat']),
        array('name',$_POST['name']),
        array('title',$_POST['title']),
        array('url',$_POST['url']),
        array('amount',$_POST['amt']),
        array('cpc',$_POST['cpc']),
        array('image',$newfilename),
        array('status',$_POST['status']),
        array('c_date',$dat)
        
      );
        insert(10);
       
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

//apprvoe the account
if(isset($_GET['AccountApproval'])){
  approve();
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
    $sql="select * from tbl_$type where caption like '%$searchkey%' or id like '%$searchkey%' and deletion='1'";
    }
    if($type=="gallery" || $type=="categories"){
      $sql="select * from tbl_$type where title like '%$searchkey%' or id like '%$searchkey%' and deletion='1'";
      }
      if($type=="qna"){
        $sql="select * from tbl_$type where question like '%$searchkey%' or id like '%$searchkey%' and deletion='1'";
        }
        if($type=="feedbcak"){
          $sql="select * from tbl_$type where subject like '%$searchkey%' or message like '%$searchkey%' or id like '%$searchkey%' and deletion='1'";
          }
            
}
}else{
  $sql=$select;
  
  }


  $query=mysqli_query($con,$sql);

?>