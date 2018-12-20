<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// get database connection
include_once 'db.php';
 
// instantiate employe object
include_once 'Funcionario.php';
 
$database = new Database();
$db = $database->getConnection();
 
$func = new Funcionario($db);
// get posted data
$id=$_GET['id'];

 echo $id;
    // delete the employe
    if($func->delete($id)){
    
    header("Location:../listagemFunc.html?msg=s");
    }else{
      
      header("Location:../listagemFunc.html?msg=n");
      
      
    }

?>