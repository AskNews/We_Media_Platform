<?php
session_start();
include "admin/includes/dbconfig.php";

if(isset($_SESSION['newViewerLogin'])){
  header("location: index.php");//content type defer function, where we redirect the page to the login page
}
//working for contact us
if(isset($_POST['send']))
{
  function getUserIP()
  {
  // Get real visitor IP behind CloudFlare network
  if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) 
  {
  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
  $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
  }
  $client = @$_SERVER['HTTP_CLIENT_IP'];
  $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
  $remote = $_SERVER['REMOTE_ADDR'];

  if(filter_var($client, FILTER_VALIDATE_IP))
  {
  $ip = $client;
  }
  elseif(filter_var($forward, FILTER_VALIDATE_IP))
  {
  $ip = $forward;
  }
  else
  {
  $ip = $remote;
  }
  return $ip;
  }
  $user_ip = getUserIP();

	$name=$_POST['name'];
	$password=$_POST['password'];

	$email=$_POST['email'];
	$ms="Avinash".$password;
	if(!empty($name) && !empty($email))
	{
		$sql="INSERT INTO `dbviewer` (`user_name`, `email`, `password`,`ip`) VALUES ('$name', '$email',md5('$ms'), '$user_ip')";
		$query=mysqli_query($con,$sql);
		if($query)
		echo '<script>alert("Thanks for registration")</script>';
		else
 
    echo '<script>alert("Server error'.mysqli_error($con).'")</script>';
		}
		else{
			$error="username and Email can't be blank.";
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
          <h2>Register to News Ask</h2>
          <?php
          if(isset($error)){
		  ?>
          <div class="alert-msg error"><?php echo $error;?><a class="close" href="#">X</a></div>
          <?php
		  }
		  ?>
             <form class="rnd5" action="register.php" method="post">
            <div class="form-input clear">
              <label class="" for="name">Name <span class="required">*</span><br>
                <input type="text" name="name" id="name" value="" size="22" title="Please Enter your fullname" required>
              </label><br>
              <label class="" for="email">Email <span class="required">*</span><br>
                <input type="text" name="email" id="email" value="" size="22" title="please enter a valid email" pattern="([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$)">
              </label><br>
              <label class="" for="subject">Password <span class="required">*</span><br>
                <input type="password" name="password" id="subject" value="" size="22">
              </label><br>
            </div>
            
            <p>
              <input type="submit" value="Register" name="send">
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