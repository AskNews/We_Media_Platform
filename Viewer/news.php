<?php
$type="news";
include 'includes/header.php';
?>
<!-- content -->
<div class="wrapper row3">
  <div id="container">
    <!-- ################################################################################################ -->
    <section class="clear">
      <h1><?php echo $res_view['HeadLine'];?></h1>
      
     <p><?php echo $res_view['Summary'];?></p>
      </section>
  
    <div id="respond">
      <h2>Contact Us</h2>
      <form class="rnd5" action="#" method="post">
        <div class="form-input clear">
          <label class="one_third first" for="author">Name <span class="required">*</span><br>
            <input type="text" name="author" id="author" value="" size="22">
          </label>
          <label class="one_third" for="email">Email <span class="required">*</span><br>
            <input type="text" name="email" id="email" value="" size="22">
          </label>
          <label class="one_third" for="subject">Subject<br>
            <input type="text" name="subject" id="subject" value="" size="22">
          </label>
        </div>
        <div class="form-message">
          <textarea name="message" id="message" cols="25" rows="10"></textarea>
        </div>
        <p>
          <input type="submit" value="Submit">
          &nbsp;
          <input type="reset" value="Reset">
        </p>
      </form>
    </div>
    <!-- ################################################################################################ -->
    <div class="clear"></div>
  </div>
</div>
<?php
include 'includes/footer.php';
?>