<?php

$db = new mysqli('localhost', 'root', 'Project123', 'ican2018');
    if(isset($_FILES['image'])){
        
       $name = trim($_POST['speakerName']);
       $rank = trim($_POST['speakerRanks']);
       $penary = trim($_POST['speakerSession']);
       
       
        //get and save speakers images
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"images/".$file_name);
         
       $db->query("INSERT INTO speakers VALUES('','$name','$file_name','$penary','$rank','0')");
         echo "Success";
      }else{
         print_r($errors);
      }
   }
?>

<html>
    <body>
        <form action="?" method="post" enctype="multipart/form-data">
        <input type="text" name="speakerName" placeholder="Name"/><br>
        <input type="text" name="speakerRanks" placeholder="Credentials"/><br>
        <input type="text" name="speakerSession" placeholder="Plenary"/><br>
        <textarea cols="20" rows="4" name="profile_text" placeholder="Profile Text"></textarea><br>
        <input type="file" name="image"/><br>
            <input type="submit" name="uploadSpeaker" title="Upload" /><br>
        </form>
    </body>
</html>