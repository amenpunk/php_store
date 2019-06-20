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
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $categoria = $_POST['categoria'];
            $imagen = $_POST['imagen'];
            //var_dump($_POST);
            //die();
            $producto = new Productos();
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio($precio);
            $producto->setStock($stock);
            $producto->setCategoria_id($categoria);
            $producto->setImagen($imagen);
            $save = $producto->save();
            if($save){
                $_SESSION['producto'] = 'complete';   
            }
            else{
                $_SESSION['producto'] = 'failed';
            }
//            var_dump($producto);
        }
        header("Location:".base_url.'productos/gestion');
    }
}