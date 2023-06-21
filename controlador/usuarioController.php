<?php
 
 require('../model/usuarios.php');
 /*listar usuario*/
 if(isset($_POST['codigoBuscar'])){
   $codigo=$_POST['codigoBuscar'];
   $usuario=new Usuarios();
 $user=$usuario->selectByUser($codigo);
 if(!$user){
   die("no pudo consultar");
}
$json=array(); 
   
       while($row=mysqli_fetch_array($user)){
         $json[]=array(
           'nombre'=>$row['nombres'],
           'codigo'=>$row['codigo'],
           'id'=>$row['idUsuario']       
            ); 
             }
        $jsonString=json_encode($json);
       echo $jsonString;
 }
 /*listar all user*/ 
 if (isset($_POST['listarAllUser'])) {
 $usuario=new Usuarios();
 $user=$usuario->selectAll();
if(!$user){ 
    die("no se guardo");
 }else{
    $json=array(); 
    
    while($row=mysqli_fetch_array($user)){
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
 
         }
      }
 /*Crer Usuario*/
 if (isset($_POST['codigo'])) {
   # code...

$imagen=$_FILES['imagen'];
$nombre=$_POST['nombre'];
$codigo=$_POST['codigo'];
$clave=$_POST['clave'];
$rol=$_POST['selectRol'];
if(($_FILES["imagen"]["type"] == "image/gif")
|| ($_FILES["imagen"]["type"] == "image/jpeg")
|| ($_FILES["imagen"]["type"] == "image/jpg")
|| ($_FILES["imagen"]["type"] == "image/png")){

$nombreTemporal= $imagen["tmp_name"] ;
$rutaTemp="assets/fotos/".md5($nombreTemporal).".jpg";
$rutaBD="../".$rutaTemp;
$ruta="../vista/".$rutaTemp;
$usuario=new Usuarios();
 $result=$usuario->insert($nombre,$codigo,$rutaBD,$clave,$rol);

if(!$result){
   echo "error";
}else{  
   move_uploaded_file ($nombreTemporal ,  $ruta );
   echo "Guardado";
}

}else{
   echo "seleccione una imagen correcta";
}

 }
 /*editar Usuario*/
 if (isset($_POST['codigoEditar'])) {
   

$imagen=$_FILES['imageneditar'];
$nombre=$_POST['nombreEditar'];
$codigo=$_POST['codigoEditar'];
$clave=$_POST['claveEditar'];
$idUsuario=$_POST['idUsuario'];
if(($_FILES["imageneditar"]["type"] == "image/gif")
|| ($_FILES["imageneditar"]["type"] == "image/jpeg")
|| ($_FILES["imageneditar"]["type"] == "image/jpg")
|| ($_FILES["imageneditar"]["type"] == "image/png")){

$nombreTemporal= $imagen["tmp_name"] ;
$rutaTemp="assets/fotos/".md5($nombreTemporal).".jpg";
$rutaBD="../".$rutaTemp;
$ruta="../vista/".$rutaTemp;
$usuario=new Usuarios();
 $result=$usuario->upDate($nombre,$codigo,$rutaBD,$clave,$idUsuario);

if(!$result){
   echo "error";
}else{  
   move_uploaded_file ($nombreTemporal ,  $ruta );
   echo "editado";
}

}else{
   echo "seleccione una imagen correcta";
}

 }
?>