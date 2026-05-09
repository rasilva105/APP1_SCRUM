<?php

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "registro_retro_db"
);

if($conn->connect_error){
    die("Error de conexión");
}

$sql = "SELECT * FROM sprints";

$resultado = $conn->query($sql);

echo "<h1>Listado de Sprints</h1>";

while($fila = $resultado->fetch_assoc()){

    echo "ID: " . $fila['id'] . "<br>";
    echo "Nombre: " . $fila['nombre'] . "<br>";
    echo "Inicio: " . $fila['fecha_inicio'] . "<br>";
    echo "Fin: " . $fila['fecha_fin'] . "<br><hr>";
}
?>