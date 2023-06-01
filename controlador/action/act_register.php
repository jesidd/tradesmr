<?php

    include '../mdb/mdbUsuario.php';
    

    $username = $_POST['usuario'];
    $email = $_POST['correo'];
    $clave = $_POST['password'];

    if($username && $clave && $email != null){
        $usuario = insertarUsuario($username,$email,$clave);

        if($usuario != null){
            $msg = 'Se registro correctamente';
            session_start();
            $_SESSION['msg']=$msg;
        }else{
            $errMsg .= 'Registro fallido';
            session_start();
            $_SESSION['error']=$errMsg;
        }
    }else{
        $errMsg .= 'Registro fallido';
        session_start();
        $_SESSION['error']=$errMsg;
    }

    header("location: ../../vista/register.php");

?>







