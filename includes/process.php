<?php
//Hérna geymi ég allt saman sem ég er að nota. Þetta væri hugsanlega endurnýtanlegt í annað verkefni.
$missing = [];



function checkform($required,$expected){
  global $missing;//$missing er global array

  foreach ($_POST as $key => $value) {
   
  $postkey = $_POST[$key];
  $temp = is_array($value) ? $value : trim($value);

  if (empty($temp) && in_array($key, $required)) {
     $missing[] = $key;

     ${$key} = '';
  } 

  /* elseif ($key == 'email_login' || $key == 'email_signup') {
//Checka hvort að emailið sé rétt og tek út stafi sem eiga ekki að vera eins og () . sem er ekki við .com o.s.f.v.

    $postkey = filter_var($key, FILTER_SANITIZE_EMAIL);

    
   if(filter_var($key, FILTER_VALIDATE_EMAIL) === false){
     
      $missing[] = $key;
   }

}*/
  
  elseif (in_array($key, $expected)) {

   ${$key} = htmlentities($temp);//Nota htmlentities() til að reyna að koma í veg fyrir að kóði gæti sendst þarna inn.
   
  }

}

}

function checkforerror($checkinput,$err){

global $missing;
global $errors;

if(isset($_POST['pass_login']) && $_POST['pass_login'] !== '12345' && $checkinput === 'pass_login'){
      echo '<p>Wrong password!</p>';
   }


elseif ($missing && in_array($checkinput, $missing)) {

    try {
     echo '<p>'.$errors[$err].'</p>';
}
//Læt vita ef reynt er að setja eitthvað annað inn en eitthvað index, svo að það sé léttara að debugga þetta fall.
  catch (Exception $e) {
  echo "Array expected, you have to decleare an array index for argument 2 or just change the method. :( (Not recommented) ";
}

}



}