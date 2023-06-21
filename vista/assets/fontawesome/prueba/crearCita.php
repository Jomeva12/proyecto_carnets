<?php
include('conexion.php');

if(isset($_POST['idUsuario'])){
    $idUsuario=$_POST['idUsuario'];
    $fechaDeCita=$_POST['fechaDeCita'];
    $Estado=$_POST['Estado'];
    $horas=$_POST['horas'];

   
       $query="INSERT into `cita`(fechaDeProgramacion,Usuario_idUsuario,EstadoDeCita_idEstadoDeCita1,Horarios_idHorarios1,fechaDeCita) 
       values(Now(),'$idUsuario','$Estado','$horas','$fechaDeCita')";
      $resul =mysqli_query($connection,$query);

if(!$resul){
    die("error");
}else{
    echo"Guardado";
}

 }

?>