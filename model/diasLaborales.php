<?php
require('../config/conexion.php');
 class DiasLaborales{
   
 public function selectAll(){
   $con=new Conexion();     
   $query="SELECT*from `diassemana`";
   $result=$con->connection->query($query);
   return $result; 

   
 }
 public function selectDia($dia){
  $con=new Conexion();     
  $query="SELECT *from `diassemana` where nombreDia='$dia'";
  $result=$con->connection->query($query);
  return $result; 

  
}
 public function upDate($dia,$estado){
   $con=new Conexion();     
   $query="UPDATE `diassemana` set estado='$estado' where idDiasSemana='$dia'";
   $result=$con->connection->query($query);
   return $result; 
  
 }


  


}


?>