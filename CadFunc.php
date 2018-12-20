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

$nome=$_POST['nome'];
$email=$_POST['email'];
$cpf=$_POST['cpf'];
$tel=$_POST['telefone'];
$emp=$_POST['empresa'];

    // set employes property values
    if(!empty($nome)&&!empty($email)&&
    !empty($cpf)&&!empty($tel)&&!empty($emp)){   
   
    $func->nome = $nome;
    $func->email = $email;
    $func->cpf = $cpf;
    $func->telefone=$tel;
    $func->empresa=$emp;
    
   
    // create the employs
    if($func->insert()){
 
        // set response code - 201 created
        
 
        // tell the company
       header("Location:../cadFunc.html");
        
        echo json_encode(array("message" => "Funcionário foi criado."));
        
        header("Location:../cadFunc.html?msg=s");
        
        
        }else{
        
      header("Location:../cadFunc.html?msg=n");
        
        
 
        echo json_encode(array("message" => "Erro ao criar Funcionario."));
        }
    

}else{
header("Location:../cadFunc.html?msg=n");
        

}


?>