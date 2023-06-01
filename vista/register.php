<?php 
  session_start();
  error_reporting(E_ALL & ~E_NOTICE);
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link href="css/register.css" rel="stylesheet" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="icon" type="favicon" href="img/favicon.ico">
  <title>Login y registro</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="../controlador/action/act_login.php" method="POST" class="sign-in-form">
          <h2 class="title">Inicia sesión</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Usuario" name="user" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Contraseña" name="pass" />
          </div>
          <input type="submit" value="Inicia sesión" class="btn solid" />
          <a href="recuperar.html" class="rcontraseña">¿Has olvidado tu contraseña?</a>
          <p class="social-text">Accede rapido con:</p>
          <div class="social-media">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <?php include ('../controlador/action/act_loginGoogle.php') ?>
            <a href="<?php echo $client->createAuthUrl() ?>" class="social-icon"><i class="fab fa-google"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </form>
        <form action="../controlador/action/act_register.php" method="POST" class="sign-up-form">
          <h2 class="title">Registrate</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Usuario" name="usuario" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="correo" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Contraseña" name="password" />
          </div>
          <input type="submit" class="btn" value="Registrate" />
          <p class="social-text">Accede rapido con:</p>
          <div class="social-media">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="<?php echo $client->createAuthUrl() ?>" class="social-icon"><i class="fab fa-google"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
          </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>¿Aun no tienes cuenta?</h3>
          <p>Dale clic en el siguiente botón, para registrarse. </p>
          <button class="btn transparent" id="sign-up-btn">Registrate</button>
        </div>
        <img src="img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>¿Ya tienes una cuenta?</h3>
          <p>Dale clic en el botón, para que inicies sesión. </p>
          <button class="btn transparent" id="sign-in-btn">Inicia sesión</button>
        </div>
        <img src="img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>
  <script src="js/register.js"></script>

  <?php
      if(isset($_SESSION['msg'])){
          $msg = $_SESSION['msg'];
          $icon = 'success';
          $location = 'window.location.reload();';
          session_destroy(); 
      }else{
        if(isset($_SESSION['error'])){
            $msg = $_SESSION['error'];
            $icon = 'error';
            $location = 'window.location.reload();';
            session_destroy(); 
        }else{
          if(isset($_SESSION['go'])){
            $msg = $_SESSION['go'];
            $icon = 'success';
            $location = 'window.location.href= "inicio.php"';
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
      timer: 2300
    })

    setTimeout(() => {
				<?php echo $location ?>
			}, 2600);

  </script>

  <?php
          unset($_SESSION['msg']);
          unset($_SESSION['error']); 
          unset($_SESSION['go']); 
  ?>
</body>

</html>