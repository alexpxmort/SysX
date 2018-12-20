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

$nome=$_POST['nome'];
$email=$_POST['email'];
$website=$_POST['website'];
$id=$_POST['id'];

    // set company property values
    if(!empty($nome)&&!empty($email)&&
    !empty($website)){
    
 
    $Empresa->nome = $nome;
    $Empresa->email = $email;
    $Empresa->website=$website;
       
 
    // edit the company
    if($Empresa->update($id)){
 
        // set response code - 201 created
        
        // tell the company
              
        echo json_encode(array("message" => "Empresa foi alterada."));
        
        header("Location:../listagem.html?msg=s");
                
        }else{
        
        header("Location:../edit.html?msg=n");
        
        
 
        echo json_encode(array("message" => "Erro ao editar Empresa."));
        }
    

}else{
 header("Location:../edit.html?msg=n");
        

}


?>