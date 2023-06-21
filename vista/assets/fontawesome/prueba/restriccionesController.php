<?php
include('conexion.php');


    $dia=$_POST['dia'];
    $estado=$_POST['estado'];
       $query="UPDATE `diassemana` set estado='$estado' where idDiasSemana='$dia'";
      $resul =mysqli_query($connection,$query);

if(!$resul){
    die("no se guardo");
}
echo "Guardado";
 

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