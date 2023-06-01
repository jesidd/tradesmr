<?php

	include_once '../../controlador/action/act_listartodo.php';
    session_start();

	obtenerTodo();

    if(!isset($_SESSION['NOMBRE_USUARIO']) || $_SESSION['rol']==3){
        echo 'No tienes permisos para entrar';
        session_destroy();
        die();
    }

	

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/admin.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<link rel="icon" type="favicon" href="img/favicon.ico">
	<link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="./js/relacionSelect.js"></script>
	<script src="./js/getfoto.js"></script>
	<title>Plataforma</title>
</head>
<body>

	<div class="wrapper">
		<div class="navbar">
			<div class="logo">
				<a href="admin.html">DASHBOARD ADMIN</a>
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
	
	<header id="header">
        <h1>AÑADIR PRODUCTOS</h1>
    </header>

    <main>
        <div class="contenedor">
            <!-- Añadir -->
            <div class="añadir">
                <h2>Añadir</h2>
                <form action="../../controlador/action/act_addproduct.php" method="POST">
                	<label>Codigo del producto</label>
                    <input type="text" id="codeProducto" name="codeDelProducto">

					<label>Categoria del producto</label>
                    <select id="categoriaProducto"  name="categoriaDelProducto">
						<option value="" disabled selected hidden></option>
						<?php echo listarCategoria();?>
                    </select>

                    <label>Nombre del producto</label>
                    <input type="text" id="productoAñadir" name="nombreDelProducto">

                    <label>$ Valor del producto</label>
                    <input type="number" id="valorAñadir" name="precio">

                    <label>Existencia</label>
                    <input type="number" id="existenciaAñadir" name="cantidad">

                    <input class="button" type="submit" id="botonAñadir" value="Añadir">
                </form>
            </div>
			
            <!-- Editar -->
            <div class="editar">
                <h2>Editar</h2>
                <form action="../../controlador/action/act_editProduct.php" method="post">
                	<label>Codigo del producto</label>
                    <select id="codigoEditar" onchange="buscarCategoria()" name="codigop">
						<option value="" disabled selected hidden></option>
						<?php echo listarId();?>
                    </select>

                    <label>Nombre del producto</label>
                    <input type="text" id="productoEditar" name="nombrep">

                    <label>Categoria del producto</label>
                    <select id="categoriaProductoEditar" name="categoria">
						<option value="" disabled selected hidden></option>
						<?php echo listarCategoria();?>
                    </select>

                    <label>$ Nuevo valor</label>
                    <input type="text" id="nuevoAtributo" name="precio">

                    <label>Nueva Existencia</label>
                    <input type="number" id="existenciaEditar" name="existencia">

                    <input class="button" type="submit" id="botonEditar" value="Editar">
                </form>
            </div>

            <!-- Eliminar -->

            <div class="eliminar">
                <h2>Eliminar</h2>

                <form action="../../controlador/action/act_deleteproduct.php" method="POST">
                	<label>Codigo del producto</label>
                    <select id="codeEliminar" onchange="seleccionarOpcion()" name="idp">
						<option value="" disabled selected hidden></option>
						<?php echo listarId();?>
                    </select>

                    <label>Nombre del producto</label>
                    <select id="productoEliminar" onchange="seleccionarOpcion2()" name="nombrep">
						<option value="" disabled selected hidden></option>
						<?php echo listarNombre();?>
                    </select>
                    <input class="button" type="submit" id="botonEliminar" value="Eliminar">
                </form>
            </div>
        </div>

        <!-- Mostrar el mensaje -->
        <div class="contenedorMensaje">
            <div id="mensaje"></div>
        </div>

       


   
	<script>
		var dd_main = document.querySelector(".dd_main");

		dd_main.addEventListener("click", function(){
			this.classList.toggle("active");
		})
	</script>

	<?php
		if(isset($_SESSION['add'])){
			$msg = $_SESSION['add'];
			$icon = 'success';
			$time = 3000;
		}else{
			if(isset($_SESSION['fail'])){
				$msg = $_SESSION['fail'];
				$icon = 'error';
				$time = 4000;
			}else{
				if(isset($_SESSION['msg'])){
					$msg = $_SESSION['msg'];
					$icon = 'success';
					$time = 2500;
				}else{
					if(isset($_SESSION['error'])){
						$msg = $_SESSION['error'];
						$icon = 'error';
						$time = 2600;
					}
				}
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
		unset($_SESSION['add']);
		unset($_SESSION['fail']);
		unset($_SESSION['msg']);
		unset($_SESSION['error']);
	?>
</body>
</html>