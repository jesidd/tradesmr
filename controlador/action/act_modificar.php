<?php

include '../mdb/mdbUsuario.php';

$username = $_POST['usuario'];
$email = $_POST['correo'];
$clave = $_POST['password'];
$foto = file_get_contents($_FILES['imgprofile']['tmp_name']);

if($username && $clave && $email && $foto != null){
    $usuario = modificarUsuario($username,$email,$clave,$foto);

    if($usuario != null){
        header("location: ../../vista/pages/modificar.php");
        session_start();
        $msg = 'Se modifico correctamente';
        $_SESSION['login']=$msg;
        $_SESSION['NOMBRE_USUARIO'] = $username;
        $_SESSION['correo'] = $clave;
    }else{
        $errMsg .= 'No se pudo modificar, ya se encuentra registrado el correo o el usuario intente con otro diferente';
        session_start();
        $_SESSION['error']=$errMsg;
        header("location: ../../vista/pages/modificar.php");
    }

}else{
    $errMsg = 'The username and password were not empty.';
    session_start();
    $_SESSION['error']=$errMsg;
    header("location: ../../vista/pages/modificar.php");
}





?>