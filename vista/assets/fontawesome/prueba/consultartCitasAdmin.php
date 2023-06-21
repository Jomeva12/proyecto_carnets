<?php
include('conexion.php');
if(isset($_POST['id'])){
$query="SELECT c.idCita, c.fechaDeProgramacion, c.fechaDeCita,h.horas, u.nombres, e.nombreDeestado, u.codigo from `cita` as c
inner join `usuario` as u
on u.idUsuario=Usuario_idUsuario
join `horarios` as h
on c.Horarios_idHorarios1=h.idHorarios
join `estadodecita` as e
on c.EstadoDeCita_idEstadoDeCita1=e.idEstadoDeCita";
}else if(isset($_POST['letra'])){
  $letra=$_POST['letra'];
  $query="SELECT c.idCita, c.fechaDeProgramacion, c.fechaDeCita,h.horas, u.nombres, e.nombreDeestado, u.codigo from `cita` as c
  inner join `usuario` as u
  on u.idUsuario=Usuario_idUsuario
  join `horarios` as h
  on c.Horarios_idHorarios1=h.idHorarios
  join `estadodecita` as e
  on c.EstadoDeCita_idEstadoDeCita1=e.idEstadoDeCita
   where u.codigo like'%$letra%'";
}
 $result =mysqli_query($connection,$query);

if(!$result){
    die("Error");
}
$json=array(); 
    
        while($row=mysqli_fetch_array($result)){
          $json[]=array(
            'idCita'=>$row['idCita'],
            'fechaDeProgramacion'=>$row['fechaDeProgramacion']   ,
            'fechaDeCita'=>$row['fechaDeCita']  ,
            'nombres'=>$row['nombres'] ,  
            'hora'=>$row['horas'] , 
            'codigo'=>$row['codigo'] , 
            'nombreDeestado'=>$row['nombreDeestado']   
             ); 
              }
         $jsonString=json_encode($json);
        echo $jsonString;
 
       //     }
?>