<?php
require('./config/conexion.php');

if(!isset($_SESSION)) 
{ 
	session_start(); 
} 

//session_start();
if (isset($_GET['cerrar_sesion'])) {
session_unset();
session_destroy(); 
header('location: ./index.php');
}
if (isset($_SESSION['rol'])) {
	switch($_SESSION['rol']){
	case 1:
		header('location: ./vista/UI/admin.php');
		break;
		case 2:
			header('location: ./vista/UI/usuariosGeneral.php');
			break;
			case 3:
				header('location: ./vista/UI/usuariosGeneral.php');
				break;
			case 5:
				header('location: ./vista/UI/admin.php');
			   break;
			case 6:
				header('location: ./vista/UI/asignarCitaAdmin.php');
				break;
			default:
	
	}
	
} 

if (isset($_POST['username']) && isset($_POST['clave'])) {
$user=$_POST['username'];
$clave=$_POST['clave'];
$con=new Conexion();
$result=$con->getUsers($user,$clave);

if(!$result){
    die("Error"); 
}else{
   $rowcount=mysqli_num_rows($result);
	if ($rowcount > 0){
		$register = $result->fetch_assoc();
		$rol=$register['Roll_idRoll'];
		$_SESSION['rol']=$rol;
		$_SESSION['idUsuario']=$register['idUsuario'];
		$_SESSION['nombre']=$register['nombres'];
		$_SESSION['codigo']=$register['codigo'];
		$_SESSION['clave']=$register['clave'];
		$_SESSION['foto']=$register['foto'];
// $idRol=new Roles();
// $r=$idRol->getNameRol($rol);
// if ($r) {
// 	$registerRol = $r->fetch_assoc();
// 	$_SESSION['rol']=$r['nombreRoll'];
// }
		switch($_SESSION['rol']){
			case 1:
				header('location: ./vista/UI/admin.php');
				header('location: ./vista/UI/asignarCitaAdmin.php');
				header('location: ./vista/UI/crearHorarioAdmin.php');
				header('location: ./vista/UI/crearRolAdmin.php');
				header('location: ./vista/UI/crearUsuarioAdmin.php');

				break;
				case 2:
					header('location: ./vista/UI/usuariosGeneral.php');
					break;
					case 3: 
						header('location: ./vista/UI/usuariosGeneral.php');
						break;
					case 5:
						header('location: ./vista/UI/admin.php');
						header('location: ./vista/UI/asignarCitaAdmin.php');
						header('location: ./vista/UI/crearHorarioAdmin.php');
						header('location: ./vista/UI/crearRolAdmin.php');
						header('location: ./vista/UI/crearUsuarioAdmin.php');
		
						break;
					case 6:
						header('location: ./vista/UI/asignarCitaAdmin.php');
					
						break;
					default:
			
			}
	
	}else{
		echo "el usuario no existe1 ".$rowcount." ".$user." ".$clave;
	}

}




}
?>



<!doctype html>
<html lang="es">

<head>
	<title>Carnets</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="./vista/assets/css/style.css">

</head>

<body>
	<section class="ftco-section back">
		<div class="container ">

			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4">¿Tienes una cuenta?</h3>
						<form action="#" class="login-form" method="POST">
							<div class="form-group">
								<input value="pedro" name="username" type="text" class="form-control rounded-left" placeholder="Usuario" required>
							</div>
							<div class="form-group d-flex">
								<input value="456" name="clave" type="password" class="form-control rounded-left" placeholder="Contraseña" required>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Recuerdame
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Olvidé mi contraseña</a>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5">Iniciar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="./vista/assets/assetJS/js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>