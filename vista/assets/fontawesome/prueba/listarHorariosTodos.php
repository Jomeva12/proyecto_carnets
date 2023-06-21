<?php
include('conexion.php');
  
$query="SELECT * from `horarios`";
 $result =mysqli_query($connection,$query);

if(!$result){
    die("no se guardo");
}
$json=array(); 
    
        while($row=mysqli_fetch_array($result)){
          $json[]=array(
            'id'=>$row['idHorarios'],
            'horas'=>$row['horas']       
             ); 
              }
         $jsonString=json_encode($json);
        echo $jsonString;
 



?>