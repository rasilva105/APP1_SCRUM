<?php

if (!isset($sprints)) {
    die("La variable sprints no está definida");
}

?>

<h2>Registro Item</h2>

<form method="POST">

<select name="sprint_id" required>

<?php
mysqli_data_seek($sprints, 0);
while($sprint = mysqli_fetch_assoc($sprints)) {
?>

<option value="<?= $sprint['id'] ?>">
    <?= $sprint['nombre'] ?>
</option>

<?php } ?>

</select>

<select name="categoria" required>
    <option value="accion">Acción</option>
    <option value="logro">Logro</option>
    <option value="impedimento">Impedimento</option>
    <option value="comentario">Comentario</option>
    <option value="otro">Otro</option>
</select>

<textarea name="descripcion" placeholder="Descripción"></textarea>

<select name="cumplida">
    <option value="">Pendiente</option>
    <option value="1">Cumplida</option>
    <option value="0">No cumplida</option>
</select>

<input type="date" name="fecha_revision">

<button type="submit" name="guardar_item">
    Guardar Item
</button>

</form>
```php
<h2>Registro Item</h2>

<form method="POST">

<select name="sprint_id">

<?php
mysqli_data_seek($sprints, 0);
while($sprint = mysqli_fetch_assoc($sprints)) {
?>

<option value="<?= $sprint['id'] ?>">
    <?= $sprint['nombre'] ?>
</option>

<?php } ?>

</select>

<select name="categoria">
    <option value="accion">Acción</option>
    <option value="logro">Logro</option>
</select>

<textarea name="descripcion"></textarea>

<button type="submit" name="guardar_item">
    Guardar Item
</button>

</form>