<?php

  
  $User_email=$_SESSION['newSub-AdminLogin'];
  $sql="SELECT * FROM `tbl_module_user` WHERE `email`='$User_email' ";
  $qry=mysqli_query($con,$sql);
  $data=mysqli_fetch_array($qry);
  $user_id=$data['id'];
if(isset($_POST['c_gallery'])){
    
    $title=$_POST['title'];

    
    $url=$_POST['url'];
    $seo_title=$_POST['seo_title'];
    $desc=$_POST['seo_desc'];
    $location=$_POST['location'];
    $date=$_POST['dat'];
   $status=$_POST['status'];
   $sql="INSERT INTO `tbl_gallery` (`sub_admin_id`, `title`, `url`, `seo_title`, `seo_desc`, `location`, `c_date`,`status`)
     VALUES ('$user_id', '$title', '$url', '$seo_title', '$desc', '$location', '$date', '$status')";
     $qry=mysqli_query($con,$sql);
     if($qry){
    echo "<script>alert('New Gallery is created Success');</script>";
    $p="c_".$type;
     }else{
        echo "<script>alert('not');</script>";
    
     }
}

?>