<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// get database connection
include_once 'db.php';
 
// instantiate company object
include_once 'Empresa.php';
 
$database = new Database();
$db = $database->getConnection();
 
$Empresa = new Empresa($db);
// get posted data
$id=$_GET['id'];

 echo $id;
    // delete the company
    if($Empresa->delete($id)){
    
    header("Location:../listagem.html?msg=s");
    }else{
      
      header("Location:../listagem.html?msg=n");
      
      
    }

?>