<!-- Footer -->
<footer class="wmp-container wmp-blue wmp-padding-16">
  <h3>AskNews</h3>
  <p> <a href="https://google.com" target="_blank">About us</a></p>
  <div style="position:relative;bottom:55px;" class="wmp-tooltip wmp-right">
  </div>
  <p>We Media Team  <a href="w3css_references.asp" class="wmp-btn wmp-theme-light" target="_blank"></a></p>
</footer>

</body>
</html>
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
