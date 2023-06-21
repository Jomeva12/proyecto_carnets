<?php
include('conexion.php'); 

$query="SELECT r.nombreRoll,u.idUsuario,u.nombres,u.codigo, u.foto from `usuario` as u
join `roll` as r
on r.idRoll=u.Roll_idRoll
order by u.idUsuario asc";
 $result =mysqli_query($connection,$query);

if(!$result){
    die("no pudo consultar");
}
$json=array(); 
    
        while($row=mysqli_fetch_array($result)){
          $json[]=array(
            'id'=>$row['idUsuario'],
            'nombre'=>$row['nombres'],
            'codigo'=>$row['codigo'],
            'rol'=>$row['nombreRoll'],   
            'foto'=>$row['foto']  
             ); 

              }
         $jsonString=json_encode($json);
        echo $jsonString;
 



?>