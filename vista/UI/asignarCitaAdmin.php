<?php
session_start();
$nombre=$_SESSION['nombre'];

if(!isset($_SESSION['rol'])){
    header('location: ../index.php');
         
}else{
    $foto=$_SESSION['foto'];
    $rol=$_SESSION['rol'];
    if($rol!=1 && $rol!=5 ){
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
<!--
    
TemplateMo 553 Xtra Blog

https://templatemo.com/tm-553-xtra-blog

-->
</head>
<body>
<header class="tm-header" id="tm-header">
        <div class="tm-header-wrapper">
            <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="tm-site-header">                
                <div class="mb-3 mx-auto tm-site-logo">
                    <img style="width:200px;height:200px;border-radius:100px; " src="<?php echo $foto;?>">
                </div>            
              </div>
              <nav class="tm-nav" id="tm-nav">            
                                <ul>
                                    <li class="tm-nav-item "><a href="crearUsuarioAdmin.php" class="tm-nav-link">
                                        <i class="fas fa-user-plus"></i>
                                        Crear Usuario
                                    </a></li>
                                    <li class="tm-nav-item"><a href="listarUsuariosAdmin.php" class="tm-nav-link">
                                    <i class="fas fa-users"></i>
                                       Listar Usuarios
                                    </a></li>
                                    <li class="tm-nav-item "><a href="crearRolAdmin.php" class="tm-nav-link">
                                        <i class="fas fa-address-book"></i>
                                        Crear Rol
                                    </a></li>
                                    <li class="tm-nav-item"><a href="crearHorarioAdmin.php" class="tm-nav-link">
                                        <i class="fas fa-clock"></i>
                                        Administrar Horario
                                    </a></li>
                                    <li class="tm-nav-item"><a href="asignarCitaAdmin.php" class="tm-nav-link">
                                    <i class="far fa-calendar-alt"></i>
                                    Asignar cita
                                    </a></li>
                                    <li class="tm-nav-item"><a href="adminConsultaCitas.php" class="tm-nav-link">
                                    <i class="fas fa-list"></i>                                      
                                    </i>Listar citas
                                    </a></li>
                                    <li class="tm-nav-item"><a href="../../index.php?cerrar_sesion=1" class="tm-nav-link">
                                    <i class="fas fa-sign-out-alt"></i>                                       Logout
                                    </a></li>
                                   </ul>
                            </nav>
            
           
        </div>
</header>
    <div class="container-fluid">
        <main class="tm-main">
            <div class="row tm-row">
                <div class="col-12">
                    <form  class="form-inline tm-mb-80 tm-search-form">                
                        <input id="txtShearch" class="form-control tm-search-input" name="query" type="text" placeholder="Digíte código" aria-label="Search">
                        <button id="btnConsultaCodigo" class="tm-search-button" >
                            <i class="fas fa-search tm-search-icon" aria-hidden="true"></i>
                        </button>                                
                    </form>
                </div>                
            </div> 
           
            <div id="bloqueAsignarCita" class="row tm-row tm-mb-120">
                <div class="col-12">
                    <h2 class="tm-color-primary tm-post-title tm-mb-60">Programar cita</h2>
                </div>
                

                <div class="col-lg-7 tm-contact-left">
                    <form id="formCitas" class="mb-5 ml-auto mr-0 tm-contact-form">                        
                    <input id="idUsuario" type="hidden">    
                    <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">  Nombre:</label>
                            <div class="col-sm-9">
                                <label id="nombre" for="name" class="col-form-label text-right tm-color-primary"></label>
                                                   </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="subject" class="col-sm-3 col-form-label text-right tm-color-primary">Fecha</label>
                            <div class="col-sm-9">
                                <input id="fecha" class="form-control mr-0 ml-auto" type="date"required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> >
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
                                <button id="guardarCita" class="tm-btn tm-btn-primary tm-btn-small">Asignar cita</button>                        
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