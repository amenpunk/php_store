<?php

require_once 'models/categorias.php';

class categoriasController{
    public function index(){
        $categoria = new Categorias();
        $categorias = $categoria->getAll();
        require_once 'views/categorias/index.php';
        //echo "Controlador Categoria, Accion Index";
    }

}