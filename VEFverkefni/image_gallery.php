<!DOCTYPE html>
<html>
<?php include_once './includes/header.php';?>
<body>

<div class="container">
<?php 
include_once './includes/banner.php';
include_once './includes/menu.php';?>
<div class="content">
<?php
use Imageclass\Image;
use imggall\imagegall;
global $imageinfo;
session_start();

 include_once './includes/banner.php';
 include_once './includes/menu.php';
 require "./includes/connection.php";
 include_once './includes/classes/Image_gallery_class.php';
 $displayimg = new ImageGallery();

 if (!isset($_POST['next_img'])){//If we don't want the next four images but the first one :)

 $_SESSION['firstimgindex'] = 0;
 $_SESSION['secondimgindex'] = 1;
 $_SESSION['thirdimgindex'] = 2;
 $_SESSION['fourthimgindex'] = 3;
}

$displayimg->get_img_path_and_display($conn);
$displayimg->on_next();

?>
<div class="row">
  <div class="img-responsive col-lg-2"><img src="<?php echo $images_paths_with_num[$_SESSION['firstimgindex']]?>"></div>
  <div class="img-responsive col-lg-6"><img src='<?php echo $images_paths_with_num[$_SESSION['secondimgindex']]?>'></div>
</div>
<div class="row">

<div class="col-lg-2">
 <p><?php echo $image_name[$_SESSION['firstimgindex']]; ?></p>
 <p><?php echo $imageinfo[$_SESSION['firstimgindex']]; ?></p>
 <p><?php echo 'Mynd geymd á: '.$images_paths_with_num[$_SESSION['firstimgindex']];?></p>
 </div>

<div class="col-lg-6">  
  <p><?php echo $image_name[$_SESSION['secondimgindex']]; ?></p>
 <p><?php echo $imageinfo[$_SESSION['secondimgindex']]; ?></p>
 <p><?php echo 'Mynd geymd á: '.$images_paths_with_num[$_SESSION['secondimgindex']];?></p>
 </div>
 </div>

<div class="row">
  <div class="img-responsive col-lg-2"><img src='<?php echo $images_paths_with_num[$_SESSION['thirdimgindex']]?>'></div>
  <div class="img-responsive col-lg-6"><img src='<?php echo $images_paths_with_num[$_SESSION['fourthimgindex']]?>'></div>
</div>

<div class="row">

<div class="col-lg-2">
 <p><?php echo $image_name[$_SESSION['thirdimgindex']]; ?></p>
 <p><?php echo $imageinfo[$_SESSION['thirdimgindex']]; ?></p>
 <p><?php echo 'Mynd geymd á: '.$images_paths_with_num[$_SESSION['thirdimgindex']];?></p>
 </div>

<div class="col-lg-6">  
  <p><?php echo $image_name[$_SESSION['fourthimgindex']] ?></p>
 <p><?php echo $imageinfo[$_SESSION['fourthimgindex']] ?></p>
  <p><?php echo 'Mynd geymd á: '.$images_paths_with_num[$_SESSION['fourthimgindex']];?></p>
 </div>
 </div>

<form action="" method="POST">
<button type="submit" name="next_img">Next</button>
</form>
</div>
</body>
</html>