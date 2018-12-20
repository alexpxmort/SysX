<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here
// include database and object files
include_once 'db.php';
include_once 'Empresa.php';
 
// instantiate database and companies object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$emp = new Empresa($db);

// read company will be here
$stmt = $emp->read();
$num = $stmt->rowCount();


// check if more than 0 record found
if($num>0){
 
    // companies array
    $emp_arr=array();
    $emp_arr["records"]=array();
 

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $emp=array(
            "id" =>$id,
            "nome" => $nome,
            "email"=>$email,
            "logo"=>$logo,
            "website"=>$website
            
        );
 
        array_push($emp_arr["records"], $emp);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show companies data in json format
     echo json_encode($emp_arr,JSON_PRETTY_PRINT);
    
}else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the companies not found
    $arr=array("message" => "No Users found.");
    $arr= json_encode($arr,JSON_PRETTY_PRINT);
    echo $arr;
}
 
 


 

?>