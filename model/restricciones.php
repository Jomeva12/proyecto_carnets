<?php
require('../config/conexion.php');
 class Restricciones{

 public function insert($fecha){
  $con=new Conexion(); 
  $query="INSERT into `fechasrestriccion`(fecha) values('$fecha');";
  $result=$con->connection->query($query);
  return $result;  
 }
  public function selectAll(){
    $con=new Conexion(); 
    $query="SELECT*from `fechasrestriccion`";
  $result=$con->connection->query($query);
  return $result;      
  }
  public function delete($fecha){
    $con=new Conexion(); 
    $query="DELETE from `fechasRestriccion` where fecha='$fecha'";
    $result=$con->connection->query($query);
  return $result;     
  }
  public function restriccionByFecha(){
    $con=new Conexion(); 
    $query="SELECT*from `fechasrestriccion`"; 
       $result=$con->connection->query($query);
  return $result;     
  }



}


?>