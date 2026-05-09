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
</tr>

<?php } ?>

</table>
```php
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
</tr>

<?php } ?>

</table>