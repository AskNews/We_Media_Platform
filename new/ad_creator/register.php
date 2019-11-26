<?php
include "../../Super_Admin/includes/dbconfig.php";
$imgPath="image/";
function compressImage($source, $destination, $quality) {

  $info = getimagesize($source);

  if ($info['mime'] == 'image/jpeg') {
      $image = imagecreatefromjpeg($source);
  }
  elseif ($info['mime'] == 'image/gif'){ 
      $image = imagecreatefromgif($source);
  }
  elseif ($info['mime'] == 'image/png'){ 
      $image = imagecreatefrompng($source);
  }
  imagejpeg($image, $destination, $quality);

}

if(isset($_POST['reg'])){
  @$image=$_FILES['image'];
    
  @$imageName='';
  @$temp = explode(".", $_FILES["image"]["name"]);
             
   @ $extension = end($temp);
             @ $fileName = $temp[0] . "." . $temp[1];
             @ $temp[0] = rand(0, 3000); //Set to random number
            @  $temp = explode(".", $_FILES["image"]["name"]);
             @ $newfilename = round(microtime(true)) . '.' . $extension;
 
  $uname=$_POST['uname'];
  $email=$_POST['email'];
  $pwd=md5($_POST['pwd']);
  $ip=$_SERVER['REMOTE_ADDR']; 
  $dat=date('m/d/Y ', time());
  $mob=$_POST['mob'];
  compressImage($_FILES['image']['tmp_name'],$imgPath.$newfilename,60);
     
    $sql="INSERT INTO `tbl_ad_creator` 
    ( `username`, `email`, `mobile`, `password`, `IP`, `join_date`,`company_logo`)
     VALUES ('$uname', '$email', '$mob', '$pwd','$ip','$dat','$newfilename')";
     $qry=mysqli_query($con,$sql);
     if($qry){
       $success="Done";
       header("Location: login.php");
     }else{
    $error=mysqli_error($con); 
    }
}
?><!DOCTYPE html>
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

<div id="main">
<div class="w3-teal">
  <div class="w3-container">
    <h1>Register</h1>
  </div>
</div>
<div class="w3-container">
  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
      <h1>Ragister</h1>
    </header>

    <div class="w3-container">
    <?php
    include "includes/msg.php";
    ?>
    <form class="w3-container" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <br>
    <label>User Name</label>
<input class="w3-input" type="text" name="uname" required>
<br>

<label>Email</label>
<input class="w3-input" type="email" name="email" required>
<br>

<label>Password</label>
<input class="w3-input" type="password" name="pwd" required>
<br>

<label>Confirm Password</label>
<input class="w3-input" type="password" name="cpwd" required>
<br>

<label>Mobile Number</label>
<input class="w3-input" type="text" name="mob" required>
<br>

<label>Profile Image/Copany logo</label>
<input class="w3-input" type="file" name="image" required>
<br>

    <button class="w3-button w3-purple" type="submit" name="reg" >Register</button>
    <a href="login.php">Already Have a account</a>
   <br><br>
    </form>
      </div>

    <footer class="w3-container w3-blue">
      <h5>Footer</h5>
    </footer>
  </div>
  </div>

  <script>
    function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

function w3_open() {
  document.getElementById("main").style.marginLeft = "15%";
  document.getElementById("mySidebar").style.width = "15%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</body>
</html>
