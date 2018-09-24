<?php
include_once 'model/Connection.php';
$db = new mysqli('localhost', 'root', 'Project123', 'ican2018');

if(isset($_POST['image'])){
    $file_name = $_FILES['uploadedfile']['name'];
      $file_size =$_FILES['uploadedfile']['size'];
      $file_tmp =$_FILES['uploadedfile']['tmp_name'];
      $file_type=$_FILES['uploadedfile']['type'];
      //$file_ext=strtolower(end(explode('.',$file_name)));
      

      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
          $target_path = "sponsors/";
         echo $target_path = $target_path . basename( $file_name); 

        if(move_uploaded_file($file_tmp, $target_path)) {
            echo "The file ".  basename( $file_name). 
            " has been uploaded";
            
            $res = $db->query("INSERT INTO sponsors VALUES('','$target_path')");
      if($res)
       {
          echo "Success"; 
       }
 else {
           echo $db->error." errors";
       }
            
        } else{
            echo "There was an error uploading the file, please try again!";
        }
         echo "9999999";
      }else{
         echo "not submit";
         
      }
      }
   else {
           echo $db->error." errors10";
       }

?>

<html>
    <body>
        <form action="?" method="post" enctype="multipart/form-data">

        <input type="file" name="uploadedfile"/><br>
            <input type="submit" name="image" title="Upload" /><br>
        </form>
    </body>
</html>