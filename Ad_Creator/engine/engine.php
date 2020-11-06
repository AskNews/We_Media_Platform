<?php
//_________________________________________variable declration________________________________________________

//$cat=$adname=$url=$seoTitle=$seoDes=$newfilename=$fileName=$attachFile=$details=$summary=$status=null;
$unitName=$amount=$newfilename=$fileName=$attachFile=$cat=$cpc=$url=$status=null;

@$page=$_GET["page"];
if($page=="" || $page==1)
{
  @$page1=0;
}
else
{
    @$page1=($page*5)-5;
} 
mysqli_query($con,"update tbl_adunit set status=0 where amount=0.00");
$select_ad="select * from tbl_adunit where ad_creator_id=".$creatorid."  order by publish_date DESC limit $page1,5";

$result_ad=mysqli_query($con,$select_ad);

$select_feedback="select * from tbl_feedback where role=1 and user_id=".$creatorid." order by c_date desc limit $page1,5";
$result_feedback=mysqli_query($con,$select_feedback);

$select_noti="select * from tbl_notification where role=1 and user_id=".$creatorid." order by c_date desc limit $page1,5"	;
$result_noti=mysqli_query($con,$select_noti);

$select_qna="select * from tbl_qna where role=1 and status=1 order by c_date desc limit $page1,5";
$result_qna=mysqli_query($con,$select_qna);

//---------------paging ad ------------------
$sql1=mysqli_query($con,"select * from tbl_$type ");
@$total_ad_rec=mysqli_num_rows($sql1);
$total_ad_pages=ceil($total_ad_rec/5);  
$last_ad=$total_ad_pages-1;

//---------------paging notification ------------------
$sql_noti=mysqli_query($con,"select * from tbl_$type ");
@$total_rec=mysqli_num_rows($sql_noti);
$total_pages=ceil($total_rec/5);  
$last=$total_pages-1;

//---------------paging feedback ------------------
$sql_feed=mysqli_query($con,"select * from tbl_$type ");
@$total_rec=mysqli_num_rows($sql_feed);
$total_pages=ceil($total_rec/5);  
$last=$total_pages-1;
$sql2=mysqli_query($con,"select * from tbl_$type ");
@$total_rec=mysqli_num_rows($sql2);

@$unitName=$_POST["unit_name"];
@$amount=$_POST["amount"];
@$attachFile=$_FILES["file"]["name"];
@$cpc=$_POST["cpc"];
@$url=$_POST["url"];
@$status=$_POST["status"];
@$cat=$_POST['category'];
@$attachFileName='';
@$flag=true;
@$date=date('Y/m/d ', time());
@$viewStateFile=$_FILES["file"]["name"];
$ipaddress = $_SERVER['REMOTE_ADDR'];

//____________________________cleardata___________________________________
function cleardata()
{
  $unitName=$amount=$newfilename=$fileName=$attachFile=$cat=$cpc=$url=$status=$_GET['status']=$_GET['feedid']=null;
}
//_______________________________insert ad__________________________
if(isset($_POST['add_'.$type.'']))
{
  //echo $amount."..................".$wal_amt;
  $cat=$_POST['catagory'];
  $url=$_POST['url'];
  if(empty($_POST["unit_name"]))
  {
    $error_unitname="please insert unit name";
    $flag=false;
  }
  if(empty($amount) || !preg_match('/^[0-9]*$/',$amount))
  {
    $error_amount="Invalid amount";
      $flag=false;
  }
  if(empty($cpc) || !preg_match('/^[0-9]*$/',$cpc))
  {
    $error_cpc="Invalid CPC";
      $flag=false;
  }
  if(empty($url) )
  {
    $error_url="Invalid URL";
    $flag=false;
  }
  $explode=explode(":",$url);
  $explode1=explode("//",$url);
  @$www=explode(".",$explode1[1]);
  $f=array("http","https","ftp");
  if(filter_var($url,FILTER_VALIDATE_URL,FILTER_FLAG_PATH_REQUIRED) && in_array($explode[0],$f) && $www[0]=="www" )
  {
    $flag=true;
  }else{
    $flag=false;
    $error_url="Invalid URL";
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
        compressImage($_FILES['file']['tmp_name'],"img/".$newfilename,60);
    }
    else
    {
      $error_attach_file="please select file";
      $flag=false;
    }
    if($flag==true && $wal_amt>$amount)
    {
    //   $sql="insert into tbl_$type(category_id,ad_creator_id,unit_name,url,file_attach,amount,status,c_date,cpc) values('$cat','$creatorid','$unitName','$url','$newfilename','$amount','$status','$date',$cpc)";
    //   $qry_u_ac=mysqli_query($con,"update tbl_ad_creator set wallet=wallet-".$amount.", spend_amount=spend_amount+".$amount." where id=".$creatorid);
    //   $qry=mysqli_query($con,$sql);
    //   // if($qry && $qry_u_ac){
    //     echo "<script>alert('ad successfully created..:)');</script>";
    //   move_uploaded_file($_FILES['file']['tmp_name'],"img/".$newfilename);
    //   cleardata();
    //   }else{
    //     echo "<script>alert('ad not created..:)');</script>";          
    //   }
    }
    else
    {
      echo "<script>alert('ad not created..:)');</script>"; 
    }
     
}

//_____________________________update ad_________________
//add_update
if(isset($_POST['update_ad']))
{ 
  $ad_id=$_POST['HiddennewsId'];
  $cat=$_POST['catagory'];
  $url=$_POST['url'];
  if(empty($_POST["unit_name"]))
  {
    $error_unitname="please insert unit name";
    //$flag=false;
  }
  
  if(empty($url) )
  {
    $error_url="Invalid URL";
    $flag=false;
  }
  $explode=explode(":",$url);
  $explode1=explode("//",$url);
  $www=explode(".",$explode1[1]);
  $f=array("http","https","ftp");
  if(filter_var($url,FILTER_VALIDATE_URL,FILTER_FLAG_PATH_REQUIRED) && in_array($explode[0],$f) && $www[0]=="www" )
  {
    $flag=true;
  }else{
    $flag=false;
    $error_url="Invalid URL";
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
        compressImage($_FILES['file']['tmp_name'],"img/".$newfilename,60);
    }
    if($flag==true )
    {
      $sql="";
      if($newfilename==null)
      {
        $sql="update tbl_adunit set unit_name='".$unitName."', category_id='".$cat."', url='".$url."', status='".$status."' where id='".$ad_id."'";
      }
      else{
        $sql="update tbl_adunit set file_attach='".$newfilename."',unit_name='".$unitName."', category_id='".$cat."', url='".$url."', status='".$status."' where id='".$ad_id."'";
      }
      //echo $sql;
      //$qry_u_ac=mysqli_query($con,"update tbl_ad_creator set wallet=wallet-".$amount.", spend_amount=spend_amount+".$amount." where id=".$creatorid);
      $qry=mysqli_query($con,$sql);
      if($qry){
        echo "<script>alert('ad updated ..:)');</script>";
        header("location:adunit.php?table");
      move_uploaded_file($_FILES['file']['tmp_name'],"img/".$newfilename);
      cleardata();
      }else{
        echo "<script>alert('ad not updated..:)');</script>";          
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


//____________________________refill ad___________________________

if(isset($_POST['btnAdAmount']))
{
  $e_qry=mysqli_query($con,"select wallet as e from tbl_ad_creator where id=".$creatorid);
  $e=mysqli_fetch_array($e_qry);
  $e=$e['e'];
  $amt=$_POST['amount'];
  if($e<10)
  {
    $err="your wallet amount is less than 100 <br/> click to ad wallet amount <a href='#'> add amount</a>";
    mysqli_query($con,"insert into tbl_notification(sub,description,user_id,role) values('refill account','refill your wallet to refill ad',".$creatorid.",'1')");
  }
  else if($e>=10 && $_POST['amount']<$e && !empty($_POST['amount']) && preg_match('/^[0-9]*$/',$_POST['amount']))
  {
    $qry_u_ac=mysqli_query($con,"update tbl_ad_creator set wallet=wallet-".$amt.", spend_amount=spend_amount+".$amt." where id=".$creatorid);
    //echo "update tbl_ad_creator set wallet=wallet-".$amt.", spend_amount=spend_amount+".$amt." where ad_creator_id=".$creatorid;
    //echo "update tbl_adunit set amount=amount+".$amt." where seo_title='".$_GET['amount']."'";
    $qry_u_ad=mysqli_query($con,"update tbl_adunit set amount=amount+".$amt." where unit_name='".$_GET['amount']."'");
    if($qry_u_ac && $qry_u_ad)
    {
      echo "<script>alert('ad refill successfully...:)');</script>";
      //$amt=0;
    }
    else{
      echo "<script>alert('ad refill unsuccessfully try again...:)');</script>";
    }
    
  }
  else
  {
    $err="please insert valid amount";
  }
}

//___________________________fill data in controls by querystring_________________________
if(isset($_GET['adid']))
{
  
  $id=$_GET['adid'];
  $sql="select * from tbl_adunit where id=".$id;
  //echo $sql.".......................";
  $query=mysqli_query($con,$sql);
  $update=mysqli_fetch_assoc($query);
}
if(isset($_GET['d']))
{
  $id=$_GET['d'];
  $sql="select * from tbl_adunit where id=".$id;
  $query=mysqli_query($con,$sql);
  $update=mysqli_fetch_assoc($query);
}

//____________________________filter ad_________________

if(isset($_POST["btn_filter"]))
{
  $temp="";
  @$a=$_POST["adType"];
  //echo "<script>alert($a);</script>";
  if($a==0)
  {
    //pemding
      $select_ad="select * from tbl_adunit where ad_creator_id=".$creatorid." and approve=0 and rejected=1 and offline=0 ";
  }
  elseif($a==1)
  {
    //offline
    $select_ad="select * from tbl_adunit where ad_creator_id=".$creatorid."  and approve=0 and rejected=3  and offline=1 ";
  }
  elseif($a==2)
  {
    //rejected
    $select_ad="select * from tbl_adunit where ad_creator_id=".$creatorid."  and approve=0 and  rejected=2 and offline=0 ";
  }
  elseif($a==3)
  {
    //down
    $select_ad="select * from tbl_adunit where ad_creator_id=".$creatorid." and approve=1 order by amount ";
  }
  elseif($a==4)
  {
    //appprovve
    $select_ad="select * from tbl_adunit where ad_creator_id=".$creatorid."  and approve=1 ";
  }
  elseif($a==5)
  {
    //up
    $select_ad="select * from tbl_adunit where ad_creator_id=".$creatorid."  and approve=1 order by amount desc ";
  }
  else
  {
    $select_ad="select * from tbl_adunit where ad_creator_id=".$creatorid;
    $result_ad=mysqli_query($con,$select_ad); 
  }
  $result_ad=mysqli_query($con,$select_ad);
}
//_______________________________________search ads____________________________________
if(isset($_POST["btn_search"]))
{
  $a=$_POST["keyword"];
  $select_ads="select * from tbl_adunit where id=".$creatorid." and HeadLine like '%$a%' or ModifyDate='".$a."' or PublishDate='".$a."' or Views='".$a."' or Status='".$a."'";
  $result_news=mysqli_query($con,$select_ads);
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
   header("location:feedback.php?showfeed");
  }
  else
  {
    echo "<script>alert('Feedback not deleted..:)');</script>";
    cleardata();
  }
}
//__________________________________insert feedback__________________________________
if(isset($_POST['Submit']))
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
    $sql="insert into tbl_feedback(user_id,subject,message,role,file) values('$creatorid','$topic','$message',1,'$newfilename')";
    $qry=mysqli_query($con,$sql);
    if($qry){
      //$success=ucfirst($type). " Created Success";
      echo "<script>alert('Feedback successfully given..:)');</script>";
    cleardata();
    }else{
       // $warning=ucfirst($type). " Not Created".mysqli_error($con);
        echo "<script>alert('Feedback not successfully given..:)');</script>";
    }
}

//___________________refill wallet____________________

if(isset($_GET['amt']))
{

  @$wallet=$_GET['amt'];
  $flag=true;
  if(empty($wallet) || !preg_match('/^[0-9.]*$/',$wallet))
  {
    $error_wallet="Invalid Wallet Amount";
      $flag=false;
  }
  if($flag==true)
  {
    $qry=mysqli_query($con,"update tbl_ad_creator set lifetime_amount=lifetime_amount+".$wallet.", wallet=wallet+".$wallet." where id=".$creatorid);
    if($qry)
    {
      echo "<script>alert('your wallet refilled...:)');</script>";
    }
    else
    {
      echo "<script>alert('your wallet not refilled..try again...:(');</script>";
    }
  }
  header("location:wallet.php");
}



//____________________________update profile___________________________
if(isset($_POST["update_profile"]))
{
  @$username=$_POST["txtuname"];
  @$email=$_POST["email"];
  @$mobile=$_POST["txtmobile"];
 
  //@$wallet=$_POST["wallet"];
  $sql="";
  $flag=true;
  $ipaddress = $_SERVER['REMOTE_ADDR'];   
  @$name=$_FILES["file"]["name"];
  //echo $name."............................";
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
    //if(isset($_FILES))
   //{
      if($name==null)
      {
        $sql="update tbl_ad_creator set username='$username',email='$email',phone='$mobile' where id=$creatorid";
        //echo $sql.".........................................................sql";
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
            //echo $sql.".........................................................sql";
          }else
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
     
    if($flag==true)
    {
      $query=mysqli_query($con,$sql);
      if($query)
      {
        
        echo "<script>alert('profile update...:)');</script>";
        
        cleardata();
        $_SESSION['ad_creator_uname']=$username;
      } 
      else{
        echo "<script>alert('profile not update...:)');</script>";
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
   //echo "<script>alert('status updated..:)');</script>";
   //cleardata();
   header("location:adunit.php?table");
  }
  else
  {
    echo "<script>alert('status not updated..:)');</script>";
    cleardata();
  }
}   
//___________________filter feedback_______________________

if(isset($_POST['btn_feed_filter']))
{
	$a=$_POST['sort'];
	if($a==2)
		$select_feedback="select * from tbl_feedback where user_id=".$creatorid." and role=1 order by subject desc";
	$result_feedback=mysqli_query($con,$select_feedback);
}
//_________________Search feedback_______________________
if(isset($_POST['search_feed']))
{
  $result_feedback=mysqli_query($con,"select * from tbl_feedback where user_id=".$creatorid." and role=1 and (subject like '%".$_POST['keyword']."%' or c_date like '%".$_POST['keyword']."%' or message like '%".$_POST['keyword']."%')");
 
}
//___________________filter notification____________________

if(isset($_POST['btn_noti_filter']))
{
	$a=$_POST['sort'];
	if($a==1)
		$select_noti="select * from tbl_notification where user_id=".$creatorid." and role=1 order by c_date asc";
	$result_noti=mysqli_query($con,$select_noti);
}
//_____________________________search notification___________________
if(isset($_POST['search_noti']))
{
	$result_noti=mysqli_query($con,"select * from tbl_notification where user_id=$creatorid and role=1 and (sub like '%".$_POST['keyword']."%' or c_date like '%".$_POST['keyword']."%' or description like '%".$_POST['keyword']."%')");
}


?>