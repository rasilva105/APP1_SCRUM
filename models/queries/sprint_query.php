<?php

require_once __DIR__ . '/../config/model_base.php';

class SprintQuery extends ModelBase {

    public function guardarSprint($nombre, $inicio, $fin) {

        $sql = "INSERT INTO sprints(nombre, fecha_inicio, fecha_fin)
                VALUES('$nombre','$inicio','$fin')";

        mysqli_query($this->db, $sql);
    }

    public function listarSprints() {

        $sql = "SELECT * FROM sprints ORDER BY id DESC";

        return mysqli_query($this->db, $sql);
    }
}

?>