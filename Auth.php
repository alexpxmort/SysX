<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here
// include database and object files
include_once 'db.php';
include_once 'users.php';
 
// instantiate database and users object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user = new User($db);
 
$userLog= $user->user=$_POST['userlog'];
$pwdLog= $user->password=$_POST['pwdlog'];

if(!empty($userLog)&&!empty($pwdLog)){
if($userLog=="ademp" && $pwdLog=="funcemp68"){

$id=1;
// read users will be here
$stmt = $user->read($id);
$num = $stmt->rowCount();


// check if more than 0 record found
if($num>0){
 
    // users array
    $users_arr=array();
    $users_arr["records"]=array();
 

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $user=array(
            "id" =>$id,
            "user" => $user,
            
        );
 
        array_push($users_arr["records"], $user);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show users data in json format
     //echo json_encode($users_arr,JSON_PRETTY_PRINT);
    
}else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the users not found
    $arr=array("message" => "No Users found.");
    $arr= json_encode($arr,JSON_PRETTY_PRINT);
    //echo $arr;
    
}
 

 }else{
 
    
    http_response_code(404);
 
    // tell the users not found
    $arr=array("message" => "No Users found.");
    $arr= json_encode($arr,JSON_PRETTY_PRINT);
    
   }
 }else{
  
    http_response_code(404);
 
    // tell the users not found
    $arr=array("message" => "No Users found.");
    $arr= json_encode($arr,JSON_PRETTY_PRINT);
    
  }

?>