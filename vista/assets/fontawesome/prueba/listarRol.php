<?php
include('conexion.php');
  
$query="SELECT * from `roll`";
 $result =mysqli_query($connection,$query);

if(!$result){
    die("no se guardo");
}
$json=array(); 
    
        while($row=mysqli_fetch_array($result)){
          $json[]=array(
            'rol'=>$row['nombreRoll'],
            'id'=>$row['idRoll']       
             ); 
              }
         $jsonString=json_encode($json);
        echo $jsonString;
 



?>