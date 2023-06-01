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
	<link href="css/styles.css" rel="stylesheet" type="text/css">
	<link href="css/categorias.css" rel="stylesheet" type="text/css">
	<link rel="icon" type="favicon" href="img/favicon.ico">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="./js/getfoto.js"></script>
	<title>Categorias</title>
</head>
<body>

	<div class="wrapper">
		<div class="navbar">
			<div class="logo">
				<a href="../../vista/inicio.php"> <img src="../img/logo.png"></a>
			</div>
			<div class="nav_right">
				<ul>
					<ul class="opcionmenu">
					<li><a href="../../vista/inicio.php">INICIO</a></li>
					<li><a href="#">OFERTAS</a></li>
					<li class="rol_1"><a href="#">VENDER</a></li>
					<li><a class="active" href="categorias.php">CATEGORIAS</a></li>
					<li><a href="#">TODO</a></li>
					</ul>
					
					<li class="nr_li">
						<i class="fa fa-search"></i>
					</li>
					
					<li class="nr_li dd_main">
						<img src="../img/profileimg.png" id="profile-img" alt="profile_img">
						
						<div class="dd_menu">
							<div class="dd_left">
								<ul>
									<li><i class="fa fa-user"></i></li>
									<li><i class="fa fa-th-large rol_1"></i></li>
									<li><i  class="fa fa-pen"></i></li>
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
									<li><?php echo $_SESSION['NOMBRE_USUARIO'];?></li>
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

	<section class="hero">
		<div class="banner-contain">
			<a href="#OFERTAS">Comprar</a>
		</div>
	</section>

	<section class="categorias">
		<div class="container">

    	<h1 class="heading">CATEGORIAS</h1>

		    <div class="box-container">

		        <div class="box">
			    <img src="https://img.icons8.com/ios-filled/100/000000/jewelry.png"/>
		            <h3>JOYAS</h3>
		            <a href="./categorias/joyas.php" class="btn">Ver más</a>
		        </div>

		        <div class="box">
		            <img src="https://img.icons8.com/ios-filled/100/null/sneakers.png"/>
		            <h3>ZAPATOS</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>

		        <div class="box">
		            <img src="https://img.icons8.com/glyph-neue/100/null/user-female.png"/>
		            <h3>DAMAS</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>

		        <div class="box">
		            <img src="https://img.icons8.com/ios-filled/100/null/user-male--v1.png"/>
		            <h3>CABALLEROS</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>

		        <div class="box">
		            <img src="https://img.icons8.com/ios-filled/100/null/baby-feet.png"/>
		            <h3>BEBÉS</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>

		        <div class="box">
		            <img src="https://img.icons8.com/external-vitaliy-gorbachev-fill-vitaly-gorbachev/100/null/external-bikini-summer-vitaliy-gorbachev-fill-vitaly-gorbachev.png"/>
		            <h3>BIKINIS</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>
			    <div class="box">
		            <img src="https://img.icons8.com/ios-filled/100/null/imac.png"/>
		            <h3>TECNOLOGIA</h3>
		            <a href="./categorias/tecnologia.php" class="btn">Ver más</a>
		        </div>
			    <div class="box">
		            <img src="https://img.icons8.com/ios-filled/100/null/bed.png"/>
		            <h3>HOGAR</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>
			    <div class="box">
		            <img src="https://img.icons8.com/ios-filled/100/null/clean-hands.png"/>
		            <h3>ASEO</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>
			   <div class="box">
		            <img src="https://img.icons8.com/glyph-neue/64/null/car.png"/>
		            <h3>VEHICULOS</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>
		        <div class="box">
		           	<img src="https://img.icons8.com/ios-filled/100/null/strength.png"/>
		            <h3>DEPORTES</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>
			    <div class="box">
		            <img src="https://img.icons8.com/ios-filled/100/null/lipstick.png"/>
		            <h3>BELLEZA</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>
			    <div class="box">
		            <img src="https://img.icons8.com/ios-filled/100/null/service.png"/>
		            <h3>SERVICIOS</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>
			    <div class="box">
		            <img src="https://img.icons8.com/glyph-neue/64/null/cottage.png"/>
		            <h3>INMUEBLES</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>
			   <div class="box">
		            <img src="https://img.icons8.com/ios-filled/100/null/water-pipe.png"/>
		            <h3>OTROS</h3>
		            <a href="#" class="btn">Ver más</a>
		        </div>

		    </div>

		</div>

	</section>	

	<section id="separador">
			
		</section>

		<!--Contenido de pie de pagina-->

		<section class="info">
			<div class="containerinfo">
				<div class="sbox">
					<h2 class="box__titulo">Calidad y buen precio</h2>
					<div class="sub-box">
						<div class="calidad__img"></div>
						<p class="box__texto"> Contamos con la mejor calidad del mercado en nuestros productos, con precios <span>competitivos y asequibles.</span> </p>
					</div>
				</div>
				<div class="sbox">
					<h2 class="box__titulo">Paga seguro</h2>
					<div class="sub-box">
						<div class="seguridad__img"></div>
						<p class="box__texto">Paga seguro con algunos de nuestros patricinadores, <span>VISA, MASTERCARD, EFECTY.</span> </p>	
					</div>
				</div>
				<div class="sbox">
					<h2 class="box__titulo">Envios gratis</h2>
					<div class="sub-box">
						<div class="envios__img"></div>
						<p class="box__texto"><span>Envios totalmente gratis</span>  en las compras que realices en nuestra plataforma, pagando por medio de algunos de nuestros <span>patrocinadores.</span></p>	
					</div>
				</div>
			</div>
		</section>


		<section class="pqr">
			<div class="containerpqr">
				<li class="lista">
					<h2 class="lista__titulo">Te ayudamos</h2>
					<ul><a href="#" class="lista__enlace">Mi cuenta</a></ul>
					<ul><a href="#" class="lista__enlace">Seguimiento de mi orden</a></ul>
					<ul><a href="#" class="lista__enlace">Medios de pagos</a></ul>
					<ul><a href="#" class="lista__enlace">Métodos de entrega</a></ul>
				</li>
				<li class="lista">
					<h2 class="lista__titulo">Atencion al cliente</h2>
					<ul><a href="#" class="lista__enlace">Atencion 24/7</a></ul>
					<ul><a href="#" class="lista__enlace">Términos y condiciones</a></ul>
					<ul><a href="#" class="lista__enlace">Transacciones</a></ul>
					<ul><a href="#" class="lista__enlace">Encuestas</a></ul>
				</li>
				<li class="lista">
					<h2 class="lista__titulo">Quienes somos</h2>
					<ul><a href="#" class="lista__enlace">Mision y vision</a></ul>
					<ul><a href="#" class="lista__enlace">Preguntas frecuentes</a></ul>
					<ul><a href="#" class="lista__enlace">Conocenos</a></ul>
					<ul><a href="#" class="lista__enlace">Social</a></ul>
				</li>
				<li class="lista">
					<h2 class="lista__titulo">PQR</h2>
					<ul><a href="#" class="lista__enlace">Cambios y devoluciones</a></ul>
					<ul><a href="#" class="lista__enlace">Reversion del pago</a></ul>
				</li>
			</div>
		</section>
		<!--Scripts no tocar-->
		<script>
			var dd_main = document.querySelector(".dd_main");

			dd_main.addEventListener("click", function(){
				this.classList.toggle("active");
			})
		</script>
	<footer>
		<div class="container__redes">
			<div class="iconos__redes">
				<a href="https://www.facebook.com"><i class='bx bxl-facebook icons'></i>
				<a href="https://www.twitter.com"><i class='bx bxl-twitter icons'></i>
				<a href="https://www.instagram.com"><i class='bx bxl-instagram icons'></i>
			</div>
			<a href="#" class="redes__enlace">Suscríbete y entérate de nuestras ofertas y productos</a>
		</div>

		<div class="container__derechos">
			<span class="texto__derecho"><i class='bx bx-copyright copy'></i> TODOS LOS DERECHOS RESERVADOS</span>
			<span class="texto__derechos">TraderSMR de
				Colombia S.A. Calle 99 11A-32 Santa Marta Colombia  Teléfono: Santa Marta 00000 Mail: servicioalcliente@tradersmr.com.co
			</span>
			<span class="texto__derechoss"><img src="../../vista/img/norton.svg" alt="Logo de norton empresa de cyberseguridad" class="img-norton">COMPRA 100% SEGURA</span>
		</div> 
	</footer>
</body>
</html>