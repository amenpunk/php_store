<?php

require_once 'models/productos.php';

class productosController
{
    public function index()
    {
        $producto = new Productos();
        $producto = $producto->getRandom(6);
        //var_dump($producto->fetch_object());
        require_once 'views/productos/destacados.php';
    }

    public function gestion()
    {
        Utils::isAdmin();
        $producto = new Productos();
        $productos = $producto->getAll();
        require_once 'views/productos/gestion.php';
    }

    public function crear()
    {
        Utils::isAdmin();
        require_once 'views/productos/crear.php';
    }

    public function save()
    {
        Utils::isAdmin();
        if (isset($_POST)) {
            $nombre = $_POST['nombre'];
            $descripcion = $_POST['descripcion'];
            $precio = $_POST['precio'];
            $stock = $_POST['stock'];
            $categoria = $_POST['categoria'];
            $imagen = $_POST['imagen'];

            if (isset($_FILES['imagen'])) {
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $mimetype = $file['type'];
                //var_dump($file);
                //die();
                $producto = new Productos();
                $producto->setNombre($nombre);
                $producto->setDescripcion($descripcion);
                $producto->setPrecio($precio);
                $producto->setStock($stock);
                $producto->setCategoria_id($categoria);
                // $producto->setImagen($imagen);

                //guardar la imagen
                if ($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {
                    // var_dump($file);
                    //die();


                    if (!is_dir('uploads/images')) {
                        mkdir('uploads/images', 0777, true);
                    }
                    move_uploaded_file($file['tmp_name'], 'uploads/images/' . $filename);
                    $producto->setImagen($filename);
                }
            }

            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $producto->setId($id);
                $save = $producto->edit();
            } else {
                $save = $producto->save();
            }

            if ($save) {
                $_SESSION['producto'] = 'complete';
            } else {
                $_SESSION['producto'] = 'failed';
            }
            //            var_dump($producto);
        }
        header("Location:" . base_url . 'productos/gestion');
        exit();
    }

    public function eliminar()
    {
        //var_dump($_GET);
        Utils::isAdmin();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = new Productos();
            $producto->setId($id);
            $del = $producto->delete();

            if ($del) {
                $_SESSION['delete'] = 'complete';
            } else {
                $_SESSION['delete'] = 'failed';
            }
        }
        header('Location:' . base_url . 'productos/gestion');
        exit();
    }

    public function modificar()
    {
        //var_dump($_GET);t
        Utils::isAdmin();

        if (isset($_GET[id])) {
            $edit = true;
            $id = $_GET['id'];
            $producto = new Productos();
            $producto->setId($id);
            $pro = $producto->getOne();
            require_once 'views/productos/crear.php';
        }
    }

    public function ver()
    {
        if (isset($_GET[id])) {
            $id = $_GET['id'];
            $producto = new Productos();
            $producto->setId($id);
            $pro = $producto->getOne();
        }
        require_once 'views/productos/ver.php';
    }
}
