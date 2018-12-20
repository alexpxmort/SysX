<?php
class Database{
    private $host='localhost';
    private $db_name='sysX';
    private $username='admin';
    private $password='empx1234';
    private $con;

    // get the database connection
    public function getConnection(){

     $this->con = null;
    
        try{
            $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->con->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }

     return $this->con;

    }
    
}
?>