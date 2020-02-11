<?php
session_start();
include "../../Super_Admin/includes/dbconfig.php";
	if(isset($_SESSION['new-AdCreator-Login'])){
    
    }
    else{
        header ("location: login.php");
    }
	include "engine/engine.php";
?>
<!DOCTYPE html>
<html>
<title>Ad Creator</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="icon" type="image/png" sizes="96x96" href="../../icon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

<style>
.pagination {
  display: inline-block;
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
</style>
<body>
<div class="wmp-sidebar wmp-bar-block wmp-card wmp-animate-left" style="display:none" id="mySidebar">
  <button class="wmp-bar-item wmp-button wmp-large" onclick="w3_close()">Close &times;</button><br/>
  &nbsp; &nbsp;  
  <a href="settings.php">
  <img src="image/<?php echo $data['company_logo'];?>" style="border-radius:50%;" height='100px' width='100px'>
</a>
  <br/>
  &nbsp; &nbsp;&nbsp;&nbsp;<label><?php echo $data['username'];?></lable><br/><br/>
<a href="index.php" class="wmp-bar-item wmp-button <?php echo $type == "index"?'active':'';?>">Dashboard</a>
<hr>
<a href="ad_unit.php" class="wmp-bar-item wmp-button <?php echo $type == "ads" && $_GET['men']==""?'active':'';?>">Craete Ads</a>
<a href="ad_unit.php?men=ad_unit" class="wmp-bar-item wmp-button <?php echo $_GET['men'] == "ad_unit"?'active':'';?>">My Ads</a>
<hr> 
<a href="settings.php?setting=privacy" class="wmp-bar-item wmp-button <?php echo $_GET['setting'] == "privacy"?'active':'';?>">Privacy</a>
<a href="feedback.php" class="wmp-bar-item wmp-button <?php echo $type=='feedback'?'active':'';?>">Give Feedback</a>
<a href="qna.php" class="wmp-bar-item wmp-button <?php echo $type == "qna"?'active':'';?>">QNA</a>
<a href="logout.php" class="wmp-bar-item wmp-button">Logout</a>
    
</div>
<div id="main">
<div class="wmp-teal">
  <button id="openNav" class="wmp-button wmp-teal wmp-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="wmp-container">
    <h1>AskNews Ad Creator </h1>
  </div>
</div>