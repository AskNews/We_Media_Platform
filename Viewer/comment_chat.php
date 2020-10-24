<?php
//-------------chat in comment---------------------
if(isset($_POST['comment']) && isset($_POST['to_com']) && isset($_POST['news_id']) && isset($_POST['user_name']) )
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
        $qry=mysqli_query($con,"insert into tbl_comment(news_id,user_name,comment,to_comment) values('".$_POST['news_id']."','".$_POST['user_name']."','".$_POST['comment']."','".$_POST['to_com']."')");
        if($qry)
        {
          echo 'comment send to ';
        }
        else{
          echo 'comment not send to ';
        }
      }
      else
      {
        echo 'no data';
      }
}

?>