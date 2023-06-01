<?php

    include '../mdb/mdbProducto.php';
    

    $idp = $_POST['codeDelProducto'];
    $categoria = $_POST['categoriaDelProducto'];
    $nombrep = $_POST['nombreDelProducto'];
    $precio = $_POST['precio'];
    $cant = $_POST['cantidad'];

    if($idp && $categoria && $nombrep && $precio && $cant != null){
        $producto = insertarProducto($idp,$categoria,$nombrep,$cant,$precio);

        if($producto != null){
            $msg = 'Se añadio correctamente';
            session_start();
            $_SESSION['add']=$msg;
        }else{
            $errMsg .= 'ya existe producto';
            session_start();
            $_SESSION['fail']=$errMsg;
        }
    }else{
        $errMsg .= 'Registro fallido';
        session_start();
        $_SESSION['fail']=$errMsg;
    }

    header("location: ../../vista/pages/admin.php");

?>
