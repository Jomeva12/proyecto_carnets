<?php
include('conexion.php');
$fecha=$_POST['fecha'];
$query="DELETE from `fechasRestriccion` where fecha='$fecha'";
 $result =mysqli_query($connection,$query);

 if(!$result){
  die("Error"); 
}else{

  echo "Borrada";

}
?>