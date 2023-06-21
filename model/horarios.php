<?php
require('../config/conexion.php');
 class Horarios{

 public function insert($hora){

  $con=new Conexion();     
  $query="INSERT into `horarios`(horas) values('$hora');";
  $result=$con->connection->query($query);
  return $result;        
 }
  public function selectAll(){
    $con=new Conexion();     
    $query="SELECT * from `horarios`";
    $result=$con->connection->query($query);
    return $result;
   
  }
  public function selectByFecha($fecha){
 $con=new Conexion();     
 $query="SELECT h.horas, h.idHorarios from `horarios` as h
 left join `cita` as c
  on c.Horarios_idHorarios1=h.idHorarios and c.fechaDeCita='$fecha' and c.EstadoDeCita_idEstadoDeCita1<>2
   where c.Horarios_idHorarios1 is null";
$result=$con->connection->query($query);
 return $result;   
  }

}


?>