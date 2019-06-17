<?php

class Database{
    public static function connect(){
        $db = mysqli_connect("127.0.0.1:7702", "root", "naruto10", "ModeloVista");
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
} 