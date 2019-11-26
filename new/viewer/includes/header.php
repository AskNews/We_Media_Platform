<?php
session_start();
include "../../Super_Admin/includes/dbconfig.php";
	
	include "engine/engine.php";
?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" sizes="96x96" href="../../icon.png">

<body>

<div class="w3-top">

  <div class="w3-bar w3-blue">
  <img src="../../logo.png" class="w3-bar-item"  height='100px' width='100px'>
<br><br>
<a href="index.php" class="w3-bar-item w3-button <?php echo $type == "Index"?'w3-green':'';?>"><i class="fa fa-home fa-2x"></i></a>
<?php
	 while($row=mysqli_fetch_array($query)){
	 ?>
 <a href="category.php?cat=<?php echo $row['url'];?>" class="w3-bar-item w3-button <?php echo (@$url==$row['url'])?'w3-green':'';?>" title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
      <?php
   }
   $row_t=mysqli_fetch_array($query);
?>
<a href="gallery.php" class="w3-bar-item w3-button <?php echo $type == "gallery"?'w3-green':'';?>">Gallery</a>

<?php
   if($_SESSION['new-viewer-Login']=NULL){

    
    ?> 

<a href="login.php" class="w3-bar-item w3-button <?php echo $typ == "login"?'w3-green':'';?>">Login</a>
<a href="register.php" class="w3-bar-item w3-button <?php echo $typ == "register"?'w3-green':'';?>">Register</a>
<?php
    }else{
      ?>
      <div class="w3-dropdown-hover">
      <a href="#" class="w3-bar-item w3-button <?php echo $type == "account"?'w3-green':'';?> w3-right"><i class="fa fa-user fa-2x"></i></a>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button">Liked News</a>
      <a href="#" class="w3-bar-item w3-button">History</a>
      <a href="logout.php" class="w3-bar-item w3-button">Logout</a>
    </div>
  </div>
<?php
    }
    echo $_SESSION['new-viewer-Login'].'hi';
?>
    </div>
</div>

<br><br><br>
