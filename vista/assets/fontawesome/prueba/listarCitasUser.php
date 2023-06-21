<?php
include('conexion.php');
//if(isset($_POST['rol'])){

  $id=$_POST['id'];
$query="SELECT c.idCita,c.fechaDeProgramacion, c.fechaDeCita,
h.horas,E.nombreDeestado from `cita` as c
inner join `horarios` as h
on h.idHorarios=c.Horarios_idHorarios1
inner join `estadodecita` as E
on E.idEstadoDeCita=c.EstadoDeCita_idEstadoDeCita1
where c.Usuario_idUsuario='$id'
order by c.fechaDeCita asc ";

 $result =mysqli_query($connection,$query);

if(!$result){
    die("no se guardo");
}
$json=array(); 
    
        while($row=mysqli_fetch_array($result)){
          $json[]=array(
            'hora'=>$row['horas'],
            'id'=>$row['idCita']   ,
            'fecha1'=>$row['fechaDeProgramacion']  ,
            'fecha2'=>$row['fechaDeCita']   ,  
            'estado'=>$row['nombreDeestado']   
             ); 
              }
         $jsonString=json_encode($json);
        echo $jsonString;
 
       //     }
?>