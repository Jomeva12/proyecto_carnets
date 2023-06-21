<?php
include('conexion.php');


$idcita=$_POST['idcita'];

$query="UPDATE `cita` set EstadoDeCita_idEstadoDeCita1='2' where idCita='$idcita';";
$result=mysqli_query($connection,$query);

if(!$result){
    die("Error");
}else{
  
    echo "Borrado";
}






?>