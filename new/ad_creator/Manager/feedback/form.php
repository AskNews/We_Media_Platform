
<div class="wmp-container">
  <div class="wmp-card-4" style="width:100%;">
    <header class="wmp-container wmp-blue">
      <h1>Feedback</h1>
    </header>

<div class="wmp-container">
    <?php
    include "includes/msg.php";
    ?>
    <form class="wmp-container" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <br>
    <input type="submit" name="smt" class="wmp-button wmp-purple" value="My Feedback">
    <br><br>
    <label>Subject</label>
<select class="wmp-input" name="topic">
<option value="1">Account Audtion Problem</option>
<option value="2">Ads Audtion Problem</option>
<option value="3">Account Wallet Problem</option>
<option value="4">Other</option>

</select>
<br>

<label>Message</label>
<input class="wmp-input" type="text" name="msg" >
<br>


<label>Screenshoot</label>
<input class="wmp-input" type="file" name="image" >
<br>

    <button class="wmp-button wmp-purple" type="submit" name="send" >Send Feedback</button>
    
   <br><br>
    </form>
      </div>

      <footer class="wmp-container wmp-blue">
      <h5>AskNews</h5>
    </footer>
  </div>
  </div>
