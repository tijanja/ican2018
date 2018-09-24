<?php
include_once 'model/Connection.php';
$db = new mysqli('localhost', 'root', 'Project123', 'ican2018');
    if(isset($_POST['uploadSpeaker'])){
        
       echo $name = trim($_POST['speakerName'])."<br>";
       echo $rank = trim($_POST['speakerRanks'])."<br>";
       echo $penary = trim($_POST['speakerSession'])."<br>";
       echo $profile = trim($_POST['profile_text'])."<br>";
       
       
        //get and save speakers images
//      $errors= array();
//      $file_name = $_FILES['image']['name'];
//      $file_size =$_FILES['image']['size'];
//      $file_tmp =$_FILES['image']['tmp_name'];
      //$file_type=$_FILES['image']['type'];
     // $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      

      
//      if($file_size > 2097152){
//         $errors[]='File size must be excately 2 MB';
//      }
      
      if(empty($errors)==true){
          $target_path = "images/";
         echo $target_path = $target_path . basename( $_FILES["image"]["name"]); 

//        if(move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {
//            echo "The file ".  basename( $_FILES['image']['name']). 
//            " has been uploaded";
//        } else{
//            echo "There was an error uploading the file, please try again!";
//        }
         
       if($db->query("INSERT INTO speakers VALUES('','$name','$target_path','$penary','$rank',$profile,0)"))
       {
          echo "Success"; 
       }
 else {
           echo $db->error." errors";
       }
         echo "9999999";
      }else{
         echo "not submit";
         
      }
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