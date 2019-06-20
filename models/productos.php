<?php

class Productos{
    private $id;
    private $categoria_id;
    private $descripcion;
    private $fecha;
    private $imagen;
    private $nombre;
    private $oferta;
    private $precio;
    private $stock;
    private $db;

    public function __construct(){
        $this->db = Database::connect();
    }


    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this->db->real_escape_string($this);
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this->db->real_escape_string($this);
    }

    /**
     * Get the value of oferta
     */ 
    public function getOferta()
    {
        return $this->oferta;
    }

    /**
     * Set the value of oferta
     *
     * @return  self
     */ 
    public function setOferta($oferta)
    {
        $this->oferta = $oferta;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this->db->real_escape_string($this);
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this->db->real_escape_string($this);
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
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this->db->real_escape_string($this);
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;
        return $this->db->real_escape_string($this);
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

    public function getAll(){
        $productos = $this->db->query("SELECT * FROM tienda_master.productos ORDER BY id DESC");
        return $productos;
    }

    public function save(){
        $sql  = "INSERT INTO tienda_master.productos values(NULL,{$this->getCategoria_id()},'{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()}, 'NO',CURDATE(),'{$this->getImagen()}')";
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

    public function delete(){
        $sql = "DELETE FROM tienda_master.productos WHERE id={$this->id}";
        $del = $this->db->query($sql);
        $result = false;
        if($del){
            $result = true;
        }
        return $result;
    }

}