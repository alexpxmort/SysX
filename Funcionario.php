<?php
class Funcionario{
 
    // database connection and table name
    private $con;
    private $table_name = "funcionario";
 
    // object properties
    public $id;
    public $nome;
    public $email;
    public $telefone;
    public $cpf;
    public $empresa;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->con = $db;
    }
    
    public function insert(){ 
     $sql = "INSERT INTO funcionario (nome, email, cpf, telefone,empresa ) VALUES ( :nome, :email, :cpf,:telefone,:empresa )";
     
      $st = $this->con->prepare ( $sql );
     $st->bindValue( ":nome", $this->nome, PDO::PARAM_STR ); $st->bindValue( ":email", $this->email, PDO::PARAM_STR ); $st->bindValue( ":cpf", $this->cpf, PDO::PARAM_STR ); $st->bindValue( ":telefone", $this->telefone, PDO::PARAM_STR );
    $st->bindValue( ":empresa", $this->empresa, PDO::PARAM_INT );
    
    // execute query
        if($st->execute()){
            return true;
        }
    
        return false;
    
    }
    
    
    function read(){
    
        // select all query
        $query = "SELECT id,nome,email,cpf,telefone,empresa FROM  ". $this->table_name ."";
    
        // prepare query statement
        $stmt = $this->con->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    
    
    public function delete($id){
      $sql = "DELETE FROM funcionario Where id=:id"; $st = $this->con->prepare ( $sql ); $st->bindValue( ":id", $id, PDO::PARAM_INT );  
    // execute query
        if($st->execute()){
            return true;
        }
    
        return false;
     }
    
    public function update($id) {
       $sql = " 
    SET FOREIGN_KEY_CHECKS=0;
    
     UPDATE funcionario SET nome=:nome, email=:email,empresa=:empresa, telefone=:telefone,cpf=:cpf WHERE id=:id"; $st = $this->con->prepare ( $sql ); $st->bindValue( ":nome", $this->nome, PDO::PARAM_STR ); $st->bindValue( ":email", $this->email, PDO::PARAM_STR ); $st->bindValue( ":telefone", $this->telefone, PDO::PARAM_STR ); $st->bindValue( ":cpf", $this->cpf, PDO::PARAM_STR );
     
      $st->bindValue( ":empresa", $this->empresa, PDO::PARAM_STR );
    
     
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    // execute query
        if($st->execute()){
            return true;
        }
    
        return false;
    
     }
}
?>