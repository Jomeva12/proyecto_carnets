<?php
include('conexion.php');

if(isset($_POST['hora'])){
    $hora=$_POST['hora'];
       $query="INSERT into `horarios`(horas) values('$hora');";
      $resul =mysqli_query($connection,$query);

if(!$resul){
    die("no se guardo");
}
echo"Guardado";
 }

?> 