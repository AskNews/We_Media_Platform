<?php
//session starting
session_start();



//check where the key exists or not
if(isset($_SESSION['new-AdCreator-Login'])){
	header("location: index.php");//content type defer function, where we redirect the page to the login page
	}
include "../../Super_Admin/includes/dbconfig.php";
//check for login
if(isset($_POST['login'])){
	

	@$email = mysqli_real_escape_string($con,$_POST['email']);
	@$ms = mysqli_real_escape_string($con,$_POST['password']);
	
	//login from database
	$sql="SELECT * from tbl_ad_creator WHERE email='$email' AND password=md5('$ms') AND status = '1' ";
	$query=mysqli_query($con,$sql);
	$data=mysqli_fetch_assoc($query);
    
    if($data){
		 
		//for rember me
		if(isset($_POST['rem'])){
			$time = time()+60*60; // for one hour
			setcookie("new-AdCreator-Login",$email,$time);
			}
		$_SESSION['new-AdCreator-Login']=$email;
            $success="Success";
		header ("location: index.php");
		}else
		{
			$error= mysqli_error($con);
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
    <h1>Ad Creator</h1>
  </div>
</div>
<div class="w3-container">
  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
      <h1>Login</h1>
    </header>

    <div class="w3-container">
    <?php
    include "includes/msg.php";
    ?>
    <form class="w3-container" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
    <br>
<label>Email</label>
<input class="w3-input" type="email" name="email" required>
<br>

<label>Password</label>
<input class="w3-input" type="password" name="password" required>
<br>

    <button class="w3-button w3-purple" type="submit" name="login" >Login</button>
    <a href="register.php">Don't Have a account</a>
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
