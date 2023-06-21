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
 $json=array(); 
 while($row=mysqli_fetch_array($result)){
     $json[]=array(
       'id'=>$row['idUsuario']
        ); 
         }
    $jsonString=json_encode($json);
   echo $jsonString;
?>