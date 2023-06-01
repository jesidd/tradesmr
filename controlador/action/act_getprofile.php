<?php
require_once '../../controlador/mdb/mdbUsuario.php';

if (isset($_SESSION['id'])) {
    function obtenerFoto() {
        $foto = obtenerFot();
        if ($foto != null) {
            $resultado = base64_encode($foto);
        } else {
            $resultado = null;
        }
        return $resultado;  // Codificar la imagen en base64
    }

    $fotoCodificada = obtenerFoto();
    echo json_encode(array('foto' => $fotoCodificada)); // Enviar la imagen codificada en base64 como respuesta JSON
}
?>