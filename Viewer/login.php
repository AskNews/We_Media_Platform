<?php
$type ="Login";
include "../Super_Admin/includes/dbconfig.php";


include "includes/header.php";
if(isset($_SESSION['newViewerLogin']))
{
  header("location: index.php");//content type defer function, where we redirect the page to the login page
}
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
          </form><br/><br/>
          <a href="register.php">Haven't account...?</a>
          <br/><br/>
          <a href="register.php">Forget Password...?</a>
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