<?php
include('conexion.php');
 

  $query="SELECT*from `fechasrestriccion`";
  $result =mysqli_query($connection,$query);
  if(!$result){
      die("no pudo consultar");
  }
  $json=array(); 
       while($row=mysqli_fetch_array($result)){
            $json[]=array(
              'fecha'=>$row['fecha']
                         
               ); 
  
                }
           $jsonString=json_encode($json);
          echo $jsonString;
 

  



?>