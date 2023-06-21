<?php
include('conexion.php');
$codigo=$_POST['codigo'];
$query="SELECT *from `usuario` where codigo='$codigo'";
 $result =mysqli_query($connection,$query);

if(!$result){
    die("no pudo consultar");
}
$json=array(); 
    
        while($row=mysqli_fetch_array($result)){
          $json[]=array(
            'nombre'=>$row['nombres'],
            'codigo'=>$row['codigo'],
            'id'=>$row['idUsuario']       
             ); 
              }
         $jsonString=json_encode($json);
        echo $jsonString;
 



?>