<?php
$query="";
@$select="SELECT * FROM `tbl_$type` where `deletion`='1'";
@$select1="SELECT * FROM `tbl_$type` where `deletion`='1' limit $page1,4";
@$result_news=mysqli_query($con,$select1);
@$sql1=mysqli_query($con,"select * from tbl_$type where `deletion`='1' limit $page1,5");
@$total_rec=mysqli_num_rows($sql1);
$total_pages=ceil($total_rec/5);  
$last=$total_pages-1;    
$data=date("Y/m/d");
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
  
  //------------------------------registration------------------------

  @$User_email=$_SESSION['newSub-AdminLogin'];
  $dt=date("Y-m-d");
  if(isset($_POST['send'])){
	if($type=="Register"){
    $err=array();
    $f=true;
    echo $_POST['name'];
    echo $_POST['email'];
    $data=mysqli_query($con,"select user_name as uname,email from tbl_viewer");
    while($r=mysqli_fetch_array($data))
    {
        if($r['uname']==trim($_POST['name']))
        {
            $f=false;
            $err['user']="Username already exists";
            echo "Username already exists";
        break;
        } 
        if($r['email']==trim($_POST['email']))
        {
            $f=false;
            $err['email']="Email already exists";
            echo "Email already exists";
            break;
        }
    }
    if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%^&*+=\/*]{8,12}$/',$_POST['password']))
    {
      $f=false;
      $err['pass']= "Password must be Contain 1 Character. & 1 number 1 & special character";
    }
    $user_name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $ms = mysqli_real_escape_string($con,$_POST['password']);
    $type="viewer";
    $a=array(
      array('user_name',$user_name),
      array('email',$email),
      array('password',md5($ms)),
      array('c_date',$dt));
      //echo "<script>alert('".print_r($a[3])."')</script>";
      if($f==true)
      {
      insert(4);
        header("Location: login.php");
        }
      }
    }

//----------------------------------------------------------------------

  if(isset($_POST['login'])){
	
   $type="viewer";
	$email = mysqli_real_escape_string($con,$_POST['email']);
  $ms = mysqli_real_escape_string($con,$_POST['password']);
  $sql="SELECT * from tbl_$type WHERE email='$email' AND password=md5('$ms') AND status = '1'";
 $query=mysqli_query($con,$sql);
 $data=mysqli_fetch_array($query);
if($data){
  $_SESSION['newViewerLogin']=$data['user_name'];
  $_SESSION['newVieweremail']=$data['email'];
  $_SESSION['id']=$data['id'];
  //header ("location: index.php");
  echo '<script>alert("'.$_SESSION['newViewerLogin'].'")</script>';
  }
  else{
      echo '<script>alert("error'.mysqli_error($con).'")</script>';
  }
  }
  $sql="select * from tbl_categories where status='1' ";
  @$query=mysqli_query($con,$sql);
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
		$desc=$data['seo_desc'];
    $data1=$data['id'];
    $keyword=$data['seo_title'];
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

  if(isset($_GET['id'])){
    //$gen_news=$_GET['news'];
    $fqry=mysqli_query($con,"select * from tbl_news where CreatorID='".$_GET['id']."' and Status=1  and Approved=1 and Offline=0");
    $res_view=mysqli_fetch_array($fqry);
    $resv=$res_view['CategoryID'];
    $data1=$res_view['CategoryID'];
    $find_catagory=mysqli_query($con,"select * from tbl_categories where id=$resv");
    $res_cat=mysqli_fetch_array($find_catagory);
  }

  //------------------insert comment---------------------
  if(isset($_POST['comment']) && isset($_POST['id']))
  {
      $con = new mysqli('127.0.0.1:3306','root','','dbasknews');
      $db = mysqli_select_db($con,'dbasknews');
      $f=true;
      if($_POST['comment']=="")
      {
        $f=false;
      }
      if($f==true)
      {
        $qry=mysqli_query($con,"insert into tbl_comment(news_id,user_name,comment) values('".$_POST['id']."','".$_POST['user_name']."','".$_POST['comment']."')");
        if($qry)
        {
          echo 'comment send..:)';
        }
        else{
          echo 'comment not send..:(';
        }
      }
      else
      {
        echo 'no data';
      }
  }
//-------------------------------follower-----------------------
if(isset($_POST['user_name']) && isset($_POST['CreatorID']) && isset($_POST['viewer_id']) && isset($_POST['isFollow']))
{
  $qry="";
  $con = new mysqli('127.0.0.1:3306','root','','dbasknews');
  if($_POST['isFollow']=='no'){
  $qry=mysqli_query($con,"insert into tbl_follower(content_creator_id,viewer_id) values('".$_POST['CreatorID']."','".$_POST['viewer_id']."')");
  if($qry)
  {
    echo 'You become a follower..:)';
  }
  else{
    echo 'you can\'t follow...plz try again..:(';
  }
  }
   if($_POST['isFollow']=='yes'){ mysqli_query($con,"delete from tbl_follower where viewer_id='".$_POST['viewer_id']."' and content_creator_id='".$_POST['CreatorID']."'");
    if($qry)
    {
      echo 'You become a unfollower..:)';
    }
    else{
      echo 'you can\'t unfollow...plz try again..:(';
    }
  }  
}

//-------------------------like----------------------------

if(isset($_POST['viewer_id']) && isset($_POST['news_id']) && isset($_POST['isLike']))
{
  $qry="";
  $con = new mysqli('127.0.0.1:3306','root','','dbasknews');
  if($_POST['isLike']=='no')
  {
  $qry=mysqli_query($con,"insert into tbl_like(viewer_id,news_id,is_like) values('".$_POST['viewer_id']."','".$_POST['news_id']."','1')");
  if($qry)
  {
    echo 'You liked news..:)';
  }
  else{
    echo 'you can\'t like...plz try again..:(';
  }
  }
  if($_POST['isLike']=='yes'){ 
    echo $_POST['viewer_id'].$_POST['news_id'];
    mysqli_query($con,"delete from tbl_like where viewer_id='".$_POST['viewer_id']."' and news_id='".$_POST['news_id']."'");
    if($qry)
    {
      echo 'You dislike news..:)';
    }
    else
    {
      echo 'you can\'t disliked...plz try again..:(';
    }
  }
}

//----------------------------------change pass-------------------
if(isset($_POST['change_pass']))
{
  $flag=true;
  $pass="";
  $data="select * from tbl_viewer where user_name='".$_SESSION['newViewerLogin']."'";
  $result=mysqli_query($con,$data);
  while($row=mysqli_fetch_assoc($result))
  {
    $pass=$row["password"];
  }
  if(md5($_POST["old_pass"])!=$pass){ $flag=false; $error_old= "your password is not match with current password";}
  if($_POST["new_pass"]!=$_POST["con_pass"])
  {
    $error_cpass= "your password is not match with current password";
    $flag=false;
  }
  if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%^&*+=\/*]{8,12}$/',$_POST['new_pass']))
  {
    $flag=false;
    $error_pass= "Password must be Contain 1 Character. & 1 number 1 & special character";
  }
  if($flag==true)
  {
    $sql="update tbl_viewer set password='".md5($_POST['new_pass'])."' where user_name='".$_SESSION['newViewerLogin']."'";
    $qry=mysqli_query($con,$sql);
    if($qry)
    {
      echo "<script>alert('password updated...:)');</script>";
      header("location:index.php");
    }
    else
    {
      echo "<script>alert('password not updated...:)');</script>";
    }
  }  
}

//-------------------------------edit profile---------------------
if(isset($_POST['edit_profile']))
{
  $f=true;
  $user=$_POST["user"];
  $email=$_POST["email"];
  echo $user.$email;
  if(!empty($user) && !preg_match('/^[a-zA-Z0-9\s]+$/', $user))
  {
    $f=false;
    $error_user="please insert valid user name";
  }
  if(!empty($email) && !preg_match('/^[A-Za-z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}$/',$email))
  {
    $f=false;
    $error_user="please insert valid email";
  }
  $data=mysqli_query($con,"select user_name as uname,email from tbl_viewer");
  while($r=mysqli_fetch_array($data))
  {
      if($r['uname']==$user)
      {
        $f=false;
        $error_user="Username already exists";
        break;
      }
      if($r['email']==$email)
      {
        $f=false;
        $error_email="Email already exists";
        break;
      }
  }
  if($f==true)
  {
    $qry=mysqli_query($con,"update tbl_viewer set user_name='".$user."', email='".$email."' where user_name='".$_SESSION['newViewerLogin']."'");
    if($qry)
      {
        echo "<script>alert('profile update...:)');</script>";
        $_SESSION['newViewerLogin']=$user;
      }
  }
}

//-------------------------contact us----------------------
if(isset($_POST['insert_feed']))
{
  if(!empty($_POST['data']))
  { 
    $qry=mysqli_query($con,"insert into tbl_feedback(user_id,message,role) values('".$_POST['user_id']."','".$_POST['data']."','2')");
    if($qry)
    {
      echo "<script>alert(' your queries are send')<script>";  
    }
  }
  else
  {
    echo "<script>alert('please insert your queries')<script>";
  }
}

//----------------------------ad report--------------------
if(isset($_POST['user_id']) && isset($_POST['ad_id']) && isset($_POST['news_id']) && isset($_POST['cpc']))
{
  $qry="";
  $con = new mysqli('127.0.0.1:3306','root','','dbasknews');
  
  $com_ear=(int)$_POST['cpc']*60/100;
  $creator_ear=(int)$_POST['cpc']*40/100;
  $qry_select_exists_click=mysqli_query($con,"select * from tbl_adunit_report where user_id='".$_POST['user_id']."' and news_id='".$_POST['news_id']."' and ad_id='".$_POST['ad_id']."'");
  //echo "select * from tbl_adunit_report where user_id='".$_POST['user_id']."' and news_id='".$_POST['news_id']."' and ad_id='".$_POST['ad_id']."'";
  if(mysqli_num_rows($qry_select_exists_click)==0)
  {
    $qry=mysqli_query($con,"insert into tbl_adunit_report(ad_id,news_id,user_id,company_earning,creator_earning) values('".$_POST['ad_id']."','".$_POST['news_id']."','".$_POST['user_id']."','".$com_ear."','".$creator_ear."')");
    $qry_creator_update=mysqli_query($con,"update tbl_content_creator set earnings=earnings+".$creator_ear." where id in(select CreatorID from tbl_news where id='".$_POST['news_id']."')");
    $qry_ad_creator_update=mysqli_query($con,"update tbl_adunit set amount=amount-".$_POST['cpc']." where ad_id=".$_POST['ad_id']);
    // if($qry && $qry_creator_update && $qry_ad_creator_update)
    // {
    //   echo 'You become a follower..:)';
    // }
    // else{
    //   echo 'you can\'t follow...plz try again..:(';
    // } 
  }
}

?>