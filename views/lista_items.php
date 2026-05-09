<?php

if (!isset($items)) {
    die("La variable items no está definida");
}

?>

<h2>Lista Items</h2>

<table>
<tr>
    <th>ID</th>
    <th>Sprint</th>
    <th>Categoría</th>
    <th>Descripción</th>
</tr>

<?php while($item = mysqli_fetch_assoc($items)) { ?>

<tr>
    <td><?= $item['id'] ?></td>
    <td><?= $item['sprint_nombre'] ?></td>
    <td><?= $item['categoria'] ?></td>
    <td><?= $item['descripcion'] ?></td>
     <td>
        <a href="views/modificar_item.php?id=<?= $item['id'] ?>">
            Modificar
        </a>
        |
        <a
            href="views/borrar_item.php?id=<?= $item['id'] ?>"
            onclick="return confirm('¿Eliminar item?')"
        >
            Eliminar
        </a>
    </td>
</tr>

<?php } ?>
