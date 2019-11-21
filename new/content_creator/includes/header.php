<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<script src="../ckeditor.js"></script>
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
  &nbsp; &nbsp;  <img src="image/sab.JPG" style="border-radius:50%;" height='100px' width='100px'>
  <br/>
  &nbsp; &nbsp;&nbsp;&nbsp;<label>shabnam</lable><br/><br/>
  <a href="#" class="w3-bar-item w3-button">Dashbord</a>
  <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
  <a href="news.php" class="w3-bar-item w3-button">News</a>
  <a href="comment.php" class="w3-bar-item w3-button">Comment</a>
  <a href="#" class="w3-bar-item w3-button">Notification</a>
  <a href="monetizaton.php" class="w3-bar-item w3-button">Monetization</a>
  <a href="feedback.php" class="w3-bar-item w3-button">Feedback</a>
</div>
<div id="main">
<div class="w3-teal">
  <button id="openNav" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">&#9776;</button>
  <div class="w3-container">
    <h1>Content Creator</h1>
  </div>
</div>