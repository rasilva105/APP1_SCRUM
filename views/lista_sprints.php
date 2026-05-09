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
</tr>

<?php } ?>

</table>