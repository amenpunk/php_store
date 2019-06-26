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
            exit();
        }
        header("Location:" . base_url . 'pedidos/confirmado');
        exit();
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

    public function mis_pedidos()
    {
        Utils::isIdentity();
        $id = $_SESSION['identity']->id;
        $pedido = new Pedidos();
        $pedido->setUsuario_id($id);
        //sacar los pedidos del usuario
        $pedidos = $pedido->getAllByUser();
        require_once 'views/pedidos/mis_pedidos.php';
    }

    public function detalle()
    {
        Utils::isIdentity();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            //sacar los datos del pedido
            $pedido = new Pedidos();
            $pedido->setId($id);
            $pedido = $pedido->getOne();

            $pedido_productos = new Pedidos();
            $productos = $pedido_productos->getProductoByPedido($id);

            require_once 'views/pedidos/detalle.php';
        } else {
            header("Location:" . base_url . "pedidos/mis_pedidos");
            exit();
        }
    }

    public function gestion()
    {
        Utils::isAdmin();
        $gestion = true;
        $pedido = new Pedidos();
        $pedidos = $pedido->getAll();
        require_once 'views/pedidos/mis_pedidos.php';
    }

    public function estado()
    {
        Utils::isAdmin();
        if (isset($_POST['pedido_id'])) {
            $id = $_POST['pedido_id'];
            $estado = $_POST['estado'];
            $pedidos = new Pedidos();
            $pedidos->setId($id);
            $pedidos->setEstado($estado);
            $edit = $pedidos->edit();
            header("Location:".base_url."pedidos/detalle&id=".$id);
            exit();
        } else {

            header("Location:" . base_url);
            exit();
        }
    }
}
