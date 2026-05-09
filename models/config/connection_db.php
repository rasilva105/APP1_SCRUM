<?php

require_once 'Base de datos/Conexion.php';

class ConnectionDB {

    public static function connect() {
        global $conn;
        return $conn;
    }
}

?>