<?php 
include('conexion.php');
$fecha=$_POST['fecha'];
$query="SELECT h.horas, h.idHorarios from `horarios` as h
left join `cita` as c
on c.Horarios_idHorarios1=h.idHorarios and c.fechaDeCita='$fecha' and c.EstadoDeCita_idEstadoDeCita1<>2
where c.Horarios_idHorarios1 is null";
 $result =mysqli_query($connection,$query);

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
 



?>