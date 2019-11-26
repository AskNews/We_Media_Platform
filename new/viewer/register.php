<?php
$typ="register";
$type="viewer";
//session starting
session_start();
include "../../Super_Admin/includes/dbconfig.php";

include "engine/engine.php";
//check where the key exists or not
if(isset($_SESSION['new-viewer-Login'])){
	header("location: index.php");//content type defer function, where we redirect the page to the login page
	}

//check for login

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
<a href="login.php" class="w3-bar-item w3-button <?php echo $type == "Index"?'w3-green':'';?>">Login</a>
<a href="register.php" class="w3-bar-item w3-button <?php echo $typ == "register"?'w3-green':'';?>">Register</a>

      <div class="w3-dropdown-hover">
      <a href="#" class="w3-bar-item w3-button <?php echo $type == "account"?'w3-green':'';?> w3-right"><i class="fa fa-user fa-2x"></i></a>
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
      <a href="#" class="w3-bar-item w3-button">Liked News</a>
      <a href="#" class="w3-bar-item w3-button">History</a>
      <a href="#" class="w3-bar-item w3-button">Logout</a>
    </div>
  </div>
    </div>
</div>

<br><br><br><br><br><br>
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

    <button class="w3-button w3-purple" type="submit" name="reg" >Register</button>
    <a href="login.php">Already Have a account</a>
   <br><br>
    </form>
      </div>

    <footer class="w3-container w3-blue">
      <h5>Made By Avinash</h5>
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
