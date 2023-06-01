<?php

class Producto{
    private $id_p;
    private $categoria;
    private $nombrep;
    private $cant;
    private $precio;

    public function __construct($id_p, $categoria, $nombrep, $cant,$precio){
        $this->id_p = $id_p;
        $this->categoria = $categoria;
        $this->nombrep = $nombrep;
        $this->cant = $cant;
        $this->precio = $precio;
    }

    public function setIdP($id)
    {
        $this->id_p = $id;

        return $this;
    }

    public function getIdP()
    {
        return $this->id_p;
    }

    public function setCategoria($cat){
        $this->categoria = $cat;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setNombreP($name){
        $this->nombrep = $name;

        return $this;
    }

    public function getNombreP(){
        return $this->nombrep;
    }

    public function setCant($cant){
        $this->cant = $cant;
    }

    public function getCant(){
        return $this->cant;
    }

    public function setPrecio($valor){
        $this->precio = $valor;
    }

    public function  getPrecio(){
        return $this->precio;
    }
}



?>