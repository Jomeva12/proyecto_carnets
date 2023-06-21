<?php
include('conexion.php');
$dia = isset($_POST['dias'])? $_POST['dias'] : null;
  $dsia=$_POST['dias'];
 
  $query="SELECT *from `diassemana` where nombreDia='$dia'";
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