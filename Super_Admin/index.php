<?php
$type="index";
include "includes/header.php";
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
 <div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-plus-sign "></i>
              <h3>Create stuff</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
                  <a href="user.php?c_user" class="shortcut"><i class="shortcut-icon icon-user "></i>
                  <span class="shortcut-label">User<br><?php echo showcount('tbl_module_user');?></span> </a>
                  <a href="gallery.php?c_gallery" class="shortcut"><i class="shortcut-icon icon-play-circle"></i>
                  <span class="shortcut-label">Gallery<br><?php echo showcount('tbl_gallery');?></span> </a>
                  <a href="picture.php?c_picture" class="shortcut"><i class="shortcut-icon icon-picture"></i>
                   <span class="shortcut-label">Picture<br><?php echo showcount('tbl_picture');?></span> </a>
                   <a href="categories.php?c_categories" class="shortcut"> <i class="shortcut-icon icon-tag"></i>
                   <span class="shortcut-label">Category<br><?php echo showcount('tbl_categories');?></span> </a>
                   <a href="slideshow.php?c_slideshow" class="shortcut"><i class="shortcut-icon icon-play"></i>
                   <span class="shortcut-label">Slide Show<br><?php echo showcount('tbl_slideshow');?></span> </a>
                   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-play"></i>
                   <span class="shortcut-label">Comming Soon</span> </a>
                   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-picture"></i>
                    <span class="shortcut-label">Comming Soon</span> </a>
                    <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-tag"></i>
                    <span class="shortcut-label">Comming Soon</span> </a> 
                </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
</div>
<div class="span12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-edit"></i>
              <h3>Manage stuff</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="shortcuts"> 
                  <a href="user.php" class="shortcut"><i class="shortcut-icon icon-user "></i>
                  <span class="shortcut-label">User<br><?php echo showActivecount('tbl_module_user');?></span> </a>
                  <a href="gallery.php" class="shortcut"><i class="shortcut-icon icon-play-circle"></i>
                  <span class="shortcut-label">Gallery<br><?php echo showActivecount('tbl_gallery');?></span> </a>
                  <a href="picture.php" class="shortcut"><i class="shortcut-icon icon-picture"></i>
                   <span class="shortcut-label">Picture<br><?php echo showActivecount('tbl_picture');?></span> </a>
                   <a href="categories.php" class="shortcut"> <i class="shortcut-icon icon-tag"></i>
                   <span class="shortcut-label">Category<br><?php echo showActivecount('tbl_categories');?></span> </a>
                   <a href="slideshow.php" class="shortcut"><i class="shortcut-icon icon-play"></i>
                   <span class="shortcut-label">Slide Show<br><?php echo showActivecount('tbl_slideshow');?></span> </a>
                   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-play"></i>
                   <span class="shortcut-label">Comming Soon</span> </a>
                   <a href="javascript:;" class="shortcut"><i class="shortcut-icon icon-picture"></i>
                    <span class="shortcut-label">Comming Soon</span> </a>
                    <a href="javascript:;" class="shortcut"> <i class="shortcut-icon icon-tag"></i>
                    <span class="shortcut-label">Comming Soon</span> </a> 
                </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
</div>
</div>
</div>
</div>
</div>
<?php
include "includes/footer.php";

?>