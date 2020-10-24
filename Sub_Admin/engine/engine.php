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
  if($type=="news"){
    $select="SELECT * FROM `tbl_$type` where Approved=0 limit $page1,5";
    $Pagination="SELECT * FROM `tbl_$type` where Approved=0 ";
  
  }else if($type=="content_creator"){
    $select="SELECT * FROM `tbl_$type` where Monetization=1 limit $page1,5";
    $Pagination="SELECT * FROM `tbl_$type` where Monetization=1 ";
  
  }
  else if($type=="ad_creator"){
    $select="SELECT * FROM `tbl_$type` where approval=1 limit $page1,5";
    $Pagination="SELECT * FROM `tbl_$type` where approval=1 ";
  
  }
  else{
    $select="SELECT * FROM `tbl_$type` limit $page1,5";
    $Pagination="SELECT * FROM `tbl_$type` ";
  }
  $result_news=mysqli_query($con,$select);
$sql1=mysqli_query($con,$Pagination);
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

  //####################Dashboard Create stuff#############################
  function showcount($tblName,$field,$value){
    global $con;
    if(empty($field) && empty($value)){
      $ds_query=mysqli_query($con,"select count(*) from $tblName ");
    
    }else{
      $ds_query=mysqli_query($con,"select count(*) from $tblName where $field='$value'");
    
    }
    $ds_result=mysqli_fetch_array($ds_query);
return $ds_result[0];
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
	$sql="delete from `tbl_$type` WHERE id='$id1'";
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

     // $success=$sql;
  }
//###############DATA EXTRACTOR Engine################## 
  function fetch_detail($op,$table,$field,$value){
    global $con;  
    $select="select $op from tbl_$table where $field='$value'";
    $res=mysqli_query($con,$select);
    if($res){
    $f=mysqli_fetch_array($res);
    return $f[0];
    
    }else{
      return mysqli_error($con);
    }
    }
    

  $User_email=$ses;
  $sql="SELECT * FROM `tbl_module_user` WHERE `user_name`='$ses' ";
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
      
  
  if($type=="qna"){
     
    $a=array(
     array('module_user_id',$data['id']),
     
     array('question',$_POST['question']),
     array('answer',$_POST['ans']),
     array('c_date',$_POST['dat']),
     array('status',$_POST['status']),
      array('role',$data['role'])
    );
      insert(5);
   
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
  if($type="ad_creator"){
    $sql="SELECT * FROM tbl_$type WHERE ad_creator_id='$id1'";
  
  }else{
  $sql="SELECT * FROM tbl_$type WHERE id='$id1'";
  }
	$query=mysqli_query($con,$sql);
  $editData=mysqli_fetch_assoc($query);
  
  }
  //update query
  if(isset($_POST['u_'.$type.''])){
  @$id=$_POST['id'];
 //for picture
 
  @$orderby=$_POST['orderby'];
  

	//check existing folder and create new one
  
 
     if($type=="feedback"){
      $a=array(
        array('module_user_id',$data['id']),
      array('reply',$_POST['reply']));
       update(2);
     
      }
      if($type=="content_creator"){
        $a=array(
          array('AccountApproval',$_POST['status']),
          array('Monetization',0)
        );
        update(2);
        $type="notification";
        if($_POST['status']==1){
          $sub="Your Account has been Rejected";
        }else{
          $sub="Congratulations! Your Account has been Approved";
        }
        $a=array( 
          array('sub',$sub),
          array('description',$_POST['rejDesc']),
          array('user_id',$_POST['id']),
          array('role',2)
        );
        insert(4);
        header("Location:content_creator.php");
      }
  if($type=="news"){
    if($_POST['Approved']==1){
      $a=array(
        array('RejectionMsg',""),
        array('PublishDate',date('m/d/Y ', time())),
        array('Approved',$_POST['Approved'])
      );
      update(3);
      $type="notification";
       $sub="Congratulations! Your News has been Approved";
       $a=array( 
        array('sub',$sub),
        array('description',$_POST['HeadLine']),
        array('user_id',$_POST['CreatorID']),
        array('role',2),
        array('c_date',date('Y-m-d ', time()))
      );
      insert(5);
      header("Location:news.php");
    }else{
      $c=$_POST['Rejected']+1;
      $a=array(
        array('RejectionMsg',$_POST['rejectionmsg']),
        array('PublishDate',date('m/d/Y ', time())),
        array('Approved',$_POST['Approved']),
        array('Rejected',$c)
      );
      update(4);
      $type="notification";
       $sub="Your News has been Rejected";
       $a=array( 
        array('sub',$sub),
        array('description',$_POST['HeadLine']),
        array('user_id',$_POST['CreatorID']),
        array('role',2),
        array('c_date',date('Y-m-d ', time()))
      );
      insert(5);
      header("Location:news.php");
    }
    
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
    $sql="select * from tbl_$type where caption like '%$searchkey%' or id like '%$searchkey%'";
    }
  
}
}else{
  $sql=$select;
  
  }


  $query=mysqli_query($con,$sql);

?>