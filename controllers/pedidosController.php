<?php
require_once 'models/pedidos.php';

class pedidosController
{
    public function hacer()
    {
        //echo "Controlador pedidos, Accion Index";
        require_once 'views/pedidos/hacer.php';
    }

    public function add()
    {
        if (isset($_SESSION['identity'])) {
            $provincia = $_POST['provincia'];
            $localidad = $_POST['ciudad'];
            $direccion = $_POST['direccion'];
            $usuario_id = $_SESSION['identity']->id;
            $stats = Utils::statsCarrito();
            $coste = $stats['total'];

            $pedido = new Pedidos();
            $pedido->setUsuario_id($usuario_id);
            $pedido->setProvincia($provincia);
            $pedido->setLocalidad($localidad);
            $pedido->setDireccion($direccion);
            $pedido->setCoste($coste);
            // var_dump($pedido);
            $save = $pedido->save();
            //guardar linea pedido;
            $save_linea = $pedido->save_linea();
            if ($save && $save_linea) {
                $_SESSION['pedido'] = "complete";
            } else {
                $_SESSION['pedido'] = "failed";
            }
        } else {
            //redirigi alindex
            header("Location:" . base_url);
        }
        header("Location:" . base_url . 'pedidos/confirmado');
    }

    public function confirmado()
    {
        if (isset($_SESSION['identity'])) {
            $user = $_SESSION['identity'];
            $pedido = new Pedidos();
            $pedido->setUsuario_id($user->id);
            $pedido = $pedido->getOneByUser();

            $pedido_productos = new Pedidos();
            $productos = $pedido_productos->getProductoByPedido($pedido->id);

            require_once 'views/pedidos/confirmado.php';
        }
    }
}
