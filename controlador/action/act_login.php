<?php
    include '../mdb/mdbUsuario.php';

    $username = $_POST['user'];
    $password = $_POST['pass'];

    if($username && $password !=null){
        $errMsg = '';
       //username and password sent from Form

               
        $usuario = autenticarUsuario($username, $password);
        echo $username;

       if($usuario != null){ // Puede iniciar sesión
           session_start();
           $_SESSION['id'] = $usuario->getId();
            $_SESSION['NOMBRE_USUARIO'] = $usuario->getUsername();
            $_SESSION['correo'] = $usuario->getCorreo();
            $_SESSION['go'] = 'Inicio seccion correctamente';
            header("Location: ../../vista/register.php");
            
       }else{ // No puede iniciar sesión
            $_SESSION['error']= 'Usuario o contraseña incorrecta, intente nuevamente';
            header("Location: ../../vista/register.php");
       }

    }else{ //valores vacios
        $errMsg .= 'Username and Password are not found';
         $_SESSION['error']= $errMsg;
            header("Location: ../../vista/register.php");
    }
       
       
    // No puede iniciar sesión
    // header("Location: ../../vista/login.html");


?>