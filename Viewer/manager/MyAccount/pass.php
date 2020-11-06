<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <div id="contact" class="clear">
      <div class="one_half first">
        <div id="respond">
          <h2>Chane Password</h2>
          <form class="rnd5" method="post">
            <div class="form-input clear"> 
              <label class="" for="old_pass">Old Password <span class="required">*</span><br>
                <input type="text" name="old_pass"  id="email" value="" size="22" title="please enter a valid password" >
                <span><?php echo @$error_old ?></span>
              </label><br>
              <label class="" for="subject">New Password <span class="required">*</span><br>
                <input type="password" name="new_pass" id="password" value="" size="22">
                <span><?php echo @$error_pass ?></span>
              </label><br>
              <label class="" for="subject">Confirm Password <span class="required">*</span><br>
                <input type="password" name="con_pass" id="password" value="" size="22">
                <span ><?php echo @$error_cpass ?></span>
              </label><br>
            </div>
            <p>
              <input type="submit" value="Change Password" class="button small orange" name="change_pass">
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
