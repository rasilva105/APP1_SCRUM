<?php

require_once __DIR__ . '/../config/model_base.php';

class RetroItemQuery extends ModelBase {

    public function guardarItem($sprint, $categoria, $descripcion, $cumplida, $fecha) {

        $sql = "INSERT INTO retro_items
                (sprint_id, categoria, descripcion, cumplida, fecha_revision)
                VALUES
                ('$sprint','$categoria','$descripcion','$cumplida','$fecha')";

        mysqli_query($this->db, $sql);
    }

    public function listarItems() {

        $sql = "SELECT retro_items.*, sprints.nombre AS sprint_nombre
                FROM retro_items
                INNER JOIN sprints
                ON retro_items.sprint_id = sprints.id";

        return mysqli_query($this->db, $sql);
    }
}

?>