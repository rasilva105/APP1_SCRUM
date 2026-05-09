<?php

require_once __DIR__ . '/../../../Base de datos/Conexion.php';

class ConnectionDB {

    public static function connect() {
        global $conn;
        return $conn;
    }
}

?>