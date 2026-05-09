<?php

require_once 'connection_db.php';

class ModelBase {

    public $db;

    public function __construct() {
        $this->db = ConnectionDB::connect();
    }
}

?>