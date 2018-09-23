<?php

if (isset($_SERVER['HTTP_ORIGIN'])) {
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
    header('Access-Control-Allow-Credentials: true');
    header('Access-Control-Max-Age: 86400');    // cache for 1 day
}

// Access-Control headers are received during OPTIONS requests
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");

    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers:        {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    exit(0);
}

//include_once 'include.php';

//$db = new mysqli('localhost', 'root', 'Project123', 'ICAN');

//$dbb = $db->getDBObject();

$db = new mysqli('localhost', 'root', 'Project123', 'ICAN');
if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$postdata = file_get_contents("php://input");

if (isset($postdata)) {
        $request = json_decode($postdata);
        
        $username = $request->username;
        $password = $request->password;
        if ($username != "") 
        {
            
            $result = $db->query("select * from Members where memberId='$username' and registrationNum='$password'");
           
            if($result->num_rows>0)
            {
               $obj = $result->fetch_object();
               echo json_encode($obj); 
            }
           else
               {
                    echo "{'action':false}";
               }
             
               
        }    
        else {
                echo "Empty username parameter!";
        }
}   
else {
        echo "Not called properly with username parameter!";
}   
 

?>