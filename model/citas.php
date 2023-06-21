<?php
require('../config/conexion.php');
 class Citas{ 

 public function insert($idUsuario,$Estado,$horas,$fechaDeCita){
    $con=new Conexion();     
    $query="INSERT into `cita`(fechaDeProgramacion,Usuario_idUsuario,EstadoDeCita_idEstadoDeCita1,Horarios_idHorarios1,fechaDeCita) 
    values(Now(),'$idUsuario','$Estado','$horas','$fechaDeCita')";
    $result=$con->connection->query($query);
    return $result;    
 } 
 public function buscarSiExisteCita($idUsuarioExist){
    $con=new Conexion();     
    $query="SELECT*from `cita` where Usuario_idUsuario='$idUsuarioExist' and EstadoDeCita_idEstadoDeCita1='1';";
    $result=$con->connection->query($query);
    return $result;    
 } 
 public function selectAll(){
   $con=new Conexion();     
   $query="SELECT c.idCita, c.fechaDeProgramacion, c.fechaDeCita,h.horas, u.nombres, e.nombreDeestado, u.codigo from `cita` as c
   inner join `usuario` as u
   on u.idUsuario=Usuario_idUsuario
   join `horarios` as h
   on c.Horarios_idHorarios1=h.idHorarios
   join `estadodecita` as e
   on c.EstadoDeCita_idEstadoDeCita1=e.idEstadoDeCita";
   $result=$con->connection->query($query);
   return $result;    
} 
public function selectAllByUser($idUserLogin){
   $con=new Conexion();     
   $query="SELECT c.idCita, c.fechaDeProgramacion, c.fechaDeCita,h.horas, u.nombres, e.nombreDeestado, u.codigo from `cita` as c
   inner join `usuario` as u
   on u.idUsuario=Usuario_idUsuario
   join `horarios` as h
   on c.Horarios_idHorarios1=h.idHorarios
   join `estadodecita` as e
   on c.EstadoDeCita_idEstadoDeCita1=e.idEstadoDeCita
   where u.idUsuario like'$idUserLogin'";   
   
   $result=$con->connection->query($query);
   return $result;    
} 

public function selectByCode($letra){
   $con=new Conexion();     
   $query="SELECT c.idCita, c.fechaDeProgramacion, c.fechaDeCita,h.horas, u.nombres, e.nombreDeestado, u.codigo from `cita` as c
                inner join `usuario` as u
                on u.idUsuario=Usuario_idUsuario
                join `horarios` as h
                on c.Horarios_idHorarios1=h.idHorarios
                join `estadodecita` as e
                on c.EstadoDeCita_idEstadoDeCita1=e.idEstadoDeCita
                 where u.codigo like'%$letra%'";
   $result=$con->connection->query($query);
   return $result;     
} 
public function delete($idCita){
   $con=new Conexion();     
   $query="UPDATE `cita` set EstadoDeCita_idEstadoDeCita1='2' where idCita='$idCita';";
      $result=$con->connection->query($query);
   return $result;    
} 

}


?>