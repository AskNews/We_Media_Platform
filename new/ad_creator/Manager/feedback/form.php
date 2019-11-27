
<div class="w3-container">
  <div class="w3-card-4" style="width:100%;">
    <header class="w3-container w3-blue">
      <h1>Feedback</h1>
    </header>

<div class="w3-container">
    <?php
    include "includes/msg.php";
    ?>
    <form class="w3-container" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <br>
    <input type="submit" name="smt" class="w3-button w3-purple" value="My Feedback">
    <br><br>
    <label>Subject</label>
<select class="w3-input" name="topic">
<option value="1">Account Audtion Problem</option>
<option value="2">Ads Audtion Problem</option>
<option value="3">Account Wallet Problem</option>
<option value="4">Other</option>

</select>
<br>

<label>Message</label>
<input class="w3-input" type="text" name="msg" >
<br>


<label>Screenshoot</label>
<input class="w3-input" type="file" name="image" >
<br>

    <button class="w3-button w3-purple" type="submit" name="send" >Send Feedback</button>
    
   <br><br>
    </form>
      </div>

      <footer class="w3-container w3-blue">
      <h5>AskNews</h5>
    </footer>
  </div>
  </div>
