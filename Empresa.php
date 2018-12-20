<?php
class Empresa{
 
    // database connection and table name
    private $con;
    private $table_name = "empresa";
 
    // object properties
    
    public $nome;
    public $email;
    public $logo;
    public $website;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->con = $db;
    }
    
    
    public function insert() {   $sql = "INSERT INTO empresa (nome, email, logo, website ) VALUES ( :nome, :email, :logo,:website )"; $st = $this->con->prepare ( $sql ); $st->bindValue( ":nome", $this->nome, PDO::PARAM_STR ); $st->bindValue( ":email", $this->email, PDO::PARAM_STR ); $st->bindValue( ":logo", $this->logo, PDO::PARAM_STR ); $st->bindValue( ":website", $this->website, PDO::PARAM_STR );
    
    // execute query
        if($st->execute()){
            return true;
        }
    
        return false;
    
    }
    

    
    
    // read users
    function read(){
    
        // select all query
        $query = "SELECT id,nome,email,logo,website FROM  ". $this->table_name ."";
    
        // prepare query statement
        $stmt = $this->con->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }
    
    
    public function delete($id) {   $sql = "DELETE FROM empresa Where id=:id"; $st = $this->con->prepare ( $sql ); $st->bindValue( ":id", $id, PDO::PARAM_INT );  
    // execute query
        if($st->execute()){
            return true;
        }
    
        return false;
     }
    
    public function update($id) {   $sql = "UPDATE empresa SET nome=:nome, email=:email,website=:website WHERE id=:id"; $st = $this->con->prepare ( $sql ); $st->bindValue( ":nome", $this->nome, PDO::PARAM_STR ); $st->bindValue( ":email", $this->email, PDO::PARAM_STR ); $st->bindValue( ":website", $this->website, PDO::PARAM_STR );
    
    $st->bindValue( ":id", $id, PDO::PARAM_INT );
    // execute query
        if($st->execute()){
            return true;
        }
    
        return false;
    
     }
    

    
    
    
    

    
    



    
}
?>