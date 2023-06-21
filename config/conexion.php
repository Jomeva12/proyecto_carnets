<?php
session_start();
class Conexion{
public $connection; 
    public function __construct(){
$this->connection=new mysqli('localhost','root','','bdcarnets');


//new mysqli mysqli_connect
    }
  
    public function getUsers($user,$clave){
        $query="Select * from usuario Where nombres='$user' and codigo='$clave'";
        $result=$this->connection->query($query);
         return $result;     
    }
}

?>