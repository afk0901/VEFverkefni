<?php
require "./includes/connection.php";
 // require_once './Image.php';
//global variables are in the very first lines of the code.
  global $images_paths_with_num;//This refers to an 2D array that stores the path of the image by a number. The first array
  //stores the image number, then the other one stores the image path, Example of use: $images_paths_with_num[0][1] - this 
  //returns the image path of the first image in the database.
  $image_count = 0;
  $image_count2 = 0;
  $statement = $conn->prepare('call GetImage()');
       
      
        $statement->execute();

      while($row = $statement->fetch()){
       
    $dest_slash = str_replace('-', '/', $row[2]);
    $dest_slash_backslash = str_replace(';','\\', $dest_slash);
    $replace_root = str_replace($_SERVER['DOCUMENT_ROOT'],'',$dest_slash_backslash);
    $row[2] = $replace_root;

    $images_paths_with_num[] = array($image_count,$row[2]);
    $image_count++;
    echo $row[1];
  }
  ?>