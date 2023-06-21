<?php
include('conexion.php');


  $query="SELECT*from `diassemana`";
  $result =mysqli_query($connection,$query);
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
 

  



?>