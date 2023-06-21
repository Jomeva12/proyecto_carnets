<?php
require('../model/citas.php');

if(isset($_POST['idUsuario'])){
    $idUsuario=$_POST['idUsuario'];
    $fechaDeCita=$_POST['fechaDeCita'];
    $Estado=$_POST['Estado'];
    $horas=$_POST['horas'];
    $cita=new Citas();
    $result=$cita->insert($idUsuario,$Estado,$horas,$fechaDeCita);
   
      

if(!$result){
    die("error");
}else{
    echo"Guardado";
}

 }
 /*si existe cita*/
 if(isset($_POST['idUsuarioExist'])){
 $idUsuarioExist=$_POST['idUsuarioExist'];
 $cita=new Citas();
$result=$cita->buscarSiExisteCita($idUsuarioExist);
 if(!$result){
  die("Error");     
}else{
 $rowcount=mysqli_num_rows($result);
if ($rowcount > 0){
  echo "Asignada";
}
}
}

if(isset($_POST['id'])){

    $cita=new Citas();
$result=$cita->selectAll();
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
}
if(isset($_POST['idUserLogin'])){
  $idUserLogin=$_POST['idUserLogin'];
  $cita=new Citas();
$result=$cita->selectAllByUser($idUserLogin);
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
}  
    
     


            if(isset($_POST['letra'])){
                $letra=$_POST['letra'];
                $cita=new Citas();
                $result=$cita->selectByCode($letra);
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
               
              }

 if(isset($_POST['idcita'])){           
   $idcita=$_POST['idcita'];
   $cita=new Citas();
   $result=$cita->delete($idcita);
if(!$result){
    die("Error");
}else{
  
    echo "Borrado";
}
 }



?>