<?php
session_start();
include "admin/includes/dbconfig.php";
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
$role="Viewer";
	$name=$_POST['name'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	$email=$_POST['email'];
	
	if(!empty($name) && !empty($email))
	{
		$sql="INSERT INTO `dbcontactus` (`name`, `email`, `subject`, `message`,`ip`, `role`) VALUES ('$name', '$email', '$subject', '$message', '$user_ip', '$role')";
		$query=mysqli_query($con,$sql);
		if($query)
		$success="Your message has been sent. Thank you!";
		else
		$error="User not created. Mysqli says: ".mysqli_error($con);
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
        <h1>This Features only for Registerd Users</h1>
        <div id="respond">
          <h2>Contact Us</h2>
          <?php
          if(isset($error)){
		  ?>
          <div class="alert-msg error"><?php echo $error;?><a class="close" href="#">X</a></div>
          <?php
		  }
		  ?>
          <form class="rnd5" action="#" method="post">
            <div class="form-input clear">
              <label class="one_half first" for="name">Name <span class="required">*</span><br>
                <input type="text" name="name" id="name" value="" size="22" title="Please Enter your fullname" pattern="([a-zA-Z]+$)">
              </label>
              <label class="one_half" for="email">Email <span class="required">*</span><br>
                <input type="text" name="email" id="email" value="" size="22" title="please enter a valid email" pattern="([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$)">
              </label>
              <label class="" for="subject">Subject <span class="required">*</span><br>
                <input type="text" name="subject" id="subject" value="" size="22">
              </label>
            </div>
            <div class="form-message">
             <label class="" for="message">Message <span class="required">*</span><br>
                
              
              <textarea name="message" id="message" cols="25" rows="10"></textarea></label>
            </div>
            <p>
              <input type="submit" value="Submit" name="send">
              &nbsp;
              <input type="reset" value="Reset">
            </p>
          </form>
        </div>
      </div>
      <div class="one_half">
        <div class="map push50"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29782.50733364737!2d72.9678652!3d21.0801131!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be05bec37acf0e9%3A0x27fac1ca69afbad9!2sPalsana%2C+Gujarat!5e0!3m2!1sen!2sin!4v1551280418528" width="570" height="200" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        <section class="contact_details clear">
          <h2>About News Ask </h2>
          <p>We are news sharing program and also we can provise to digital marketing to share your product and get more traffic just <a href="monitization/index.php" title="Promote your product">Join Us</a> as Monitizer and we are also provide the platform to Write your news and earn money from our Platform just join us and become a<a href="content-creator/index.php">Content Creator</a>.</p>
          <p>our main work is publish more news to update your knowledge</a>.</p>
          <div class="one_half first">
            <address>
            Company Name<br>
            Street Name &amp; Number<br>
            Town<br>
            Postcode/Zip
            </address>
          </div>
          <div class="one_half">
            <ul class="list none">
              <li>2person</li>
              <li>8562547854</li>
              <li>Email: <a href="#">contact@newsask.com</a></li>
            </ul>
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