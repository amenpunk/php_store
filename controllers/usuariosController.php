<?php

require_once 'models/usuarios.php';

class usuariosController{
    public function index(){
        echo "Controlador Usuario, Accion Index";
    }

    public function registro(){
        require_once 'views/usuario/registro.php';
    }    

    public function save(){
        if(isset($_POST)){
            $usuario = new Usuario();
            $usuario->setNombre($_POST['nombre']);
            $usuario->setApellidos($_POST['apellidos']);
            $usuario->setEmail($_POST['email']);
            $usuario->setPassword($_POST['password']);

            $save = $usuario->save();
            if($save){
                
                $_SESSION['register'] = "complete";
                echo "<h1>registro completado</h1>";
            }
            else{
                $_SESSION['register'] = "failed";
                echo "<h1>registro fallido</h1>";
            }
            //var_dump($usuario);
        }else{
            $_SESSION['register'] = "failed";
        }
        header("Location:".base_url.'usuarios/registro');
    }
}