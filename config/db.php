<?php

class Database{
    public static function connect(){
        $db = mysqli_connect("tienda-master.mariadb.database.azure.com", "administrador@tienda-master", "ANIME$123", "tienda_master");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
} 