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

    header('Location: lista_items.php');
    exit;
}

if (!$item) {
    die("Item no encontrado");
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
    </div>

</body>
</html>

<form method="POST">

    <input type="hidden" name="id" value="<?= $item['id'] ?>">

    <select name="categoria">

        <option value="accion"
            <?= $item['categoria'] == 'accion' ? 'selected' : '' ?>>
            Acción
        </option>

        <option value="logro"
            <?= $item['categoria'] == 'logro' ? 'selected' : '' ?>>
            Logro
        </option>

        <option value="impedimento"
            <?= $item['categoria'] == 'impedimento' ? 'selected' : '' ?>>
            Impedimento
        </option>

        <option value="comentario"
            <?= $item['categoria'] == 'comentario' ? 'selected' : '' ?>>
            Comentario
        </option>

        <option value="otro"
            <?= $item['categoria'] == 'otro' ? 'selected' : '' ?>>
            Otro
        </option>

    </select>

    <textarea name="descripcion"><?= $item['descripcion'] ?></textarea>

    <select name="cumplida">
        <option value="1" <?= $item['cumplida'] == 1 ? 'selected' : '' ?>>
            Cumplida
        </option>

        <option value="0" <?= $item['cumplida'] == 0 ? 'selected' : '' ?>>
            No cumplida
        </option>
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