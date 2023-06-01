<?php

    include_once '../../modelo/product.php';


    function insertarProducto($id,$cat,$name,$cant,$precio){
        $ob=new product();
        $producto=new Producto($id,$cat,$name,$cant,$precio);
        $resultado=$ob->insertarProducto($producto);
        return $resultado;
    }


    function todoLosProductos(){
        $ob=new product();
        $resultado=$ob->todoLosProductos();
        return $resultado;
    }

    function borrarProducto($idp, $nombrep){
        $ob= new product();

        $resultado=$ob->borrarProducto($idp, $nombrep);
        return $resultado;
    }

    function todoLasCategorias(){
        $ob=new product();
        $resultado=$ob->todoLasCategorias();
        return $resultado;
    }

    function buscarCategorias($idp){
        $ob=new product();
        $resultado=$ob->verificarExistente($idp);
        return $resultado;
    }
    
    function modificarProducto($codigop, $categoria, $nombrep, $cant, $precio){
        $ob=new product();
        $producto=new Producto($codigop, $categoria, $nombrep, $cant, $precio);
        $resultado=$ob->modificarProducto($producto);
        return $resultado;
    }
?>