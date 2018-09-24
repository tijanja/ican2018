<?php
include_once 'model/Connection.php';
$db = new mysqli('localhost', 'root', 'Project123', 'ican2018');

    if(isset($_POST['image'])){
        
       echo $name = trim($_POST['speakerName']);
       echo $rank = trim($_POST['speakerRanks']);
       echo $penary = trim($_POST['speakerSession']);
       echo $profile = mysqli_real_escape_string($db,trim($_POST['profile_text']));
       
       
       
        //get and save speakers images
      $errors= array();
      $file_name = $_FILES['uploadedfile']['name'];
      $file_size =$_FILES['uploadedfile']['size'];
      $file_tmp =$_FILES['uploadedfile']['tmp_name'];
      $file_type=$_FILES['uploadedfile']['type'];
      //$file_ext=strtolower(end(explode('.',$file_name)));
      

      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
          $target_path = "uploads/";
         echo $target_path = $target_path . basename( $file_name); 

        if(move_uploaded_file($file_tmp, $target_path)) {
            echo "The file ".  basename( $file_name). 
            " has been uploaded";
        } else{
            echo "There was an error uploading the file, please try again!";
        }
         echo "9999999";
      }else{
         echo "not submit";
         
      }
      $res = $db->query("INSERT INTO speakers VALUES('','$name','$target_path','$penary','$rank','$profile','')");
      if($res)
       {
          echo "Success"; 
       }
 else {
           echo $db->error." errors";
       }
   }
   else {
           echo $db->error." errors10";
       }
?>

<html>
    <body>
        <form action="?" method="post" enctype="multipart/form-data">
        <input type="text" name="speakerName" placeholder="Name"/><br>
        <input type="text" name="speakerRanks" placeholder="Credentials"/><br>
        <input type="text" name="speakerSession" placeholder="Plenary"/><br>
        <textarea cols="30" rows="10" name="profile_text" placeholder="Profile Text"></textarea><br>
        <input type="file" name="uploadedfile"/><br>
            <input type="submit" name="image" title="Upload" /><br>
        </form>
    </body>
</html>