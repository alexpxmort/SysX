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

$uploaddir="uploads/";
$uploadfile = $uploaddir . $_FILES['logo']['name'];


if (move_uploaded_file(

$_FILES['logo']['tmp_name'],

$uploadfile
)){

echo "Arquivo Enviado";
}else {
 echo "Arquivo não enviado";
}
    // set company property values
    if(!empty($nome)&&!empty($email)&&
    !empty($website)){
    
   
    $Empresa->nome = $nome;
    $Empresa->email = $email;
    $Empresa->logo = $uploadfile;
    $Empresa->website=$website;
    
    
 
    // create the company
    if($Empresa->insert()){
 
        // set response code - 201 created
        
 
        // tell the company
       header("Location:../cad.html");
        
        echo json_encode(array("message" => "Empresa foi criada."));
        
        header("Location:../cad.html?msg=s");
        
        
        }else{
        
        header("Location:../cad.html?msg=n");
        
        
 
        echo json_encode(array("message" => "Erro ao criar Empresa."));
        }
    

}else{

header("Location:../cad.html?msg=n");
        

}

?>