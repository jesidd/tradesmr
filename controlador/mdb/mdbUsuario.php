<?php

    include '../../modelo/user.php';
    session_start();

    function autenticarUsuario($username,$password){
        $ob = new User();
        $usuario = $ob->AutenticarUser($username,$password);
        return $usuario;
    }

    function insertarUsuario($username,$correo,$pass){
        $ob=new User();
        $usuario=new Usuario("",$username,$correo,$pass);
        $resultado=$ob->insertarUsuario($usuario,3);
        return $resultado;
    }
    
    function modificarUsuario($username,$correo,$pass,$foto){
        $ob=new User();
        $id = $_SESSION['id'];

        $usuario=new Usuario($id,$username,$correo,$pass);
        $resultado=$ob->modificarUsuario($usuario,$foto);
        return $resultado;
    }

    function obtenerFot(){
        $ob= new User();
        $id = $_SESSION['id'];
        $resultado = $ob->obtenerFoto($id);
        return $resultado;
    }

    function borrarUsuario($username,$password){
        $ob= new User();
        $id = $_SESSION['id'];

        $usuario= new Usuario($id,$username," ",$password);
        $resultado=$ob->borrarUsuario($usuario);
        return $resultado;
    }

    if(isset($_POST['peticion'])) {
        $id = $_SESSION['id'];
        $ob= new User();
        $rol= $ob->obtenerRol($id);
        unset($_POST['peticion']);
        $_SESSION['rol']=$rol;
        echo json_encode(array('rol' => $rol));
    }
    
?>