<?php
include('conexion.php');

if(isset($_POST['fecha'])){
    $fecha=$_POST['fecha'];
       $query="INSERT into `fechasrestriccion`(fecha) values('$fecha');";
      $resul =mysqli_query($connection,$query);

if(!$resul){
    die("no se guardo");
}
echo"Guardado";
 }

?> 