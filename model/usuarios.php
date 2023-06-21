<?php
require('../config/conexion.php');
 class Usuarios {
    private $idUsuario;
    private $nombre;
    private $codigo;
    private $foto;
    private $clave;
    private $fechaDeRegistro;

    private $rollIdRoll; 
    public function __construct(){
       

        
            }
public function insert($nombre,$codigo,$ruta,$clave,$rol){

    $con=new Conexion();  
    $query="INSERT into `usuario`(nombres,codigo,foto,clave,fechaDeRegistro,Roll_idRoll) 
    values('$nombre','$codigo','$ruta','$clave',Now(),'$rol')";
      $result=$con->connection->query($query);
       return $result;    
        
}
public function update($nombre,$codigo,$ruta,$clave,$idUsuario){
  $con=new Conexion();  
  $query="UPDATE `usuario` set nombres='$nombre', codigo='$codigo', clave='$clave', foto='$ruta'  where idUsuario='$idUsuario'";
       $result=$con->connection->query($query);
       return $result;  

}
public function selectAll(){
    $con=new Conexion();  
    $query="SELECT r.nombreRoll,u.idUsuario,u.nombres,u.codigo, u.foto from `usuario` as u
        join `roll` as r
        on r.idRoll=u.Roll_idRoll
        order by u.idUsuario asc";
    $result=$con->connection->query($query);
       return $result;
    
} 
public function selectByUser($codigo){
  $con=new Conexion();  
  $query="SELECT *from `usuario` where codigo='$codigo'";
  $result=$con->connection->query($query);
     return $result;
    

}





 }

?>