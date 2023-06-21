<?php
include('conexion.php');

if(isset($_POST['rol'])){
    $rol=$_POST['rol'];
       $query="INSERT into `roll`(nombreRoll) values('$rol')";
      $resul =mysqli_query($connection,$query);

if(!$resul){
    die("no se guardo");
}
echo "Guardado";
 }

//  if(isset($_POST['actualizarRol'])){
//     $rol=$_POST['actualizarRol'];
//        $query="UPDATE usuario set Roll_idRoll='$rol' where idUsuario)";
//       $resul =mysqli_query($connection,$query);

// if(!$resul){
//     die("no se guardo");
// }
// echo"actualizado";
//  }
?>