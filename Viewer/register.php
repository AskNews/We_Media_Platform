<?php
$type ="Register";
include "../Super_Admin/includes/dbconfig.php";
//working for contact us

include "includes/header.php";
if(isset($_SESSION['newViewerLogin'])){
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
          <h2>Register to News Ask</h2>
          <?php
          if(isset($error)){
		  ?>
          <div class="alert-msg error"><?php echo $error;?><a class="close" href="#">X</a></div>
          <?php
		  }
		  ?>
             <form class="rnd5" method="post">
            <div class="form-input clear">
              <label class="" for="name">Name <span class="required">*</span><br>
                <input type="text" name="name" id="name" value=""  title="Please Enter your fullname" required>
                <span><?php echo @$err['user']; ?></span>
              </label><br>
              <label class="" for="email">Email <span class="required">*</span><br>
                <input type="text" name="email" id="email" value=""  title="please enter a valid email" pattern="([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$)">
                <span><?php echo @$err['email']; ?></span>
              </label><br>
              <label class="" for="subject">Password <span class="required">*</span><br>
                <input type="password" name="password" id="subject" value="" size="22">
                <span><?php echo @$err['pass']; ?></span>
              </label><br>
            </div>
            
            <p>
              <input type="submit" value="Register" name="send">
              &nbsp;
              
            </p>
          </form>
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