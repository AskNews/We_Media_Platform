<?php
$type="Index";
include 'includes/header.php';
?>

<div class="w3-container  w3-twothird ">

<div class="w3-content" style="max-width:400px">
<?php
			$sql="select * from tbl_slideshow where status='1' ORDER BY orderby ASC";
			$query=mysqli_query($con,$sql);
			while($slideshow=mysqli_fetch_array($query)):
				
			?>
  <img class="mySlides" src="../Sub_Admin/images/slideshow/<?php echo $slideshow['image'];?>" style="width:600px; height: 300px;">
  <?php
          endwhile;
          ?>
  </div>

<script>
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none"; 
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1} 
  x[slideIndex-1].style.display = "block"; 
  setTimeout(carousel, 2000); 
}
</script>

</div>

<div class="w3-container ">
  <h2>Responsive Layout</h2>
  <p>The w3-mobile class displays HTML elements vertically on small screens and horizontally on medium/large screens. Resize the browser window to see the effect.</p>
</div>
<!---- main-->
<div class="w3-cell-row">
  <div class="w3-container  w3-cell w3-twothird" >
  
  <div class="w3-panel w3-card ">
  
    <p>w3-card</p>
    <div class="w3-panel w3-card w3-third">
        <br>
        <img src="../../logo.png" class="w3-round-small" alt="Norway" style="width:30%">

        <p>w3-card</p>
        </div>
        <div class="w3-panel w3-card w3-third">
        <br>
        <img src="../../logo.png" class="w3-round-small" alt="Norway" style="width:30%">

        <p>w3-card</p>
        </div>
        <div class="w3-panel w3-card w3-third">
        <br>
        <img src="../../logo.png" class="w3-round-small" alt="Norway" style="width:30%">
        <p>w3-card</p>
  </div>
  
  </div>
  
  </div>
  <div class="w3-container w3-blue w3-cell w3-third">
   
  <div class="w3-bar w3-pink">
    <button class="w3-bar-item w3-button tablink w3-red" onclick="openCity(event,'London')">Top News</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Paris')">Recent News</button>
    <button class="w3-bar-item w3-button tablink" onclick="openCity(event,'Tokyo')">Popular News</button>
  </div>
  
  <div id="London" class="w3-container w3-pink w3-border city">
    <h2>Top</h2>
    <p>London is the capital city of England.</p>
  </div>

  <div id="Paris" class="w3-container w3-border city" style="display:none">
    <h2>Paris</h2>
    <p>Paris is the capital of France.</p> 
  </div>

  <div id="Tokyo" class="w3-container w3-border city" style="display:none">
    <h2>Tokyo</h2>
    <p>Tokyo is the capital of Japan.</p>
  </div>
</div>

<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>

</div>
</div>

</body>
</html>
