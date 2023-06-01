<?php
    require_once '../mdb/mdbProducto.php';

    $nombrep = $_POST['nombrep'];
    $idp = $_POST['idp'];

    $producto = borrarProducto($idp,$nombrep);

    if($producto != null ){
        $msg = 'se elimino el producto correctamente';
        session_start();
        $_SESSION['msg']= $msg;
        header("Location: ../../vista/pages/admin.php");
    }else{
        $errMsg .= 'No se elimino el producto, elija un producto existente';
        session_start();
        $_SESSION['error']= $errMsg;
        header("Location: ../../vista/pages/admin.php");
    }

?>