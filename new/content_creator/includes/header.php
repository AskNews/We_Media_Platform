<?php

session_start();
$channel_setup_status=0;
$channel_name="";
$channel_des="";
$creatorid=0;
$info=null;
$warning=null;
$success=null;
$email="";
include "../../Super_Admin/includes/dbconfig.php";
$sql="SELECT * from tbl_content_creator WHERE username='$_SESSION[content_creator_uname]' and Status=1";
    $query=mysqli_query($con,$sql);

if(isset($_SESSION['content_creator_uname']))
{
    $sql="SELECT * from tbl_content_creator WHERE username='$_SESSION[content_creator_uname]' and Status=1";
    $query=mysqli_query($con,$sql);
    while($data=mysqli_fetch_assoc($query))
    {
        if(strlen($data["ChannelName"])>0 && strlen($data["ChannelDescription"])>0 ) 
        {
            $channel_name=$data["ChannelName"];   
            $channel_des=$data["ChannelDescription"];
            $channel_setup_status=1;
            $creatorid=$data["id"];
            $email=$data["email"];
        }
        else
        {
            $channel_setup_status=0;
        }
    }
}
else{
    header ("location: login.php");
}
//include "engine/engine.php";
?>

<!DOCTYPE html>
<html>
<title>Welcome to AskNews</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/style_color.css">
<script src="../ckeditor.js"></script>
<head>
<link rel="icon" href="../../icon.png" type="image/x-icon">
<style>
.pagination {
  display: inline-block;
  margin-left:40%;
 
}
.col-sm-3 select,input
{
  width:20%;
  display:inline-block;
  
}

.col-sm-3{
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
  margin-bottom: 20px;
  margin-top: 30px;
}
.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}
.pagination a.active {
  background-color: #4CAF50;
  color: white;
}
.pagination a:hover:not(.active) {background-color: #ddd;}
.left{
  margin-left:1150px;
  display:inline-block;
}
.news-card{width:70%;margin:1% auto;}
</style>
</head>
<body>
<div class="w3-white w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button><br/>
  &nbsp; &nbsp; <a href="profile.php"> <img src="<?php echo "img/".$_SESSION['content_creator_profile']; ?>" style="border-radius:50%" width="50%x" height="20%" alt="User" /> </a>
  <br/><br/>
  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $_SESSION['content_creator_uname'];?></lable><br/><br/>
  <a href="index.php" class="w3-bar-item w3-button">Dashbord</a><hr/>
  <a href="profile.php?update_profile" class="w3-bar-item w3-button">Profile</a><hr/>
  <a href="news.php?m_news" class="w3-bar-item w3-button">News</a><hr/>
  <!-- <div class="w3-dropdown-hover">
      <button class="w3-button">News</button>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="#" class="w3-bar-item w3-button">Add news</a>
        <a href="#" class="w3-bar-item w3-button">Manage news</a>
      </div>
    </div> -->
  <a href="comment.php?comment" class="w3-bar-item w3-button">Comment</a><hr/>
  <a href="#" class="w3-bar-item w3-button">Notification</a><hr/>
  <a href="monetizaton.php" class="w3-bar-item w3-button">Monetization</a><hr/>
  <a href="feedback.php?showfeed" class="w3-bar-item w3-button">Feedback</a><hr/>
  <a href="logout.php" class="w3-bar-item w3-button">Logout</a><hr/>
</div>
<div id="main">
<div class="w3-green">
  <button id="openNav" class="w3-green w3-white w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h1>Content Creator</h1>
  </div>
</div>