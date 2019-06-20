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
            if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif'){
               // var_dump($file);
                //die();

                
                if(!is_dir('uploads/images')){
                    mkdir('uploads/images', 0777, true);
                }   
                move_uploaded_file($file['tmp_name'],'uploads/images/'.$filename);
                $producto->setImagen($filename);
            }                      
            

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