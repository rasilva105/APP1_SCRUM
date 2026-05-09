<?php
require_once __DIR__ . '/connection_db.php';

class ModelBase {
    protected $conexion;

    public function __construct() {
        $this->conexion = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }
        $this->conexion->set_charset("utf8");
    }

    public function __destruct() {
        $this->conexion->close();
    }
}