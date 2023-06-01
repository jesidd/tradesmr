<?php

    session_start();

    if(!isset($_SESSION['NOMBRE_USUARIO'])){
        echo 'debes iniciar seccion';
        session_destroy();
        die();
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/styles2.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel="icon" type="favicon" href="img/favicon.ico">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="./js/relacionSelect.js"></script>
	<script src="./js/getfoto.js"></script>
	<title>Usuario-informacion</title>
</head>
<body>

	<div class="wrapper">
		<div class="navbar">
			<div class="logo">
				<a href="#">Información de usuario</a>
			</div>
			<div class="nav_right">
				<ul>
					<li class="nr_li">
						<a href="../inicio.php" class="home-icon"><i class="fas fa-home"></i></a>
					</li>
					
					<li class="nr_li dd_main">
						<img src="../img/profileimg.png" id="profile-img" alt="profile_img">
						
						<div class="dd_menu">
							<div class="dd_left">
								<ul>
									<li><i class="fa fa-user"></i></li>
									<li><i class="fa fa-th-large rol_1"></i></li>
									<li><i class="fa fa-pen"></i></li>
									<li><i class="fa fa-heart"></i></li>
									<li><i class="fa fa-store"></i></li>
									<li><i class="fas fa-envelope-open-text"></i></li>
									<li><i class="fa fa-question"></i></li>
									<li><i class="fas fa-cog"></i></li>
									<li><i class="fas fa-sign-out-alt"></i></li>
								</ul>
							</div>
							<div class="dd_right">
								<ul>
									<li><?php echo $_SESSION['NOMBRE_USUARIO']?></li>
									<li class="rol_1"><a href="admin.php">Plataforma</a></li>
									<li><a href="modificar.php">Ver pefil</a></li>
									<li><a href="">Mis favoritos</a></li>
									<li><a href="">Mis compras</a></li>
									<li><a href="">Mis mensajes</a></li>
									<li><a href="">Ayuda</a></li>
									<li><a href="">Configuración</a></li>
									<li><a href="../../controlador/action/act_logout.php">Cerrar sesión</a></li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>	
	<div class="container">
		<h2>Editar datos</h2>
		<form method="POST" action="../../controlador/action/act_modificar.php" id="myForm" enctype="multipart/form-data"> 
			<div class="form-group">
					<label for="fperfil" class="fperfil">Foto de perfil</label>
					<input type="file" name="imgprofile" class="fperfil">
				</div>
			<div class="form-group">
			    <label for="username">Nombre de usuario:</label>
			    <input type="text" class="form-control" id="username" value="" name="usuario" placeholder="Ingrese su nombre de usuario" required>
			    </div>
			    <div class="form-group">
			      <label for="email">Correo electrónico:</label>
			      <input type="email" class="form-control" id="email" value="" name="correo" placeholder="Ingrese su correo electrónico" required>
			    </div>
			    <div class="form-group">
			      <label for="password">Contraseña:</label>
			      <input type="password" class="form-control" id="password" value="" name="password" placeholder="Ingrese su contraseña" required>
			    </div>
			    <div class="form-group">
			      <label for="confirm-password">Confirmar contraseña:</label>
			      <input type="password" class="form-control" id="confirm-password" value="" name="password2" placeholder="Confirme su contraseña" required>
			    </div>
			    <button type="submit" class="btn btn-primary">Actualizar datos</button>
			    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal"><a href="eliminar.php">Eliminar cuenta</a></button>
			</div>    
		</form>
	</div>		
	<script>
		var dd_main = document.querySelector(".dd_main");

		dd_main.addEventListener("click", function(){
			this.classList.toggle("active");
		})
	</script>
	<script src="./js/main.js"></script>

	<?php
		if(isset($_SESSION['login'])){
			$msg = $_SESSION['login'];
			$icon = 'success';
			$time = 3000;
		}else{
			if(isset($_SESSION['error'])){
				$msg = $_SESSION['error'];
				$icon = 'error';
				$time = 4000;
			}
		}
	?>

		<script>
				Swal.fire({
					position: 'center-center',
					icon: '<?php echo $icon ?>',
					title: '<?php echo $msg ?>',
					showConfirmButton: false,
					timer: <?php echo $time ?>
				})
		</script>

	<?php
		unset($_SESSION['login']);
		unset($_SESSION['error']);
	?>
</body>
</html>