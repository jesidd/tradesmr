<?php
    require_once '../../controlador/mdb/mdbProducto.php';

    function obtenerTodo(){
        $pds = todoLosProductos();
        $obc = todoLasCategorias();
        global $id;
        global $item;
        global $categoria;

        $id = '';
        $item = '';

        if($pds!=null){
            foreach ($pds as $producto) {
                // Acceder a los valores del objeto Producto
                $idProducto = $producto->getIdP();
                $nombre = $producto->getNombreP();
                
                
                $id .= '<option value="' . $idProducto . '">' . $idProducto . '</option>';
                $item .= '<option value="' . $nombre . '">' . $nombre . '</option>';
                
                // Realizar operaciones con los valores del producto
                // ...
            }
            
        }

        if($obc != null){
            foreach ($obc as $categorias){
                $cate = $categorias->getCategoria();

                $categoria .= '<option value="' . $cate . '">' . $cate . '</option>';
            }
        }
    }

    function listarId(){
        global $id;
        return $id;
    }

    function listarNombre(){
        global $item;
        return $item;
    }

    function listarCategoria(){
        global $categoria;
        return $categoria;
    }


    //ajax
    if (isset($_POST['codigo'])){
        $codigoSeleccionado = $_POST['codigo'];

        // Aquí puedes realizar las operaciones necesarias en PHP utilizando el valor seleccionado
        // Realiza la consulta a la base de datos, procesa los datos, etc.

        // Por ejemplo, puedes devolver un arreglo JSON con los resultados


        function buscarCategoria($idp){
            
            $ob = buscarCategorias($idp);
            $c= 0;
            $n=0;
            $p=0;
            $cant=0;

            if($ob!=null){
                $c = $ob->getCategoria();
                $n = $ob->getNombreP();
                $p = $ob->getPrecio();
                $cant = $ob->getCant();
            }
            
            $resultado = [
                'mensaje' => 'Consulta exitosa',
                'codigo' => $idp,
                'nombre' => $n,
                'categoria' => $c,
                'precio' => $p,
                'cantidad' => $cant,
                // Otros datos obtenidos de la consulta
            ];
            
            return  $resultado;
    
        }

        echo json_encode(buscarCategoria($codigoSeleccionado));
    }

    
?>