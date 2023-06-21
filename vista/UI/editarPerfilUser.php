<?php
session_start();
if(!isset($_SESSION['rol'])){
    header('location: ../index.php');
         
}else{
    $foto=$_SESSION['foto'];
    $rol=$_SESSION['rol'];
    if($rol!=2 && $rol!=3 ){
         header('location: ../index.php');
 echo "No";
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
                    <img style="width:200px;height:200px;border-radius:100px; " src="<?php echo $foto;?>">
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
                                        Consular mis citas
                                    </a></li>
                                    
                                    <li class="tm-nav-item"><a href="../../index.php?cerrar_sesion=1" class="tm-nav-link">
                                    <i class="fas fa-sign-out-alt"></i>                                   Logout
                                    </a></li>
                                  
                                </ul>
                            </nav>
            
           
        </div>
    </header>
    <div class="container-fluid">
        <main class="tm-main">
                                
            <div class="row tm-row tm-mb-120">
                <div class="col-12">
                    <h2 class="tm-color-primary tm-post-title tm-mb-60">Editar Perfil</h2>
                </div> 
                <div class="col-lg-7 tm-contact-left">
                    <form id="formulario" enctype="multipart/form-data" class="mb-5 ml-auto mr-0 tm-contact-form">                        
                        <div class="form-group row mb-4">
                            <label for="name" class="col-sm-3 col-form-label text-right tm-color-primary">Nombre</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" value="<?php echo $_SESSION['nombre'];?>" name="nombreEditar" id="nombre" type="text" required>                            
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="text" class="col-sm-3 col-form-label text-right tm-color-primary">Código</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" value="<?php echo $_SESSION['codigo'];?>" name="codigoEditar" id="codigo" type="number" required>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="subject" class="col-sm-3 col-form-label text-right tm-color-primary">Clave</label>
                            <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" value="<?php echo $_SESSION['clave'];?>"name="claveEditar"  id="clave" type="text" required>
                            </div>
                        </div>
                        <input name="idUsuario" value="<?php echo $_SESSION['idUsuario'];?>" type="hidden">

                        <div class="form-group row mb-4">
                            <label for="subject" class="col-sm-3 col-form-label text-right tm-color-primary">Foto</label>
                             <div class="col-sm-9">
                                <input class="form-control mr-0 ml-auto" name="imageneditar" id="imagen" type="file" >
                            </div>
                        </div>
                        <div style="border: 3 solid #0CC;text-align: center;"> <img id="previsualizar" src="" alt="" 
                            style="height: 100px; width: 100px; "></div>
                        
                        <div class="form-group row text-right">
                            <div class="col-12">
                                <button id="guardarUsuarioEdit" class="tm-btn tm-btn-primary tm-btn-small">Guardar</button>                        
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