<?php

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
