<?php
//_____________________________________monetization with index point______________________________

$index_qry=mysqli_query($con,"select index_point as index_data from tbl_content_creator where id=".$creatorid);
$index=mysqli_fetch_array($index_qry);
$index=$index['index_data'];
if($index>100)
{
  mysqli_query($con,"update tbl_content_creator set Monetization=1 where id=".$creatorid);
}

// one month -->follwer 40 , likes on 1 news 100 , 3 news publish , 100 views on 1 news = 5+ index

//follower
$f_qry=mysqli_query($con,"select count(f.id) as follower from tbl_follower f, tbl_content_creator c where f.content_creator_id=c.id and c.id=$creatorid and datediff(f.date,date(now()))<=30 having count(f.id)>=40");
$f=mysqli_fetch_array($f_qry);
$f=$f['follower'];

//like
$l_qry=mysqli_query($con,"select count(l.id) as l  from tbl_like l,tbl_news n,tbl_content_creator c where n.id=l.news_id and n.CreatorID=c.id and c.id=".$creatorid." and datediff(n.PostDate,date(now()))<=30 and datediff(l.c_date,date(now()))<=30  having count(l.id)>=100");
$l=mysqli_fetch_array($l_qry);
$l=$l['l'];

// 3 news publish 
$p_qry=mysqli_query($con,"select count(id) p from tbl_news where CreatorID =".$creatorid." and datediff(PostDate,date(now())) having count(id)>=3;");
$p=mysqli_fetch_array($p_qry);
$p=$p['p'];

// 100 views
$v_qry=mysqli_query($con,"select count(Views) as v from tbl_news where CreatorID=".$creatorid."  and Views>=100 and datediff(PublishDate,date(now()))<=30;");
$v=mysqli_fetch_array($v_qry);
$v=$v['v'];
if(!empty($f) && !empty($l) && !empty($p) && !empty($v) )
{
	mysqli_query($con,"update tbl_content_creator set index_point=index_point+5 where id=".$creatorid);
}

//_________________________________________variable declration________________________________________________

$cat=$headLine=$url=$seoTitle=$seoDes=$newfilename=$fileName=$attachFile=$details=$summary=$status=null;
@$page=$_GET["page"];
if($page=="" || $page==1)
{
  @$page1=0;
}
else
{
    @$page1=($page*5)-5;
} 

$comment_qry=mysqli_query($con,"select count(c.comment_id) as comment from tbl_comment c,tbl_news n,tbl_content_creator cc where n.id=c.news_id and cc.id=n.CreatorID and cc.id=".$creatorid );
$comment_count=mysqli_fetch_array($comment_qry);
$comment=$comment_count['comment'];

$select_news="select * from tbl_news where CreatorID=".$creatorid."  order by PublishDate desc limit $page1,5";
$result_news=mysqli_query($con,$select_news);

$select_comment="select n.headLine,c.* from tbl_news n,tbl_comment as c where c.news_id=n.id and c.status=0 and n.CreatorID=$creatorid order by postdate desc limit $page1,5 ";
$result_comment=mysqli_query($con,$select_comment);

$select_approve_comment="select n.headLine,c.* from tbl_news n,tbl_comment as c where c.news_id=n.id and c.status=1  and n.CreatorID=$creatorid order by postdate desc limit $page1,5";
$approve_comment=mysqli_query($con,$select_approve_comment);

$select_spam_comment="select n.headLine,c.* from tbl_news n,tbl_comment as c where c.news_id=n.id and c.status=2  and n.CreatorID=$creatorid order by postdate desc limit $page1,5";
$spam_comment=mysqli_query($con,$select_spam_comment);

$select_feedback="select * from tbl_feedback where role=0 and user_id=".$creatorid." order by c_date desc limit $page1,5";
$result_feedback=mysqli_query($con,$select_feedback);

$select_noti="select * from tbl_notification where role=0 and user_id=".$creatorid." order by c_date desc limit $page1,5"	;
$result_noti=mysqli_query($con,$select_noti);

$select_qna="select * from tbl_qna where role=0 and status=1 order by c_date desc limit $page1,5";
$result_qna=mysqli_query($con,$select_qna);

$select_transaction="select * from tbl_transaction where content_creator_id=".$creatorid." order by c_date desc limit $page1,5";
$result_transaction=mysqli_query($con,$select_transaction);

//---------------paging news ------------------
$sql1=mysqli_query($con,"select * from tbl_$type ");
@$total_news_rec=mysqli_num_rows($sql1);
$total_news_pages=ceil($total_news_rec/5);  
$last_news=$total_news_pages-1;


//---------------paging transaction ------------------
$sql_transaction=mysqli_query($con,"select * from tbl_$type ");
@$total_transaction_rec=mysqli_num_rows($sql_transaction);
$total_transaction_pages=ceil($total_transaction_rec/5);  
$last_transaction=$total_transaction_pages-1;

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


//-------paging for comment-----
$sql_app_com=mysqli_query($con,"select count(*) from tbl_$type as c,tbl_news as n where c.news_id=n.id and c.status=1 and  and n.CreatorID=$creatorid");
@$total_rec_app_com=mysqli_num_rows($sql_app_com);
$total_pages_app_com=ceil($total_rec_app_com/5);  
$last_app_com=$total_pages_app_com-1;

$sql_pens_com=mysqli_query($con,"select count(*) from tbl_$type as c,tbl_news as n where c.news_id=n.id and c.status=0 and n.CreatorID=$creatorid");
@$total_rec_pen_com=mysqli_num_rows($sql_pen_com);
$total_pages_pen_com=ceil($total_rec_pen_com/5);  
$last_app_com=$total_pages_pen_com-1;

$sql_spam_com=mysqli_query($con,"select count(*) from tbl_$type as c,tbl_news as n where c.news_id=n.id and c.status=2  and n.CreatorID=$creatorid");
@$total_rec_spam_com=mysqli_num_rows($sql_spam_com);
$total_pages_spam_com=ceil($total_rec_spam_com/5);  
$last_spam_com=$total_pages_spam_com-1;

@$headLine=$_POST["newsheadline"];
@$url=$_POST["url"];
@$seoTitle=$_POST["seotitle"];
@$seoDes=$_POST["seodes"];
@$attachFile=$_FILES["file"]["name"];
@$details=$_POST["editor1"];
@$summary=$_POST["summary"];
@$status=$_POST["status"];
@$attachFileName='';
@$flag=true;
@$date=date('m/d/Y ', time());
@$viewStateFile=$_FILES["file"]["name"];
$ipaddress = $_SERVER['REMOTE_ADDR'];
//_______________________________insert news___________________________
if(isset($_POST['add_'.$type.'']))
{
  if(empty($_POST["newsheadline"]))
  {
    $error_headline="please insert headline";
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
      $sql="insert into tbl_$type(CategoryID,CreatorID,HeadLine,Url,SeoTitle,SeoDescription,FileAttach,Summary,Details,Status,PostDate) values('$cat','$creatorid','$headLine','$url','$seoTitle','$seoDes','$newfilename','$summary','$details','$status','$date')";
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
//_______________________________update channel_________________________

if(isset($_POST['channel_update']))
{
  $res=mysqli_query($con,"update tbl_content_creator set ChannelName='".$_POST['channelname']."' , ChannelDescription='".trim($_POST['description'])."' where id=".$creatorid);
  if($res)
  {
    echo "<script>alert('channel update...:)');</script>";
  }
  else{
    echo "<script>alert('channel not update...:)');</script>";
  }
  //echo "update tbl_content_creator set ChannelName='".$_POST['channelname']."' , ChannelDescription='".$_POST['description']."' where id=".$creatorid;
  //echo "<script>alert('channel not update...:)');</script>";
}

//_______________________________update profile___________________________
if(isset($_POST["update_profile"]))
{
  @$username=$_POST["txtuname"];
  @$email=$_POST["email"];
  @$mobile=$_POST["txtmobile"];
  @$bankname=$_POST["txtbname"];
  @$holdername=$_POST["txtaccountHname"];
  @$account=$_POST["txtaccountno"];
  @$ifsc=$_POST["txtIfsc"];
  $sql="";
  $flag=true;
  $ipaddress = $_SERVER['REMOTE_ADDR'];   
  @$name=$_FILES["file"]["name"];
  $filename=null;
  $data=mysqli_query($con,"select username as uname,email from tbl_content_creator");
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
        $sql="update tbl_content_creator set username='$username',email='$email',mobile='$mobile',bank_name='$bankname',account_holder_name='$holdername',bank_account_number='$account',ifsc_code='$ifsc' where id=$creatorid";
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
            $sql="update tbl_content_creator set username='$username',email='$email',mobile='$mobile',bank_name='$bankname',account_holder_name='$holdername',bank_account_number='$account',ifsc_code='$ifsc',channel_logo='$filename' where id=$creatorid";           
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
      if(empty($bankname))
      {
        $error_bname="Invalid bank name";
        $flag=false;

      }
      if(empty($ifsc) || !preg_match('^[A-Za-z]{4}[0]{1}[0-9a-zA-Z]{6}$',$ifsc))
      {
        $flag=false;
        $error_ifsc="Invalid IFSC code";
      }
      if(empty($account) || !preg_match('/^[0-9]*$/',$account))
      {
        $error_accountNum="Invalid Account number";
        $flag=false;
        
      }
      if(empty($holdername) || !preg_match('/^[A-Za-z]*$/',$holdername))
      {
        $error_holderName="Invalid bank name";
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
        $_SESSION['content_creator_uname']=$username;
      } 
    }
}  
//_____________________________change password______________________________
if(isset($_POST["change_pass"]))
{  
  $flag=true;
  $pass="";
  $data="select * from tbl_content_creator where id=".$creatorid;
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
    $sql="update tbl_content_creator set password='".md5($_POST['NewPassword'])."' where id=$creatorid";
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
//_____________________________update news________________________________
if(isset($_POST["add_u"]))
{ $temp=$details;
  if(empty($_POST["newsheadline"]))
  {
    $error_headline="please insert headline";
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
        function compressImage($source,$destination,$quality) 
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
      $sql="update tbl_$type set CategoryID='$cat', CreatorID='$creatorid',HeadLine='$headLine',Url='$url',SeoTitle='$seoTitle',SeoDescription='$seoDes',FileAttach='$newfilename',Summary='$summary',Status='$status',Details='$details',PostDate='$date' where id=".$_GET["newsid"];
      $qry=mysqli_query($con,$sql);
      echo $sql;
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
//____________________________cleardata___________________________________
function cleardata()
{
  $cat=$headLine=$url=$seoTitle=$seoDes=$newfilename=$fileName=$attachFile=$details=$summary=$status=$_GET['status']=$_GET['feedid']=null;
}
// _________________________change status_________________________________
function Updatestatus($id)
{
  global $con,$type;
  $sql="update tbl_".$type." set Status=!Status where id=".$id;
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
//_____________________________Delete news_____________________________
function DeleteNews($id)
{
  global $con,$type;
  $sql="delete from tbl_news where id=".$id;
  $query=mysqli_query($con,$sql);
  if($query)
  {
   echo "<script>alert('News Deleted..:)');</script>";
   cleardata();
  }
  else
  {
    echo "<script>alert('News not Deleted..:)');</script>";
    cleardata();
  }
}
//______________________________Approve comment__________________________
function CommentApprove($id)
{
  global $con,$type;
  $sql="update tbl_".$type." set status=1 where id=$id";
  $query=mysqli_query($con,$sql);
  if($query)
  {
   echo "<script>alert('Comment Approved..:)');</script>";
   cleardata();
  }
  else
  {
    echo "<script>alert('Comment not Approved..:)');</script>";
    cleardata();
  }
}
//______________________________Spam comment_________________________
function CommentSpam($id)
{
  global $con,$type;
  $sql="update tbl_".$type." set status=2 where id=$id";
  $query=mysqli_query($con,$sql);
  if($query)
  {
   echo "<script>alert('Comment spam..:)');</script>";
   cleardata();
  }
  else
  {
    echo "<script>alert('Comment not Approved..:)');</script>";
    cleardata();
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
  DeleteNews($id);
}
if(isset($_GET['approve']))
{   
  $commentid=$_GET['approve'];
  CommentApprove($commentid);
}
if(isset($_GET['spam']))
{
  $commentid=$_GET['spam'];
  CommentSpam($commentid);
}
if(isset($_GET['deleteComment']))
{
  $id=$_GET['delete'];
  $sql="delete from tbl_comment where id=$id";
  $query=mysqli_query($con,$sql);
  if($query)
  {
   echo "<script>alert('Comment deleted..:)');</script>";
   cleardata();
  }
  else
  {
    echo "<script>alert('Comment not deleted..:)');</script>";
    cleardata();
  }
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
  $select_news="select * from tbl_news where CreatorID=".$creatorid." and HeadLine like '%$a%' or ModifyDate='".$a."' or PublishDate='".$a."' or Views='".$a."' or Status='".$a."'";
  $result_news=mysqli_query($con,$select_news);
}
//___________________________fill data in controls by querystring_________________________
if(isset($_GET['newsid']))
{
  
  $id=$_GET['newsid'];
  //echo "<script>alert($id);</script>";
  $sql="select * from tbl_news where id=".$id;
  $query=mysqli_query($con,$sql);
  $update=mysqli_fetch_assoc($query);
}
if(isset($_GET['d']))
{
  $id=$_GET['d'];
  //echo "<script>alert($id);</script>";
  $sql="select * from tbl_news where id=".$id;
  $query=mysqli_query($con,$sql);
  $update=mysqli_fetch_assoc($query);
}
//____________________________filter news_________________
if(isset($_POST["btn_filter"]))
{
  @$a=$_POST["newsType"];
  //echo "<script>alert($a);</script>";
  if($a==0)
  {
      $select_news="select * from tbl_news where CreatorID=".$creatorid." and Approved=0 ";
  }
  elseif($a==1)
  {
    $select_news="select * from tbl_news where CreatorID=".$creatorid."  and Approved=0 and Rejected=3 and Offline=1";
  }
  elseif($a==2)
  {
    $select_news="select * from tbl_news where CreatorID=".$creatorid."  and Approved=0 and Rejected=2";
  }
  elseif($a==3)
  {
    $select_news="select * from tbl_news where CreatorID=".$creatorid." and Status=2";
  }
  elseif($a==4)
  {
    $select_news="select * from tbl_news where CreatorID=".$creatorid."  and Approved=1";
  }
  else
  {
    $select_news="select * from tbl_news where CreatorID=".$creatorid;
    $result_news=mysqli_query($con,$select_news); 
  }
  $result_news=mysqli_query($con,$select_news);
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
    $sql="insert into tbl_feedback(user_id,subject,message,c_date,role,file) values('$creatorid','$topic','$message','$date',0,'$newfilename')";
    //echo $sql;
  echo "insert into tbl_feedback(user_id,subject,message,c_date,role,file) values('$creatorid','$topic','$message','$date',0,'$newfilename')";
  if(!empty($message))
  {
    $qry=mysqli_query($con,$sql);
    if($qry){
      $success=ucfirst($type). " Created Success";
    cleardata();
    }else{
        $warning=ucfirst($type). " Not Created".mysqli_error($con);
    }
  }
  else
  {
    $err="Invalid input";
  }
}

//_____________________________________insert transaction__________________________
if(isset($_POST['transaction']))
{
	$e_qry=mysqli_query($con,"select earnings as e from tbl_content_creator where id=".$creatorid);
	$e=mysqli_fetch_array($e_qry);
	$e=$e['e'];
	if($e>=500 && $_POST['amount']<$e && !emmpty($_POSt['amount']) && preg_match('/^[0-9]*$/',$_POST['amount']))
	{
		$u_qry=mysqli_query($con,"update tbl_content_creator set earnings=earnings-".$_POST['amount'].", 
		life_time_withdraw_amt=life_time_withdraw_amt+".$_POST['amount']." where id=".$creatorid."");
		$bal_qry=mysqli_query($con,"select earnings as e from tbl_content_creator where id=".$creatorid);
		$bal=mysqli_fetch_array($bal_qry);
		$bal=$bal['e'];
		$t_qry=mysqli_query($con,"insert into tbl_transaction(content_creator_id ,withdraw_amt,c_date,balance) values(".$creatorid.",'".$_POST['amount']."','".$date."','".$bal."')");
		if($u_qry && $t_qry)
		{
			echo "<script>alert('amount transfer successfully...:)');</script>";
		}
		else
		{
		  echo "<script>alert('amount transfer unsuccessfully...:(');</script>";
		}
  }
  else
  {
    $err="please insert valid amount";
  }
}

//_____________________________search transaction______________________________
if(isset($_POST['search_transaction']))
{
	$result_transaction=mysqli_query($con,"select * from tbl_transaction where content_creator_id=1 and withdraw_amt='".$_POST['keyword']."' or c_date='".$_POST['keyword']."' or balance='".$_POST['keyword']."'");
}

//___________________________________filter transaction__________________________

if(isset($_POST['btn_transaction_filter']))
{
	$a=$_POST['sort'];
	if($a==1)
		$select_transaction="select * from tbl_transaction where content_creator_id=".$creatorid." order by c_date asc";
	$result_transaction=mysqli_query($con,$select_transaction);
}

//_____________________________search notification___________________
if(isset($_POST['search_noti']))
{
	$result_noti=mysqli_query($con,"select * from tbl_notification where user_id=$creatorid and role=0 and sub like '%".$_POST['keyword']."%' or c_date='".$_POST['keyword']."' or description like '%".$_POST['keyword']."%'");
}

//___________________filter notification____________________

if(isset($_POST['btn_noti_filter']))
{
	$a=$_POST['sort'];
	if($a==1)
		$select_noti="select * from tbl_notification where user_id=".$creatorid." and role=0 order by c_date asc";
	$result_noti=mysqli_query($con,$select_noti);
}

//_________________Search feedback_______________________
if(isset($_POST['search_feed']))
{
	$result_feedback=mysqli_query($con,"select * from tbl_feedback where user_id=".$creatorid." and role=0 and subject like '%".$_POST['keyword']."%' or c_date='".$_POST['keyword']."' or message like '%".$_POST['keyword']."%'");
}

//___________________filter feedback_______________________

if(isset($_POST['btn_feed_filter']))
{
	$a=$_POST['sort'];
	if($a==1)
		$select_feedback="select * from tbl_feedback where user_id=".$creatorid." and role=0 order by c_date asc";
	$result_feedback=mysqli_query($con,$select_feedback);
}


/*@$a;
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
echo $sql;
//$qry=mysqli_query($con,$sql);
	/*	if($qry){
      $success=ucfirst($type). " Created Success";
      
		}else{
      $error=ucfirst($type). " Not Created".mysqli_error($con);
      //$sql=$select;	
		}*/
		//return 0;	
//}*/
/*if(isset($_POST['add_'.$type.'']))
{
  //if($type=="news") 
  //{
    $details=$_POST["editor1"];
    
    $newfilename="";
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
        compressImage($_FILES['file']['tmp_name'],"img/"."/".$newfilename,60);
    }
  @$a=array(
    array('CategoryID',$_POST["category"]),
    array('CreatorID',$creatorid),
    array('HeadLine',$_POST["newsheadline"]),
    array('Url',$_POST["url"]),
    array('SeoTitle',$_POST["seotitle"]),
    array('SeoDescription',$_POST["seodes"]),
    array('FileAttach',$newfilename),
    array('Summary',$_POST["summary"]),
    array('Details',$details),
    array('Status',$_POST['status']));
    insert(10);
}*/

?>