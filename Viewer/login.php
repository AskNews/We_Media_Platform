<?php
include('config.php');
$login_button = '';
if(isset($_GET["code"]))
{
 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
 if(!isset($token['error']))
 {
  $google_client->setAccessToken($token['access_token']);
  $_SESSION['access_token'] = $token['access_token'];
  $google_service = new Google_Service_Oauth2($google_client);
  $data = $google_service->userinfo->get();
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }
  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }
  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }
  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }
  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}
if(!isset($_SESSION['access_token']))
{
 $login_button = '<a class="button small red" href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}

$type ="Login";
include "../Super_Admin/includes/dbconfig.php";


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
          <form class="rnd5" method="post">
            <div class="form-input clear"> 
              <label class="" for="email">Email <span class="required">*</span><br>
                <input type="text" name="email" id="email" value="" size="22" title="please enter a valid email" pattern="([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$)">
              </label><br>
              <label class="" for="subject">Password <span class="required">*</span><br>
                <input type="password" name="password" id="password" value="" size="22">
              </label><br>
            </div>
            <p>
              <input type="submit" value="Login" class="button small orange" name="login">
              &nbsp;
              
            </p>
            <br/>
            <?php
              if($login_button == '')
              {

                $_SESSION['newViewerLogin']=$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];
                @header("location:index.php");
                //mysqli_query($con,"insert into tbl_viewer(user_name,email,status,c_date) values('".$_SESSION['newViewerLogin']."','".$_SESSION['user_email_address']."','1','".date("Y-m-d")."')");
                 
              }
              else
              {
                echo '<div align="center">'.$login_button . '</div>';
              }
              ?>
          </form><br/><br/>
          <a href="register.php">Haven't account...?</a>
          <br/><br/>
        </div>
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