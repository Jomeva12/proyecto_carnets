<?php
 require('../model/roles.php');
$rol=new Roles();
 $result=$rol->selectAll();
 if(!$result){
    die("no trajo");
}
$json=array(); 
    
        while($row=mysqli_fetch_array($result)){
          $json[]=array(
            'rol'=>$row['nombreRoll'],
            'id'=>$row['idRoll']       
             ); 
              }
         $jsonString=json_encode($json);
        echo $jsonString;
/*Crear rol */
        if (isset($_POST['rol'])) {
          $rolNew=$_POST['rol'];
          $rol=new Roles();
          $result=$rol->insert($rolNew);
          if(!$result){
            die("no se guardo");
        }
        echo "Guardado";
         }
 
         
        

?>