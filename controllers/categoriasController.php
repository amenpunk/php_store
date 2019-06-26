<?php

require_once 'models/productos.php';
require_once 'models/categorias.php';

class categoriasController
{
    public function index()
    {
        Utils::isAdmin();
        $categoria = new Categorias();
        $categorias = $categoria->getAll();
        require_once 'views/categorias/index.php';
        //echo "Controlador Categoria, Accion Index";
    }

    public function ver(){
        if(isset($_GET['id'])){
            //var_dump($_GET['id']);
            
            //conseguir categorias
            $id = $_GET['id'];
            $categoria = new Categorias();
            $categoria->setId($id);
            $categoria = $categoria->getOne();

            //conseguir productos
            $producto = new Productos();
            $producto->setCategoria_id($id);
            $productos = $producto->getAllCategory();
        }
       
        require_once 'views/categorias/ver.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/categorias/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST) && isset($_POST['nombre'])) {
            $categoria = new Categorias();
            $categoria->setNombre($_POST['nombre']);
            $categoria->save();
        }
        header("Location:" . base_url . "categorias/index");
        
    }
}
