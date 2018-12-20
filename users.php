<?php
class User{
 
    // database connection and table name
    private $con;
    private $table_name = "users";
 
    // object properties
    public $id;
    public $user;
    public $password;

 
    // constructor with $db as database connection
    public function __construct($db){
        $this->con = $db;
    }

    // read users
    function read($id){
    
        // select all query
        $query = "SELECT id,user FROM  ". $this->table_name ." where id = ".$id."";
    
        // prepare query statement
        $stmt = $this->con->prepare($query);
    
        // execute query
        $stmt->execute();
    
        return $stmt;
    }


    
}
?>