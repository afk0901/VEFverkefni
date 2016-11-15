<?php
namespace Delete;

class deletefile{
protected $Destination;
protected $Messages;
protected $connection;
protected $files;
protected $dbconn;

public function __construct($dest){
$this->Destination = $dest;
$this->files = scandir($this->Destination);
}


 function display_files(){
    
   echo '<form action="" method="post">';
   foreach ($this->files as $key => $value) {

   if ($this->files[$key] != '.' && $this->files[$key] != '..') {
   
   	 echo '<p>'.$this->files[$key].'<input type="submit" name="delete'.$key.'" value="Delete"></p>';
     }
   	 
   }
 echo '</form>';
   }

function delete_file_from_folder(){
  require "./includes/connection.php";
   require_once './Image.php';
  foreach ($this->files as $key => $value) {
  if (isset($_POST['delete'.$key])) {
     //$delete_from_database = new Image($conn);
     unlink($this->Destination.$this->files[$key]);
       
     }
   }
}

    
function delete_file_from_db(){

   require "./includes/connection.php";
  
   
foreach ($this->files as $key => $value) {

  if (isset($_POST['delete'.$key])) {
      
        $this->connection = $conn;
        $dest_no_slash = str_replace('/', '-', $this->Destination);
           $dest_no_slash_no_backslash = str_replace('\\',';', $dest_no_slash);
        $statement = $this->connection->prepare("call DeleteImage(?)");
        $statement->bindParam(1,$dest_no_slash_no_backslash);
      
      try 
      {
        $statement->execute();
        return true;
        
      }
      catch(PDOException $e)
      {
        return false;
      }

     }
   }
}

}
?>