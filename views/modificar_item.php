<?php

require_once '../models/queries/retro_item_query.php';

$query = new RetroItemQuery();

$item = null;

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "SELECT * FROM retro_items WHERE id = $id";

    $resultado = mysqli_query($query->db, $sql);

    $item = mysqli_fetch_assoc($resultado);
}

if (isset($_POST['modificar_item'])) {

    $id = $_POST['id'];

    $categoria = $_POST['categoria'];

    $descripcion = $_POST['descripcion'];

    $cumplida = $_POST['cumplida'];

    $fecha_revision = $_POST['fecha_revision'];

    $sql = "UPDATE retro_items
            SET categoria='$categoria',
                descripcion='$descripcion',
                cumplida='$cumplida',
                fecha_revision='$fecha_revision'
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

    <title>Modificar Item</title>

    <link rel="stylesheet" href="../public/css/index.css">

</head>

<body>

<div class="container">

<h1>Modificar Item</h1>

<form method="POST">

    <input
        type="hidden"
        name="id"
        value="<?= $item['id'] ?>"
    >

    <select name="categoria">

        <option value="accion">Acción</option>

        <option value="logro">Logro</option>

        <option value="impedimento">Impedimento</option>

        <option value="comentario">Comentario</option>

        <option value="otro">Otro</option>

    </select>

    <textarea name="descripcion"><?= $item['descripcion'] ?></textarea>

    <select name="cumplida">

        <option value="1">Cumplida</option>

        <option value="0">No cumplida</option>

    </select>

    <input
        type="date"
        name="fecha_revision"
        value="<?= $item['fecha_revision'] ?>"
    >

    <button type="submit" name="modificar_item">

        Modificar Item

    </button>

</form>

</div>

</body>

</html>