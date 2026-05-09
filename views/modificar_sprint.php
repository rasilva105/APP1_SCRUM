<?php

require_once '../models/queries/sprint_query.php';

$query = new SprintQuery();

$sprint = null;

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM sprints WHERE id = $id";

    $resultado = mysqli_query($query->db, $sql);

    $sprint = mysqli_fetch_assoc($resultado);
}

if (isset($_POST['modificar_sprint'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    $sql = "UPDATE sprints
            SET nombre='$nombre',
                fecha_inicio='$fecha_inicio',
                fecha_fin='$fecha_fin'
            WHERE id=$id";

    mysqli_query($query->db, $sql);

    header('Location: lista_sprints.php');
    exit;
}

if (!$sprint) {
    die("Sprint no encontrado");
}

?>

<form method="POST">

    <input
        type="hidden"
        name="id"
        value="<?= $sprint['id'] ?>"
    >

    <input
        type="text"
        name="nombre"
        value="<?= $sprint['nombre'] ?>"
    >

    <input
        type="date"
        name="fecha_inicio"
        value="<?= $sprint['fecha_inicio'] ?>"
    >

    <input
        type="date"
        name="fecha_fin"
        value="<?= $sprint['fecha_fin'] ?>"
    >

    <button type="submit" name="modificar_sprint">
        Modificar Sprint
    </button>

</form>