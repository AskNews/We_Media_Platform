<?php
session_start();
include "../../Super_Admin/includes/dbconfig.php";
	
	include "engine/engine.php";
?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="icon" type="image/png" sizes="96x96" href="../../icon.png">

<body>

<div class="wmp-top">

  <div class="wmp-bar wmp-blue">
  <img src="../../logo.png" class="wmp-bar-item"  height='100px' width='100px'>
<br><br>
<a href="index.php" class="wmp-bar-item wmp-button <?php echo $type == "Index"?'wmp-green':'';?>"><i class="fa fa-home fa-2x"></i></a>
<?php
	 while($row=mysqli_fetch_array($query)){
	 ?>
 <a href="category.php?cat=<?php echo $row['id'];?>&nam=<?php echo $row['title']?>" class="wmp-bar-item wmp-button <?php echo (@$url==$row['url'])?'wmp-green':'';?>" title="<?php echo $row['title']; ?>"><?php echo $row['title']; ?></a>
      <?php
   }
   $row_t=mysqli_fetch_array($query);
?>
<a href="gallery.php" class="wmp-bar-item wmp-button <?php echo $type == "gallery"?'wmp-green':'';?>">Gallery</a>

<?php
   if($_SESSION['new-viewer-Login']=NULL){

    
    ?> 

<a href="login.php" class="wmp-bar-item wmp-button <?php echo $typ == "login"?'wmp-green':'';?>">Login</a>
<a href="register.php" class="wmp-bar-item wmp-button <?php echo $typ == "register"?'wmp-green':'';?>">Register</a>
<?php
    }else{
      ?>
      <div class="wmp-dropdown-hover">
      <a href="#" class="wmp-bar-item wmp-button <?php echo $type == "account"?'wmp-green':'';?> wmp-right"><i class="fa fa-user fa-2x"></i></a>
      <div class="wmp-dropdown-content wmp-bar-block wmp-card-4">
      <a href="#" class="wmp-bar-item wmp-button">Liked News</a>
      <a href="#" class="wmp-bar-item wmp-button">History</a>
      <a href="logout.php" class="wmp-bar-item wmp-button">Logout</a>
    </div>
  </div>
<?php
    }
  
?>
    </div>
</div>

<br><br><br>
