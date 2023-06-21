<?php
require('../model/restricciones.php');
/*crearRestriccion */
if(isset($_POST['fechaCrear'])){
  $fecha=$_POST['fechaCrear'];
  $restriccion=new Restricciones();
$result=$restriccion->insert($fecha);

if(!$result){
  die("no se guardo");
}
echo"Guardado";
}

/*listar */
if(isset($_POST['nada'])){
  $restriccion=new Restricciones();
  $result=$restriccion->selectAll();
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
 }
            /*Eliminar restriccion*/
    if(isset($_POST['fecha'])){
              $fecha=$_POST['fecha'];
              $restriccion=new Restricciones();
              $result=$restriccion-> delete($fecha);
              if(!$result){
                die("Error"); 
              }else{
              
                echo "Borrada";
              
              }
      }
      if(isset($_POST['fechaSeleccionada'])){
        $restriccion=new Restricciones();
        $result=$restriccion-> restriccionByFecha();
      
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
              }
?>