<?php
$type="Index";
include 'includes/header.php';
?>
<br><br><br>
<div class="wmp-container  wmp-twothird ">

<div class="wmp-content" style="max-width:400px">
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
<div class="wmp-container wmp-card wmp-third">
   
  <div class="wmp-bar">
    <button class="wmp-bar-item wmp-button tablink " onclick="openCity(event,'London')">Recommended News</button>
  </div>
  
  <div id="London" class="wmp-container city">
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../../logo.png" class="wmp-round-small" alt="Norway" style="width:100px;">
        <br><br>
  </div>
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../../logo.png" class="wmp-round-small" alt="Norway" style="width:100px;">
        <br><br>
  </div>
  </div>

</div>


<!---- main-->
<div class="wmp-cell-row">
<div class="wmp-container  wmp-cell wmp-twothird" >
<?php
     $sql="select * from tbl_categories where status='1' and deletion='1'";
	 $query=mysqli_query($con,$sql);
	 while($row=mysqli_fetch_array($query)){
	 ?>
  <div class="wmp-panel wmp-card ">
  
    <h3><?php echo $row['title'];?></h3>
    <?php
    $a=$row['id'];
            $sql1="select * from tbl_news where Status='1' and Approved='1' and CategoryID='$a' LIMIT 5";
			$query1=mysqli_query($con,$sql1);
			while($row1=mysqli_fetch_array($query1)){
			?>
    <a href="news.php?sid=<?php echo $row1['NewsID'];?>">
    <div class="wmp-panel wmp-card wmp-third">
        <br>
        <img src="../content_creator/img/<?php echo $row1['FileAttach'];?>" class="wmp-round-small" alt="Norway" style="width:30%;height:100px;">
        <?php echo substr($row1['Summary'],0,30);?>...
      <br><br>
        </div>
        </a>
        <?php
      }
        ?>
       
  <a href="category.php?cat=<?php echo $row['id']?>&nam=<?php echo $row['title']?>">More....</a>
  </div>
  <?php
   }  
  ?>
  </div>
  <div class="wmp-container wmp-card wmp-third">
   
  <div class="wmp-bar">
    <button class="wmp-bar-item wmp-button tablink " onclick="openCity(event,'London')">Top News</button>
    <button class="wmp-bar-item wmp-button tablink" onclick="openCity(event,'Paris')">Recent News</button>
    <button class="wmp-bar-item wmp-button tablink" onclick="openCity(event,'Tokyo')">Popular News</button>
  </div>
  
  <div id="London" class="wmp-container city">
  <?php
    $a=$row['id'];
            $sql1="select * from tbl_news where TopNews='1' and Approved='1' and Status='1' LIMIT 5";
			$query1=mysqli_query($con,$sql1);
			while($row1=mysqli_fetch_array($query1)){
			?>
   
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../content_creator/img/<?php echo $row1['FileAttach'];?>" class="wmp-round-small" alt="AskNews" style="width:100px;height:80px;">
        <br><br>
  </div>
  <?php
      }
  ?>
  </div>

  <div id="Paris" class="wmp-container wmp-border city" style="display:none">
  <?php
    $a=$row['id'];
            $sql1="select * from tbl_news where Approved='1' and Status='1' LIMIT 5";
			$query1=mysqli_query($con,$sql1);
			while($row1=mysqli_fetch_array($query1)){
			?>
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../content_creator/img/<?php echo $row1['FileAttach'];?>" class="wmp-round-small" alt="Norway" style="width:100px;height:80px;">
        <br><br>
  </div>
  <?php
      }
  ?>
  </div>
  

  <div id="Tokyo" class="wmp-container wmp-border city" style="display:none">
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../../logo.png" class="wmp-round-small" alt="Norway" style="width:100px;">
        <br><br>
  </div>
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../../logo.png" class="wmp-round-small" alt="Norway" style="width:100px;">
        <br><br>
  </div>
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../../logo.png" class="wmp-round-small" alt="Norway" style="width:100px;">
        <br><br>
  </div></div>
</div>
<br><br>&nbsp;
<div class="wmp-container wmp-card wmp-third">
   
  <div class="wmp-bar">
    <button class="wmp-bar-item wmp-button tablink " onclick="openCity(event,'London')">Top Creators</button>
  </div>
  
  <div id="London" class="wmp-container city">
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../../logo.png" class="wmp-round-small" alt="Norway" style="width:100px;">
        <br><br>
  </div>
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../../logo.png" class="wmp-round-small" alt="Norway" style="width:100px;">
        <br><br>
  </div>
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../../logo.png" class="wmp-round-small" alt="Norway" style="width:100px;">
        <br><br>
  </div>
  <div class="wmp-panel wmp-card">
        <br>
        <img src="../../logo.png" class="wmp-round-small" alt="Norway" style="width:100px;">
        <br><br>
  </div>
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
    tablinks[i].className = tablinks[i].className.replace(" wmp-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " wmp-red";
}
</script>

</div>
</div>
<?php
include 'includes/footer.php';
?>
