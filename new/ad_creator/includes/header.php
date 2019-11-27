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
<div class="w3-sidebar w3-bar-block w3-card w3-animate-left" style="display:none" id="mySidebar">
  <button class="w3-bar-item w3-button w3-large" onclick="w3_close()">Close &times;</button><br/>
  &nbsp; &nbsp;  
  <a href="settings.php">
  <img src="image/<?php echo $data['company_logo'];?>" style="border-radius:50%;" height='100px' width='100px'>
</a>
  <br/>
  &nbsp; &nbsp;&nbsp;&nbsp;<label><?php echo $data['username'];?></lable><br/><br/>
<a href="index.php" class="w3-bar-item w3-button <?php echo $type == "index"?'active':'';?>">Dashboard</a>
<hr>
<a href="ad_unit.php" class="w3-bar-item w3-button <?php echo $type == "ads" && $_GET['men']==""?'active':'';?>">Craete Ads</a>
<a href="ad_unit.php?men=ad_unit" class="w3-bar-item w3-button <?php echo $_GET['men'] == "ad_unit"?'active':'';?>">My Ads</a>
<hr> 
<a href="settings.php?setting=privacy" class="w3-bar-item w3-button <?php echo $_GET['setting'] == "privacy"?'active':'';?>">Privacy</a>
<a href="feedback.php" class="w3-bar-item w3-button <?php echo $type=='feedback'?'active':'';?>">Give Feedback</a>
<a href="qna.php" class="w3-bar-item w3-button <?php echo $type == "qna"?'active':'';?>">QNA</a>
<a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    
</div>
<div id="main">
<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h1>AskNews Ad Creator </h1>
  </div>
</div>