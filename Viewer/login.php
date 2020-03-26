<?php
session_start();
include "admin/includes/dbconfig.php";

if(isset($_SESSION['newViewerLogin'])){
  	header("location: index.php");//content type defer function, where we redirect the page to the login page
	}
//working for contact us
if(isset($_POST['login'])){
 
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
//login from database

$ms="Avinash".$password;
 $sql="SELECT * from dbviewer WHERE email='$email' AND password=md5('$ms') AND status = '1'";
 $query=mysqli_query($con,$sql);
 $data=mysqli_fetch_array($query);
if($data){
  
 
  
  $_SESSION['newViewerLogin']=$data['user_name'];
  
  
  header ("location: index.php");
  echo '<script>alert("Welcome")</script>';
  }
  else{
      echo '<script>alert("error'.mysqli_error($con).'")</script>';
  }
}
include "includes/header.php";

?>


<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="contact" class="clear">
      <div class="one_half first">
        <div id="respond">
          <h2>Login to News Ask</h2>
          <?php
          if(isset($error)){
		  ?>
          <div class="alert-msg error"><?php echo $error;?><a class="close" href="#">X</a></div>
          <?php
		  }
		  ?>
          <form class="rnd5" action="login.php" method="post">
            <div class="form-input clear">
             
              <label class="" for="email">Email <span class="required">*</span><br>
                <input type="text" name="email" id="email" value="" size="22" title="please enter a valid email" pattern="([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$)">
              </label><br>
              <label class="" for="subject">Password <span class="required">*</span><br>
                <input type="password" name="password" id="password" value="" size="22">
              </label><br>
            </div>
            
            <p>
              <input type="submit" value="Login" name="login">
              &nbsp;
              
            </p>
          </form>
        </div>
      </div>
      
          <div class="one_half">
            <img src="images/demo/logo1.png">
          </div>
        </section>
      </div>
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>

<?php 
include "includes/footer.php";
?>