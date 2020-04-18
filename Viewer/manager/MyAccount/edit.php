<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="contact" class="clear">
      <div class="one_half first">
        <div id="respond">
          <h2>Edit Profile</h2>
          <form class="rnd5" method="post">
            <div class="form-input clear"> 
              <label class="" for="old_pass">User name <span class="required">*</span><br>
                <input type="text" name="user"  id="email" value="" size="22" title="please enter a user name" >
                <span><?php echo @$error_user ?></span>
              </label><br>
              <label class="" for="subject">Email <span class="required">*</span><br>
                <input type="email" name="email" id="password" value="" >
                <span><?php echo @$error_email ?></span>
              </label><br>
            </div>
            <p>
              <input type="submit" value="Edit" class="button small orange" name="edit_profile">
              &nbsp;
            </p>
          </form><br/><br/>
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
