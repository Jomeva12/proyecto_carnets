<?php
require('../config/conexion.php');
 class Roles{
private $rol;
 public function insert($rol){ 
  // $this->rol=$rol;
  $con=new Conexion();     
  $query="INSERT into `roll`(nombreRoll) values('$rol')";
  $result=$con->connection->query($query);
  return $result;         
 }
 public function getNameRol($idRol){ 
  // $this->rol=$rol;
  $con=new Conexion();     
  $query="SELECT nombreRoll from roll where idRoll='$idRol'";
  $result=$con->connection->query($query);
  return $result;         
 }
  public function selectAll(){
    $con=new Conexion();     
    $query="SELECT * from `roll`";
    $result=$con->connection->query($query);
    return $result; 
   
  }


}


?>