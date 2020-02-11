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


<head>
<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
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
.upper{
  margin-left:10%;
}
.table{
  width:90%;
  margin:5% auto;
  box-shadow:0 4px 10px 0 rgba(0,0,0,0.2),0 4px 20px 0 rgba(0,0,0,0.19);
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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
</head>
<body>
<div class="wmp-white wmp-sidebar wmp-bar-block wmp-card wmp-animate-left" style="display:none" id="mySidebar">
  <button class="wmp-bar-item wmp-button wmp-large" onclick="w3_close()">Close &times;</button><br/>
  &nbsp; &nbsp; <a href="profile.php"> <img src="<?php echo "img/".$_SESSION['content_creator_profile']; ?>" style="border-radius:50%" width="50%x" height="20%" alt="User" /> </a>
  <br/><br/>
  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<label><?php echo $_SESSION['content_creator_uname'];?></lable><br/><br/>
  <a href="index.php" class="wmp-bar-item wmp-button">Dashbord</a><hr/>
  <a href="profile.php?update_profile" class="wmp-bar-item wmp-button">Profile</a><hr/>
  <a href="news.php?m_news" class="wmp-bar-item wmp-button">News</a><hr/>
  <!-- <div class="wmp-dropdown-hover">
      <button class="wmp-button">News</button>
      <div class="wmp-dropdown-content wmp-bar-block wmp-card-4">
        <a href="#" class="wmp-bar-item wmp-button">Add news</a>
        <a href="#" class="wmp-bar-item wmp-button">Manage news</a>
      </div>
    </div> -->
  <a href="comment.php?comment" class="wmp-bar-item wmp-button">Comment</a><hr/>
  <a href="#" class="wmp-bar-item wmp-button">Notification</a><hr/>
  <a href="monetizaton.php" class="wmp-bar-item wmp-button">Monetization</a><hr/>
  <a href="feedback.php?showfeed" class="wmp-bar-item wmp-button">Feedback</a><hr/>
  <a href="logout.php" class="wmp-bar-item wmp-button">Logout</a><hr/>
</div>
<div id="main">
<div class="wmp-green">
  <button id="openNav" class="wmp-green wmp-white wmp-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="wmp-container">
    <h1>Content Creator</h1>
  </div>
</div>