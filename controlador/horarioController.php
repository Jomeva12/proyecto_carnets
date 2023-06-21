<?php
require('../model/horarios.php');

if(isset($_POST['horarioVacio'])){
$horario=new Horarios();
$result=$horario->selectAll();
   if(!$result){
    die("no se listó");
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
           }
/*CrearHorario */
        if(isset($_POST['hora'])){
            $hora=$_POST['hora'];
            $horario=new Horarios();
            $result=$horario->insert($hora);
          if(!$result){
            die("no se guardo");
           }

               
        echo"Guardado";
         }
      if(isset($_POST['fecha'])){
         $fecha=$_POST['fecha'];
         $horario=new Horarios();
         $result=$horario->selectByFecha($fecha);

if(!$result){
    die("no se guardo");
}
$json=array(); 
    
        while($row=mysqli_fetch_array($result)){
          $json[]=array(
            'horas'=>$row['horas'],
            'id'=>$row['idHorarios']       
             ); 
              }
         $jsonString=json_encode($json);
        echo $jsonString;
            }
?>