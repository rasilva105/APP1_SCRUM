<?php

if (!isset($sprints)) {
    die("La variable sprints no está definida");
}

?>
<h2>Lista de Sprints</h2>

<table>
<tr>
    <th>ID</th>
    <th>Nombre</th>
    <th>Inicio</th>
    <th>Fin</th>
</tr>

<?php while($sprint = mysqli_fetch_assoc($sprints)) { ?>

<tr>
    <td><?= $sprint['id'] ?></td>
    <td><?= $sprint['nombre'] ?></td>
    <td><?= $sprint['fecha_inicio'] ?></td>
    <td><?= $sprint['fecha_fin'] ?></td>
    <td>
        <a href="views/modificar_sprint.php?id=<?= $sprint['id'] ?>">
            Modificar
        </a>
        |
        <a
            href="views/borrar_sprint.php?id=<?= $sprint['id'] ?>"
            onclick="return confirm('¿Eliminar sprint?')"
        >
            Eliminar
        </a>
    </td>

</tr>

<?php } ?>

</table>