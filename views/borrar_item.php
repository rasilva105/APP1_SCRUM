<?php

require_once '../models/queries/retro_item_query.php';

$query = new RetroItemQuery();

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM retro_items WHERE id = $id";

    $resultado = mysqli_query($query->db, $sql);

    if ($resultado) {

        header('Location: lista_items.php');
        exit;

    } else {

        echo "Error al eliminar el item";

    }

} else {

    echo "ID de item no válido";

}

?>