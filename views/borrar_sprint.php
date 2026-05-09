<?php

require_once '../models/queries/sprint_query.php';

$query = new SprintQuery();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM sprints WHERE id = $id";

    $resultado = mysqli_query($query->db, $sql);

    if ($resultado) {

        header('Location: ../index.php');
        exit;

    } else {

        echo "Error al eliminar el sprint";

    }
} else {

    echo "ID de sprint no válido";

}

?>