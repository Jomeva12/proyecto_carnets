<?php
include('conexion.php');

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

$ruta="../fotos/".md5($nombreTemporal).".jpg";
$query="INSERT into `usuario`(nombres,codigo,foto,clave,fechaDeRegistro,Roll_idRoll) 
values('$nombre','$codigo','$ruta','$clave',Now(),'$rol')";
$result=mysqli_query($connection,$query);

if(!$result){
    die("Error");
}else{
   // move_uploaded_file( $nombreTemporal,$ruta);
    //move_uploaded_file($nombreTemporal,$ruta.$nombreTemporal);
    move_uploaded_file ($nombreTemporal ,  $ruta );
    echo "Guardado";
}


}else{
    echo "seleccione una imagen correcta";
}



?>