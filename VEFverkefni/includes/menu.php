
<nav class=" navbar-default menu">
<?php 
$currentpage = basename($_SERVER['SCRIPT_FILENAME']);
?>

<ul class="nav navbar-nav">
 <li><a href="index.php" <?php if($currentpage == 'index.php'){echo 'id="here"';} ?> >Forsíða</a></li>
 <li><a href="login.php" <?php if($currentpage == 'login.php'){echo 'id="here"';} ?>>Login</a></li>
 <li><a href="image_gallery.php" <?php if($currentpage == 'image_gallery.php'){echo 'id="here"';} ?>>Image Gallery</a></li>
</ul>
</nav>
