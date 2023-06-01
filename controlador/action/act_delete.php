<?php
    include '../mdb/mdbUsuario.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $usuario = borrarUsuario($username,$password);

    if($usuario != null ){
        $msg = 'se elimino el usuario correctamente';
        session_start();
        $_SESSION['msg']= $msg;
        header("Location: ../../vista/pages/eliminar.php");
    }else{
        $errMsg .= 'No se elimino el usuario, contraseña o nombre de usuario incorrecto, ingrese nuevamente';
        session_start();
        $_SESSION['error']= $errMsg;
        header("Location: ../../vista/pages/eliminar.php");
    }

?>