<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
// get database connection
include_once 'db.php';
 
// instantiate employes object
include_once 'Funcionario.php';
 
$database = new Database();
$db = $database->getConnection();
 
$func = new Funcionario($db);


$nome=$_POST['nome'];
$email=$_POST['email'];
$cpf=$_POST['cpf'];
$tel=$_POST['telefone'];
$emp=$_POST['empresa'];

$id=$_POST['id'];

    // set employes property values
    if(!empty($nome)&&!empty($email)&&
    !empty($cpf)&&!empty($tel)&&!empty($emp)){
    
   
    $func->nome = $nome;
    $func->email = $email;
    $func->cpf = $cpf;
    $func->telefone=$tel;
    $func->empresa=$emp;
    
    

    // edit the employe
    if($func->update($id)){
 
        // set response code - 201 created
         
        // tell the employes
       
        
        echo json_encode(array("message" => "Empresa foi alterada."));
        
       header("Location:../listagemFunc.html?msg=s");
        
        
        }else{
        
        header("Location:../editFunc.html?msg=n");
         
        echo json_encode(array("message" => "Erro ao editar Funcionario."));
        }
    
}else{
 header("Location:../editFunc.html?msg=n");
        

}

?>