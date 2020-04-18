<?php
//_________________________________________variable declration________________________________________________

//$cat=$adname=$url=$seoTitle=$seoDes=$newfilename=$fileName=$attachFile=$details=$summary=$status=null;
$unitName=$amount=$seoTitle=$seoDes=$newfilename=$fileName=$attachFile=$cat=$cpc=$url=$status=null;

$follower=0;
$follower_qry="select sum()";

$like=0;

$select_ad="select * from tbl_adunit where ad_creator_id=".$creatorid."  order by post_date desc";
$result_ad=mysqli_query($con,$select_ad);

$select_feedback="select * from tbl_feedback where role=2 and user_id=".$creatorid;
$result_feedback=mysqli_query($con,$select_feedback);


$sql2=mysqli_query($con,"select * from tbl_$type ");
@$total_rec=mysqli_num_rows($sql2);

@$unitName=$_POST["unit_name"];
@$amount=$_POST["amount"];
@$seoTitle=$_POST["seo_title"];
@$seoDes=$_POST["seo_desc"];
@$attachFile=$_FILES["file"]["name"];
@$cpc=$_POST["cpc"];
@$details=$_POST["editor1"];
@$summary=$_POST["summary"];
@$url=$_POST["url"];
@$status=$_POST["status"];
@$attachFileName='';
@$flag=true;
@$date=date('m/d/Y ', time());
@$viewStateFile=$_FILES["file"]["name"];
$ipaddress = $_SERVER['REMOTE_ADDR'];

//____________________________cleardata___________________________________
function cleardata()
{
  $unitName=$amount=$seoTitle=$seoDes=$newfilename=$fileName=$attachFile=$cat=$cpc=$url=$status=$_GET['status']=$_GET['feedid']=null;
}
//_______________________________insert ad__________________________
if(isset($_POST['add_'.$type.'']))
{
  if(empty($_POST["unit_name"]))
  {
    $error_unitname="please insert ad_unit_name";
    $flag=false;
  }
  if(empty($_POST["summary"]))
  {
    $error_summary="please insert Summary";
    $flag=false;
  }
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
    else
    {
      $error_attach_file="please select file";
      $flag=false;
    }
    if($flag==true)
    {
      $sql="insert into tbl_$type(category_id,ad_creator_id,unit_name,url,seo_title,seo_desc,file_attach,amount,summary,details,status,post_date,cpc) values('$cat','$creatorid','$unitName','$url','$seoTitle','$seoDes','$newfilename','$amount','$summary','$details','$status','$date',$cpc)";
      $qry=mysqli_query($con,$sql);
      //echo $sql;
      if($qry){
        $success=ucfirst($type). " Created Success";
      move_uploaded_file($_FILES['file']['tmp_name'],$imgPath."/".$newfilename);
      cleardata();
      }else{
          $warning=ucfirst($type). " Not Created".mysqli_error($con);
          //$sql=$select;
      }
    }
     
}

//---------------queryString set-----------------
if(isset($_GET["status"]))
{
  $id=$_GET["status"];
  Updatestatus($id);
}
if(isset($_GET["delete"]))
{
  $id=$_GET["delete"];
  DeleteAd($id);
}

if(isset($_GET['feedid']))
{
  $id=$_GET['feedid'];
  $sql="delete from tbl_feedback where id=$id";
  $query=mysqli_query($con,$sql);
  if($query)
  {
   echo "<script>alert('Feedback deleted..:)');</script>";
   //cleardata();
   //$_GET['feedid']=null;
   header("location:feedback.php?showfeed");
  }
  else
  {
    echo "<script>alert('Feedback not deleted..:)');</script>";
    cleardata();
  }
}
//_______________________________________search news____________________________________
if(isset($_POST["btn_search"]))
{
  $a=$_POST["keyword"];
  $select_ad="select * from tbl_adunit where category_id=".$creatorid." and unit_name like '%$a%' or u_date='".$a."' or publish_date='".$a."' or view='".$a."' or status='".$a."'";
  $result_ad=mysqli_query($con,$select_ad);
}
//___________________________fill data in controls by querystring_________________________
if(isset($_GET['ad_id']))
{
  
  $id=$_GET['ad_id'];
  //echo "<script>alert($id);</script>";
  $sql="select * from tbl_adunit where ad_id=".$id;
  $query=mysqli_query($con,$sql);
  $update=mysqli_fetch_assoc($query);
}
if(isset($_GET['d']))
{
  $id=$_GET['d'];
  //echo "<script>alert($id);</script>";
  $sql="select * from tbl_adunit where ad_id=".$id;
  $query=mysqli_query($con,$sql);
  $update=mysqli_fetch_assoc($query);
}
//____________________________filter news_________________
if(isset($_POST["btn_filter"]))
{
  @$a=$_POST["adType"];
  //echo "<script>alert($a);</script>";
  if($a==0)
  {
      $select_ad="select * from tbl_adunit where category_id=".$creatorid." and approve=0 ";
  }
  elseif($a==1)
  {
    $select_ad="select * from tbl_adunit where category_id=".$creatorid."  and approve=0 and rejected=3 and offline=1";
  }
  elseif($a==2)
  {
    $select_ad="select * from tbl_adunit where category_id=".$creatorid."  and approve=0 and rejected=2";
  }
  elseif($a==3)
  {
    $select_ad="select * from tbl_adunit where category_id=".$creatorid." and status=2";
  }
  elseif($a==4)
  {
    $select_ad="select * from tbl_adunit where category_id=".$creatorid."  and approve=1";
  }
  else
  {
    $select_ad="select * from tbl_adunit where category_id=".$creatorid;
    $result_ad=mysqli_query($con,$select_ad); 
  }
  $result_ad=mysqli_query($con,$select_ad);
}
//_____________________________________________________________________________________________________
//---------------queryString set-----------------

if(isset($_GET['feedid']))
{
  $id=$_GET['feedid'];
  $sql="delete from tbl_feedback where id=$id";
  $query=mysqli_query($con,$sql);
  if($query)
  {
   echo "<script>alert('Feedback deleted..:)');</script>";
   //cleardata();
   //$_GET['feedid']=null;
   header("location:feedback.php?showfeed");
  }
  else
  {
    echo "<script>alert('Feedback not deleted..:)');</script>";
    cleardata();
  }
}
//__________________________________insert feedback__________________________________
if(isset($_POST['btn_send']))
{
  $newfilename;
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
        compressImage($_FILES['file']['tmp_name'],"img"."/".$newfilename,60);
    }
    $topic=$_POST['category'];
    $message=$_POST['message'];
    $sql="insert into tbl_feedback(user_id,subject,message,c_date,role,file) values('$creatorid','$topic','$message','$date',2,'$newfilename')";
    //echo $sql;
    $qry=mysqli_query($con,$sql);
    if($qry){
      $success=ucfirst($type). " Created Success";
    //move_uploaded_file($_FILES['file']['tmp_name'],"img"."/".$newfilename);
    cleardata();
    }else{
        $warning=ucfirst($type). " Not Created".mysqli_error($con);
    }
}
//____________________________update profile___________________________
if(isset($_POST["update_profile"]))
{
  @$username=$_POST["txtuname"];
  @$email=$_POST["email"];
  @$mobile=$_POST["txtmobile"];
 /* @$bankname=$_POST["txtbname"];
  @$holdername=$_POST["txtaccountHname"];
  @$account=$_POST["txtaccountno"];
  @$ifsc=$_POST["txtIfsc"];*/
  $sql="";
  $flag=true;
  $ipaddress = $_SERVER['REMOTE_ADDR'];   
  @$name=$_FILES["file"]["name"];
  $filename=null;
  $data=mysqli_query($con,"select username as uname,email from tbl_ad_creator");
    while($r=mysqli_fetch_array($data))
    {
        if($r['uname']==$_POST['txtuname'])
        {
          $f=false;
          $err_user="Username already exists";
          break;
        }
        if($r['email']==$_POST['email'])
        {
          $f=false;
          $err_email="Email already exists";
          break;
        }
    }
    if(isset($_FILES))
    {
      if($name==null)
      {
        $sql="update tbl_ad_creator set username='$username',email='$email',phone='$mobile' where id=$creatorid";
      }
      else
      {
        if((@$_FILES["file"]["type"]=="image/png") || (@$_FILES["file"]["type"]=="image/jpg") || (@$_FILES["file"]["type"]=="image/jpeg"))
        {
            $temp = explode(".", $_FILES["file"]["name"]);
            $extension = end($temp);
            $fileName = $temp[0] . "." . $temp[1];
            $temp[0] = rand(0, 3000);
            $temp = explode(".", $_FILES["file"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$newfilename);
            $filename=$newfilename;
            $sql="update tbl_ad_creator set username='$username',email='$email',phone='$mobile',profile_image='$filename' where id=$creatorid";           
        }
        else
        {
          $flag=false;
          $errorForFile="only jpg,png,jpeg are allow";
        }
      }
      if (!preg_match('/^[a-zA-Z0-9\s]+$/', $username)) {
        $error_username="Please insert alpha numeric value";
        $flag=false;
      }
      if (!preg_match('/^[6|7|8|9][0-9]{9}$/', $mobile)) {
        $flag=false;
        $error_mobile="Invaid Mobile number ";
      }
      if (!preg_match('/^[A-Za-z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}$/',$email))
      {
          $error_email="Invalid email";
          $flag=false;
      }
    }  
    if($flag==true)
    {
      $query=mysqli_query($con,$sql);
      if($query)
      {
        echo "<script>alert('profile update...:)');</script>";
        $success=ucfirst($type). " Created Success";
        cleardata();
        $_SESSION['ad_creator_uname']=$username;
      } 
    }
}  

//_______________________change password____________________
if(isset($_POST["change_pass"]))
{  
  $flag=true;
  $pass="";
  $data="select * from tbl_ad_creator where id=".$creatorid;
  $result=mysqli_query($con,$data);
  while($row=mysqli_fetch_assoc($result))
  {
    $pass=$row["password"];
  }
  if(md5($_POST["OldPassword"])!=$pass){ $flag=false; $error_old= "your password is not match with current password";}
  if($_POST["NewPasswordConfirm"]!=$_POST["NewPassword"])
  {
    $error_cpass= "your password is not match with current password";
    $flag=false;
  }
  if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%^&*+=\/*]{8,12}$/',$_POST['NewPassword']))
  {
    $flag=false;
    $error_pass= "Password must be Contain 1 Character. & 1 number 1 & special character";
  }
  if($flag==true)
  {
    $sql="update tbl_ad_creator set password='".md5($_POST['NewPassword'])."' where id=$creatorid";
    $qry=mysqli_query($con,$sql);
    if($qry)
    {
      echo "<script>alert('password updated...:)');</script>";
      $success=ucfirst($type). " Password updated successfully";
      cleardata();
    }
    else
    {
      echo "<script>alert('password not updated...:)');</script>";
      $warning=ucfirst($type). " Not Updated".mysqli_error($con);
    }
  }
}
// _________________________change status_________________________________
function Updatestatus($id)
{
  global $con,$type;
  $sql="update tbl_".$type." set status=!status where id=".$id;
  $query=mysqli_query($con,$sql);
  if($query)
  {
   echo "<script>alert('status updated..:)');</script>";
   cleardata();
  }
  else
  {
    echo "<script>alert('status not updated..:)');</script>";
    cleardata();
  }
}   


?>