<?php
$query="";
$select="SELECT * FROM `tbl_$type` where `deletion`='1'";
@$select1="SELECT * FROM `tbl_$type` where `deletion`='1' limit $page1,4";
$result_news=mysqli_query($con,$select1);
@$sql1=mysqli_query($con,"select * from tbl_$type where `deletion`='1' limit $page1,5");
@$total_rec=mysqli_num_rows($sql1);
$total_pages=ceil($total_rec/5);  
$last=$total_pages-1;    

//##############INSERT ENGINE######################## 
@$a;
function insert($b){
global $a,$type,$con;
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
      echo "<script>alert('Account Created')</script>";
		}else{
      echo "<script>alert('Sorry ".Mysqli_error($con)."')</script>";
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
  //########################LOGIN ENGINE#####################
  
  @$User_email=$_SESSION['newSub-AdminLogin'];
  $dt=date("Y-m-d");
  if(isset($_POST['register'])){
	
    $user_name = mysqli_real_escape_string($con,$_POST['user_name']);
	
	$email = mysqli_real_escape_string($con,$_POST['email']);
  $ms = mysqli_real_escape_string($con,$_POST['password']);
  $ip=$_SERVER['REMOTE_ADDR'];
  $a=array(
    array('user_name',$user_name),
    array('email',$email),
    array('password',md5($ms)),
    array('c_date',$dt));
    //echo "<script>alert('".print_r($a[3])."')</script>";
    insert(3);
      header("Location: login.php");
	}
  if(isset($_POST['login'])){
	
   
	$email = mysqli_real_escape_string($con,$_POST['email']);
  $ms = mysqli_real_escape_string($con,$_POST['password']);
  $sql="SELECT * from tbl_$type WHERE email='$email' AND password=md5('$ms') AND status = '1'";
 $query=mysqli_query($con,$sql);
 $data=mysqli_fetch_array($query);
if($data){
  $_SESSION['newViewerLogin']=$data['user_name'];
  header ("location: index.php");
  echo '<script>alert("Welcome")</script>';
  }
  else{
      echo '<script>alert("error'.mysqli_error($con).'")</script>';
  }
  }
  $sql="select * from tbl_categories where status='1' ";
  $query=mysqli_query($con,$sql);
  $url="";
  $data1;
  if(isset($_GET['cat'])){
    global $url,$data;
    $url=$_GET['cat'];
	$sql="select * from tbl_$type where status='1' and url='$url'";
	$query1=mysqli_query($con,$sql);
	$data=mysqli_fetch_array($query1);
	if($data){
		$title=$data['seo_desc'];
		$description=$data['seo_desc'];
		$data1=$data['id'];
		}
	}
  
  if(isset($_GET['news'])){
    $gen_news=$_GET['news'];
    $fqry=mysqli_query($con,"select * from tbl_news where Url='$gen_news' and Status=1 and Offline=0");
    $res_view=mysqli_fetch_array($fqry);
    $resv=$res_view['CategoryID'];
    $data1=$res_view['CategoryID'];
    $find_catagory=mysqli_query($con,"select * from tbl_categories where id=$resv");
    $res_cat=mysqli_fetch_array($find_catagory);
  }
 
?>