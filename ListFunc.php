<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// database connection will be here
// include database and object files
include_once 'db.php';
include_once 'Funcionario.php';
 
// instantiate database and emploies object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$func = new Funcionario($db);

// read emploies will be here
$stmt = $func->read();
$num = $stmt->rowCount();


// check if more than 0 record found
if($num>0){
 
    // employes array
    $func_arr=array();
    $func_arr["records"]=array();
 

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $func=array(
            "id" =>$id,
            "nome" => $nome,
            "email"=>$email,
            "cpf"=>$cpf,
            "telefone"=>$telefone,
            "empresa"=>$empresa
            
            
        );
 
        array_push($func_arr["records"], $func);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show emploies data in json format
     echo json_encode($func_arr,JSON_PRETTY_PRINT);
    
}else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the emploies not found
    $arr=array("message" => "No Users found.");
    $arr= json_encode($arr,JSON_PRETTY_PRINT);
    echo $arr;
}
 
 


 

?>