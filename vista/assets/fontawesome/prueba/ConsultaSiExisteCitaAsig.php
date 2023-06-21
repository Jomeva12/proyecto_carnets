<?php
include('conexion.php');
$idUsuario=$_POST['idUsuario'];
$query="SELECT*from `cita` where Usuario_idUsuario='$idUsuario' and EstadoDeCita_idEstadoDeCita1='1';";
 $result =mysqli_query($connection,$query);

 if(!$result){
  die("Error"); 
}else{
 $rowcount=mysqli_num_rows($result);
if ($rowcount > 0){
  echo "Asignada";
}
}
?>