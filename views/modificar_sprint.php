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

    header('Location: ../index.php');

    exit;
}

?>

<!DOCTYPE html>

<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Modificar Sprint</title>

    <link rel="stylesheet" href="../public/css/index.css">

</head>

<body>

<div class="container">

<h1>Modificar Sprint</h1>

<form method="POST">

    <input
        type="hidden"
        name="id"
        value="<?= $sprint['id'] ?>"
    >

    <label>Nombre del Sprint</label>

    <input
        type="text"
        name="nombre"
        value="<?= $sprint['nombre'] ?>"
    >

    <label>Fecha Inicio</label>

    <input
        type="date"
        name="fecha_inicio"
        value="<?= $sprint['fecha_inicio'] ?>"
    >

    <label>Fecha Fin</label>

    <input
        type="date"
        name="fecha_fin"
        value="<?= $sprint['fecha_fin'] ?>"
    >

    <button type="submit" name="modificar_sprint">

        Modificar Sprint

    </button>

</form>

</div>

</body>

</html>