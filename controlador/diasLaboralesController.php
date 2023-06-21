<?php
require('../model/diasLaborales.php');

if(isset($_POST['estado'])){
    $dia=$_POST['dia']; 
    $estado=$_POST['estado'];
    $diaLaboral=new DiasLaborales();
   $result=$diaLaboral->upDate($dia,$estado);

if(!$resul){
    die("no se actualizó");
}
echo "Guardado";
 
}
/*listar dia*/
if(isset($_POST['dias'])){
    
$dia = isset($_POST['dias'])? $_POST['dias'] : null;
 // $dsia=$_POST['dias'];
 $diaLaboral=new DiasLaborales();
$result=$diaLaboral->selectDia($dia);
 
  if(!$result){
      die("no pudo consultar");
  }
  $json=array(); 
       while($row=mysqli_fetch_array($result)){
            $json[]=array(
              'idDiasSemana'=>$row['idDiasSemana'],
              'nombreDia'=>$row['nombreDia'],
              'estado'=>$row['estado']            
               ); 
  
                }
           $jsonString=json_encode($json);
          echo $jsonString;
 }
/* listar todos dias laborales*/
if(isset($_POST['todo'])){
 
 $diaLaboral=new DiasLaborales();
$result=$diaLaboral->selectAll();

if(!$result){
      die("no pudo consultar");
  }
  $json=array(); 
       while($row=mysqli_fetch_array($result)){
            $json[]=array(
              'idDiasSemana'=>$row['idDiasSemana'],
              'nombreDia'=>$row['nombreDia'],
              'estado'=>$row['estado']            
               ); 
  
                }
           $jsonString=json_encode($json);
          echo $jsonString;
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