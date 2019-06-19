<?php

require_once 'models/productos.php';

class productosController{
    public function index(){
        //echo "Controlador productos, Accion Index";
        //echo "<h1>Welcome</h1>";
        require_once 'views/productos/destacados.php';
    }
    
    public function gestion(){
        Utils::isAdmin();
        $producto = new Productos();
        $productos = $producto->getAll();
        require_once 'views/productos/gestion.php';
    }
    
    public function crear(){
        Utils::isAdmin();
        require_once 'views/productos/crear.php';
    }

    public function save(){
        Utils::isAdmin();
        if(isset($_POST)){
            var_dump($_POST);
        }
    }
}