<?php

include_once '../mdb/mdbProducto.php';

$codigop = $_POST['codigop'];
$nombrep = $_POST['nombrep'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$cant = $_POST['existencia'];

if($codigop && $nombrep && $categoria && $precio && $cant != null){
    $producto = modificarProducto($codigop, $categoria, $nombrep, $cant, $precio);

    if($producto != null){
        session_start();
        $msg = 'Se modifico correctamente';
        $_SESSION['msg']=$msg;
        header("Location: ../../vista/pages/admin.php");
    }else{
        $errMsg .= 'No se pudo modificar';
        session_start();
        $_SESSION['error']=$errMsg;
        header("Location: ../../vista/pages/admin.php");
    }

}else{
    $errMsg = 'Error, no relleno el formulario';
    session_start();
    $_SESSION['error']=$errMsg;
    header("Location: ../../vista/pages/admin.php");
}





?>