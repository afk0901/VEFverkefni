<?php

class ImageGallery{

protected function replace_path_to_normal($toreplace){

           $dest_slash = str_replace('-', '/', $toreplace);
           $dest_slash_backslash = str_replace(';','\\', $dest_slash);
           $replace_root = str_replace($_SERVER['DOCUMENT_ROOT'],'',$dest_slash_backslash);
           return $replace_root;
}

public function get_img_path_and_display($conn){


  require "./includes/connection.php";
  require_once './includes/Image.php';
  global $images_paths_with_num;
  global $image_name;
  global $imageinfo;

  $image_name = array();

  $statement = $conn->prepare('call GetImage()');
       
      try 
      {
        $statement->execute();

      while($row = $statement->fetch()){

    $row[2] = $this->replace_path_to_normal($row[2]);
    $images_paths_with_num[] = $row[2];
     $image_name[] = $row[1];
     $imageinfo[] = $row[3];
  }
   
}

catch(PDOException $e)
      {
        echo 'Image not found';
        return array();
      }
}

public function on_next(){
global $images_paths_with_num;


if (isset($_POST['next_img'])) {

  $_SESSION['firstimgindex'] = $_SESSION['firstimgindex'] + 4;

  $_SESSION['secondimgindex'] = $_SESSION['secondimgindex'] +4;
  $_SESSION['thirdimgindex'] = $_SESSION['thirdimgindex']  +4;
  $_SESSION['fourthimgindex'] = $_SESSION['fourthimgindex'] +4;
}

if (count($images_paths_with_num) == $_SESSION['firstimgindex']) {

   $_SESSION['firstimgindex'] = 0;

  $_SESSION['secondimgindex'] = 1;
  $_SESSION['thirdimgindex'] = 2;
  $_SESSION['fourthimgindex'] = 3;
}

}
}


?>