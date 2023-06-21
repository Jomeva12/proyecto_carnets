<?php
session_start();
$nombre=$_SESSION['nombre'];

if(!isset($_SESSION['rol'])){
    header('location: ../index.php');
         
}else{
    $foto=$_SESSION['foto'];
    $nombre=$_SESSION['nombre'];
    $codigo=$_SESSION['codigo'];
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
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">
               
                    <div class="mb-3 mx-auto tm-site-logo">
                    <img style="width:200px;height:200px;border-radius:100px; " src='<?php echo $foto;?>'>
                    
                </div>      
                  
            </div>
            <h3>Rol: <?php echo $_SESSION['rol'];?> </h3>  
            <nav class="tm-nav " id="tm-nav">            
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
                                        Consular mis citas
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
              
           
            <div class="row tm-row tm-mb-120">
                <div class="col-12">
                    <h2 class="tm-color-primary tm-post-title tm-mb-60">Programar cita</h2>
                </div>
                <div class="col-lg-7 tm-contact-left">
                    <form id="formCitas" class="mb-5 ml-auto mr-0 tm-contact-form">                        
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">  Nombre:</label>
                            <div class="col-sm-9">
                                <label for="name" class="col-form-label text-right tm-color-primary"><?php echo $nombre;?></label>
                           </div>
                        </div>
                        <input id="idUsuario" value="<?php echo $_SESSION['idUsuario'];?>" type="hidden">
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">  Código:</label>
                            <div class="col-sm-9">
                                <label for="name" class="col-form-label text-right tm-color-primary"><?php echo $codigo;?></label>
                           </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="subject" class="col-sm-3 col-form-label text-right tm-color-primary">Fecha</label>
                            <div class="col-sm-9">
                                <input id="fecha" class="form-control mr-0 ml-auto" type="date" >
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="subject" class="col-sm-3 col-form-label text-right tm-color-primary">Horario</label>
                            <div class="col-sm-9">
                                <select name="selectHorario" id="selectHorario" class="form-control mr-0 ml-auto" >
                                <option value="Seleccione" disabled selected>Seleccione Hora</option> </select> 
                            </div>
                        </div>
                        <div class="form-group row text-right">
                            <div class="col-12">
                                <button id="guardarCitaUser" class="tm-btn tm-btn-primary tm-btn-small">Asignar cita</button>                        
                            </div>                            
                        </div> 
                      
                                                   
                    </form>
                </div>
             
            </div>      
          
        </main>
    </div>
    <script src="../assets/assetJS/jquery.min.js"></script>
    <script src="../assets/js/funciones.js"></script>
    <script src="../assets/assetJS/templatemo-script.js"></script>
</body>
</html>