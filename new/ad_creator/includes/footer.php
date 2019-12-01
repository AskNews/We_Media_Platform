<!-- Footer -->
<footer class="wmp-container wmp-green">
  <h3></h3>
  <p>AskNews </p>
  <div style="position:relative;bottom:55px;" class="wmp-tooltip wmp-right">
    <span class="wmp-text wmp-theme wmp-padding">Go To Top</span>&nbsp;   
    <a class="wmp-text-white" href="#myHeader"><span class="wmp-xlarge">
    <i class="fa fa-chevron-circle-up"></i></span></a>
  </div>
  </footer>

<script>
    function myFunction(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("wmp-show") == -1) {
    x.className += " wmp-show";
  } else { 
    x.className = x.className.replace(" wmp-show", "");
  }
}

function w3_open() {
  document.getElementById("main").style.marginLeft = "15%";
  document.getElementById("mySidebar").style.width = "15%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';
}
function w3_close() {
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";
}
</script>
</body>
</html>
