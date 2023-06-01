<?php

include 'ConectBe.php';
include '../../modelo/entidad/Producto.php';

class product{

    public function verificarExistente($idp){
        $conectbe = new ConectBe();
        
        $data_table= $conectbe->ejecutarConsulta("SELECT * FROM producto WHERE id_Producto = :id", 
                                                    array(':id'=>$idp));
        $producto= null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $producto = new Producto(
                        $data_table[$indice]["id_Producto"],
                        $data_table[$indice]["categoria"],
                        $data_table[$indice]["nombreP"],
                        $data_table[$indice]["cantidad"],
                        $data_table[$indice]["precio"]
                        );
            }
            return $producto;
        }else{
            return null;
        }

    }

    public function insertarProducto(Producto $producto){
        $data_source= new ConectBe();

        $iguales = $this->verificarExistente($producto->getIdP());

        if($iguales == null){
            $sql = "INSERT INTO producto (id_Producto, categoria, nombreP, cantidad, precio ) VALUES ( :id, :cat, :nombre, :cant, :precio)";
            $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':id'=>$producto->getIdP(),
                ':cat'=>$producto->getCategoria(),
                ':nombre'=>$producto->getNombreP(),
                ':cant'=>$producto->getCant(),
                ':precio'=>$producto->getPrecio()
                )
            );
            return $resultado;
        }else{
            $errMsg .= 'Existe producto';
            return null;
        }
    }

    public function todoLosProductos(){
        $conectbe = new ConectBe();
    
        $data_table = $conectbe->ejecutarConsulta("SELECT * FROM producto", array());
        $productos = array();
    
        foreach($data_table as $fila){
            $producto = new Producto(
                $fila["id_Producto"],
                $fila["categoria"],
                $fila["nombreP"],
                $fila["cantidad"],
                $fila["precio"]
            );
            $productos[] = $producto;
        }
        
        return $productos;

    }

    public function todoLasCategorias(){
        $conectbe = new ConectBe();
    
        $data_table = $conectbe->ejecutarConsulta("SELECT categoria FROM categorias", array());
        $productos = array();
    
        foreach($data_table as $fila){
            $producto = new Producto(
                "",
                $fila["categoria"],
                "",
                "",
                ""
            );
            $productos[] = $producto;
        }
        
        return $productos;

    }

    public function buscarProduct($idp){
        $data_source = new ConectBe();

        $data_table= $data_source->ejecutarConsulta("SELECT * FROM producto WHERE id_Producto = :id", 
                                                    array(':id'=>$idp));
        $usuario=null;
        if(count($data_table)==1){
            foreach($data_table as $indice => $valor){
                $usuario = new Producto(
                    $data_table[$indice]["id_Producto"],
                    $data_table[$indice]["categoria"],
                    $data_table[$indice]["nombreP"],
                    $data_table[$indice]["cantidad"],
                    $data_table[$indice]["precio"]
                    );
            }
            return $usuario;
        }else{
            return null;
        }
    }   

    public function borrarProducto($idp, $nombrep){
        $data_source = new ConectBe();

        $productEncontrado = $this->buscarProduct($idp);

        if($productEncontrado->getIdP() == $idp){

            if($productEncontrado->getNombreP() == $nombrep){
                $sql = "DELETE FROM producto "
                . " WHERE id_Producto = :id";
                $resultado = $data_source->ejecutarActualizacion($sql, array(
                ':id'=>$idp
              )
            );
            }else{
                $errMsg ='El nombre del producto seleccionado no está registrado con el ID del producto.';
                return null;
            }

        }else{
            $errMsg ='ID del producto ingresado diferente al registrado o no existe dicho ID ';
            return null;
        }
        
        return $resultado;
    }

    
    public function modificarProducto(Producto $producto){
        $data_source= new ConectBe();

        if($producto != null){
            $sql = "UPDATE producto SET "
            . " categoria= :cate, "
            . " nombreP= :nomb, "
            . " cantidad= :cant,"
            ."  precio= :precio"
            . " WHERE id_Producto= :id";
            $resultado = $data_source->ejecutarActualizacion($sql, array(
            ':cate'=>$producto->getCategoria(),
            ':nomb'=>$producto->getNombreP(),
            ':cant'=>$producto->getCant(),
            ':precio'=>$producto->getPrecio(),
            ':id'=>$producto->getIdP()
            )
            );
        }else{
            $resultado = null;
        }

        return $resultado;
    }

}

?>