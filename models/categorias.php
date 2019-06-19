<?php

class Categorias{
    
    private $id;
    private $nombre;
    private $db;

    public function __construct(){
        $this->db = Database::connect();     
    }


    /**
     * Get the value of db
     */ 
    public function getDb()
    {
        return $this->db;
    }

    /**
     * Set the value of db
     *
     * @return  self
     */ 
    public function setDb($db)
    {
        $this->db = $db;

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
        $this->nombre = $this->db->real_escape_string($nombre);

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

    public function getAll(){
       $categorias = $this->db->query("SELECT * FROM tienda_master.categorias ORDER BY id DESC");
       return $categorias;
    }   
    
    public function save(){
        $sql  = "INSERT INTO tienda_master.categorias values(NULL,'{$this->getNombre()}')";
        $save = $this->db->query($sql);
        $result = false;

        if($save){
            $result = true;
        }
        return $result;
    }
    
}