<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: ../index.php');
        
}else{
    $foto=$_SESSION['foto'];
    $rol=$_SESSION['rol'];
      if($rol!=2 && $rol!=3 ){
        header('location: ../index.php');
     }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cita Carnet</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<link rel="stylesheet" href="../assets/fontawesome/css/all.min.css"> <!-- https://fontawesome.com/ -->
	<link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet"> <!-- https://fonts.google.com/ -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/templatemo-xtra-blog.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper usuarioGral">
            <button class="navbar-toggler " type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
               
                    <div class="mb-3 mx-auto tm-site-logo">
                    <img style="width:200px;height:200px;border-radius:100px; " src='<?php echo $foto;?>'>
                </div>            
            </div>
            <nav class="tm-nav" id="tm-nav">            
                                <ul>
                                    <li class="tm-nav-item "><a href="./asignarCitaUsers.php" class="tm-nav-link">
                                    <i class="fas fa-address-book"></i>
                                       Asignar cita
                                    </a></li>
                                    <li class="tm-nav-item "><a href="./editarPerfilUser.php" class="tm-nav-link">
                                    <i class="fas fa-user-edit"></i>    
                                        Actualizar perfil
                                    </a></li>
                                    <li class="tm-nav-item"><a href="./usuariosConsultaCitas.php?id=<?php echo $_SESSION['idUsuario'];?>" class="tm-nav-link">
                                    <i class="fas fa-book-open"></i>
                                        Consultar mis citas
                                    </a></li>
                                    
                                    <li class="tm-nav-item"><a href="../../index.php?cerrar_sesion=1" class="tm-nav-link">
                                    <i class="fas fa-sign-out-alt"></i>                                     Logout
                                    </a></li>
                                  
                                </ul>
                            </nav>
           
       
       
      
                        </div>
</header>
    
    <div class="container-fluid">

        <main class="tm-main">
       <h1><?php echo $_SESSION['nombre'];?></h1>
       <input id="idUsuario" value="<?php echo $_SESSION['idUsuario'];?>" type="hidden">

          <table class="table table-sm">          
    <thead>
    <tr>
      <th scope="col">Id cita</th>
      <th scope="col">Fecha de programación</th>
      <th scope="col">Fecha de cita</th>
      <th scope="col">Horario</th>
      <th scope="col">Estado de cita</th>
      <th scope="col">Opciones</th>
    </tr>
  </thead>
  <tbody id="tablacitas">
    
  </tbody>
</table>
        </main>
    </div>
    
    </div>
   
    <script src="../assets/assetJS/jquery.min.js"></script>
    <script src="../assets/js/funciones.js"></script>
    <script src="../assets/assetJS/templatemo-script.js"></script>
</body>
</html>