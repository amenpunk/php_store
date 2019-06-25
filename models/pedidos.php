<?php

class Pedidos
{
    private $id;
    private $usuario_id;
    private $provincia;
    private $localidad;
    private $direccion;
    private $coste;
    private $estado;
    private $fecha;
    private $hora;
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    /**
     * Get the value of hora
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set the value of hora
     *
     * @return  self
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get the value of estado
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set the value of estado
     *
     * @return  self
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get the value of coste
     */
    public function getCoste()
    {
        return $this->coste;
    }

    /**
     * Set the value of coste
     *
     * @return  self
     */
    public function setCoste($coste)
    {
        $this->coste = $coste;

        return $this;
    }

    /**
     * Get the value of direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set the value of direccion
     *
     * @return  self
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this->db->real_escape_string($this);
    }

    /**
     * Get the value of localidad
     */
    public function getLocalidad()
    {
        return $this->localidad;
    }

    /**
     * Set the value of localidad
     *
     * @return  self
     */
    public function setLocalidad($localidad)
    {
        $this->localidad = $localidad;

        return $this->db->real_escape_string($this);
    }

    /**
     * Get the value of provincia
     */
    public function getProvincia()
    {
        return $this->provincia;
    }

    /**
     * Set the value of provincia
     *
     * @return  self
     */
    public function setProvincia($provincia)
    {
        $this->provincia = $provincia;

        return $this->db->real_escape_string($this);
    }

    /**
     * Get the value of usuario_id
     */
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    /**
     * Set the value of usuario_id
     *
     * @return  self
     */
    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getOne()
    {
        $productos = $this->db->query("SELECT * FROM tienda_master.pedidos WHERE id = {$this->getId()}");
        return $productos->fetch_object();
    }

    public function getAll()
    {
        $productos = $this->db->query("SELECT * FROM tienda_master.pedidos ORDER BY id DESC");
        return $productos;
    }

    public function save()
    {
        $sql  = "INSERT INTO tienda_master.pedidos values(NULL,{$this->getUsuario_id()},'{$this->getProvincia()}','{$this->getLocalidad()}','{$this->getDireccion()}',{$this->getCoste()},'confirm',CURDATE(),CURTIME());";
        $save = $this->db->query($sql);
        $result = false;
        if ($save) {
            $result = true;
        }
        return $result;
    }

    public function save_linea()
    {
        $sql = "SELECT LAST_INSERT_ID() as 'pedido';";
        $query = $this->db->query($sql);
        $pedido_id = $query->fetch_object()->pedido;
        $result = false;

        foreach ($_SESSION['carrito'] as $elemento) {
            $producto = $elemento['producto'];
            $insert = "INSERT INTO tienda_master.lineas_pedidos VALUES(NULL,{$pedido_id},{$producto->id},{$elemento['unidades']})";
            $linea = $this->db->query($insert);
        }

        $result = false;
        if ($linea) {
            $result = true;
        }
        return $result;
    }

    public function getProductoByPedido($id)
    {

        //$sql = "SELECT * FROM tienda_master.productos WHERE id IN(SELECT producto_id FROM tienda_master.lineas_pedidos "
        //."WHERE pedido_id = {$id})";

        $sql = "SELECT pr.*, lp.unidades FROM tienda_master.productos pr "
            . "INNER JOIN tienda_master.lineas_pedidos lp ON pr.id = lp.producto_id "
            . "WHERE lp.pedido_id={$id}";
        $producto = $this->db->query($sql);
        return $producto;
    }

    public function getOneByUser()
    {
        $sql = "SELECT p.id, p.coste FROM tienda_master.pedidos p "
            //  . "INNER JOIN tienda_master.lineas_pedidos lp ON lp.pedido_id = p.id "
            . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC LIMIT 1";

        $pedido = $this->db->query($sql);
        return $pedido->fetch_object();
    }

    public function getAllByUser()
    {
        $sql = "SELECT p.* FROM tienda_master.pedidos p "
            . "WHERE p.usuario_id = {$this->getUsuario_id()} ORDER BY id DESC";

        $pedido = $this->db->query($sql);
        return $pedido;
    }

    public function edit(){
        $sql  = "UPDATE tienda_master.pedidos SET estado='{$this->getEstado()}' ";
        $sql .= " WHERE id={$this->getId()}";

        
        $save = $this->db->query($sql);
        $result = false;
       /* 
        echo $sql;
        echo "</br>";
        echo $this->db->error;
        die();
        */
        if($save){
            $result = true;
        }
        return $result;
    }
}
